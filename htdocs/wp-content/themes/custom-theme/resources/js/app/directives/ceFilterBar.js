app.directive( 'ceFilterBar', ceFilterBar );
function ceFilterBar( ceConfig ) {
	return {
		restrict: 'EA',
		link: function( $scope, element, attr ) {

			$scope.showLaunchProjects = true;
			$scope.showPersonalProjects = true;

			var masterProjects = $scope.projects

			$scope.filterProjects = function( needle ) {

				var final = [];

				_.each( masterProjects, function( project ) {

					var index = _.indexOf( project.company, needle );

					console.log(index);
					if ( index !== -1 ) {

						final.push( project );
					}
				});

				$scope.projects = final;
			}

			// function filterProjectByProp( prop )
		},
		templateUrl: ceConfig.templates + 'ceFilterBar.html'
	}
}