// an diesen Tagen können keine Termine mehr angenommen werden
var disabledTourDays;
jQuery.get("//leipzigmisteriosa.de/wordpress/wp-content/themes/leipzigmisteriosa/js/data.txt", function(data) { disabledTourDays = transformDateLinesToArray(data); 
});

var disabledText = "El tour no está disponible en esta fecha.";

function isAvailableTourDate(date) {
    // TODO: only weekends
    if (isDateDisabled(date, disabledTourDays)) {
        return [false, "not-available", disabledText];
    }
    return [true];
}

function isDateDisabled(date, disabledDates) {
    return jQuery.inArray(toSpanishDateString(date), disabledDates) != -1;
}