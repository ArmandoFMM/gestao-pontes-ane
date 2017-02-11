@extends('layouts.master')


@section('title')
    Registar ponte
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

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
    </style>
@endsection


@section('content')
<div class="container">
 <h3 class="titulo center-align">Registar Ponte</h3>
<div class="stepwizard">
    <div class="panel-passos">
        <div class="passo">
            <a href="#passo-1" type="button" class="btn btn-primary btn-circle"><i class="material-icons">description</i></a>
            <p>Descricão</p>
        </div>
        <div class="passo">
            <a href="#passo-2" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="material-icons">location_on</i></a>
            <p>Localizacão</p>
        </div>
        <div class="passo">
            <a href="#passo-3" type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="material-icons">perm_media</i></a>
            <p>Media</p>
        </div>
    </div>
</div>
<div class="row">
    <form role="form" method="Post" class="col s12" action="{{route('pontes.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row setup-content" id="passo-1">
                    <h5 class="center-align">Dados de Ponte</h5>
                    <div class="input-field col s12 m6">
                        <input id="nome_ponte" name="nome_ponte"  maxlength="100"  type="text" required/>
                        <label for="nome_ponte">Nome da Ponte</label>
                    </div>
                
                    <div class="input-field col s12 m6">
                        <input id="ano_construcao" name="ano_construcao"  maxlength="4"  type="text" required/>
                        <label for="ano_construcao">Ano de Construcão</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <select name="tipo_id" required>
                            <option value="" disabled selected>Selecione uma opcão</option>
                            @foreach($tipos as $tipo)    
                            <option value="{{$tipo->id}}">{{$tipo->designacao_tipo}}</option>
                            @endforeach
                        </select>
                        <label>Tipo de Ponte</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <select name="tipo_obstaculo" required>
                            <option value="" disabled selected>Selecione uma opcão</option>
                            <option value="rio">Rio</option>                             
                            <option value="corrente">Corrente</option>
                            
                        </select>
                        <label>Tipo de Obstáculo</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <select name="local_obstaculo" required>
                            <option value="" disabled selected>Selecione uma opcão</option>
                            <option value="por baixo">Por Baixo</option>                                 
                        </select>
                        <label>Localizacão de Obstáculo</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <select name="estado_ponte" required>
                            <option value="" disabled selected>Selecione uma opcão</option>
                            <option value="bom">Bom</option>                                 
                            <option value="degradada">Degradada</option>                                 
                        </select>
                        <label>Estado da Ponte</label>
                    </div>

                    <div class="col s12">
                        <button class="btn btn-primary nextBtn right-align" type="button" >Seguinte</button>
                    </div>
        </div>


        <div class="row setup-content" id="passo-2">
                    <h5 class="center-align">Localizacão da Ponte </h5>
                    
                    <div class="input-field col s12 m6">
                        <input id="lat_inicio" name="lat_inicio"  type="text" required/>
                        <label for="lat_inicio">Latidude de inicio da Ponte</label>
                    </div>
                
                    <div class="input-field col s12 m6">
                        <input id="lng_inicio" name="lng_inicio"  type="text" required/>
                        <label for="lng_inicio">Longitude de inicio da Ponte</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <input id="lat_fim" name="lat_fim"  type="text" required/>
                        <label for="lat_fim">Latidude de Fim da Ponte</label>
                    </div>
                
                    <div class="input-field col s12 m6">
                        <input id="lng_fim" name="lng_fim"  type="text" required/>
                        <label for="lng_fim">Longitude de Fim da Ponte</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <select name="distrito_id" required>
                            <option value="" disabled selected>Selecione uma opcão</option>
                            @foreach($distritos as $distrito)    
                            <option value="{{$distrito->id}}">{{$distrito->nome_distrito}}</option>
                            @endforeach
                        </select>
                        <label>Distrito</label>
                    </div>


                    <div class="input-field col s12 m6">
                        <select name="estrada_id" required>
                            <option value="" disabled selected>Selecione uma opcão</option>
                            @foreach($estradas as $estrada)    
                            <option value="{{$estrada->id}}">{{$estrada->nome_estrada}}</option>
                            @endforeach
                        </select>
                        <label>Estrada</label>
                    </div>

                    <div class="col s12">
                        <button class="btn btn-primary nextBtn right-align" type="button" >Next</button>
                    </div>    
        </div>


        <div class="row setup-content" id="passo-3">
                    <h5 class="center-align"> Passo 3</h5>
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>Imagem Principal</span>
                            <input type="file" name="img" accept="image/*">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                    

                    <div class="col s12">
                        <button class="btn btn-primary right-align" type="submit">Gravar</button>
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
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.panel-passos div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],select"),
            isValid = true;

        $("input").removeClass("invalid");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest("input").addClass("invalid");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.panel-passos div a.btn-primary').trigger('click');
});
</script>
@endsection