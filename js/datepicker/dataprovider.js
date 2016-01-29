'use strict';
(function (gruseltourApp) {
	gruseltourApp.produceDataProvider = function () {
		// we will store our days here
		var disabledTourDays;
		
		var load = (function () {
			/*
			jQuery.get('//gruseltour-leipzig.de/wordpress/wp-content/themes/gruseltour-leipzig/js/data.txt', function(data) { 
				disabledTourDays = transformDateLinesToArray(data); 
			});
			*/
			disabledTourDays = gruseltourApp.util.transformDateLinesToArray('19.2.2016');
		// run this immediately on parsing this object
		}()); 

		return {
			getData: function () {
				return disabledTourDays;
			}
		};
	};
}(window.gruseltourApp = window.gruseltourApp || {}));