app.factory( 'Projects', Projects );

function Projects( $q ) {

	var Projects = {};

	Projects.getProjects = function() {

		var deferred = $q.defer();
		var projects = _wpProjects;

		deferred.resolve(projects);

		return deferred.promise;
	};

	return Projects;
}