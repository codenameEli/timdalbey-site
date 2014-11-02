<?php

/**
 * Plugin Name: LaunchDM Home Banners
 * Description: Homepage image slider.
 * Version: 1.0
 * Author: LaunchDM
 * Author URI: http://www.launchdm.com
 */

if( ! class_exists( 'LDM_Home_Banners' ) ){

    class LDM_Home_Banners {

        private static $instance = null;

        private $banner_ids = array();

        private function __construct(){

            $this->init_includes();

            $this->init_actions();
            $this->init_filters();

            $this->define_image_sizes();
        }

        public static function instance(){

            if( self::$instance === null ){

                self::$instance = new LDM_Home_Banners();
            }

            return self::$instance;
        }

        public static function get_plugin_url(){

            return plugins_url( 'ldm-home-banners' );
        }

        public static function get_scripts_url(){

            return self::get_plugin_url() . '/js/';
        }

        public static function get_css_url(){

            return self::get_plugin_url() . '/css/';
        }

        public function home_banner_columns( $columns ){

            return array_merge( $columns, array( 'featured_image' => __( "Banner Image", 'ldm' ) ) );
        }

        public function home_banner_columns_content( $column, $post_id ){

            if( $column == 'featured_image' ){

            	if( has_post_thumbnail( $post_id ) ){

            		echo get_the_post_thumbnail( $post_id, 'ldm-home-banner-preview' );
            	}
            }
        }

        public function on_enqueue_scripts(){

            $this->register_css();
            $this->register_scripts();
        }

        public function add_custom_meta_boxes_and_fields(){

        	if ( ! class_exists( 'cmb_Meta_Box' ) ) {

        		require_once ('includes/cmb/init.php');
    		}
        }

        public function the_home_banners(){

            $this->fetch_banner_ids();

            $banner_ids = $this->banner_ids;

            error_log(print_r($banner_ids, true));

            echo '<div id="ldm-home-banners-wrapper" class="ldm-home-banners-wrapper">';

            foreach( $banner_ids as $banner_id ){

            	echo $this->get_home_banner( $banner_id );
            }

            echo '</div>';

            wp_enqueue_style( 'ldm-home-banner-css' );
            wp_enqueue_script( 'ldm-home-banner-js' );

            echo $this->get_slick_slide_setup();
        }

        private function get_slick_slide_setup(){

        	ob_start();

        	?>
        		<script type="text/javascript">
        			jQuery( document ).ready( function( $ ) {

        				$('#ldm-home-banners-wrapper').slick({
        					responsive: true,
        					dots: true,
        					arrows: false
        				});
        			});
        		</script>
        	<?php

        	return ob_get_clean();
        }

        private function get_home_banner( $banner_id ){

        	$banner = "";
        	$banner_url = get_post_meta( $banner_id, 'ldm_home_banner_url', true );

        	if( ! has_post_thumbnail( $banner_id ) ){

        		return $banner;
        	}

        	if( $banner_url ){

	        	ob_start();

	        	?>
	        	    <div class="ldm-home-banner">
	        	    	<a title="<?php echo get_the_title( $banner_id ); ?>" href="<?php echo $banner_url; ?>">
	                    	<?php echo get_the_post_thumbnail( $banner_id, 'ldm-home-banner-size' );?>
	                    </a>
	                </div>
	        	<?php

	        	$banner = ob_get_clean();
        	}
        	else {

        		ob_start();

	        	?>
	        	    <div class="ldm-home-banner">
	                    <?php echo get_the_post_thumbnail( $banner_id, 'ldm-home-banner-size' );?>
	                </div>
	        	<?php

	        	$banner = ob_get_clean();
        	}

        	return $banner;
        }

        private function fetch_banner_ids(){

            if( $this->banners_in_cache() ){

                $this->update_banner_ids( $this->from_cache() );
            }
            else {

                $this->update_banner_ids( $this->from_database() );

                $this->cache();
            }
        }

        private function update_banner_ids( $banner_ids ){

            $this->banner_ids = $banner_ids;
        }

        private function from_cache(){

            return get_transient( 'ldm_home_banners' );
        }

        private function from_database(){

            $args = array(
                'post_type' => 'home_banner',
                'post_status' => 'publish',
                'order_by' => 'menu_order',
                'posts_per_page' => -1,
                'fields' => 'ids'
            );

            return get_posts( $args );
        }

        private function banners_in_cache(){

            return false !== get_transient( 'ldm_home_banners' );
        }

        private function cache(){

            $banner_ids = $this->banner_ids;

            set_transient( 'ldm_home_banners', $banner_ids, ( 24 * HOUR_IN_SECONDS ) );
        }

        private function register_css(){

            $src = self::get_css_url() . 'slick.css';

            wp_register_style( 'ldm-home-banner-css', $src );
        }

        private function register_scripts(){

            $src = self::get_scripts_url() . 'jquery-slick/slick.min.js';

            wp_register_script( 'ldm-home-banner-js', $src, array(), '1.0', true );
        }

        private function define_image_sizes(){

        	add_image_size( 'ldm-home-banner-size', 1134, 420, false );
        	add_image_size( 'ldm-home-banner-preview', 400, 0, false );
        }

        private function init_includes(){

            foreach ( glob( dirname( __FILE__ ) . '/includes/*.php' ) as $file ) { include $file; }
        }

        private function init_actions(){

        	add_action( 'init', array( $this, 'add_custom_meta_boxes_and_fields' ) );
            add_action( 'wp_enqueue_scripts', array( $this, 'on_enqueue_scripts' ) );
            add_action( 'manage_posts_custom_column' , array( $this, 'home_banner_columns_content' ), 10, 2 );
        }

        private function init_filters(){

            add_filter( 'manage_home_banner_posts_columns' , array( $this, 'home_banner_columns' ) );
        }
    }
}

LDM_Home_Banners::instance();