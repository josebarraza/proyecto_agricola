@extends('plantillas.main')
@section('content')

<style>

	section#section-pedido{
		width: 80%;
		margin-left: 200px;
		margin-top:-70px;
	}
	.div-work{
		width: 50%;
	}
	.div-tasks{
		width: 30%;
		
		margin-left: 20px;
	}
	.div-work,.div-tasks{
		display: inline-block;
		vertical-align: top;
	}
	
	.info-titulo{
		background-color: #0F9CD0;
		
		color: white;
		text-align: center;
	}
	
	.editar-pedido{
		color: white;
		background-color: #0F9CD0;
	}
	.editar-pedido:hover{
		color: black;
	}
	#btn-pagar{
		float: right;
		color: white;
		background-color: black;
		font-weight: bold;
		width: 70px;
	}
	#btn-pagar:hover{
		color: white;
		background-color:  #0F9CD0;
	}
	.forma-pago,.detalle-direccion,#tabla-direccion{
		display: none;
	}
	hr{
		background-color:  #0F9CD0;
		height: 5px;
	}
	
</style>

<section id="section-pedido">
	<div class="div-work">

	<!-- FORM PEDIDO -->
		<div id="form-pedido">
			<h4 class="info-titulo">INFORMACION DE ENTREGA</h4>
			<select class="form-control select-dir" name="direccion" id="select-dir">
				<option value="-1">Selecciona tu dirección</option>
				@foreach($addresses as $address)
					<option value="{{$address->id}}">{{$address->ciudad->ciudad}} {{$address->ciudad->estado->estado}} {{$address->ciudad->estado->pais->pais}} - {{$address->calle}} {{$address->colonia}}</option>
				@endforeach
				<option value="0"> Otra </option>
			</select>
			<br>

			<table id="tabla-direccion"class="table">
				
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
						<select id="estado"  class="form-control "></select>
					</td>
				</tr>
				<tr>
					<td>Ciudad</td>
					<td><select  id="ciudad" class="form-control "></select></td>
				</tr>
				<tr>
					<td>Calle y número</td>
					<td> <input id="txtCalle"type="text" class="form-control"> </td>
				</tr>
				<tr>
					<td>Colonia</td>
					<td> <input id="txtColonia"type="text" class="form-control"> </td>
				</tr>
				<tr>
					<td>Código postal</td>
					<td> <input id="txtCp"type="text" class="form-control"> </td>
				</tr>
				<tr>
					<td colspan="2">
						<a id="siguiente-pagar" style="float:right;" class="editar-pedido btn ">Siguiente</a>
					</td>
				</tr>
			</table>
		</div>
		<!-- FORM PAGAR -->
		<div class="forma-pago">
	<table class="table">
		<tr>
			<td colspan="4"> <h4 class="info-titulo">Tarjeta de crédito o débito</h4></td>
		</tr>
		<tr>
			<td colspan="2">Nombre <input id="txtNomCard" type="text" class="form-control"> </td>
			<td colspan="2">Apellido <input id="txtApCard" type="text" class="form-control"></td>
		</tr>
		<tr>
			<td colspan="4">Número de tarjeta <input id="txtNumCard" type="text" class="form-control"></td>
			
		</tr>
		<tr>
			<td colspan="2">Fecha de vencimiento  
			</td>
			<td colspan="1"> 
				<select  id="fechaCard">
					<option value="1">Enero</option>
					<option value="2">Febrero</option>
					<option value="3">Marzo</option>
					<option value="4">Abril</option>
					<option value="5">Mayo</option>
					<option value="6">Junio</option>
					<option value="7">Julio</option>
					<option value="8">Agosto</option>
					<option value="9">Septiembre</option>
					<option value="10">Octubre</option>
					<option value="11">Noviembre</option>
					<option value="12">Diciembre</option>
				</select>
			 </td>
			<td colspan="1">  <select name="" id="anioCard">
				@for($i=2015;$i<2029;$i++)
					<option value="{{$i-2014}}">{{$i}}</option>
					@endfor
				 </select>	 
			</td>
		</tr>
		<tr>
			<td colspan="4">Codigo de seguridad (3) <input id="txtCodigoCard" type="text" class="form-control"></td>
		</tr>
		<tr>
			<td colspan="4">
				<button class="btn" id="btn-pagar">Pagar</button>
			</td>
		</tr>
	</table>
	</div>
	
</div>	

<div class="div-tasks">
<hr>
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
	<hr>
	<div class="detalle-direccion">
		<table class="table">
			<tr>
				<td>Dirección de entrega</td>
				<td> <a  class="editar-direccion editar-pedido btn ">Editar</a> </td>
			</tr>
			<tr>
				<td> <span class="calle-e"></span></td>
				<td> <span class="colonia-e"></span> </td>
			</tr>
			<tr>
				<td colspan="2"> <span class="ubicacion-e"></span> </td>
				
			</tr>
			<tr>
				<td colspan="2"> <span class="cp-e"></span> </td>
			</tr>
			
		</table>
	</div>
</div>





</section>


@stop