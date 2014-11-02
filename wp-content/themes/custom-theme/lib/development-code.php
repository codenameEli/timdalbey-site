<?php

if ( defined( 'FE_DEBUG' ) && FE_DEBUG ) {
    add_action('genesis_after', 'ldm_load_live_reload'); // loads Live Reload code
    add_action('genesis_after', 'ldm_overlay'); //Loads the Overlay
}
function ldm_load_live_reload() {
    // http://feedback.livereload.com/knowledgebase/articles/86180-how-do-i-add-the-script-tag-manually-
    ?>
    <!-- in functions/ldm_comp_overlay.php -->
    <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
    <?php
}

function ldm_overlay() {
    ?>
        <!-- in functions/ldm_comp_overlay.php -->
        <!-- BEGIN: overlay: remove for production -->
        <script type="text/javascript" src="http://clients.launchdm.com/reference/ldmoverlay/jquery.ldmoverlay.0.0.2.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery('header.site-header').ldmoverlay('<?php echo get_stylesheet_directory_uri(); ?>/comps/search-results.jpg', {'top':'-175px', 'left':'50%', 'margin-left':'-700px'}); // races-main
            });
        </script>
        <!-- END: overlay: remove for production -->
    <?php
};

