<?php

add_action( 'genesis_setup', 'omni_register_sidebar_search' );
// Register Sidebar for Search Page
function omni_register_sidebar_search() {
    genesis_register_sidebar( array(
        'id'            => 'search-sidebar',
        'name'          => __( 'Search Sidebar', 'omnicable' ),
        'description'   => __( 'This is a widget area that apperas in the sidebar of the search results page', 'omnicable' ),
    ) );
}
