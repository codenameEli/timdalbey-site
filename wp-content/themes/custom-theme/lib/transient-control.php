<?php

function ldm_transient($transient_name='', $query_args='') {
	global $post;
	$the_transient = get_transient( $transient_name );

	if ( false === $the_transient )  {
		$custom_query = new WP_Query( $query_args );
		set_transient( $transient_name, $custom_query, 12 * HOUR_IN_SECONDS );
		$the_transient = get_transient( $transient_name );
	}

	return $the_transient;
}

// TRANSIENT DELETE
// Slideshow
add_action( 'edit_post', 'ldm_hero_slideshow_clear_transient' );
function ldm_hero_slideshow_clear_transient( $post_id ) {
	if ( 'hero_slideshow' !== get_post_type( $post_id ) ) {return;}
	delete_transient( 'hero-slideshow' );
}
// Events
// add_action( 'edit_post', 'grcvb_tribe_events_clear_transient' );
// function grcvb_tribe_events_clear_transient( $post_id ) {
// 	if ( 'tribe_events' !== get_post_type( $post_id ) ) {return;}
// 	delete_transient( 'featured-events' );
// }
// // Venues
// add_action( 'edit_post', 'grcvb_tribe_venue_clear_transient' );
// function grcvb_tribe_venue_clear_transient( $post_id ) {
// 	if ( 'tribe_venue' !== get_post_type( $post_id ) ) {return;}
// 	delete_transient( 'all-events-and-venues' );
// }
// // Ads
// add_action( 'edit_post', 'grcvb_ldm_ads_clear_transient' );
// function grcvb_ldm_ads_clear_transient( $post_id ) {
// 	if ( 'ldm_ads' !== get_post_type( $post_id ) ) {return;}
// 	delete_transient( 'sidebar-ads' );
// 	delete_transient( 'global-banner-ads' );
// 	delete_transient( 'footer-ads' );
// }
