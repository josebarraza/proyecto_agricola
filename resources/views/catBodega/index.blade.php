@extends('plantillas.main')
@section('content')

<section id='bodegas'>
	<div class="container">
		<div class="row">
		@if(count($bodegas)< 1)
			<p>
				<h1>Oops.. por el momento no tenemos bodegas disponibles</h1>
			</p>
			<p>
				<h2>Ponte en <a href="/contacto">contacto</a> con nosotros </h2>
			</p>		
		@endif


	@foreach($bodegas as $bodega)
	  <div class="col-sm-6 col-md-3">
	    <div class="thumbnail">
	      <img src="<?php echo asset('img/'.$bodega->foto); ?>" style="height:200px" class="imgthumbs">
	      <div class="caption">
	        <h3>{{$bodega->nombre}}</h3>
	        <p>
				Largo {{$bodega->largo}}m, Ancho {{$bodega->ancho}}m, Alto {{$bodega->alto}}m 
				<br>
				Ubicación: {{$bodega->ciudad['ciudad']}}, {{$bodega->ciudad->estado['estado']}},
				{{$bodega->ciudad->estado->pais['pais']}}

	        </p>
	        <div class='thumbs-botones'>
	        	{!! link_to_route('catBodegas.show' , $title = 'Ver Más' , $parameters = $bodega->id, $attributes = ['class' => 'btn btn-primary']) !!}
	        </div>
	      </div>
	    </div>
	  </div>
	@endforeach
	</div>
	{!!$bodegas -> render() !!}
	</div>
</section>

@stop
