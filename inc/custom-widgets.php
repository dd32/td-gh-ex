<?php
/**
 * A few custom widgets for this theme.
 *
 * @package Aperture
 */

/**
 * The author bio box widget.
 */
class aperture_author_box extends WP_Widget {

	// Constructor
	function aperture_author_box() {
		$widget_ops = array('classname' => 'widget_aperture_author_box', 'description' => __( 'An author box with biographical info from the user profile and an avatar.', 'aperture') );
		parent::WP_Widget(false, $name = __('Author Box (Aperture)', 'aperture'), $widget_ops);
	}

	// Widget form creation
	function form($instance) {

		// Check values
		if( $instance) {
		     $title = esc_attr($instance['title']);
		} else {
		     $title = __( 'About The Author', 'aperture' );
		}
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'aperture'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
	<?php
	}

	// Update widget
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	// display widget
	function widget($args, $instance) {
		extract( $args );
		// these are the widget options
		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;
		// Display the widget

		// Check if title is set
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		echo '<div class="author-gravatar">';
		echo get_avatar( get_the_author_meta( 'ID' ), 96 );
		echo '</div>';

		echo '<div class="author-bio">';
		echo get_the_author_meta( 'description' );
		echo '</div>';
		echo $after_widget;
	}
}
// register widget
add_action('widgets_init', create_function('', 'return register_widget("aperture_author_box");'));