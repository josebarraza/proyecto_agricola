var main = function(){
	
	var agregarLineaAlCarrito = function(){
		var idProducto = $(this).attr('id');
		var token = $("#token").val();
			$.ajax({
			cache:false,
			url:'/carrito', 
			headers: {'X-CSRF-TOKEN':token},
			type: 'POST',
			dataType: 'json',
			data: {idProducto:idProducto},
			success:function(response){
				if(response != null){
					alertify.alert(
						"<label class='text text-success'>Producto añadido al carrito</label> <br>"+
						"<a href=/carrito> <label class='pointer text text-info'>  Ver carrito </label> </a>"
						).set('basic', false);
				    $("#contador").text( parseInt($("#contador").text())+1);
				}	
			}
		});
		
		
	}

	//Configurando escuchadores
	$("#div-add-carrito").on('click','button',agregarLineaAlCarrito);

	
	
}

$(document).ready(main);