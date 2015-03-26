QUnit.test("testToGermanDateString", function(assert) {
	assert.equal(toGermanDateString(new Date(2014, 0, 1)), "1.1.2014");  
});

QUnit.test("testToGermanDateStringWithZeros", function(assert) {
	assert.equal(toGermanDateStringWithZeros(new Date(2014, 0, 1)), "01.01.2014");  
});

QUnit.test("testToGermanStringWithZeros", function(assert) {
	assert.equal(toGermanStringWithZeros("1.1.2014"), "01.01.2014");  
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

QUnit.test("testReadDisabledDates", function(assert) {
	var input = "1.1.2014\n3.5.2015 \n 4.8.2015\r\n";
	var lines = cleanDisabledDateString(input).split("\n");

	expect(0);
});