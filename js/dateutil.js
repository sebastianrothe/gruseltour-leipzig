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
  return "{0}.{1}.{2}".format(padZero(date.getDate()), padZero(date.getMonth() + 1), date.getFullYear());
}

function padZero(n) {
  return n < 10 ? '0' + n : n;
}

function parseGermanDate(dateString) {
  var parts = dateString.split('.');
  return new Date(parts[2], parts[1] - 1, parts[0]);
}

function stringToGermanDateString(str) {
  return toGermanDateString(parseGermanDate(str));  
}

function cleanDisabledDateString(dirtyString) {
	return jQuery.trim(dirtyString).replace(/ /g,'').replace(/\r\n/g, '\n');
}

function transformDateLinesToArray(lines) {
  // clean, split and parseToGerman
  return jQuery.map(cleanDisabledDateString(lines).split("\n"), stringToGermanDateString);
}