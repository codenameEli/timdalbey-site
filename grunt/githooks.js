module.exports = {

	all: {

		// options: {
		//     // Customize the hashbang to say 'Shell script'
		//     hashbang: '#!/bin/sh',
		//     // Plugin comes in with a sheel script template already. Handy, innit?
		//     template: '../node_modules/grunt-githooks/templates/shell.hb',
		//     // Customize the markers so comments start with #
		//     startMarker: '## LET THE FUN BEGIN',
		//     endMarker: '## PARTY IS OVER'
		// },

		'pre-receive': 'sync'
	},
};