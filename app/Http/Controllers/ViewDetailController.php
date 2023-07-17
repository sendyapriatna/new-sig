<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Location;

use Illuminate\Http\Request;

class ViewDetailController extends Controller
{
    public function index($id)
    {
        $data = DB::table('location_tables')->where('id', $id)->first();
        return view('layouts.content.detail-wisata', ['data' => $data]);
    }


    public function index2($id)
    {
        $data = DB::table('location_tables')->where('id', $id)->first();
        return view('layouts.map.map-gis2', ['data' => $data]);
    }
}
