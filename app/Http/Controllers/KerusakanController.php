<?php

namespace App\Http\Controllers;

use App\Models\Kerusakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KerusakanController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        $kerusakan = DB::table('kerusakan_tables')->count();
        return view('layouts.content.kerusakan.kerusakan', ['kerusakan_tables' => Kerusakan::orderBy('id', 'desc')->paginate(10)], compact('kerusakan'));
    }
    public function create()
    {
        $this->authorize('admin');
        // $shelter = DB::table('shelter_tables')->count();
        return view('layouts.content.kerusakan.kerusakan-create');
    }

    public function view()
    {
        $this->authorize('admin');
        return view('layouts.content.kerusakan.kerusakan-view');
    }
    public function store(Request $request)
    {
        $this->authorize('admin');
        $validatedData = $request->validate([
            'name' => 'required',
            'polygon' => 'required',
            'density' => 'required',
        ]);

        $post = Kerusakan::Create($validatedData);

        if ($post) {
            return redirect('/kerusakan/create')->with('toast_success', 'Task Created Successfully!');
        } else {
            return redirect()
                ->back()
                ->withInput()->with('toast_warning', 'Some problem occurred, please try again');
        }
    }
    public function findPolygon($id)
    {
        $this->authorize('admin');

        $data = DB::table('kerusakan_tables')->where('id', $id)->first();
        // dd($data->is_active);
        if ($data->is_active == 'Active') {
            $post = DB::table('kerusakan_tables')->where('id', $id)->update([
                'is_active' => 'NonActive',
            ]);
            if ($post) {
                return redirect('/kerusakan/edit/' . $data->id)->with('toast_success', 'kerusakan Non Active!');
            } else {
                return redirect()
                    ->back()
                    ->withInput()->with('toast_warning', 'Some problem occurred, please try again');
            }
        } else {
            $post = DB::table('kerusakan_tables')->where('id', $id)->update([
                'is_active' => 'Active',
            ]);
            if ($post) {
                return redirect('/kerusakan/edit/' . $data->id)->with('toast_success', 'Polygon is Active!');
            } else {
                return redirect()
                    ->back()
                    ->withInput()->with('toast_warning', 'Some problem occurred, please try again');
            }
        }
    }

    public function detail($id)
    {
        $this->authorize('admin');
        $data = DB::table('kerusakan_tables')->where('id', $id)->first();
        return view('layouts.content.kerusakan.kerusakan-detail', ['data' => $data]);
    }

    public function update($id)
    {
        $this->authorize('admin');
        $data = DB::table('kerusakan_tables')->where('id', $id)->first();
        return view('layouts.content.kerusakan.kerusakan-edit', ['data' => $data]);
    }

    public function updated(Request $request)
    {
        $this->validate($request, [
            'name',
            'density',
            'is_active',
        ]);

        $post = DB::table('kerusakan_tables')->where('id', $request->id)->update([
            'name' => $request->name,
            'density' => $request->density,
            'is_active' => $request->is_active,
        ]);

        if ($post) {
            return redirect('/kerusakan/edit/' . $request->id)->with('toast_success', 'Task Updated Successfully!');
        } else {
            return redirect()
                ->back()
                ->withInput()->with('toast_warning', 'Some problem occurred, please try again');
        }
    }

    public function delete($id)
    {
        $post = DB::table('kerusakan_tables')->where('id', $id)->delete();
        if ($post) {
            return redirect('/dashboard')->with('toast_success', 'Task Deleted Successfully!');
        } else {
            return redirect()
                ->back()
                ->withInput()->with('toast_warning', 'Some problem occurred, please try again');
        }
    }
    // public function delete2($id)
    // {
    //     $post = DB::table('polygon_tables')->where('id', $id)->delete();
    //     if ($post) {
    //         return redirect('/viewDraw')->with('toast_success', 'Task Deleted Successfully!');
    //     } else {
    //         return redirect()
    //             ->back()
    //             ->withInput()->with('toast_warning', 'Some problem occurred, please try again');
    //     }
    // }
}
