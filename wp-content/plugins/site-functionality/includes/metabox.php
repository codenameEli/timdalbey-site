<?php

add_action('init', 'ldm_add_custom_meta_boxes');

function ldm_add_custom_meta_boxes() {
    if ( ! class_exists( 'cmb_Meta_Box' ) ) {
        require_once 'metabox/init.php';
    }
}

//require_once 'metabox/example-functions.php';
