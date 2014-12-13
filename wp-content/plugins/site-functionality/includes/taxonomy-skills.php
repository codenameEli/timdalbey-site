<?php

// Register Custom Taxonomy
function ce_skills() {

	$labels = array(
		'name'                       => _x( 'Skills', 'Taxonomy General Name', 'ce_eli' ),
		'singular_name'              => _x( 'Skill', 'Taxonomy Singular Name', 'ce_eli' ),
		'menu_name'                  => __( 'Skills', 'ce_eli' ),
		'all_items'                  => __( 'All Skills', 'ce_eli' ),
		'parent_item'                => __( 'Parent Skill', 'ce_eli' ),
		'parent_item_colon'          => __( 'Parent Skill:', 'ce_eli' ),
		'new_item_name'              => __( 'New Skill', 'ce_eli' ),
		'add_new_item'               => __( 'Add Skill', 'ce_eli' ),
		'edit_item'                  => __( 'Edit Skills', 'ce_eli' ),
		'update_item'                => __( 'Update Skill', 'ce_eli' ),
		'separate_items_with_commas' => __( 'Separate skills with commas', 'ce_eli' ),
		'search_items'               => __( 'Search Skills', 'ce_eli' ),
		'add_or_remove_items'        => __( 'Add or remove skills', 'ce_eli' ),
		'choose_from_most_used'      => __( 'Choose from the most used skills', 'ce_eli' ),
		'not_found'                  => __( 'Not Found', 'ce_eli' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'skill', array( 'ce_person' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'ce_skills', 0 );