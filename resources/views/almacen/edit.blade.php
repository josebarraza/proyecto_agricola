@extends('plantillas.admin')
@section('content')
	<span class="letras-grandes">Editar Almacen</span>
	{!! Form::open(['route' => 'almacen.update','method'=>'POST','files'=>true]) !!}
	   	@include('almacen.forms.almacen')
	   	{!! Form::submit("Guardar ", ['class'=>'btn btn-success btn-block mt '])!!}
	{!! Form::close() !!}
@stop