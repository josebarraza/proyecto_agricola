@extends('plantillas.admin')
@section('content')
	<h1 class="centrar-texto">Bienvenido al panel de administración</h1>
	<h3 class="centrar-texto mt">Tienes <a href="/mensajes">{{$mensajes}} mensajes</a>.</h3>
		
@stop()