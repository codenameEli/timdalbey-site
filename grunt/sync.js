module.exports = {
	// theme: {
	// 	expand: true,
	// 	cwd: '<%= paths.vendor.launchpad_theme %>',
	// 	src: [
	// 		// Ignored files
	// 		'!*',
	// 		// Allowed file types
	// 		'*.ico',
	// 		'*.php',
	// 		'*.css',
	// 		'*.png',
	// 		'*.jpg',
	// 		'composer.json',
	// 		'README.md',
	// 		'fonts/**',
	// 		'components/**',
	// 		'includes/**',
	// 		'images/**',
	// 		'lib/**',
	// 		'vendor/**',
	// 		'resources/images/**',
	// 		'resources/fonts/**',
	// 		'resources/js/**/*.html',
	// 		'resources/css/admin/**.min.css',
	// 		'resources/css/admin/**.min.css.map',
	// 	],
	// 	dest: '<%= paths.dest.theme.client %>',
	// 	ignoreInDest: [
	// 		'components/**/*.min.js',
	// 		'components/**/*.min.css',
	// 		// 'components/**/admin/*.min.css',
	// 		// 'resources/**/*.min.js',
	// 		// 'resources/**/*.min.css',
	// 	],
 //    	updateAndDelete: true
	// },

	// plugins: {
	// 	expand: true,
	// 	cwd: '<%= paths.src.plugin.base %>',
	// 	src: [ '**/*' ],
	// 	dest: '<%= paths.dest.plugin.base %>',
	// 	updateAndDelete: true
	// },

	wordpress: {
		expand: true,
		cwd: 'vendor/wordpress',
		src: [ '**/*' ],
		dest: 'htdocs/',
	},

	// components: {
	// 	expand: true,
	// 	cwd: 'vendor/bower_components',
	// 	src: [ '**/*' ],
	// 	dest: '<%= paths.dest.theme.client %>/components',
	// },

	// genesis: {
	// 	expand: true,
	// 	cwd: 'vendor/themes/genesis',
	// 	src: [ '**/*' ],
	// 	dest: 'htdocs/wp-content/themes/genesis',
	// },

	launchpad_theme: {
		expand: true,
		cwd: '<%= paths.vendor.launchpad_theme %>',
		src: [ '**/*' ],
		dest: '<%= paths.dest.theme.client %>',
	},

	// dist: {

		// files: [

			// Blacklist everything for control over the order of the build process
			// NOTE: This is not ideal, I do NOT love this solution

			// // WordPress Core
			// {
			// 	expand: true,
			// 	cwd: 'vendor/wordpress',
			// 	src: [ '**/*' ],
			// 	dest: 'htdocs/',
			// },

			// Bower Components ( not using NPM b/c of conflicts with node_modules in the root )
			// {
			// 	expand: true,
			// 	cwd: 'vendor/bower_components',
			// 	src: [ '**/*' ],
			// 	dest: '<%= paths.dest.theme.client %>/components',
			// },

			// Plugins
			// {
			// 	expand: true,
			// 	// cwd: '<%= paths.src.plugin.client %>',
			// 	cwd: 'src/plugins/awesome-admin',
			// 	src: [ '**/*' ],
			// 	// dest: '<%= paths.dest.plugin.client %>',
			// 	dest: 'htdocs/wp-content/plugins/awesome-admin',
			// 	// filter: 'isFile'
			// 	// ext: '.php',   // Dest filepaths will have this extension.
			// 	// extDot: 'first'   // Extensions in filenames begin after the first dot
			// },

			// Genesis Theme
			// {
			// 	expand: true,
			// 	cwd: 'vendor/genesis',
			// 	src: [ '**/*' ],
			// 	dest: 'htdocs/wp-content/themes/genesis',
			// 	// filter: 'isFile'
			// 	// ext: '.php',   // Dest filepaths will have this extension.
			// 	// extDot: 'first'   // Extensions in filenames begin after the first dot
			// },
		// ],
		// verbose: true, // Log the files being synced
	// },
}