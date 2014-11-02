<?php

// search-form same behavior as genesis with additional classes
// for bootstrap styling

add_filter( 'genesis_search_form', 'bsg_search_form', 10, 4);

function bsg_search_form( $form, $search_text, $button_text, $label ) {
	$site_url = get_site_url();
    $form = '<form method="get" class="search-form" action="'. $site_url . '" role="search"><input type="search" class="search-query" name="s" placeholder="Enter Part Number of Keywords">';
    	$form .= '<span class="omni-button">';
    		$form .= '<input type="submit" value="Search">';
    	$form .= '</span>';
    $form .= '</form>';

    return $form;
}
