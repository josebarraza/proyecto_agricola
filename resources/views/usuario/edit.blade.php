@extends('plantillas.admin')
@section('content')
	<div class="form-user">
		<span class="letra-grande ">Edición de usuarios</span>
		{!! Form::model($user,['route' => ['user.update',$user->id],'method'=>'PUT','files' => true]) !!}
	    	@include('Usuario.forms.user')
	        {!! Form::submit('Actualizar', ['class' => 'btn btn-success btn-block'])!!}
		{!! Form::close() !!}

		{!!Form::open(['route' => ['user.destroy',$user->id],'method' => 'DELETE'])!!}
			{!!Form::submit('Eliminar',['class' => 'btn btn-danger btn-block'])!!}
		{!!Form::close()!!}
	</div>
	@include('alertas.request')
	
@stop()