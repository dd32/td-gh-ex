<?php
/**
 * Adds Apoc_Social_Widget widget.
 */
class Apoc_Social_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'apoc_social_widget',
			__( 'APOC Social Widget', 'apoc' ),
			array( 'description' => __( 'Social Widget', 'apoc' ), )
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
		$title = apply_filters( 'widget_title', $instance['title'] );
		$email = is_email( $instance['email'] );
		$facebook = esc_url( $instance['facebook'] );
		$twitter = esc_url( $instance['twitter'] );
		$instagram = esc_url( $instance['instagram'] );
		$google_plus = esc_url( $instance['google_plus'] );
		$youtube = esc_url( $instance['youtube'] );
		$foursquare = esc_url( $instance['foursquare'] );
		$flickr = esc_url( $instance['flickr'] );
		$pinterest = esc_url( $instance['pinterest'] );
		$github = esc_url( $instance['github'] );
		$rss = esc_url( $instance['rss'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		
		echo '<div id="social-icons">';
		
		if ( ! empty( $email ) ) {
			echo '<a href="mailto:' . $email . '" target="_blank"><i class="fa fa-envelope fa-3x"></i></a>';
		}
		
		if ( ! empty( $facebook ) ) {
			echo '<a href="' . $facebook . '" target="_blank"><i class="fa fa-facebook-square fa-3x"></i></a>';
		}
		
		if ( ! empty( $twitter ) ) {
			echo '<a href="' . $twitter . '" target="_blank"><i class="fa fa-twitter-square fa-3x"></i></a>';
		}
				
		if ( ! empty( $instagram ) ) {
			echo '<a href="' . $instagram . '" target="_blank"><i class="fa fa-instagram fa-3x"></i></a>';
		}

		if ( ! empty( $google_plus ) ) {
			echo '<a href="' . $google_plus . '" target="_blank"><i class="fa fa-google-plus-square fa-3x"></i></a>';
		}
		
		if ( ! empty( $youtube ) ) {
			echo '<a href="' . $youtube . '" target="_blank"><i class="fa fa-youtube-square fa-3x"></i></a>';
		}
		
		if ( ! empty( $foursquare ) ) {
			echo '<a href="' . $foursquare . '" target="_blank"><i class="fa fa-foursquare fa-3x"></i></a>';
		}
		
		if ( ! empty( $flickr ) ) {
			echo '<a href="' . $flickr . '" target="_blank"><i class="fa fa-flickr fa-3x"></i></a>';
		}
		
		if ( ! empty( $pinterest ) ) {
			echo '<a href="' . $pinterest . '" target="_blank"><i class="fa fa-pinterest-square fa-3x"></i></a>';
		}
		
		if ( ! empty( $github ) ) {
			echo '<a href="' . $github . '" target="_blank"><i class="fa fa-github-square fa-3x"></i></a>';
		}
		
		if ( ! empty( $rss ) ) {
			echo '<a href="' . $rss . '" target="_blank"><i class="fa fa-rss-square fa-3x"></i></a>';
		}
		
		echo '</div><!-- end #social-icons -->';
		
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
		
		$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : ''; 
		$email = isset( $instance[ 'email' ] ) ? $instance[ 'email' ] : '';
		$facebook = isset( $instance[ 'facebook' ] ) ? $instance[ 'facebook' ] : '';
		$twitter = isset( $instance[ 'twitter' ] ) ? $instance[ 'twitter' ] : '';
		$instagram = isset( $instance[ 'instagram' ] ) ? $instance[ 'instagram' ] : '';
		$google_plus = isset( $instance[ 'google_plus' ] ) ? $instance[ 'google_plus' ] : '';
		$youtube = isset( $instance[ 'youtube' ] ) ? $instance[ 'youtube' ] : '';
		$foursquare = isset( $instance[ 'foursquare' ] ) ? $instance[ 'foursquare' ] : '';
		$flickr = isset( $instance[ 'flickr' ] ) ? $instance[ 'flickr' ] : '';
		$pinterest = isset( $instance[ 'pinterest' ] ) ? $instance[ 'pinterest' ] : '';
		$github = isset( $instance[ 'github' ] ) ? $instance[ 'github' ] : '';
		$rss = isset( $instance[ 'rss' ] ) ? $instance[ 'rss' ] : '';
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'apoc' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email:', 'apoc' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook URL:', 'apoc' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter URL:', 'apoc' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'Instagram URL:', 'apoc' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text" value="<?php echo esc_attr( $instagram ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'google_plus' ); ?>"><?php _e( 'Google+ URL:', 'apoc' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'google_plus' ); ?>" name="<?php echo $this->get_field_name( 'google_plus' ); ?>" type="text" value="<?php echo esc_attr( $google_plus ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'YouTube URL:', 'apoc' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" type="text" value="<?php echo esc_attr( $youtube ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'foursquare' ); ?>"><?php _e( 'Foursquare URL:', 'apoc' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'foursquare' ); ?>" name="<?php echo $this->get_field_name( 'foursquare' ); ?>" type="text" value="<?php echo esc_attr( $foursquare ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php _e( 'Flickr URL:', 'apoc' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'flickr' ); ?>" name="<?php echo $this->get_field_name( 'flickr' ); ?>" type="text" value="<?php echo esc_attr( $flickr ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e( 'Pinterest URL:', 'apoc' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" type="text" value="<?php echo esc_attr( $pinterest ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'github' ); ?>"><?php _e( 'GitHub URL:', 'apoc' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'github' ); ?>" name="<?php echo $this->get_field_name( 'github' ); ?>" type="text" value="<?php echo esc_attr( $github ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'rss' ); ?>"><?php _e( 'RSS URL:', 'apoc' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" type="text" value="<?php echo esc_attr( $rss ); ?>">
		</p>
		<?php 
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
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['email'] = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
		$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
		$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
		$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';
		$instance['google_plus'] = ( ! empty( $new_instance['google_plus'] ) ) ? strip_tags( $new_instance['google_plus'] ) : '';
		$instance['youtube'] = ( ! empty( $new_instance['youtube'] ) ) ? strip_tags( $new_instance['youtube'] ) : '';
		$instance['foursquare'] = ( ! empty( $new_instance['foursquare'] ) ) ? strip_tags( $new_instance['foursquare'] ) : '';
		$instance['flickr'] = ( ! empty( $new_instance['flickr'] ) ) ? strip_tags( $new_instance['flickr'] ) : '';
		$instance['pinterest'] = ( ! empty( $new_instance['pinterest'] ) ) ? strip_tags( $new_instance['pinterest'] ) : '';
		$instance['github'] = ( ! empty( $new_instance['github'] ) ) ? strip_tags( $new_instance['github'] ) : '';
		$instance['rss'] = ( ! empty( $new_instance['rss'] ) ) ? strip_tags( $new_instance['rss'] ) : '';

		return $instance;
	}

} // class Apoc_Social_Widget

new Apoc_Social_Widget();