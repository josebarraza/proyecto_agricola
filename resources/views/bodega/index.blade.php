@extends('plantillas.admin')
@section('content')
	<style>
		.img-bodega{
			width: 150px;
			height: 150px;
			border-radius: 5%;
			
		}
		
		
	</style>

	@include('alertas.exito')

<div class="panel panel-default lista-recursos">
  	<div class="panel-heading centrar-texto">
  		<span ><strong>Lista de bodegas</strong></span>
  	</div>
	<table  class="table tabla-recursos">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Ancho, Largo, Alto</th>
				<th>Ubicación</th>
				<th>Precio</th>
				<th>Estatus</th>
				<th>Comentarios</th>
				<th>Foto</th>
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>
		@foreach($bodegas as $bodega)
			<tr>
				<td>{!!$bodega->nombre!!} </td>
				<td>{!!$bodega->ancho!!}mts - {!!$bodega->largo!!}mts - {!!$bodega->alto!!}mts</td>
				<td >{!!$bodega->direccion!!}<br>Col. {!!$bodega->colonia!!}<br>{!!$bodega->ciudad['ciudad']!!}<br>{!!$bodega->ciudad->estado['estado']!!}<br>{!!$bodega->ciudad->estado->pais['pais']!!}</td>
				<td >{!!$bodega->precio!!} pesos</td>
				 @if($bodega->status == 1)
					<td > <span class="label label-success">Disponible</span> </td>
				 @else
				 	<td><span class="label label-danger">En renta</span></td>	
				 @endif
				 <td>{!!$bodega->comentarios!!}</td>
				 <td><img src="<?php echo asset('img/'.$bodega->foto); ?>" class="img-bodega"></td>
				
				<td>{!! link_to_route('bodega.edit' , $title = 'Editar' , $parameters = $bodega->id, $attributes = ['class' => 'btn btn-primary']) !!}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>	
	{!! $bodegas !!}

@stop()