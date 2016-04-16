'use strict';

module.exports = function (grunt) {

	grunt.registerTask('default', [
		'clean',
		'copy',
		'less:dev'
	]);

	//
	// Everything including downloading assets.
	// This only needs to be done once.
	//
	grunt.registerTask('build-all', [
		'clean',
		'packages',
		'copy',
		'less:dev'
	]);

};
