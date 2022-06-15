<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Items;
use App\Models\Backend\Gallery;
use File;
use Image;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Items::all();
        return view('backend.pages.item.manageitem',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.item.additem');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->pic){
            $image=$request->file('pic');
            $customname=rand().'.'.$image->getClientOriginalExtension();
            $location=public_path('backend/items/'.$customname);
            Image::make($image)->save($location);

            $item= new Items();
            $item->item_code=$request->item_code;
            $item->name=$request->name;
            $item->des=$request->des;
            $item->pic=$customname;

            $item->save();

            // dd($request);
        }
        if($request->gallery){
            $galleryimages=$request->file('gallery');
            foreach($galleryimages as $galleryimage){
                $gallerycustomname=rand().'.'.$galleryimage->getClientOriginalExtension();
                $gallerylocation=public_path('backend/items/gallery/'.$gallerycustomname);
                Image::make($galleryimage)->save($gallerylocation);

                $galleryitem= new Gallery();
                $galleryitem->item_code=$request->item_code;
                $galleryitem->gallery=$gallerycustomname;

                // dd($galleryitem);

              $galleryitem->save();
            }
           
        }
        return redirect()->route('item.manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items=Items::find($id);
        $gallery=Gallery::where('item_code',$items->item_code)->get();
      
         return view('backend.pages.item.edititem',compact('items','gallery'));
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
    public function delete($id)
    {
        $item=Items::find($id);
        $gallery=Gallery::where('item_code',$item->item_code)->get();
        if(File::exists('backend/items/'.$item->pic)){
            File::delete('backend/items/'.$item->pic);
            foreach($gallery as $delgallery){
                File::delete('backend/items/gallery/'.$delgallery->gallery);
                $delgallery->delete();
            }
        }
     
        $item->delete();

        return redirect()->route('item.manage');


    }
    function deletesinglepic($id){
        $gallery=Gallery::find($id);
        if(File::exists('backend/items/gallery/'.$gallery->gallery)){
            File::delete('backend/items/gallery/'.$gallery->gallery);
            $gallery->delete();
        }
        return back();
    }

    function singleupdate(Request $res,$id){
        $gallery=Gallery::find($id);
        if(File::exists('backend/items/gallery/'.$gallery->gallery)){
            File::delete('backend/items/gallery/'.$gallery->gallery);
        }
        $image=$res->file($id);
        $customname=rand().'.'.$image->getClientOriginalExtension();
        $location=public_path('backend/items/gallery/'.$customname);
        Image::make($image)->save($location);

        $gallery->gallery=$customname;
        $gallery->update();
        return back();
    }
}
