<?php

// Register Custom Taxonomy
function ce_company() {

	$labels = array(
		'name'                       => _x( 'Company', 'Taxonomy General Name', 'ce_eli' ),
		'singular_name'              => _x( 'Company', 'Taxonomy Singular Name', 'ce_eli' ),
		'menu_name'                  => __( 'Company', 'ce_eli' ),
		'all_items'                  => __( 'All Companies', 'ce_eli' ),
		'parent_item'                => __( 'Parent Company', 'ce_eli' ),
		'parent_item_colon'          => __( 'Parent Company:', 'ce_eli' ),
		'new_item_name'              => __( 'New Company', 'ce_eli' ),
		'add_new_item'               => __( 'Add Company', 'ce_eli' ),
		'edit_item'                  => __( 'Edit Company', 'ce_eli' ),
		'update_item'                => __( 'Update Company', 'ce_eli' ),
		'separate_items_with_commas' => __( 'Separate company with commas', 'ce_eli' ),
		'search_items'               => __( 'Search Companies', 'ce_eli' ),
		'add_or_remove_items'        => __( 'Add or remove company', 'ce_eli' ),
		'choose_from_most_used'      => __( 'Choose from the most used company', 'ce_eli' ),
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
	register_taxonomy( 'company', array( 'ce_project' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'ce_company', 0 );