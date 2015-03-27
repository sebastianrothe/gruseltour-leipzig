QUnit.test("testToGermanDateString", function(assert) {
	assert.equal(toGermanDateString(new Date(2014, 0, 1)), "01.01.2014");
});

QUnit.test("testToGermanDateStringWithZeros", function(assert) {
	assert.equal(toGermanDateStringWithZeros(new Date(2014, 0, 1)), "01.01.2014");
});

QUnit.test("testToGermanStringWithZeros", function(assert) {
	assert.equal(toGermanStringWithZeros("1.2.2014"), "01.02.2014");
	assert.equal(toGermanStringWithZeros("01.02.2014"), "01.02.2014");
});

QUnit.test("testToGermanStringArrayWithZeros", function(assert) {
	var fixedArray = ["1.2.2014", "11.12.2016"].map(toGermanStringWithZeros);
	assert.equal(fixedArray[0], "01.02.2014");
	assert.equal(fixedArray[1], "11.12.2016");
});

QUnit.test("testTrimDateLines", function(assert) {
	assert.equal("  1.1.2014\n   3.5.2015 \n 4.8.2015\n".trim(), "1.1.2014\n   3.5.2015 \n 4.8.2015");
	assert.equal("  1.1.2014\n   3.5.2015 \n 4.8.2015\n  ".trim(), "1.1.2014\n   3.5.2015 \n 4.8.2015");
	assert.equal("  1.1.2014\n   3.5.2015 \n 4.8.2015  \n  ".trim(), "1.1.2014\n   3.5.2015 \n 4.8.2015");
});

QUnit.test("testReplaceSpaces", function(assert) {
	assert.equal(" 1.1.2014\n   3.5.2015 \n 4.8.2015 \n  ".replace(/ /g,''), "1.1.2014\n3.5.2015\n4.8.2015\n");
});

QUnit.test("testReplaceLineBreaks", function(assert) {
	assert.equal("1.1.2014\n3.5.2015\n 4.8.2015\r\n".replace(/\r\n/g, '\n'), "1.1.2014\n3.5.2015\n 4.8.2015\n");
});

QUnit.test("testCleanDisabledDateLines", function(assert) {
	assert.equal(cleanDisabledDateString("  1.1.2014\n   3.5.2015 \n 4.8.2015 \n  "), "1.1.2014\n3.5.2015\n4.8.2015");
});

QUnit.test("testLinesToArrayDisabledDates", function(assert) {
	var input = "1.2.2014\n3.5.2015 \n 4.8.2015\r\n";
	var lines = cleanDisabledDateString(input).split("\n");
	var mappedLines = lines.map(toGermanStringWithZeros);
	assert.equal(mappedLines[0], "01.02.2014");
	assert.equal(mappedLines[1], "03.05.2015");
	assert.equal(mappedLines[2], "04.08.2015");
});

QUnit.test("testLoadFileFromServer", function(assert) {
	var done = assert.async();
	jQuery.get("//gruseltour-leipzig.de/wordpress/wp-content/themes/gruseltour-leipzig/test/data.txt", function(data) {
		assert.ok(data.toString().length > 0);
		assert.notEqual(data.toString().indexOf("1.2.2014"), -1);
		assert.notEqual(data.toString().indexOf("1.2.2014\r\n03.05.2015\r\n04.08.2015"), -1);
		done();
	});
});

QUnit.test("testReadAndClean", function(assert) {
	var done = assert.async();
	jQuery.get("//gruseltour-leipzig.de/wordpress/wp-content/themes/gruseltour-leipzig/test/data.txt", function(data) {
		var lines = cleanDisabledDateString(data).split("\n");
		var mappedLines = lines.map(toGermanStringWithZeros);
		assert.equal(mappedLines[0], "01.02.2014");
		assert.equal(mappedLines[1], "03.05.2015");
		assert.equal(mappedLines[2], "04.08.2015");
		done();
	});
});

QUnit.test("testFunctionReadAndClean", function(assert) {
	var done = assert.async();
	jQuery.get("//gruseltour-leipzig.de/wordpress/wp-content/themes/gruseltour-leipzig/test/data.txt", function(data) {
		var mappedLines = transformDateLinesToArray(data);
		assert.equal(mappedLines[0], "01.02.2014");
		assert.equal(mappedLines[1], "03.05.2015");
		assert.equal(mappedLines[2], "04.08.2015");
		done();
	});
});

QUnit.test("testFunctionReadAndCleanRealData", function(assert) {
	var done = assert.async();
	jQuery.get("//gruseltour-leipzig.de/wordpress/wp-content/themes/gruseltour-leipzig/js/data.txt", function(data) {
		assert.ok(data.toString().length > 0);
		done();
	});
});