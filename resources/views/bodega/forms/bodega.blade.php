	<!-- Nombre -->
	    <div class="form-group">
	        {!! Form::label('lblname', 'Nombre de la bodega:') !!}
	        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
	    </div>
	    	<!--MEDIDAS-->
	    	<div class="form-inline">
	    		{!! Form::label('lblancho', 'Ancho:',['class' => 'mr']) !!}
	    		{!! Form::label('lbllargo', 'Largo:',['class' => 'mr']) !!}
	    		{!! Form::label('lblalto', 'Alto:',['class' => 'mr']) !!}
	    	</div>
		    <div class="form-inline">
		        {!! Form::number('ancho', null, ['class' => ' ala' ,'placeholder'=>'Metros','min'=>0,'step'=>'any']) !!}
		        {!! Form::number('largo', null, ['class' => ' ala' ,'placeholder'=>'Metros','min'=>0,'step'=>'any']) !!}
		        {!! Form::number('alto', null, ['class' => ' ala' ,'placeholder'=>'Metros','min'=>0,'step'=>'any']) !!}
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
	    
	    <!-- PRECIO -->
	    <div class="input-group">
  			{!! Form::label('lblPRECIO', 'Precio Mensual:') !!}
  			{!! Form::number('precio', null, ['class' => 'form-control','min'=>0,'step'=>'any']) !!}
		</div>
		<!-- COMENTARIOS -->
		<div class="form-group">
	        {!! Form::label('lblird', 'Comentarios:') !!}
	      	{!! Form::textarea('comentarios', null, ['class' => 'form-control','size'=>'30x2']) !!}
	    </div>
		
		<!-- FOTO -->
			{!! Form::label('lblfoto', 'Foto:') !!} 
			<div id="div-file">
				{!!Form::file('foto',['class'=>'add-img-file'])!!}
				<p  id="texto-file">Elige un archivo</p>
			</div>
		
