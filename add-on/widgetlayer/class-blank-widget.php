<?php
/**
 * Widget API: Blank_Widget class
 *
 * @package Aamla
 * @since 1.0.1
 */

namespace aamla;

/**
 * Class used to display Blank widget.
 *
 * @since 1.0.1
 *
 * @see WP_Widget
 */
class Blank_Widget extends \WP_Widget {

	/**
	 * Sets up a new Blank widget instance.
	 *
	 * @since 1.0.1
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'blank_widget',
			'description'                 => esc_html__( 'Create a blank widget.', 'aamla' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'aamla_blank_widget', esc_html__( 'Blank Widget', 'aamla' ), $widget_ops );
		add_filter( 'aamla_widget_custom_css', [ $this, 'add_widget_css' ], 10, 2 );
	}

	/**
	 * Outputs the content for the current widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current widget instance.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'] . $args['after_widget']; // WPCS xss ok. Contains HTML.
	}

	/**
	 * Outputs the settings form for the widget.
	 *
	 * @since 1.0.1
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance,
			[
				'widget_height'     => 0,
				'widget_height_tab' => 0,
			]
		);
		?>
		<p class="options-widget">
			<?php esc_html_e( 'This is an aamla theme widgetlayer specific widget. It should not be used outside widgetlayer widget area.', 'aamla' ); ?>
		</p>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'widget_height' ) ); ?>"><?php esc_html_e( 'Height on desktop (in px):', 'aamla' ); ?></label>
		<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'widget_height' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'widget_height' ) ); ?>" type="number" step="1" value="<?php echo absint( $instance['widget_height'] ); ?>" size="3" /></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'widget_height_tab' ) ); ?>"><?php esc_html_e( 'Height on tablet (in px):', 'aamla' ); ?></label>
		<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'widget_height_tab' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'widget_height_tab' ) ); ?>" type="number" step="1" value="<?php echo absint( $instance['widget_height_tab'] ); ?>" size="3" /></p>

		<?php
	}

	/**
	 * Handles updating the settings for the current widget instance.
	 *
	 * @since 1.0.1
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$new_instance                  = wp_parse_args( (array) $new_instance, [ 'widget_height' => 0 ] );
		$instance                      = $old_instance;
		$instance['widget_height']     = absint( $new_instance['widget_height'] );
		$instance['widget_height_tab'] = absint( $new_instance['widget_height_tab'] );
		return $instance;
	}

	/**
	 * Adds widget specific css to front end.
	 *
	 * @since 1.0.1
	 *
	 * @param array $css          Array of css rules.
	 * @param array $widget_data {.
	 *     @type str   $widget_id  Widget ID.
	 *     @type int   $widget_pos Widget position in widgetlayer widget-area.
	 *     @type array $instance   Current widget instance settings.
	 *     @type str   $id_base    Widget ID base.
	 * }
	 * @return array
	 */
	public function add_widget_css( $css, $widget_data ) {
		if ( 'aamla_blank_widget' !== $widget_data[3] ) {
			return $css;
		}
		$settings        = $widget_data[2];
		$css['common'][] = 'margin-bottom: 0';
		$css['common'][] = 'padding-top: 0';
		$css['common'][] = 'padding-bottom: 0';
		if ( isset( $settings['widget_height'] ) ) {
			$css['desktop'][] = 'height: ' . absint( $settings['widget_height'] ) . 'px';
		}
		if ( isset( $settings['widget_height_tab'] ) ) {
			$css['tablet_only'][] = 'height: ' . absint( $settings['widget_height_tab'] ) . 'px';
		}
		return $css;
	}
}
