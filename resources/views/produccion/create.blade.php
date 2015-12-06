@extends('plantillas.admin')
@section('content')
	<span class="letra-grande">Registro de Producción</span>
	<div class="form-almacen">
	{!! Form::open(['route' => 'produccion.store','method'=>'POST']) !!}
	   	@include('produccion.forms.produccion')
		
	   	{!! Form::submit("Guardar", ['class'=>'btn btn-success btn-block mt '])!!}
	{!! Form::close() !!}
</div>
 
@stop