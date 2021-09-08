<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Masthead;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Cv;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
     public function home(){
         $masthead = Masthead::first();
         $about = About::first();
         $cv = Cv::first();
         $setting = Setting::first();
         $services = Service::inRandomOrder()->get();
         $portfolios = Portfolio::inRandomOrder()->get();
        return view('website.home',compact('masthead','about','services','portfolios','cv','setting'));
    }
}
