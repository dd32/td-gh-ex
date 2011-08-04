<?php
/**
 * Chip Life Social Widget
 */
class Chip_Life_Social_Widget extends WP_Widget {
	
	/**
	 * Constructor: Create widget with Default widget options.
	 */	
	function Chip_Life_Social_Widget() {
		$widget_ops = array( 'classname' => 'chip-life-social-widget', 'description' => 'It offers you an automatic integration of nine popular social sites.' );
		$control_ops = array( 'width' => 200, 'height' => 250, 'id_base' => 'chip-life-social-widget' );
		$this->WP_Widget( 'chip-life-social-widget', 'Chip Life Social Box', $widget_ops, $control_ops );
	}
	
	/**
	 * Echo the widget content.
	 *
	 * @param array $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * @param array $instance The settings for the particular instance of the widget
	 */
	
	function widget( $args, $instance ) {
		extract( $args );
		
		$instance = wp_parse_args( (array)$instance, array(			
			'title' => '',
			'rss_url' => '',
			'email_subscription_url' => '',
			'twitter_url' => '',
			'delicious_url' => '',
			'facebook_url' => '',
			'stumble_url' => '',
			'digg_url' => '',
			'linkedin_url' => '',
			'youtube_url' => ''			
		) );
		
		/** Let's Manipulate an Array*/		
		$chip_life_social_widget_array = array(
			'rss_url' => array( 'label' => 'RSS', 'class' => 'rss-url' ),
			'email_subscription_url' => array( 'label' => 'Email', 'class' => 'email-subscription-url' ),
			'twitter_url' => array( 'label' => 'Twitter', 'class' => 'twitter-url' ),
			'delicious_url' => array( 'label' => 'Delicious', 'class' => 'delicious-url' ),
			'facebook_url' => array( 'label' => 'Facebook', 'class' => 'facebook-url' ),
			'stumble_url' => array( 'label' => 'Stumble', 'class' => 'stumble-url' ),
			'digg_url' => array( 'label' => 'Digg', 'class' => 'digg-url' ),
			'linkedin_url' => array( 'label' => 'LinkedIn', 'class' => 'linkedin-url' ),
			'youtube_url' => array( 'label' => 'YouTube', 'class' => 'youtube-url' )
		); 
		
		echo $before_widget;		
		if ( ! empty( $instance['title'] ) ) echo $before_title . apply_filters( 'widget_title', $instance['title'] ) . $after_title;
?>
		
        <div class="box">
          <?php foreach( $chip_life_social_widget_array as $key => $val ): ?>
		  	<?php if( ! empty( $instance[$key] ) ): ?>
          	<span class="icons"><a href="<?php echo $instance[$key]; ?>" target="_blank" class="<?php echo $val['class']; ?>"><?php echo $val['label']; ?></a></span>
          	<?php endif; ?>
          <?php endforeach; ?>
        <div class="clear"></div>	
        </div>
        
<?php		
		echo $after_widget;		
	
	}
	
	/** Update a particular instance.
	 *
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * @param array $new_instance New settings for this instance as input by the user via form()
	 * @param array $old_instance Old settings for this instance
	 * @return array Settings to save or bool false to cancel saving
	 */
	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['rss_url'] = stripslashes( wp_filter_post_kses( addslashes( $new_instance['rss_url'] ) ) );
		$instance['email_subscription_url'] = stripslashes( wp_filter_post_kses( addslashes( $new_instance['email_subscription_url'] ) ) );
		$instance['twitter_url'] = stripslashes( wp_filter_post_kses( addslashes( $new_instance['twitter_url'] ) ) );
		$instance['delicious_url'] = stripslashes( wp_filter_post_kses( addslashes( $new_instance['delicious_url'] ) ) );
		$instance['facebook_url'] = stripslashes( wp_filter_post_kses( addslashes( $new_instance['facebook_url'] ) ) );
		$instance['stumble_url'] = stripslashes( wp_filter_post_kses( addslashes( $new_instance['stumble_url'] ) ) );
		$instance['digg_url'] = stripslashes( wp_filter_post_kses( addslashes( $new_instance['digg_url'] ) ) );
		$instance['linkedin_url'] = stripslashes( wp_filter_post_kses( addslashes( $new_instance['linkedin_url'] ) ) );
		$instance['youtube_url'] = stripslashes( wp_filter_post_kses( addslashes( $new_instance['youtube_url'] ) ) );
		return $instance;

	}
	
	/** Echo the settings update form.
	 *
	 * @param array $instance Current settings
	 */
	function form($instance) {

		$instance = wp_parse_args( (array)$instance, array(			
			'title' => '',
			'rss_url' => '',
			'email_subscription_url' => '',
			'twitter_url' => '',
			'delicious_url' => '',
			'facebook_url' => '',
			'stumble_url' => ''	,
			'digg_url' => '',
			'linkedin_url' => '',
			'youtube_url' => ''		
		) );
		
		$title = strip_tags( $instance['title'] );
		
?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'rss_url' ); ?>">RSS URL</label>
			<input type="text" id="<?php echo $this->get_field_id( 'rss_url' ); ?>" name="<?php echo $this->get_field_name( 'rss_url' ); ?>" value="<?php echo esc_attr( $instance['rss_url'] ); ?>" class="widefat" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'email_subscription_url' ); ?>">Email Subscription URL</label>
			<input type="text" id="<?php echo $this->get_field_id( 'email_subscription_url' ); ?>" name="<?php echo $this->get_field_name( 'email_subscription_url' ); ?>" value="<?php echo esc_attr( $instance['email_subscription_url'] ); ?>" class="widefat" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'twitter_url' ); ?>">Twitter URL</label>
			<input type="text" id="<?php echo $this->get_field_id( 'twitter_url' ); ?>" name="<?php echo $this->get_field_name( 'twitter_url' ); ?>" value="<?php echo esc_attr( $instance['twitter_url'] ); ?>" class="widefat" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'delicious_url' ); ?>">Delicious URL</label>
			<input type="text" id="<?php echo $this->get_field_id( 'delicious_url' ); ?>" name="<?php echo $this->get_field_name( 'delicious_url' ); ?>" value="<?php echo esc_attr( $instance['delicious_url'] ); ?>" class="widefat" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'facebook_url' ); ?>">Facebook URL</label>
			<input type="text" id="<?php echo $this->get_field_id( 'facebook_url' ); ?>" name="<?php echo $this->get_field_name( 'facebook_url' ); ?>" value="<?php echo esc_attr( $instance['facebook_url'] ); ?>" class="widefat" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'stumble_url' ); ?>">Stumble URL</label>
			<input type="text" id="<?php echo $this->get_field_id( 'stumble_url' ); ?>" name="<?php echo $this->get_field_name( 'stumble_url' ); ?>" value="<?php echo esc_attr( $instance['stumble_url'] ); ?>" class="widefat" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'digg_url' ); ?>">Digg URL</label>
			<input type="text" id="<?php echo $this->get_field_id( 'digg_url' ); ?>" name="<?php echo $this->get_field_name( 'digg_url' ); ?>" value="<?php echo esc_attr( $instance['digg_url'] ); ?>" class="widefat" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'linkedin_url' ); ?>">LinkedIn URL</label>
			<input type="text" id="<?php echo $this->get_field_id( 'linkedin_url' ); ?>" name="<?php echo $this->get_field_name( 'linkedin_url' ); ?>" value="<?php echo esc_attr( $instance['linkedin_url'] ); ?>" class="widefat" />
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'youtube_url' ); ?>">YouTube URL</label>
			<input type="text" id="<?php echo $this->get_field_id( 'youtube_url' ); ?>" name="<?php echo $this->get_field_name( 'youtube_url' ); ?>" value="<?php echo esc_attr( $instance['youtube_url'] ); ?>" class="widefat" />
		</p>

<?php		
	}	
}
?>