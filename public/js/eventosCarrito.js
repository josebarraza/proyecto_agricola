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
						"<label class='text text-success'>"+response.mensaje+"</label> <br>"+
						"<a href=/carrito> <label class='pointer text text-info'>  Ver carrito </label> </a>"
						).set('basic', false);
					if(response.grabo)
				    	$("#contador").text( parseInt($("#contador").text())+1);
				}	
			}
		});
	
	}
	var actualizarTotal = function(){
		var cajas = $("#tabla-carrito").find('.cantidad');
		var datos = new Array();
		var token = $("#tokenn").val();
			cajas.each(function(index){
				var linea = $(this).parent().next().next().find('button').attr('id');
				var cantidad = $(this).val();
				datos.push([linea,cantidad]);
			});
		$.ajax({
			url:'carrito/update',
			data:{datos:datos},
			headers: {'X-CSRF-TOKEN':token},
			type:'PUT',
			dataType:'json',
			success:function(response){
				if(response){
					var subtotal = $('#tabla-carrito').find('.span-subtotal');
					var total = 0;	
					subtotal.each(function(i){
						$(this).html(format(response[i],'$'));
						total+=response[i];
					});
					$(".pago-sub").html(format(total,'$'));
				}
			}
		});	
	}

	//Configurando escuchadores
	$("#div-add-carrito").on('click','button',agregarLineaAlCarrito);
	$("#actualizar").on('click',actualizarTotal);
	
	function format(n, currency) {
    return currency + " " + n.toFixed(2).replace(/./g, function(c, i, a) {
        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
    });
}
}

$(document).ready(main);