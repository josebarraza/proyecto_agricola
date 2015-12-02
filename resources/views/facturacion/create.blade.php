@extends('plantillas.main')
@section('content')
<section class="datos-facturacion">
		<div class="form-fact">
		<span class="letra-grande">Registro de datos de facturación</span>
			{!!Form::open(['route'=>'facturacion.store','method'=>'POST'])!!}
				@include('facturacion.forms.facturacion')
				{!! Form::submit("Guardar", ['class' => 'btn btn-info btn-block mt'])!!}
			{!!Form::close()!!}
		</div>
</section>
	
@stop