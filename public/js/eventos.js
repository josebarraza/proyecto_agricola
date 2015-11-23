var main = function(){
	$("#pais").on('change',function(){
		$("#ciudad").html('');
		$.get('/estados?id_pais='+$(this).val(),function(data){
			$("#estado").html('');
			$("#estado").append("<option value=''>Estado</option>");
			$.each(data, function(i,v){
				$("#estado").append("<option value="+v.id+">"+v.estado+"</option>");
			});
			if(data=='')
				$("#estado").html('');
		});
	});
	$("#estado").on('change',function(){
		$.get('/ciudades?id_estado='+$(this).val(),function(data){
			$("#ciudad").html('');
			$("#ciudad").append("<option value=''>Ciudad</option>");
			$.each(data, function(i,v){
				$("#ciudad").append("<option value="+v.id+">"+v.ciudad+"</option>");
			});
			if(data=='')
				$("#ciudad").html('');
		});
	});
	

	//OCULTAR BOTON RENTAR
	$(".btn-rentar").on('click',function(){
		//$(this).hide();
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


	//Carrusel
	sliderInit=1;
	sliderNext=2;
	$(document).ready(function(){
		$("#Slider>img#1").fadeIn("slow");
		startSlider();
	});

	function startSlider(){
		count= $("#Slider > img").size();
		loop=setInterval(function(){
			if(sliderNext > count){
				sliderNext=1;
				sliderInit=1;
			}
			$("#Slider > img").fadeOut("fast");
			$("#Slider > img#"+sliderNext).fadeIn("slow");
			sliderInit= sliderNext;
			sliderNext=sliderNext+1;
			},4000);
	}
}
$(document).ready(main);
