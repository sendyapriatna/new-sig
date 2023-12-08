@extends('layouts.app2')

@section('title', 'Create New Post')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Draw Polygon, Polyline, Circle, and Marker</h1>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div id="map2" style="height: 70vh; width: 100%;"></div>
    </section>
</div>
@endsection

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

    // google street
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);


    var popup = L.popup();

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("You clicked the map at " + e.latlng.toString())
            .openOn(map);
    }

    map.on('click', onMapClick);

    // Leaflet Draw Plugin
    var drawnFeatures = new L.FeatureGroup();
    map.addLayer(drawnFeatures);

    var drawControl = new L.Control.Draw({
        position: "topright",
        edit: {
            featureGroup: drawnFeatures,
        },
        draw: {
            polygon: {
                shapeOptions: {
                    color: "purple"
                }
            },
            polyline: {
                shapeOptions: {
                    color: "red"
                }
            },
            rectangle: {
                shapeOptions: {
                    color: "green"
                }
            },
            circle: {
                shapeOptions: {
                    color: "steelblue"
                }
            },
        },
    });
    map.addControl(drawControl);

    map.on("draw:created", function(e) {
        var type = e.layerType;
        var layer = e.layer;
        console.log(layer.toGeoJSON());

        layer.bindPopup(`<p>${JSON.stringify(layer.toGeoJSON())}</p>`)
        drawnFeatures.addLayer(layer);
    });

    map.on("draw:edited", function(e) {
        var layers = e.layers;
        var type = e.layerType;

        layers.eachLayer(function(layer) {
            console.log(layer);
        })
    });
</script>


<!-- Page Specific JS File -->
<script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush