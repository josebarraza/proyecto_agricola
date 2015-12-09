@extends('plantillas.admin')
@section('content')

@include('alertas.exito')

<div class="panel panel-default lista-recursos">
  	<div class="panel-heading centrar-texto">
  		<strong>Lista de usuarios</strong>
  	</div>
	<table  class="table tabla-recursos">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Correo</th>
				<th>Tipo de usuario</th>
				<th>Operaciones</th>
			</tr>
		</thead>
		<tbody>
		@foreach($users as $user)
			<tr>
				<td>{{$user -> nombre}} {{$user -> apellido_pat}} {{$user -> apellido_mat}}</td>
				<td>{{$user -> email}}</td>
				@if($user->tipo == 1)
					<td>Cliente</td>
				@elseif($user->tipo==2)
					<td>Administrador</td>
				@else
					<td>Depto. Exportación</td>	
				@endif		
				<td>{!! link_to_route('user.edit' , $title = 'Editar' , $parameters = $user->id, $attributes = ['class' => 'btn btn-primary']) !!}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>	
	{!! $users !!}

	
@stop