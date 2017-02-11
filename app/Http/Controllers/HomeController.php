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
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pontes = Ponte::all();
        $pontes_estado_bom = Ponte::where('estado_ponte','like','Bom')->get();
        $pontes_estado_degradada = Ponte::where('estado_ponte','like','Degradada')->get();        
        return view('home',compact('pontes','pontes_estado_bom','pontes_estado_degradada'));
    }
}
