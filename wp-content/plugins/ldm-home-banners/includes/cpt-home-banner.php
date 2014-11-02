<?php

// Register Custom Post Type
function cpt_home_banner() {

    $labels = array(
        'name'                => _x( 'Home Banners', 'Post Type General Name', 'ldm' ),
        'singular_name'       => _x( 'Home Banner', 'Post Type Singular Name', 'ldm' ),
        'menu_name'           => __( 'Home Banners', 'ldm' ),
        'parent_item_colon'   => __( 'Parent Home Banner:', 'ldm' ),
        'all_items'           => __( 'All Home Banners', 'ldm' ),
        'view_item'           => __( 'View Home Banner', 'ldm' ),
        'add_new_item'        => __( 'Add New Home Banner', 'ldm' ),
        'add_new'             => __( 'Add New', 'ldm' ),
        'edit_item'           => __( 'Edit Home Banner', 'ldm' ),
        'update_item'         => __( 'Update Home Banner', 'ldm' ),
        'search_items'        => __( 'Search Home Banners', 'ldm' ),
        'not_found'           => __( 'Not found', 'ldm' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'ldm' ),
    );

    $rewrite = array(
        'slug'                => 'home-banners',
        'with_front'          => true,
        'pages'               => false,
        'feeds'               => false,
    );

    $args = array(
        'label'               => __( 'home_banner', 'ldm' ),
        'description'         => __( 'Home Banner for homepage image slider.', 'ldm' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
        'hierarchical'        => false,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 25,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => false,
        'rewrite'             => $rewrite,
        'capability_type'     => 'page',
    );

    register_post_type( 'home_banner', $args );
}

// Hook into the 'init' action
add_action( 'init', 'cpt_home_banner', 0 );