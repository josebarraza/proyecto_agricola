@extends('plantillas.admin')
@section('content')
	<div class="form-almacen">
	<span class="letra-grande">Registro de Producción</span>
	{!! Form::open(['route' => 'produccion.store','method'=>'POST','files'=>true]) !!}
	   	@include('produccion.forms.produccion')
		
		{!! Form::label('lblcaracteristicas', 'Caracteristicas del producto:') !!}
	    {!! Form::text('caracteristicas', null, ['class' => 'form-control','placeholder'=>'Caracteristicas del producto cosechado. ']) !!}

		{!! Form::label('lbldificultades', 'Dificultades durante la cosecha:') !!}
	    {!! Form::text('dificultades', null, ['class' => 'form-control','placeholder'=>'Percanses y/o situaciones de amenaza durante la cosecha']) !!}

	   	{!! Form::submit("Guardar", ['class'=>'btn btn-success btn-block mt '])!!}
	{!! Form::close() !!}
</div>

@stop