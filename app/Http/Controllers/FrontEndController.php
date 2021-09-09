<?php

namespace App\Http\Controllers;
use Session;
use App\Models\About;
use App\Models\Masthead;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Cv;
use App\Models\Setting;
use App\Models\Contact;
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


    public function storeContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:11|numeric',
            'message' => 'required',
        ]);

        $input = $request->all();

        Contact::create($input);
        return redirect()->back()->with(['success' => 'Contact Form Submit Successfully']);
    }
}
