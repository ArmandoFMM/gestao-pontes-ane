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
          @else
          <div id="app">
            <validate-ponte pontes-list-init="{{$pontes}}"></validate-ponte>             
          </div>
    @endif

@endsection

@section('js')

<script src="/js/app.js"></script>

@endsection