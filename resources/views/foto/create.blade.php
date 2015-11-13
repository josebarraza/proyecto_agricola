@extends('plantillas.admin')
@section('content')
	<div id="form-fotos">
		{!!Form::open(['route'=>'foto.store','files'=>true])!!}
			<div class="form-group">
				{!!Form::label('lblbodega','Bodega:')!!}
				{!!Form::select('id_bodega',$bodegas,null,['class'=>'form-control'])!!}
			</div>
			{!! Form::label('lblfoto', 'Fotos:') !!} 
			<div id="div-files">
					{!!Form::file('foto[]',['class'=>'mt'])!!}
			</div>
			<a id="btn-add-otra" class="btn btn-primary mt">Agregar otra</a>
			{!! Form::submit("Guardar", ['class' => 'btn btn-success btn-block mt'])!!}
		{!!Form::close()!!}
	</div>
@stop()

