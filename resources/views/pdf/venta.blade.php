<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Detalle de venta</title>
	<link rel="stylesheet" href="css/pdf.css">
</head>
<body>
	<img id="logo-pdf" src="img/landing/grain.png" alt="">
	<br>
	<p id='datos-grain'><strong>Grain Agroindustrias <br>
	RFC: GAG8310160000 <br>	
	Dirección Av. Las Gaviotas #2200 Col. Las Aves <br>
	Tel. (667) 716 14 10 <br>
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
			<th>Descripcion</th>
			<th>Precio</th>
			<th>Cantidad</th>
			<th>Subtotal</th>
		</tr>
		@foreach($venta->lineasDeVenta as $linea)
		<tr>
			<td><img src="img/{{$linea->producto->foto}}" alt=""></td>
			<td>{{$linea->producto->descripcion}}</td>
			<td>{{$linea->producto->precio}}</td>
			<td>{{$linea->cantidad}}</td>
			<td>{{$linea->subTotal()}}</td>
		</tr>
		<tr>
			<td colspan="5">Total de la venta: {{$venta->totalVenta()}}</td>
		</tr>
		@endforeach
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