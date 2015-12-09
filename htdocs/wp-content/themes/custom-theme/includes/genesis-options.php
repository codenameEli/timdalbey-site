<?php

add_filter( 'genesis_options', 'ldm_define_genesis_options', 10, 2 );
function ldm_define_genesis_options( $options, $setting ){

    return $options;
}