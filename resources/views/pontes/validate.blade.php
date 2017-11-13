@extends('layouts.master')


@section('title')
   Validar Registo de Pontes
@endsection

@section('css')
    <style>
    
    </style>
@endsection


@section('content')

@if(count($pontes) <= 0 || $pontes == null)
        <div class="card blue-grey">
            <div class="card-content white-text">
              <span class="card-title">Sem Pontes a Aguardar Validação</span>
            </div>
          </div>
    @endif

<ul class="collection">
    @foreach($pontes as $ponte)
    <li class="collection-item avatar">
      <img src="http://res.cloudinary.com/armandofm/image/upload/pontes-img/{{$ponte->id}}" alt="" class="circle">
      <span class="title">{{$ponte->nome_ponte}}</span>
      <p>{{$ponte->ano_construcao}}<br>
      </p>
      <a class="secondary-content waves-effect waves-light btn" href="/validar-pontes/{{$ponte->id}}"><i class="material-icons right">check_circle</i>validar</a>
    </li>
    @endforeach
  </ul>

@endsection