<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Masthead;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
     public function home(){
         $masthead = Masthead::first();
         $about = About::first();
        return view('website.home',compact('masthead','about'));
    }
}
