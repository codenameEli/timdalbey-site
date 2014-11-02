<?php
// Remove action was not removing post meta for some reason
// Filter and return blank
add_filter( 'genesis_post_info', 'ldm_post_info_filter' );

function ldm_post_info_filter($post_info) {
	if ( !is_page() ) {
		$post_info = '';
		return $post_info;
	}
}