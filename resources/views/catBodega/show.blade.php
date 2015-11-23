@extends('plantillas.main')
@section('content')
<style>
	#div-img-little > img{
		width: 50px;
		height: 50px;
		border-radius: 50px;
	}
	#img-principal{
		width: 100%;
		height: 400px;
		border: solid #222 2px;
	}
</style>
<section id="show-bodega">
	<div class="container">
		<div class='info-bodega'>
			<img id="img-principal"src="<?php echo asset('img/'.$bodega->foto); ?>">
			<div id="div-img-little">
				<strong>Fotos: </strong><br>
				@foreach($fotos as $foto)
					<img src="<?php echo asset('img/'.$foto->foto); ?>">	
				@endforeach
				
			</div>
			

		</div>
		<div class="info-bodega">
			<h2>{{$bodega->nombre}} </h2>
			Medidas:
			Largo {{$bodega->largo}}m, Ancho {{$bodega->ancho}}m, Alto {{$bodega->alto}}m
			<br>
			Medidas de la entrada:
			Ancho entrada:{!!$bodega->ancho_entrada!!}m, Alto entrada:{!!$bodega->alto_entrada!!}m <br>
			Temperatura / Humedad : {!!$bodega->temperatura!!}°C / {!!$bodega->humedad!!}% <br>
			Modo de llegada: {!!$bodega->modoLlegada['modo']!!} <br>

			Ubicación: {{$bodega->ciudad->ciudad}}, {{$bodega->ciudad->estado->estado}}, {{$bodega->ciudad->estado->pais->pais}}
			<br>
			Dirección: {{$bodega->direccion}},{{$bodega->colonia}},
			<br>
			<p>
				Comentarios:
				{{$bodega->comentarios}}
			</p>
			Precio: ${{number_format($bodega->precio)}}.MXN (Mensuales)
			<br>
			<br>
			<br>
			<a href="/pdf/{!!$bodega->id!!}" class="btn btn-info">Descargar PDF</a>
			@if(Auth::check() && $bodega->status == 1 && Auth::user()->tarjeta)
				{!!link_to_route('catBodegas.edit',$titulo='Rentar',$parameters=$bodega->id,$attributes = ['class'=>'btn btn-danger btn-rentar'])!!}
			@elseif(Auth::check() && !Auth::user()->tarjeta)	
				<a data-toggle="modal" class="btn btn-warning" href="#modalPago">Elije una forma de pago</a>
				
			@elseif(!Auth::check())
			<div class='thumbs-botones'>
				<a class="btn btn-primary"data-toggle="modal" href="#myModal">Ingresa para rentar</a>
			</div>	
			@endif
		</div>	
		
	</div>
</section>
@stop