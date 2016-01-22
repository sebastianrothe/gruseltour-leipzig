'use strict';
(function (gruseltourApp) {
	gruseltourApp.produceDateHelper = function () {
		var DATE_FRIDAY = 5, DATE_SATURDAY = 6, DATE_SUNDAY = 0;
		return {
			isDisabled: function(date, disabledDates) {
				var germanDateString = gruseltourApp.util.toGermanDateString(date);
		    	return jQuery.inArray(germanDateString, disabledDates) !== -1;
			},

			// weekend includes friday
			isWeekend: function(date) { 
				var day = date.getDay();
				return day === DATE_FRIDAY || day === DATE_SATURDAY || day === DATE_SUNDAY;
			},

			// weekday excludes friday
			isNotWeekend: function(date) {
				return !this.isWeekend(date);
			}
		};
	};

	gruseltourApp.produceHTMLEntities = function () {
		var disabledText = 'Die Tour ist an diesem Tag schon ausgebucht.',
			disabledStyleClass = 'full',
			noRegularTourText = 'An diesem Tag findet keine reguläre Tour statt.',
			noRegularTourStyleClass = 'not-available';
		
		return {
			getDisabledObject: function () {
				return {
					title: disabledText,
					style: disabledStyleClass
				};
			},

			getNoRegularTourObject: function () {
				return {
					title: noRegularTourText,
					style: noRegularTourStyleClass
				};
			}
		};
	};

	gruseltourApp.produceDateChecker = function (dataProvider) {
		var disabledDates = dataProvider.getData(),
			dateHelper = gruseltourApp.produceDateHelper(),
			htmlEntities = gruseltourApp.produceHTMLEntities(),
			noRegularTour = htmlEntities.getNoRegularTourObject(),
			disabledTour = htmlEntities.getDisabledObject();

		return {
			isAvailable: function (date) {
				if (dateHelper.isNotWeekend(date)) {
			        return [false, noRegularTour.style, noRegularTour.title];
			    }

			    if (dateHelper.isDisabled(date, disabledDates)) {
			        return [false, disabledTour.style, disabledTour.title];
			    }

			    return [true];
			}
		};
	};
}(window.gruseltourApp = window.gruseltourApp || {}));