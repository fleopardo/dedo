$(function(){

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
		var nacimientoDia = $("#dia-nacimientoDay");
		var nacimientoMes = $("#dia-nacimientoMonth");
		var nacimientoAno = $("#dia-nacimientoYear");
		var licencia = $('#TurnoLicencia');
		var licenciaDia = $('#dia-vencimientoDay');
		var licenciaMes = $('#dia-vencimientoMonth');
		var licenciaAnio = $('#dia-vencimientoYear');

		var email = $('#email');
		var email = $('#email');
		var email = $('#email');
		var email = $('#email');
		var email = $('#email');
		var telefono = $('#telefono');
		var message = $('#message');

		/*
		var nameIngresado = $('#name').val();
		var emailIngresado = $('#email').val();
		var telefonoIngresado = $('#telefono').val();
		var messageIngresado = $('#message').val();*/

		var error = false;
		var errorName = false;
		var errorEmail = false;
		var errorTelefono = false;
		var errorMessage = false;

		//valido nombre
		if(!(isNaN(name.val())) || name.val() == null || name.val().length == 0 || /^\s+$/.test(name.val()) || name.val() == name.attr("placeholder")) {
			error = true;
			errorName = true;
			name.addClass("error");
		}else{
			name.removeClass('error');
		}

		//valido email
		if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.val())) || email.val() == email.attr("placeholder")) {
			error = true;
			errorEmail = true;
			email.addClass("error");
		}else{
			email.removeClass('error');
		}

		if(telefono.val() == null || telefono.val() == 0 || telefono.val() == "" ){
			//puede estar vacio
			telefono.removeClass('error');
		}else{
			//Si tiene datos los valido
			if( isNaN(telefono.val()) || /^\s+$/.test(telefono.val())) {
				error = true;
				errorTelefono = true;
				telefono.addClass("error");
			}else{
				telefono.removeClass('error');
			}
		}

		//valido consulta
		if(message.val().length <= 10) {
			error = true;
			errorMessage = true;
			message.addClass("error");
		}else{
			message.removeClass('error');
		}


		//Si hubo errores
		if( error ){


		}else{

			$.ajax({
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
			});

		}

	});

});