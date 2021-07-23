<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::all();
        return view('admin.color.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'color' => 'required',
        ]);

        $color = new Color();
        $color->color = $request->color;
        $color->status = 1;
        $color->save();

        $request->session()->flash('message', 'Color Added Successfully');
        return redirect()->route('admin.color.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        return view('admin.color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        $request->validate([
            'color' => 'required',
        ]);

        $color->update([
            'color' => $request->color,
        ]);

        $request->session()->flash('message', 'Color Updated Successfully');
        return redirect()->route('admin.color.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color, Request $request)
    {
        $color->delete();

        $request->session()->flash('message', 'Color Deleted Successfully');
        return redirect()->route('admin.color.index');
    }

    public function status($status, Color $color, Request $request)
    {
        $color->status = $status;
        $color->save();

        $request->session()->flash('message', 'Status Updated Successfully');
        return redirect()->route('admin.category.index');
    }
}
