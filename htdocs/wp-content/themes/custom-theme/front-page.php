<?php

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_loop', 'ce_do_projects_loop' );
add_action( 'genesis_before_content', 'ce_do_skills_markup' );
add_action( 'genesis_before_content', 'ce_do_current_position_markup' );

function ce_do_current_position_markup() {
	?>
	<div class="current-position-wrapper">
		<div class="row">
			<div class="col-md-12">
				<h2>@ Current Position</h2>
				<h3>Launch Dynamic Media <span class="timespan">September 2013 - Current</span></h3>
				<span>Responsibilities:</span>
				<p class="current-position-description">Building custom themes and plugins for clients.<br>Train new developers on technologies and best practices.<br>Communicating/Meeting with clients to discuss project details.<br>Creating scope/deliverables documents to hand-over to client.</p>
				<span>Value:</span>
				<p class="current-position-deliverables">Helped start and develop an internal starter theme to streamline build-out process and standardize site folder structure.<br>Built the internal build process of our projects to help manage dependencies better.<br>Created custom Salesforce application to track project time and manage projects.</p>
			</div>
		</div>
	</div>
	<?php
}

function ce_do_skills_markup() {
	?>
	<div class="skills-wrapper">
		<div class="row">
			<div class="col-md-12">
				<h2>// Skills</h2>
				<ul class="skills-container">
					<li class="skill">WordPress</li>
					<li class="skill">WooCommerce</li>
					<li class="skill">PHP</li>
					<li class="skill">Javscript</li>
					<li class="skill">jQuery</li>
					<li class="skill">Backbone</li>
					<li class="skill">Angular</li>
					<li class="skill">HTML</li>
					<li class="skill">CSS</li>
					<li class="skill">SASS</li>
					<li class="skill">Grunt</li>
				</ul>
			</div>
		</div>
	</div>
	<?php
}

function ce_do_projects_loop() {

	$args = array(
		'post_type' => array( 'projects' ),
		'post_status' => array( 'publish' ),
		'order' => 'DESC',
		'orderby' => 'meta_value',
		'meta_key' => '_ce_timestamp',
	);

	$query = new WP_Query( $args );
	$projects = array();

	while ( $query->have_posts() ):

		$query->the_post();
		$post = $query->post;
		// $project = ce_format_project( $post );
		$project = ce_do_project_markup( $post );

		// array_push( $projects, $project );

	endwhile;
	wp_reset_postdata();
}

function ce_dump_json( $projects ) {
?>
	<script type="text/javascript">
		var _wpProjects = <?php echo json_encode( $projects ); ?>;
	</script>
<?php
}

function ce_do_project_markup( $post ) {

	$title = get_the_title( $post->ID );
	$thumbnail_url = wp_get_attachment_thumb_url( get_post_thumbnail_id( $post->ID ) );
	$content = get_the_content();
	$timestamp = date( "Y-m-d", get_post_meta( $post->ID, '_ce_timestamp', true ) );
	$companies = get_the_terms( $post->ID, 'company' );
	$role = get_the_terms( $post->ID, 'role' );
	$skills = get_the_terms( $post->ID, 'skills' );
	$type = get_the_terms( $post->ID, 'type' );
?>
	<div class="projects-wrapper">
		<h2># Projects</h2>
		<!-- <ce-filter-bar></ce-filter-bar> -->
		<div class="row">
			<div class="col-md-12">
				<h2><?php echo $title; ?></h2>
				<div class="row">
					<div class="project-meta-container">
						<div class="col-md-2">
							<h4>Date</h4>
							<div><?php echo date($timestamp); ?></div>
						</div>
						<!-- <img style="width:100px;" ng-src="{{ project.thumbnail_url }}" /> -->
<!-- 						<div class="col-md-2">
							<h4>Company</h4>
							<div ng-repeat="name in project.company">{{ name }}</div>
						</div>
						<div class="col-md-2">
							<h4>Role</h4>
							<div ng-repeat="name in project.role">{{ name }}</div>
						</div>
						<div class="col-md-2">
							<h4>Skills</h4>
							<div ng-repeat="name in project.skills">{{ name }}</div>
						</div>
						<div class="col-md-2">
							<h4>Type</h4>
							<div ng-repeat="name in project.type">{{ name }}</div>
						</div> -->
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="project-content-container"><?php echo $content; ?></div>
				</div>
			</div>
		</div>
<?php
}

function ce_do_project_markup_before() {
?>
	<div class="projects-wrapper" ng-controller="ProjectsController">
		<h2># Projects</h2>
		<!-- <ce-filter-bar></ce-filter-bar> -->
		<div ng-repeat="project in projects">
			<div class="row">
				<div class="col-md-12">
					<h2>{{ project.title }}</h2>
					<div class="row">
						<div class="project-meta-container">
							<div class="col-md-2">
								<h4>Date</h4>
								<div>{{ project.timestamp | date }}</div>
							</div>
							<!-- <img style="width:100px;" ng-src="{{ project.thumbnail_url }}" /> -->
							<div class="col-md-2">
								<h4>Company</h4>
								<div ng-repeat="name in project.company">{{ name }}</div>
							</div>
							<div class="col-md-2">
								<h4>Role</h4>
								<div ng-repeat="name in project.role">{{ name }}</div>
							</div>
							<div class="col-md-2">
								<h4>Skills</h4>
								<div ng-repeat="name in project.skills">{{ name }}</div>
							</div>
							<div class="col-md-2">
								<h4>Type</h4>
								<div ng-repeat="name in project.type">{{ name }}</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="project-content-container" ng-bind-html="{{ project.content }}">
						{{ project.content }}
					</div>
				</div>
			</div>
		</div>
<?php
}

function ce_do_project_markup_after() {
?>
	</div>
<?php
}

function ce_format_project( $post ) {

	$title = get_the_title( $post->ID );
	$thumbnail_url = wp_get_attachment_thumb_url( get_post_thumbnail_id( $post->ID ) );
	$content = get_the_content();
	$timestamp = date( "Y-m-d", get_post_meta( $post->ID, '_ce_timestamp', true ) );
	$company = get_the_terms( $post->ID, 'company' );
	$role = get_the_terms( $post->ID, 'role' );
	$skills = get_the_terms( $post->ID, 'skills' );
	$type = get_the_terms( $post->ID, 'type' );

	$project = array(
		'title'	=> $title,
		'thumbnail_url' => $thumbnail_url,
		'content' => $content,
		'timestamp' => $timestamp,
		'company' => ce_format_project_terms( $company ),
		'role' => ce_format_project_terms( $role ),
		'skills' => ce_format_project_terms( $skills ),
		'type' => ce_format_project_terms( $type ),
	);

	return $project;
}

function ce_format_project_terms( $terms ) {

	if ( !$terms ) { return; }

	$final = array();

	foreach ( $terms as $term ) {

		array_push( $final, $term->name );
	}

	return $final;
}

genesis();