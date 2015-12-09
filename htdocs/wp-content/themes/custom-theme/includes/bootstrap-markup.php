<?php

// Priority 15 ensures it runs after Genesis itself has setup.
add_action( 'genesis_setup', 'ldm_bootstrap_markup_setup', 15 );
function ldm_bootstrap_markup_setup() {

    // add bootstrap classes
    add_filter( 'genesis_attr_site-header', 'ldm_add_markup_class', 10, 2 );
    add_filter( 'genesis_attr_site-inner', 'ldm_add_markup_class', 10, 2 );
    add_filter( 'genesis_attr_content-sidebar-wrap','ldm_add_markup_class', 10, 2 );
    add_filter( 'genesis_attr_content', 'ldm_add_markup_class', 10, 2 );
    add_filter( 'genesis_attr_sidebar-primary', 'ldm_add_markup_class', 10, 2 );
    add_filter( 'genesis_attr_sidebar-secondary', 'ldm_add_markup_class', 10, 2 );
    add_filter( 'genesis_attr_archive-pagination', 'ldm_add_markup_class', 10, 2 );
    add_filter( 'genesis_attr_site-footer', 'ldm_add_markup_class', 10, 2 );
}

function ldm_add_markup_class( $attr, $context ) {

    // default classes to add
    $classes_to_add = apply_filters ('ldm-classes-to-add',
        // default bootstrap markup values
        array(
            'site-header' => 'container',
            'site-inner' => 'container',
            'site-footer' => 'container',
            // 'content-sidebar-wrap' => 'row',
            'archive-pagination' => 'clearfix',
        ),
        $context,
        $attr
    );

    // populate $classes_array based on $classes_to_add
    $value = isset( $classes_to_add[ $context ] ) ? $classes_to_add[ $context ] : array();

    if ( is_array( $value ) ) {

        $classes_array = $value;
    } else {

        $classes_array = explode( ' ', (string) $value );
    }

    // apply any filters to modify the class
    $classes_array = apply_filters( 'ldm-add-class', $classes_array, $context, $attr );

    $classes_array = array_map( 'sanitize_html_class', $classes_array );

    // append the class(es) string (e.g. 'span9 custom-class1 custom-class2')
    $attr['class'] .= ' ' . implode( ' ', $classes_array );

    return $attr;
}
