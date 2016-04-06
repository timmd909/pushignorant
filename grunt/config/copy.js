'use strict';

module.exports = {
	bootstrap: {
		files: [
			{
				expand: true,
				flatten: true,
				src: 'vendor/components/bootstrap/js/bootstrap**.js',
				dest: 'web/js'
			}
		]
	}, // bootstrap

	jquery: {
		files: [
			{
				expand: true,
				flatten: true,
				src: 'vendor/components/jquery/jquery.**',
				dest: 'web/js/'
			}
		]
	}, // jquery

	'font-awesome': {
		files: [
			{
				expand: true,
				flatten: true,
				src: 'vendor/components/font-awesome/css/**.css',
				dest: 'web/css'
			},
			{
				expand: true,
				flatten: true,
				src: 'vendor/components/font-awesome/fonts/**',
				dest: 'web/fonts'
			}
		]
	}

};
