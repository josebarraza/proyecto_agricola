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
					alertify.success(
						"<label class='text text-success'>"+response.mensaje+"</label> <br>"+
						"<a href=/carrito> <label class='pointer text text-info'>  Ver carrito </label> </a>"
						);
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
					var cajas = $('#tabla-carrito').find('.span-subtotal');
					var sub = 0;	
					cajas.each(function(i){
						$(this).html(format(response[i],'$'));
						sub+=response[i];
					});

					var iva = sub*.16;
					var total = sub + iva;
					$(".pago-sub").html(format(sub,'$'));
					$(".iva").html(format(iva,'$'));
					$(".pago-total").html(format(total,'$'));
				}
			}
		});	
	}
	var eliminarLinea = function(){
		var idLinea = $(this).attr('id');
		
		if(idLinea!='eliminar-todas'){
			var token = $("#tokenX").val();
			$.ajax({
				url:'carrito/destroy',
				type:'DELETE',
				dataType:'json',
				data:{idLinea:idLinea},
				headers: {'X-CSRF-TOKEN':token},
				success:function(response){
					if(response){

							$('#product-cont').text ( parseInt($('#product-cont').text()-1));
							$('#contador').text ( parseInt($('#contador').text()-1));
						
							if( parseInt($('#product-cont').text())!=0){
								$("#tabla-carrito").html(response);
								actualizarTotal();
							}
							else{
								$('.panel-carrito').html('<h3>Por el momento no tienes productos en el carrito</h3> <br><h5><a href="/catProductos">ver productos</a></h5>');
							}
							
							
							 
						
						
					}
				}

			});
		}
		else
			eliminarTodas();
	}

	var eliminarTodas = function(){

		alertify.confirm("¿Estás seguro de eliminar toda tu compra?",
		  function(){

		  		$.ajax({
		  			url:'carritos/eliminarTodas',
		  			success:function(response){
		  				if(response){
			  				$('.panel-carrito').html('<h3>Por el momento no tienes productos en el carrito</h3> <br><h5><a href="/catProductos">ver productos</a></h5>');
			  				alertify.success('Tu compra ha sido eliminada');
			  				$('#contador').text ('0');
		  				}
		  			}
		  		});












		  
		  },
		  function(){
		    //alertify.error('Cancel');
		  });
	}
	var validarCaja = function(e){
		console.log(e.keyCode);
	
		if(  e.keyCode == 69 || e.keyCode == 187 || e.keyCode == 189 || e.keyCode == 190 ){
			//entrada invalida
			return false;
		}
	}

	var clickSiguientePagar = function(){
		$('.div-entrega').hide();
		$('.forma-pago').show('slow');
	}
		
	
	//Configurando escuchadores
	$("#div-add-carrito").on('click','button',agregarLineaAlCarrito);
	$("#actualizar").on('click',actualizarTotal);
	$("#tabla-carrito").on('click','button',eliminarLinea);
	$('#tabla-carrito').on('keydown','input',validarCaja);
	$('#siguiente-pagar').on('click',clickSiguientePagar);
	
	function format(n, currency) {
    return currency + " " + n.toFixed(2).replace(/./g, function(c, i, a) {
        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
    });
}
}

$(document).ready(main);