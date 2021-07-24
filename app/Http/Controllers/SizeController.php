<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::all();

        return view('admin.size.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.size.create');
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
            'size' => 'required|unique:sizes,size',
        ]);

        $size = new Size();
        $size->size = $request->size;
        $size->status = 1;
        $size->save();

        $request->session()->flash('message', 'Size Added Successfully');

        return redirect()->route('admin.size.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        return view('admin.size.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        $request->validate([
            'size' => 'required|unique:colors,color',
        ]);

        $size->update([
            'size' => $request->size,
        ]);

        $request->session()->flash('message', 'Size Updated Successfully');
        return redirect()->route('admin.size.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size, Request $request)
    {
        $size->delete();

        $request->session()->flash('message', 'Size Deleted Successfully');
        return redirect()->route('admin.size.index');
    }

    public function status($status, Size $size, Request $request)
    {
        $size->status = $status;
        $size->save();

        $request->session()->flash('message', 'Status Updated Successfully');
        return redirect()->route('admin.size.index');
    }
}
