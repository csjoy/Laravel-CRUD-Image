<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;
use Image;
use File;

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
        return view('backend/pages/manageproduct', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/pages/addproduct');
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
            'description' => 'required',
            'image' => 'required',
            'catname' => 'required',
            'brandname' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->category_name = $request->catname;
        $product->brand_name = $request->brandname;
        $product->description = $request->description;
        $product->status = $request->status;

        if ($request->image) {
            $image = $request->file('image');
            $imgName = time() . '.' . $image->getClientOriginalExtension();
            $imgLocation = public_path('/backend/img/' . $imgName);
            Image::make($image->getRealPath())->save($imgLocation);
            $product->image = $imgName;
        }

        $product->save();
        return redirect()->route('manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('backend/pages/editproduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required',
            'catname'=>'required',
            'brandname'=>'required',
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->category_name = $request->catname;
        $product->brand_name = $request->brandname;
        $product->description = $request->description;
        $product->status = $request->status;

        if ($request->image) {
            $image = $request->file('image');
            $imgName = time().'.'.$image->getClientOriginalExtension();
            $imgLocation = public_path('/backend/img/'.$imgName);
            Image::make($image->getRealPath())->save($imgLocation);
            $product->image = $imgName;
        }

        $product->update();
        return redirect()->route('manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('manage');
    }
}
