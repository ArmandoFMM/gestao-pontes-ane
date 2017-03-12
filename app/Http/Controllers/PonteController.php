<?php

namespace App\Http\Controllers;

use App\Ponte;
use App\Distrito;
use App\TipoDePonte;
use App\Estrada;
use Illuminate\Http\Request;
use Session;
use Cloudder;

class PonteController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pontes = Ponte::all();
       return view('pontes.index', compact('pontes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $distritos = Distrito::all();
        $tipos = TipoDePonte::all();
        $estradas = Estrada::all();
        return view('pontes.create', compact('distritos','tipos','estradas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('img')) {
            $request->request->add(['imagem' => 'pontes-img']);
            $ponte = Ponte::create($request->all());        
            Cloudder::upload($request->file('img'),'pontes-img/'.$ponte->id);
    
        } else{
            Ponte::create($request->all()); 
        }


        Session::flash('message', 'Ponte Registada com sucesso');
        return redirect()->route('pontes.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ponte = Ponte::find($id);
        return view('pontes.show', compact('ponte'));     
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function todasPontes(){

        $pontes = Ponte::with('tipo')->with('distrito.provincia')->with('estrada')->get();
        return response()->json($pontes->toArray());
    }


    public  function  registar(Request $request){

        $ponte = Ponte::create($request->all());
        return response()->json(["msg"=>"Ponte Registada com sucesso"]);
    }


    public function uploadPhotos(Request $request){
        
        Cloudder::upload($request->file('img'),'pontes-img/3');

        return response()->json("Upload Sucessfull");
        
    }
}
 