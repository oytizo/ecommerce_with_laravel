<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Backend\Items;
use App\Models\Backend\category;
use App\Http\Controllers\Controller;
use App\Models\Frontend\AddCarController;
use App\Http\Controllers\Frontend\AddCart;

class AddCart extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function view($id)
    {
       $item=AddCarController::where('user_id',$id)->get();
       return view('frontend.includes.view',compact('item'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $add = new AddCarController();
        $add->user_id = $request->user_id;
        $add->product_id = $request->pid;
        $add->name = $request->name;
        $add->price = $request->price;
        $add->qty = $request->qty;
        $add->pic = $request->pic;
        $add->save();


        if ($add) {
            return response()->json([
                'status' => 'success'
            ]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
                
        $items=Items::all();
        $categories=category::all();
        return view('frontend/master_template/master_template',compact('items','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $items=AddCarController::where('user_id',$id)->get();
       return response()->json([
           'status'=>'success',
           'data'=>$items
       ]);
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
    public function delete($id)
    {
        $items=AddCarController::find($id);
        $items->delete();
       return response()->json([
           'status'=>'success',
           
       ]); 
    }
}
