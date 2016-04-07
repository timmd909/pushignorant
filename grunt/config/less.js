'use strict';

var FILES = {
	'web/css/bootstrap.css': 'app/Resources/less/bootstrap.less',
	'web/css/pushignorant.css': 'app/Resources/less/pushignorant.less',
};

module.exports = {
	options: {
		compress: false
	},
	dev: {
		files: FILES
	},
	prod: {
		options: {
			compress: true
		},
		files: FILES
	}
};
