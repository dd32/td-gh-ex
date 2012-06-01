<?php
/**
 * Makes a custom Widget for Displaying Ads
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package WordPress
 * @subpackage Catch_Box
 * @since Catch Box 1.0
 */

class catchbox_adwidget extends WP_Widget {
	var $settings = array( 'title', 'adcode', 'image', 'href', 'alt' );
	
	/**
	 * Constructor
	 *
	 * @return void
	 **/
	function catchbox_adwidget() {
		$widget_ops = array( 'classname' => 'widget_catchbox_adwidget', 'description' => __( 'Use this widget to add any type of Ad as a widget.', 'catchbox' ) );
		$this->WP_Widget( 'widget_catchbox_adwidget', __( 'Catch Box Adspace Widget', 'catchbox' ), $widget_ops );
		$this->alt_option_name = 'widget_catchbox_adwidget';
	}

	/**
	 * Outputs the HTML for this widget.
	 **/
	function widget($args, $instance) {
		$settings = $this->catchbox_get_settings();
		extract( $args, EXTR_SKIP );
		$instance = wp_parse_args( $instance, $settings );
		extract( $instance, EXTR_SKIP );
		
		echo $before_widget;
		if ( $title != '' ) {
			echo $before_title . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $after_title;
		} else {
			echo '<div class="widget-content">';
		}

		if ( $adcode != '' ) {
			echo $adcode;
		} else {
			?><a href="<?php echo esc_url( $href ); ?>"><img src="<?php echo esc_attr( $image ); ?>" alt="<?php echo esc_attr( $alt ); ?>" /></a><?php
		}
		echo $after_widget;
	}

	/**
	 * Deals with the settings when they are saved by the admin. Here is
	 * where any validation should be dealt with.
	 **/
	function update( $new_instance, $old_instance ) {
		foreach ( array( 'title', 'alt', 'image', 'href' ) as $setting )
			$new_instance[$setting] = strip_tags( $new_instance[$setting] );
		// Users without unfiltered_html cannot update this arbitrary HTML field
		if ( !current_user_can( 'unfiltered_html' ) )
			$new_instance['adcode'] = $old_instance['adcode'];
		return $new_instance;
	}

	/**
	 * Provides an array of the settings with the setting name as the key and the default value as the value
	 * This cannot be called get_settings() or it will override WP_Widget::get_settings()
	 */
	function catchbox_get_settings() {
		// Set the default to a blank string
		$settings = array_fill_keys( $this->settings, '' );
		// Now set the more specific defaults
		return $settings;
	}

	/**
	 * Displays the form for this widget on the Widgets page of the WP Admin area.
	 **/
	function form($instance) {
		$instance = wp_parse_args( $instance, $this->catchbox_get_settings() );
		extract( $instance, EXTR_SKIP );
?>
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (optional):','woothemes'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
	</p>
<?php if ( current_user_can( 'unfiltered_html' ) ) : // Only show it to users who can edit it ?>
	<p>
		<label for="<?php echo $this->get_field_id('adcode'); ?>"><?php _e('Ad Code:','woothemes'); ?></label>
		<textarea name="<?php echo $this->get_field_name('adcode'); ?>" class="widefat" id="<?php echo $this->get_field_id('adcode'); ?>"><?php echo esc_textarea( $adcode ); ?></textarea>
	</p>
	<p><strong>or</strong></p>
<?php endif; ?>
	<p>
		<label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image Url:','woothemes'); ?></label>
	<input type="text" name="<?php echo $this->get_field_name('image'); ?>" value="<?php echo esc_attr( $image ); ?>" class="widefat" id="<?php echo $this->get_field_id('image'); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('href'); ?>"><?php _e('Link URL:','woothemes'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('href'); ?>" value="<?php echo esc_attr( $href ); ?>" class="widefat" id="<?php echo $this->get_field_id('href'); ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('alt'); ?>"><?php _e('Alt text:','woothemes'); ?></label>
		<input type="text" name="<?php echo $this->get_field_name('alt'); ?>" value="<?php echo esc_attr( $alt ); ?>" class="widefat" id="<?php echo $this->get_field_id('alt'); ?>" />
	</p>
<?php
	}
} 