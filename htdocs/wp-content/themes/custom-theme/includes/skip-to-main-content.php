<?php

/* Skip to Main Content - Accessibility Link
 *
 */

// add markup for the link
add_action( 'genesis_before', 'ldm_skip_navigation_add_link' );
function ldm_skip_navigation_add_link() {

    echo '<a class="skip-to-main-content btn btn-large btn-danger" href="#main-content-container">skip to main content</a>';
}

// add id="main-content-container" as target
add_filter( 'genesis_attr_content', 'ldm_skip_navigation_add_id_for_target' );
function ldm_skip_navigation_add_id_for_target( $attr ) {

    $attr['id'] = __( 'main-content-container', 'bsg' );

    return $attr;
}
