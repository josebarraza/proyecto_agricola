@extends('plantillas.admin')
@section('content')
<section>
<div class="panel panel-default lista-recursos">
  	<div class="panel-heading centrar-texto">
  		<span class="letras-grandes">Lista de Almacenes</span>
  	</div>
	<table  class="table tabla-recursos">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Ubicación</th>
				<th>Capacidad</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
		@foreach($almacenes as $almacen)
			<tr>
				<td>{{$almacen->nombre}} </td>
				<td>{{$almacen->direccion}}<br>
					Col. {{$almacen->colonia}}<br>
					{{$almacen->ciudad['ciudad']}}<br>
					{{$almacen->ciudad->estado['estado']}}<br>
					{{$almacen->ciudad->estado->pais['pais']}}
				</td>
				<td>{{$almacen->capacidad}}</td>
				<td>{!! link_to_route('almacen.edit' , $title = 'Editar' , $parameters = $almacen->id, $attributes = ['class' => 'btn btn-primary']) !!}
				{!! link_to_route('almacen.destroy' , $title = 'Eliminar' , $parameters = $almacen->id, $attributes = ['class' => 'btn btn-danger']) !!}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>	
{{$almacenes-> render() }}
</section>
@stop