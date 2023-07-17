<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('layouts.dashboard.landing-page');
    }
    public function titik()
    {
        $result = DB::table('location_tables')->select('nama', 'latitude', 'longitude', 'alamat', 'tiket', 'image')->get();
        return json_encode($result);
    }

    // buat cek dump (gak butuh)
    public function lokasi($id = '')
    {
        $result2 = DB::table('location_tables')->select('nama', 'alamat', 'tiket')->where('id', $id)->get();
        return json_encode($result2);
    }
}
