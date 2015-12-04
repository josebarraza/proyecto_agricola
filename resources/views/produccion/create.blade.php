@extends('plantillas.admin')
@section('content')
	<span class="letra-grande">Registro de Producción</span>
	<div class="form-almacen">
	{!! Form::open(['route' => 'produccion.store','method'=>'POST']) !!}
	   	@include('produccion.forms.produccion')
		
		<!--COSTO-->
		{!! Form::label('lblcosto', 'Costo de Producción: $',['class' => '']) !!}
	    {!! Form::number('costo', null, ['class' => 'small' ,'placeholder'=>'MN','min'=>1,'step'=>'any']) !!}
		<br>
		{!! Form::label('lblcaracteristicas', 'Caracteristicas del producto:') !!}
	    {!! Form::text('caracteristicas', null, ['class' => 'form-control','placeholder'=>'Caracteristicas del producto cosechado. ']) !!}
		<br>
		{!! Form::label('lbldificultades', 'Dificultades durante la cosecha:') !!}
	    {!! Form::text('dificultades', null, ['class' => 'form-control','placeholder'=>'Percanses y/o situaciones de amenaza durante la cosecha']) !!}

	   	{!! Form::submit("Guardar", ['class'=>'btn btn-success btn-block mt '])!!}
	{!! Form::close() !!}
</div>

@stop