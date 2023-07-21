@include('layouts.app')
<div class="container-fluid">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <!-- Carousel -->
    <div class="row d-flex align-items-center justify-content-center" style="padding-top:100px; padding-bottom:100px;">
        <div class="col-sm-5">
            <div class="pt-5"></div>
            <h1 style="font-size:70px; color : #28CB8B;"><b>Sistem Informasi Geografis</b></h1>
            <h2 style="font-size:40px;"><b>Objek Wisata Kulon Progo</b></h2>
            <p>Website ini memberikan informasi objek wisata yang ada di Kulon Progo mulai dari nama tempat, alamat, preview gambar dan harga tiket.</p>
        </div>
        <div class="col-sm-5">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ url ('frontend/img/ud1.png') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ url ('frontend/img/ud2.png') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Carousel -->
    <section style="margin:0 0 100px 0">
        <div class="container">
            <h2 class="my-3 text-center">Tourist Spot Map</h2>
            <!-- Start Maps -->
            @include('layouts.map.map-gis')
            <!-- End Maps -->
        </div>
    </section>
    <section style="margin:0 0 100px 0">
        <div class="container  text-center">
            <h2 class="my-3">Total Tourist Spot</h2>
            <h3>{{$location}}</h3>
        </div>
    </section>
    <section style="margin:0 0 100px 0">
        <div class="container text-center">
            <h2 class="my-3">About</h2>
            <h3>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta minima, unde libero officia amet molestias dolorum, eveniet ex culpa cumque omnis iste fugit sed numquam ad, blanditiis facere quasi nam.</h3>
        </div>
    </section>
    <section style="min-height: 400px; margin:0 0 100px 0">
        <div class="container">
            <h2 class="my-3 text-center">Most Visited</h2>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <div class="card border-light shadow p-3 mb-5 bg-body rounded" style="width: 18rem;">
                        <img src="{{ url ('frontend/img/ud1.png') }}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="landing-page/detail/1" style="border-radius: 0.5em;" class="btn btn-success">Detail ➝</a>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card border-light shadow p-3 mb-5 bg-body rounded" style="width: 18rem;">
                        <img src="{{ url ('frontend/img/ud1.png') }}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="landing-page/detail/2" style="border-radius: 0.5em;" class="btn btn-success">Detail ➝</a>
                        </div>
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="card border-light shadow p-3 mb-5 bg-body rounded" style="width: 18rem;">
                        <img src="{{ url ('frontend/img/ud1.png') }}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="landing-page/detail/3" style="border-radius: 0.5em;" class="btn btn-success">Detail ➝</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
        <div style="width: 100%; margin-left:-50px;">
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

        </div>
        <!-- Start -->
        <div class="container my-5">
            <div class="card" style="background-color: #8c8ee6; width: 11rem;">
                <div class="card-body text-light">

                    <div class="card-title">
                        <h4>Total Wisata</h4>
                    </div>
                    <p class="card-text text-center fw-bold" style="font-size: 18px;">5</p>
                </div>
            </div>
        </div>
        <!-- End -->

        <!-- Footer -->
        <div class="footer bg-dark">
           <p> Thanks for your support</p> 
        </div>
    </div>

=======
    </section>
>>>>>>> 5cc1457bad3157007827846c0e93d58ccf658406
</div>
<div style="background-color: #28CB8B; min-height:70px;" class="d-flex align-items-center justify-content-center">
    <p>Copyright &copy; 2018 Design By Muhamad Nauval Azhar</p>
</div>