<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Shelter;
use App\Models\Tikum;
use App\Models\Polygon;
use App\Models\Kerusakan;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
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
            'image' => 'image|file|max:2048',
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                if ($request->oldImage == "/post-image-profile/default/avatar-1.png") {
                    $validatedData['image'] = $request->file('image')->store('post-image-profile');
                } else {
                    Storage::delete($request->oldImage);
                }
            }
            $validatedData['image'] = $request->file('image')->store('post-image-profile');

            $post = DB::table('users')->where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'image' => $request->file('image')->store('post-image-profile')

            ]);
        } else {
            $post = DB::table('users')->where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
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

    public function updated2(Request $request)
    {
        // $id2 = $request->id2;
        $this->validate($request, [
            'oldpasswordInput' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required', 'string', 'min:8']
        ]);
        $auth = DB::table('users')->find($request->id2);

        $passwordbaru = preg_replace("/[^a-zA-Z0-9]/", "", $request->password);
        $password_confirmation = preg_replace("/[^a-zA-Z0-9]/", "", $request->password_confirmation);

        $data = strlen($passwordbaru);
        $data2 = strlen($password_confirmation);

        // The passwords matches
        if (!Hash::check($request->get('oldpasswordInput'), $auth->password)) {
            return redirect()
                ->back()
                ->withInput()->with('toast_warning', 'Password not match!');
        }

        // Current password and new password same
        if (strcmp($request->get('oldpasswordInput'), $request->password) == 0) {
            return redirect()
                ->back()
                ->withInput()->with('toast_warning', 'Some problem occurred, please try again');
        }

        if ($request->password != $request->password_confirmation) {
            return redirect()
                ->back()
                ->withInput()->with('toast_warning', 'New password and password confirmation not match');
        }

        $user =  User::find($auth->id);
        $user->password =  Hash::make($request->password);
        $output = $user->save();
        if ($output == true) {
            return redirect('/dashboard/profil/' . $request->id2)->with('toast_success', 'Task Updated Successfully!');
        } else {
            return redirect()
                ->back()
                ->withInput()->with('toast_warning', 'Some problem occurred, please try again');
        }
    }
}
