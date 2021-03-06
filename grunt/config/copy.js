'use strict';

var VOLO_CACHE_DIR = 'var/cache/volo';
var path = require('path');

module.exports = {
	bootstrap: {
		files: [
			{
				expand: true,
				flatten: true,
				src: path.join(VOLO_CACHE_DIR, '/bootstrap/dist/js/bootstrap**.js'),
				dest: 'web/scripts/lib'
			},
			{
				expand: true,
				flatten: true,
				src: path.join(VOLO_CACHE_DIR, '/bootstrap/dist/fonts/**'),
				dest: 'web/fonts/'
			}
		]
	}, // bootstrap

	jquery: {
		files: [
			{
				expand: true,
				flatten: true,
				src: path.join(VOLO_CACHE_DIR, 'jquery.**'),
				dest: 'web/scripts/lib'
			}
		]
	}, // jquery

	lodash: {
		files: [
			{
				expand: true,
				flatten: true,
				src: path.join(VOLO_CACHE_DIR, 'lodash/dist/lodash*.js'),
				dest: 'web/scripts/lib'
			}
		]
	}, // lodash

	requirejs: {
	   files: [
		   {
			   expand: true,
			   flatten: true,
			   src: path.join(VOLO_CACHE_DIR, 'require.js'),
			   dest: 'web/scripts/lib'
		   }
	   ]
   }, // requirejs

	knockout: {
		files: [
			{
				expand: true,
				flatten: true,
				src: path.join(VOLO_CACHE_DIR, 'knockout/dist/*.js'),
				dest: 'web/scripts/lib/',
				rename: function (dest, src) {
					src = src.replace(/\.js$/, '.min.js').replace('debug.min.', '');

					return dest + src;
				}
			}
		]
	}, // knockout

	'font-awesome': {
		files: [
			{
				expand: true,
				flatten: true,
				cwd: path.join(VOLO_CACHE_DIR, 'Font-Awesome/css/'),
				src: '*.css',
				dest: 'web/styles'
			},
			{
				expand: true,
				flatten: true,
				cwd: path.join(VOLO_CACHE_DIR, 'Font-Awesome/fonts/'),
				src: '**',
				dest: 'web/fonts'
			}
		]
	}

};
