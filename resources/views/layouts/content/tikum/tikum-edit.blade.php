@extends('layouts.app2')

@section('title', 'Edit Post')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Post</h1>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="/tikum/update" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <input type="hidden" id="id" name="id" value="{{ $data->id}}" class="form-control select2">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Tempat</label>
                <input type="text" style="border-radius: 0.5em;" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{$data->nama}}">
                @error('nama')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" style="border-radius: 0.5em;" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{$data->alamat}}">
                @error('alamat')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" style="border-radius: 0.5em;" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{$data->keterangan}}">
                @error('keterangan')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kapasitas" class="form-label">Kapasitas</label>
                <input type="text" style="border-radius: 0.5em;" class="form-control @error('kapasitas') is-invalid @enderror" name="kapasitas" value="{{$data->kapasitas}}">
                @error('kapasitas')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div id="map2" style="height: 50vh; width: 100%;"></div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" id="Lattitude" style="border-radius: 0.5em;" class="form-control @error('latitude') is-invalid @enderror" name="latitude" value="{{$data->latitude}}">
                        @error('latitude')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" id="Longitude" style="border-radius: 0.5em;" class="form-control @error('longitude') is-invalid @enderror" name="longitude" value="{{$data->longitude}}">
                        @error('longitude')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" style="border-radius: 0.5em;" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
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

    var marker = L.marker(["{{$data->latitude}}", "{{$data->longitude}}"]).addTo(map).bindPopup("{{$data->nama}}");

    var popup = L.popup();

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("You clicked the map at " + e.latlng.toString())
            .openOn(map);
    }

    map.on('click', onMapClick);

    map.on('click', (e) => {
        const longtitude = e.latlng.lat
        const lattitude = e.latlng.lng

        console.log({
            longtitude,
            lattitude
        });
        $("#Longitude").val(longtitude);
        $("#Lattitude").val(lattitude);
    })
</script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush