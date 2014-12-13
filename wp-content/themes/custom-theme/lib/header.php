<?php
// The logo is set by default through Sal's code
add_action( 'genesis_header_right', 'ldm_display_header_search' );

function ldm_display_header_search() {

    $output = '<div class="ldm-utility-menu">';
    	$output .= ldm_social_menu();
    	$output .= genesis_search_form();
        // $output .= '<li class="ubermenu-item ubermenu-item-type-custom ubermenu-item-object-custom ubermenu-item-33 ubermenu-item-level-0 ubermenu-column ubermenu-column-auto">';
        //     $output .= '<a class="ubermenu-target ubermenu-target-with-icon ubermenu-item-layout-default ubermenu-item-layout-icon_left ubermenu-item-notext" href="#" tabindex="0">';
        //         $output .= '<i class="ubermenu-icon fa fa-search"></i>';
        //     $output .= '</a>';
        // $output .= '</li>';
    $output .= '</div>';

	echo $output;
}