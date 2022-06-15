<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::orderby('id','asc')->get();
        return view('backend.pages.product.productmanage',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.product.addproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $product= new Product();
       $request->validate([
          'pname'=>'required|min:5',
          'description'=>'required',
          'costprice'=>'required',
          'saleprice'=>'required',
          'quantity'=>'required'
       ]);

       $product->pname=$request->pname;
       $product->discription=$request->description;
       $product->category=$request->category;
       $product->size=$request->size;
       $product->costprice=$request->costprice;
       $product->saleprice=$request->saleprice;
       $product->quantity=$request->quantity;
       $product->status=$request->status;
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
        $product=Product::find($id);
        return view('backend.pages.product.editproduct', compact('product') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $product=Product::find($id);
        $request->validate([
           'pname'=>'required|min:5',
           'description'=>'required|max:100',
           'costprice'=>'required',
           'saleprice'=>'required',
           'quantity'=>'required'
        ]);
 
        $product->pname=$request->pname;
        $product->discription=$request->description;
        $product->category=$request->category;
        $product->size=$request->size;
        $product->costprice=$request->costprice;
        $product->saleprice=$request->saleprice;
        $product->quantity=$request->quantity;
        $product->status=$request->status;
        $product->update();
        return redirect()->route('manage');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect()->route('manage');
    }
}
