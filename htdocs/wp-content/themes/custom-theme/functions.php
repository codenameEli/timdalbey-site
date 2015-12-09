<?php
// theme constants
define( 'LAUNCHPAD_DIRECTORY_URI', get_stylesheet_directory_uri() );
define( 'LAUNCHPAD_DIRECTORY_DIR', get_stylesheet_directory() );

define( 'LAUNCHPAD_STYLES_URL', LAUNCHPAD_DIRECTORY_URI . '/resources/css' );
define( 'LAUNCHPAD_SCRIPTS_URL', LAUNCHPAD_DIRECTORY_URI . '/resources/js' );
define( 'LAUNCHPAD_IMAGE_URL', LAUNCHPAD_DIRECTORY_URI . '/resources/images' );

define( 'LAUNCHPAD_VENDOR_DIR', LAUNCHPAD_DIRECTORY_DIR . '/vendor' );

// composer autoload
require_once( LAUNCHPAD_VENDOR_DIR . '/autoload.php' );

// cmb2
require_once( LAUNCHPAD_VENDOR_DIR . '/webdevstudios/cmb2/init.php' );

/**
 * Include all php files in the /includes directory
 *
 * https://gist.github.com/theandystratton/5924570
 */
foreach ( glob( dirname( __FILE__ ) . '/includes/*.php' ) as $file ) { include $file; }
foreach ( glob( dirname( __FILE__ ) . '/lib/CPT/*.php' ) as $file ) { include $file; }