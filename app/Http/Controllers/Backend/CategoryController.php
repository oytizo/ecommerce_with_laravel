<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Backend\category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.category.managecategory');
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
        $validator= Validator::make($request->all(),[
            'name'=>'required',
            'des'=>'required',
            'tag'=>'required',
            'status'=>'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'success'=>'failed',
                "errors"=>$validator->getMessageBag()
            ]);
        }
        else{
            $cat=new category;

            $cat->name=$request->name;
            $cat->des=$request->des;
            $cat->tag=$request->tag;
            $cat->status=$request->status;
            $cat->save();
            return response()->json([
                'msg'=>'Category Added Successfully'
                
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showcategory()
    {
     $category= category::all();
     return response()->json([
        'data'=>$category
     ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function catedit($id)
    {
        $category= category::find($id);
       if($category){
        return response()->json([
            'data'=>$category
         ]);
       }
       else{
        return response()->json([
            'data'=>"Data Not Found"
         ]);
       }
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
        $category=category::find($id);

        $request->validate([
            'name'=>'required',
            'des'=>'required',
            'tag'=>'required',
            'category'=>'required'
        ]);

        $category->name=$request->name;
        $category->des=$request->des;
        $category->tag=$request->tag;
        $category->status=$request->category;

        $active=$category->update();

        if($active){
            return response()->json([
                'data'=>"Successfully Updated"
            ]);
        }
        else{
            return response()->json([
                'data'=>"Data Not Found"
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletecat($id)
    {
        $category=category::find($id);
        $category->delete();

        return response()->json([
         'data'=>"Delete Successfully"
        ]);
    }
}
