<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Location;

use Illuminate\Http\Request;

class ViewDetailShelterController extends Controller
{
    public function detailShelter($id)
    {
        $data = DB::table('shelter_tables')->where('id', $id)->first();
        return view('layouts.content.detail.detail-shelter', ['data' => $data]);
    }
    public function detailTikum($id)
    {
        $data = DB::table('tikum_tables')->where('id', $id)->first();
        return view('layouts.content.detail.detail-tikum', ['data' => $data]);
    }
}
