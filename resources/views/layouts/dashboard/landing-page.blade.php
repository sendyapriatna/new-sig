@include('layouts.app')
@section('title', 'Page Title')
<div class="container-fluid">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <section>
        <div class="">
            <!-- <h2 class="my-3 text-center">PETA GEMPA</h2> -->
            <!-- Start Maps -->
            @include('layouts.map.main-map')
            <!-- End Maps -->
        </div>
    </section>
</div>
<div style="background-color: #28CB8B; min-height:70px; color:#fff;" class="d-flex align-items-center justify-content-center">
    <p>Copyright &copy; 2023</p>
</div>