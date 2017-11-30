<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Problema;
use App\TipoDefeito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProblemasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function getAllProblemas() {

//        $problemas = Problema::with('categoria')->orderBy('categoria_id')->get();

        $with = Input::get('with');

        if($with){
            switch ($with){
                case 'inspecoes': {
                    $problemas = Problema::with('inspecaos')->get();

                    return response()->json(['problemas' => $problemas->toArray()]);

                }

                default: break;
                }

        }

        $categorias = Categoria::with('problemas')->get();

        $tiposDefeitos = TipoDefeito::with('defeitos')->get();

        return response()->json(['categorias' => $categorias->toArray(), 'tiposDefeitos' => $tiposDefeitos->toArray()]);

    }

}
