		<!-- Nombre -->
	    <div class="form-group">
	        {!! Form::label('lblname', 'Nombre:') !!}
	        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
	    </div>
	    <!-- apellido paterno -->
	    <div class="form-group">
	        {!! Form::label('lblpat', 'Apellido Paterno:') !!}
	        {!! Form::text('apellido_pat', null, ['class' => 'form-control']) !!}
	    </div>
	    <!-- apellido materno -->
	    <div class="form-group">
	        {!! Form::label('lblmat', 'Apellido Materno:') !!}
	        {!! Form::text('apellido_mat', null, ['class' => 'form-control']) !!}
	    </div>
	    <!-- email -->
	    <div class="form-group">
	        {!! Form::label('lblmat', 'Email:') !!}
	        {!! Form::text('email', null, ['class' => 'form-control','placeholder'=>'ejemplo@gmail.com']) !!}
	    </div>
	    <!-- password -->
	    <div class="form-group">
	        {!! Form::label('lblmat', 'Password:') !!}
	        {!! Form::password('password',  ['class' => 'form-control']) !!}
	    </div>
	    