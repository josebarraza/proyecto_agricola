$(document).on('ready',function(){


	var getPedimento = function(){
		var id = $(this).attr('id');
		$(this).next().show('slow');
		$(this).hide();
		//Obtener el string del servicio web
		$.ajax({
			url:'http://192.168.43.153:3001/api/pedimento',
			type:'GET',
			dataType:'json',
			success:function(response){
				if(response){
					$("#"+id).val(response.string);

				}
			}
		});
	}

	
	var actualizaPedimento = function(){
		//Actualizar la venta con ese string
		var id = $(this).attr('id');
		var pedimento = $("input#"+id).val();
		var token = $("#Token").val();
		$.ajax({
			url:'pedimentos/update',
			type:'PATCH',
			dataType:'json',
			headers: {'X-CSRF-TOKEN':token},
			data:{pedimento:pedimento,idVenta:id},
			success:function(response){
				if(response){
					$("#tabla-pedimentos").html(response);
					alertify.success('Pedimento asignado correctamente a la venta');
				}
			}
		});
	}



	$("#tabla-pedimentos").on('click','button',getPedimento);
	$("#tabla-pedimentos").on('click','a',actualizaPedimento);

});