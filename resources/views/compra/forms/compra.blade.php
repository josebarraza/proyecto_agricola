	
	<div class="form-inline">
		<!--VENDEDOR-->
		{!! Form::label('lblproveedor', 'Nombre del vendedor:') !!}
	    {!! Form::text('proveedor', null, ['class' => 'form-control']) !!}

		<!--FECHA COSECHA-->
	    {!! Form::label('lblfechacosecha', 'Fecha de cosecha:',['class'=>'ml']) !!}
	    {!! Form::date('fechacosecha', \Carbon\Carbon::now(), ['class' => 'small']) !!}
	</div>
	<br>
	<div class="form-inline">
	    {!! Form::label('lblproducto', 'Nombre del Producto:') !!}
	    <select name="producto" id="producto" class="form-control">
		    <option value="">Producto</option>
		       	@foreach($productos as $producto)
				<option value="{{$producto->id}}">{{$producto->nombre}}</option>
		       	@endforeach
		</select>
	</div>
	<br>
	<!-- ORIGEN  -->
	<div class="form-group">
	   	<div class="form-inline">
	   	<label >Lugar de origen:</label>
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
	<div class="form-inline">
	  	<label >Almacen destino:</label>
		        <select name="almacen" id="almacen" class="form-control">
		        	@foreach($almacenes as $almacen)
						<option value="{{$almacen->id}}">{{$almacen->nombre}}</option>
		        	@endforeach
		        </select>
		{!! Form::label('lblcantidad', 'Cantidad: (Costales)',['class'=>'ml']) !!}
	    {!! Form::number('cantidad', null, ['class' => 'small' ,'placeholder'=>'','min'=>1,'step'=>'any']) !!}
		</div>
	<br>	
	<!--COSTO-->
	{!! Form::label('lblcosto', 'Costo de Producción(pesos): $',['class' => '']) !!}
	{!! Form::number('costo', null, ['class' => 'small' ,'placeholder'=>'MN','min'=>1,'step'=>'any']) !!}
