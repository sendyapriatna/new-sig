@include('layouts.app')
<div class="container-fluid">
    <div class=" d-flex justify-content-center">
        <div class="row">
            <div class="col">
                <table class="table table-borderless">
                    <tr>
                        <th>
                            <h6>Navigation</h6>
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
                            <h6>Information</h6>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2"><img style="width: 50%;border-radius: 0.5em;" src="/storage/{{$data->image}}"></th>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{$data->nama}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{$data->alamat}}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{$data->deskripsi}}</td>
                    </tr>
                    <tr>
                        <th>Contact</th>
                        <td>{{$data->kontak}}</td>
                    </tr>
                    <tr>
                        <th>ticket Price</th>
                        <td>{{$data->tiket}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>