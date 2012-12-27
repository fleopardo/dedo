$(function(){

	$('select').selectmenu({
		transferClasses: true
	});

	// Inicializacion Google Maps

	var latitudInicial = $('select#lugar-test').find('option:selected').attr('data-lat');
	var longitudInicial = $('select#lugar-test').find('option:selected').attr('data-long');

	var options = {
        zoom: 15,
        center: new google.maps.LatLng(latitudInicial,longitudInicial),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
		mapTypeControl: false,
		navigationControl: false,
		streetViewControl: false
    };

    map = new google.maps.Map(document.getElementById('map'), options);



    //creando los markers

	var markers = [];

	$('select#lugar-test').find("option").each(function(){

	var latitud = $(this).attr('data-lat');
	var longitud = $(this).attr('data-long');
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(latitud, longitud),
        map: map
     });

     markers.push(marker);

	})


	//moviendo el mapa..

	$('select#lugar-test').bind('change',function(){
		//infowindow.close();
		center = new google.maps.LatLng($(this).find('option:selected').attr('data-lat'),$(this).find('option:selected').attr('data-long'));
		//console.log($(this).find('option:selected').attr('data-long'));

		map.setCenter(center);
	});



	// Bindeo click a los 2 botones principales
	$("#form-modelos-step3").bind("submit",function(event){

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