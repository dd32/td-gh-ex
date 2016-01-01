<?php
/**
 * Custom Widgets
 *
 * @package gump
 * @since gump 1.0
 */

/**
 * Social Links
 *
 * @since gump 1.0
 */
class social_gump extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	function social_gump() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget-social', 'description' => 'Show Icons of your Social Links.', 'gump' );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'social_gump' );

		/* Create the widget. */
		$this->__construct( 'social_gump', 'Social Links (gump)', $widget_ops, $control_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* User-selected settings. */
		$title = apply_filters( 'widget_title', $instance['title'] );
		$feed = $instance['feed'];
		$linkedin = $instance['linkedin'];
		$twitter = $instance['twitter'];
		$facebook = $instance['facebook'];
		$googleplus = $instance['googleplus'];
		$pinterest = $instance['pinterest'];
		$instagram = $instance['instagram'];
		$flickr = $instance['flickr'];
		$youtube = $instance['youtube'];
		$vimeo = $instance['vimeo'];
		$dribbble = $instance['dribbble'];
		$behance = $instance['behance'];
		$github = $instance['github'];
		$skype = $instance['skype'];
		$tumblr = $instance['tumblr'];
		$wordpress = $instance['wordpress'];


		/* Before widget (defined by themes). */
		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;

		if ( $feed )
			echo '<span><a href="' . $feed . '" title="' . __( 'Feed', 'gump' ) . '" class="' . __( 'social social-feed', 'gump' ) . '" target="' . __( '_blank', 'gump' ) . '"></a></span>';

		if ( $linkedin )
			echo '<span><a href="' . $linkedin . '" title="' . __( 'Linkedin', 'gump' ) . '" class="' . __( 'social social-linkedin', 'gump' ) . '" target="' . __( '_blank', 'gump' ) . '"></a></span>';

		if ( $twitter )
			echo '<span><a href="' . $twitter . '" title="' . __( 'Twitter', 'gump' ) . '" class="' . __( 'social social-twitter', 'gump' ) . '" target="' . __( '_blank', 'gump' ) . '"></a></span>';

		if ( $facebook )
			echo '<span><a href="' . $facebook . '" title="' . __( 'Facebook', 'gump' ) . '" class="' . __( 'social social-facebook', 'gump' ) . '" target="' . __( '_blank', 'gump' ) . '"></a></span>';

		if ( $googleplus )
			echo '<span><a href="' . $googleplus . '" title="' . __( 'Googleplus', 'gump' ) . '" class="' . __( 'social social-googleplus', 'gump' ) . '" target="' . __( '_blank', 'gump' ) . '"></a></span>';

		if ( $pinterest )
			echo '<span><a href="' . $pinterest . '" title="' . __( 'Pinterest', 'gump' ) . '" class="' . __( 'social social-pinterest', 'gump' ) . '" target="' . __( '_blank', 'gump' ) . '"></a></span>';

		if ( $instagram )
			echo '<span><a href="' . $instagram . '" title="' . __( 'Instagram', 'gump' ) . '" class="' . __( 'social social-instagram', 'gump' ) . '" target="' . __( '_blank', 'gump' ) . '"></a></span>';

		if ( $flickr )
			echo '<span><a href="' . $flickr . '" title="' . __( 'Flickr', 'gump' ) . '" class="' . __( 'social social-flickr', 'gump' ) . '" target="' . __( '_blank', 'gump' ) . '"></a></span>';

		if ( $youtube )
			echo '<span><a href="' . $youtube . '" title="' . __( 'Youtube', 'gump' ) . '" class="' . __( 'social social-youtube', 'gump' ) . '" target="' . __( '_blank', 'gump' ) . '"></a></span>';

		if ( $vimeo )
			echo '<span><a href="' . $vimeo . '" title="' . __( 'Vimeo', 'gump' ) . '" class="' . __( 'social social-vimeo', 'gump' ) . '" target="' . __( '_blank', 'gump' ) . '"></a></span>';

		if ( $dribbble )
			echo '<span><a href="' . $dribbble . '" title="' . __( 'Dribbble', 'gump' ) . '" class="' . __( 'social social-dribbble', 'gump' ) . '" target="' . __( '_blank', 'gump' ) . '"></a></span>';

		if ( $behance )
			echo '<span><a href="' . $behance . '" title="' . __( 'Behance', 'gump' ) . '" class="' . __( 'social-fontello social-behance', 'gump' ) . '" target="' . __( '_blank', 'gump' ) . '"></a></span>';

		if ( $github )
			echo '<span><a href="' . $github . '" title="' . __( 'Github', 'gump' ) . '" class="' . __( 'social social-github', 'gump' ) . '" target="' . __( '_blank', 'gump' ) . '"></a></span>';

		if ( $skype )
			echo '<span><a href="' . $skype . '" title="' . __( 'Skype', 'gump' ) . '" class="' . __( 'social social-skype', 'gump' ) . '" target="' . __( '_blank', 'gump' ) . '"></a></span>';

		if ( $tumblr )
			echo '<span><a href="' . $tumblr . '" title="' . __( 'Tumblr', 'gump' ) . '" class="' . __( 'social social-tumblr', 'gump' ) . '" target="' . __( '_blank', 'gump' ) . '"></a></span>';

		if ( $wordpress )
			echo '<span><a href="' . $wordpress . '" title="' . __( 'Wordpress', 'gump' ) . '" class="' . __( 'social social-wordpress', 'gump' ) . '" target="' . __( '_blank', 'gump' ) . '"></a></span>';
		
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['feed'] = $new_instance['feed'];
		$instance['linkedin'] = $new_instance['linkedin'];
		$instance['twitter'] = $new_instance['twitter'];
		$instance['facebook'] = $new_instance['facebook'];
		$instance['googleplus'] = $new_instance['googleplus'];
		$instance['pinterest'] = $new_instance['pinterest'];
		$instance['instagram'] = $new_instance['instagram'];
		$instance['flickr'] = $new_instance['flickr'];
		$instance['youtube'] = $new_instance['youtube'];
		$instance['vimeo'] = $new_instance['vimeo'];
		$instance['dribbble'] = $new_instance['dribbble'];
		$instance['behance'] = $new_instance['behance'];
		$instance['github'] = $new_instance['github'];
		$instance['skype'] = $new_instance['skype'];
		$instance['tumblr'] = $new_instance['tumblr'];
		$instance['wordpress'] = $new_instance['wordpress'];

		return $instance;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 
						'title' => 'Social Links', 
						'feed' => 'http://www.website.com/feed/', 
						'linkedin' => '',
						'twitter' => '',
						'facebook' => '',
						'googleplus' => '',
						'pinterest' => '',
						'instagram' => '',
						'flickr' => '',
						'youtube' => '',
						'vimeo' => '',
						'dribbble' => '',
						'behance' => '',
						'github' => '',
						'skype' => '',
						'tumblr' => '',
						'tumblr' => ''
					);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:','gump'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'feed' ); ?>"><?php _e('Feed:','gump'); ?></label>
			<input id="<?php echo $this->get_field_id( 'feed' ); ?>" name="<?php echo $this->get_field_name( 'feed' ); ?>" value="<?php echo $instance['feed']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e('Linkedin:','gump'); ?></label>
			<input id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo $instance['linkedin']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e('Twitter:','gump'); ?></label>
			<input id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo $instance['twitter']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e('Facebook:','gump'); ?></label>
			<input id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo $instance['facebook']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'googleplus' ); ?>"><?php _e('Googleplus:','gump'); ?></label>
			<input id="<?php echo $this->get_field_id( 'googleplus' ); ?>" name="<?php echo $this->get_field_name( 'googleplus' ); ?>" value="<?php echo $instance['googleplus']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e('Pinterest:','gump'); ?></label>
			<input id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" value="<?php echo $instance['pinterest']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e('Instagram:','gump'); ?></label>
			<input id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" value="<?php echo $instance['instagram']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php _e('Flickr:','gump'); ?></label>
			<input id="<?php echo $this->get_field_id( 'flickr' ); ?>" name="<?php echo $this->get_field_name( 'flickr' ); ?>" value="<?php echo $instance['flickr']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e('Youtube:','gump'); ?></label>
			<input id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo $instance['youtube']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php _e('Vimeo:','gump'); ?></label>
			<input id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" value="<?php echo $instance['vimeo']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'dribbble' ); ?>"><?php _e('Dribbble:','gump'); ?></label>
			<input id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" value="<?php echo $instance['dribbble']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'behance' ); ?>"><?php _e('Behance:','gump'); ?></label>
			<input id="<?php echo $this->get_field_id( 'behance' ); ?>" name="<?php echo $this->get_field_name( 'behance' ); ?>" value="<?php echo $instance['behance']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'github' ); ?>"><?php _e('Github:','gump'); ?></label>
			<input id="<?php echo $this->get_field_id( 'github' ); ?>" name="<?php echo $this->get_field_name( 'github' ); ?>" value="<?php echo $instance['github']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'skype' ); ?>"><?php _e('Skype:','gump'); ?></label>
			<input id="<?php echo $this->get_field_id( 'skype' ); ?>" name="<?php echo $this->get_field_name( 'skype' ); ?>" value="<?php echo $instance['skype']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'tumblr' ); ?>"><?php _e('Tumblr:','gump'); ?></label>
			<input id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" value="<?php echo $instance['tumblr']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'wordpress' ); ?>"><?php _e('Wordpress:','gump'); ?></label>
			<input id="<?php echo $this->get_field_id( 'wordpress' ); ?>" name="<?php echo $this->get_field_name( 'wordpress' ); ?>" value="<?php echo $instance['wordpress']; ?>" style="width:100%;" />
		</p>

		<?php
	}

}

function register_social_gump() {
    register_widget( 'social_gump' );
}
add_action( 'widgets_init', 'register_social_gump' );