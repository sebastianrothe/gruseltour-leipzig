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
	yearSuffix: ''
};
jQuery.datepicker.setDefaults(jQuery.datepicker.regional["de"]);

function isDateDisabled(date, disabledDates) {
    return jQuery.inArray(toGermanDateString(date), disabledDates) != -1;
}

function isAvailableTourDate(date) {
    // TODO: only weekends
    if (isDateDisabled(date, disabledTourDays)) {
        return [false, "ui-datepicker-tour-full", disabledText];
    }
    return [true];
}

// TODO: outsource these dates
/* an diesen Tagen können keine Termine mehr angenommen werden */
var disabledTourDays = ["27.3.2015","28.3.2015","21.3.2015","10.4.2015","11.4.2015","12.4.2015","4.4.2015","5.4.2015","17.4.2015","25.4.2015","26.4.2015","29.5.2015","30.5.2015","31.5.2015","3.7.2015","4.7.2015","5.7.2015"];
var disabledText = "Die Tour ist an diesem Tag schon ausgebucht";