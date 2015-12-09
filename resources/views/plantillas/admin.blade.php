<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Grain - Admin</title>
	{!! Html::style('assets/css/bootstrap.css') !!}
	{!!Html::style('css/metisMenu.min.css')!!}
    {!!Html::style('css/sb-admin-2.css')!!}
    {!! Html::style('css/estilos.css') !!}
    {!! Html::style('assets/alert/css/alertify.css')!!}
    {!! Html::style('assets/alert/css/themes/default.min.css')!!}
    {!! Html::style('assets/alert/css/themes/semantic.min.css')!!}
</head>
<body>
  <div id="wrapper">  
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
     <div class="navbar-header">
        <a class="navbar-brand " href="/admin">Grain Admin</a>
    </div>

    <!--Logout-->
    <ul class="nav navbar-top-links navbar-right">
       <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
           {!!Auth::user()->nombre!!} {!!Auth::user()->apellido_pat!!} {!!Auth::user()->apellido_mat!!} <span class="glyphicon glyphicon-menu-down"></span>	
       </a>
       <ul class="dropdown-menu dropdown-user">

        <li><a href="/logout">Cerrar sesión</a>
        </li>
    </ul>
</li>
</ul>

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            @if(Auth::user()->tipo == 2)
            <li>
                <a href="#">Usuario <span class="glyphicon glyphicon-menu-left fr"></span> </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{!!URL::to('/user/create')!!}">Agregar</a>
                    </li>
                    <li>
                        <a href="{!!URL::to('/user')!!}">Lista de usuarios</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="#">Producto <span class="glyphicon glyphicon-menu-left fr"></span> </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{!!URL::to('/product/create')!!}">Agregar</a>
                        
                    </li>
                    <li>
                        <a href="{!!URL::to('/product')!!}">Lista de productos</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#">Bodega<span class="glyphicon glyphicon-menu-left fr"></span></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{!!URL::to('/bodega/create')!!}"> Agregar</a>
                    </li>
                    <li>
                        <a href="{!!URL::to('/bodega')!!}">Lista de bodegas</a>
                    </li>
                    <li>
                        <a href="{!!URL::to('/foto/create')!!}">Agregar fotos</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/rentas">Rentas</a>
            </li>
            <li>
                <a href="/mensajes">Mensajes 
                </a>

            </li>
            <li>
                <a href="#">Ordenes de Compra<span class="glyphicon glyphicon-menu-left fr"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{!!URL::to('/compras/create')!!}">Nueva registro de compra</a>
                    </li>
                    <li>
                        <a href="{!!URL::to('/compras')!!}">Gestión de Compras</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Producción<span class="glyphicon glyphicon-menu-left fr"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{!!URL::to('/produccion/create')!!}">Nuevo registro de producción</a>
                    </li>
                    <li>
                        <a href="{!!URL::to('/produccion')!!}">Gestión de Producción</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Almacenes<span class="glyphicon glyphicon-menu-left fr"></span></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{!!URL::to('/almacen/create')!!}">Nuevo Almacén</a>
                    </li>
                    <li>
                        <a href="{!!URL::to('/almacen')!!}">Gestión de Almacenes</a>
                    </li>
                </ul>
            </li>

            @elseif(Auth::user()->tipo == 2 || Auth::user()->tipo == 3)
            <li>
                <a href="{!!URL::to('/pedimentosAprobado')!!}">Pedimentos Aprobados <span class="glyphicon glyphicon-ok-sign"></span> </a>
            </li>                   
            <li>
                <a class="" href="{!!URL::to('/pedimentos')!!}">Pedimentos pendientes <span class="glyphicon glyphicon-exclamation-sign"></span> </a>
            </li> 
            @endif    
        </ul>

    </div>
</div>

</nav>	

<div id="page-wrapper">
    @yield('content')
</div>

</div>




{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/bootstrap.min.js')!!}
{!!Html::script('js/metisMenu.min.js')!!}
{!!Html::script('js/sb-admin-2.js')!!}
{!! Html::script('js/eventos.js') !!}
{!! Html::script('js/alertify.js') !!}
{!! Html::script('js/eventosPedimento.js') !!}

</body>
</html>