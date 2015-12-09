@extends('plantillas.admin')
@section('content')
	<span class="letra-grande ">Registro de Almacén</span>
<div class="form-almacen">
	{!! Form::open(['route' => 'almacen.store','method'=>'POST','files'=>true]) !!}
	   	@include('almacen.forms.almacen')
	   	{!! Form::submit("Guardar ", ['class'=>'btn btn-success btn-block mt '])!!}
	{!! Form::close() !!}
</div>
@stop