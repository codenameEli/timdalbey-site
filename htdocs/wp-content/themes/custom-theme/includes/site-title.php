<?php

add_action( 'genesis_setup', 'ldm_on_setup_site_title', 15 );
function ldm_on_setup_site_title(){

    // remove default site title
	remove_action( 'genesis_site_title', 'genesis_seo_site_title' );

	// add custom logo site title
	add_action( 'genesis_site_title', 'ldm_logo_site_title');
}

function ldm_logo_site_title(){

	?>
		<a title="<?php echo get_bloginfo( 'name' ); ?>" href="<?php echo site_url(); ?>" class="site-title-logo"><?php echo get_bloginfo( 'name' ); ?></a>
	<?php
}