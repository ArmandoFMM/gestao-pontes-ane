<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Ponte;
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
        $withPontes = Input::get('withPontes');

        if($withPontes === 'yes') {

            $estados = Estado::with('pontes')->where('designacao_estado','<>','Rotura')->get();
            $pontes = Ponte::all();

            $pontes = $pontes->toArray();
            $estados = $estados->toArray();

            foreach ($estados as $estado)
                $estado['pontes'] = [];
                foreach ($pontes as $ponte){

                    if($estado['designacao_estado'] === $ponte['estado_ponte'])
                        $estado['pontes'] = $ponte;

                }


            return response()->json(['estados' => $estados]);

        }

        return response()->json(['estados' => Estado::all()->toArray()]);



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
