@extends('plantillas.admin')
@section('content')
	
<div class="panel panel-default lista-recursos">
@include('alertas.exito')
  	<div class="panel-heading centrar-texto">
  		<strong>Lista de ventas con número de pedimento</strong>
  	</div>
	<table  id="tabla-pedimentos" class="table tabla-recursos">
		<thead>
			<tr>
				<th># Venta</th>
				<th>Cliente</th>
				<th>Destino de entrega</th>
				<th>Total de la venta</th>
				<th>No. Pedimento</th>
				@extends('plantillas.admin')
@section('content')
	
<div class="panel panel-default lista-recursos">
@include('alertas.exito')
  	<div class="panel-heading centrar-texto">
  		<strong>Lista de ventas pendientes de pedimento</strong>
  	</div>
	<table  id="tabla-pedimentos" class="table tabla-recursos">
		<thead>
			<tr>
				<th># Venta</th>
				<th>Cliente</th>
				<th>Destino de entrega</th>
				<th>Total de la venta</th>
				<th>No. Pedimento</th>
				<th>Acción</th>@extends('plantillas.admin')
@section('content')
	
<div class="panel panel-default lista-recursos">
@include('alertas.exito')
  	<div class="panel-heading centrar-texto">
  		<strong>Lista de ventas pendientes de pedimento</strong>
  	</div>
	<table  id="tabla-pedimentos" class="table tabla-recursos">
		<thead>
			<tr>
				<th># Venta</th>
				<th>Cliente</th>
				<th>Destino de entrega</th>
				<th>Total de la venta</th>
				<th>No. Pedimento</th>
			</tr>
		</thead>
		<tbody>
		@foreach($ventas as $venta)
			<tr>
				<td>{{$venta->id}}</td>
				<td>
				{{$venta->cliente->nombre}} 
				{{$venta->cliente->apellido_pat}} 
				{{$venta->cliente->apellido_mat}}
				</td>
				<td>
					{{$venta->address->ciudad->ciudad}} {{$venta->address->ciudad->estado->estado}} {{$venta->address->ciudad->estado->pais->pais}}
				</td>
				<td>
					{{number_format($venta->totalVenta())}} MXN.
				</td>
				<td>
					{{$venta->pedimento}}
				</td>
				
				
			</tr>
		@endforeach
		</tbody>
	</table>
	{!! $ventas->render()!!}
</div>	
	
@stop()
			</tr>
		</thead>
		<tbody>
		@foreach($ventas as $venta)
			<tr>
				<td>{{$venta->id}}</td>
				<td>
				{{$venta->cliente->nombre}} 
				{{$venta->cliente->apellido_pat}} 
				{{$venta->cliente->apellido_mat}}
				</td>
				<td>
					{{$venta->address->ciudad->ciudad}} {{$venta->address->ciudad->estado->estado}} {{$venta->address->ciudad->estado->pais->pais}}
				</td>
				<td>
					{{number_format($venta->totalVenta())}} MXN.
				</td>
				<td>
					<input disabled  id="{{$venta->id}}" type="text" class="form-control">
				</td>
				<td>
					<button class="btn btn-warning"id="{{$venta->id}}">Obtener pedimento</button>
					<a id="{{$venta->id}}" style="display:none;"class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span></a>
					<input type="hidden" name="_token" value="{{csrf_token()}}" id="Token">
				</td>
				
			</tr>
		@endforeach
		</tbody>
	</table>
	{!! $ventas->render()!!}
</div>	
	
@stop()
			</tr>
		</thead>
		<tbody>
		@foreach($ventas as $venta)
			<tr>
				<td>{{$venta->id}}</td>
				<td>
				{{$venta->cliente->nombre}} 
				{{$venta->cliente->apellido_pat}} 
				{{$venta->cliente->apellido_mat}}
				</td>
				<td>
					{{$venta->address->ciudad->ciudad}} {{$venta->address->ciudad->estado->estado}} {{$venta->address->ciudad->estado->pais->pais}}
				</td>
				<td>
					{{number_format($venta->totalVenta())}} MXN.
				</td>
				<td>
					<input disabled  id="{{$venta->id}}" type="text" class="form-control">
				</td>
				<td>
					<button class="btn btn-warning"id="{{$venta->id}}">Obtener pedimento</button>
					<a id="{{$venta->id}}" style="display:none;"class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span></a>
					<input type="hidden" name="_token" value="{{csrf_token()}}" id="Token">
				</td>
				
			</tr>
		@endforeach
		</tbody>
	</table>
	{!! $ventas->render()!!}
</div>	
	
@stop()