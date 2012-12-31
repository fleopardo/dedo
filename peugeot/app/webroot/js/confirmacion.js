$(function(){


	$('#dia-nacimientoDay').removeClass("middle").addClass("small");
	$('#dia-vencimientoDay').removeClass("middle").addClass("small");

	$('select').selectmenu({
		transferClasses: true
	});

	//Placeholder fallback
	$('input[placeholder]').placeholder();


	//Validacion del formulario
	$("#confirmacion form").on("submit",function(event){


		event.preventDefault();
		event.stopPropagation();

		$("#confirmacion form .rows").removeClass('error');

		var name = $('#TurnoNombre');
		var email = $('#TurnoEmail');
		var sexo = $("#TurnoSexo");
		var licencia = $('#TurnoLicencia');
		var provincia = $('#TurnoProvincia');
		var localidad = $('#TurnoLocalidad');
		var telefono = $('#TurnoTelefono');

		/*flags de errores*/
		var error = false;

		/*var errorName = false;
		var errorEmail = false;
		var errorSexo = false;
		var errorLicencia = false;
		var errorProvincia = false;
		var errorLocalidad = false;
		var errorTelefono = false;*/


		//valido nombre
		if(!(isNaN(name.val())) || name.val() == null || name.val().length == 0 || /^\s+$/.test(name.val()) || name.val() == name.attr("placeholder")) {
			error = true;
			//errorName = true;
			name.parents(".row").addClass("error");
		}else{
			name.parents(".row").removeClass('error');
		}


		//valido email
		if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.val())) || email.val() == email.attr("placeholder")) {
			error = true;
			//errorEmail = true;
			email.parents(".row").addClass("error");
		}else{
			email.parents(".row").removeClass('error');
		}


		//Valido SEXO
		if(sexo.find("option:selected").val() == "" ){
			error = true;
			sexo.siblings(".ui-selectmenu").addClass("error");
		}else{
			sexo.siblings(".ui-selectmenu").removeClass("error");
		}


		//Valido licencia
		if( licencia.val() == null || licencia.val() == 0 || licencia.val() == "" || isNaN(licencia.val()) || /^\s+$/.test(licencia.val())) {
			error = true;
			//errorLicencia = true;
			licencia.parents(".row").addClass("error");
		}else{
			licencia.parents(".row").removeClass('error');
		}


		//Valido provincia
		if(provincia.find("option:selected").val() == "" ){
			error = true;
			provincia.siblings(".ui-selectmenu").addClass("error");
		}else{
			provincia.siblings(".ui-selectmenu").removeClass("error");
		}


		//Valido localidad
		if(!(isNaN(localidad.val())) || localidad.val() == null || localidad.val().length == 0 || /^\s+$/.test(localidad.val()) || localidad.val() == localidad.attr("placeholder")) {
			error = true;
			//errorLocalidad = true;
			localidad.parents(".row").addClass("error");
		}else{
			localidad.parents(".row").removeClass('error');
		}


		//Valido telefono
		if( telefono.val() == null || telefono.val() == 0 || telefono.val() == "" || isNaN(telefono.val()) || /^\s+$/.test(telefono.val())) {
			error = true;
			//errorTelefono = true;
			telefono.parents(".row").addClass("error");
		}else{
			telefono.parents(".row").removeClass('error');
		}

		//Si hubo errores
		if( error ){


		}else{

			// mando el mail
			/*$.ajax({
				type: 'POST',
				data: 'name='+nameIngresado+'&email='+emailIngresado+'&Telefono='+telefonoIngresado+'&message='+messageIngresado,
				dataType: 'json',
				url: 'contacto.php',
				error: function (xhr, ajaxOptions, thrownError) {
					$('#form-response').text('Ocurrio un error, intente nuevamente!').removeClass('loading').addClass("error");
				},
				success: function(r) {

					if(r.status == 'ok') {
						$('#name, #email, #telefono, #message').val('');
						$('#form-response').text('Gracias por su consulta!').removeClass('loading').removeClass("error");
					}
				}
			});*/

			// Muestro pantalla de mensaje enviado
			$(".container.formulario-confirmacion").fadeOut();
			$(".confirmacion .background-leon").fadeIn();

			// Imprimo el nombre ingresado en la pantalla de mensaje enviado
			$("#nombreIngresado").html(name.val());
		}

	});


});