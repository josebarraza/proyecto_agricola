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
		$("#form-pedido").hide();
		$(".forma-pago").show('slow');
		$('.calle-e').text( $('#txtCalle').val() );
		$('.colonia-e').text( $("#txtColonia").val() );
		$('.ubicacion-e').text( $("#ciudad option:selected").text()+", "+$("#estado option:selected").text()+", "+$("#pais option:selected").text() );
		$('.cp-e').text( $("#txtCp").val() );
		$(".detalle-direccion").show();

		//traer tarjeta
		$.ajax({
			url:'traer-tarjeta',
			success:function(response){
				if(response){
					
					$("#txtNomCard").val(response.card.nombre);
					$("#txtApCard").val(response.card.apellido);
					$("#txtCodigoCard").val(response.card.codigo);
					$("#txtNumCard").val(response.card.numero);
					
					$("#fechaCard").val(response.card.fecha);
					$("#anioCard").val(response.card.anio);
				}
			}
		});

	}
	var editarDireccion = function(){
		$('.forma-pago').hide();
		$('#form-pedido').show('slow');
		$(".detalle-direccion").hide();
	}

	var cambioDireccion = function(){
		var id = $(this).val();
		var token = $("#tokenX").val();
		if(id>0){
			$.ajax({
				url:'traer-direccion',
				type:'GET',
				dataType:'json',
				data:{address_id:id},
				headers: {'X-CSRF-TOKEN':token},
				success:function(response){
					if(response){
						$("#txtCalle").val(response.direccion.calle);
						$("#txtColonia").val(response.direccion.colonia);
						$("#txtCp").val(response.direccion.cp);
						$("#pais").val(response.pais);
						$("#estado").val(response.estado);
						cambioPais(response.pais);
						
						cambioEstado(response.estado);
						$("#tabla-direccion").show();
					}
				}
			});
		}
		else if(id==0){
			$("#txtCalle").val('');
			$("#txtColonia").val('');
			$("#txtCp").val('');
			$("#pais").val(null);
			$("#estado").html('');
			$("#ciudad").html('');
			$("#tabla-direccion").show();
		}
	}
		
	
	//Configurando escuchadores
	$("#div-add-carrito").on('click','button',agregarLineaAlCarrito);
	$("#actualizar").on('click',actualizarTotal);
	$("#tabla-carrito").on('click','button',eliminarLinea);
	$('#tabla-carrito').on('keydown','input',validarCaja);
	$('#siguiente-pagar').on('click',clickSiguientePagar);
	$(".editar-direccion").on('click',editarDireccion);
	$("#select-dir").on('change',cambioDireccion);
	
	function format(n, currency) {
    return currency + " " + n.toFixed(2).replace(/./g, function(c, i, a) {
        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
    });
}

$("#pais").on('change',function(){
		cambioPais( $(this).val() );
	});
	var cambioPais = function(id){
		$.get('/estados?id_pais='+id,function(data){
			$("#estado").html('');
			$("#estado").append("<option value=''>Estado</option>");
			$.each(data, function(i,v){
				$("#estado").append("<option value="+v.id+">"+v.estado+"</option>");
			});
			if(data=='')
				$("#estado").html('');
		});
	}
$("#estado").on('change',function(){
		cambioEstado( $(this).val());

		
	});
	var cambioEstado = function(id){
		$.get('/ciudades?id_estado='+id,function(data){
			$("#ciudad").html('');
			$("#ciudad").append("<option value=''>Ciudad</option>");
			$.each(data, function(i,v){
				$("#ciudad").append("<option value="+v.id+">"+v.ciudad+"</option>");
			});
			if(data=='')
				$("#ciudad").html('');
		});
	}	
}

$(document).ready(main);