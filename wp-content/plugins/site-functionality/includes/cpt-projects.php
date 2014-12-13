<?php

function ce_cpt_project_init() {
	register_post_type( 'ce_project', array(
		'labels'            => array(
			'name'                => __( 'Projects', 'ce_eli' ),
			'singular_name'       => __( 'Project', 'ce_eli' ),
			'all_items'           => __( 'Projects', 'ce_eli' ),
			'new_item'            => __( 'New Project', 'ce_eli' ),
			'add_new'             => __( 'Add New Project', 'ce_eli' ),
			'add_new_item'        => __( 'Add New Project', 'ce_eli' ),
			'edit_item'           => __( 'Edit Project', 'ce_eli' ),
			'view_item'           => __( 'View Project', 'ce_eli' ),
			'search_items'        => __( 'Search Projects', 'ce_eli' ),
			'not_found'           => __( 'No projects found', 'ce_eli' ),
			'not_found_in_trash'  => __( 'No projects found in landfill', 'ce_eli' ),
			'parent_item_colon'   => __( 'Parent project', 'ce_eli' ),
			'menu_name'           => __( 'Project', 'ce_eli' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'exclude_from_search' => false,
		'has_archive'       => true,
		'rewrite'           => array(
			'slug'                => 'projects',
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
		),
		'query_var'         => true,
	) );

}
add_action( 'init', 'ce_cpt_project_init' );
