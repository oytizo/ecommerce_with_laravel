<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;

class MyApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::all();
      if($product){
        return response()->json([
            'status'=>'200',
            'msg'=>'data found',
            'alldata'=>$product
      ]);
      }
      else{
        return response()->json([
            'status'=>'400',
            'msg'=>'data not found'
      ]);
      }
    }

    public function add(Request $res)
    {
        $product=new Product();
        $product->pname=$res->pname;
        $product->discription=$res->discription;
        $product->category=$res->category;
        $product->size=$res->size;
        $product->costPrice=$res->costPrice;
        $product->saleprice=$res->saleprice;
        $product->quantity=$res->quantity;
        $product->status=$res->status;
        $cheack=$product->save();
      if($cheack){
        return response()->json([
            'status'=>'200',
            'msg'=>'data found',
            'alldata'=>$product
      ]);
      }
      else{
        return response()->json([
            'status'=>'400',
            'msg'=>'data not found'
      ]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
