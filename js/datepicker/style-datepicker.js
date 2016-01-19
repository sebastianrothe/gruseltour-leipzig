(function(gruseltourApp) {
  gruseltourApp.init = function() {
  	var datepickerInjectionPoint = function() {
  		// get the 2nd inputfield with type text
  		return jQuery("#contact-form-18 input.text").eq(1);
  	}();

	if (datepickerInjectionPoint.length === 0) {
		console.log('Could not find injection point for the datepicker.');
		return;
	}

	var dataProvider = gruseltourApp.dataProvider();
	var dateChecker = gruseltourApp.dateChecker(dataProvider);

	var createDatepicker = function(element, dateChecker) {
		// inject the datepicker
	    element.datepicker({
	    	// minDate: today
			minDate: 0,
			// is this day already fully booked ?
			beforeShowDay: dateChecker.isAvailable
		});
	}(datepickerInjectionPoint, dateChecker);

	var augmentDatepicker = function(element) {
		// set datepicker input field to readonly
		var setReadonlyFlag = function(element) {
			element.addClass('readonly');
			element.prop('readonly', true);
		}(element);

		var renderFooter = function() {

		}();

	}(datepickerInjectionPoint);
  };
}(window.gruseltourApp = window.gruseltourApp || {})); // create global namespace and run it

// Only include at end of main application...
jQuery(document).ready(function() {
	window.gruseltourApp.init();
});