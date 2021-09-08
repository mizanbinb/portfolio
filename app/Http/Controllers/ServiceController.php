<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Session;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
            'description' => 'required',
            'icon' => 'required',
            'image' => 'required',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $image_enc_name = rand(0,9999).md5($file->getClientOriginalName());
            $image_ext = $file->getClientOriginalExtension();
            $image_name = $image_enc_name.".".$image_ext;
            $destinationPath = "service_image";
            $file->move($destinationPath,$image_name);
        }else{
            $image_name = "";
        }

        $service           = new Service;
        $service->title     = $request->title;
        $service->description    = $request->description;
        $service->icon    = $request->icon;
        $service->image    = $image_name;
        $service->save();

        Session::flash('success', 'Service created succesfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
         // The request validated and this code will get run
         $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $image_enc_name = rand(0,9999).md5($file->getClientOriginalName());
            $image_ext = $file->getClientOriginalExtension();
            $image_name = $image_enc_name.".".$image_ext;
            $destinationPath = "service_image";
            $file->move($destinationPath,$image_name);
        }else{
            $image_name = "";
        }

        $service->title     = $request->title;
        $service->description    = $request->description;
        $service->icon    = $request->icon;
        $service->image    = $image_name;
        $service->save();

        Session::flash('success', 'Service updated succesfully.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $image_path = 'service_image/'.$service->image;

        if($service){
            if(file_exists(public_path($image_path))){
               unlink(public_path($image_path));
            }

            $service->delete();
            Session::flash('success', 'Service Deleted successfully');
        }

        return redirect()->back();
    }
}
