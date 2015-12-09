# Launchpad
----------------------------------

Getting Started
----------------------------------
Rather than include plugins within the repository, we are using Composer to
manage them.  To this end, we've included a `composer.json` file in the
root of the project.

#### Installing Composer
Running the following from the command line, should install composer.
```
curl -sS https://getcomposer.org/installer | php;\
mv composer.phar /usr/local/bin/composer
```
[Official Installation Instructions](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)

#### After Cloning the Repo
Do the below actions before starting work on the project

1. `composer install`
2. `npm install`
3. Change **themeName** in `package.json` to what you want the theme name to be.
4. Run `grunt build`

Working on the project
----------------------------------

1. Run grunt sync while working on the project
2. Always be working in the src folder, never the htdocs folder
