## TODO

## GRUNT TASKS TO WRITE

`grunt init`
+ SETUP
  + Replace `ldm-launchpad` with theme name in `package.json`. `themeName` is used across the build process in naming folders and files.
+ PROCESS
  + names the theme based on a var `themeName` in `package.json`

`grunt serve`
+ responsible for the concat and syncing the files. Lints.

`grunt serve:dev`
+ Shows the error/console logs. Doesn't minify images.

`grunt serve:prod`
+ for testing before push live. Strips error/console logs. Minifies images. Lints.

`grunt deploy`
+ responsible for running the deploy script.

`grunt update`
+ updates all vendor files and themes and plugins

`grunt sync`
+ would be nice to have this sync the database with WPe but prob not going to happen since WPe is who they are

`grunt sync:images`
+ syncs the images from the server

grunt sync:database

## Wishlist
`LiveReload`
+ requires install of chrome extension
Separate grunt tasks
Deploy
Version bump cache busting
Remove Logging for Prod
WPCLI
grunt-shell - https://github.com/sindresorhus/grunt-shell
Utitilize GitHooks for something??
