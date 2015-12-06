@extends('plantillas.admin')
@section('content')
<div class="panel panel-default lista-recursos">
  	<div class="panel-heading centrar-texto">
  		<span> <strong>Lista de Producciones</strong></span>
  	</div>

  	@if(count($producciones)>0)
		<table class="table tabla-recursos">
		<thead>
			<tr>
				<th>Producto</th>
				<th>Cosecha (MM/AAAA)</th>
				<th>Cantidad<br>(costales)</th>
				<th>Costo (PESOS)</th>
				<th>Origen</th>
				<th>Almacen destino</th>
				<th>Caracteristicas</th>
				<th>Dificultades</th>
			</tr>
		</thead>
		<tbody>
		@foreach($producciones as $produccion)
			<tr>
				<td>{{$produccion->inventario->producto->nombre}} </td>
				<td>{{$produccion->inventario->aniocosecha}}/{{$produccion->inventario->mescosecha}}</td>
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
@stop