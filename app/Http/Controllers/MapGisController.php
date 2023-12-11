<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Location;

use Illuminate\Http\Request;

class MapGisController extends Controller
{
    public function index()
    {
        return view('layouts.map.map-gis');
    }
    // public function titik()
    // {
    //     $result = DB::table('location_tables')->select('id', 'nama', 'latitude', 'longitude', 'alamat', 'tiket', 'image')->get();
    //     return json_encode($result);
    // }
    // public function titikShelter()
    // {
    //     $result = DB::table('shelter_tables')->select('id', 'nama', 'latitude', 'longitude', 'alamat', 'keterangan', 'kapasitas', 'image')->get();
    //     return json_encode($result);
    // }

    // buat cek dump (gak butuh)
    public function lokasi($id = '')
    {
        $result2 = DB::table('location_tables')->select('nama', 'alamat', 'tiket')->where('id', $id)->get();
        return json_encode($result2);
    }
}
