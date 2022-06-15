<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Backend\Subcategory;
use App\Models\Backend\category;
use Image;
use File;
use PhpParser\Node\Expr\New_;



class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory= Subcategory::all();
        return view('backend/pages/subcategory/managesubcategory',compact('subcategory'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catname=category::all();
        return view('backend.pages.subcategory.addsubcategory',compact('catname'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate ([
            'catId'=>'required',
            'name'=>'required',
            'des'=>'required',
            'img'=>'required',
            'status'=>'required',
        ]);

        $subcategory=new Subcategory;

        $subcategory->catId=$request->catId;
        $subcategory->subcatname=$request->name;
        $subcategory->slug=Str::slug($request->name);
        $subcategory->des=$request->des;
        $subcategory->status=$request->status;

        if($request->img){
            $image= $request->file('img');
            $nameCustom=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('backend/subcategoryimages/'.$nameCustom);
            Image::make($image)->save($location);

            $subcategory->img=$nameCustom;
        }
        $subcategory->save();
        return redirect()->route('subcategorymanage');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subcategory=Subcategory::find($id);
        $catname=category::all();
       
       return view('backend.pages.subcategory.editsubcategory', compact('subcategory','catname'));
        //return view('backend.pages.subcategory.managesubcategory',compact('subcategory'));

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
         $subcategory=Subcategory::find($id);

        $subcategory->catId=$request->catId;
        $subcategory->subcatname=$request->name;
        $subcategory->slug=Str::slug($request->name);
        $subcategory->des=$request->des;
        $subcategory->status=$request->status;

        if(!empty($request->img)){
            if(File::exists('backend/subcategoryimages/'.$subcategory->img)){
                File::delete('backend/subcategoryimages/'.$subcategory->img);
            }
            $image= $request->file('img');
            $nameCustom=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('backend/subcategoryimages/'.$nameCustom);
            Image::make($image)->save($location);

            $subcategory->img=$nameCustom;
        }
        $subcategory->update();
        return redirect()->route('subcategorymanage');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       $subcategory=Subcategory::find($id);
       File::delete('backend/subcategoryimages/'.$subcategory->img);
       $subcategory->delete();
return redirect()->route('subcategorymanage');

    }
}
