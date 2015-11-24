@extends('plantillas.admin')
@section('content')
	<div class="form-bodega">
		<span class="letra-grande">Edición de productos</span>
		{!!Form::model($producto,['route' => ['product.update',$producto->id],'method'=>'PUT','files'=>true])!!}
			@include('producto.forms.producto');
			{!! Form::submit("Guardar cambios", ['class' => 'btn btn-primary btn-block mt'])!!}
		{!!Form::close()!!}
	</div>
	@include('alertas.request')
@stop()