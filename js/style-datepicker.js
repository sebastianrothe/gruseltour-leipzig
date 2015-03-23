jQuery(document).ready(function() {
	/* Finde alle Divs nach dem ersten im Formular und filter nur nach dem 1. */
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
});