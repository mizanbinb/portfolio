<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        $aboutCount = About::all()->count();
        $ContactCount = Contact::all()->count();
        $portfolioCount = Portfolio::all()->count();
        $userCount = User::all()->count();


        return view('admin.dashboard.index', compact(['aboutCount', 'ContactCount', 'portfolioCount', 'userCount']));
    }
}
