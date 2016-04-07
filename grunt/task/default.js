'use strict';

module.exports = function (grunt) {

	grunt.registerTask('default', [
		'clean',
		'packages',
		'copy',
		'less:dev'
	]);

};
