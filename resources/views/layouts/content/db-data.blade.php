@extends('layouts.dashboard.dashboard')

@section('content2')
<div class="row">
    <div class="col-sm-3">
        <div class="card shadow p-3 mb-5 bg-body" style="border-radius: 1.5em; padding: 0 20px 0 20px;">
            <div class="row">
                <div class="col-sm-6">
                    <h5>Jumlah Wisata</h5>
                    <h3>1000</h3>
                </div>
                <div class="col-sm-6">
                    <p> <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z" />
                            <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" />
                        </svg></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card shadow p-3 mb-5 bg-body" style="border-radius: 1.5em; padding: 0 20px 0 20px;">
            <div class="row">
                <div class="col-sm-6">
                    <h5>Jumlah Wisata</h5>
                    <h3>1000</h3>
                </div>
                <div class="col-sm-6">
                    <p> <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z" />
                            <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" />
                        </svg></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card shadow p-3 mb-5 bg-body" style="border-radius: 1.5em; padding: 0 20px 0 20px;">
            <div class="row">
                <div class="col-sm-6">
                    <h5>Jumlah Wisata</h5>
                    <h3>1000</h3>
                </div>
                <div class="col-sm-6">
                    <p> <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z" />
                            <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" />
                        </svg></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card shadow p-3 mb-5 bg-body" style="border-radius: 1.5em; padding: 0 20px 0 20px;">
            <div class="row">
                <div class="col-sm-6">
                    <h5>Jumlah Wisata</h5>
                    <h3>1000</h3>
                </div>
                <div class="col-sm-6">
                    <p> <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z" />
                            <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" />
                        </svg></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" style="border-radius: 1.5em; padding: 20px; margin-left: 10px; width:98%;" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="card shadow p-3 mb-5 bg-body" style="border-radius: 1.5em; padding: 20px; margin-left: 10px; width:98%;">
        <h3>Daftar Wisata</h3>
        <div class="table-responsive">
            <table class="table table-hover table-sm" style="width: 95%;">
                <thead>
                    <tr>
                        <th style="padding:20px 0 20px 0;" class="text-center" scope="col">No</th>
                        <th style="padding:20px 0 20px 0;" scope="col">Name Place</th>
                        <th style="padding:20px 0 20px 0;" scope="col">Ticket Price</th>
                        <th style="padding:20px 0 20px 0;" scope="col">Latitude</th>
                        <th style="padding:20px 0 20px 0;" scope="col">Longitude</th>
                        <th style="padding:20px 0 20px 0;" class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($location_tables as $index => $item)
                    <tr class="mt-5 mb-5">
                        <td class="text-center align-middle ">{{ $index+1}}</td>
                        <td class="align-middle ">{{$item->nama}}</td>
                        <td class="align-middle ">Rp.{{$item->tiket}}</td>
                        <td class="align-middle ">{{$item->latitude}}</td>
                        <td class="align-middle ">{{$item->longitude}}</td>
                        <td class="text-center align-middle ">
                            <div class="row d-flex justify-content-center">
                                <div class="col-sm-2 d-flex justify-content-center">
                                    <a href="/dashboard/edit/{{ $item->id}}" style="border-radius: 0.5em;" class="btn btn-primary">Detail</a>
                                </div>

                                <div class="col-sm-2 d-flex justify-content-center">
                                    <a href="/dashboard/edit/{{ $item->id}}" style="border-radius: 0.5em;" class="btn btn-warning">Edit</a>
                                </div>
                                <div class="col-sm-2 d-flex justify-content-center">
                                    <a href="/dashboard/delete/{{ $item->id}}" style="border-radius: 0.5em;" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection