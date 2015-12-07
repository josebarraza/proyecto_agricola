@extends('plantillas.admin')
@section('content')
@include('alertas.exito');
<div class="panel panel-default lista-recursos">
  	<div class="panel-heading centrar-texto">
  		<span> <strong>Lista de Compras</strong></span>
  	</div>
  	@if(count($compras)>0)
		<table class="table tabla-recursos">
		<thead>
			<tr>
				<th>Producto</th>
				<th>Cosecha (AAAA/MM/DD)</th>
				<th>Cantidad<br>(costales)</th>
				<th>Costo (PESOS)</th>
				<th>Origen</th>
				<th>Almacen destino</th>
				<th>Proveedor</th>
				<th>Status de certificación</th>
			</tr>
		</thead>
		<tbody>
		@foreach($compras as $compra)
			<tr>
				<td>{{$compra->inventario->producto->nombre}} </td>
				<td>{{$compra->inventario->fechacosecha}}</td>
				<td>{{$compra->cantidad}}</td>
				<td>{{$compra->precio}}</td>
				<td>{{$compra->ciudad['ciudad']}}, {{$compra->ciudad->estado['estado']}}, {{$compra->ciudad->estado->pais['pais']}} </td>
				<td>{{$compra->inventario->almacen->nombre}} </td>
				<td>{{$compra->proveedor}} </td>
				@if($compra->inventario->status>=0)
					<td> {{$compra->inventario->status}} certificaciones</td>
				@else
					<td>Rechazado por incumplimiento de la calidad minima.</td>
				@endif
			</tr>
		@endforeach
		</tbody>
	</table>
 	@else
 	<span class="letra-grande">No hay compras registradas.</span>
 	@endif
</div>	
@stop