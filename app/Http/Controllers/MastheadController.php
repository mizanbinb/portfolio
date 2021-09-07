<?php

namespace App\Http\Controllers;

use App\Models\Masthead;
use Session;
use Illuminate\Http\Request;

class MastheadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mastheads = Masthead::all();
        return view('admin.masthead.index',compact('mastheads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.masthead.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // The request validated and this code will get run
        $this->validate($request, [
            'title' => 'required|string',
            'sub_title' => 'required|string',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $image_enc_name = rand(0,9999).md5($file->getClientOriginalName());
            $image_ext = $file->getClientOriginalExtension();
            $image_name = $image_enc_name.".".$image_ext;
            $destinationPath = "masthead_image";
            $file->move($destinationPath,$image_name);
        }else{
            $image_name = "";
        }

        $masthead           = new Masthead;
        $masthead->title     = $request->title;
        $masthead->sub_title    = $request->sub_title;
        $masthead->image    = $image_name;
        $masthead->save();

        Session::flash('success', 'Masthead created succesfully.');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Masthead  $masthead
     * @return \Illuminate\Http\Response
     */
    public function show(Masthead $masthead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Masthead  $masthead
     * @return \Illuminate\Http\Response
     */
    public function edit(Masthead $masthead)
    {
        return view('admin.masthead.edit',compact('masthead'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Masthead  $masthead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Masthead $masthead)
    {
        // The request validated and this code will get run
        $this->validate($request, [
            'title' => 'required|string',
            'sub_title' => 'required|string',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $image_enc_name = rand(0,9999).md5($file->getClientOriginalName());
            $image_ext = $file->getClientOriginalExtension();
            $image_name = $image_enc_name.".".$image_ext;
            $destinationPath = "masthead_image";
            $file->move($destinationPath,$image_name);
        }else{
            $image_name = "";
        }

        $masthead->title     = $request->title;
        $masthead->sub_title    = $request->sub_title;
        $masthead->image    = $image_name;
        $masthead->save();

        Session::flash('success', 'Masthead updated succesfully.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Masthead  $masthead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Masthead $masthead)
    {
        $image_path = 'masthead_image/'.$masthead->image;

        if($masthead){
            if(file_exists(public_path($image_path))){
               unlink(public_path($image_path));
            }

            $masthead->delete();
            Session::flash('success', 'Masthead Deleted successfully');
        }

        return redirect()->back();
    }
}
