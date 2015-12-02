	<!--NOMBRE-->
	<div class="form-group">
	    {!! Form::label('lblname', 'Nombre del almacen:') !!}
	    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
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
	    
	<!-- DIRECCION -->
			<div class="form-inline">
		        {!! Form::label('lblird', 'Dirección:',['class' => 'mr']) !!}
		        {!! Form::label('lblcol', 'Colonia:',['class' => 'mr']) !!}
		        
		    </div>
	<!-- COLONIA -->
		    <div class="form-inline">
		        {!! Form::text('direccion', null, ['class' => 'form-control','placeholder'=>'Calle y numero ']) !!}
		        {!! Form::text('colonia', null, ['class' => 'form-control']) !!}
		    </div>
		<br>
	
	<!--CAPACIDAD-->
	<div class="form-inline">
		{!! Form::label('lblcapacidad', 'Capacidad: (Costales)',['class' => 'mr']) !!}
	</div>
	<div class="form-inline">
	    {!! Form::number('capacidad', null, ['class' => 'ala' ,'placeholder'=>'Costales','min'=>0,'step'=>'any']) !!}
	</div>


	