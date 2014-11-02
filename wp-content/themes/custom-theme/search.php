<?php
/*
 * Template Name: Advanced Search Page
 */

// force sidebar-content layout
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_sidebar_content' );

// remove default primary widget area
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );

// add search widget area ('search-sidebar')
add_action( 'genesis_before_content', 'omni_search_before_sidebar_widget_area' );

// Display Header area
add_action( 'genesis_before_loop', 'omni_search_display_content_header' );
function omni_search_before_sidebar_widget_area() {
    genesis_widget_area( 'search-sidebar', array( 'before' => '<div class="search-sidebar widget-area span3">', 'after' => '</div>', ) );
}

function omni_search_display_content_header() {
    if ( !is_search() ) {
        return;
    }
	$output = '';

	$output .= '<h1 class="entry-title">Search Results</h1>';

	echo $output;
}

genesis();
