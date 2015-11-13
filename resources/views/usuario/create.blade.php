@extends('plantillas.admin')
@section('content')
	<div class="form-user">
		<span class="letra-grande ">Registro de usuarios</span>
		{!! Form::open(['route' => 'user.store','method'=>'POST']) !!}
	    	@include('usuario.forms.user')
	    	<div class="form-group">
	    	{!!Form::label('Tipo de usuario:')!!} <br>
	    	<label class="radio-inline"><input checked="checked" type="radio" value='2' name="tipo">Administrador</label>
			<label class="radio-inline"><input type="radio" value='1' name="tipo">Cliente</label>
	    </div>
	        {!! Form::submit("Guardar ", ['class' => 'btn btn-success btn-block '])!!}
		{!! Form::close() !!}
	
	@include('alertas.request')

</div>
@stop()