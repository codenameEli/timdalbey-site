<?php
add_filter( 'excerpt_more', 'ldm_excerpt_more' );

function ldm_excerpt_more( $more ) {
	return '...';
}