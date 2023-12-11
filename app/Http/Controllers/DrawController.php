<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DrawController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        return view('layouts.content.draw.draw-create');
    } //
}
