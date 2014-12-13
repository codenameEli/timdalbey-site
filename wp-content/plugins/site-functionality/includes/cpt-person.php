<?php

function ce_cpt_person_init() {
	register_post_type( 'ce_person', array(
		'labels'            => array(
			'name'                => __( 'People', 'ce_eli' ),
			'singular_name'       => __( 'Person', 'ce_eli' ),
			'all_items'           => __( 'People', 'ce_eli' ),
			'new_item'            => __( 'New person', 'ce_eli' ),
			'add_new'             => __( 'Add New Person', 'ce_eli' ),
			'add_new_item'        => __( 'Add New Person', 'ce_eli' ),
			'edit_item'           => __( 'Edit Person', 'ce_eli' ),
			'view_item'           => __( 'View Person', 'ce_eli' ),
			'search_items'        => __( 'Search People', 'ce_eli' ),
			'not_found'           => __( 'No people found', 'ce_eli' ),
			'not_found_in_trash'  => __( 'No people found in landfill', 'ce_eli' ),
			'parent_item_colon'   => __( 'Parent person', 'ce_eli' ),
			'menu_name'           => __( 'People', 'ce_eli' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor', 'custom-fields' ),
		'exclude_from_search' => true,
		'has_archive'       => true,
		'rewrite'           => array(
			'slug'                => 'people',
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
		),
		'query_var'         => true,
	) );

}
add_action( 'init', 'ce_cpt_person_init' );
