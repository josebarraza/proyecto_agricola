$(document).on('ready',function(){


var procesoVenta = function(){

	var token = $("#Token").val();

	//Obtener datos de dirección de entrega
	var nueva;
	var ciudad;
	var calle;
	var colonia;
	var cp;
	var direccion;
	//NUEVA DIRECCION
	if( $("#select-dir").val() == 0 ){
		 ciudad = $("#ciudad option:selected").val();
		 calle = $("#txtCalle").val();
		 colonia = $("#txtColonia").val();
		 cp= $("#txtCp").val();
		 nueva = true;
	}
	else if($("#select-dir").val() > 0 )
	{
		direccion = $("#select-dir").val();
		nueva = false;
	}

	//Obtener datos de tarjeta de pago
	var nomCard = $("#txtNomCard").val();
	var apCard = $("#txtApCard").val();
	var numCard = $("#txtNumCard").val();
	var fechaCard = $("#fechaCard").val();
	var anioCard = $("#anioCard").val();
	var codigoCard = $("#txtCodigoCard").val();


	$.ajax({
		url:'venta/new',
		dataType:'json',
		type:'POST',
		data:{
			"nuevaDireccion":nueva,
			"ciudad":ciudad,
			"calle":calle,
			"colonia":colonia,
			"cp":cp,
			"nomCard":nomCard,
			"apCard":apCard,
			"numCard":numCard,
			"fechaCard":fechaCard,
			"anioCard":anioCard,
			"codigoCard":codigoCard,
			"direccion":direccion
		},
		headers: {'X-CSRF-TOKEN':token},
		success:function(response){
			if(response.mensaje){
				
   				eliminarLineasCarrito();
   				alertify
 				 .alert("Tu compra se ah efectuado con éxito. <br> <a href='/misCompras'>Mis compras </a>");
   				$("#section-pedido").hide();
   				
  				
			}
		}
	});
	
}

var eliminarLineasCarrito = function(){
				$.ajax({
		  			url:'carritos/eliminarTodas',
		  			success:function(response){
		  				
		  			}
		  		});
}







$("#btn-pagar").on('click',procesoVenta);

});



