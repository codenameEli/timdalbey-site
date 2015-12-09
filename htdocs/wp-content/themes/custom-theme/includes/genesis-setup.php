<?php
// Priority 15 ensures it runs after Genesis itself has setup.
add_action( 'genesis_setup', 'ldm_genesis_setup', 15 );
function ldm_genesis_setup() {

    // http://my.studiopress.com/snippets/html5/
    // Add HTML5 markup structure
    add_theme_support( 'html5' );

    // remove admin seo metabox from posts / pages
    remove_action( 'admin_menu', 'genesis_add_inpost_seo_box' );

    // remove admin scripts metabox from posts / pages
    remove_action( 'admin_menu', 'genesis_add_inpost_scripts_box' );

    // remove seo settings menu from admin menu
    remove_theme_support( 'genesis-seo-settings-menu' );

    // remove site description in header
    remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

    // remove secondary menu area
    add_theme_support( 'genesis-menus', array( 'primary' => __( 'Primary Navigation Menu', 'genesis' ) ) );

    // remove header sidebar
    unregister_sidebar( 'header-right' );
}