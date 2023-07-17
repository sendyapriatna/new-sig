@extends('layouts.dashboard.dashboard')

@section('content2')
<div class="card" style="border-radius: 2em; padding: 20px;">
    <div class="card-body">
        <h2>Edit Tempat Wisata</h2>
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="/dashboard/update" method="post">
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
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" style="border-radius: 0.5em;" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{$data->deskripsi}}">
                @error('deskripsi')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tiket" class="form-label">Harga Tiket</label>
                <input type="text" style="border-radius: 0.5em;" class="form-control @error('tiket') is-invalid @enderror" name="tiket" value="{{$data->tiket}}">
                @error('tiket')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" style="border-radius: 0.5em;" class="form-control @error('latitude') is-invalid @enderror" name="latitude" value="{{$data->latitude}}">
                @error('latitude')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" style="border-radius: 0.5em;" class="form-control @error('longitude') is-invalid @enderror" name="longitude" value="{{$data->longitude}}">
                @error('longitude')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button type="submit" style="border-radius: 0.5em;" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>
@endsection
</div>