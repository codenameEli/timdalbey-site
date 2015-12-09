module.exports = {

    sass_theme: {
        files: [
            '<%= paths.sass.dest %>/**/*.scss',
        ],
        tasks: [ 'sass:theme' ],
        options: {
            livereload: true,
        },
    },

    sass_admin: {
        files: [
            '<%= paths.sass.dest %>/admin/**/*.scss',
        ],
        tasks: [ 'sass:admin' ],
        options: {
            livereload: true,
        },
    },

    js_theme: {
        files: [
            '<%= paths.js.dest %>/**/*.js',
        ],
        tasks: [ 'concat' ],
        options: {
            livereload: true,
        },
    },
};