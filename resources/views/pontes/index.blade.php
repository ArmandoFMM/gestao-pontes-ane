@extends('layouts.master')


@section('title')
    Pontes
@endsection

@section('content')
    <h3 class="titulo center-align">Lista de Despachos</h3>


    <div class="row">
        <div class="col s6 bt-dtable offset-s3 center-align" id="controlPanel">

        </div>
    </div>


    <div class="input-field col s12 m6" id="area-search" style="margin-top: 21px;">
        <i class="prefix material-icons">search</i>
        <input type="text" id="pesquisar-entregas">
        <label for="pesquisar-entregas">Filtrar</label>
    </div>
    <table class="bordered highlight responsive-table centered" id="dt-table">
        <thead>
        <tr>
            <th class="">Nome Ponte</th>
            <th class="">Ano de Construcao</th>
            <th class="">Imagem</th>
            <th class="">Tipo de Ponte</th>
            <th class="">Estrada</th>
            <th class="">Distrito</th>
            <th>Estado</th>
            <th class="">Operacoes</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pontes as $ponte)
            <tr>
                <td class="">{{$ponte->nome_ponte}}</td>
                <td>{{$ponte->ano_construcao}}</td>
                <td class="">{{$ponte->imagem}}</td>
                <td class="">{{$ponte->tipo->designacao_tipo}}</td>
                <td>{{$ponte->estrada->nome_estrada}}</td>
                <td class="">{{$ponte->distrito->nome_distrito}}</td>
                <td class="">{{$ponte->estado_ponte}}</td>
                <td>
                    <a><i class="material-icons ver">remove_red_eye</i></a>
                    <span></span>
                    <a><i class="material-icons">delete</i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    <div class="fixed-action-btn">
        <a href="{{route('pontes.create')}}" class="btn-floating btn-large red">
            <i class="large material-icons">add</i>
        </a>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#area-search').insertBefore('#dt-table_length');
        });

        @if(Session::has('message'))
         Materialize.toast('{{Session::get('message')}}', 4000);
        @endif
    </script>

@endsection