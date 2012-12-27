/*
 * autors:
 * Santiago Leopardo @sleopardo
 * Fernando Leopardo @fer_leopardo
*/

(function(){

	$(".home .link").bind("click",function(event){

		event.stopPropagation();
		event.preventDefault();

		var section = $(this).attr("href");

		var container = "#" + $(this).attr("data-load");
		$(container).css("display","block");

		$(container).load(section + " .section", function(){

			$.scrollTo.window().queue([]).stop();
			$.scrollTo(container, {speed: 1000, easing:'easeOutExpo'});

		});

	});

})();


