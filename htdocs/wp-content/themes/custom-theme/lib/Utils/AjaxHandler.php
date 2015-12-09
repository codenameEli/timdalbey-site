<?php

namespace LaunchPad\Utils;

class AjaxHandler {

    private $action; // String

    private $listeners; // Array

    public function __construct( $action ){

        $this->set_action( $action );

        $this->listeners = array();

        $this->init_actions();
    }

    public function get_action(){

        return $this->action;
    }

    public function set_action( $action ){

        $this->action = $action;
    }

    public function get_listeners(){

        return $this->listeners;
    }

    public function add_listener( $event, $listener ){

        $this->listeners[$event] = $listener;
    }

    public function on_ajax_action(){

        $action = $this->get_action();

        if ( ! isset( $_REQUEST['task'] ) ) {  die( 'Ajax_Hanlder::undefined task' ); }

        $task = $_REQUEST['task'];

        $this->trigger( $action . '_' . $task );

        exit();
    }

    public function trigger( $event ){

        $listeners = $this->get_listeners();

        if( ! array_key_exists( $event, $listeners ) ){

            return false;
        }

        if( is_callable( $listeners[$event] ) ){

            call_user_func_array( $listeners[$event], array() );

            return true;
        }

        return false;
    }

    private function init_actions(){

        $action = $this->get_action();

        add_action( 'wp_ajax_' . $action, array( $this, 'on_ajax_action' ) );
        add_action( 'wp_ajax_nopriv_' . $action, array( $this, 'on_ajax_action' ) );
    }
}