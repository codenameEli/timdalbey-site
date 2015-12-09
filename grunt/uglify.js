module.exports = {

	dist: {
		options: {
			mangle: false,
			beautify: true,
			sourceMap: true,
		},
		files: {
			'<%= paths.js.dest %>/javascript.min.js':
			'<%= paths.js.dest %>/javascript.min.js'
		}
	}
};