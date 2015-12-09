module.exports = {

	theme: {
		options: {
			sourceMap: true,
		},
		src: [
			'<%= paths.js.dest %>/vendor/**/*.js',
			'<%= paths.js.dest %>/app/app.js',
			'<%= paths.js.dest %>/app/**/*.js',
			'<%= paths.js.dest %>/custom/**/*.js',
		],
		dest: '<%= paths.js.dest %>/javascript.min.js'
	}
};