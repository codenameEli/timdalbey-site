<?php

add_action( 'genesis_setup', 'ldm_remove_genesis_layouts' );

function ldm_remove_genesis_layouts() {

    genesis_unregister_layout( 'content-sidebar' );
}