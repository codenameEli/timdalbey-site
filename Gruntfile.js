 module.exports = function(grunt) {

	require('time-grunt')(grunt); // Need to require
	require('load-grunt-tasks')(grunt); // Load tasks automatically

	require('load-grunt-config')(grunt, {

	    data: { // Define global variables in here

        pkg: grunt.file.readJSON('package.json'),

  			paths: {

  				dest: { // Production paths
  					base: 'htdocs/wp-content',
  					theme: {
  						base: '<%= paths.dest.base %>/themes',
              client: '<%= paths.dest.theme.base %>/<%= pkg.themeName %>',
  					},
  					plugin: {
  						base: '<%= paths.dest.base %>/plugins',
              client: '<%= paths.dest.plugin.base %>/<%= pkg.themeName %>',
  					}
  				},

  				// PHP assets
  				php: {
  					files_std : ['src/**/*.php', '!node_modules/**/*.php', '!vendor/**/*.php'], // Standard file match
            files : '<%= paths.php.files_std %>' // Dynamic file match
  				},

  				// JavaScript assets
  				js : {
  				    base : 'resources/js', //Base dir
  				    dest : '<%= paths.dest.theme.client %>/<%= paths.js.base %>', // Production code
  				},

  				// Sass assets
  				sass : {
              base: 'resources/css',
  				    dest : '<%= paths.dest.theme.client %>/<%= paths.sass.base %>', // Compiled files dir
  				},

          // Vendor
          vendor : {
            base: 'vendor',
            launchpad_theme: '<%= paths.vendor.base %>/themes/launchpad-theme'
          }
  			},
	    }
	});
};
