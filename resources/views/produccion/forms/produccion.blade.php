	<!--FECHA COSECHA-->
	<div class="form-group">
	    {!! Form::label('lblfechacosecha', 'Fecha de cosecha:') !!}
	    {!! Form::number('aniocosecha', null, ['class' => 'ala' ,'placeholder'='Año'>'','min'=>0,'step'=>'any']) !!}
	    {!! Form::number('mescosecha', null, ['class' => 'ala' ,'placeholder'=>'Mes','min'=>0,'step'=>'any']) !!}
	</div>

	<!--NOMBRE-->
	<div class="form-group">
	    {!! Form::label('lblproducto', 'Nombre del Producto:') !!}
	    <select name="producto" id="producto" class="form-control">
		    <option value="">Producto</option>
		       	@foreach($paises as $pais)
				<option value="{{$producto->id}}">{{$producto->nombre}}</option>
		       	@endforeach
		</select>
	</div>
	
	<!-- ORIGEN  -->
	    <div class="form-group">
	    	<label >Ubicación:</label>
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
	    
	<!--CANTIDAD-->
	<div class="form-inline">
		{!! Form::label('lblcantidad', 'Cantidad: (Costales)',['class' => 'mr']) !!}
	</div>
	<div class="form-inline">
	    {!! Form::number('cantidad', null, ['class' => 'ala' ,'placeholder'=>'Costales','min'=>0,'step'=>'any']) !!}
	</div>
	
	<!--COSTO UNITARIO-->
	<div class="form-inline">
		{!! Form::label('lblcosto', 'Costo unitario: (Costal)  $',['class' => 'mr']) !!}
	</div>
	<div class="form-inline">
	    {!! Form::number('costounitario', null, ['class' => 'ala' ,'placeholder'=>'PESOS','min'=>0,'step'=>'any']) !!}
	</div>
	
	