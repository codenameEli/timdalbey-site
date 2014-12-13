<?php

// Register Custom Taxonomy
function ce_role() {

    $labels = array(
        'name'                       => _x( 'Role', 'Taxonomy General Name', 'ce_eli' ),
        'singular_name'              => _x( 'Role', 'Taxonomy Singular Name', 'ce_eli' ),
        'menu_name'                  => __( 'Role', 'ce_eli' ),
        'all_items'                  => __( 'All Roles', 'ce_eli' ),
        'parent_item'                => __( 'Parent Role', 'ce_eli' ),
        'parent_item_colon'          => __( 'Parent Role:', 'ce_eli' ),
        'new_item_name'              => __( 'New Role', 'ce_eli' ),
        'add_new_item'               => __( 'Add Role', 'ce_eli' ),
        'edit_item'                  => __( 'Edit Role', 'ce_eli' ),
        'update_item'                => __( 'Update Role', 'ce_eli' ),
        'separate_items_with_commas' => __( 'Separate role with commas', 'ce_eli' ),
        'search_items'               => __( 'Search Roles', 'ce_eli' ),
        'add_or_remove_items'        => __( 'Add or remove role', 'ce_eli' ),
        'choose_from_most_used'      => __( 'Choose from the most used role', 'ce_eli' ),
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
    register_taxonomy( 'role', array( 'ce_project' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'ce_role', 0 );