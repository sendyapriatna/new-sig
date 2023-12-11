<?php

namespace App\Http\Controllers;

use App\Models\Polygon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PolygonController extends Controller
{
    public function index()
    {
        return view('layouts.content.draw.draw-create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'polygon' => 'required',
            'tipe' => 'required',
        ]);

        $post = Polygon::Create($validatedData);

        if ($post) {
            return redirect('/dashboard')
                ->with([
                    'success' => 'New post has been created!'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
}
