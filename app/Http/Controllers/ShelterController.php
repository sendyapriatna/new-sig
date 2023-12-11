<?php

namespace App\Http\Controllers;

use App\Models\Shelter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ShelterController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        return view('layouts.content.shelter.shelter-create');
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nama' => 'required|string|min:5',
            'latitude' => 'required',
            'longitude' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required',
            'kontak' => 'required',
            'kapasitas' => 'required',
            'image' => 'image|file|max:2048',
        ]);


        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        $post = Shelter::Create($validatedData);

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
        $data = DB::table('shelter_tables')->where('id', $id)->first();
        return view('layouts.content.shelter.shelter-edit', ['data' => $data]);
    }
    public function updated(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|min:5',
            'latitude' => 'required',
            'longitude' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required',
            'kontak' => 'required',
            'kapasitas' => 'required',
            'image' => 'image|file|max:2048',
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        $post = DB::table('shelter_tables')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
            'kontak' => $request->kontak,
            'kapasitas' => $request->kapasitas,
            'image' => $request->file('image')->store('post-image')

        ]);

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
        $post = DB::table('shelter_tables')->where('id', $id)->delete();
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
        $data = DB::table('shelter_tables')->where('id', $id)->first();
        return view('layouts.content.shelter.shelter-detail', ['data' => $data]);
    }
}
