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
    return "{0}.{1}.{2}".format(date.getDate().toString(), (date.getMonth() + 1), date.getFullYear());   
}

function toGermanDateStringWithZeros(date) {
	function padZero(n) {return n < 10 ? '0' + n : n};
    return "{0}.{1}.{2}".format(padZero(date.getDate()), padZero(date.getMonth() + 1), date.getFullYear());   
}

function toGermanStringWithZeros(str) {
	function padZero(n) {return n < 10 ? '0' + n : n};
	var date = new Date(Date.parse(str));
    return "{0}.{1}.{2}".format(padZero(date.getDate()), padZero(date.getMonth() + 1), date.getFullYear());   
}

function cleanDisabledDateString(dirtyString) {
	return dirtyString.trim().replace(/ /g,'').replace(/\r\n/g, '\n');
}