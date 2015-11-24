		<!-- Nombre -->
	    <div class="form-group">
	        {!! Form::label('lblname', 'Nombre del producto:') !!}
	        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
	    </div>
	    <!-- kilogramos por costal -->
	    <div class="form-group">
	        {!! Form::label('lblpat', 'Kilogramos por costal:') !!}
	        {!! Form::number('saco_kilos', null, ['class' => 'form-control']) !!}
	    </div>
	    <!-- precio -->
	    <div class="form-group">
	        {!! Form::label('lblmat', 'Precio por costal:') !!}
	        {!! Form::number('precio', null, ['class' => 'form-control']) !!}
	    </div>
	    <!-- FOTO -->
			{!! Form::label('lblfoto', 'Foto del producto:') !!} 
			<div id="div-file">
				{!!Form::file('foto',['class'=>'add-img-file'])!!}
				<p  id="texto-file">Elige un archivo</p>
			</div>
	   