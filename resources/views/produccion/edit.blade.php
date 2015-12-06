@extends('plantillas.admin')
@section('content')
	<span class="letra-grande">Edición de Producción</span>
	<div class="form-almacen">
	{!!Form::model($almacen,['route' => ['almacen.update',$almacen->id],'method'=>'PUT'])!!}
	   	@include('produccion.forms.produccion',$paises,$productos,$almacenes)
		
	   	{!! Form::submit("Guardar", ['class'=>'btn btn-success btn-block mt '])!!}
	{!! Form::close() !!}
</div>
 
@stop