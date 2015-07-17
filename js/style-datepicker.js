(function(gruseltourApp) {
  gruseltourApp.init = function() {
    /* das 2. Div mit Eingabefeld finden */
	var $datumseingabe = jQuery('div#contact-form-18 div input.text').filter(':first');

	/* Aktiviere den Datepicker */
    $datumseingabe.datepicker({
    	// minDate: heute
		minDate: 0,
		// prüfe, ob eine Tour noch möglich ist
		beforeShowDay: isAvailableTourDate
	});

	/* Das Eingabefeld ist nur noch read-only */
	$datumseingabe.addClass('ui-datepicker-readonly');
	$datumseingabe.prop('readonly', true);
  };

  gruseltourApp.defaults = function() {
		jQuery.datepicker.regional['de'] = {
			closeText: 'Schließen',
			prevText: '&#x3C;Zurück',
			nextText: 'Vor&#x3E;',
			currentText: 'Heute',
			monthNames: ['Januar','Februar','März','April','Mai','Juni',
			'Juli','August','September','Oktober','November','Dezember'],
			monthNamesShort: ['Jan','Feb','Mär','Apr','Mai','Jun',
			'Jul','Aug','Sep','Okt','Nov','Dez'],
			dayNames: ['Sonntag','Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag'],
			dayNamesShort: ['So','Mo','Di','Mi','Do','Fr','Sa'],
			dayNamesMin: ['So','Mo','Di','Mi','Do','Fr','Sa'],
			weekHeader: 'KW',
			dateFormat: 'dd.mm.yy',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: '',
		    numberOfMonths: 3,
		    showWeek: true
		};
		jQuery.datepicker.setDefaults(jQuery.datepicker.regional["de"]);
	};
}(window.gruseltourApp = window.gruseltourApp || {}));

// Only include at end of main application...
jQuery(document).ready(function() {
	window.gruseltourApp.defaults();
	window.gruseltourApp.init();
});