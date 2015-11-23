@extends('plantillas.main')
@section('content')
<section id="misBodegas">
	<div class="container">
			<div class="row">
				@if(count($rentas)==0)
					<p><h1>Oops.. no tienes bodegas rentadas</h1></p>
					<h2>Echa un vistazo a nuestras <a href="/catBodegas">Bodegas</a> disponibles</h2>
					
				@endif
				@foreach($rentas as $renta)
					<div class="col-sm-6 col-md-3">
					    <div class="thumbnail">
					      <img src="<?php echo asset('img/'.$renta->bodega->foto); ?>" style="height:200px" class="imgthumbs">
					      <div class="caption">
					        <h3>{{$renta->bodega->nombre}}</h3>
					        <p>
								Largo {{$renta->bodega->largo}}m, Ancho {{$renta->bodega->ancho}}m, Alto {{$renta->bodega->alto}}m 
								<br>
								Ubicación: {{$renta->bodega->ciudad['ciudad']}}, {{$renta->bodega->ciudad->estado['estado']}},
								{{$renta->bodega->ciudad->estado->pais['pais']}}

					        </p>
					        {!!link_to_route('catBodegas.edit',$titulo='Descargar PDF',$parameters=['bodega'=>$renta->bodega,'renta'=>$renta],$attributes = ['class'=>'btn btn-primary '])!!}
					      </div>
					    </div>
	  				</div>
				@endforeach
			</div>
			{!!$rentas -> render() !!}
	</div>

</section>
@stop