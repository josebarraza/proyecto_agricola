<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Renta exitosa</title>
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
	<p>El C. <strong>{{$datos['cliente']->nombre}} {{$datos['cliente']->apellido_pat}} {{$datos['cliente']->apellido_mat}}</strong>, quien funge como arrendatario se compromete a pagar la cantidad de $ {{$datos['bodega']->precio}}.00 MXN. mensuales mientras el arrendatario ocupe la bodega <strong>{{$datos['bodega']->nombre}}</strong> ubicada en {{$datos['bodega']->ciudad->ciudad}},{{$datos['bodega']->ciudad->estado->estado}},{{$datos['bodega']->ciudad->estado->pais->pais}} con domicilio en {{$datos['bodega']->direccion}} Col. {{$datos['bodega']->colonia}}.</p>
	<p>
		En caso de no cubrir la cantidad mencionada la empresa Grain Agroindustrias podría cancelar el servicio sin previo aviso.
	</p>
	<p><strong>Datos específicos de la bodega</strong></p>
	<table class="table" >
		<tr>
			<th>Foto</th>
			<th>Medidas (Ancho, Largo y Alto)</th>
			<th>Comentarios</th>
		</tr>
		<tr>
			<td><img src="img/{{$datos['bodega']->foto}}" alt=""></td>
			<td>{{$datos['bodega']->ancho}}mts - {{$datos['bodega']->largo}}mts - {{$datos['bodega']->alto}}mts</td>
			<td>{{$datos['bodega']->comentarios}}</td>
		</tr>
	</table>
	<br>
	<br>
	<p><strong>Fecha de la renta</strong></p>
	Fecha de Inicio: {{$datos['fecha']}} <br>
	Fecha de terminación: Indefinido.
	<br>
	<br>
	<br>
	<img id="firma"src="img/landing/firma.jpg" alt="">
	<p id="web">www.agricolagrain.com</p>

</body>
</html>