@extends('layouts.dashboard.dashboard')

@section('content2')
<div class="card" style="border-radius: 2em; padding: 20px;">
    <div class="card-body">
        <h2>Create New Post</h2>
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="/dashboard/add" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Name Place</label>
                <input type="text" style="border-radius: 0.5em;" class="form-control @error('nama') is-invalid @enderror" name="nama">
                @error('nama')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Address</label>
                <input type="text" style="border-radius: 0.5em;" class="form-control @error('alamat') is-invalid @enderror" name="alamat">
                @error('alamat')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" style="border-radius: 0.5em;" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi">
                @error('deskripsi')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tiket" class="form-label">Ticket Price</label>
                <input type="text" style="border-radius: 0.5em;" class="form-control @error('tiket') is-invalid @enderror" name="tiket">
                @error('tiket')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" style="border-radius: 0.5em;" class="form-control @error('latitude') is-invalid @enderror" name="latitude">
                @error('latitude')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" style="border-radius: 0.5em;" class="form-control @error('longitude') is-invalid @enderror" name="longitude">
                @error('longitude')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label @error('image') is-invalid @enderror">Post Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @error('image')
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