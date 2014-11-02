<?php
/*
Plugin Name: Omni Cable Site Plugin Functionality
Plugin URI:
Description: Includes the custom functionality for this site
Author: LaunchDM
Version: 1.0
Author URI: http://launchdm.com
*/
/**
 * Include all php files in the /includes directory
 *
 * https://gist.github.com/theandystratton/5924570
 */
foreach ( glob( dirname( __FILE__ ) . '/includes/*.php' ) as $file ) { include $file; }
