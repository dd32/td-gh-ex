<?php
/**
 * Widgets API: AGNCY_Widget_Breadcrumbs
 *
 * @package agncy
 */

/**
 * Core class used to implement a Breadcrumbs widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class AGNCY_Widget_Breadcrumbs extends WP_Widget {

	/**
	 * Sets up a new Text widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops  = array(
			'classname'                   => 'widget_agncy_breadcrumbs',
			'description'                 => __( 'Display breadcrubs, if there is a compatible plugin active.', 'agncy' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array(
			'width'  => 400,
			'height' => 350,
		);
		parent::__construct( 'agncy_breadcrumbs', __( 'Breadcrumbs', 'agncy' ), $widget_ops, $control_ops );
	}

	/**
	 * Outputs the content for the current widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Text widget instance.
	 */
	public function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo wp_kses_post( $args['before_widget'] );
		if ( ! empty( $title ) ) {
			echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );
		}

		?>
			<div class="breadcrumbs"><?php echo ( apply_filters( 'agncy_breadcrumb', null ) ); // WPCS: XSS ok. ?></div>
		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	/**
	 * Handles updating settings for the current widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Settings to save or bool false to cancel saving.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );

		/*
		 * Re-use legacy 'filter' (wpautop) property to now indicate content filters will always apply.
		 * Prior to 4.8, this is a boolean value used to indicate whether or not wpautop should be
		 * applied. By re-using this property, downgrading WordPress from 4.8 to 4.7 will ensure
		 * that the content for Text widgets created with TinyMCE will continue to get wpautop.
		 */

		return $instance;
	}

	/**
	 * Outputs the Text widget settings form.
	 *
	 * @since 2.8.0
	 * @since 4.8.0 Form only contains hidden inputs which are synced with JS template.
	 * @access public
	 * @see WP_Widget_Visual_Text::render_control_template_scripts()
	 *
	 * @param array $instance Current settings.
	 * @return void
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title    = $instance['title'];
		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'agncy' ); ?> <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></label></p>
		<?php
	}
}
