/* an diesen Tagen können keine Termine mehr angenommen werden */
//var disabledTourDays = ["18.4.2015","27.3.2015","28.3.2015","21.3.2015","10.4.2015","11.4.2015","12.4.2015","4.4.2015","5.4.2015","17.4.2015","25.4.2015","26.4.2015","29.5.2015","30.5.2015","31.5.2015"];
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