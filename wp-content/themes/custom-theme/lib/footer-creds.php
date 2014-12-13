<?php

add_filter( 'genesis_footer_creds_text', 'ldm_footer_creds', 10, 1 );
function ldm_footer_creds( $creds ){

    return '&#169; ' . date('Y') . ' Charity Directors | Website Design by <a title="Launch Dynamic Media" href="http://launchdm.com">LaunchDM</a>';
}