<?php

// Priority 15 ensures it runs after Genesis itself has setup.
add_action( 'genesis_setup', 'ldm_display_primary_nav', 15 );

function ldm_display_primary_nav() {

	remove_action( 'genesis_after_header', 'genesis_do_nav' );
	// add_action( 'genesis_header', 'genesis_do_nav' );

	add_action( 'genesis_header', 'genesis_do_nav', 10 );
	add_filter( 'genesis_do_nav', 'ldm_modify_primary_nav', 10, 3 );

	function ldm_modify_primary_nav($nav_output, $nav, $args) {

		ob_start();?>
			<nav class="nav-primary" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
				<?php echo $nav; ?>
			</nav>
		<?php return ob_get_clean();
	}
}