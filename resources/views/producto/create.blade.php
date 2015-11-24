@extends('plantillas.admin')
@section('content')
	<div class="form-user">
		<span class="letra-grande ">Registro de producto</span>
		{!! Form::open(['route' => 'product.store','method'=>'POST','files'=>true]) !!}
	    	@include('producto.forms.producto')
	    	{!! Form::submit("Guardar ", ['class'=>'btn btn-success btn-block mt '])!!}
		{!! Form::close() !!}
	@include('alertas.request')
</div>
@stop()