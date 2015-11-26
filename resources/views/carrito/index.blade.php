@extends('plantillas.main')
@section('content')
<section id='carrito'>
	<div class="panel-carrito">
			<h3>CARRITO</h3>
			@foreach(Auth::user()->lineasCarrito as $linea)
				<h5>{{$linea}}</h5>
			@endforeach	
	</div>
</section>
@stop