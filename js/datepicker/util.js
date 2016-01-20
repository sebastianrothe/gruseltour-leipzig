"use strict";
(function (gruseltourApp) {
  var augmentStringWithFormat = (function () {
    if (String.prototype.format) { // First, checks if it isn't implemented yet.
      return;
    }

    String.prototype.format = function () {
      var args = arguments;
      return this.replace(/{(\d+)}/g, function (match, number) { 
        return args[number] !== 'undefined' ? args[number] : match;
      });
    };
  }());

  // package namespace
  gruseltourApp.util = {
    padZero: function (n) {
      return n < 10 ? '0' + n : n;
    },

    toGermanDateString: function (date) {
      var day = gruseltourApp.util.padZero(date.getDate()),
          month = gruseltourApp.util.padZero(date.getMonth() + 1),
          year = date.getFullYear();
      return "{0}.{1}.{2}".format(day, month, year);
    },

    toGermanTimeString: function (date) {
      var hour = gruseltourApp.util.padZero(date.getHours()),
          minute = gruseltourApp.util.padZero(date.getMinutes());
      return "{0}:{1}".format(hour, minute);
    },

    parseGermanDate: function (dateString) {
      var createDate = function (parts) {
        var day = parts[2], 
            month = parts[1] - 1, 
            year = parts[0];
        return new Date(day, month, year);
      };
      return createDate(dateString.split('.'));
    },

    stringToGermanDateString: function (str) {
      var germanDate = gruseltourApp.util.parseGermanDate(str);
      return gruseltourApp.util.toGermanDateString(germanDate);
    },

    cleanDisabledDateString: function (dirtyString) {
      return jQuery.trim(dirtyString).replace(/ /g,'').replace(/\r\n/g, '\n');
    },

    // clean, split and parseToGerman
    transformDateLinesToArray: function (lines) { 
      var getSplittedCleanedLines = function () {
        var getCleanedLines = function () {
          return gruseltourApp.util.cleanDisabledDateString(lines);
        };
        return getCleanedLines().split("\n");
      };
      return jQuery.map(getSplittedCleanedLines(), gruseltourApp.util.stringToGermanDateString);
    }
  };
}(window.gruseltourApp = window.gruseltourApp || {})); // create global namespace and run it