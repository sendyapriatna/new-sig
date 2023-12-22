<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Shelter;
use App\Models\Tikum;
use App\Models\Polygon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        $users = DB::table('users')->count();
        $tikum = DB::table('tikum_tables')->count();
        $shelter = DB::table('shelter_tables')->count();
        $polygon = DB::table('polygon_tables')->count();
        return view('layouts.dashboard.dashboard', ['tikum_tables' => Tikum::orderBy('id', 'desc')->paginate(10), 'shelter_tables' => Shelter::orderBy('id', 'desc')->paginate(10), 'polygon_tables' => Polygon::orderBy('id', 'asc')->paginate(10)], compact('users', 'tikum', 'shelter', 'polygon'));
    }
}
