@extends('layouts.master')


@section('title')
   Listagem de Pontes
@endsection

@section('css')
    <style>
    table .circle{
        width: 52px;
        height: 52px;
    }
    .card img {
        max-height: 300px;
    }
    </style>
@endsection


@section('content')
    <h3 class="titulo center-align">Lista de Pontes</h3>

    <div class="row">
        <div class="col s6 bt-dtable offset-s3 center-align" id="controlPanel">

        </div>
    </div>

     <div class="input-field col s12" id="modo-lista">
        <a class="waves-effect waves-teal btn-flat" id="lista-grid"><i class="material-icons">view_module</i></a>
        <a class="waves-effect waves-teal btn" id="lista-tabela"><i class="material-icons">view_list</i></a>
    </div>

    <div class="input-field col s12 m6" id="area-search" style="margin-top: 21px;">
        <i class="prefix material-icons">search</i>
        <input type="text" id="pesquisar-entregas">
        <label for="pesquisar-entregas">Filtrar</label>
    </div>

    

    <table class="bordered highlight responsive-table centered" id="dt-table">
        <thead>
        <tr>
            <th>
                <input type="checkbox" class="filled-in" id="main-check" />
                <label for="main-check"></label>
            </th>
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
                <td>
                        <p>
                            <input type="checkbox" class="filled-in" id="{{$ponte->id}}" />
                            <label for="{{$ponte->id}}"></label>
                        </p>
                </td>
                <td class="">{{$ponte->nome_ponte}}</td>
                <td>{{$ponte->ano_construcao}}</td>
                <td class="">
                 <img src="http://res.cloudinary.com/armandofm/image/upload/pontes-img/{{$ponte->id}}" alt="" class="circle">
                </td>
                <td class="">{{$ponte->tipo->designacao_tipo}}</td>
                <td>{{$ponte->estrada->nome_estrada}}</td>
                <td class="">{{$ponte->distrito->nome_distrito}}</td>
                <td class="">{{$ponte->estado_ponte}}</td>
                <td>
                    <a class="modal-trigger btn-floating waves-effect waves-light btn" href="#modal{{$ponte->id}}"><i class="material-icons ver">remove_red_eye</i></a>
                    <span></span>
                    <a href="#" class="btn-floating waves-effect waves-light delete btn"><i class="material-icons red-text">delete</i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{-- Lista em Grid --}}
        <div class="row hide" id="pontes-grid">
        
        @foreach($pontes as $ponte)
            <div class="col s12 m6">
                <div class="card small z-depth-5">
                    <div class="card-image waves-effect waves-block waves-light">
                    @if($ponte->imagem)
                    <img class="activator" src="http://res.cloudinary.com/armandofm/image/upload/pontes-img/{{$ponte->id}}">
                        @else
                            <img class="activator" src="/img/no-image.jpg">
                        @endif
                    </div>                    
                    <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">
                        {{$ponte->nome_ponte}}
                    <i class="material-icons right">more_vert</i></span>
                    <p><a class="btn waves-effect waves-light teal modal-trigger" href="#modal{{$ponte->id}}"><i class="material-icons ver">remove_red_eye</i></a></p>
                    </div>
                    <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">
                        {{$ponte->nome_ponte}}
                    <i class="material-icons right">close</i></span>
                    <p>Here is some more information about this product that is only revealed once clicked on.</p>
                    </div>
                </div>    
            </div>
            @endforeach
            
        </div>
    


    <div class="fixed-action-btn">
        <a href="{{route('pontes.create')}}" class="btn-floating btn-large red">
            <i class="large material-icons">add</i>
        </a>
    </div>


    <!-- Modal Structure -->
    @foreach($pontes as $ponte)
        <div id="modal{{$ponte->id}}" class="modal modal-fixed-footer ">
            <div class="modal-content">
                <div class="card small">
                <div class="card-image">
                    <img src="http://res.cloudinary.com/armandofm/image/upload/pontes-img/{{$ponte->id}}">
                    <span class="card-title">Ponte {{$ponte->nome_ponte}}</span>
                </div>
                <div class="card-tabs">
                <ul class="tabs tabs-fixed-width">
                    <li class="tab"><a class="active" href="#test4{{$ponte->id}}">Descricão</a></li>
                    <li class="tab"><a href="#test5{{$ponte->id}}">Localizacão</a></li>
                    <li class="tab"><a href="#test6{{$ponte->id}}">Media</a></li>
                </ul>
                </div>
                <div class="card-content white lighten-4">
                <div id="test4{{$ponte->id}}">
                <ul class="collection">
                        <li class="collection-item">                            
                            <p><b>Ano de Construcão:</b> {{$ponte->ano_construcao}}</p>
                        </li>
                        <li class="collection-item">                            
                            <p><b>Tipo de Ponte:</b> {{$ponte->tipo->designacao_tipo}}</p>
                        </li>
                         <li class="collection-item">                            
                            <p><b>Tipo de Obstaculo:</b> {{$ponte->tipo_obstaculo}}</p>
                        </li>
                         <li class="collection-item">                            
                            <p><b>Localizacão do Obstaculo:</b> {{$ponte->loc_obstaculo}}</p>
                        </li>
                        <li class="collection-item">                            
                            <p><b>Estado da Ponte:</b> {{$ponte->estado_ponte}}</p>
                        </li>
                    </ul>
                </div>
                <div id="test5{{$ponte->id}}">
                <ul class="collection">
                        <li class="collection-item">                            
                            <p><b>Estrada:</b> {{$ponte->estrada->nome_estrada}}</p>
                        </li>
                        <li class="collection-item">                            
                            <p><b>Distrito:</b> {{$ponte->distrito->nome_distrito}}</p>
                        </li>
                        <li class="collection-item">                            
                            <p><b>Provincia:</b> {{$ponte->distrito->provincia->nome_provincia}}</p>
                        </li>
                    </ul>

                </div>
                <div id="test6{{$ponte->id}}">
                 <div class="carousel">
                    <a class="carousel-item" href="#one!"><img src="{{asset('storage/'.$ponte->imagem)}}"></a>
                    <a class="carousel-item" href="#two!"><img src="{{asset('storage/'.$ponte->imagem)}}"></a>
                    <a class="carousel-item" href="#three!"><img src="{{asset('storage/'.$ponte->imagem)}}"></a>
                    <a class="carousel-item" href="#four!"><img src="{{asset('storage/'.$ponte->imagem)}}"></a>
                    <a class="carousel-item" href="#five!"><img src="{{asset('storage/'.$ponte->imagem)}}"></a>
                </div>
                </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
            <a href="{{route('pontes.show',['id'=>$ponte->id])}}" class="modal-action modal-close waves-effect waves-green btn-flat">Visualizar</a>
            </div>
        </div>
    @endforeach

    
    
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.carousel').carousel();

            $('#area-search').insertBefore('#dt-table_length');

            $('#modo-lista').inserAfter('#dt-table_length');
        });

        @if(Session::has('message'))
         Materialize.toast('{{Session::get('message')}}', 4000);
        @endif
    </script>

@endsection