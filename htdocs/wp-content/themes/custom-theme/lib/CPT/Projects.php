<?php

namespace Dalbey\CPT;

class Projects {

	private static $instance = null;
	private $prefix = '_ce_';
	private $post_type_name = 'projects';

	private function __construct() {

		$this->add_actions();
	}

	public static function instance() {

		if ( self::$instance === null ){

			self::$instance = new Projects();
		}

		return self::$instance;
	}

	public function add_actions() {

		add_action( 'init', array( $this, 'register_cpt' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		add_action( 'cmb2_init', array( $this, 'add_metaboxes' ) );
	}

	public function add_metaboxes() {

		$prefix = $this->prefix;

		$this->create_metaboxes( $prefix );
	}

	private function create_metaboxes( $prefix ) {

		$cmb = new_cmb2_box( array(
		    'id' => $prefix . 'project_meta',
		    'title' => __( 'Project meta', 'project_meta' ),
		    'object_types' => array( $this->post_type_name ),
		    'priority' => 'high',
		    'show_names' => true
		));

		$cmb->add_field( array(
		    'name' => 'Date Picker (UNIX timestamp)',
		    'id'   => $prefix . 'timestamp',
		    'type' => 'text_date_timestamp',
		    // 'timezone_meta_key' => 'wiki_test_timezone',
		    // 'date_format' => 'l jS \of F Y',
		) );

		$cmb->add_field( array(
		    'name' => __( 'Project URL', 'cmb' ),
		    'id'   => $prefix . 'project_url',
		    'type' => 'text_url',
		    // 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
		) );

		$cmb->add_field( array(
		    'name' => __( 'Repo URL', 'cmb' ),
		    'id'   => $prefix . 'repo_url',
		    'type' => 'text_url',
		    // 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
		) );

		$cmb->add_field( array(
		    'name' => __( 'Gallery', 'cmb' ),
		    'desc' => '',
		    'id' => $prefix . 'file_list',
		    'type' => 'file_list',
		    // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
		) );
	}

	public function register_company_taxonomy() {

		$labels = array(
			'name'                       => _x( 'Company', 'Taxonomy General Name', 'ce_eli' ),
			'singular_name'              => _x( 'Company', 'Taxonomy Singular Name', 'ce_eli' ),
			'menu_name'                  => __( 'Company', 'ce_eli' ),
			'all_items'                  => __( 'All Companies', 'ce_eli' ),
			'parent_item'                => __( 'Parent Company', 'ce_eli' ),
			'parent_item_colon'          => __( 'Parent Company:', 'ce_eli' ),
			'new_item_name'              => __( 'New Company', 'ce_eli' ),
			'add_new_item'               => __( 'Add Company', 'ce_eli' ),
			'edit_item'                  => __( 'Edit Company', 'ce_eli' ),
			'update_item'                => __( 'Update Company', 'ce_eli' ),
			'separate_items_with_commas' => __( 'Separate company with commas', 'ce_eli' ),
			'search_items'               => __( 'Search Companies', 'ce_eli' ),
			'add_or_remove_items'        => __( 'Add or remove company', 'ce_eli' ),
			'choose_from_most_used'      => __( 'Choose from the most used company', 'ce_eli' ),
			'not_found'                  => __( 'Not Found', 'ce_eli' ),
		);

		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);

		register_taxonomy( 'company', array( $this->post_type_name ), $args );
	}

	public function register_type_taxonomy() {

		$labels = array(
			'name'                       => _x( 'Type', 'Taxonomy General Name', 'ce_eli' ),
			'singular_name'              => _x( 'Type', 'Taxonomy Singular Name', 'ce_eli' ),
			'menu_name'                  => __( 'Type', 'ce_eli' ),
			'all_items'                  => __( 'All Types', 'ce_eli' ),
			'parent_item'                => __( 'Parent Type', 'ce_eli' ),
			'parent_item_colon'          => __( 'Parent Type:', 'ce_eli' ),
			'new_item_name'              => __( 'New Type', 'ce_eli' ),
			'add_new_item'               => __( 'Add Type', 'ce_eli' ),
			'edit_item'                  => __( 'Edit Type', 'ce_eli' ),
			'update_item'                => __( 'Update Type', 'ce_eli' ),
			'separate_items_with_commas' => __( 'Separate type with commas', 'ce_eli' ),
			'search_items'               => __( 'Search Types', 'ce_eli' ),
			'add_or_remove_items'        => __( 'Add or remove type', 'ce_eli' ),
			'choose_from_most_used'      => __( 'Choose from the most used type', 'ce_eli' ),
			'not_found'                  => __( 'Not Found', 'ce_eli' ),
		);

		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);

		register_taxonomy( 'type', array( $this->post_type_name ), $args );
	}

	public function register_role_taxonomy() {

		$labels = array(
		    'name'                       => _x( 'Role', 'Taxonomy General Name', 'ce_eli' ),
		    'singular_name'              => _x( 'Role', 'Taxonomy Singular Name', 'ce_eli' ),
		    'menu_name'                  => __( 'Role', 'ce_eli' ),
		    'all_items'                  => __( 'All Roles', 'ce_eli' ),
		    'parent_item'                => __( 'Parent Role', 'ce_eli' ),
		    'parent_item_colon'          => __( 'Parent Role:', 'ce_eli' ),
		    'new_item_name'              => __( 'New Role', 'ce_eli' ),
		    'add_new_item'               => __( 'Add Role', 'ce_eli' ),
		    'edit_item'                  => __( 'Edit Role', 'ce_eli' ),
		    'update_item'                => __( 'Update Role', 'ce_eli' ),
		    'separate_items_with_commas' => __( 'Separate role with commas', 'ce_eli' ),
		    'search_items'               => __( 'Search Roles', 'ce_eli' ),
		    'add_or_remove_items'        => __( 'Add or remove role', 'ce_eli' ),
		    'choose_from_most_used'      => __( 'Choose from the most used role', 'ce_eli' ),
		    'not_found'                  => __( 'Not Found', 'ce_eli' ),
		);
		$args = array(
		    'labels'                     => $labels,
		    'hierarchical'               => true,
		    'public'                     => true,
		    'show_ui'                    => true,
		    'show_admin_column'          => true,
		    'show_in_nav_menus'          => true,
		    'show_tagcloud'              => true,
		);
		register_taxonomy( 'role', array( $this->post_type_name ), $args );
	}

	public function register_skills_taxonomy() {

		$labels = array(
			'name'                       => _x( 'Skills', 'Taxonomy General Name', 'ce_eli' ),
			'singular_name'              => _x( 'Skill', 'Taxonomy Singular Name', 'ce_eli' ),
			'menu_name'                  => __( 'Skills', 'ce_eli' ),
			'all_items'                  => __( 'All Skills', 'ce_eli' ),
			'parent_item'                => __( 'Parent Skill', 'ce_eli' ),
			'parent_item_colon'          => __( 'Parent Skill:', 'ce_eli' ),
			'new_item_name'              => __( 'New Skill', 'ce_eli' ),
			'add_new_item'               => __( 'Add Skill', 'ce_eli' ),
			'edit_item'                  => __( 'Edit Skills', 'ce_eli' ),
			'update_item'                => __( 'Update Skill', 'ce_eli' ),
			'separate_items_with_commas' => __( 'Separate skills with commas', 'ce_eli' ),
			'search_items'               => __( 'Search Skills', 'ce_eli' ),
			'add_or_remove_items'        => __( 'Add or remove skills', 'ce_eli' ),
			'choose_from_most_used'      => __( 'Choose from the most used skills', 'ce_eli' ),
			'not_found'                  => __( 'Not Found', 'ce_eli' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);

		register_taxonomy( 'skills', array( $this->post_type_name ), $args );
	}

	public function register_taxonomies() {

		$this->register_company_taxonomy();
		$this->register_role_taxonomy();
		$this->register_skills_taxonomy();
		$this->register_type_taxonomy();
	}

	public function register_cpt() {

		$labels = array(
			'name'                => __( 'Projects', $this->prefix ),
			'singular_name'       => __( 'Project', $this->prefix ),
			'all_items'           => __( 'Projects', $this->prefix ),
			'new_item'            => __( 'New Project', $this->prefix ),
			'add_new'             => __( 'Add New Project', $this->prefix ),
			'add_new_item'        => __( 'Add New Project', $this->prefix ),
			'edit_item'           => __( 'Edit Project', $this->prefix ),
			'view_item'           => __( 'View Project', $this->prefix ),
			'search_items'        => __( 'Search Projects', $this->prefix ),
			'not_found'           => __( 'No projects found', $this->prefix ),
			'not_found_in_trash'  => __( 'No projects found in trash', $this->prefix ),
			'parent_item_colon'   => __( 'Parent project', $this->prefix ),
			'menu_name'           => __( 'Projects', $this->prefix ),
		);

		$args = array(
			'label'                 => __( 'Post Type', 'text_domain' ),
			'description'           => __( 'Post Type Description', 'text_domain' ),
			'labels'                => $labels,
			'supports'          => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
			'taxonomies'            => array(),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);

		register_post_type( 'projects', $args );
	}
}

Projects::instance();