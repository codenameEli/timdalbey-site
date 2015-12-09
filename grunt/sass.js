module.exports = {

    theme: {
        options: {
            outputStyle : 'nested',
            sourceMap: true,
        },
        files: {
            '<%= paths.sass.dest %>/styles.min.css':
            '<%= paths.sass.dest %>/styles.scss'
        }
    },

    admin: {
        options: {
            outputStyle : 'nested',
            sourceMap: true,
        },
        files: {
            '<%= paths.sass.dest %>/admin/styles.min.css':
            '<%= paths.sass.dest %>/admin/styles.scss'
        }
    },
};