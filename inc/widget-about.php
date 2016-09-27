<?php
// Creating the widget 
class beka_about_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
        // Base ID of your widget
        'beka_about_widget', 

        // Widget name will appear in UI
        __('(Beka) About Widget', 'beka'), 

        // Widget description
        array( 'description' => __( 'A widget to show author description and image', 'beka' ), ) 
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
		$author_description = $instance['author_description'];
		$author_image = $instance['author_image'];
		$fb_url = $instance['fb_url'];
		$twtr_url = $instance['twtr_url'];
		$gp_url = $instance['gp_url'];
		$inst_url = $instance['inst_url'];
        
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
        echo $args['before_title'] . $title . $args['after_title'];
        ?>
            <div class="about-widget">
                <?php
                    if ( ! empty( $author_image ) )
                    echo '<img src="' . esc_url( $author_image ) . '" width="262" height="274">';
        
                    if ( ! empty( $author_description ) )
                    echo esc_html( $author_description );
                ?>
                <span class="author-social">
                    <?php if( $fb_url ) { ?>
                    <a href="<?php echo $fb_url; ?>"><span class="fa fa-facebook"></span></a>
                    <?php }
                    if( $twtr_url ) { ?><a href="<?php echo $twtr_url; ?>"><span class="fa fa-twitter"></span></a>
                    <?php }
                    if( $gp_url ) { ?><a href="<?php echo $gp_url; ?>"><span class="fa fa-google"></span></a>                    
                    <?php }
                    if( $inst_url ) { ?><a href="<?php echo $inst_url; ?>"><span class="fa fa-instagram"></span></a>
                    <?php } ?>
                </span>
                
            </div>
        <?php
        echo $args['after_widget'];
    }

    // Widget Backend 
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        $defaults = array(
			'title' => '',
			'author_description' => '',
			'author_image' => '',
			'fb_url' => '',
			'twtr_url' => '',
			'gp_url' => '',
			'inst_url' => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','beka' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php if(!empty($instance['title'])) { echo $instance['title']; } ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'author_image' ); ?>"><?php _e( 'Author Image:','beka' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'author_image' ); ?>" name="<?php echo $this->get_field_name( 'author_image' ); ?>" type="text" value="<?php echo esc_url( $instance['author_image'] ); ?>" />
        </p>
        <p>
			<label for="<?php echo $this->get_field_id( 'author_description' ); ?>"><?php _e('Author Description:','beka') ?></label>
			<textarea id="<?php echo $this->get_field_id( 'author_description' ); ?>" name="<?php echo $this->get_field_name( 'author_description' ); ?>" cols="20" rows="10" class="widefat"><?php echo esc_html($instance['author_description']); ?></textarea>
		</p>
        <p>
            <label for="<?php echo $this->get_field_id( 'fb_url' ); ?>"><?php _e( 'Facebook URL:','beka' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'fb_url' ); ?>" name="<?php echo $this->get_field_name( 'fb_url' ); ?>" type="text" value="<?php echo esc_url( $instance['fb_url'] ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'twtr_url' ); ?>"><?php _e( 'Twitter URL:','beka' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'twtr_url' ); ?>" name="<?php echo $this->get_field_name( 'twtr_url' ); ?>" type="text" value="<?php echo esc_url( $instance['twtr_url'] ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'gp_url' ); ?>"><?php _e( 'Google Plus URL:','beka' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'gp_url' ); ?>" name="<?php echo $this->get_field_name( 'gp_url' ); ?>" type="text" value="<?php echo esc_url( $instance['gp_url'] ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'inst_url' ); ?>"><?php _e( 'Instagram URL:','beka' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'inst_url' ); ?>" name="<?php echo $this->get_field_name( 'inst_url' ); ?>" type="text" value="<?php echo esc_url( $instance['inst_url'] ); ?>" />
        </p>
        <?php 
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['author_description'] = $new_instance['author_description'];
		$instance['author_image'] = $new_instance['author_image'];
		$instance['fb_url'] = $new_instance['fb_url'];
		$instance['twtr_url'] = $new_instance['twtr_url'];
		$instance['gp_url'] = $new_instance['gp_url'];
		$instance['inst_url'] = $new_instance['inst_url'];
        return $instance;
    }
} // Class beka_about_widget ends here

// Register and load the widget
function beka_about_load_widget() {
	register_widget( 'beka_about_widget' );
}
add_action( 'widgets_init', 'beka_about_load_widget' );
?>