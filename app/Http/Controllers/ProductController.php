<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
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
            'name' => 'required',
            'image' => 'required',
            'slug' => 'required|unique:products,slug,' . $request->post('id'),
            // 'brand' => 'required',
            // 'model' => 'required',
            // 'short_desc' => 'required',
            // 'desc' => 'required',
            // 'keywords' => 'required',
            // 'technical_spacification' => 'required',
            // 'uses' => 'required',
            // 'warranty' => 'required',
        ]);

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->brand = $request->brand;
        $product->model = $request->model;
        $product->short_desc = $request->short_desc;
        $product->desc = $request->desc;
        $product->keywords = $request->keywords;
        $product->technical_spacification = $request->technical_spacification;
        $product->uses = $request->uses;
        $product->warranty = $request->warranty;
        $product->status = 1;
        $product->save();

        $request->session()->flash('message', 'Product Added Successfully');
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('admin.product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',

            'slug' => 'required|unique:products,slug,' . $request->post('id'),
        ]);

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'image' => $request->image,
            'slug' => $request->slug,
            'brand' => $request->brand,
            'model' => $request->model,
            'short_desc' => $request->short_desc,
            'desc' => $request->desc,
            'keywords' => $request->keywords,
            'technical_spacification' => $request->technical_spacification,
            'uses' => $request->uses,
            'warranty' => $request->warranty,
        ]);

        $request->session()->flash('message', 'Product Updated Successfully');
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        request()->session()->flash('message', 'Product Deleted Successfully');
        return redirect()->route('admin.product.index');
    }

    public function status($status, Product $product, Request $request)
    {
        $product->status = $status;
        $product->save();

        request()->session()->flash('message', 'Product Status Updated Successfully');
        return redirect()->route('admin.product.index');
    }
}
