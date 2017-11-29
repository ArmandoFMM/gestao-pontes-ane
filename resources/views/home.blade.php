@extends('layouts.master') 


@section('title')
Dashboard
@endsection

@section('css')
<style>
    .panels .card {
        height: 250px;
    }
</style>
@endsection

@section('content')

<div class="section">
    <h4 class="center">Visão Geral das pontes</h4>
    <div class="row panels">

        <!-- Total de Pontes -->
        <div class="col s12 m6 l4">
            <div class="card sticky-action">
                <div class="card-image waves-effect waves-block waves-light">
                    <p class="center-align"><span class="fa fa-road"></span> Total de Pontes</p>
                    <h3 class="center-align">{{count($pontes)}}</h3>
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

                </div>
                <div class="card-reveal green accent-2">
                    <span class="card-title grey-text text-darken-4">Pontes em Bom Estado<i class="material-icons right">close</i></span>
                    <p>
                    <ul class="collection">
                        @foreach($pontes_estado_bom as $ponte)
                            <li class="collection-item avatar">
                                <img src="http://res.cloudinary.com/armandofm/image/upload/pontes-img/{{$ponte->id}}" alt="" class="circle">
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

        @if(count($pontes_estado_grave) > 0)
            <div class="col s12 m6 l4">
                <div class="card sticky-action yellow accent-2">
                    <div class="card-image waves-effect waves-block waves-light">
                        <p class="center-align"><span class="fa fa-exclamation-circle"></span> Pontes em Estado Grave</p>
                        <h3 class="center-align">{{count($pontes_estado_grave)}}</h3>
                    </div>
                    <div class="card-content">

                        <span class="card-title activator grey-text text-darken-4"><b>{{round((count($pontes_estado_grave)/count($pontes))*100,2)}} %</b><i class="material-icons right">more_vert</i></span>

                        {{--<p><a href="#">This is a link</a></p>--}}
                    </div>
                    <div class="card-reveal red accent-2">
                        <span class="card-title grey-text text-darken-4">Pontes em Estado Grave<i class="material-icons right">close</i></span>
                        <p>
                            <ul class="collection">
                            @foreach($pontes_estado_grave as $ponte)
                                <li class="collection-item avatar">
                                    <img src="http://res.cloudinary.com/armandofm/image/upload/pontes-img/{{$ponte->id}}" alt="" class="circle">
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


        @if(count($pontes_estado_critico) > 0)
            <div class="col s12 m6 l4">
                <div class="card sticky-action orange">
                    <div class="card-image waves-effect waves-block waves-light">
                        <p class="center-align"><span class="fa fa-exclamation-circle"></span> Pontes em Estado Crítico</p>
                        <h3 class="center-align">{{count($pontes_estado_critico)}}</h3>
                    </div>
                    <div class="card-content">

                        <span class="card-title activator grey-text text-darken-4"><b>{{round((count($pontes_estado_critico)/count($pontes))*100,2)}} %</b><i class="material-icons right">more_vert</i></span>

                    </div>
                    <div class="card-reveal red accent-2">
                        <span class="card-title grey-text text-darken-4">Pontes em Estado Crítico<i class="material-icons right">close</i></span>
                        <p>
                            <ul class="collection">
                                @foreach($pontes_estado_critico as $ponte)
                                    <li class="collection-item avatar">
                                        <img src="http://res.cloudinary.com/armandofm/image/upload/pontes-img/{{$ponte->id}}" alt="" class="circle">
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

        @if(count($pontes_estado_rotura) > 0)
            <div class="col s12 m6 l4">
                <div class="card sticky-action red">
                    <div class="card-image waves-effect waves-block waves-light">
                        <p class="center-align"><span class="fa fa-exclamation-circle"></span> Pontes em Estado de Rotura Iminente</p>
                        <h3 class="center-align">{{count($pontes_estado_rotura)}}</h3>
                    </div>
                    <div class="card-content">

                        <span class="card-title activator grey-text text-darken-4"><b>{{round((count($pontes_estado_rotura)/count($pontes))*100,2)}} %</b><i class="material-icons right">more_vert</i></span>

                        <p><a class="btn btn-floating pulse" href="#"><i class="material-icons">remove_red_eye</i></a></p>
                    </div>
                    <div class="card-reveal red accent-2">
                        <span class="card-title grey-text text-darken-4">Pontes em Estado de Rotura Iminente<i class="material-icons right">close</i></span>
                        <p>
                            <ul class="collection">
                                @foreach($pontes_estado_rotura as $ponte)
                                    <li class="collection-item avatar">
                                        <img src="http://res.cloudinary.com/armandofm/image/upload/pontes-img/{{$ponte->id}}" alt="" class="circle">
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
</div>
<!-- Graficos -->
<div class="divider"></div>
<div class="section">
    <h4 class="center">Relatórios</h4>
    <div id="app">
        <dashboard></dashboard>
    </div>
</div>


<div class="row">
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
      <li><a href="{{route('pontes.create')}}" class="btn-floating teal"><i class="material-icons">pin_drop</i></a></li>
      <li><a class="btn-floating yellow darken-1"><i class="material-icons">account_circle</i></a></li>
    </ul>
  </div>
@endsection 


@section('js')
    <script src="/js/app.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {

//        google.charts.load('current', { 'packages': ['corechart'] });
//
//        // google.charts.setOnLoadCallback(drawAreaChart);
//
//        function drawAreaChart() {
//            var data = google.visualization.arrayToDataTable([
//              ['Provincia', 'Bom', 'Grave'],
//              ['Maputo',  17,      6],
//              ['Gaza',  7,      4],
//              ['Inhambane',  6,       12],
//              ['Manica',  15,      4],
//              ['Sofala',  12,      14],
//              ['Zambézia',  5,      14],
//              ['Tete',  17,      8],
//              ['Nampula',  18,      5],
//              ['Cabo-Delgado',  5,   12],
//              ['Niassa',  15,  10]
//            ]);
//
//            var options = {
//              title: 'Estado das Pontes Por Provincia',
//              hAxis: {title: 'Provincia',  titleTextStyle: {color: '#333'}},
//              vAxis: {minValue: 0},
//              height:300
//            };
//
//            var chart = new google.visualization.AreaChart(document.getElementById('area_chart'));
//            chart.draw(data, options);
//          }







    });

    </script>
@endsection