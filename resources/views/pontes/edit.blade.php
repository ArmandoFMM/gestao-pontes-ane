@extends('layouts.master')


@section('title')
    Editar Ponte {{$ponte->nome_ponte}}
@endsection

@section('css')
    <style>
   .passo p {
    margin-top: 10px;
}

.panel-passos {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
    margin-top: 30px;
}

.passo button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.panel-passos:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.passo {
    display: table-cell;
    text-align: center;
    position: relative;
}
    </style>
@endsection


@section('content')
<div class="container">
    <h3 class="titulo center-align">Registar Ponte</h3>
    <div class="stepwizard">
        <div class="panel-passos">
            <div class="passo">
                <a href="#passo-1" type="button" class="btn-floating waves-effect waves-light"><i class="material-icons">description</i></a>
                <p>Descricão</p>
            </div>
            <div class="passo">
                <a href="#passo-2" type="button" class="btn-floating waves-effect waves-light" disabled><i class="material-icons">location_on</i></a>
                <p>Localizacão</p>
            </div>
            <div class="passo">
                <a href="#passo-3" type="button" class="btn-floating waves-effect waves-light" disabled><i class="material-icons">build</i></a>
                <p>Estrutura</p>
            </div>
            <div class="passo">
                <a href="#passo-4" type="button" class="btn-floating waves-effect waves-light" disabled><i class="material-icons">perm_media</i></a>
                <p>Media</p>
            </div>
        </div>
    </div>
    <div class="row">
        <form role="form" method="POST" class="col s12" action="{{route('pontes.update',['id'=>$ponte->id])}}" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="_method" value="PUT" />
            {{ csrf_field() }}
            <div class="row setup-content" id="passo-1">
                <h5 class="center-align">Dados da Ponte</h5>
                <div class="input-field col s12 m6">
                    <input id="nome_ponte" name="nome_ponte" class="validate" maxlength="100" type="text" value="{{$ponte->nome_ponte}}" required/>
                    <label for="nome_ponte">Nome da Ponte</label> 
                    
                    @if ($errors->has('nome_ponte'))
                        <span class="help-block red-text">
                                {{ $errors->first('nome_ponte') }}
                        </span>
                    @endif
                </div>
                <div class="input-field col s12 m6">
                    <input id="ano_construcao" name="ano_construcao" class="validate" maxlength="4" type="number" value="{{$ponte->ano_construcao}}" required/>
                    <label for="ano_construcao">Ano de Construcão</label>
                    @if ($errors->has('ano_construcao'))
                        <span class="help-block red-text">
                            {{ $errors->first('ano_construcao') }}
                        </span>
                    @endif
                </div>
                <div class="input-field col s12 m6">
                    <select name="tipo_id" required>
                            <option value="" disabled selected>Selecione uma opcão</option>
                            @foreach($tipos as $tipo)
                            @if ($ponte->tipo_id == $tipo->id)
                                <option value="{{$tipo->id}}" selected>{{$tipo->designacao_tipo}}</option>
                            @else
                                <option value="{{$tipo->id}}">{{$tipo->designacao_tipo}}</option>
                            @endif    
                            @endforeach
                        </select>
                    <label>Tipo de Pont</label>
                </div>
                <div class="input-field col s12 m6">
                    <select name="tipo_obstaculo" required class="validate">
                            <option value="" disabled selected>Selecione uma opcão</option>
                            @if ($ponte->tipo_obstaculo == 'rio')
                                <option value="rio" selected>Rio</option>
                                <option value="corrente">Corrente</option>
                            @else
                                <option value="corrente" selected>Correnteoption>
                                 <option value="rio">Rio</option>                             
                            @endif 
                           
                            

                        </select>
                    <label>Tipo de Obstáculo</label>
                </div>
                <div class="input-field col s12 m6">
                    <select name="local_obstaculo" required class="validate">
                            <option value="" disabled selected>Selecione uma opcão</option>
                            <option value="por baixo">Por Baixo</option>                                 
                        </select>
                    <label>Localizacão de Obstáculo</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="nome_obstaculo" name="nome_obstaculo" maxlength="100" value="{{$ponte->nome_obstaculo}}" type="text" />
                    <label for="nome_obstaculo">Nome do Obstáculo</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="nr_link" name="nr_link" value="{{$ponte->nr_link}}" type="number" value="0" />
                    <label for="nr_link">Número de Link</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="cadeia" name="cadeia" type="number" value="{{$ponte->cadeia}}" />
                    <label for="cadeia">Cadeia</label>
                </div>
                <div class="col s12 right">
                    <button class="btn btn-primary nextBtn waves-effect waves-light right" type="button">Seguinte<i class="material-icons right">skip_next</i></button>
                </div>
            </div>
            <div class="row setup-content" id="passo-2">
                <h5 class="center-align">Localizacão da Ponte </h5>
                <div class="input-field col s12 m6">
                    <input id="lat_inicio" name="lat_inicio" class="validate" type="number" value="{{$ponte->lat_inicio}}" required step="any"/>
                    <label for="lat_inicio">Latidude de inicio da Ponte</label>
                    

                    @if ($errors->has('lat_inicio'))
                        <span class="help-block red-text">
                            {{ $errors->first('lat_inicio') }}
                        </span>
                    @endif
                </div>
                <div class="input-field col s12 m6">
                    <input id="lng_inicio" name="lng_inicio" class="validate" type="number" required value="{{$ponte->lng_inicio}}" step="any"/>
                    <label for="lng_inicio">Longitude de inicio da Ponte</label>
                    
                    @if ($errors->has('lng_inicio'))
                        <span class="help-block red-text">
                            {{ $errors->first('lng_inicio') }}
                        </span>
                    @endif
                </div>
                <div class="input-field col s12 m6">
                    <input id="lat_fim" name="lat_fim" class="validate" type="number" required value="{{$ponte->lat_fim}}" step="any"/>
                    <label for="lat_fim">Latidude de Fim da Ponte</label>
                
                    @if ($errors->has('lat_fim'))
                        <span class="help-block red-text">
                           {{ $errors->first('lat_fim') }}
                        </span>
                    @endif
                </div>
                <div class="input-field col s12 m6">
                    <input id="lng_fim" name="lng_fim" class="validate" type="number" lat_fim required value="{{$ponte->lng_fim}}" step="any"/>
                    <label for="lng_fim">Longitude de Fim da Ponte</label>
                    @if ($errors->has('lng_fim'))
                        <span class="help-block red-text">
                            {{ $errors->first('lng_fim') }}
                        </span>
                    @endif
                    
                </div>
                <div class="input-field col s12 m6">
                    <select name="distrito_id" required class="validate">
                            <option value="" disabled selected>Selecione uma opcão</option>
                            @foreach($distritos as $distrito) 
                            @if ($ponte->distrito_id == $distrito->id)
                                <option value="{{$distrito->id}}" selected>{{$distrito->nome_distrito}}</option>
                            @else
                                <option value="{{$distrito->id}}">{{$distrito->nome_distrito}}</option>>
                            @endif 
                            @endforeach
                        </select>
                    <label>Distrito</label>
                    @if ($errors->has('distrito_id'))
                        <span class="help-block red-text">
                            {{ $errors->first('distrito_id') }}
                        </span>
                    @endif
                </div>
                <div class="input-field col s12 m6">
                    <select name="estrada_id" required class="validate">
                            <option value="" disabled selected>Selecione uma opcão</option>
                            @foreach($estradas as $estrada)   

                            @if ($ponte->estrada_id == $estrada->id)
                                <option value="{{$estrada->id}}" selected>{{$estrada->nome_estrada}}</option>
                            @else
                                <option value="{{$estrada->id}}">{{$estrada->nome_estrada}}</option>
                            @endif 
                            @endforeach
                        </select>
                    <label>Estrada</label>
                    @if ($errors->has('estrada_id'))
                        <span class="help-block red-text">
                            {{ $errors->first('estrada_id') }}
                        </span>
                    @endif

                    
                </div>
                <div class="col s6  left">
                    <button class="btn btn-primary prevBtn black waves-effect waves-light" type="button"><i class="material-icons left">skip_previous</i>anterior</button>
                </div>
                <div class="col s6 right">
                    <button class="btn btn-primary nextBtn waves-effect waves-light right" type="button">seguinte<i class="material-icons right">skip_next</i></button>
                </div>
            </div>
            <div class="row setup-content" id="passo-3">
                <h5 class="center-align">Estrutura da Ponte </h5>
                <div class="input-field col s12 m6">
                    <input id="tipo_material" name="tipo_material" type="text" />
                    <label for="tipo_material">Tipo de Material</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="passeio" name="passeio" type="number" value="0" />
                    <label for="passeio">Passeio</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="superficie_corrida" name="superficie_corrida" type="text" />
                    <label for="superficie_corrida">Superfície de Corrida</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="juntas" name="juntas" type="text" />
                    <label for="juntas">Juntas</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="rolamemto" name="rolamemto" type="text" />
                    <label for="rolamemto">Rolamento</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="barreira" name="barreira" type="text" />
                    <label for="barreira">Barreira</label>
                </div>
                <div class="input-field col s12">
                    <input id="comprimento_extensao" name="comprimento_extensao" value="0" type="number" />
                    <label for="comprimento_extensao">Comprimento</label>
                </div>
                <div class="row">
                    <div class="col s6  left">
                        <button class="btn btn-primary prevBtn black waves-effect waves-light" type="button"><i class="material-icons left">skip_previous</i>anterior</button>
                    </div>
                    <div class="col s6 right">
                        <button class="btn btn-primary nextBtn waves-effect waves-light right" type="button">seguinte<i class="material-icons right">skip_next</i></button>
                    </div>
                </div>
            </div>
            <div class="row setup-content" id="passo-4">
                <h5 class="center-align"> Imagens da Ponte</h5>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Imagem Principal</span>
                        <input type="file" name="img" accept="image/*">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Imagem Sul</span>
                        <input type="file" name="img-sul" accept="image/*">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Imagem Norte</span>
                        <input type="file" name="img-sul" accept="image/*">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Imagem Este</span>
                        <input type="file" name="img-sul" accept="image/*">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Imagem Oeste</span>
                        <input type="file" name="img-sul" accept="image/*">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <div class="col s6 left">
                    <button class="btn btn-primary prevBtn black waves-effect waves-light" type="button"><i class="material-icons left">skip_previous</i>anterior</button>
                </div>
                <div class="col s6 right">
                    <button class="btn btn-primary right waves-effect waves-light" type="submit"><i class="material-icons right">send</i>Gravar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection 



@section('js')
<script>
    $(document).ready(function () {

        var navListItems = $('div.panel-passos div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn'),
            allPrevBtn = $('.prevbtn');

        allWells.hide();
        $('#passo-1').show();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        $('.nextBtn').click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.panel-passos div a[href="#' + curStepBtn + '"]').parent().next()
                .children("a"),
                curInputs = curStep.find("input[required]"),
                curSelects = curStep.find("select[required]"),
                isValid = true;

            $("input").removeClass("invalid");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest("input").addClass("invalid");
                }
            }

            for (var i = 0; i < curSelects.length; i++) {
                if (!curSelects[i].validity.valid) {
                    isValid = false;
                    $(curSelects[i]).siblings("input").addClass("invalid");
                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.panel-passos div a.btn-primary').trigger('click');

        $('.prevBtn').click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.panel-passos div a[href="#' + curStepBtn + '"]').parent().prev()
                .children("a"),
                curInputs = curStep.find("input[type='text']"),
                isValid = true;

            nextStepWizard.trigger('click');
        });
    });
</script>
@endsection