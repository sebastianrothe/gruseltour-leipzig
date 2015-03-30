// First, checks if it isn't implemented yet.
if (!String.prototype.format) {
  String.prototype.format = function() {
    var args = arguments;
    return this.replace(/{(\d+)}/g, function(match, number) { 
      return typeof args[number] != 'undefined' ? args[number] : match;
    });
  };
}

function toGermanDateString(date) {
  return toGermanDateStringWithZeros(date);   
}

function toGermanDateStringOld(date) {
  return "{0}.{1}.{2}".format(date.getDate(), date.getMonth() + 1, date.getFullYear()); 
}

function toGermanDateStringWithZeros(date) {
  return "{0}.{1}.{2}".format(padZero(date.getDate()), padZero(date.getMonth() + 1), date.getFullYear());
}

function padZero(n) {
  return n < 10 ? '0' + n : n;
}

function parseGermanDate(dateString) {
  var parts = dateString.split('.');
  return new Date(parts[2], parts[1] - 1, parts[0]);
}

function toGermanStringWithZeros(str) {
	var date = parseGermanDate(str);
  return "{0}.{1}.{2}".format(padZero(date.getDate()), padZero(date.getMonth() + 1), date.getFullYear());   
}

function toGermanString(str) {
  var date = parseGermanDate(str);
  return "{0}.{1}.{2}".format(date.getDate(), date.getMonth() + 1, date.getFullYear());   
}

function cleanDisabledDateString(dirtyString) {
	return dirtyString.trim().replace(/ /g,'').replace(/\r\n/g, '\n');
}

function isDateDisabledOld(date, disabledDates) {
    return jQuery.inArray(toGermanDateStringOld(date), disabledDates) != -1;
}

function isDateDisabled(date, disabledDates) {
    return jQuery.inArray(toGermanDateString(date), disabledDates) != -1;
}