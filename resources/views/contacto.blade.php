@extends('plantillas.main')
@section('content')
	
	<section id="contact">
		@include('alertas.request')
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2 class="section-heading">Contacto</h2>
					<h3 class="section-subheading text-muted">Ponte en contacto con nosotros</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
				<div name="sentMessage" id="contactForm" novalidate>
					{!!Form::open(['route'=>'mensajes.store','method'=>'POST'])!!}
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<!-- NOMBRE -->
									<input name="nombre"type="text" class="form-control" placeholder="Tu nombre" id="name" required data-validation-required-message="Por favor escribe tu nombre">
									<p class="help-block text-danger"></p>
								</div>
								<div class="form-group">
									<!-- EMAIL -->
									<input type="email" name="correo"class="form-control" placeholder="Tu correo electrónico" id="email" required data-validation-required-message="Por favor, escribe tu correo electrónico.">
									<p class="help-block text-danger"></p>
								</div>
								<div class="form-group">
									<!-- CELULAR -->
									<input type="text" name="celular" class="form-control" placeholder="Tu número de télefono" id="phone" required data-validation-required-message="Por favor, escribe tu número de télefono.">
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<!-- MENSAJE -->
									<textarea name="mensaje" class="form-control" placeholder="Tu mensaje" id="message" required data-validation-required-message="Por favor, escribe un mensaje."></textarea>
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="col-lg-12 text-center">
								<div id="success"></div>

								{!!Form::submit('Enviar mensaje',['class'=>'btn btn-xl'])!!}
							</div>
							
						</div>
						{!!Form::close()!!}
					</div>
				</div>
			</div>
		</div>
	</section>
@stop