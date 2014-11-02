<?php

add_filter( 'cmb_meta_boxes', 'ldm_cpt_home_banner_metaboxes', 10, 1 );
function ldm_cpt_home_banner_metaboxes( array $metaboxes ){

    $prefix = 'ldm_';

    $metaboxes[$prefix . 'home_banner'] = array(
        'id' => $prefix . 'home_metabox',
        'title' => __( 'Home Banner Options', 'ldm' ),
        'pages' => array( 'home_banner' ), 
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, 
        'fields' => array(
            array(
                'name' => __( 'Banner URL', 'ldm' ),
                'id'   => $prefix . 'home_banner_url',
                'type' => 'text_url',
                'protocols' => array( 'http', 'https' )
            )
        )
    );

    return $metaboxes;
}