<?php
/**
 * Build page using widget layout methods.
 *
 * @package Bayleaf
 * @since 1.0.0
 */

namespace bayleaf;

/**
 * Build page using widget layout methods.
 *
 * @since  1.0.0
 */
class WidgetLayer_Pro {

	/**
	 * Holds the instance of this class.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    object
	 */
	protected static $instance = null;

	/**
	 * Id base for which custom widget option to be applied.
	 *
	 * @since  1.0.0
	 * @var    array
	 */
	private $id_base = [];

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 */
	public function __construct() {
		$this->id_base = [
			'bayleaf_widget_featured_image' => [ 'mc4wp_form_widget' ],
		];
	}

	/**
	 * Returns the instance of this class.
	 *
	 * @since  1.0.0
	 *
	 * @return object Instance of this class.
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Register hooked functions.
	 *
	 * @since 1.0.0
	 */
	public static function init() {
		add_filter( 'bayleaf_widgetlayer_widget_options', [ self::get_instance(), 'widget_options' ] );
		add_filter( 'bayleaf_custom_widget_form_update', [ self::get_instance(), 'update_widget_form' ], 10, 3 );
		add_filter( 'bayleaf_custom_widget_form', [ self::get_instance(), 'image_upload_form' ], 10, 5 );
		add_filter( 'bayleaf_before_widget_content', [ self::get_instance(), 'display_widget_image' ], 10, 2 );
		add_filter( 'bayleaf_after_widget_content', [ self::get_instance(), 'widget_wrapper_close' ], 10, 2 );
		add_action( 'admin_enqueue_scripts', [ self::get_instance(), 'enqueue_admin' ] );
	}

	/**
	 * Enqueue scripts and styles to admin.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_admin() {

		wp_enqueue_media();

		wp_enqueue_script(
			'bayleaf_widgetlayer_pro_admin_js',
			get_template_directory_uri() . '/add-on/widgetlayer-pro/admin/widgetlayer.js',
			[ 'jquery' ],
			BAYLEAF_THEME_VERSION,
			true
		);

		// Theme localize scripts data.
		$l10n = apply_filters( 'bayleaf_localize_script_data',
			[
				'uploader_title'       => esc_html__( 'Set Image', 'bayleaf' ),
				'uploader_button_text' => esc_html__( 'Select', 'bayleaf' ),
				'set_featured_img'     => esc_html__( 'Set Image', 'bayleaf' ),
			]
		);
		wp_localize_script( 'bayleaf_widgetlayer_pro_admin_js', 'bayleafImageUploadText', $l10n );
	}

	/**
	 * Get array of all widget options.
	 *
	 * @since 1.0.0
	 *
	 * @param array $options Array of widget options.
	 */
	public function widget_options( $options ) {

		return array_merge( $options,
			[
				'bayleaf_widget_featured_image' => [
					'setting' => 'bayleaf_widget_featured_image',
					'label'   => esc_html__( 'Widget Featured Image', 'bayleaf' ),
					'type'    => 'custom',
					'id_base' => $this->id_base['bayleaf_widget_featured_image'],
				],
			]
		);
	}

	/**
	 * Update current widget instance's setting value.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $value        Current widget instance's setting value.
	 * @param str   $setting      Specific setting of current widget instance.
	 * @param array $new_instance Array of new widget settings.
	 * @return mixed
	 */
	public function update_widget_form( $value, $setting, $new_instance ) {

		if ( 'bayleaf_widget_featured_image' !== $setting ) {
			return $value;
		}

		$img_id  = absint( $new_instance[ $setting ] );
		$img_url = wp_get_attachment_image_src( $img_id );
		$value   = $img_url ? $img_id : $value;

		return $value;
	}

	/**
	 * Image upload option markup.
	 *
	 * @since 1.0.2
	 *
	 * @param str $markup  Widget form image upload markup.
	 * @param str $setting Setting Name.
	 * @param str $id      Field ID.
	 * @param str $name    Field Name.
	 * @param int $value   Uploaded image id.
	 * @return str Widget form image upload markup.
	 */
	public function image_upload_form( $markup, $setting, $id, $name, $value ) {
		if ( 'bayleaf_widget_featured_image' !== $setting ) {
			return $markup;
		}

		$value          = absint( $value );
		$uploader_class = '';
		$class          = 'bayleaf-hidden';

		if ( $value ) {
			$image_src = wp_get_attachment_image_src( $value, 'bayleaf-medium' );
			if ( $image_src ) {
				$featured_markup = sprintf( '<img class="custom-widget-thumbnail" src="%s">', esc_url( $image_src[0] ) );
				$class           = '';
				$uploader_class  = 'has-image';
			} else {
				$featured_markup = esc_html__( 'Set Featured Image', 'bayleaf' );
			}
		} else {
			$featured_markup = esc_html__( 'Set Featured Image', 'bayleaf' );
		}

		$markup  = sprintf( '<a class="bayleaf-widget-img-uploader %s">%s</a>', $uploader_class, $featured_markup );
		$markup .= sprintf( '<span class="bayleaf-widget-img-instruct %s">%s</span>', $class, esc_html__( 'Click the image to edit/update', 'bayleaf' ) );
		$markup .= sprintf( '<a class="bayleaf-widget-img-remover %s">%s</a>', $class, esc_html__( 'Remove Featured Image', 'bayleaf' ) );
		$markup .= sprintf( '<input class="bayleaf-widget-img-id" name="%s" id="%s" value="%s" type="hidden" />', $name, $id, $value );
		return $markup;
	}

	/**
	 * Display featured image before text widget (if any).
	 *
	 * @since 1.0.0
	 *
	 * @param str   $markup Widget customized content markup.
	 * @param array $widget_data {
	 *     Current widget's data to generate customized output.
	 *     @type str   $widget_id  Widget ID.
	 *     @type int   $widget_pos Widget position in widgetlayer widget-area.
	 *     @type array $instance   Current widget instance settings.
	 *     @type str   $id_base    Widget ID base.
	 * }
	 * @return string Widget customized content markup.
	 */
	public function display_widget_image( $markup, $widget_data ) {

		$instance = $widget_data[2];
		$id_base  = $widget_data[3];

		// Generate markup for text widget featured image.
		if ( in_array( $id_base, $this->id_base['bayleaf_widget_featured_image'], true ) && isset( $instance['bayleaf_widget_featured_image'] ) ) {
			$image_id = absint( $instance['bayleaf_widget_featured_image'] );
			if ( $image_id ) {
				$classes    = [];
				$image_size = apply_filters( 'bayleaf_widget_image_size', 'bayleaf-large', $widget_data );
				$classes[]  = 'widget-bg-featured-image';
				$classes    = apply_filters( 'bayleaf_widget_image_classes', $classes, $widget_data );
				$img_markup = wp_get_attachment_image( $image_id, $image_size, false, [ 'class' => join( ' ', $classes ) ] );

				$markup = sprintf( '<div class="custom-widget-thumbnail"><div class="thumb-wrapper">%s</div></div><div class="custom-widget-content"><div class="custom-content-wrapper">', $img_markup );
			}
		}

		return $markup;
	}

	/**
	 * Markup after text widget (if any).
	 *
	 * @since 1.0.0
	 *
	 * @param str   $markup Widget customized content markup.
	 * @param array $widget_data {
	 *     Current widget's data to generate customized output.
	 *     @type str   $widget_id  Widget ID.
	 *     @type int   $widget_pos Widget position in widgetlayer widget-area.
	 *     @type array $instance   Current widget instance settings.
	 *     @type str   $id_base    Widget ID base.
	 * }
	 * @return string Widget customized content markup.
	 */
	public function widget_wrapper_close( $markup, $widget_data ) {

		$instance = $widget_data[2];
		$id_base  = $widget_data[3];

		// Generate markup for text widget featured image.
		if ( in_array( $id_base, $this->id_base['bayleaf_widget_featured_image'], true ) && isset( $instance['bayleaf_widget_featured_image'] ) ) {
			$image_id = absint( $instance['bayleaf_widget_featured_image'] );
			if ( $image_id ) {

				$markup = '</div></div>';
			}
		}

		return $markup;
	}
}

WidgetLayer_Pro::init();
