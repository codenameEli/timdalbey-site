<?php

add_action( 'genesis_before_content', 'ldm_display_homepage_widget_area' );
function ldm_display_homepage_widget_area(){

	if( !is_front_page() ){

		return;
	}

    if( is_active_sidebar( 'homepage_widget_area') ){

        dynamic_sidebar( 'homepage_widget_area' );
    }
}

add_action( 'genesis_after_content_sidebar_wrap', 'ldm_display_backpage_widget_area' );
function ldm_display_backpage_widget_area(){

    if( is_front_page() ){

        return;
    }

    if( is_active_sidebar( 'backpage_widget_area') ){

        dynamic_sidebar( 'backpage_widget_area' );
    }
}