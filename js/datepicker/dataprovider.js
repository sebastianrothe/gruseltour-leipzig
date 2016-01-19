(function(gruseltourApp) {
	gruseltourApp.dataProvider = function() {
		// we will store our days here
		var disabledTourDays;
		
		var load = function() {
			/*
			jQuery.get("//gruseltour-leipzig.de/wordpress/wp-content/themes/gruseltour-leipzig/js/data.txt", function(data) { 
				disabledTourDays = transformDateLinesToArray(data); 
			});
			*/
			disabledTourDays = gruseltourApp.Util.transformDateLinesToArray("19.1.2016");
		}(); // run this on loading this object

		return {
			getData: function() {
				return disabledTourDays;
			}
		};
	};
}(window.gruseltourApp = window.gruseltourApp || {}));