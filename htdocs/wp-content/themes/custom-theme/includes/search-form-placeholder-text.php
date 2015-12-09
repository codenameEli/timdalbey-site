<?php

// Customize search form input box text
// http://my.studiopress.com/snippets/search-form/
add_filter( 'genesis_search_text', 'ldm_change_search_placeholder' );
function ldm_change_search_placeholder( $text ) {

	return esc_attr( 'Search' );
}