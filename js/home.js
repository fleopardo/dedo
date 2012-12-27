/*
 * autors:
 * Santiago Leopardo @sleopardo
 * Fernando Leopardo @fer_leopardo
*/


/* Funcion para volver una pantalla atras.. */
;(function(){

	$(".volver").live("click",function(event){

			//Si no le agrego un margin extra, cuando voy al ancla #home se me tapa con el header..
			$(".home").addClass("margin-for-scrollto");


			var that = $(this),
				anchor = that.attr("data-scroll:anchor") || null,
				speed = 1000;

			if( anchor !== null ){

				event.preventDefault();

				$.scrollTo.window().queue([]).stop();

				$.scrollTo(anchor,{
					speed: speed,
					easing:'easeOutExpo',
					onAfter:function(){
						that.parents(".section").parent().css("display","none");
						that.parents(".section").remove();

					}
				});

			}

		});

})();



;(function(){

	// Bindeo click a los 2 botones principales
	$(".home .link").bind("click",function(event){

		event.stopPropagation();
		event.preventDefault();

		//Almaceno la pagina que tengo que cargar
		var section = $(this).attr("href");

		//Almaceno el contenedor a donde lo tengo que cargar
		var container = "#" + $(this).attr("data-load");

		//Prendo el div que contendra la seccion
		$(container).css("display","block");

		//Llamo al ajax y cargo la seccion adentro del $(container)
		$(container).load(section + " .section", function(response,status,xhr){

			//Filtro los scripts con class "script" y los appendeo al $(container) para que se ejecuten
			var reponse = $(xhr.responseText);
       		var reponseScript = reponse.filter(".script");
       		$.each(reponseScript, function(idx, val){
       			$.getScript($(val).attr("src"));
       		});

       		//Muevo la pantalla hasta la seccion cargada
			$.scrollTo.window().queue([]).stop();
			$.scrollTo(container, {speed: 1000, easing:'easeOutExpo'});

		});

	});

})();


