<?php

namespace App\ Http\ Controllers;

use App\ Ponte;
use App\ Distrito;
use App\ TipoDePonte;
use App\ Estrada;
use Illuminate\ Http\ Request;
use Validator;
use Session;
use Cloudder;
use Illuminate\Support\Facades\Auth;

class PonteController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('todasPontes');
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
        return view('pontes.create', compact('distritos', 'tipos', 'estradas'));
    }


    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nome_ponte' => 'required|unique:pontes|max:160',
            'ano_construcao' => 'required',
            'tipo_id' => 'required',
            'estrada_id' => 'required',
            'distrito_id' => 'required',
            'tipo_obstaculo' => 'required',
            'lat_inicio' => 'required',
            'lat_fim' => 'required',
            'lng_inicio' => 'required',
            'lng_fim' => 'required'
        ];
        $messages = [
            'same' => 'The :attribute and :other must match.',
            'size' => 'The :attribute must be exactly :size.',
            'between' => 'The :attribute must be between :min- :max.',
            'in' => 'The :attribute must be one of the following types: :values',
            'required' => 'O atributo :attribute é obrigatório.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('pontes/create')->withErrors($validator)->withInput();
        }


        if ($request->file('img')) {
            $request->request->add(['imagem' => 'pontes-img']);
            $ponte = Ponte::create($request->all());
            Cloudder::upload($request->file('img'), 'pontes-img/' . $ponte->id);

        } else {
            Ponte::create($request->all());
        }


        Session::flash('message', 'Ponte Registada com sucesso');
        return redirect()->route('pontes.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ponte = Ponte::find($id);
        $distritos = Distrito::all();
        $tipos = TipoDePonte::all();
        $estradas = Estrada::all();
        return view('pontes.edit', compact('ponte', 'distritos', 'tipos', 'estradas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ponte = Ponte::find($id);
        $ponte->update($request->all());
        Session::flash('message', 'Ponte Actualizada com sucesso');
        return redirect()->route('pontes.show', ['id' => $id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {

        if ($request->ajax()) {
            $user = Auth::user();
            if (Auth::attempt(['email' => $user->email, 'password' => $request->xs])) {

                $ponte = Ponte::findOrFail($id);

                $ponte->destroy($id);

                return response(['msg' => 'Ponte Removida dos Registos', 'status' => 'success']);
            } else {
                return response(['msg' => 'Senha Inválida', 'status' => 'unauthenticated']);
            }
        }
        return response(['msg' => 'Falha ao tentar remover a ponte', 'status' => 'failed']);
    }

    public function todasPontes()
    {

        $pontes = Ponte::with('tipo')->with('distrito.provincia')->with('estrada')->get();
        return response()->json($pontes->toArray());
    }


    public function registar(Request $request)
    {

        $ponte = Ponte::create($request->all());

        return response()->json(["msg" => "Ponte Registada com sucesso", "id" => $ponte->id]);
    }


    public function uploadPhotos(Request $request)
    {
        if ($request->file('img')) {


            Cloudder::upload($request->file('img'), 'pontes-img/' . $request->file('img')->getClientOriginalName());
            $id = pathinfo($request->file('img')->getClientOriginalName(), PATHINFO_FILENAME);
            $ponte = Ponte::find($id);
            $ponte->imagem = 'pontes-img/';
            $ponte->save();

            return response()->json("Upload Sucessfull");
        }
        return response()->json("Erro");

    }
}