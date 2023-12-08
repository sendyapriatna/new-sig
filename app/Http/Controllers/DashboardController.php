<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Shelter;
use App\Models\Tikum;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->count();
        $tikum = DB::table('tikum_tables')->count();
        $shelter = DB::table('shelter_tables')->count();
        return view('layouts.dashboard.dashboard', ['tikum_tables' => Tikum::orderBy('id', 'desc')->paginate(10), 'shelter_tables' => Shelter::orderBy('id', 'desc')->paginate(10)], compact('users', 'tikum', 'shelter'));
    }
    // public function index2()
    // {
    //     return view('layouts.content.db-data', ['location_tables' => Location::orderBy('id', 'desc')->paginate(7)]);
    // }
    public function index3()
    {
        return view('layouts.content.db-add-data');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|min:5',
            'latitude' => 'required',
            'longitude' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'kontak' => 'required',
            'tiket' => 'required',
            'image' => 'image|file|max:2048',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-image');
        }
        $post = Location::Create($validatedData);

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
        $data = DB::table('location_tables')->where('id', $id)->first();
        return view('layouts.content.db-edit-data', ['data' => $data]);
    }
    public function updated(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|min:5',
            'latitude' => 'required',
            'longitude' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'kontak' => 'required',
            'tiket' => 'required',
        ]);

        $post = DB::table('location_tables')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak,
            'tiket' => $request->tiket,

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
        $post = DB::table('location_tables')->where('id', $id)->delete();
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
        $data = DB::table('location_tables')->where('id', $id)->first();
        return view('layouts.content.db-detail-data', ['data' => $data]);
    }
}
