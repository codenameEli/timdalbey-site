<?php

// add_action( 'init', 'ldm_register_social_menu' );
function ldm_register_social_menu(){
    register_nav_menu( 'social_menu' ,__( 'Social Media Menu' ));
}

function ldm_social_menu(){

	$defaults = array(
		'theme_location' => 'social_menu',
		'menu_class'	 => 'social-menu',
		'echo'			 => false,
	);

    return wp_nav_menu( $defaults );
}