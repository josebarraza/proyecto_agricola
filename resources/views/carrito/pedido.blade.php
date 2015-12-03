@extends('plantillas.main')
@section('content')

<style>
	.div-entrega{
		width: 80%;
		margin-left: 200px;
		margin-top:-70px;
	}

	.form-pedido{
		/*display: none;*/
	}
	.select{
		width: 30%;
	}
	#form-pedido{
		width: 50%;

	}
	.info-entrega{
		background-color: #0F9CD0;
		
		color: white;
		text-align: center;
	}
	
	.detalle-pedido{
		width: 25%;
		margin-left: 20px;
		margin-top: 20px;)

	}
	#form-pedido,.detalle-pedido{
		display: inline-block;
		vertical-align: top;
	}
	.editar-pedido{
		color: white;
		background-color: #0F9CD0;
	}
	.editar-pedido:hover{
		color: black;
	}
	.forma-pago{
		display: none;
	}
	
</style>

<section>
	<div class="div-entrega">
		<div id="form-pedido">
			<h4 class="info-entrega">INFORMACION DE ENTREGA</h4>
			<select class="form-control select-dir" name="direccion" id="">
				<option value="-1">Selecciona tu dirección</option>
				@foreach($addresses as $address)
					<option value="{{$address->id}}">{{$address->ciudad->ciudad}} {{$address->ciudad->estado->estado}} {{$address->ciudad->estado->pais->pais}} - {{$address->calle}} {{$address->colonia}}</option>
				@endforeach
				<option value="0"> Otra </option>
			</select>
			<br>

			<table class="table">
				<tr>
					<td>Nombre y apellido</td>
					<td> <input type="text" class="form-control"> </td>
				</tr>
				<tr>
					<td>Pais</td>
					<td>
						<select name="pais" id="pais" class="form-control">
			        	<option value="">Selecciona</option>
			        	@foreach($paises as $pais)
							<option value="{{$pais->id}}">{{$pais->pais}}</option>
			        	@endforeach
			        </select>
					</td>
				</tr>
				<tr>
					<td>Esatdo</td>
					<td>
						<select name="estado" id="estado" class="form-control "></select>
					</td>
				</tr>
				<tr>
					<td>Ciudad</td>
					<td><select name="ciudad" id="ciudad" class="form-control "></select></td>
				</tr>
				<tr>
					<td>Calle y número</td>
					<td> <input type="text" class="form-control"> </td>
				</tr>
				<tr>
					<td>Colonia</td>
					<td> <input type="text" class="form-control"> </td>
				</tr>
				<tr>
					<td>Código postal</td>
					<td> <input type="text" class="form-control"> </td>
				</tr>
				<tr>
					<td colspan="2">
						<a id="siguiente-pagar" style="float:right;" class="editar-pedido btn ">Siguiente</a>
					</td>
				</tr>
			</table>
		</div>
	<div class="detalle-pedido">
		<table class="table">
			<tr>
				<td>Resumen del pedido</td>
				<td> <a href="/carrito" class="editar-pedido btn ">Editar</a> </td>
			</tr>
			<tr>
				<td>Productos</td>
				<td>{{$productos}}</td>
			</tr>
			<tr>
				<td>Subtotal</td>
				<td>{{number_format($subtotal)}}</td>
			</tr>
			<tr>
				<td>Iva</td>
				<td>{{number_format($iva)}}</td>
			</tr>
			<tr>
				<th>Total</th>
				<th>{{number_format($total)}} MXN.</th>
			</tr>
		</table>
	</div>
</div>	

<div class="forma-pago">
	<table class="table">
		<tr>
			<td>Nombre y Apellido</td>
			<td> <input type="text" class="form-control"> </td>
		</tr>
		<tr>
			<td>Número de tarjeta</td>
			<td> <input type="text" class="form-control"> </td>
		</tr>
		<tr>
			<td>Fecha de vencimiento</td>
			<td> {!!Form::selectMonth('month',['class'=>'form-control'])!!} </td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
	</table>
</div>

</section>


@stop