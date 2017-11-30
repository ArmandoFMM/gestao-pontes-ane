<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Ponte;
use App\Provincia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class EstadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $withPontes = Input::get('with');

        switch ($withPontes){
            case 'pontes': {

                $estados = Estado::with('pontes')->where('designacao_estado','<>','Rotura')->get()->toArray();
                $pontes = Ponte::all();

                $aux = [];

                foreach ($estados as $estado){
                    $estado['pontes'] = array();
                    foreach ($pontes as $ponte){
                        if($estado['designacao_estado'] === $ponte->estado_ponte)
                            $estado['pontes'][] = (object) $ponte;
                    }
                    $aux[] = $estado;
                }

                return response()->json(['estados' => $aux]);

            }

            case 'provincias': {

                $estados = Estado::with('pontes')->where('designacao_estado','<>','Rotura')->get()->toArray();
                $pontes = Ponte::all();
                $provincias = Provincia::all();

                $aux = [];

                foreach ($estados as $estado){
                    $estado['pontes'] = array();
                    foreach ($pontes as $ponte){
                        if($estado['designacao_estado'] === $ponte->estado_ponte)
                            $estado['pontes'][] = (object) $ponte;
                    }
                    $aux[] = $estado;
                }



                return response()->json(['provincias' => Estado::with('provincias')->get()]);

            }

            default : {
                return response()->json(['estados' => Estado::all()->toArray()]);
            }
        }

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
}
