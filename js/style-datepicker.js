(function(gruseltourApp) {
  gruseltourApp.init = function() {
    /* das 2. Div mit Eingabefeld finden */
	var $datumseingabe = jQuery('div#contact-form-19 div input.text').filter(':first');

	/* Aktiviere den Datepicker */
    $datumseingabe.datepicker({
    	// minDate: heute
		minDate: 0,
		// prüfe, ob eine Tour noch möglich ist
		beforeShowDay: isAvailableTourDate
	});

	/* Das Eingabefeld ist nur noch read-only */
	$datumseingabe.addClass('readonly');
	$datumseingabe.prop('readonly', true);
  };

  gruseltourApp.defaults = function() {
		jQuery.datepicker.regional['es'] = {
			closeText: "Cerrar",
			prevText: "&#x3C;Ant",
			nextText: "Sig&#x3E;",
			currentText: "Hoy",
			monthNames: [ "enero","febrero","marzo","abril","mayo","junio",
			"julio","agosto","septiembre","octubre","noviembre","diciembre" ],
			monthNamesShort: [ "ene","feb","mar","abr","may","jun",
			"jul","ago","sep","oct","nov","dic" ],
			dayNames: [ "domingo","lunes","martes","miércoles","jueves","viernes","sábado" ],
			dayNamesShort: [ "dom","lun","mar","mié","jue","vie","sáb" ],
			dayNamesMin: [ "D","L","M","X","J","V","S" ],
			weekHeader: "Sm",
			dateFormat: "dd/mm/yy",
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: '',
		    numberOfMonths: 1,
		    showWeek: false
		};
		jQuery.datepicker.setDefaults(jQuery.datepicker.regional["es"]);
	};
}(window.gruseltourApp = window.gruseltourApp || {}));

// Only include at end of main application...
jQuery(document).ready(function() {
	window.gruseltourApp.defaults();
	window.gruseltourApp.init();
});