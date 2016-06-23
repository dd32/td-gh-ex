<?php
// Creating the widget 
class beka_260_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
        // Base ID of your widget
        'beka_260_widget', 

        // Widget name will appear in UI
        __('(Beka) 260x260 Ads', 'beka' ), 

        // Widget description
        array( 'description' => __( 'A widget to show 260x260px Ad Banner', 'beka' ), ) 
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
		$ad_code = $instance['ad_code'];
        
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
        echo $args['before_title'] . $title . $args['after_title'];
        ?>
            <div class="ad-widget">
                <?php
                    if ( ! empty( $ad_code ) )
                    echo $ad_code;
                ?>
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
			'ad_code' => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' , 'beka'  ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php if(!empty($instance['title'])) { echo $instance['title']; } ?>" />
        </p>
        <p>
			<label for="<?php echo $this->get_field_id( 'ad_code' ); ?>"><?php _e('Ad Code:', 'beka' ) ?></label>
			<textarea id="<?php echo $this->get_field_id( 'ad_code' ); ?>" name="<?php echo $this->get_field_name( 'ad_code' ); ?>" cols="20" rows="10" class="widefat"><?php echo esc_html($instance['ad_code']); ?></textarea>
		</p>
        <?php 
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['ad_code'] = $new_instance['ad_code'];
        return $instance;
    }
} // Class beka_260_widget ends here

// Register and load the widget
function beka_260_load_widget() {
	register_widget( 'beka_260_widget' );
}
add_action( 'widgets_init', 'beka_260_load_widget' );
?>