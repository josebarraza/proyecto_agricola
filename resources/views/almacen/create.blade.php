@extends('plantillas.admin')
@section('content')
<div class="form-almacen">
	<span class="letra-grande ">Registro de Almacen</span>
	{!! Form::open(['route' => 'almacen.store','method'=>'POST','files'=>true]) !!}
	   	@include('almacen.forms.almacen')
	   	{!! Form::submit("Guardar ", ['class'=>'btn btn-success btn-block mt '])!!}
	{!! Form::close() !!}
</div>
@stop