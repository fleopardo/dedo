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
	

});