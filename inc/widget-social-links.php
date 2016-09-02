<?php
/**
 * Widget Social Links
 *
 * @package Bakes And Cakes
 */
 
function bakes_and_cakes_register_social_links_widget() {
    register_widget( 'bakes_and_cakes_Social_Links' );
}
add_action( 'widgets_init', 'bakes_and_cakes_register_social_links_widget' );
 
 /**
 * Adds bakes_and_cakes_Social_Links widget.
 */
class bakes_and_cakes_Social_Links extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'bakes_and_cakes_social_links', // Base ID
			__( 'RARA: Social Links', 'bakes-and-cakes' ), // Name
			array( 'description' => __( 'A Social Links Widget', 'bakes-and-cakes' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $bakes_and_cakes_args     Widget arguments.
	 * @param array $bakes_and_cakes_instance Saved values from database.
	 */
	public function widget( $bakes_and_cakes_args, $bakes_and_cakes_instance ) {
	   
        $bakes_and_cakes_title       = ! empty( $bakes_and_cakes_instance['title'] ) ? $bakes_and_cakes_instance['title'] : __( 'Social Media', 'bakes-and-cakes' );		
        $bakes_and_cakes_facebook    = ! empty( $bakes_and_cakes_instance['facebook'] ) ? esc_url( $bakes_and_cakes_instance['facebook'] ) : '' ;
        $bakes_and_cakes_twitter     = ! empty( $bakes_and_cakes_instance['twitter'] ) ? esc_url( $bakes_and_cakes_instance['twitter'] ) : '' ;
        $bakes_and_cakes_linkedin    = ! empty( $bakes_and_cakes_instance['linkedin'] ) ? esc_url( $bakes_and_cakes_instance['linkedin'] ) : '' ;
        $bakes_and_cakes_instagram   = ! empty( $bakes_and_cakes_instance['instagram'] ) ? esc_url( $bakes_and_cakes_instance['instagram'] ) : '' ;
        $bakes_and_cakes_google_plus = ! empty( $bakes_and_cakes_instance['google_plus'] ) ? esc_url( $bakes_and_cakes_instance['google_plus'] ) : '' ;
        $bakes_and_cakes_pinterest   = ! empty( $bakes_and_cakes_instance['pinterest'] ) ? esc_url( $bakes_and_cakes_instance['pinterest'] ) : '' ;
        $bakes_and_cakes_youtube     = ! empty( $bakes_and_cakes_instance['youtube'] ) ? esc_url( $bakes_and_cakes_instance['youtube'] ) : '' ;
        
        
        if( $bakes_and_cakes_facebook || $bakes_and_cakes_twitter ||  $bakes_and_cakes_linkedin || $bakes_and_cakes_instagram || $bakes_and_cakes_google_plus || $bakes_and_cakes_pinterest || $bakes_and_cakes_youtube ){ 
        echo $bakes_and_cakes_args['before_widget'];
        echo $bakes_and_cakes_args['before_title'] . apply_filters( 'the_title', $bakes_and_cakes_title ) . $bakes_and_cakes_args['after_title'];
        ?>
            <ul class="social-networks">
				<?php if( $bakes_and_cakes_facebook ){ ?>
                <li><a href="<?php echo esc_url( $bakes_and_cakes_facebook ); ?>" target="_blank" title="<?php esc_html_e( 'Facebook', 'bakes-and-cakes' ); ?>" class="fa fa-facebook"></a></li>
				<?php } if( $bakes_and_cakes_twitter ){ ?>
                <li><a href="<?php echo esc_url( $bakes_and_cakes_twitter ); ?>" target="_blank" title="<?php esc_html_e( 'Twitter', 'bakes-and-cakes' ); ?>" class="fa fa-twitter"></a></li>
				<?php } if( $bakes_and_cakes_linkedin ){ ?>
                <li><a href="<?php echo esc_url( $bakes_and_cakes_linkedin ); ?>" target="_blank" title="<?php esc_html_e( 'Linkedin', 'bakes-and-cakes' ); ?>" class="fa fa-linkedin"></a></li>
				<?php } if( $bakes_and_cakes_instagram ){ ?>
                <li><a href="<?php echo esc_url( $bakes_and_cakes_instagram ); ?>" target="_blank" title="<?php esc_html_e( 'Instagram', 'bakes-and-cakes' ); ?>" class="fa fa-instagram"></a></li>
				<?php } if( $bakes_and_cakes_google_plus ){ ?>
                <li><a href="<?php echo esc_url( $bakes_and_cakes_google_plus ); ?>" target="_blank" title="<?php esc_html_e( 'Google Plus', 'bakes-and-cakes' ); ?>" class="fa fa-google-plus"></a></li>
				<?php } if( $bakes_and_cakes_pinterest ){ ?>
                <li><a href="<?php echo esc_url( $bakes_and_cakes_pinterest ); ?>" target="_blank" title="<?php esc_html_e( 'Pinterest', 'bakes-and-cakes' ); ?>" class="fa fa-pinterest"></a></li>
				<?php } if( $bakes_and_cakes_youtube ){ ?>
                <li><a href="<?php echo esc_url( $bakes_and_cakes_youtube ); ?>" target="_blank" title="<?php esc_html_e( 'YouTube', 'bakes-and-cakes' ); ?>" class="fa fa-youtube"></a></li>
                <?php } ?>
			</ul>
        <?php
        echo $bakes_and_cakes_args['after_widget'];
        }
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $bakes_and_cakes_instance Previously saved values from database.
	 */
	public function form( $bakes_and_cakes_instance ) {
        
        $bakes_and_cakes_title       = ! empty( $bakes_and_cakes_instance['title'] ) ? $bakes_and_cakes_instance['title'] : __( 'Social Media', 'bakes-and-cakes' );		
        $bakes_and_cakes_facebook    = ! empty( $bakes_and_cakes_instance['facebook'] ) ? esc_url( $bakes_and_cakes_instance['facebook'] ) : '' ;
        $bakes_and_cakes_twitter     = ! empty( $bakes_and_cakes_instance['twitter'] ) ? esc_url( $bakes_and_cakes_instance['twitter'] ) : '' ;
        $bakes_and_cakes_linkedin    = ! empty( $bakes_and_cakes_instance['linkedin'] ) ? esc_url( $bakes_and_cakes_instance['linkedin'] ) : '' ;
        $bakes_and_cakes_instagram   = ! empty( $bakes_and_cakes_instance['instagram'] ) ? esc_url( $bakes_and_cakes_instance['instagram'] ) : '' ;
        $bakes_and_cakes_google_plus = ! empty( $bakes_and_cakes_instance['google_plus'] ) ? esc_url( $bakes_and_cakes_instance['google_plus'] ) : '' ;
        $bakes_and_cakes_pinterest   = ! empty( $bakes_and_cakes_instance['pinterest'] ) ? esc_url( $bakes_and_cakes_instance['pinterest'] ) : '' ;
        $bakes_and_cakes_youtube     = ! empty( $bakes_and_cakes_instance['youtube'] ) ? esc_url( $bakes_and_cakes_instance['youtube'] ) : '' ;
        
        ?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title', 'bakes-and-cakes' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $bakes_and_cakes_title ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'facebook' )); ?>"><?php _e( 'Facebook', 'bakes-and-cakes' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'facebook' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook' )); ?>" type="text" value="<?php echo esc_url( $bakes_and_cakes_facebook ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>"><?php _e( 'Twitter', 'bakes-and-cakes' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'twitter' )); ?>" type="text" value="<?php echo esc_url( $bakes_and_cakes_twitter ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'linkedin' )); ?>"><?php _e( 'LinkedIn', 'bakes-and-cakes' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'linkedin' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'linkedin' )); ?>" type="text" value="<?php echo esc_url( $bakes_and_cakes_linkedin ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'instagram' )); ?>"><?php _e( 'Instagram', 'bakes-and-cakes' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'instagram' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'instagram' )); ?>" type="text" value="<?php echo esc_url( $bakes_and_cakes_instagram ); ?>" />
		</p>

		<p>
            <label for="<?php echo esc_attr($this->get_field_id( 'google_plus' )); ?>"><?php _e( 'Google Plus', 'bakes-and-cakes' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'google_plus' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'google_plus' )); ?>" type="text" value="<?php echo esc_url( $bakes_and_cakes_google_plus ); ?>" />
		</p>

		<p>
            <label for="<?php echo esc_attr($this->get_field_id( 'pinterest' )); ?>"><?php _e( 'Pinterest', 'bakes-and-cakes' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'pinterest' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'pinterest' )); ?>" type="text" value="<?php echo esc_url( $bakes_and_cakes_pinterest ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'youtube' )); ?>"><?php _e( 'YouTube', 'bakes-and-cakes' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'youtube' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'youtube' )); ?>" type="text" value="<?php echo esc_url( $bakes_and_cakes_youtube ); ?>" />
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $bakes_and_cakes_new_instance Values just sent to be saved.
	 * @param array $bakes_and_cakes_old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $bakes_and_cakes_new_instance, $bakes_and_cakes_old_instance ) {
		$bakes_and_cakes_instance = array();
		
        $bakes_and_cakes_instance['title'] = ! empty( $bakes_and_cakes_new_instance['title'] ) ? strip_tags( $bakes_and_cakes_new_instance['title'] ) : __( 'Social Media', 'bakes-and-cakes' );
        $bakes_and_cakes_instance['facebook'] = ! empty( $bakes_and_cakes_new_instance['facebook'] ) ? esc_url( $bakes_and_cakes_new_instance['facebook'] ) : '';
        $bakes_and_cakes_instance['twitter'] = ! empty( $bakes_and_cakes_new_instance['twitter'] ) ? esc_url( $bakes_and_cakes_new_instance['twitter'] ) : '';
        $bakes_and_cakes_instance['linkedin'] = ! empty( $bakes_and_cakes_new_instance['linkedin'] ) ? esc_url( $bakes_and_cakes_new_instance['linkedin'] ) : '';
        $bakes_and_cakes_instance['instagram'] = ! empty( $bakes_and_cakes_new_instance['instagram'] ) ? esc_url( $bakes_and_cakes_new_instance['instagram'] ) : '';
        $bakes_and_cakes_instance['google_plus'] = ! empty( $bakes_and_cakes_new_instance['google_plus'] ) ? esc_url( $bakes_and_cakes_new_instance['google_plus'] ) : '';
        $bakes_and_cakes_instance['pinterest'] = ! empty( $bakes_and_cakes_new_instance['pinterest'] ) ? esc_url( $bakes_and_cakes_new_instance['pinterest'] ) : '';
        $bakes_and_cakes_instance['youtube'] = ! empty( $bakes_and_cakes_new_instance['youtube'] ) ? esc_url( $bakes_and_cakes_new_instance['youtube'] ) : '';
		return $bakes_and_cakes_instance;
	}

} // class bakes_and_cakes_Social_Links 