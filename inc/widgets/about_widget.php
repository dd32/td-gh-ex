<?php
/* About Widget */

add_action( 'widgets_init', 'aster_about_load_widget' );

function aster_about_load_widget() {
	register_widget( 'Aster_About_Widget' );
}

class Aster_About_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	public function __construct() {
		parent::__construct(
			'aster_about_base_widget', // Base ID
			esc_html__('Aster About Me', 'aster'), // Name
			array('description' => esc_html__('A widget that displays an About widget', 'aster'),) // Args
		);
	}


	/**
	 * How to display the widget on the screen.
	 */
	public function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$image = $instance['image'];
		$description = $instance['description'];
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		?>
			
			<div class="about-widget">
			
			<?php if($image) : ?>
				<img class="img-responsive" src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" />
			<?php endif; ?>
			
			<?php if($description) : ?>
			<div class="about-me-content"><?php echo esc_textarea($description); ?></div>
			<?php endif; ?>	
			
			</div>
			
		<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	public	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['image'] = esc_url_raw( $new_instance['image'] );
		$instance['description'] = sanitize_text_field( $new_instance['description'] );

		return $instance;
	}


	public	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => esc_html__('About Me', 'aster'), 'image' => '', 'description' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo esc_html($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Title:', 'aster') ?></label>
			<input class="widefat" id="<?php echo esc_html($this->get_field_id( 'title' )); ?>" name="<?php echo esc_html($this->get_field_name('title')); ?>" value="<?php echo esc_html($instance['title']); ?>" />
		</p>
		
		<!-- image url -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'image' )); ?>"><?php esc_html_e('Image URL:', 'aster') ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'image' )); ?>" name="<?php echo esc_attr($this->get_field_name('image')); ?>" value="<?php echo esc_url($instance['image']); ?>" /><br />
			<small><?php _e('Insert your image URL. Your image should be at least 300px wide for best result.', 'aster') ?></small>
		</p>

		<!-- description -->
		<p>
			<label for="<?php echo esc_textarea($this->get_field_id( 'description' )); ?>"><?php esc_html_e('About me text:', 'aster') ?></label>
			<textarea class="widefat" id="<?php echo esc_textarea($this->get_field_id( 'description' )); ?>" name="<?php echo esc_textarea($this->get_field_name( 'description' )); ?>" rows="6"><?php echo esc_textarea($instance['description']); ?></textarea>
		</p>


	<?php
	}
}

?>