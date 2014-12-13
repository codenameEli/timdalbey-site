<?php

if( ! class_exists( 'LDM_Cta_Widget' ) ){

    class LDM_Cta_Widget extends WP_Widget {

        private static $instance_count = 0;

        public function __construct(){

            parent::__construct( 'ldm_cta_widget', "LaunchDM CTA Widget", array( 'description' => "Custom CTA widget." ) );
        }

        public function widget( $args, $instance ){

            $args['before_widget'] = '<section id="' . $args['widget_id'] . '" class="widget widget_ldm_cta_widget ldm_widget col-sm-4"><div class="widget-wrap">';

            echo $args['before_widget'];

            if( ! empty( $instance['title'] ) ){

                echo $args['before_title'];

                echo $this->build_title_link( $instance['title'], $instance['title_url']);

                echo $args['after_title'];
            }

            echo $args['after_widget'];
        }

        public function form( $instance ){

            $title = ( isset( $instance['title'] ) ? $instance['title'] : '' );
            $title_url = ( isset( $instance['title_url'] ) ? $instance['title_url'] : '' );

            ?>
                <p>
                    <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title: </label>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="CTA" value="<?php echo esc_attr( $title ); ?>">
                </p>
                <p>
                    <label for="<?php echo $this->get_field_id( 'title_url' ); ?>">Title URL: </label>
                    <input class="widefat" id="<?php echo $this->get_field_id( 'title_url' ); ?>" name="<?php echo $this->get_field_name( 'title_url' ); ?>" type="CTA" value="<?php echo esc_attr( $title_url ); ?>">
                </p>
            <?php
        }

        public function update( $new_instance, $old_instance ){

            $instance = array();

            $instance['title'] = ( ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '' );
            $instance['title_url'] = ( ! empty( $new_instance['title_url'] ) ? LDM_Utils::parse_link( strip_tags( $new_instance['title_url'] ) ) : '' );

            return $instance;
        }

        public function build_title_link( $title, $url ){

            $target = "";

            if( $url !== '' ){

                if( LDM_Utils::is_link_external( $url ) ){

                    $target = '_blank';
                }
                else {

                    $target = '_self';
                }

                $title = '<a target="' . $target . '" href="' . $url . '" title="' . $title . '">' . $title . '</a>';
            }

            return htmlspecialchars_decode( apply_filters( 'widget_title', $title ) );
        }

    }
}

add_action( 'widgets_init', 'ldm_register_ldm_cta_widget' );
function ldm_register_ldm_cta_widget() {

    register_widget( 'LDM_Cta_Widget' );
}