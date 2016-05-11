<?php
/**
 * Widget Social Links
 *
 * @package App_Landing_Page
 */
 
function app_landing_page_register_social_links_widget() {
    register_widget( 'app_landing_page_Social_Links' );
}
add_action( 'widgets_init', 'app_landing_page_register_social_links_widget' );
 
 /**
 * Adds app_landing_page_Social_Links widget.
 */
class App_Landing_Page_Social_Links extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'app_landing_page_social_links', // Base ID
			__( 'RARA: Social Links', 'app-landing-page' ), // Name
			array( 'description' => __( 'A Social Links Widget', 'app-landing-page' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $app_landing_page_args     Widget arguments.
	 * @param array $app_landing_page_instance Saved values from database.
	 */
	public function widget( $app_landing_page_args, $app_landing_page_instance ) {
	   
	    $app_landing_page_title = $app_landing_page_instance['title'];
        $app_landing_page_facebook = $app_landing_page_instance['facebook'];
        $app_landing_page_twitter = $app_landing_page_instance['twitter'];
        $app_landing_page_pinterest = $app_landing_page_instance['pinterest'];
        $app_landing_page_linkedin = $app_landing_page_instance['linkedin'];
        $app_landing_page_google_plus = $app_landing_page_instance['google_plus'];
        $app_landing_page_instagram = $app_landing_page_instance['instagram'];
        $app_landing_page_youtube = $app_landing_page_instance['youtube'];
        
        if( $app_landing_page_facebook || $app_landing_page_twitter || $app_landing_page_pinterest || $app_landing_page_linkedin || $app_landing_page_google_plus || $app_landing_page_instagram || $app_landing_page_youtube ){ 
        echo $app_landing_page_args['before_widget'];
         echo $app_landing_page_args['before_title'] . apply_filters( 'the_title', $app_landing_page_title ) . $app_landing_page_args['after_title'];
        ?>
            <ul class="social-networks">
				<?php if( $app_landing_page_facebook ){ ?>
                <li><a href="<?php echo esc_url( $app_landing_page_facebook ); ?>" target="_blank" title="<?php esc_html_e( 'Facebook', 'app-landing-page' ); ?>" class="fa fa-facebook"></a></li>
				<?php } if( $app_landing_page_twitter ){ ?>
                <li><a href="<?php echo esc_url( $app_landing_page_twitter ); ?>" target="_blank" title="<?php esc_html_e( 'Twitter', 'app-landing-page' ); ?>" class="fa fa-twitter"></a></li>
				<?php } if( $app_landing_page_pinterest ){ ?>
                <li><a href="<?php echo esc_url( $app_landing_page_pinterest ); ?>" target="_blank" title="<?php esc_html_e( 'Pinterest', 'app-landing-page' ); ?>" class="fa fa-pinterest-p"></a></li>
				<?php } if( $app_landing_page_linkedin ){ ?>
                <li><a href="<?php echo esc_url( $app_landing_page_linkedin ); ?>" target="_blank" title="<?php esc_html_e( 'Linkedin', 'app-landing-page' ); ?>" class="fa fa-linkedin"></a></li>
				<?php } if( $app_landing_page_google_plus ){ ?>
                <li><a href="<?php echo esc_url( $app_landing_page_google_plus ); ?>" target="_blank" title="<?php esc_html_e( 'Google Plus', 'app-landing-page' ); ?>" class="fa fa-google-plus"></a></li>
				<?php } if( $app_landing_page_instagram ){ ?>
                <li><a href="<?php echo esc_url( $app_landing_page_instagram ); ?>" target="_blank" title="<?php esc_html_e( 'Instagram', 'app-landing-page' ); ?>" class="fa fa-instagram"></a></li>
				<?php } if( $app_landing_page_youtube ){ ?>
                <li><a href="<?php echo esc_url( $app_landing_page_youtube ); ?>" target="_blank" title="<?php esc_html_e( 'YouTube', 'app-landing-page' ); ?>" class="fa fa-youtube"></a></li>
                <?php } ?>
			</ul>
        <?php
        echo $app_landing_page_args['after_widget'];
        }
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $app_landing_page_instance Previously saved values from database.
	 */
	public function form( $app_landing_page_instance ) {
        $app_landing_page_title = ! empty( $app_landing_page_instance['title'] ) ? $app_landing_page_instance['title'] : __( 'Social Media', 'app-landing-page' );	
        $app_landing_page_facebook = ! empty( $app_landing_page_instance['facebook'] ) ? esc_url( $app_landing_page_instance['facebook'] ) : '' ;
        $app_landing_page_twitter = ! empty( $app_landing_page_instance['twitter'] ) ? esc_url( $app_landing_page_instance['twitter'] ) : '' ;
        $app_landing_page_pinterest = ! empty( $app_landing_page_instance['pinterest'] ) ? esc_url( $app_landing_page_instance['pinterest'] ) : '' ;
        $app_landing_page_linkedin = ! empty( $app_landing_page_instance['linkedin'] ) ? esc_url( $app_landing_page_instance['linkedin'] ) : '' ;
        $app_landing_page_google_plus = ! empty( $app_landing_page_instance['google_plus'] ) ? esc_url( $app_landing_page_instance['google_plus'] ) : '' ;
        $app_landing_page_instagram = ! empty( $app_landing_page_instance['instagram'] ) ? esc_url( $app_landing_page_instance['instagram'] ) : '' ;
        $app_landing_page_youtube = ! empty( $app_landing_page_instance['youtube'] ) ? esc_url( $app_landing_page_instance['youtube'] ) : '' ;
        
        ?>
		<p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'app-landing-page' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $app_landing_page_title ); ?>" />
		</p>
           

        <p>
            <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'facebook', 'app-landing-page' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_url( $app_landing_page_facebook ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter', 'app-landing-page' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_url( $app_landing_page_twitter ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e( 'Pinterest', 'app-landing-page' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" type="text" value="<?php echo esc_url( $app_landing_page_pinterest ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'LinkedIn', 'app-landing-page' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="text" value="<?php echo esc_url( $app_landing_page_linkedin ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'google_plus' ); ?>"><?php _e( 'Google Plus', 'app-landing-page' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'google_plus' ); ?>" name="<?php echo $this->get_field_name( 'google_plus' ); ?>" type="text" value="<?php echo esc_url( $app_landing_page_google_plus ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'Instagram', 'app-landing-page' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text" value="<?php echo esc_url( $app_landing_page_instagram ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'YouTube', 'app-landing-page' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" type="text" value="<?php echo esc_url( $app_landing_page_youtube ); ?>" />
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $app_landing_page_new_instance Values just sent to be saved.
	 * @param array $app_landing_page_old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $app_landing_page_new_instance, $app_landing_page_old_instance ) {
		$app_landing_page_instance = array();
		$app_landing_page_instance['title'] = ! empty( $app_landing_page_new_instance['title'] ) ? strip_tags( $app_landing_page_new_instance['title'] ) : __( 'Social Media', 'app-landing-page' );
        $app_landing_page_instance['facebook'] = ! empty( $app_landing_page_new_instance['facebook'] ) ? esc_url( $app_landing_page_new_instance['facebook'] ) : '';
        $app_landing_page_instance['twitter'] = ! empty( $app_landing_page_new_instance['twitter'] ) ? esc_url( $app_landing_page_new_instance['twitter'] ) : '';
        $app_landing_page_instance['pinterest'] = ! empty( $app_landing_page_new_instance['pinterest'] ) ? esc_url( $app_landing_page_new_instance['pinterest'] ) : '';
        $app_landing_page_instance['linkedin'] = ! empty( $app_landing_page_new_instance['linkedin'] ) ? esc_url( $app_landing_page_new_instance['linkedin'] ) : '';
        $app_landing_page_instance['google_plus'] = ! empty( $app_landing_page_new_instance['google_plus'] ) ? esc_url( $app_landing_page_new_instance['google_plus'] ) : '';
        $app_landing_page_instance['instagram'] = ! empty( $app_landing_page_new_instance['instagram'] ) ? esc_url( $app_landing_page_new_instance['instagram'] ) : '';
        $app_landing_page_instance['youtube'] = ! empty( $app_landing_page_new_instance['youtube'] ) ? esc_url( $app_landing_page_new_instance['youtube'] ) : '';
		return $app_landing_page_instance;
	}

} // class App_Landing_Page_Social_Links 