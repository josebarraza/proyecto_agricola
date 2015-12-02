<!-- Nombre -->
	    <div class="form-group">
	        {!! Form::label('lblname', 'Razon social:') !!}
	        {!! Form::text('razon_social', null, ['class' => 'form-control']) !!}
	    </div>
	    <div class="form-group">
	        {!! Form::label('lblname', 'RFC:') !!}
	        {!! Form::text('rfc', null, ['class' => 'form-control']) !!}
	    </div>
	    <div class="form-group">
	        {!! Form::label('lblname', 'e-mail:') !!}
	        {!! Form::text('email', null, ['class' => 'form-control']) !!}
	    </div>

<!-- UBICACION  -->
 <div class="form-group">
	    	<label for="">Ubicación:</label>
	    	<div class="form-inline">
		        <select name="pais" id="pais" class="form-control">
		        	<option value="">Pais</option>
		        	@foreach($paises as $pais)
						<option value="{{$pais->id}}">{{$pais->pais}}</option>
		        	@endforeach
		        </select>
	        <select name="estado" id="estado" class="form-control">
	        </select>
	        <select name="id_ciudad" id="ciudad" class="form-control">
	        </select>
	  
		</div>
</div>

<div class="form-group">
	        {!! Form::label('lblname', 'Calle y número:') !!}
	        {!! Form::text('calle', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	        {!! Form::label('lblname', 'Colonia:') !!}
	        {!! Form::text('colonia', null, ['class' => 'form-control']) !!}
</div>

