// an diesen Tagen können keine Termine mehr angenommen werden
var disabledTourDays;
jQuery.get("//gruseltour-leipzig.de/wordpress/wp-content/themes/gruseltour-leipzig/js/data.txt", function(data) { disabledTourDays = transformDateLinesToArray(data); 
});

var disabledText = "Die Tour ist an diesem Tag schon ausgebucht";

function isAvailableTourDate(date) {
    // TODO: only weekends
    if (isDateDisabled(date, disabledTourDays)) {
        return [false, "ui-datepicker-tour-full", disabledText];
    }
    return [true];
}

function isDateDisabled(date, disabledDates) {
    return jQuery.inArray(toGermanDateString(date), disabledDates) != -1;
}