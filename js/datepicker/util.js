// global namespace
window.gruseltourApp = window.gruseltourApp || {};

// First, checks if it isn't implemented yet.
if (!String.prototype.format) {
  String.prototype.format = function() {
    var args = arguments;
    return this.replace(/{(\d+)}/g, function(match, number) { 
      return typeof args[number] != 'undefined' ? args[number] : match;
    });
  };
}

// package namespace
window.gruseltourApp.Util = {
  padZero: function(n) {
    return n < 10 ? '0' + n : n;
  },

  toGermanDateString: function(date) {
    var day = window.gruseltourApp.Util.padZero(date.getDate());
    var month = window.gruseltourApp.Util.padZero(date.getMonth() + 1);
    var year = date.getFullYear();

    return "{0}.{1}.{2}".format(day, month, year);
  },

  parseGermanDate: function(dateString) {
    var createDate = function(parts) {
      var day = parts[2], month = parts[1] - 1, year = parts[0];
      return new Date(day, month, year);
    };
    return createDate(dateString.split('.'));
  },

  stringToGermanDateString: function(str) {
    var germanDate = window.gruseltourApp.Util.parseGermanDate(str);
    return window.gruseltourApp.Util.toGermanDateString(germanDate);
  },

  cleanDisabledDateString: function(dirtyString) {
  	return jQuery.trim(dirtyString).replace(/ /g,'').replace(/\r\n/g, '\n');
  },

  // clean, split and parseToGerman
  transformDateLinesToArray: function(lines) { 
    var getSplittedCleanedLines = function() {
      var getCleanedLines = function() {
        return window.gruseltourApp.Util.cleanDisabledDateString(lines);
      };
      return getCleanedLines().split("\n");
    };

    var stringToGermanDateString = window.gruseltourApp.Util.stringToGermanDateString;
    return jQuery.map(getSplittedCleanedLines(), stringToGermanDateString);
  }
};