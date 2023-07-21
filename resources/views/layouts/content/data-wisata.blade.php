@include('layouts.app')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Ticket</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($location_tables as $index => $item)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->deskripsi}}</td>
                        <td>Rp.{{$item->tiket}}</td>
                        <td>{{$item->kontak}}</td>
                        <td>
                            <a href="/dashboard/detail/{{ $item->id}}" style="border-radius: 0.5em;" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>