@extends('plantillas.main')
@section('content')

<section id='bodegas'>
	<div class="container">
		<div class="row">
		@if(count($productos)< 1)
			<p>
				<h1>Oops.. por el momento no tenemos productos disponibles</h1>
			</p>
			<p>
				<h2>Ponte en <a href="/contacto">contacto</a> con nosotros </h2>
			</p>		
		@endif
	<div id="div-add-carrito">
	@foreach($productos as $producto)
	  <div class="col-sm-6 col-md-3">
	    <div class="thumbnail">
	      <img src="<?php echo asset('img/'.$producto->foto); ?>" style="height:200px" class="img-granos">
	      <div class="caption center">
	        <h3>{{$producto->nombre}}</h3>
	        <p class="bold">Kg por costal: {{$producto->saco_kilos}}kg.</p>
	        <p class="bold">Precio por costal: {{number_format($producto->precio)}} MXN.</p>
	        <div class='thumbs-botones'>
	        		<input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
	        		<button id="{{$producto->id}}" class="btn boton-add"><span class="glyphicon glyphicon-shopping-cart"></span>Añadir al carrito</button>
	        	
	        </div>
	      </div>
	    </div>
	  </div>
	@endforeach
	</div>
	</div>
	{!!$productos -> render() !!}
	</div>
</section>

@stop
