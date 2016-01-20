"use strict";
(function (gruseltourApp) {
	gruseltourApp.init = function () {
	  	var dataProvider = gruseltourApp.produceDataProvider(), 
	  		dateChecker = gruseltourApp.produceDateChecker(dataProvider);

	  	var datepickerInjectionPoint = (function () {
	  		// get the 2nd inputfield with type text
	  		return jQuery("#contact-form-18 input.text").eq(1);
	  	}());

		if (datepickerInjectionPoint.length === 0) {
			console.log('Could not find injection point for the datepicker.');
			return;
		}

		var createDatepicker = (function (element, dateChecker) {
			// inject the datepicker
		    element.datepicker({
		    	// minDate: today
				minDate: 0,
				// is this day already fully booked ?
				beforeShowDay: dateChecker.isAvailable
			});
		}(datepickerInjectionPoint, dateChecker));

		var augmentDatepicker = (function (element) {
			// set datepicker input field to readonly
			var setReadonlyFlag = (function (element) {
				element.addClass('readonly');
				element.prop('readonly', true);
			}(element));
		}(datepickerInjectionPoint));
	};

	// augment the jQuery Datepicker with a footer
	gruseltourApp.renderFooterOnDatepicker = function () {
		var htmlEntities = gruseltourApp.produceHTMLEntities();

		jQuery.extend(jQuery.datepicker, {
			_generateHTMLOriginal: jQuery.datepicker._generateHTML,

			generateFooter: function (legendOptions) {
				var TEXT_LAST_REFRESHED = "Zuletzt aktualisiert: Heute, um",
					TEXT_LAST_REFRESHED_TIME = gruseltourApp.util.toGermanTimeString(new Date());
					
				var html = "<div class='ui-datepicker-footer'>";
				html += "<hr class='clear' />";
				html += "<ul class='legend'>";

				jQuery.each(legendOptions, function (index, legend) {
					html += "<li><div class='{0}'>{1}</div></li>".format(legend.style, legend.title);
				});

				html += "</ul>";
				html += "<hr class='clear' />";
				html += "<div class='lastRefreshDate'>{0} {1}</div>".format(TEXT_LAST_REFRESHED, TEXT_LAST_REFRESHED_TIME);
				html += "</div>";
				return html;
			},

			_generateHTML: function (inst) {
				var legendOptions = [htmlEntities.getDisabledObject()];
				var newHTML = this.generateFooter(legendOptions);
	    		return this._generateHTMLOriginal(inst) + newHTML;
			}
		});
	};
}(window.gruseltourApp = window.gruseltourApp || {})); // create global namespace and run it

// Only include at end of main application...
jQuery(document).ready(function () {
	window.gruseltourApp.init();
	window.gruseltourApp.renderFooterOnDatepicker();
});