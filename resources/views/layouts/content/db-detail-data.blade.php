@extends('layouts.app2')

@section('title', 'Detail Post')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Post</h1>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="/dashboard/view/update" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <input type="hidden" id="id" name="id" value="{{ $data->id}}" class="form-control select2">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Tempat</label>
                <input type="text" style="border-radius: 0.5em;" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{$data->nama}}" readonly>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" style="border-radius: 0.5em;" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{$data->alamat}}" readonly>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" style="border-radius: 0.5em;" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{$data->deskripsi}}" readonly>
            </div>
            <div class="mb-3">
                <label for="kontak" class="form-label">Contact</label>
                <input type="text" style="border-radius: 0.5em;" class="form-control @error('kontak') is-invalid @enderror" name="kontak" value="{{$data->kontak}}" readonly>
            </div>
            <div class="mb-3">
                <label for="tiket" class="form-label">Harga Tiket</label>
                <input type="text" style="border-radius: 0.5em;" class="form-control @error('tiket') is-invalid @enderror" name="tiket" value="{{$data->tiket}}" readonly>
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" style="border-radius: 0.5em;" class="form-control @error('latitude') is-invalid @enderror" name="latitude" value="{{$data->latitude}}" readonly>
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" style="border-radius: 0.5em;" class="form-control @error('longitude') is-invalid @enderror" name="longitude" value="{{$data->longitude}}" readonly>
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

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush