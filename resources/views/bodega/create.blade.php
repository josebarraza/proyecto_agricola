@extends('plantillas.admin')
@section('content')
	
	<div class="form-bodega">
		<span class="letra-grande">Registro de bodegas</span>
		{!!Form::open(['route'=>'bodega.store','method'=>'POST','files'=>true])!!}
			@include('bodega.forms.bodega')
			{!! Form::submit("Guardar ", ['class' => 'btn btn-success btn-block mt'])!!}
		{!!Form::close()!!}
	</div>
	@include('alertas.request')

@stop() 
