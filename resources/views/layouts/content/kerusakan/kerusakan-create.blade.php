@extends('layouts.app2')

@section('title2', 'Draw Map')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Persentase Kerusakan Desa</h1>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <!-- <h2 class="section-title">Buat Titik Polygon</h2> -->
        <div id="map2" style="height: 70vh; width: 100%; z-index:-1"></div>
        <form action="/kerusakan/add" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="polygon" id="polygon">
            <input type="hidden" name="polygon2" id="polygon">
            <!-- <input class="p-3" type="number" name="density" id="density" style="position: absolute; top:14%; z-index:1; width:10%;height:5%; right:1%" placeholder="Input Density"> -->
            <section class="card mt-5 p-3">
                <div class="row p-3">
                    <div class="col p-3">
                        <label for="nama" class="form-label">Location Name</label>
                        <input type="text" style="border-radius: 0.5em;" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col p-3">
                        <label for="density" class="form-label">Persentase Kerusakan</label>
                        <input type="number" style="border-radius: 0.5em;" class="form-control @error('density') is-invalid @enderror" name="density" value="{{old('density')}}">
                        @error('density')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col p-3 mt-3">
                        <button type="submit" style="border-radius: 0.5em;" class="btn btn-success p-3 px-5 py-3">Submit</button>
                    </div>
                </div>

            </section>
            <!-- <button type="submit" style="border-radius: 0.5em;" class="btn btn-success p-3 px-5 py-3 mt-3">Submit</button> -->
        </form>
    </section>
</div>
@endsection

<script src="{{ asset('js/tsunami.js') }}"></script>

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
<script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

<script>
    var map = L.map('map2').setView([-7.677718722836917, 108.64768251433698], 12);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    $(document).ready(function() {
        $.getJSON('../viewKerusakan/json', function(data) {
            $.each(data, function(index) {
                if ([data[index].density] >= 66) {
                    L.polygon(JSON.parse([data[index].polygon]), {
                        fillColor: '#ff4242', //Polygon Color
                        weight: 3, //Outline
                        opacity: 0.5, //Opacity Outline
                        fillOpacity: 0.5, //Opacity Polygon
                        color: 'black', //Outline color
                    }).addTo(map).bindTooltip("<div><table> <th class = 'text-center' colspan='3'> <h6>Persentase Kerusakan</h6> </th><tr><td class='text-center' colspan='3'></td></tr><tr><td> <b>Desa " + data[index].name + "</b></td></tr><tr><td > Kerusakan " + data[index].density + "%</td></tr></table></div>");
                } else if ([data[index].density] >= 33 && [data[index].density] < 66) {
                    L.polygon(JSON.parse([data[index].polygon]), {
                        fillColor: '#fcff42', //Polygon Color
                        weight: 3, //Outline
                        opacity: 0.5, //Opacity Outline
                        fillOpacity: 0.5, //Opacity Polygon
                        color: 'black', //Outline color
                    }).addTo(map).bindTooltip("<div><table> <th class = 'text-center' colspan='3'> <h6>Persentase Kerusakan</h6> </th><tr><td class='text-center' colspan='3'></td></tr><tr><td> <b>Desa " + data[index].name + "</b></td></tr><tr><td > Kerusakan " + data[index].density + "%</td></tr></table></div>");
                } else {
                    L.polygon(JSON.parse([data[index].polygon]), {
                        fillColor: '#42ff4c', //Polygon Color
                        weight: 3, //Outline
                        opacity: 0.5, //Opacity Outline
                        fillOpacity: 0.5, //Opacity Polygon
                        color: 'black', //Outline color
                    }).addTo(map).bindTooltip("<div><table> <th class = 'text-center' colspan='3'> <h6>Persentase Kerusakan</h6> </th><tr><td class='text-center' colspan='3'></td></tr><tr><td> <b>Desa " + data[index].name + "</b></td></tr><tr><td > Kerusakan " + data[index].density + "%</td></tr></table></div>");
                }
                // console.log(JSON.parse([data[index].polygon]));
            });
        });
    });
    // Leaflet Draw Plugin
    var drawnItems = new L.FeatureGroup();
    map.addLayer(drawnItems);

    var drawControl = new L.Control.Draw({
        draw: {
            polyline: false,
            rectangle: false,
            circle: false,
            marker: false,
            polygon: {
                shapeOptions: {
                    color: "steelblue"
                }
            },
        },
        edit: {
            featureGroup: drawnItems,
        }
    });
    map.addControl(drawControl);
    map.on("draw:created", function(e) {
        var type = e.layerType;
        var layer = e.layer;

        var latlng = layer.getLatLngs()[0];

        // console.log(layer.getLatLngs()[0]);
        $("#polygon").val(JSON.stringify(latlng));

        drawnItems.addLayer(layer);
    });

    map.on("draw:edited", function(e) {

        var type = e.layerType;
        var layers = e.layers;

        layers.eachLayer(function(layer) {
            var latlngs = layer.getLatLngs()[0];
            $("#polygon").val(JSON.stringify(latlngs));
            // console.log(layer.getLatLngs());
            drawnItems.addLayer(layer);
        })
        // $("#polygon").val(JSON.stringify(latlng));


    });

    // MASKING MASTER PETA PANGANDARAN
    // const petaDanger = L.geoJSON(tsunamiData, {
    //     style: function(feature) {
    //         switch (feature.properties.party) {
    //             case 'Aman':
    //                 return {
    //                     color: "#00ff44"
    //                 };
    //             case 'Democrat':
    //                 return {
    //                     color: "#0000ff"
    //                 };
    //         }
    //     }
    // }).addTo(map);
</script>


<!-- Page Specific JS File -->
<script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush