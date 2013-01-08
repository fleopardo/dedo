$(function(){

	$('select').selectmenu({
		transferClasses: true
	});

	//Bindeo submit form
	$("#form-ubicacion-step2").bind("submit",function(event){

		event.stopPropagation();
		event.preventDefault();

		if( $("#TurnoMonth").val() == "" || $("#TurnoDia").val() == "" || $("#TurnoMonth").val() == "" || $("#TurnoTurnoId").val() == ""){

			$("#form-ubicacion-step2").append('<span class="mensaje-error">No se encuentran turnos disponibles.</span>');

		}else{

			$(".mensaje-error").remove();
			$("body").append("<div class='loading'></div>");

			var that = $(this);

			//Almaceno la pagina que tengo que cargar
			var section = that.attr("action");

			//Almaceno el contenedor a donde lo tengo que cargar
			var container = "#" + that.attr("data-load");

			//Prendo el div que contendra la seccion
			$(container).css("display","block");

			//Me guardo el Auto elegido
			var query = "?" + that.serialize();

			var speed = speed = (isiPad)? 0 : 1000;

			//Llamo al ajax y cargo la seccion adentro del $(container)
			$(container).load(section + query + " .section",function(response,status,xhr){

				$(".loading").remove();

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

		}

	});

	// Inicializacion Google Maps

	var latitudInicial = $('select#lugar-test-ubicacion').find('option:selected').attr('data-lat');
	var longitudInicial = $('select#lugar-test-ubicacion').find('option:selected').attr('data-long');

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

	$('select#lugar-test-ubicacion').find("option").each(function(){

	var latitud = $(this).attr('data-lat');
	var longitud = $(this).attr('data-long');
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(latitud, longitud),
        map: map
     });

     markers.push(marker);

	})


	//moviendo el mapa..

	$('select#lugar-test-ubicacion').bind('change',function(){
		//infowindow.close();
		center = new google.maps.LatLng($(this).find('option:selected').attr('data-lat'),$(this).find('option:selected').attr('data-long'));
		//console.log($(this).find('option:selected').attr('data-long'));

		map.setCenter(center);
	});

	$('select.lugar').change( function (e){
		e.stopPropagation();
		e.preventDefault();

		$(".mensaje-error").remove();

		$.get(Croogo.basePath + Croogo.params.plugin + '/' + Croogo.params.controller + '/getConcesionaria.json',{'modelo' : '', 'concesionaria' : $(this).val() }, function(data){
			if (data.success){
				$("select.mes").html(populateSelect(data.months));
	            $("select.dia").html(populateSelect(data.dias));
	            $("select.hora").html(populateSelect(data.turnos));
			} else {
				$("select.mes").html('<options value="">No disp.</options>');
				$("select.dia").html('<options value="">No disp.</options>');
				$("select.hora").html('<options value="">No disp.</options>');
			}
			$("select.dia, select.hora, select.mes").selectmenu("destroy").selectmenu({ transferClasses: true });
		});
	});
	$('select.mes').change( function (e){
		e.stopPropagation();
		e.preventDefault();
		$.get(Croogo.basePath + Croogo.params.plugin + '/' + Croogo.params.controller + '/getDays.json',{ 'mes' : $(this).val(), 'modelo' : '', 'concesionaria' : $('#lugar-test-ubicacion').val() }, function(data){
			if (data.success){
	            $("select.dia").html(populateSelect(data.dias));
	            $("select.hora").html(populateSelect(data.turnos));
			} else {
				$("select.dia").html('<options value="">No disp.</options>');
				$("select.hora").html('<options value="">No disp.</options>');
			}
			$("select.dia, select.hora").selectmenu("destroy").selectmenu({ transferClasses: true });
		});
	});

	$('select.dia').change( function (e){
		e.stopPropagation();
		e.preventDefault();
		$.get(Croogo.basePath + Croogo.params.plugin + '/' + Croogo.params.controller + '/getTurnos.json',{'mes' : $('#TurnoMonth').val(), 'dia' : $(this).val(), 'modelo' : '', 'concesionaria' : $('#lugar-test-ubicacion').val() }, function(data){
			if (data.success){
	            $("select.hora").html(populateSelect(data.turnos));
			} else {
				$("select.hora").html('<options value="">No disp.</options>');
			}
			$("select.hora").selectmenu("destroy").selectmenu({ transferClasses: true });
		});
	});

});