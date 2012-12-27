$(function(){

	$('select').selectmenu({
		transferClasses: true
	});


	//Bindeo submit form
	$("#form-ubicacion-step2").bind("submit",function(event){

		event.stopPropagation();
		event.preventDefault();

		var that = $(this);

		//Almaceno la pagina que tengo que cargar
		var section = that.attr("action");

		//Almaceno el contenedor a donde lo tengo que cargar
		var container = "#" + that.attr("data-load");

		//Prendo el div que contendra la seccion
		$(container).css("display","block");

		//Me guardo el Auto elegido
		var query = "?" + that.serialize();

		//Llamo al ajax y cargo la seccion adentro del $(container)
		$(container).load(section + query + " .section",function(response,status,xhr){

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
});