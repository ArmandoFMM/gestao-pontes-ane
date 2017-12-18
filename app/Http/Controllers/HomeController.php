<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ponte;
use Session;

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
        $pontes_estado_bom = Ponte::where('estado_ponte','like','Bom')->where('visivel', true)->get();
        $pontes_estado_grave = Ponte::where('estado_ponte','like','Grave')->where('visivel', true)->get();
        $pontes_estado_critico = Ponte::where('estado_ponte','like','Critico')->where('visivel', true)->get();
        $pontes_estado_rotura = Ponte::where('estado_ponte','like','Rotura Iminente')->where('visivel', true)->get();

        if(Session::has('login')){
            Session::flash('login',true);
        }

        return view('home',compact(
            'pontes',
            'pontes_estado_bom',
            'pontes_estado_grave',
            'pontes_estado_critico',
            'pontes_estado_rotura'
        ));
    }
}
