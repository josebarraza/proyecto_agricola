<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agricola - Grain</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Proyecto agricola">
	<meta name="author" content="Lupita,Ramón,Rigo">
	
	{!! Html::style('assets/css/bootstrap.css') !!}
	{!! Html::style('css/estilos.css') !!}
	{!! Html::style('css/agency.css')!!}
	{!! Html::style('assets/font-awesome/css/font-awesome.min.css')!!}
	{!! Html::style('assets/alert/css/alertify.css')!!}
	{!! Html::style('assets/alert/css/themes/default.min.css')!!}
	{!! Html::style('assets/alert/css/themes/semantic.min.css')!!}
	
</head>
<body id="page-top" class="index">
	<script>

	</script>
	<nav id="nav"class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header page-scroll">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a  href="/"><img id="logo" src="/img/landing/grain.png" alt=""></a>
				<ul class="nav navbar-nav navbar-right">
					<li class="hidden">
						<a href="/"></a>
					</li>
					<li>
						<a href="/" class="page-scroll">Inicio</a>
					</li>
					<li>
						<a href="/catProductos" class="page-scroll">Granos</a>
					</li>
					<li>
						<a href="/catBodegas">Bodegas</a>
					</li>
					<li>
						<a href="/about">Sobre nosotros</a>
					</li>
					<li>
						<a href="/contacto">Contacto</a>
					</li>
					@if(!Auth::check())
					<li>
						<a data-toggle="modal" href="#myModal">Login</a>
					</li>
					@else
					<li>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									{!!Auth::user()->nombre!!} {!!Auth::user()->apellido_pat!!} {!!Auth::user()->apellido_mat!!} <span class="glyphicon glyphicon-menu-down"></span>	
								</a>
								<ul id="ul-sesion" class="dropdown-menu dropdown-user">
									<li><a href="/misCompras">Mis Compras</a></li>
									<li><a href="/misBodegas">Mis Bodegas</a></li>
									<li><a data-toggle="modal"href="#modalEdit">Mi perfil</a></li>
									<li><a data-toggle="modal"href="#modalPago">Forma de pago</a></li>
									<li><a href="/facturacion">Datos de facturación</a></li>
									<li><a href="/logout">Cerrar sesión</a>
									</li>

								</ul>
							</li>
						</ul>
					</li>
					<li>
						<a href="/carrito">
							<div href="/carrito"class="icon  ">
								<span class="glyphicon glyphicon-shopping-cart"></span> 
								<span id="contador" class="badge">{{count(Auth::user()->carrito->lineasCarrito)}}</span>
						</div>
						</a>
						
					</li>
					@endif
				</ul>
				@include('alertas.exito')
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>

	<div >
		@yield('content')
	</div>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<span class="copyright">Copyright &copy; Agrícola Grain 2015</span>
				</div>
				<div class="col-md-4">
					<ul class="list-inline social-buttons">
						<li><a href="#"><i class="fa fa-twitter"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-facebook"></i></a>
						</li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a>
						</li>
					</ul>
				</div>
				<div class="col-md-4">
					<ul class="list-inline quicklinks">
						<li><a href="#">Politicas de privacidad</a>
						</li>
						<li><a href="#">Términos de uso</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>

	<!-- Modal -->
	<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<br>
				<div class="bs-example bs-example-tabs">
					<ul id="myTab" class="nav nav-tabs">
						<li class="active"><a href="#signin" data-toggle="tab">Entrar</a></li>
						<li class=""><a href="#signup" data-toggle="tab">Registro</a></li>
						<li class=""><a href="#why" data-toggle="tab">Why?</a></li>
					</ul>
				</div>
				<div class="modal-body">
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade in" id="why">
							<p>Necesitamos esta información para que tengas acceso al sitio y su contenido. Puedes estar seguro de que tu información no será vendida, cambiada o dada a terceros.</p>
							<p></p><br> Por favor contáctanos <a mailto:href="contacto@grain.com"></a>Contacto@grain.com</a> para cualquier duda.</p>
						</div>
						<div class="tab-pane fade active in" id="signin">

							{!!Form::open(['route'=>'Log.store','method'=>'POST','id'=>'login','class'=>'form-horizontal'])!!}
							<fieldset>
								<!-- Sign In Form -->
								<!-- Text input-->
								<div class="control-group">
									<label class="control-label" for="userid">Email:</label>
									<div class="controls">
										{!!Form::email('email',null,['class'=>'form-control'])!!}
									</div>
								</div>

								<!-- Password input-->
								<div class="control-group">
									<label class="control-label" for="passwordinput">Contraseña:</label>
									<div class="controls">
										{!!Form::password('password',['class'=>'form-control'])!!}
									</div>
								</div>

								<!-- Button -->
								<div class="control-group">
									<label class="control-label" for="signin"></label>
									<div class="controls">
										{!!Form::submit('Entrar',['class'=>'btn btn-success btn-block'])!!} 
									</div>
								</div>
							</fieldset>
							{!!Form::close()!!}
						</div>
						<div class="tab-pane fade" id="signup">
							{!! Form::open(['route' => 'user.store','method'=>'POST']) !!}
							@include("usuario.forms.user")
							{!! Form::submit("Registrarme", ['class' => 'btn btn-success btn-block '])!!}
							{!!Form::close()!!}
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<center>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</center>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal 2 (EDITAR DATOS USUARIO)-->
	<div class="modal fade bs-modal-sm" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<br>
				<div class="bs-example bs-example-tabs">
					<ul id="myTab" class="nav nav-tabs">
						<li class="active">
							<a href="#edit" data-toggle="tab">
							Editar</a>
						</li>
						
					</ul>
				</div>
				<div class="modal-body">
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane  fade active in" id="edit">
							@if(Auth::check())
							{!! Form::model(Auth::user(),['route' => ['user.update',Auth::user()->id],'method'=>'PUT']) !!}
							@include("usuario.forms.user")
							{!! Form::submit("Actualizar", ['class' => 'btn btn-success btn-block '])!!}
							{!!Form::close()!!}
							@endif


						</div>
					</div>
				</div>
				<div class="modal-footer">
					@include('alertas.request')
					<center>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</center>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal 3 (TARJETA DE PAGO)-->
	<div class="modal fade bs-modal-sm" id="modalPago" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<br>
				<div class="bs-example bs-example-tabs">
					<ul id="myTab" class="nav nav-tabs">
						<li class="active">
							<a href="#edit" data-toggle="tab">
							Tarjeta de Crédito / Débito</a>
						</li>
						
					</ul>
				</div>
				<div class="modal-body">
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane  fade active in" id="edit">
								
								@if(Auth::check() && Auth::user()->tarjeta)
									{!! Form::model(Auth::user()->tarjeta,['route' => ['card.update',Auth::user()->id],'method'=>'PUT']) !!}
										@include('tarjeta.create')
									{!! Form::submit("Actualizar forma de pago", ['class' => 'btn btn-success btn-block '])!!}	
									{!!Form::close()!!}

								@else
									{!! Form::open(['route' => 'card.store','method'=>'POST']) !!}
										@include('tarjeta.create')
									{!! Form::submit("Confirmar forma de pago", ['class' => 'btn btn-success btn-block '])!!}	
									{!!Form::close()!!}

								@endif
								


						</div>
					</div>
				</div>
				<div class="modal-footer">
					@include('alertas.request')
					<center>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</center>
				</div>
			</div>
		</div>
	</div>

	
	{!! Html::script('js/jquery.js') !!}
	{!! Html::script('js/alertify.js') !!}
	{!! Html::script('js/eventos.js') !!}
	{!! Html::script('js/eventosCarrito.js') !!}
	{!! Html::script('js/eventosVenta.js') !!}
	{!! Html::script('js/bootstrap.min.js')!!}
	{!! Html::script('js/classie.js')!!}
	{!! Html::script('js/jqBootstrapValidation.js')!!}
	{!! Html::script('js/agency.js') !!}
	{!! Html::script('js/jquery.slides.js')!!}
	<script>
	  $(function(){
      $(".slider").slidesjs({
      	  play: {
          active: true,
          auto: true,
          interval: 5000,
          swap: true
        }
      });
    });
	</script>
</body>
</html>