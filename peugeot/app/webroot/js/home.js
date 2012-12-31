/*
 * autors:
 * Santiago Leopardo @sleopardo
 * Fernando Leopardo @fer_leopardo
*/

// For use within normal web clients
var isiPad = navigator.userAgent.match(/iPad/i) != null;
var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};




/*if( isiPad || isMobile.any()){ } else{ $("body,html").css("overflow","hidden"); }*/

$("body,html").css("overflow","hidden");

/* Funcion para volver una pantalla atras.. */
;(function(){

	$(".volver:not('.a-home')").live("click",function(event){

			//Si no le agrego un margin extra, cuando voy al ancla #home se me tapa con el header..
			if( isiPad || isMobile.any()){

			}else{
				$(".home").addClass("margin-for-scrollto");
			}

			var that = $(this),
				anchor = that.attr("data-scroll:anchor") || null,
				speed = (isiPad || isMobile.any())? 0 : 1000;

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

	if( isiPad || isMobile.any()){
		$("body").addClass("mobile");
	}

	// Bindeo click a los 2 botones principales
	$(".home .link").bind("click",function(event){

		event.stopPropagation();
		event.preventDefault();

		//Almaceno la pagina que tengo que cargar
		var section = $(this).attr("href");

		//Almaceno el contenedor a donde lo tengo que cargar
		var container = "#" + $(this).attr("data-load");

		var speed = speed = (isiPad || isMobile.any())? 0 : 1000;
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
			$.scrollTo(container, {speed: speed, easing:'easeOutExpo'});

		});

	});

})();


function populateSelect(source, empty){
	var options = '';
	if (typeof(empty) != 'undefined'){
		options = '<option value="">' + empty + '</option>';
	}
	var c = 0;
    for (key in source) {
    	if (typeof(source[key]) == 'object'){
    		options += '<optgroup label="' + key + '">';
    		options += populateSelect(source[key]);
    		options += '</optgroup>';
    	} else {
    		options += '<option value="' + key + '">' + source[key]+ '</option>';
    	}
    	c++;
    }
    if (c == 0){
    	options = '<option value="">no disp.</option>';
    }
    return options
}