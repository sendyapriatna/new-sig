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
            <div class="col-sm-4">
                <h1 style="padding-top: 250px; color: #fff">Selamat Datang</h1>
                <h1 style="color: #fff; font-weight:700; font-size:50px">Sistem Informasi Geografis</h1>
                <h2 style="color: #fff;">Objek Wisata <b>Kulon Progo</b></h2>
                <p style="color: #fff;">Website ini memberikan informasi objek wisata yang ada di Kulon Progo mulai dari nama tempat, alamat, preview gambar dan harga tiket.</p>
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

        <!-- Start Maps -->
        <div class="container">


            <h1 class="my-3 text-center">Tourist Spot Map</h1>
            @include('layouts.map.map-gis')


            <!-- End Maps -->

            <!-- Start Most Searched-->

            <div class="container-fluid bg-light py-5 px-5 my-3">
                <h4 class="py-3">Most searched tourist spots</h4>
                <div class="row">
                    <div class="col-lg-6 my-2">
                        <h7 class="fw-bold">Sed ut perspiciatis</h7>
                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est.</p>
                        <a href="#" class="btn btn-outline-primary">Read more</a>
                    </div>
                    <div class="col-lg-6 my-2">
                        <h7 class="fw-bold">Sed ut perspiciatis</h7>
                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est.</p>
                        <a href="#" class="btn btn-outline-primary">Read more</a>
                    </div>
                    <div class="col-lg-6 my-2">
                        <h7 class="fw-bold">Sed ut perspiciatis</h7>
                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est.</p>
                        <a href="#" class="btn btn-outline-primary">Read more</a>
                    </div>
                    <div class="col-lg-6 my-2">
                        <h7 class="fw-bold">Sed ut perspiciatis</h7>
                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est.</p>
                        <a href="#" class="btn btn-outline-primary">Read more</a>
                    </div>
                </div>
            </div>

            <!-- End Most Searched-->

            <!-- Start Information -->
            <div class="container w-50 my-5">
                <div class="about text-center my-5">
                    <h6 class="fw-bold">About</h6>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem.</p>
                </div>
                <div class="information text-center my-5">
                    <h6 class="fw-bold">More Information</h6>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem.</p>
                </div>
                <div class="contact text-center my-5">
                    <h6 class="fw-bold">Contact</h6>
                    <div class="row mx-auto w-10">
                        <div class="col-3">
                            <a href="#">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Instagram_logo_2022.svg/1024px-Instagram_logo_2022.svg.png" width="50%" alt="">
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="#">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Instagram_logo_2022.svg/1024px-Instagram_logo_2022.svg.png" width="50%" alt="">
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="#">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Instagram_logo_2022.svg/1024px-Instagram_logo_2022.svg.png" width="50%" alt="">
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="#">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Instagram_logo_2022.svg/1024px-Instagram_logo_2022.svg.png" width="50%" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End Information -->

            <!-- Start Media Partner -->
            <div class="container-fluid text-center bg-light">
                <h4 class="py-3">Media Partner</h4>
                <h6 class="pb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</h6>
                <div class="row">
                    <div class="col-3 mb-3"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/1024px-Google_2015_logo.svg.png" alt="" width="50%"></div>
                    <div class="col-3 mb-3"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/1024px-Google_2015_logo.svg.png" alt="" width="50%"></div>
                    <div class="col-3 mb-3"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/1024px-Google_2015_logo.svg.png" alt="" width="50%"></div>
                    <div class="col-3 mb-3"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/1024px-Google_2015_logo.svg.png" alt="" width="50%"></div>
                    <div class="col-3 mb-3"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/1024px-Google_2015_logo.svg.png" alt="" width="50%"></div>
                    <div class="col-3 mb-3"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/1024px-Google_2015_logo.svg.png" alt="" width="50%"></div>
                    <div class="col-3 mb-3"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/1024px-Google_2015_logo.svg.png" alt="" width="50%"></div>
                    <div class="col-3 mb-3"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/1024px-Google_2015_logo.svg.png" alt="" width="50%"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Media Partner -->
</div>
<!-- https://dribbble.com/shots/9779129-Mobile-App-Template-Design-for-Divi -->