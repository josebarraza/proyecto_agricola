var main = function(){
	var sliderElement=1;
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
	$(".left").on("click",function(e){
		e.preventDefault();
		//moveSlider("left");
	});
	$(".right").on("click",function(e){
		e.preventDefault();
		//moveSlider("right");
	});
	function moveSlider(){
		var limit=$("#Slider").length;
		loop=setInterval(function(){
			if(sliderElement>=limit)
				sliderElement=1;
			$("#Slider > img").fadeOut("fast");
			$("#Slider > img#"+sliderElement).fadeIn("slow");
			sliderElement=sliderElement+1;
		},3500);
	}

	/*
	function moveSlider(direccion){
		
	
		loop=setInterval(function(){
			sliderElement=(direccion=="left") ? sliderElement-1 : sliderElement+1;
			sliderElement=(sliderElement >= limit) ? 0 : sliderElement;
			sliderElement=(sliderElement < 0) ? sliderElement-1: sliderElement;
	
			$("#Slider > img").fadeOut("fast");
			$("#Slider > img#"+sliderElement).fadeIn("slow");
			},3500);
	}
/*
	sliderIni=1;
=======


	//Carrusel
	sliderInit=1;
>>>>>>> e7f121c587915b129da361d3765c87a45398b57c
	sliderNext=2;
	$("#Slider>img#1").fadeIn("slow", function(){
		startSlider();
	});

	function startSlider(){
		count= $("#Slider > img").size();
		loop=setInterval(function(){
			if(sliderNext > count){
				sliderNext=1;
				sliderIni=1;
			}
			$("#Slider > img").fadeOut("fast");
			$("#Slider > img#"+sliderNext).fadeIn("slow");
			sliderIni= sliderNext;
			sliderNext=sliderNext+1;
			},3500);
	
function showSlide(Id){
	stopLoop();
	if(Id>count)
		Id=1;
	else if(Id<1){
		id=count;
	}
	$("#Slider > img").fadeOut("fast");
	$("#Slider > img#"+sliderNext).fadeIn("slow");

	sliderIni= Id;
	sliderNext=Id+1;
	startSlider();
 }
}
function preview(){
 	newSlide=sliderIni-1;
 	showSlide(newSlide);
 }
function next(){
 	newSlide=sliderIni+1;
 	showSlide(newSlide);
 }
 function stopLoop(){
 	window.clearInterval(loop);
 }
 $("#Slider > img").hover(function(){
 	stopLoop(loop);
});*/
}
$(document).ready(main);
