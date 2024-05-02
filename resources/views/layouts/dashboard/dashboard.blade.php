@extends('layouts.app2')
@section('title2', 'General Dashboard')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
<script type="text/javascript" src="chartjs/Chart.js"></script>
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-map-marker-alt"></i>
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
            <div class="col-lg-2 col-md-2 col-sm-2 col-12">
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
            <div class="col-lg-2 col-md-2 col-sm-2 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-solid fa-draw-polygon"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Peta Acaman Tsunami</h4>
                        </div>
                        <div class="card-body">
                            {{$polygon}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class='fas fa-landmark'></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Persentase Kerusakan Desa</h4>
                        </div>
                        <div class="card-body">
                            {{$kerusakan}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class='fas fa-landmark'></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Korban Jiwa</h4>
                        </div>
                        <div class="card-body">
                            665
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class='fas fa-landmark'></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Persentase Kerusakan Desa</h4>
                        </div>
                        <div class="card-body">
                            {{$kerusakan}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-12">
                <div class="card p-3">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12">
                <div class="card p-3">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <canvas id="myChart2"></canvas>
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
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Pangandaran", "Cilacap", "Tasikmalaya", "Banjar", "Kebumen", "Gunung Kidul", "Bantul", "Garut", "Banyumas"],
            datasets: [{
                label: 'Ketinggian tsunami berdasarkan lokasi',
                data: [415, 157, 62, 15, 10, 3, 3, 1, 1],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "Korban Jiwa Tsunami Pangandaran 2006"
            }
        }
    });

    var ctx = document.getElementById("myChart2").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Widara Payung", "Bulak Laut", "Pameungpeuk", "Batu Hiu", "Pangandaran", "Sindongkarta"],
            datasets: [{
                label: 'Ketinggian tsunami berdasarkan lokasi',
                data: [7.39, 7.36, 5.98, 5.44, 4.27, 3.95],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "Ketinggian Tsunami Berdasarkan Lokasi 2006"
            }
        }
    });
</script>
@endpush