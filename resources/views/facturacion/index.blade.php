@extends('plantillas.main')
@section('content')
<style>
	section.datos-facturacion{
		width: 80%;
		margin: 0 auto;
	}
</style>
	<section class="datos-facturacion">
		@if($datos)
		<h2>Datos de facturación</h2>
		<table class="table">
			<tr>
				<td><h4>Razon social:</h4> {{$datos->razon_social}}</td>
				<td><h4>RFC:</h4> {{$datos->rfc}}</td>
			</tr>
			<tr>
				<td><h4>Dirección:</h4> {{$datos->address->calle}}, {{$datos->address->colonia}}, c.p: {{$datos->address->cp}}</td>
				<td><h4>Ubicación:</h4> {{$datos->address->ciudad->ciudad}}, {{$datos->address->ciudad->estado->estado}}, {{$datos->address->ciudad->estado->pais->pais}}</td>
			</tr>
			<tr>
				<td>
					<h4>e-mail:</h4> {{$datos->email}}
				</td>
				<td><h4>Editar: </h4> {!! link_to_route('facturacion.edit' , $title = 'Editar' , $parameters = $datos->id, $attributes = ['class' => 'btn  btn-warning']) !!}
				</td>
			</tr>
		</table>
		
		@else
			<h2>Lo siento no cuenta con datos de facturación</h2>
			<br>
			<h3>Registre sus datos <a href="/facturacion/create">Aqui</a> </h3>
		@endif		


	</section>
@stop