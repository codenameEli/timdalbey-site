<?php

add_action( 'init', 'ldm_register_utility_menu' );
function ldm_register_utility_menu(){

    register_nav_menu( 'utility_menu' ,__( 'Utiliy Menu' ));
}

function ldm_utility_menu(){

	$defaults = array(
		'theme_location' => 'utility_menu',
		'menu_class'	 => 'utility-menu',
		'echo'			 => false,
	);

    return wp_nav_menu( $defaults );
}