<?php

namespace App\Http\Controllers;

use App\Ponte;
use App\Distrito;
use App\TipoDePonte;
use App\Estrada;
use Illuminate\Http\Request;
use Session;

class PonteController extends Controller
{
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
        $path = $request->file('img')->store('pontes-avatars','public');
        $request->request->add(['imagem' => $path]);
        Ponte::create($request->all());

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
}
