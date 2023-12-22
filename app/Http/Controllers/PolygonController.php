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

    public function view()
    {
        $this->authorize('admin');
        return view('layouts.content.draw.draw-view');
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
            return redirect('/viewDraw')->with('toast_success', 'Task Created Successfully!');
        } else {
            return redirect()
                ->back()
                ->withInput()->with('toast_warning', 'Some problem occurred, please try again');
        }
    }
    public function findPolygon($id)
    {
        $this->authorize('admin');

        $data = DB::table('polygon_tables')->where('id', $id)->first();
        // dd($data->is_active);
        if ($data->is_active == 'Active') {
            $post = DB::table('polygon_tables')->where('id', $id)->update([
                'is_active' => 'NonActive',
            ]);
            if ($post) {
                return redirect('/viewDraw')->with('toast_success', 'Polygon Non Active!');
            } else {
                return redirect()
                    ->back()
                    ->withInput()->with('toast_warning', 'Some problem occurred, please try again');
            }
        } else {
            $post = DB::table('polygon_tables')->where('id', $id)->update([
                'is_active' => 'Active',
            ]);
            if ($post) {
                return redirect('/viewDraw')->with('toast_success', 'Polygon is Active!');
            } else {
                return redirect()
                    ->back()
                    ->withInput()->with('toast_warning', 'Some problem occurred, please try again');
            }
        }
    }

    public function update($id)
    {
        $this->authorize('admin');
        $data = DB::table('polygon_tables')->where('id', $id)->first();
        return view('layouts.content.draw.draw-edit', ['data' => $data]);
    }
    public function updated(Request $request)
    {
        $this->validate($request, [
            'tipe',
            'is_active',
        ]);

        $post = DB::table('polygon_tables')->where('id', $request->id)->update([
            'tipe' => $request->tipe,
            'is_active' => $request->is_active,
        ]);

        if ($post) {
            return redirect('/draw/edit/' . $request->id)->with('toast_success', 'Task Updated Successfully!');
        } else {
            return redirect()
                ->back()
                ->withInput()->with('toast_warning', 'Some problem occurred, please try again');
        }
    }

    // public function delete($id)
    // {
    //     $post = DB::table('polygon_tables')->where('id', $id)->delete();
    //     if ($post) {
    //         return redirect('/')->with('toast_success', 'Task Deleted Successfully!');
    //     } else {
    //         return redirect()
    //             ->back()
    //             ->withInput()->with('toast_warning', 'Some problem occurred, please try again');
    //     }
    // }
    public function delete2($id)
    {
        $post = DB::table('polygon_tables')->where('id', $id)->delete();
        if ($post) {
            return redirect('/viewDraw')->with('toast_success', 'Task Deleted Successfully!');
        } else {
            return redirect()
                ->back()
                ->withInput()->with('toast_warning', 'Some problem occurred, please try again');
        }
    }
}
