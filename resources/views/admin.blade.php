@extends('plantillas.admin')
@section('content')
	<style>
		#div-panel-admin{
			margin-top: 50px;
		}
		#div-panel-admin > p , #panel-exportacion > p{
			font-weight: bold;
			font-size: 1.7em;
			text-align: center;
			padding-top: 50px;
		}
		.caja-pedimentos{
			width: 20%;
			background-color: #f7f7f7	;
			display: inline-block;
			vertical-align: top;
			text-align: center;
			margin-left: 200px;
			margin-top: 100px;
			border: solid black 1px;
			padding: 20px 20px 20px 20px;
		border-radius: 5%;
		}
		.i-grande{
			font-size: 4em;
			color: #3b5998;
		}
		.p-leyenda{
			font-weight: bold;
		}

	</style>
	@if(Auth::user()->tipo == 2)
	<div id="div-panel-admin">
			<p class="welcome">Bienvenido al panel de administración.</p>
			<p>Cuentas con {{$mensajes}}  <a href="/mensajes">mensajes <span class="glyphicon glyphicon-envelope"></span> </a> </p>
			
	</div>	
	@elseif(Auth::user()->tipo == 3)
	<div id="panel-exportacion">
		<p>Bienvenido al panel de exportación</p>

         <a href="{!!URL::to('/pedimentosAprobado')!!}"> 
			<div class="caja-pedimentos">
				<span class="glyphicon glyphicon-ok-sign i-grande"></span>
				<p class="p-leyenda">PEDIMENTOS APROBADOS</p>
			</div>
		</a>  
		<a href="{!!URL::to('/pedimentos')!!}">
			<div class="caja-pedimentos">
				<span class="glyphicon glyphicon-exclamation-sign i-grande"></span>
				<p class="p-leyenda">PEDIMENTOS PENDIENTES</p>
			</div>
		</a>

	</div>
	@endif
@stop()