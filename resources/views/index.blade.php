@extends('plantillas.main')
@section('content')
<header>
	<div class="container">
		<div class="slider" id="slide">
		@foreach($novedades as $slide)
			<a href={!!$slide->referencia!!}><img src="<?php echo asset('img/'.$slide->img); ?>" /></a>
		@endforeach
		</div>
	</div>
</header>
@stop