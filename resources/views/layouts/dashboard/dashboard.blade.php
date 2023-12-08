@extends('layouts.app2')

@section('title2', 'General Dashboard')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Admin</h4>
                        </div>
                        <div class="card-body">
                            {{$users}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Gathering Point</h4>
                        </div>
                        <div class="card-body">
                            {{$tikum}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class='fas fa-home'></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Shelter</h4>
                        </div>
                        <div class="card-body">
                            {{$shelter}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Soon</h4>
                        </div>
                        <div class="card-body">
                            0
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Gathering Point</h4>
                        <div class="card-header-action">
                            <a href="{{ url('tikum/create') }}" class="btn btn-primary">Add Data</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table-striped mb-0 table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Capacity</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tikum_tables as $index => $item)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->kapasitas}}</td>
                                        <td>{{$item->keterangan}}</td>
                                        <td>
                                            <div class="row">
                                                <a href="/tikum/detail/{{ $item->id}}" style="border-radius: 0.5em;" class="btn btn-primary mr-1"><i class="fa-solid fa-circle-info"></i></a>
                                                <a href="/tikum/edit/{{ $item->id}}" style="border-radius: 0.5em;" class="btn btn-warning mr-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="/tikum/delete/{{ $item->id}}" style="border-radius: 0.5em;" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                            </div>
                                        </td>
                                        <!-- <td>
                                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                        </td> -->
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Shelter</h4>
                        <div class="card-header-action">
                            <a href="{{ url('shelter/create') }}" class="btn btn-primary">Add Data</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table-striped mb-0 table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Capacity</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($shelter_tables as $index => $item2)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$item2->nama}}</td>
                                        <td>{{$item2->kapasitas}}</td>
                                        <td>{{$item2->keterangan}}</td>
                                        <td>
                                            <div class="row">
                                                <a href="/shelter/detail/{{ $item2->id}}" style="border-radius: 0.5em;" class="btn btn-primary mr-1"><i class="fa-solid fa-circle-info"></i></a>
                                                <a href="/shelter/edit/{{ $item2->id}}" style="border-radius: 0.5em;" class="btn btn-warning mr-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="/shelter/delete/{{ $item2->id}}" style="border-radius: 0.5em;" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                            </div>
                                        </td>
                                        <!-- <td>
                                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                        </td> -->
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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