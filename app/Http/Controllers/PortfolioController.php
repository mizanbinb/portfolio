<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('admin.portfolio.index',compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio.create');
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
            'category_name' => 'required|string',
            'project_name' => 'required|string',
            'image' => 'required',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $image_enc_name = rand(0,9999).md5($file->getClientOriginalName());
            $image_ext = $file->getClientOriginalExtension();
            $image_name = $image_enc_name.".".$image_ext;
            $destinationPath = "portfolio_image";
            $file->move($destinationPath,$image_name);
        }else{
            $image_name = "";
        }

        $portfolio           = new portfolio;
        $portfolio->category_name     = $request->category_name;
        $portfolio->project_name    = $request->project_name;
        $portfolio->image    = $image_name;
        $portfolio->save();

        Session::flash('success', 'portfolio created succesfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit',compact('portfolio'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        // The request validated and this code will get run
        $this->validate($request, [
            'category_name' => 'required',
            'project_name' => 'required',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $image_enc_name = rand(0,9999).md5($file->getClientOriginalName());
            $image_ext = $file->getClientOriginalExtension();
            $image_name = $image_enc_name.".".$image_ext;
            $destinationPath = "portfolio_image";
            $file->move($destinationPath,$image_name);
        }else{
            $image_name = "";
        }

        $portfolio->category_name     = $request->category_name;
        $portfolio->project_name    = $request->project_name;
        $portfolio->image    = $image_name;
        $portfolio->save();

        Session::flash('success', 'portfolio Deleted successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        $image_path = 'portfolio_image/'.$portfolio->image;

        if($portfolio){
            if(file_exists(public_path($image_path))){
               unlink(public_path($image_path));
            }

            $portfolio->delete();
            Session::flash('success', 'portfolio Deleted successfully');
        }

        return redirect()->back();
    }
}
