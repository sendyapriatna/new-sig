<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tikum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TikumController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        return view('layouts.content.tikum.tikum-create');
    }
    public function store(Request $request)
    {
        $this->authorize('admin');
        $validatedData = $request->validate([
            'nama' => 'required|string|min:5',
            'latitude' => 'required',
            'longitude' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required',
            'kapasitas' => 'required',
            'image' => 'image|file|max:2048',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        $post = Tikum::Create($validatedData);

        if ($post) {
            return redirect('/dashboard')->with('toast_success', 'Task Created Successfully!');
        } else {
            return redirect()
                ->back()
                ->withInput()->with('toast_warning', 'Some problem occurred, please try again');
        }
    }
    public function update($id)
    {
        $this->authorize('admin');
        $data = DB::table('tikum_tables')->where('id', $id)->first();
        return view('layouts.content.tikum.tikum-edit', ['data' => $data]);
    }
    public function updated(Request $request)
    {
        $this->authorize('admin');
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-image');

            $post = DB::table('tikum_tables')->where('id', $request->id)->update([
                'nama' => $request->nama,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'alamat' => $request->alamat,
                'keterangan' => $request->keterangan,
                'kapasitas' => $request->kapasitas,
                'image' => $request->file('image')->store('post-image')

            ]);
        } else {
            $post = DB::table('tikum_tables')->where('id', $request->id)->update([
                'nama' => $request->nama,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'alamat' => $request->alamat,
                'keterangan' => $request->keterangan,
                'kapasitas' => $request->kapasitas,
                'image' => $request->oldImage
            ]);
        }
        if ($post) {
            return redirect('/dashboard')->with('toast_success', 'Task Updated Successfully!');
        } else {
            return redirect()
                ->back()
                ->withInput()->with('toast_warning', 'Some problem occurred, please try again');
        }
    }
    public function delete($id)
    {
        $this->authorize('admin');
        $post = DB::table('tikum_tables')->where('id', $id)->delete();
        if ($post) {
            return redirect('/dashboard')->with('toast_success', 'Task Deleted Successfully!');
        } else {
            return redirect()
                ->back()
                ->withInput()->with('toast_warning', 'Some problem occurred, please try again');
        }
    }
    public function detail($id)
    {
        $this->authorize('admin');
        $data = DB::table('tikum_tables')->where('id', $id)->first();
        return view('layouts.content.tikum.tikum-detail', ['data' => $data]);
    }
}
