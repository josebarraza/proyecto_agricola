@extends('plantillas.admin')
@section('content')
	<style>
		.img-producto{
			width: 150px;
			height: 150px;
			border-radius: 5%;
		}
	</style>

	@include('alertas.exito')

<div class="panel panel-default lista-recursos">
  	<div class="panel-heading centrar-texto">
  		<span ><strong>Lista de productos</strong></span>
  	</div>
	<table  class="table tabla-recursos">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Kilogramos por costal</th>
				<th>Precio por costal</th>
				<th>Foto</th>
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>
		@foreach($productos as $producto)
			<tr>
				<td>{!!$producto->nombre!!} </td>
				<td>{!!$producto->saco_kilos!!}KG</td>
				<td>{!!number_format($producto->precio)!!} MXN.</td>
				 <td><img src="<?php echo asset('img/'.$producto->foto); ?>" class="img-producto"></td>
				<td>
					{!! link_to_route('product.edit' , $title = 'Editar' , $parameters = $producto->id, $attributes = ['class' => 'btn btn-primary btn-block']) !!}
					{!!Form::open(['route' => ['product.destroy',$producto->id],'method' => 'DELETE'])!!}
						{!!Form::submit('Eliminar',['class' => 'btn btn-danger btn-block '])!!}
					{!!Form::close()!!}
				</td>
					
			</tr>
		@endforeach
		</tbody>
	</table>
</div>	
	{!! $productos !!}

@stop()