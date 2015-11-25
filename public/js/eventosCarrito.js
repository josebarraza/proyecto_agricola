var main = function(){
	
	var agregarLineaAlCarrito = function(){
		var idProducto = $(this).attr('id');
		var ruta = 'http://localhost:8000/carrito';
		var token = $("#token").val();
		$.ajax({
			cache:false,
			url:ruta , 
			headers: {'X-CSRF-TOKEN':token},
			type: 'POST',
			dataType: 'json',
			data: idProducto,
			success:function(response){
				alert(response);
				alert('Agregado al carro');
			}
		});
	}

	//Configurando escuchadores
	$("#div-add-carrito").on('click','button',agregarLineaAlCarrito);
}

$(document).ready(main);