@extends('plantillas.main')
@section('content')
	{!! Form::open(['route' => 'tarjeta.store','method'=>'POST']) !!}
		    	
				<!-- Nombre -->
		    <div class="form-group">
		        {!! Form::label('lblname', 'Nombre:') !!}
		        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
		    </div>
		    <!-- apellido  -->
		    <div class="form-group">
		        {!! Form::label('lblpat', 'Apellido:') !!}
		        {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
		    </div>
		    <!-- numero -->
		    <div class="form-group">
		        {!! Form::label('lblmat', 'Numero de tarjeta:') !!}
		        {!! Form::number('numero', null, ['class' => 'form-control']) !!}
		    </div>
		    <!-- fecha -->
		    <div class="form-group">
		        {!! Form::label('lblmat', 'Fecha de vencimiento:') !!}
		        {!!Form::selectMonth('month',['class'=>'form-control'])!!}
		    </div>
		    <!-- password -->
		    <div class="form-group">
		        {!! Form::label('lblmat', 'Año:') !!}
		        {!! Form::selectRange('anio', 1950,2015['class' => 'form-control']) !!}
		    </div>
		    <!-- código seguridad-->
		    <div class="form-group">
		        {!! Form::label('lblmat', 'Código de seguridad (3):') !!}
		        {!! Form::number('codigo', null, ['class' => 'form-control']) !!}
		    </div>


		        {!! Form::submit("Confirmar ", ['class' => 'btn btn-success btn-block '])!!}
	{!! Form::close() !!}

@stop