<?php

namespace LaunchPad\Widget;

use LaunchPad\Utils\Utils as Utils;

class TextWidget extends \WP_Widget {

    private static $instance_count = 0;

    public function __construct(){

        parent::__construct( 'ldm_text_widget', "LaunchDM Text Widget", array( 'description' => "Custom text Widget by LaunchDM." ) );
    }

    public function widget( $args, $instance ){

        $args['before_widget'] = '<section id="' . $args['widget_id'] . '" class="widget widget_ldm_text_widget ldm_widget"><div class="widget-wrap">';

        echo $args['before_widget'];

        if( ! empty( $instance['title'] ) ){

        	echo $args['before_title'];

        	echo $this->build_title_link( $instance['title'], $instance['title_url']);

        	echo $args['after_title'];
        }

        if( ! empty( $instance['content'] ) ){

            echo $instance['content'];
        }

        if( ! empty( $instance['button_url'] ) ){

        	echo $this->build_button( $instance['button_text'], $instance['button_url'] );
        }

        echo $args['after_widget'];
    }

    public function form( $instance ){

        $title = ( isset( $instance['title'] ) ? $instance['title'] : '' );
        $title_url = ( isset( $instance['title_url'] ) ? $instance['title_url'] : '' );
        $content = ( isset( $instance['content'] ) ? $instance['content'] : '' );
        $button_url = ( isset( $instance['button_url'] ) ? $instance['button_url'] : '' );
        $button_text = ( isset( $instance['button_text'] ) ? $instance['button_text'] : '' );

        ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title: </label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            </p>
           	<p>
                <label for="<?php echo $this->get_field_id( 'title_url' ); ?>">Title URL: </label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title_url' ); ?>" name="<?php echo $this->get_field_name( 'title_url' ); ?>" type="text" value="<?php echo esc_attr( $title_url ); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'content' ); ?>">Content: </label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'content' ); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>"><?php echo esc_attr( $content); ?></textarea>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'button_text' ); ?>">Button Text: </label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" type="text" value="<?php echo esc_attr( $button_text ); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'button_url' ); ?>">Button URL: </label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'button_url' ); ?>" name="<?php echo $this->get_field_name( 'button_url' ); ?>" type="text" value="<?php echo esc_attr( $button_url ); ?>">
            </p>
        <?php
    }

    public function update( $new_instance, $old_instance ){

        $instance = array();

        $instance['title'] = ( ! empty( $new_instance['title'] ) ? $new_instance['title'] : '' );
        $instance['title_url'] = ( ! empty( $new_instance['title_url'] ) ? Utils::parse_link( strip_tags( $new_instance['title_url'] ) ) : '' );
        $instance['content'] = ( ! empty( $new_instance['content'] ) ? $new_instance['content'] : '' );
        $instance['button_text'] = ( ! empty( $new_instance['button_text'] ) ? strip_tags( $new_instance['button_text'] ) : '' );
        $instance['button_url'] = ( ! empty( $new_instance['button_url'] ) ? Utils::parse_link( strip_tags( $new_instance['button_url'] ) ) : '' );

        return $instance;
    }

    public function build_title_link( $title, $url ){

    	$target = "";

		if( $url !== '' ){

			if( Utils::link_is_external( $url ) ){

				$target = '_blank';
			}
			else {

    			$target = '_self';
    		}

    		$title = '<a target="' . $target . '" href="' . $url . '" title="' . esc_attr( $title ) . '">' . $title . '</a>';
    	}

    	return $title;
    }

    public function build_button( $title, $url ){

    	$button = "";
    	$target = "";

		if( $url !== '' ){

			if( Utils::link_is_external( $url ) ){

				$target = '_blank';
			}
			else {

				$target = '_self';
			}

        	if( $title !== '' ){

        		ob_start();

        		?>
        			<a class="ldm-button" target="<?php echo $target; ?>" href="<?php echo $url; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a>
        		<?php

        		$button = ob_get_clean();
        	}
        	else {

        		ob_start();

        		?>
        			<a class="ldm-button" target="<?php echo $target; ?>" href="<?php echo $url; ?>" title="Learn More">Learn More</a>
        		<?php

        		$button = ob_get_clean();
        	}
        }

        return $button;
    }
}