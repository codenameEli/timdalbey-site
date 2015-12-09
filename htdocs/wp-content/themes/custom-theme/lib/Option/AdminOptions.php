<?php

namespace LaunchPad\Option;

abstract class AdminOptions {

    protected $key;
    protected $title;
    protected $metabox_id;
    protected $options_page;

    public function __construct( $key, $title ){

    	$this->key = $key;
        $this->title = $title;

        $this->metabox_id = $key . '_metabox';

        $this->setup_hooks();
    }

    public static function get_option( $key, $option ){

        return cmb2_get_option( $key, $option );
    }

    public function on_admin_init(){

        register_setting( $this->key, $this->key );
    }

    public function on_admin_menu(){

        $this->add_page();
    }

    public function render_page(){

        ?>
	        <div class="wrap cmb_options_page <?php echo $this->key; ?>">
	            <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
	            <?php cmb2_metabox_form( $this->metabox_id, $this->key, array( 'cmb_styles' => false ) ); ?>
	        </div>
    	<?php
    }

    public abstract function metabox();

    private function add_page(){

        $this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'render_page' ) );

        add_action( "admin_print_styles-{$this->options_page}", array( 'CMB2_hookup', 'enqueue_cmb_css' ) );
    }

    private function setup_hooks(){

        add_action( 'admin_init', array( $this, 'on_admin_init' ) );
        add_action( 'admin_menu', array( $this, 'on_admin_menu' ) );
        add_action( 'cmb2_init', array( $this, 'metabox' ) );
    }
}