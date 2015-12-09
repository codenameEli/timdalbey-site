<?php

namespace LaunchPad\Utils;

class Search {

    private $search_string; // String
    private $ajax_handler;

    public function __construct() {

        $this->ajax_handler = new AjaxHandler( 'search' );
        $this->ajax_handler->add_listener( 'search_fetch_results', array( $this, 'fetch_results' ) );
    }

    public function fetch_results() {

        $search_string = isset( $_REQUEST['search_string'] ) ? $_REQUEST['search_string'] : false;

        if ( $search_string ) {

            $data = $this->query_posts( $search_string );
            wp_send_json( $data );
        } else {

            wp_send_json_error(
                array(
                    'message' => 'No search string!'
                )
            );
        }
    }

    public function query_posts( $search_string ) {

        $results = [];
        $args = array(
            'fields' => 'ids, title',
            'post_type' => 'post',
            's'      => $search_string
        );

        $query = new \WP_Query($args);

        while( $query->have_posts() ) : $query -> the_post();

            $cat = get_the_category();

            $result = array(
                'post_title' => get_the_title(),
                'cat_name' => $cat[0]->name,
                'href' => get_permalink()
            );

            $results[] = $result;

        endwhile;
        wp_reset_query();

        return $results;
    }
}