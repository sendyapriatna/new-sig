@extends('layouts.app2')

@section('title2', 'Shelter Edit')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Kerusakan Desa</h1>
        </div>
        <!-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Shelter</li>
            </ol>
        </nav> -->
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="/kerusakan/update" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <input type="hidden" id="id" name="id" value="{{ $data->id}}" class="form-control select2">
            <!-- <h2 class="section-title">Pilih Titik</h2> -->
            <!-- <p class="section-lead">Pilih titik pada map dibawah</p> -->

            <section class="card mt-5 p-3">
                <div class="row">
                    <div class="col-md-6">
                        <div class="col p-3">
                            <div id="map2" style="height: 50vh; width: 100%;"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col p-3">
                            <label for="name" class="form-label">Nama Desa</label>
                            <input type="text" style="border-radius: 0.5em;" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$data->name}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col p-3">
                            <label for="density" class="form-label">Persentase Kerusakan</label>
                            <input type="number" style="border-radius: 0.5em;" class="form-control @error('density') is-invalid @enderror" name="density" value="{{$data->density}}">
                            @error('density')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col p-3">
                            <label for="is_active" class="form-label">Status</label>
                            <input type="hidden" name="is_active" value="{{$data->is_active}}">
                            <select class="custom-select" name="is_active" id="is_active" aria-label="Default select example">
                                <option disabled selected>{{$data->is_active}}</option>
                                <option class="bg-success p-3" value="Active">Active</option>
                                <option class="bg-danger p-3" value="NonActive">Non Active</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col p-3 mt-3">
                        <button type="submit" style="border-radius: 0.5em;" class="btn btn-success p-3 px-5 py-3">Submit</button>
                    </div>
                </div>
            </section>

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
<script type="text/javascript">
    var map = L.map('map2').setView([-7.677718722836917, 108.64768251433698], 11);

    // google street
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // DRAW POLYGON 
    $(document).ready(function() {
        $.getJSON('/viewKerusakan/json', function(data) {
            $.each(data, function(index) {
                if ([data[index].id] == '{{$data->id}}') {
                    if ([data[index].density] >= 66) {
                        L.polygon(JSON.parse([data[index].polygon]), {
                            fillColor: '#ff4242', //Polygon Color
                            weight: 3, //Outline
                            opacity: 0.5, //Opacity Outline
                            fillOpacity: 0.5, //Opacity Polygon
                            color: 'black', //Outline color
                        }).addTo(map)
                    } else if ([data[index].density] >= 33 && [data[index].density] < 66) {
                        L.polygon(JSON.parse([data[index].polygon]), {
                            fillColor: '#fcff42', //Polygon Color
                            weight: 3, //Outline
                            opacity: 0.5, //Opacity Outline
                            fillOpacity: 0.5, //Opacity Polygon
                            color: 'black', //Outline color
                        }).addTo(map)
                    } else {
                        L.polygon(JSON.parse([data[index].polygon]), {
                            fillColor: '#42ff4c', //Polygon Color
                            weight: 3, //Outline
                            opacity: 0.5, //Opacity Outline
                            fillOpacity: 0.5, //Opacity Polygon
                            color: 'black', //Outline color
                        }).addTo(map)
                    }
                }
                // console.log(JSON.parse([data[index].polygon]));
            });
        });
    });
</script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush