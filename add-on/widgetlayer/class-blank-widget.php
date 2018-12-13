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
		add_filter( 'aamla_widgetlayer_widget_options', [ $this, 'widget_options' ] );
		add_filter( 'aamla_widget_custom_classes', [ $this, 'widget_classes' ], 10, 3 );
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
		?>
		<p class="options-widget">
			<?php esc_html_e( 'This is an aamla theme widgetlayer specific widget. It should not be used outside widgetlayer widget area.', 'aamla' ); ?>
		</p>
		<?php
	}

	/**
	 * Adds widget specific form options on admin pages.
	 *
	 * @since 1.0.2
	 *
	 * @param array $options Widget Options.
	 * @return array
	 */
	public function widget_options( $options ) {
		$blank_widget_options = [
			'aamla_blank_widget_height'        => [
				'setting'     => 'aamla_blank_widget_height',
				'label'       => esc_html__( 'Height on desktop (in px):', 'aamla' ),
				'default'     => 0,
				'type'        => 'number',
				'id_base'     => 'aamla_blank_widget',
				'input_attrs' => [
					'step' => 1,
					'size' => 3,
				],
			],
			'aamla_blank_widget_height_tablet' => [
				'setting'     => 'aamla_blank_widget_height_tablet',
				'label'       => esc_html__( 'Height on Tablet (in px):', 'aamla' ),
				'default'     => 0,
				'type'        => 'number',
				'id_base'     => 'aamla_blank_widget',
				'input_attrs' => [
					'step' => 1,
					'size' => 3,
				],
			],
			'aamla_show_divider_line'          => [
				'setting' => 'aamla_show_divider_line',
				'label'   => esc_html__( 'Horizontal divider line', 'aamla' ),
				'default' => esc_html__( 'None', 'aamla' ),
				'type'    => 'select',
				'id_base' => 'aamla_blank_widget',
				'choices' => [
					'wide-width' => esc_html__( 'Wide Line', 'aamla' ),
					'full-bleed' => esc_html__( 'Full bleed line', 'aamla' ),
				],
			],
		];

		return array_merge( $blank_widget_options, $options );
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
		if ( isset( $settings['aamla_blank_widget_height'] ) ) {
			$css['desktop'][] = 'height: ' . absint( $settings['aamla_blank_widget_height'] ) . 'px';
		}
		if ( isset( $settings['aamla_blank_widget_height_tablet'] ) ) {
			$css['tablet_only'][] = 'height: ' . absint( $settings['aamla_blank_widget_height_tablet'] ) . 'px';
		}
		return $css;
	}

	/**
	 * Adds widget specific css to front end.
	 *
	 * @since 1.0.1
	 *
	 * @param array $classes  Array of css rules.
	 * @param array $widget_data {
	 *     Current widget's data to generate customized output.
	 *     @type str   $widget_id  Widget ID.
	 *     @type int   $widget_pos Widget position in widgetlayer widget-area.
	 *     @type array $instance   Current widget instance settings.
	 *     @type str   $id_base    Widget ID base.
	 * }
	 * @return array
	 */
	public function widget_classes( $classes, $widget_data ) {

		$instance = $widget_data[2];
		$id_base  = $widget_data[3];

		if ( 'aamla_blank_widget' === $id_base ) {
			if ( isset( $instance['aamla_show_divider_line'] ) ) {
				if ( 'wide-width' === $instance['aamla_show_divider_line'] ) {
					$classes[] = 'has-ww-line';
				} elseif ( 'full-bleed' === $instance['aamla_show_divider_line'] ) {
					$classes[] = 'has-fb-line';
				}
			}
		}

		return $classes;
	}
}
