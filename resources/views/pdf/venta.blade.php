<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Detalle de venta</title>
	<link rel="stylesheet" href="css/pdf.css">
	<style>
		.bg{
			background-color: red;
			width: 100px;
			height: 20px;
			color: white;
			text-align: center;
			vertical-align: center;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<img id="logo-pdf" src="img/landing/grain.png" alt="">
	<br>
	<p id='datos-grain'><strong>Grain Agroindustrias <br>
	RFC: GAG8310160000 <br>	
	Dirección: Av. Las Gaviotas #2200 Col. Las Aves <br>
	Tel: (667) 716 14 10 <br>
</strong></p>

	<p>
		La siguiente venta será entregada en el siguiente domicilio: <br>
		Ubicación: {{$venta->address->ciudad->ciudad}} {{$venta->address->ciudad->estado->estado}} {{$venta->address->ciudad->estado->pais->pais}} <br> 
		Domicilio: {{$venta->address->calle}} {{$venta->address->colonia}} {{$venta->address->cp}} <br>
	</p>
	<p><strong>Datos específicos de la venta</strong></p>
	<table class="table" >
		<tr>
			<th>Foto</th>
			<th>Descripción</th>
			<th>Precio</th>
			<th>Cantidad</th>
			<th>Subtotal</th>
		</tr>
		@foreach($venta->lineasDeVenta as $linea)
		<tr>
			<td><img src="img/{{$linea->producto->foto}}" alt=""></td>
			<td>{{$linea->producto->nombre}} - {{$linea->producto->saco_kilos}} kg/costal     </td>
			<td>{{number_format($linea->producto->precio)}}</td>
			<td>{{$linea->cantidad}}</td>
			<td>{{$linea->subTotal()}}</td>
		</tr>
		@endforeach
		<tr>
			<td colspan="5"> <strong> Total de la venta: {{number_format($venta->totalVenta()) }} </strong></td>
		</tr>
	</table>
	<br>
	<br>
	<p><strong>Fecha de la venta {{$venta->created_at}} </strong></p>
	<br>
	<br>
	<br>
	<img id="firma"src="img/landing/firma.jpg" alt="">
	<p id="web">www.agricolagrain.com</p>
</body>
</html>