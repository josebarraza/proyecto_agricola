<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		body{
			width: 100%;
			font-family: 'verdana';
			margin: 0 auto;
		}
		span{
			display: inline-block;
			margin-bottom: 20px;
		}
		.especificacion{
			font-style: bold;
			font-size: 1.5em;
			color: steelblue;
			width:49%;
		}
		.dato{
			font-size: 1.2em;
			font-style: bold;
			color: darkred;
			width: 30%;
		}
		.grain{
			color: green;
			font-size: 2em;
			font-style: bold;
		}
		.Agro{
			color: darkred;
			font-size: 1.7em;
			font-style: bold;
		}
		p{
			
			margin-bottom: 10px;
		}

	</style>
</head>
<body>
	<p class="grain">Grain Agroindutrias</p> <br>
	<span class="especificacion">Nombre:</span>
	<span class="dato">{!!$bodega->nombre!!}</span>
	<br>
	<span class="especificacion">Medidas (Ancho,Largo,Alto):</span>
	<span class="dato">{!!$bodega->ancho!!}mts,{!!$bodega->largo!!}mts,{!!$bodega->alto!!}mts</span>
	<br>
	<span class="especificacion">Medidas de la entrada (ancho,alto):</span>
	<span class="dato">{!!$bodega->ancho_entrada!!}mts,{!!$bodega->alto_entrada!!}mts</span>
	<br>
	<span class="especificacion">Ubicación:</span>
	<span class="dato">{!!$bodega->ciudad->ciudad!!},{!!$bodega->ciudad->estado->estado!!},{!!$bodega->ciudad->estado->pais->pais!!}</span>
	<br>
	<span class="especificacion">Dirección (dirección,colonia):</span>
	<span class="dato">{!!$bodega->direccion!!},{!!$bodega->colonia!!}</span>
	<br>
	<span class="especificacion">Precio / mes:</span>
	<span class="dato">${!!number_format($bodega->precio)!!}.MXN</span>
	<br>
	<span class="especificacion">Modo de llegada:</span>
	<span class="dato">{!!$bodega->modoLlegada->modo!!}</span>
		<br>
	<span class="especificacion">Temperatura de ambiente:</span>
	<span class="dato">{!!$bodega->temperatura!!}°C</span>
		<br>
	<span class="especificacion">Humedad:</span>
	<span class="dato">{!!$bodega->humedad!!}%</span>
	<br>
	<span class="especificacion">Comentarios:</span>
	<span class="dato">{!!$bodega->comentarios!!}</span>
	<br>
	

</body>
</html>