@extends('plantillas.admin')
@section('content')
	<span class="letra-grande">Registro de Compra</span>
	<div class="form-almacen">
	{!! Form::open(['route' => 'compra.store','method'=>'POST']) !!}
	   	@include('compra.forms.compra')
		
	   	{!! Form::submit("Guardar", ['class'=>'btn btn-success btn-block mt '])!!}
	   	<br>
	   	<br>
	   	{!! link_to_route('compra.index' , $title = 'Cancelar compra' ,$attributes = ['class' => 'btn btn-default']) !!}
	{!! Form::close() !!}
</div>
 
@stop