@extends('layouts.app2')

@section('title2', 'Shelter Create')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
        </div>
        <!-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Shelter</li>
            </ol>
        </nav> -->
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form action="/dashboard/profil_update" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <input type="hidden" id="id" name="id" value="{{ $data->id}}" class="form-control select2">
            <h2 class="section-title" sty>Pilih Titik</h2>
            <!-- <p class="section-lead">Pilih titik pada map dibawah</p> -->
            <div class="row">
                <div class="col-md-4">
                    @if($data->image)
                    <div class=" text-center"><img class="img-fluid" style="height: 50vh; width: 50vh;" src="/storage/{{$data->image}}"></div>
                    @else
                    <div class=" text-center"><img class="img-fluid" style="height: 50vh; width: 50vh;" src="{{ asset('img/avatar/avatar-1.png') }}"></div>
                    @endif

                </div>
                <div class="col">
                    <section class="card px-5 py-5">
                        <div class="mb-3">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" style="border-radius: 0.5em;" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$data->name}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="text" style="border-radius: 0.5em;" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$data->email}}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" style="border-radius: 0.5em;" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <div class=" invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Confirm Password</label>
                            <input id="password-confirm" style="border-radius: 0.5em;" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label @error('image') is-invalid @enderror">Post Image</label>
                            <input type="hidden" name="oldImage" value="{{$data->image}}">
                            <img src="" alt="" class="img-preview img-fluid col p-3">
                            <input type="file" class="form-control" id="image" name="image" onchange="previewImage()">
                            @error('image')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </section>
                </div>
            </div>
            <div class="row p-3">
                <div class="col p-3 mt-3">
                    <button type="submit" style="border-radius: 0.5em;" class="btn btn-success p-3 px-5 py-3">Submit</button>
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
    var map = L.map('map2').setView([-7.707769, 108.658733], 13);

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

    map.on('click', (e) => {
        const longtitude = e.latlng.lng
        const lattitude = e.latlng.lat

        console.log({
            longtitude,
            lattitude
        });
        $("#Longitude").val(longtitude);
        $("#Lattitude").val(lattitude);
    })


    // IMAGE PREVIEW
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>


<!-- Page Specific JS File -->
<script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush