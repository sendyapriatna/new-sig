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
    </section>
</div>
<div style="background-color: #28CB8B; min-height:70px;" class="d-flex align-items-center justify-content-center">
    <p>Copyright &copy; 2018 Design By Muhamad Nauval Azhar</p>
</div>