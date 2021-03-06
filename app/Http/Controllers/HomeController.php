<?php

namespace App\Http\Controllers;

use App\Models\News;   
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $news = News::all();
        return view('dashboard.dashboard')->with('News', $news);

        //$news = News::all();
        //return view('dashboard.dashboard')
        //->with('News',$news);


        //return view('dashboard.dashboard');
    }
}
