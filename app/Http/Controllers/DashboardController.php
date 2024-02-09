<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Shelter;
use App\Models\Tikum;
use App\Models\Polygon;
use App\Models\Kerusakan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        $users = DB::table('users')->count();
        $tikum = DB::table('tikum_tables')->count();
        $shelter = DB::table('shelter_tables')->count();
        $polygon = DB::table('polygon_tables')->count();
        $kerusakan = DB::table('kerusakan_tables')->count();
        return view('layouts.dashboard.dashboard', ['tikum_tables' => Tikum::orderBy('id', 'desc')->paginate(10), 'shelter_tables' => Shelter::orderBy('id', 'desc')->paginate(10), 'polygon_tables' => Polygon::orderBy('id', 'asc')->paginate(10), 'kerusakan_tables' => Kerusakan::orderBy('id', 'asc')->paginate(10)], compact('users', 'tikum', 'shelter', 'polygon', 'kerusakan'));
    }

    // Halaman Profil User
    public function profil($id)
    {
        $this->authorize('admin');
        $data = DB::table('users')->where('id', $id)->first();
        return view('layouts.content.profil.profil', ['data' => $data]);
    }
    public function updated(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => 'image|file|max:2048',
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-image');

            $post = DB::table('users')->where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'image' => $request->file('image')->store('post-image-profile')

            ]);
        } else {
            $post = DB::table('users')->where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'image' => $request->oldImage
            ]);
        }

        if ($post) {
            return redirect('/dashboard/profil/' . $request->id)->with('toast_success', 'Task Updated Successfully!');
        } else {
            return redirect()
                ->back()
                ->withInput()->with('toast_warning', 'Some problem occurred, please try again');
        }
    }
}
