app.controller( 'ProjectsController', ProjectsController );

function ProjectsController( $scope, Projects, $timeout ) {

	$scope.projects = [];

	Projects.getProjects().then(function(results) {

		$scope.projects = results;
		console.log($scope.projects);
	});
}