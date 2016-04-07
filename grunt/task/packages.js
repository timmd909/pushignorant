'use strict';

module.exports = function (grunt) {

	grunt.registerTask('packages', [
		'volo:add:-f:-nostamp:FortAwesome/Font-Awesome/v4.5.0',
		'volo:add:-f:-nostamp:jquery/jquery/2.2.3',
		'volo:add:-f:-nostamp:knockout/knockout/v3.4.0',
		'volo:add:-f:-nostamp:lodash/lodash/4.8.2#.',
		'volo:add:-f:-nostamp:requirejs/requirejs/2.2.0',
		'volo:add:-f:-nostamp:twbs/bootstrap/v3.3.6',
	]);

};
