'use strict';

var FILES = {
	'web/styles/bootstrap.css': 'app/Resources/less/bootstrap.less',
	'web/styles/pushignorant.css': 'app/Resources/less/pushignorant.less',
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
