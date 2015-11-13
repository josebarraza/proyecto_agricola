@extends('plantillas.admin')
@section('content')
	<div class="panel panel-default lista-recursos">
  	<div class="panel-heading centrar-texto">
  		<strong>Rentas de clientes</strong>
  	</div>
	<table  class="table tabla-recursos">
		<thead>
			<tr>
				<th>Nombre Cliente</th>
				<th>Correo Cliente</th>
				<th>Bodega Rentada</th>
			</tr>
		</thead>
		<tbody>
		@foreach($rentas as $renta)
			<tr>
				<td>
					{{$renta->cliente->nombre}} {{$renta->cliente->apellido_pat}} {{$renta->cliente->apellido_mat}}
				</td>
				<td>
					{{$renta->cliente->email}}
				</td>
				<td>
					{{$renta->bodega->nombre}}
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>	
@stop