<?php

namespace App\Http\Controllers;

use App\Models\About;
use Session;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::all();
        return view('admin.about.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
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
            $destinationPath = "about_image";
            $file->move($destinationPath,$image_name);
        }else{
            $image_name = "";
        }

        $about           = new About;
        $about->title     = $request->title;
        $about->sub_title    = $request->sub_title;
        $about->image    = $image_name;
        $about->save();

        Session::flash('success', 'About created succesfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        return view('admin.about.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
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
            $destinationPath = "about_image";
            $file->move($destinationPath,$image_name);
        }else{
            $image_name = "";
        }

        $about->title     = $request->title;
        $about->sub_title    = $request->sub_title;
        $about->image    = $image_name;
        $about->save();

        Session::flash('success', 'About updated succesfully.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        $image_path = 'about_image/'.$about->image;

        if($about){
            if(file_exists(public_path($image_path))){
               unlink(public_path($image_path));
            }

            $about->delete();
            Session::flash('success', 'About Deleted successfully');
        }

        return redirect()->back();
    }
}
