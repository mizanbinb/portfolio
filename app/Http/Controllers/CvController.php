<?php

namespace App\Http\Controllers;
use Session;
use App\Models\Cv;
use Illuminate\Http\Request;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cvs = Cv::all();
        return view('admin.cv.index',compact('cvs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cv.create');
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
            'title' => 'required',
            'cv' => 'required',
        ]);

        if($request->hasFile('cv')){
            $file = $request->file('cv');
            $image_enc_name = rand(0,9999).md5($file->getClientOriginalName());
            $image_ext = $file->getClientOriginalExtension();
            $image_name = $image_enc_name.".".$image_ext;
            $destinationPath = "cv_image";
            $file->move($destinationPath,$image_name);
        }else{
            $image_name = "";
        }

        $cv           = new Cv;
        $cv->title     = $request->title;
        $cv->cv    = $image_name;
        $cv->save();

        Session::flash('success', 'cv created succesfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function show(Cv $cv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function edit(Cv $cv)
    {
        return view('admin.cv.edit',compact('cv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cv $cv)
    {
        // The request validated and this code will get run
        $this->validate($request, [
            'title' => 'required',
            'cv' => 'required',
        ]);

        if($request->hasFile('cv')){
            $file = $request->file('cv');
            $image_enc_name = rand(0,9999).md5($file->getClientOriginalName());
            $image_ext = $file->getClientOriginalExtension();
            $image_name = $image_enc_name.".".$image_ext;
            $destinationPath = "cv_image";
            $file->move($destinationPath,$image_name);
        }else{
            $image_name = "";
        }

        $cv->title     = $request->title;
        $cv->cv    = $image_name;
        $cv->save();

        Session::flash('success', 'cv updated succesfully.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cv $cv)
    {
        $image_path = 'cv_image/'.$cv->image;

        if($cv){
            if(file_exists(public_path($image_path))){
               unlink(public_path($image_path));
            }

            $cv->delete();
            Session::flash('success', 'cv Deleted successfully');
        }

        return redirect()->back();
    }
}
