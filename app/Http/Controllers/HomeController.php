<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ponte;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pontes = Ponte::where('visivel', true)->get();
        $pontes_estado_bom = Ponte::where('estado_ponte','like','bom')->where('visivel', true)->get();
        $pontes_estado_degradada = Ponte::where('estado_ponte','like','degradada')->where('visivel', true)->get();        
        return view('home',compact('pontes','pontes_estado_bom','pontes_estado_degradada'));
    }
}
