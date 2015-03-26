QUnit.test("testCleanDisabledDateString", function(assert) {
	var input = "1.1.2014\n   3.5.2015 \n 4.8.2015\n";
	assert.equal(cleanDisabledDateString(input), "1.1.2014\n3.5.2015\n4.8.2015\n");
});

// return dirtyString.trim().replace(/ /g,'').replace(/\r\n/g, '\n');