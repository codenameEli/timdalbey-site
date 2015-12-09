angular.module('ce.config', [])
.constant('ceConfig', {
	templates: location.origin + '/wp-content/themes/custom-theme/resources/js/app/templates/',
});

app = angular.module( 'webApp', [ 'ce.config' ] );
