<?php

add_action( 'genesis_footer', 'ldm_display_social_menu', 15 );

function ldm_display_social_menu() {

	 	$args = array(
	 		'theme_location' => 'social_menu',
	 		// 'menu' => '',
	 		// 'container' => 'div',
	 		// 'container_class' => 'menu-{menu-slug}-container',
	 		// 'container_id' => '',
	 		// 'menu_class' => 'menu',
	 		// 'menu_id' => '',
	 		// 'echo' => true,
	 		// 'fallback_cb' => 'wp_page_menu',
	 		// 'before' => '',
	 		// 'after' => '',
	 		// 'link_before' => '',
	 		// 'link_after' => '',
	 		// 'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
	 		// 'depth' => 0,
	 		// 'walker' => ''
	 	);

	 	wp_nav_menu($args);
}