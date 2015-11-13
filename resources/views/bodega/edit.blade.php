@extends('plantillas.admin')
@section('content')
	
	<div class="form-bodega">
		<span class="letra-grande">Edición de bodegas</span>
		{!!Form::model($bodega,['route' => ['bodega.update',$bodega->id],'method'=>'PUT','files'=>true])!!}
			@include('bodega.forms.bodega',$paises);
			{!! Form::submit("Guardar", ['class' => 'btn btn-primary btn-block mt'])!!}
		{!!Form::close()!!}
		{!!Form::open(['route' => ['bodega.destroy',$bodega->id],'method' => 'DELETE'])!!}
			{!!Form::submit('Eliminar',['class' => 'btn btn-danger btn-block'])!!}
		{!!Form::close()!!}
	</div>
	@include('alertas.request')
	

@stop()