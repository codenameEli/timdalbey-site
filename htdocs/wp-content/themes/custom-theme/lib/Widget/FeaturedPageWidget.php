<?php

namespace LaunchPad\Widget;

class FeaturedPageWidget extends \WP_Widget {

    private $post_type = 'stories';

    public function __construct(){

        parent::__construct( 'ldm_featured_post_widget', "LaunchDM Featured Page Widget", array( 'description' => "Custom featured page Widget." ) );
    }

    public function widget( $args, $instance ){

        if ( $args['id'] == 'latest_goods' ) {

            $args['before_widget'] = '<section id="' . $args['widget_id'] . '" class="widget widget_sf_featured_post_widget sf_widget sf-featured-post-widget ' . $this->add_bootstrap_class($args) . '"><div class="widget-wrap">';
            $args['after_widget'] = '</div></section>';

            echo $args['before_widget'];

            if( isset( $instance['post_id'] ) && intval( $instance['post_id'] ) ){

                $post_id = $instance['post_id'];
                $custom_excerpt = $instance['custom_excerpt'];

                $this->do_latest_goods_markup( $post_id, $custom_excerpt );
            }

            echo $args['after_widget'];
        } else {

            $args['before_widget'] = '<section id="' . $args['widget_id'] . '" class="widget widget_sf_featured_post_widget sf_widget sf-featured-post-widget ' . $this->add_bootstrap_class($args) . '"><div class="widget-wrap row">';
            $args['after_widget'] = '</div></section>';

            echo $args['before_widget'];

            if( isset( $instance['post_id'] ) && intval( $instance['post_id'] ) ){

                $post_id = $instance['post_id'];
                $custom_excerpt = $instance['custom_excerpt'];

                $this->do_spotlight_markup( $post_id, $custom_excerpt );
            }

            echo $args['after_widget'];
        }
    }

    public function form( $instance ){

        $post_id = ( isset( $instance['post_id'] ) ? $instance['post_id'] : 0 );
        $custom_excerpt = ( isset( $instance['custom_excerpt'] ) ? esc_textarea( $instance['custom_excerpt'] ) : '' );

        ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'post_id' ); ?>">Selected Featured Post: </label>
                <select id="<?php echo $this->get_field_id( 'post_id' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'post_id' ); ?>">
                    <?php echo $this->get_post_options( $post_id ); ?>
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'custom_excerpt' ); ?>">Custom Excerpt</label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'custom_excerpt' ); ?>" name="<?php echo $this->get_field_name( 'custom_excerpt' ); ?>"><?php echo esc_attr( $custom_excerpt ); ?></textarea>
            </p>
        <?php
    }

    public function update( $new_instance, $old_instance ){

        $instance = array();

        $instance['post_id'] = ( ! empty( $new_instance['post_id'] ) ? $new_instance['post_id'] : 0 );
        $instance['custom_excerpt'] = ( ! empty( $new_instance['custom_excerpt'] ) ? $new_instance['custom_excerpt'] : '' );

        return $instance;
    }

    private function do_custom_excerpt_markup( $custom_excerpt ){

        ob_start();?>
            <div class="entry-content">
                <p><?php echo $custom_excerpt; ?></p>
            </div>
        <?php echo ob_get_clean();
    }

    private function do_latest_goods_markup( $post_id, $custom_excerpt ){

    	global $post;

        // make backup of globa post for restoring later
    	$post_backup = $post;

        // override global post
    	$post = get_post( $post_id );

        $category = get_the_category( $post->ID );

		genesis_markup( array(
			'html5'   => '<article %s>',
			'xhtml'   => sprintf( '<div class="%s">', implode( ' ', get_post_class() ) ),
			'context' => 'entry',
		) );

        $image = genesis_get_image( array(
			'format'  => 'html',
			'size'    => 'latest-goods-thumbnail',
		));

        // featured image
		printf( '<a href="%s" title="%s">%s</a>', get_permalink(), the_title_attribute( 'echo=0' ), $image );

        $title = get_the_title() ? get_the_title() : __( '(no title)', 'genesis' );

        // post title
        echo genesis_html5() ? '<header class="entry-header">' : '';

        if ( genesis_html5() ) {

            printf( '<h2 class="entry-title"><a href="%s">%s</a></h2>', get_permalink(), esc_html( $title ) );
        }
        else {

            printf( '<h2><a href="%s">%s</a></h2>', get_permalink(), esc_html( $title ) );
        }

        $this->do_featured_post_meta( $post );

        echo genesis_html5() ? '</header>' : '';

        $this->do_custom_excerpt_markup( $custom_excerpt );

        $this->do_read_more_link( $category );

		genesis_markup( array(
			'html5' => '</article>',
			'xhtml' => '</div>',
		) );

        // put back global post
	    $post = $post_backup;
    }

    private function do_spotlight_markup ( $post_id, $custom_excerpt ){

        global $post;

        // make backup of globa post for restoring later
        $post_backup = $post;

        // override global post
        $post = get_post( $post_id );

        $category = get_the_category( $post->ID );

        $image = genesis_get_image( array(
            'format'  => 'html',
            'size'    => 'circular-thumbnail',
        ));
        // featured image
        echo "<div class='sunrays-image-container col-sm-6 pull-right'>$image</div>";

        genesis_markup( array(
            'html5'   => '<article %s>',
            'xhtml'   => sprintf( '<div class="%s col-sm-5">', implode( ' ', get_post_class() ) ),
            'context' => 'entry',
        ) );

        $this->do_spotlight_dynamic_title( $category );

        $title = get_the_title() ? get_the_title() : __( '(no title)', 'genesis' );

        // post title
        echo genesis_html5() ? '<header class="entry-header">' : '';

        if ( genesis_html5() ) {

            printf( '<h2 class="entry-title"><a href="%s">%s</a></h2>', get_permalink(), esc_html( $title ) );
        }
        else {

            printf( '<h2><a href="%s">%s</a></h2>', get_permalink(), esc_html( $title ) );
        }

        $this->do_featured_post_meta( $post );

        echo genesis_html5() ? '</header>' : '';

        $this->do_custom_excerpt_markup( $custom_excerpt );

        $this->do_read_more_link( $category );

        genesis_markup( array(
            'html5' => '</article>',
            'xhtml' => '</div>',
        ) );

        // put back global post
        $post = $post_backup;
    }

    private function do_featured_post_meta( $post ) {

        $author_id = $post->post_author;

        ob_start();?>
            <p class="entry-meta">By
                <span class="entry-author" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">
                    <a href="<?php echo get_author_posts_url( $author_id ); ?>" class="entry-author-link" itemprop="url" rel="author"><?php echo get_the_author_meta( 'first_name', $author_id ); ?> <?php echo get_the_author_meta( 'last_name', $author_id ); ?></a>
                </span>&vert;
                <?php echo do_shortcode('[post_date format="F j, Y"]'); ?>
            </p>
        <?php echo ob_get_clean();
    }

    private function do_spotlight_dynamic_title( $category ) {

        $name = $category[0]->name;

        echo "<h5 class='spotlight-sub-header'>This week's Spotlight $name</h5>";
    }

    private function do_read_more_link( $category ) {

        $slug = $category[0]->slug;
        $read_more_text = "";

        switch ($slug) {

            case 'podcast':
                $read_more_text = "LISTEN NOW";
                break;

            case 'video':
                $read_more_text = "WATCH VIDEO";
                break;

            default: // It's an article
                $read_more_text = "READ MORE";
                break;
        }

        ob_start();?>
            <a href="<?php echo get_permalink(); ?>"><b><?php echo $read_more_text; ?></b></a>
        <?php echo ob_get_clean();
    }

    private function get_post_options( $selected_post_id = 0 ){

        $options = "";

        $args = array(
            'post_type' => $this->post_type,
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'fields' => 'ids'
        );

        $post_ids = get_posts( $args );

        if( ! empty( $post_ids ) ){

            foreach( $post_ids as $post_id ){

                $title = get_the_title( $post_id );

                if( $post_id == $selected_post_id ){

                    $options .= '<option value="' . $post_id . '" selected="selected">' . $title . '</option>';
                }
                else {

                    $options .= '<option value="' . $post_id . '">' . $title . '</option>';
                }
            }
        }
        else {

            $options .= '<option value="0">No Posts To Select From</option>';
        }

        return $options;
    }

    private function add_bootstrap_class($args) {

        if ( $args['id'] == 'latest_goods' ) {

            return 'col-sm-4';
        }
    }
}