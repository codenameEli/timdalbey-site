<?php

// Priority 15 ensures it runs after Genesis itself has setup.
add_action( 'genesis_setup', 'ldm_remove_default_stylesheet', 15 );
add_action( 'wp_enqueue_scripts', 'ldm_register_css_js' );

function ldm_remove_default_stylesheet() {

    // replace style.css - Theme Information (no css)
    // with css/style.min.css -  Compressed CSS for Theme
    remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
}

function ldm_register_css_js() {

    $version = wp_get_theme()->Version;

    // register styles
    $src = LAUNCHPAD_STYLES_URL . '/styles.min.css';
    wp_register_style( 'ldm-custom-theme-styles', $src, array(), $version, false );

    // Google Fonts
    $src = 'https://fonts.googleapis.com/css?family=Roboto:400,300italic,300|Roboto+Condensed:400,700';
    wp_register_style( 'ce-google-font', $src, array(), $version, false );

    // register scripts
    $src = LAUNCHPAD_SCRIPTS_URL . '/javascript.min.js';
    wp_register_script( 'ldm-custom-theme-scripts', $src, array( 'jquery', 'angular', 'underscore' ), $version, true );

    // actually enqueue the styles and scripts
    wp_enqueue_style( 'ce-google-font' );
    wp_enqueue_style( 'ldm-custom-theme-styles' );
    ce_load_angular();
    wp_enqueue_script( 'ldm-custom-theme-scripts' );
}

function ce_load_angular() {

    $version = '1.0.0';
    $base = get_stylesheet_directory_uri() . '/components';

    wp_register_script( 'angular', $base . '/angular/angular.min.js', array(), $version, true );

    wp_enqueue_script( 'angular' );
    wp_enqueue_style( 'angular' );
}