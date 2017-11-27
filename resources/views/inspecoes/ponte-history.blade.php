@extends('layouts.master')


@section('title')
    Histórico de Inspecções da ponte {{$ponte->nome_ponte}}
@endsection

@section('css')
    <style>
    
    </style>
@endsection


@section('content')
<h4 class="center-align">Histórico de Inspecções da ponte {{$ponte->nome_ponte}}</h4>
@if(count($ponte->inspecoesPassadas) <= 0)
        <div class="card blue-grey">
            <div class="card-content white-text">
              <span class="card-title">Sem histórico</span>
            </div>
          </div>
          @else
          <div>

              <div class="col s12">

                  <ul class="collection">
                      @foreach($ponte->inspecoesPassadas as $realizada)
                          <li class="collection-item avatar">
                              <i class="material-icons circle green">remove_red_eye</i>
                              <span class="title">{{$realizada->tipo_inspecao->designacao_tipo_inspecao}}</span>
                              <p>{{$realizada->data}} <br>
                                  {{$realizada->user->name}}
                              </p>
                              <a href="#!" class="secondary-content"><i class="material-icons">remove_red_eye</i></a>
                          </li>
                      @endforeach
                  </ul>

              </div>
                         
          </div>
    @endif

<div class="divider"></div>
<h4 class="center-align">Inspecções Agendadas</h4>
@if(count($ponte->inspecoesAgendadas) <= 0)
    <div class="card blue-grey">
        <div class="card-content white-text">
            <span class="card-title">Sem agendamento de inspecções</span>
        </div>
    </div>
@else
    <div class="col s12">

        <ul class="collection">
            @foreach($ponte->inspecoesAgendadas as $agendada)
            <li class="collection-item avatar">
                <i class="material-icons circle green">event</i>
                <span class="title">{{$agendada->tipo_inspecao->designacao_tipo_inspecao}}</span>
                <p>{{$agendada->data}} <br>
                    {{$agendada->user->name}}
                </p>
                <a href="#!" class="secondary-content"><i class="material-icons">remove_red_eye</i></a>
            </li>
            @endforeach
        </ul>

    </div>
@endif


    <div class="fixed-action-btn horizontal">
        <a class="btn-floating btn-large teal">
            <i class="large material-icons">add</i>
        </a>
        <ul>
            <li><a class="btn-floating teal tooltipped modal-trigger" href="#modal1" data-position="top" data-delay="50" data-tooltip="Agendar Inspecção"><i class="material-icons">event</i></a></li>
            <li><a class="btn-floating teal darken-1 tooltipped" data-position="top" data-delay="50" data-tooltip="Registar Inspecção"><i class="material-icons">add</i></a></li>
        </ul>
  </div>
  
  <div id="modal1" class="modal">
        <div class="modal-content">
                        <form id="form-agendar" name="form-agendar" method="post" action="{{route('inspecoes.store')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="ponte_id" value="{{$ponte->id}}">
                            <p class="title">Agendar Inspecção</p>
                                <div class="col s12 input-field">
                                    <label for="qtd">Data</label>
                                        <input type="text" class="datepicker" name="data">  
                                </div>

                            <div class="input-field col s12">
                                <select name="user_id">
                                    <option value="" disabled selected>Choose your option</option>
                                    @foreach($inspectores as $inspector)
                                        <option value="{{$inspector->id}}">{{$inspector->name}}</option>
                                    @endforeach
                                </select>
                                <label>Inspector</label>
                            </div>

                            <div class="input-field col s12">
                                <select name="tipo_inspecao_id">
                                    <option value="" disabled selected>Choose your option</option>
                                    @foreach($tiposInpecao as $tipo)
                                        <option value="{{$tipo->id}}">{{$tipo->designacao_tipo_inspecao}}</option>
                                    @endforeach
                                </select>
                                <label>Tipo de Inspecção</label>
                            </div>

                            <button type="submit" class="waves-effect waves-green btn"><i class="material-icons right">send</i>Gravar</button>
                        </form>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
        </div>
    </div>

@endsection

@section('js')

@endsection