@include('layouts.app3')

@section('title3', 'Landing Page')

<div class="container-fluid">
    <div class="mt-4 px-5">
        <h2 class="section-title text-white px-5">Tsunami Danger</h2>
        <p class="section-lead text-white px-5">Selamat Datang Di Website GIS Tsunami Pangandaran.</p>
        <!-- <p class="text-white">Copyright &copy; 2023 Design By <a href="https://www.instagram.com/sndyprtn/">Sendy Apriatna</a></p> -->

    </div>
    <section class="section px-5">
        <div class="mt-1">
            @include('layouts.map.main-map')
        </div>
    </section>
</div>