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
	    <!-- mes -->
	    <div class="form-group">
	        {!! Form::label('lblmat', 'Més de vencimiento:') !!}
	        {!! Form::selectMonth('fecha', null, ['class' => 'form-control']) !!}
	    </div>
	    <!-- año -->
	    <div class="form-group">
	        {!! Form::label('lblmat', 'Año de vencimiento:') !!}
	        <select name="anio" class="form-control">
	        	@for ($i = date('Y'); $i <($i+15); $i++)
    				<option value="{{$i}}">{{$i}}</option>
				@endfor
	        </select>
	    </div>
	     <!-- codigo -->
	    <div class="form-group">
	        {!! Form::label('lblmat', 'Código de seguridad (3):') !!}
	        {!! Form::number('codigo', null, ['class' => 'form-control']) !!}
	    </div>
	   
	   


		