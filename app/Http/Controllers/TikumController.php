<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tikum;
use Illuminate\Support\Facades\DB;

class TikumController extends Controller
{
    public function index()
    {
        return view('layouts.content.tikum.tikum-create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|min:5',
            'latitude' => 'required',
            'longitude' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required',
            'kapasitas' => 'required',
        ]);

        $post = Tikum::Create($validatedData);

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
    public function update($id)
    {
        $data = DB::table('tikum_tables')->where('id', $id)->first();
        return view('layouts.content.tikum.tikum-edit', ['data' => $data]);
    }
    public function updated(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|min:5',
            'latitude' => 'required',
            'longitude' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required',
            'kapasitas' => 'required',
        ]);

        $post = DB::table('tikum_tables')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
            'kapasitas' => $request->kapasitas,

        ]);
        if ($post) {
            return redirect('/dashboard')
                ->with([
                    'success' => 'Post has been updated!'
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
    public function delete($id)
    {
        $post = DB::table('tikum_tables')->where('id', $id)->delete();
        if ($post) {
            return redirect('/dashboard')
                ->with([
                    'success' => 'Post has been deleted!'
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
    public function detail($id)
    {
        $data = DB::table('tikum_tables')->where('id', $id)->first();
        return view('layouts.content.tikum.tikum-detail', ['data' => $data]);
    }
}
