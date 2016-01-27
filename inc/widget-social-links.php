<?php
/**
 * Widget Social Links
 *
 * @package Benevolent
 */
 
function benevolent_register_social_links_widget() {
    register_widget( 'Benevolent_Social_Links' );
}
add_action( 'widgets_init', 'benevolent_register_social_links_widget' );
 
 /**
 * Adds Benevolent_Social_Links widget.
 */
class Benevolent_Social_Links extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'benevolent_social_links', // Base ID
			__( 'RARA: Social Links', 'benevolent' ), // Name
			array( 'description' => __( 'A Social Links Widget', 'benevolent' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $benevolent_args     Widget arguments.
	 * @param array $benevolent_instance Saved values from database.
	 */
	public function widget( $benevolent_args, $benevolent_instance ) {
	   
        $benevolent_title = $benevolent_instance['title'];
        $benevolent_facebook = $benevolent_instance['facebook'];
        $benevolent_twitter = $benevolent_instance['twitter'];
        $benevolent_pinterest = $benevolent_instance['pinterest'];
        $benevolent_linkedin = $benevolent_instance['linkedin'];
        $benevolent_google_plus = $benevolent_instance['google_plus'];
        $benevolent_instagram = $benevolent_instance['instagram'];
        $benevolent_youtube = $benevolent_instance['youtube'];
        
        if( $benevolent_facebook || $benevolent_twitter || $benevolent_pinterest || $benevolent_linkedin || $benevolent_google_plus || $benevolent_instagram || $benevolent_youtube ){ 
        echo $benevolent_args['before_widget'];
        echo $benevolent_args['before_title'] . apply_filters( 'the_title', $benevolent_title ) . $benevolent_args['after_title'];
        ?>
            <ul class="social-networks">
				<?php if( $benevolent_facebook ){ ?>
                <li><a href="<?php echo esc_url( $benevolent_facebook ); ?>" target="_blank" title="<?php esc_html_e( 'Facebook', 'benevolent' ); ?>" class="fa fa-facebook"></a></li>
				<?php } if( $benevolent_twitter ){ ?>
                <li><a href="<?php echo esc_url( $benevolent_twitter ); ?>" target="_blank" title="<?php esc_html_e( 'Twitter', 'benevolent' ); ?>" class="fa fa-twitter"></a></li>
				<?php } if( $benevolent_pinterest ){ ?>
                <li><a href="<?php echo esc_url( $benevolent_pinterest ); ?>" target="_blank" title="<?php esc_html_e( 'Pinterest', 'benevolent' ); ?>" class="fa fa-pinterest-p"></a></li>
				<?php } if( $benevolent_linkedin ){ ?>
                <li><a href="<?php echo esc_url( $benevolent_linkedin ); ?>" target="_blank" title="<?php esc_html_e( 'Linkedin', 'benevolent' ); ?>" class="fa fa-linkedin"></a></li>
				<?php } if( $benevolent_google_plus ){ ?>
                <li><a href="<?php echo esc_url( $benevolent_google_plus ); ?>" target="_blank" title="<?php esc_html_e( 'Google Plus', 'benevolent' ); ?>" class="fa fa-google-plus"></a></li>
				<?php } if( $benevolent_instagram ){ ?>
                <li><a href="<?php echo esc_url( $benevolent_instagram ); ?>" target="_blank" title="<?php esc_html_e( 'Instagram', 'benevolent' ); ?>" class="fa fa-instagram"></a></li>
				<?php } if( $benevolent_youtube ){ ?>
                <li><a href="<?php echo esc_url( $benevolent_youtube ); ?>" target="_blank" title="<?php esc_html_e( 'YouTube', 'benevolent' ); ?>" class="fa fa-youtube"></a></li>
                <?php } ?>
			</ul>
        <?php
        echo $benevolent_args['after_widget'];
        }
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $benevolent_instance Previously saved values from database.
	 */
	public function form( $benevolent_instance ) {
        
        $benevolent_title = ! empty( $benevolent_instance['title'] ) ? $benevolent_instance['title'] : __( 'Social Media', 'benevolent' );		
        $benevolent_facebook = ! empty( $benevolent_instance['facebook'] ) ? esc_url( $benevolent_instance['facebook'] ) : '' ;
        $benevolent_twitter = ! empty( $benevolent_instance['twitter'] ) ? esc_url( $benevolent_instance['twitter'] ) : '' ;
        $benevolent_pinterest = ! empty( $benevolent_instance['pinterest'] ) ? esc_url( $benevolent_instance['pinterest'] ) : '' ;
        $benevolent_linkedin = ! empty( $benevolent_instance['linkedin'] ) ? esc_url( $benevolent_instance['linkedin'] ) : '' ;
        $benevolent_google_plus = ! empty( $benevolent_instance['google_plus'] ) ? esc_url( $benevolent_instance['google_plus'] ) : '' ;
        $benevolent_instagram = ! empty( $benevolent_instance['instagram'] ) ? esc_url( $benevolent_instance['instagram'] ) : '' ;
        $benevolent_youtube = ! empty( $benevolent_instance['youtube'] ) ? esc_url( $benevolent_instance['youtube'] ) : '' ;
        
        ?>
		
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'benevolent' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $benevolent_title ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook', 'benevolent' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_url( $benevolent_facebook ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter', 'benevolent' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_url( $benevolent_twitter ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e( 'Pinterest', 'benevolent' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" type="text" value="<?php echo esc_url( $benevolent_pinterest ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'LinkedIn', 'benevolent' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="text" value="<?php echo esc_url( $benevolent_linkedin ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'google_plus' ); ?>"><?php _e( 'Google Plus', 'benevolent' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'google_plus' ); ?>" name="<?php echo $this->get_field_name( 'google_plus' ); ?>" type="text" value="<?php echo esc_url( $benevolent_google_plus ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'Instagram', 'benevolent' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text" value="<?php echo esc_url( $benevolent_instagram ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'YouTube', 'benevolent' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" type="text" value="<?php echo esc_url( $benevolent_youtube ); ?>" />
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $benevolent_new_instance Values just sent to be saved.
	 * @param array $benevolent_old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $benevolent_new_instance, $benevolent_old_instance ) {
		$benevolent_instance = array();
		
        $benevolent_instance['title'] = ! empty( $benevolent_new_instance['title'] ) ? strip_tags( $benevolent_new_instance['title'] ) : __( 'Social Media', 'benevolent' );
        $benevolent_instance['facebook'] = ! empty( $benevolent_new_instance['facebook'] ) ? esc_url( $benevolent_new_instance['facebook'] ) : '';
        $benevolent_instance['twitter'] = ! empty( $benevolent_new_instance['twitter'] ) ? esc_url( $benevolent_new_instance['twitter'] ) : '';
        $benevolent_instance['pinterest'] = ! empty( $benevolent_new_instance['pinterest'] ) ? esc_url( $benevolent_new_instance['pinterest'] ) : '';
        $benevolent_instance['linkedin'] = ! empty( $benevolent_new_instance['linkedin'] ) ? esc_url( $benevolent_new_instance['linkedin'] ) : '';
        $benevolent_instance['google_plus'] = ! empty( $benevolent_new_instance['google_plus'] ) ? esc_url( $benevolent_new_instance['google_plus'] ) : '';
        $benevolent_instance['instagram'] = ! empty( $benevolent_new_instance['instagram'] ) ? esc_url( $benevolent_new_instance['instagram'] ) : '';
        $benevolent_instance['youtube'] = ! empty( $benevolent_new_instance['youtube'] ) ? esc_url( $benevolent_new_instance['youtube'] ) : '';
		return $benevolent_instance;
	}

} // class Benevolent_Social_Links 