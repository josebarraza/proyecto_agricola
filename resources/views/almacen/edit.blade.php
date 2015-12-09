@extends('plantillas.admin')
@section('content')
	<span class="letra-grande">Editar Almacén</span>
	{!!Form::model($almacen,['route' => ['almacen.update',$almacen->id],'method'=>'PUT'])!!}
	   	@include('almacen.forms.almacen',$paises);
	   	{!! Form::submit("Guardar ", ['class'=>'btn btn-success btn-block mt '])!!}
	{!! Form::close() !!}
@stop