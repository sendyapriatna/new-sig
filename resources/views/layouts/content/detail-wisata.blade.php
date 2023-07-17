@include('layouts.app')
<div class="container-fluid">
    <div class=" d-flex justify-content-center">
        <div class="row">
            <div class="col">
                <table class="table table-borderless">
                    <tr>
                        <th>
                            <h6>Lokasi</h6>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            @include('layouts.map.map-gis2')
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col">
                <table class="table table-borderless">
                    <tr>
                        <th>
                            <h6>Informasi Wisata</h6>
                        </th>
                    </tr>
                    <tr>
                        <th>Nama Wisata</th>
                        <td>{{$data->nama}}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{$data->alamat}}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi Wisata</th>
                        <td>{{$data->deskripsi}}</td>
                    </tr>
                    <tr>
                        <th>Harga Tiket</th>
                        <td>{{$data->tiket}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>