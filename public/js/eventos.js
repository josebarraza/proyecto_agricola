var main = function(){


	

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
