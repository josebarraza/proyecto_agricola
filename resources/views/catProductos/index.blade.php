@extends('plantillas.main')
@section('content')

<section id='granos'>
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
		      <img src="<?php echo asset('img/'.$producto->foto); ?>" style="height:200px;width:100%" class="img-granos">
		      <div class="caption center">
		        <h3>{{$producto->nombre}} <span class="glyphicon glyphicon-grain verde-grain"></span></h3>
		        <p class="bold">Kg por costal: {{$producto->saco_kilos}}kg.</p>
		        <p class="bold">Precio por costal: {{number_format($producto->precio)}} MXN.</p>
		        <div class='thumbs-botones'>
		        		<input class="ainput"type="hidden" name="_token" value="{{csrf_token()}}" id="token">
		        		@if(Auth::check() && $producto->inventario)
		        		<button id="{{$producto->id}}" data-carrito=true class="btn boton-add"><span class="glyphicon glyphicon-shopping-cart"></span> Añadir al carrito</button>
		        		@elseif(!Auth::check())
		        		<a data-toggle="modal" class="btn boton-add"href="#myModal">Ingresa para comprar</a> 
		        		@else
		        		<button class="btn boton-add"><span class="glyphicon glyphicon-ban-circle"></span> Producto agotado</button>

		        		@endif 	
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
