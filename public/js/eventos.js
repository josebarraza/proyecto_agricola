var main = function(){

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


	

	//OCULTAR BOTON RENTAR
	$(".btn-rentar").on('click',function(){
		$(this).hide();
	});

	//FILES
	$("#btn-add-otra").on('click',function(){
		$('#div-files').append("<input type='file' name='foto[]' class='mt'>");
	});

	//EFECTO DE LAS IMAGENES (bodegas)
	$("#div-img-little").on('mouseenter','img',function(){
		var principal = $("#img-principal").attr('src');
		var img = $(this).attr('src');//imagen mouseenter
		$("#img-principal").attr('src',img);
		$(this).attr('src',principal);
	});

	//asociar fotos a bodegas
	$(".add-img-file").change(function (){
       var fileName = $(this).val();
       
       if(fileName=='')
       			$("#texto-file").html('Agrega una imagen');
       else
       	$("#texto-file").html('Imagen: '+fileName);
       
     });
}
$(document).ready(main);
