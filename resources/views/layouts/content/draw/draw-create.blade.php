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
            <h1>Draw Polygon</h1>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <!-- <h2 class="section-title">Buat Titik Polygon</h2> -->
        <div id="map2" style="height: 70vh; width: 100%; z-index:-1"></div>
        <form action="/draw/add" method="post" enctype="multipart/form-data">
            @csrf
            <!-- <input type="hidden" name="polygon" id="polygon"> -->
            <textarea hidden name="polygon" id="polygon" cols="30" rows="10"></textarea>
            <!-- <input type="hidden" name="is_active" id="is_active" value="1"> -->
            <select class="custom-select" name="tipe" id="tipe" aria-label="Default select example" style="position: absolute; top:14%; z-index:1; width:15%; right:1%">
                <option disabled selected>Pilih Tingkat Bahaya</option>
                <option class="bg-success p-3" value="Aman">Zona Aman</option>
                <option class="bg-warning p-3" value="Berbahaya">Zona Berbahaya</option>
                <option class="bg-danger p-3" value="Sangat Berbahaya">Zona Sangat Berbahaya</option>
            </select>
            <!-- <div style="position: absolute; top:100px; z-index:1; right:-80%; overflow-x:none" class="input-group mt-3">
                <label class="input-group-text" for="inputGroupSelect01">Tingkat Bahaya</label>
                <select class="form-select" name="tipe" id="tipe">

                </select>
            </div> -->
            <button type="submit" style="border-radius: 0.5em;" class="btn btn-success p-3 px-5 py-3 mt-3">Submit</button>
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
    var map = L.map('map2').setView([-7.677718722836917, 108.64768251433698], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

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
        })
        // $("#polygon").val(JSON.stringify(latlng));

        // drawnItems.addLayer(layer);
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