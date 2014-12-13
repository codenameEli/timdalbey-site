<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */
function ldm_widget_areas_init() {

    genesis_register_sidebar(
        array(
            'name' => 'Homepage Widget Area',
            'id' => 'homepage_widget_area',
        )
    );

    genesis_register_sidebar(
        array(
            'name' => 'Backpage Widget Area',
            'id' => 'backpage_widget_area',
        )
    );
}

add_action( 'widgets_init', 'ldm_widget_areas_init' );
