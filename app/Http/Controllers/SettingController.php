<?php

namespace App\Http\Controllers;
use Session;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return view('admin.setting.index',compact('settings'));
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
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('admin.setting.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
         // The request validated and this code will get run
         $this->validate($request, [
            'site_title' => 'required',
            'contact_title' => 'required',
            'contact_subtitle' => 'required',
            'icon' => 'required',
            'copyright' => 'required',
            'number' => 'required',
        ]);

        if($request->hasFile('site_logo')){
            $file = $request->file('site_logo');
            $image_enc_name = rand(0,9999).md5($file->getClientOriginalName());
            $image_ext = $file->getClientOriginalExtension();
            $image_name = $image_enc_name.".".$image_ext;
            $destinationPath = "logo_image";
            $file->move($destinationPath,$image_name);
        }else{
            $image_name = "";
        }

        $setting->site_title     = $request->site_title;
        $setting->contact_title    = $request->contact_title;
        $setting->contact_subtitle    = $request->contact_subtitle;
        $setting->icon     = $request->icon;
        $setting->copyright    = $request->copyright;
        $setting->number     = $request->number;
        $setting->site_logo    = $image_name;
        $setting->save();

        Session::flash('success', 'Setting updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
