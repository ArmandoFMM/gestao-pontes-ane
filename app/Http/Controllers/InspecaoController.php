<?php

namespace App\Http\Controllers;

use App\DefeitoGrave;
use App\Estado;
use App\Inspecao;
use App\Ponte;
use App\Problema;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\Flysystem\Exception;

class InspecaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $request->request->add(['data' => date("Y-m-d", strtotime(str_replace('/', '-', $request->data)) )]);

        Inspecao::create($request->all());

        return redirect('/inspecoes-history/'.$request->ponte_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inspecao = Inspecao::find($id);

        return view('inspecoes.show', compact('inspecao'));
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


    public function saveInspecao(Request $request) {


        try{
            $inspecao = Inspecao::find($request->id);

            if($inspecao) {

                foreach ($request->problemas as $problema){

                    $inspecao->problemas()->attach($problema['id'], [
                        'dimensao' => $problema['dimensao'],
                        'nivel_deterioracao' => $problema['nivel_deterioracao'],
                        'nota' => /* $problema['nota'] ? $problema['nota'] : */ '',
                    ]);

                }

                foreach ($request->defeitos as $defeito){

                    $inspecao->defeitos()->attach($defeito['id']);

                }

                $inspecao->data = $request->data ? $request->data : date('Y-m-d');
                $inspecao->comentario = $request->comentario;
                $inspecao->publicada = $request->publicar;
                $inspecao->realizada = true;
                $inspecao->save();

                $id = $this->calculaEstado($request->problemas, $request->defeitos);
                $id = round($id, 0, PHP_ROUND_HALF_DOWN);

                $estado = Estado::find(($id > 1) ? $id : 2);

                $ponte = Ponte::find($request->ponte_id);
                $ponte->estados()->attach($estado->id, ['data' => date('Y-m-d')]);
                $ponte->estado_ponte = $estado->designacao_estado;
                $ponte->save();

                return response()->json(['msg' => 'Inspecção registada com sucesso']);

            }
        }catch(Exception $ex){
            return response()->json(['error' => 'Erro: '.$ex->getMessage()]);
        }

    }


    public function inspecoesByUserAPI($id) {

        $inspecoes = Inspecao::where('user_id', $id)->where('realizada', false)->with(['ponte', 'tipo_inspecao'])->get();

        return response()->json(['inspecoes' => $inspecoes->toArray()]);

    }

    public function calculaEstado($problemas, $defeitos) {

        $id = 0;

        $allProblemas = Problema::all();
        $allDefeitos = DefeitoGrave::all();

        if(count($defeitos) > 0)
            $id = 6;
        else
            $id = 9;

        return ($id - count($problemas)/count($allProblemas) - (count($defeitos)+count($defeitos)*2)/count($allDefeitos) - 0.5);

    }


    public function inspecaoById($id){

        $inspecao = Inspecao::where('id',$id)->with('problemas')->first();

        if($inspecao){
            $ponte = Ponte::where('id',$inspecao->ponte->id)->with('inspecaos')->first();

            return response()->json(['ponte' => $ponte->toArray(), 'inspecao' => $inspecao->toArray()]);
        }

        return response()->json(['msg' => 'Erro']);


    }
}
