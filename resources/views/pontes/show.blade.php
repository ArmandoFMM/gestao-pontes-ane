@extends('layouts.master')


@section('title')
    Ponte {{$ponte->nome_ponte}}
@endsection

@section('css')
    <style>
    .card .card-image img {
      height: 400px;
    }

    .carousel-slider {
    height: 400px !important;
}
    </style>
@endsection

@section('content')
    
    <div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-image">
          <div class="carousel carousel-slider" data-indicators="true">
            <a class="carousel-item" href="#one!"><img src="http://res.cloudinary.com/armandofm/image/upload/pontes-img/{{$ponte->id}}"></a>
            <a class="carousel-item" href="#two!"><img src="http://res.cloudinary.com/armandofm/image/upload/pontes-img/{{$ponte->id}}"></a>
            <a class="carousel-item" href="#three!"><img src="http://res.cloudinary.com/armandofm/image/upload/pontes-img/{{$ponte->id}}"></a>
            <a class="carousel-item" href="#four!"><img src="http://res.cloudinary.com/armandofm/image/upload/pontes-img/{{$ponte->id}}"></a>
          </div>
          <span class="card-title">Ponte {{$ponte->nome_ponte}}</span>
          <a href="{{route('pontes.edit',['id'=>$ponte->id])}}" class="btn-floating halfway-fab waves-effect waves-light teal"><i class="material-icons">mode_edit</i></a>
        </div>
        <div class="card-content">
            <h5><b>Estrada: </b>{{$ponte->estrada->nome_estrada}}</h5>
            <h5><b>Distrito: </b>{{$ponte->distrito->nome_distrito}}</h5>
            <h5><b>Provincia: </b>{{$ponte->distrito->provincia->nome_provincia}}</h5>
        </div>
      </div>
    </div>
  </div>
  <div class="col s12">
    <div id="map_div"></div>
  </div>
@endsection

@section('js')
<script type="text/javascript" src="/js/maps.js"></script>
<script>
$(document).ready(function(){
   $('.carousel.carousel-slider').carousel({full_width: true}); 
   autoplay(); 
function autoplay() {
    $('.carousel').carousel('next');
    setTimeout(autoplay, 4500);
}
});

    @if(Session::has('message'))
         Materialize.toast('{{Session::get('message')}}', 4000);
    @endif
</script>
@endsection