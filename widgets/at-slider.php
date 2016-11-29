<?php
/*
Plugin Name: Recent Posts Thumbnails

*/
	
function at_register_slider() {
	register_widget( 'at_slider' );
}

add_action('widgets_init', 'at_register_slider');

/*
add_action( 'widgets_init', function(){
     register_widget( 'at_featured' );
});	
*/

/**
 * Adds at_slider widget.
 */
class at_slider extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'at_slider', // Base ID
			__('AT - Slider', 'attirant'), // Name
			array( 'description' => __( 'Slider for the Site.', 'attirant' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		?>
			
		<?php
       
        echo $args['before_widget'];
                if ( ! empty( $instance['title'] ) ) {
                        echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
                }
				
				get_template_part('slider');
				
               
                echo $args['after_widget'];
               
               
        }
 
        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form( $instance ) {  
                       
                if ( isset( $instance[ 'title' ] ) ) {
                        $title = $instance[ 'title' ];
                }
                else {
                        $title = __( 'SLIDER', 'attirant' );
                }
                      
                ?>
               
                <p>
                        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'attirant' ); ?></label>
                        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
                </p>
               
   		<?php 
	   		
	   		  echo __('You can configure the Featured Area from the Customizer', 'attirant');
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}

} // 