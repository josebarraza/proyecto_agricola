@extends('plantillas.main')
@section('content')
<section id='bodegas'>
	<div class="container">
		<div class="row">
			@foreach(Auth::user()->lineasCarrito as $linea)
				<h5>{{$linea}}</h5>
			@endforeach
		</div>
	</div>
</section>
@stop