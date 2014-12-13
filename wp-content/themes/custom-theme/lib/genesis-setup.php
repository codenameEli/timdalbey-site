<?php

// Priority 15 ensures it runs after Genesis itself has setup.
add_action( 'genesis_setup', 'bsg_genesis_setup', 15 );

function bsg_genesis_setup() {

    // http://my.studiopress.com/snippets/html5/
    // Add HTML5 markup structure
    add_theme_support( 'html5' );

    // Remove item(s) from genesis admin screens
    add_action( 'genesis_admin_before_metaboxes', 'bsg_remove_genesis_theme_metaboxes' );

    // remove admin seo metabox from posts / pages
    remove_action( 'admin_menu', 'genesis_add_inpost_seo_box' );

    // remove admin scripts metabox from posts / pages
    remove_action( 'admin_menu', 'genesis_add_inpost_scripts_box' );

    // remove seo settings menu from admin menu
    remove_theme_support( 'genesis-seo-settings-menu' );

    // remove site description in header
    remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

    // remove post meta from front end
    remove_action( 'genesis_entry_footer', 'genesis_post_meta', 10 );
    remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

    // remove secondary menu area
    add_theme_support( 'genesis-menus', array( 'primary' => __( 'Primary Navigation Menu', 'genesis' ) ) );

    // remove secondary sidebar
    unregister_sidebar( 'sidebar-alt' );
    unregister_sidebar( 'header-right' );

    // remove default site title
	remove_action( 'genesis_site_title', 'genesis_seo_site_title' );

	// add custom logo site title
	add_action( 'genesis_site_title', 'ldm_logo_site_title');
}

/**
 * Remove selected Genesis metaboxes from the Theme Settings and SEO Settings pages.
 *
 * @param string $hook The unique pagehook for the Genesis settings page
 */

function bsg_remove_genesis_theme_metaboxes( $hook ) {

    /** Theme Settings metaboxes */
    //remove_meta_box( 'genesis-theme-settings-version',  $hook, 'main' );
    remove_meta_box( 'genesis-theme-settings-feeds',    $hook, 'main' );
    //remove_meta_box( 'genesis-theme-settings-layout',   $hook, 'main' );
    remove_meta_box( 'genesis-theme-settings-header',   $hook, 'main' );
    //remove_meta_box( 'genesis-theme-settings-nav',      $hook, 'main' );
    remove_meta_box( 'genesis-theme-settings-breadcrumb', $hook, 'main' );
    remove_meta_box( 'genesis-theme-settings-comments', $hook, 'main' );
    remove_meta_box( 'genesis-theme-settings-posts',    $hook, 'main' );
    remove_meta_box( 'genesis-theme-settings-blogpage', $hook, 'main' );
    remove_meta_box( 'genesis-theme-settings-scripts',  $hook, 'main' );

    /** SEO Settings metaboxes */
    remove_meta_box( 'genesis-seo-settings-doctitle',   $hook, 'main' );
    remove_meta_box( 'genesis-seo-settings-homepage',   $hook, 'main' );
    remove_meta_box( 'genesis-seo-settings-dochead',    $hook, 'main' );
    remove_meta_box( 'genesis-seo-settings-robots',     $hook, 'main' );
   	remove_meta_box( 'genesis-seo-settings-archives',   $hook, 'main' );
}

function ldm_logo_site_title(){

	?>
		<a title="<?php echo get_bloginfo( 'name' ); ?>" href="<?php echo site_url(); ?>" class="site-title-logo"><?php echo get_bloginfo( 'name' ); ?></a>
	<?php
}