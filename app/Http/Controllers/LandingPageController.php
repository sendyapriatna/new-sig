<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function index()
    {
        $location = DB::table('location_tables')->count();
        return view('layouts.dashboard.landing-page', compact('location'));
    }
    public function index2()
    {
        $location = DB::table('location_tables')->count();
        alert()->html('Selamat Datang di Aplikasi Sistem Informasi Geografis Pemetaan Dampak Tsunami di Kota Pangandaran Berbasis Website', "
        Petunjuk Penggunaan :<br>
        1. Zoom In untuk mendekatkan objek pada layar<br>
        2. Zoom Out untuk menjauhkan objek pada layar<br>
        3. Home untuk menampilkan tampilan awal<br>
        4. Track Location untuk mengetahui posisi kita<br>
        5. Menu Legend untuk menampilkan legenda peta<br>
        6. Menu Layers untuk mengaktifkan/Non aktifkan lapisan peta yang ingin di tampilkan<br>
        7. Menu Basemap Gallery untuk mengganti Basemap peta<br>
        8. Menu Overview Map untuk menampilkan inset peta<br>
        9. Klik Icon untuk menampilkan informasi fasilitas<br> 
        10. Menu Details untuk melihat keterangan mengenai fasilitas")->persistent('Dismiss');
        return view('layouts.dashboard.welcome', compact('location'));
    }

    public function titik()
    {
        $result = DB::table('location_tables')->select('id', 'nama', 'latitude', 'longitude', 'alamat', 'tiket', 'image')->get();
        return json_encode($result);
    }

    public function titikShelter()
    {
        $result = DB::table('shelter_tables')->select('id', 'nama', 'latitude', 'longitude', 'alamat', 'keterangan', 'kapasitas', 'image')->get();
        return json_encode($result);
    }

    public function titikTikum()
    {
        $result = DB::table('tikum_tables')->select('id', 'nama', 'latitude', 'longitude', 'alamat', 'keterangan', 'kapasitas', 'image')->get();
        return json_encode($result);
    }

    public function titikPolygon()
    {
        $result = DB::table('polygon_tables')->select('id', 'polygon', 'tipe', 'is_active')->get();

        return json_encode($result);
    }
    public function viewPolygon()
    {
        $result = DB::table('polygon_tables')->select('id', 'polygon', 'tipe', 'is_active')->get();

        return json_encode($result);
    }
    public function viewKerusakan()
    {
        $result = DB::table('kerusakan_tables')->select('id', 'polygon', 'name', 'density', 'is_active')->get();

        return json_encode($result);
    }

    // buat cek dump (gak butuh)
    public function lokasi($id = '')
    {
        $result2 = DB::table('location_tables')->select('nama', 'alamat', 'tiket')->where('id', $id)->get();
        return json_encode($result2);
    }


    // VIEW DATA WISATA
    public function dataWisata()
    {
        return view('layouts.content.data-wisata', ['location_tables' => Location::orderBy('id', 'desc')->paginate(10)]);
    }
}
