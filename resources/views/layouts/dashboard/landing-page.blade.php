<div>
    @include('layouts.app')
    <div class="container-fluid" style="margin-top: -50px;">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <!-- Carousel -->
        <div class="row d-flex justify-content-center" style="background-color: #8c8ee6; padding-top:100px; margin-bottom:-100px;">
            <div class="col-sm-4 text-light">
                <div class="mt-5 pt-5"></div>
                <h1>Selamat Datang</h1>
                <h1 class="bold" style="font-size:50px">Sistem Informasi Geografis</h1>
                <h2>Objek Wisata <b>Kulon Progo</b></h2>
                <p>Website ini memberikan informasi objek wisata yang ada di Kulon Progo mulai dari nama tempat, alamat, preview gambar dan harga tiket.</p>
            </div>
            <div class="col-sm-4">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ url ('frontend/img/map1.png') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ url ('frontend/img/map2.png') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ url ('frontend/img/map3.png') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ url ('frontend/img/map4.png') }}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="width: 110%; margin-left:-50px;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#8c8ee6" fill-opacity="1" d="M0,128L24,154.7C48,181,96,235,144,229.3C192,224,240,160,288,128C336,96,384,96,432,112C480,128,528,160,576,176C624,192,672,192,720,165.3C768,139,816,85,864,80C912,75,960,117,1008,133.3C1056,149,1104,139,1152,149.3C1200,160,1248,192,1296,197.3C1344,203,1392,181,1416,170.7L1440,160L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z"></path>
            </svg>
        </div>
        <!-- End Carousel -->

        <h1 class="my-3 text-center">Tourist Spot Map</h1>
        <div class="container py-5" id="map">

            <!-- Start Maps -->
            <div class="py-3">
                @include('layouts.map.map-gis')
            </div>
            <!-- End Maps -->

            <!-- Start -->
            
            <!-- End -->
        </div>
    </div>

</div>
<!-- https://dribbble.com/shots/9779129-Mobile-App-Template-Design-for-Divi -->