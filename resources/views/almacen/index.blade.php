@extends('plantillas.admin')
@section('content')
<div class="panel panel-default lista-recursos">
  	<div class="panel-heading centrar-texto">
  		<span> <strong>Lista de Almacenes</strong></span>
  	</div>

  	@if(count($almacenes)>0)
		<table class="table tabla-recursos">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Ubicación</th>
				<th>Capacidad (costales)</th>
				<th>Stock Actual(costales)</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
		@foreach($almacenes as $almacen)
			<tr>
				<td>{{$almacen->nombre}} </td>
				<td>{{$almacen->direccion}}, Col. {{$almacen->colonia}}<br>
					{{$almacen->ciudad['ciudad']}}, {{$almacen->ciudad->estado['estado']}}, {{$almacen->ciudad->estado->pais['pais']}}
				</td>
				<td>{{$almacen->capacidad}}</td>
				<td>{{$almacen->stock}}</td>
				<td>{!! link_to_route('almacen.edit' , $title='Editar', $parameters = $almacen->id, $attributes = ['class' => 'btn btn-primary']) !!}
					{!!Form::open(['route' => ['almacen.destroy',$almacen->id],'method' => 'DELETE'])!!}
						{!!Form::submit('Eliminar',['class' => 'btn btn-danger'])!!}
					{!!Form::close()!!}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
 	@else
 	<span class="letra-grande">No hay almacenes registrados.</span>
 	@endif
</div>	
{{$almacenes-> render() }}
@stop