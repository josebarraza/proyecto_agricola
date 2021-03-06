@extends('plantillas.main')
@section('content')

<style>
	table#tabla-carrito {
		width: 70%;
		font-weight: bold;
		text-align: center;
	
		border-radius: 5px;
	}
	#tabla-carrito thead tr th{
		color: white;
		height: 50px;
		background-color: black;
		text-align: center;
		
	}
	#tabla-carrito th{
		width: 20%;
	}
	
	input.cantidad{
		width: 50px;
	}
	#panel-total{
		width: 29%;
		border-radius: 5%;
		background-color: rgba(228,228,228,1);
	}
	.panel-carrito{
		width: 75%;
		margin-top: -102px;
		margin-left: 12.5%;
		background-color: white;
		padding-top: 20px;
	}
	#panel-total,#tabla-carrito{
		display: inline-block;
		vertical-align: top;
		margin-bottom: 10px;

	}
	.hr{
		color: black;
		background-color: black;
		height: 1px;
	}
	.span-detalle{
		
		font-size: 1.2em;
		margin-left: 20px;
		margin-bottom: 10px;
		margin-top: 10px;
	}
	.span-valor{
		font-weight: bold;
		font-size: 1.2em;
		float: right;
		margin-right: 20px;
		margin-top: 10px;
	}
	.span-total{
		font-weight: bold;
		font-size: 1.4em;
		float: right;
		margin-right: 20px;
		margin-top: 10px;
	}
	.span-detalle,.span-valor{
		display: inline-block;
	}
	.span-detalle-total{
		margin-bottom: 20px;
	}
	.group-total
	{
		margin-bottom: 5px;
	}
	.mr{
		margin-right: 5px;
	}
	.color-negro{
		color: black;
	}
</style>
<section id='carrito'>
	<div class="panel-carrito">
		
		@if(count($lineas)==0)
			<h3>Por el momento no tienes productos en el carrito</h3> <br>
				<h5><a href="/catProductos">ver productos</a></h5>
		@else
			<h3>CARRITO</h3>
			<table class="table"id="tabla-carrito">
					<thead>
						<tr>
							<th></th>
							<th>Descripción</th>
							<th>Precio</th>
							<th>Cantidad</th>
							<th>Total</th>
							<th> <button id="eliminar-todas" class="mr btn btn-xs btn-default color-negro">Eliminar</button> </th>
							
						</tr>
					</thead>
					<tbody>
						@foreach($lineas as $linea)
							<tr>
								<td><img src="<?php echo asset('img/'.$linea->producto->foto); ?>" style="height:75px;width:75px;margin-top:10px;" class="imgthumbs"></td>
								<td>{{$linea->producto->nombre}} <br> Costal: {{$linea->producto->saco_kilos}}kg</td>
								<td >$<span class="precio">{{number_format($linea->producto->precio)}}</span>  MXN.</td>
								<td><input type="number" value="{{$linea->cantidad}}" min="1" max="999" class="cantidad"></td>
								<td><span class="span-subtotal">$ {{number_format($linea->subtotal())}}.00</span></td>
								<td>
									<input class="ainput"type="hidden" name="_token" value="{{csrf_token()}}" id="tokenX">
									<button id="{{$linea->id}}"class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
								</td>

							</tr>
						@endforeach	
					</tbody>
				</table>

				<!-- PANEL TOTAL-->
				<div id="panel-total">
					<input class="ainput"type="hidden" name="_token" value="{{csrf_token()}}" id="tokenn">
					<button id="actualizar" class="btn boton-add">Actualizar <span class="glyphicon glyphicon-refresh"></span> </button>
					<div class="group">
						<span class="span-detalle">Productos</span> 
						<span id="product-cont" class="span-valor">{{count($lineas)}}<span/>
					</div>
					
					<div class="group">
						<span class=" span-detalle">Subtotal</span>
						<span class="pago-sub span-valor">${{number_format($subtotal)}}</span>
					</div>
					<div class="group">
						<span class="span-detalle">Iva</span>
						<span class="span-valor iva">${{number_format($iva)}}</span>
					</div>
					<hr class="hr">
					<div class="group-total">
						<span class="span-detalle">Total</span>
						<span class="pago-total span-total">${{number_format($total)}} MXN.</span>
					</div>
					<a href="pedido" id="realizar-pedido" class="btn boton-add">Realizar pedido <span class="glyphicon glyphicon-send"></span> </a>
					
				</div>
			
		@endif	
		<a class ="btn btn-link btn-block" href="/catProductos">Ver mas productos</a>
	</div>
</section>
@stop