module.exports = {

	dynamic: {

		files: [{

			expand: true,
			src: [
				'<%= paths.dest.themes.launchpad %>/**/*.{png,jpg,gif}',
			],
		}]
	}
}