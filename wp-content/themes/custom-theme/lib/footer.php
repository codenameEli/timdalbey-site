<?php
add_action( 'init', 'ldm_register_footer_menus' );
add_action( 'genesis_footer', 'ldm_display_footer' );
add_filter('genesis_footer_creds_text', 'ldm_footer_creds_text');

function ldm_register_footer_menus() {

	register_nav_menus(array(
		'footer-menu-1' => 'Footer Menu 1',
		'footer-menu-2' => 'Footer Menu 2',
		'footer-menu-3' => 'Footer Menu 3',
		'footer-menu-4' => 'Footer Menu 4',
	));
}

function ldm_display_footer() {

	$output = '<div class="footer-menu-container row">';
		$output .= ldm_get_footer_menu( '1' );
		$output .= ldm_get_footer_menu( '2' );
		$output .= ldm_get_footer_menu( '3' );
		$output .= ldm_get_footer_menu( '4' );
	$output .= '</div>';

	$output .= '<div class="social-media-icons-container row">';
		// $output .= ldm_get_social_media_menu();
		$output .= '<div class="menu-container span12">';
			$output .= '<ul class="menu fa-ul clearfix">';
				$output .= '<li class="youtube menu-item">';
					$output .= '<a href="https://www.youtube.com/channel/UCcV0O08rjiYKEyKtusAzhjQ" target="_blank">';
						$output .= '<i class="ldmfa-icon"></i>';
					$output .= '</a>';
				$output .= '</li>';

				$output .= '<li class="twitter menu-item">';
					$output .= '<a href="https://twitter.com/Omni_Cable" target="_blank">';
						$output .= '<i class="ldmfa-icon"></i>';
					$output .= '</a>';
				$output .= '</li>';

				$output .= '<li class="linkedin menu-item">';
					$output .= '<a href="https://www.linkedin.com/company/69890?trk=tyah&trkInfo=tarId%3A1411584134196%2Ctas%3Aomni-cable%2Cidx%3A2-1-2" target="_blank">';
						$output .= '<i class="ldmfa-icon"></i>';
					$output .= '</a>';
				$output .= '</li>';
			$output .= '</ul>';
		$output .= '</div>';
	$output .= '</div>';

	echo $output;
}

function ldm_get_footer_menu( $number ) {

	$args = array(
		'theme_location' => "footer-menu-$number",
		'menu' => '',
		'container' => 'div',
		'container_class' => "menu-container-$number span3",
		'container_id' => '',
		'menu_class' => 'menu',
		'menu_id' => '',
		'echo' => false,
		'fallback_cb' => 'wp_page_menu',
		'before' => '',
		'after' => '',
		'link_before' => '',
		'link_after' => '',
		'items_wrap' => '<ul id = "%1$s" class = "%2$s clearfix">%3$s</ul>',
		'depth' => 0,
		'walker' => ''
	);

	return wp_nav_menu( $args );
}

function ldm_get_social_media_menu() {

	$args = array(
		'theme_location' => '',
		'menu' => "social-media",
		'container' => 'div',
		'container_class' => "menu-container span12",
		'container_id' => '',
		'menu_class' => 'menu',
		'menu_id' => '',
		'echo' => false,
		'fallback_cb' => 'wp_page_menu',
		'before' => '',
		'after' => '',
		'link_before' => '<i class="ldmfa-icon"></i>',
		'link_after' => '',
		'items_wrap' => '<ul id = "%1$s" class = "%2$s fa-ul clearfix">%3$s</ul>',
		'depth' => 0,
		'walker' => ''
	);

	return wp_nav_menu($args);
}

function ldm_footer_creds_text($creds) {
	$creds = '<span class="footer-creds">[footer_copyright] ' . get_bloginfo('name') . ' | Website Design by: <a href="//launchdm.com/web-design-philadelphia.html" target="_blank">LaunchDM</a></span>';
	return $creds;
}