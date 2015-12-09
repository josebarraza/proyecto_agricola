@extends('plantillas.main')
@section('content')
	<style>
		#tabla-compras{
			width: 80%;
			margin: 0 auto;
		}
		#section-compras-cliente{
			margin-top: -90px;
		}
	</style>

	<section id="section-compras-cliente">
	@include('alertas.exito');
		
		@if(count($compras)>0)
		<table id="tabla-compras" class="table">
			<tr>
				<th>Cantidad de productos</th>
				<th>Total</th>
				<th>Fecha (AAAA-MM-DD)</th>
				<th>Descargar detalle</th>
				
			</tr>
		@foreach($compras as $compra)
			<tr>
				<td>{{count($compra->lineasDeVenta)}}</td>
				<td>{{number_format($compra->totalVenta())}} MXN.</td>
				<td>{{$compra->created_at}}</td>
				<td> 
					<a href="/venta/pdf/{{$compra->id}}" class="btn btn-">Descargar</a>
				 </td>
				
			</tr>
		@endforeach
		</table>
		@else
			<h3>Por el momento no cuentas con compras</h3>
			<br>
			<a class="btn btn-add"href="/catProductos">ver produtos</a>
		@endif
		{!!$compras!!}
	</section>

@stop()