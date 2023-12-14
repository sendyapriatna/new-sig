<?php

namespace App\Http\Controllers;

use App\Models\Polygon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PolygonController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        return view('layouts.content.draw.draw-create');
    }

    public function store(Request $request)
    {
        $this->authorize('admin');
        $validatedData = $request->validate([
            'polygon' => 'required',
            'tipe' => 'required',
        ]);

        $post = Polygon::Create($validatedData);

        if ($post) {
            return redirect('/dashboard')->with('toast_success', 'Task Created Successfully!');
        } else {
            return redirect()
                ->back()
                ->withInput()->with('toast_warning', 'Some problem occurred, please try again');
        }
    }
    public function delete($id)
    {
        $post = DB::table('polygon_tables')->where('id', $id)->delete();
        if ($post) {
            return redirect('/')->with('toast_success', 'Task Deleted Successfully!');
        } else {
            return redirect()
                ->back()
                ->withInput()->with('toast_warning', 'Some problem occurred, please try again');
        }
    }
}
