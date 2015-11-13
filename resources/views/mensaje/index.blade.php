@extends('plantillas.admin')
@section('content')
@include('alertas.exito')
	<div class="panel panel-default lista-recursos">
  	<div class="panel-heading centrar-texto">
  		<strong>Mensajes </strong>
  	</div>
	<table  class="table tabla-recursos">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Correo</th>
				<th>Celular</th>
				<th>Mensaje</th>
				<th>Operación</th>
			</tr>
		</thead>
		<tbody>
		@foreach($mensajes as $msg)
			<tr>
				<td>
					{{$msg->nombre}}
				</td>
				<td>
					{{$msg->correo}}
				</td>
				<td>
					{{$msg->celular}}
				</td>
				<td>
					{{$msg->mensaje}}
				</td>
				<td>
					{!!Form::open(['route' => ['mensajes.destroy',$msg->id],'method' => 'DELETE'])!!}
						{!!Form::submit('Eliminar',['class' => 'btn btn-danger btn-block'])!!}
					{!!Form::close()!!}
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>	
@stop