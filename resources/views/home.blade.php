@extends('layouts.master') 


@section('title')
Pontes
@endsection

@section('css')
<style>
    .panels .card {
        height: 250px;
    }
</style>
@endsection

@section('content')
<div class="row panels">
    <!-- Total de Pontes -->
    <div class="col s12 m6 l4">
        <div class="card sticky-action">
            <div class="card-image waves-effect waves-block waves-light">
                <p class="center-align"><span class="fa fa-road"></span> Total de Pontes</p>
                <h3 class="center-align">{{count($pontes)}}</h3>
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
                <p><a href="#">This is a link</a></p>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                <p>Here is some more information about this product that is only revealed once clicked on.</p>
            </div>
        </div>
    </div>
    <!-- Pontes em bom estado -->
    @if(count($pontes_estado_bom) > 0 )
    <div class="col s12 m6 l4">
        <div class="card sticky-action green accent-2">
            <div class="card-image waves-effect waves-block waves-light">
                <p class="center-align"><span class="fa fa-check-circle-o"></span> Pontes em Bom Estado</p>
                <h3 class="center-align">{{count($pontes_estado_bom)}}</h3>
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4"><b>{{round((count($pontes_estado_bom)/count($pontes))*100,2)}} % </b><i class="material-icons right">more_vert</i></span>
                
                <p><a href="#">This is a link</a></p>
            </div>
            <div class="card-reveal green accent-2">
                <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                <p>
                <ul class="collection">
                    @foreach($pontes_estado_bom as $ponte)
                        <li class="collection-item avatar">
                            <img src="{{asset('storage/'.$ponte->imagem)}}" alt="" class="circle">
                            <span class="title">{{$ponte->nome_ponte}}</span>
                            <p>{{$ponte->estrada->nome_estrada}}<br> {{$ponte->distrito->nome_distrito}}
                            </p>
                            <a href="#!" class="secondary-content"><i class="material-icons">visibility</i></a>
                        </li>
                        @endforeach
                    </ul>
                
                </p>
            </div>
        </div>
    </div>
    @endif

    @if(count($pontes_estado_degradada) > 0)
        <div class="col s12 m6 l4">
            <div class="card sticky-action red accent-2">
                <div class="card-image waves-effect waves-block waves-light">
                    <p class="center-align"><span class="fa fa-exclamation-circle"></span> Pontes em Estado de ?</p>
                    <h3 class="center-align">{{count($pontes_estado_degradada)}}</h3>
                </div>
                <div class="card-content">
                    
                    <span class="card-title activator grey-text text-darken-4"><b>{{round((count($pontes_estado_degradada)/count($pontes))*100,2)}} %</b><i class="material-icons right">more_vert</i></span>
                
                    <p><a href="#">This is a link</a></p>
                </div>
                <div class="card-reveal red accent-2">
                    <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                    <p>
                        <ul class="collection">
                        @foreach($pontes_estado_degradada as $ponte)
                            <li class="collection-item avatar">
                                <img src="{{asset('storage/'.$ponte->imagem)}}" alt="" class="circle">
                                <span class="title">{{$ponte->nome_ponte}}</span>
                                <p>{{$ponte->estrada->nome_estrada}}<br> {{$ponte->distrito->nome_distrito}}
                                </p>
                                <a href="#!" class="secondary-content"><i class="material-icons">visibility</i></a>
                            </li>
                            @endforeach
                        </ul>
                    </p>
                </div>
            </div>
        </div>
      @endif
</div>

<!-- Graficos -->
<div class="row">       
        <div id="pie_chart" style="border: 1px solid #ccc" class="col s12"></div>
        <div id="area_chart" style="border: 1px solid #ccc" class="col s12"></div>
</div>


<!-- Mapa com lista de Pontes -->
<div class="row">
    <div class="col s12">
        <div id="charts"></div>
    </div>
</div>

<div class="fixed-action-btn">
    <a class="btn-floating btn-large red">
      <i class="large material-icons">add</i>
    </a>
    <ul>
      <li><a class="btn-floating teal"><i class="material-icons"></i>Ponte</a></li>
      <li><a class="btn-floating yellow darken-1"><i class="material-icons">account_circle</i></a></li>
    </ul>
  </div>
@endsection 


@section('js')
<script type="text/javascript">
$(document).ready(function() {

    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawPieChart);

    google.charts.setOnLoadCallback(drawAreaChart);

    function drawPieChart() {

        var data = google.visualization.arrayToDataTable([
            ['Ponte', 'Estado das Pontes'],
            ['Bom', {{count($pontes_estado_bom)}}],
            ['Degrado', {{count($pontes_estado_degradada)}}]
        ]);

        var options = {
                        title: 'Estado das Pontes',
                        height:300
                    };

        var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));

        chart.draw(data, options);
    }

    function drawAreaChart() {
        var data = google.visualization.arrayToDataTable([
          ['Provincia', 'Bom', 'Degradada'],
          ['Maputo',  17,      6],
          ['Gaza',  7,      4],
          ['Inhambane',  6,       12],
          ['Manica',  15,      4],
          ['Sofala',  12,      14],
          ['Zambézia',  5,      14],
          ['Tete',  17,      8],
          ['Nampula',  18,      5],
          ['Cabo-Delgado',  5,   12],
          ['Niassa',  15,  10]
        ]);

        var options = {
          title: 'Estado das Pontes Por Provincia',
          hAxis: {title: 'Provincia',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0},
          height:300
        };

        var chart = new google.visualization.AreaChart(document.getElementById('area_chart'));
        chart.draw(data, options);
      }







});

</script>
@endsection