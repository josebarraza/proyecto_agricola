 @extends('plantillas.admin')
@section('content')
@include('alertas.exito');
<div class="panel panel-default lista-recursos">
  	<div class="panel-heading centrar-texto">
  		<span> <strong>Lista de Producciones</strong></span>
  	</div>

  	@if(count($producciones)>0)
		<table class="table tabla-recursos">
		<thead>
			<tr>
				<th>Producto</th>
				<th>Cosecha (AAAA/MM/DD)</th>
				<th>Cantidad<br>(costales)</th>
				<th>Costo (PESOS)</th>
				<th>Origen</th>
				<th>Almacén destino</th>
				<th>Características</th>
				<th>Dificultades</th>
			</tr>
		</thead>
		<tbody>

		@foreach($producciones as $produccion)
			<tr>
				<td>{{$produccion->inventario->producto->nombre}} </td>
				<td>{{$produccion->inventario->fechacosecha}}</td>
				<td>{{$produccion->cantidad}}</td>
				<td>{{$produccion->precio}}</td>
				<td>{{$produccion->ciudad['ciudad']}}, {{$produccion->ciudad->estado['estado']}}, {{$produccion->ciudad->estado->pais['pais']}} </td>
				<td>{{$produccion->inventario->almacen->nombre}} </td>
				<td>{{$produccion->caracteristicas}} </td>
				<td>{{$produccion->dificultades}} </td>
			</tr>
		@endforeach
		</tbody>
	</table>
 	@else
 	<span class="letra-grande">No hay producciones registradas.</span>
 	@endif
</div>	
@stop>
