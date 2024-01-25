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
