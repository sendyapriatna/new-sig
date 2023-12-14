@include('layouts.app3')

<div class="container-fluid">
    <div class="mt-4 px-5">
        <a style="text-decoration: none;" href="/">
            <h2 class="section-title text-white px-5">PangandaranWEBGIS</h2>
        </a>
        <p class="section-lead text-white px-5">Selamat Datang Di Website GIS Tsunami Pangandaran.</p>
        <!-- <p class="text-white">Copyright &copy; 2023 Design By <a href="https://www.instagram.com/sndyprtn/">Sendy Apriatna</a></p> -->

    </div>
    <section class="section px-5">
        <div class="row mt-1  px-5">
            <div class="col-md-6">
                @include('layouts.map.route-map-detail')
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <th colspan="2"><img class="img-fluid" src="/storage/{{$data->image}}"></th>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Tempat</label>
                    <input type="text" style="border-radius: 0.5em;" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{$data->nama}}" readonly>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" style="border-radius: 0.5em;" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{$data->alamat}}" readonly>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" style="border-radius: 0.5em;" class="form-control @error('Keterangan') is-invalid @enderror" name="keterangan" value="{{$data->keterangan}}" readonly>
                </div>
                <div class="mb-3">
                    <label for="kontak" class="form-label">Contact</label>
                    <input type="text" style="border-radius: 0.5em;" class="form-control @error('kontak') is-invalid @enderror" name="kontak" value="{{$data->kontak}}" readonly>
                </div>
                <div class="mb-3">
                    <label for="kapasitas" class="form-label">Kapasitas</label>
                    <input type="text" style="border-radius: 0.5em;" class="form-control @error('kapasitas') is-invalid @enderror" name="kapasitas" value="{{$data->kapasitas}}" readonly>
                </div>
            </div>
        </div>
    </section>
</div>