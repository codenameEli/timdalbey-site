<?php

add_action('genesis_setup','srf_genesis_featured_image_placement', 15);

function srf_genesis_featured_image_placement() {
    // image with post (disabled on single post / single page )
    add_action( 'genesis_before_entry', 'srf_bootstrap_genesis_featured_image');

    add_action( 'genesis_before_content', 'srf_bootstrap_genesis_featured_image_above_content' );
}

function srf_bootstrap_genesis_featured_image() {
    global $post;

    if ( is_singular() || !has_post_thumbnail()) {
        // abort if singular or no thumbnail
        return;
    }

    $permalink = get_permalink();
    $attr = array(
        'class' => 'archive-featured-image'
    );

    echo ( $permalink ? "<a href=\"{$permalink}\">" : "" );
        the_post_thumbnail( 'thumb-featured-image', $attr );
    echo ( $permalink ? "</a>" : "" );
}


// Move the featured image out above all of the content
function srf_bootstrap_genesis_featured_image_above_content() {

    $size = "ldm-featured-image";
    $attr = array();

    if ( !has_post_thumbnail() ) {
        // abort if NOT singular or no thumbnail
        return;
    }

    if ( is_front_page() ) {

        $size = 'ldm-homepage-featured-image';
    }

    if ( is_singular( 'greth_home_design' ) ) {

        $size = 'ldm-home-designs-featured-image';
    }

    echo '<div class="col-sm-12 single-featured-image">';
        the_post_thumbnail( $size, $attr );
    echo '</div>';
}
