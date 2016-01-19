(function(gruseltourApp) {
	gruseltourApp.dateHelper = function() {
		var DATE_FRIDAY = 5, DATE_SATURDAY = 6, DATE_SUNDAY = 0;
		return {
			isDisabled: function(date, disabledDates) {
				var germanDateString = gruseltourApp.Util.toGermanDateString(date);
		    	return jQuery.inArray(germanDateString, disabledDates) != -1;
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

	gruseltourApp.dateChecker = function(dataProvider) {
		var disabledText = "Die Tour ist an diesem Tag schon ausgebucht";
		var noRegularTourText = "An diesem Tag findet keine reguläre Tour statt";
		var disabledDates = dataProvider.getData();
		var dateHelper = gruseltourApp.dateHelper();
		
		return {
			isAvailable: function(date) {
				if (dateHelper.isNotWeekend(date)) {
			        return [false, "not-available", noRegularTourText];
			    }

			    if (dateHelper.isDisabled(date, disabledDates)) {
			        return [false, "not-available", disabledText];
			    }

			    return [true];
			}
		};
	};
}(window.gruseltourApp = window.gruseltourApp || {}));