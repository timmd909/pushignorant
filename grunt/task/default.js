'use strict';

module.exports = function (grunt) {

	grunt.registerTask('default', [
		'copy',
		'less:dev'
	]);

};
