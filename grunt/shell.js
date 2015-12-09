// https://github.com/sindresorhus/grunt-shell
module.exports = {

  init: {
    command: 'mkdir <%= paths.dest.theme.client %>'
  },

  composer: {
    command: 'composer install'
  },

  npm_init: {
    command: [
      'echo Enter password for npm install',
      'sudo npm install'
    ].join('&&'),
  },

  deploy: {

    command: [
      'echo Add WPEngine remotes',
      // 'git remote add production git@git.wpengine.com:production/awesomeadmin.git',
      'git remote -v show production',
      'echo Deploying to production',
      'echo Remove old branch used for deployment',
      'git branch -D deploy-production',
      'echo Create branch for deploying',
      'git checkout -b deploy-production',

      'echo Run Grunt prod',
      // 'grunt',

      'echo Add compiled files not part of the normal repo',
      // 'git add -f htdocs/wp-content/themes/<%= pkg.themeName %>/css/style.min.css',
      // 'git add -f htdocs/wp-content/themes/<%= pkg.themeName %>/js/javascript.min.js',

      'echo Commit files',
      // 'git commit -m "add compiled files"',

      'echo Push current branch to production',

      'echo Return to master branch',
      'git checkout master'
    ].join('&&'),

    options: {
      failOnError: false,
    }
  },

  sass: {
    // command: function(file) {
    //  return 'echo @import "custom/' + file + '"' + '>> src/themes/awesome-admin/resources/css/styles.scss';
    // },
    // command: 'echo @import custom/checkitioutout; >> src/themes/awesome-admin/resources/css/styles.scss',
  }
};
