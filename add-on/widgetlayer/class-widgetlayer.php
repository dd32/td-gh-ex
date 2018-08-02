<?php
/**
 * Build page using widget layout methods.
 *
 * @package Aamla
 * @since 1.0.1
 */

namespace aamla;

/**
 * Build page using widget layout methods.
 *
 * @since  1.0.1
 */
class WidgetLayer {

	/**
	 * Holds the instance of this class.
	 *
	 * @since  1.0.1
	 * @access protected
	 * @var    object
	 */
	protected static $instance = null;

	/**
	 * Array of all widget settings.
	 *
	 * @since  1.0.1
	 * @var    array
	 */
	private $widget_options = [];

	/**
	 * Array of pages having custom widget option enabled.
	 *
	 * @since  1.0.1
	 * @var    array
	 */
	private $pages_with_custom_widget = [];

	/**
	 * Constructor method.
	 *
	 * @since  1.0.1
	 */
	public function __construct() {}

	/**
	 * Returns the instance of this class.
	 *
	 * @since  1.0.1
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
	 * @since 1.0.1
	 */
	public static function init() {
		add_action( 'wp_enqueue_scripts', [ self::get_instance(), 'enqueue_front' ] );
		add_action( 'admin_enqueue_scripts', [ self::get_instance(), 'enqueue_admin' ] );
		add_action( 'aamla_inside_header', [ self::get_instance(), 'skip_link' ], -1 );
		add_action( 'aamla_after_header', [ self::get_instance(), 'display_widget_areas' ] );
		add_action( 'widgets_init', [ self::get_instance(), 'register_custom_widget' ] );
		add_action( 'in_widget_form', [ self::get_instance(), 'extend_widget_form' ], 9, 3 );
		add_action( 'add_meta_boxes', [ self::get_instance(), 'add_custom_widget_metabox' ], 10, 2 );
		add_action( 'save_post', [ self::get_instance(), 'save_widget_metabox' ], 10, 2 );
		add_action( 'delete_post', [ self::get_instance(), 'delete_pages_with_custom_widget' ] );
		add_filter( 'aamla_register_sidebar', [ self::get_instance(), 'register_widget_areas' ] );
		add_filter( 'dynamic_sidebar_params', [ self::get_instance(), 'add_widget_customizations' ] );
		add_filter( 'widget_update_callback', [ self::get_instance(), 'update_settings' ], 10, 2 );
		add_filter( 'aamla_widget_custom_classes', [ self::get_instance(), 'widget_classes' ], 10, 3 );
		add_filter( 'aamla_custom_widget_form', [ self::get_instance(), 'image_upload' ], 10, 5 );
	}

	/**
	 * Enqueue scripts and styles to front end.
	 *
	 * @since 1.0.1
	 */
	public function enqueue_front() {
		if ( ! is_singular( 'page' ) ) {
			return;
		}
		wp_enqueue_style(
			'aamla_widgetlayer_style',
			get_template_directory_uri() . '/add-on/widgetlayer/assets/widgetlayer.css',
			array(),
			AAMLA_THEME_VERSION,
			'all'
		);
		$inline_style = $this->generate_custom_css();
		wp_add_inline_style( 'aamla_widgetlayer_style', $inline_style );
	}

	/**
	 * Conditionally display skip link.
	 *
	 * @since 1.0.2
	 */
	public function skip_link() {
		if ( ! is_singular( 'page' ) ) {
			return;
		}

		// Get current page ID.
		$page_id = get_the_ID();

		// Display new skip link markup, if current page have widgetlayer custom widget area.
		if ( array_key_exists( $page_id, $this->get_pages_with_custom_widget() ) ) {
			// Remove default action hook to display skip link.
			remove_action( 'aamla_inside_header', 'aamla_skip_link', 0 );

			// Display revised skip link.
			printf( '<a class="skip-link screen-reader-text" href="#page-widget-area-top">%s</a>',
				esc_html__( 'Skip to content', 'aamla' )
			);
		}
	}

	/**
	 * Enqueue scripts and styles to admin.
	 *
	 * @since 1.0.1
	 */
	public function enqueue_admin() {
		$screen = get_current_screen();
		if ( in_array( $screen->id, [ 'page', 'widgets', 'customize' ], true ) ) {
			wp_enqueue_media();

			wp_enqueue_style(
				'aamla_widgetlayer_admin_style',
				get_template_directory_uri() . '/add-on/widgetlayer/admin/widgetlayer.css',
				[],
				AAMLA_THEME_VERSION,
				'all'
			);

			wp_enqueue_script(
				'aamla_widgetlayer_admin_js',
				get_template_directory_uri() . '/add-on/widgetlayer/admin/widgetlayer.js',
				[ 'jquery' ],
				AAMLA_THEME_VERSION,
				true
			);

			// Theme localize scripts data.
			$l10n = apply_filters( 'aamla_localize_script_data',
				[
					'uploader_title'       => esc_html__( 'Set Text Widget Featured Image', 'aamla' ),
					'uploader_button_text' => esc_html__( 'Select', 'aamla' ),
					'set_featured_img'     => esc_html__( 'Set Featured Image', 'aamla' ),
				]
			);
			wp_localize_script( 'aamla_widgetlayer_admin_js', 'aamlaImageUploadText', $l10n );
		}
	}

	/**
	 * Generate inline css for current page.
	 *
	 * @since 1.0.1
	 *
	 * @return string Verified css string or empty string.
	 */
	public function generate_custom_css() {
		$page_id = get_the_ID();
		if ( ! $page_id ) {
			return '';
		}

		// We will put inline css to individual widgets separately in customize preview.
		if ( is_customize_preview() ) {
			return '';
		}

		// Return if current page does not have widgetlayer custom widget area.
		if ( ! array_key_exists( $page_id, $this->get_pages_with_custom_widget() ) ) {
			return '';
		}

		// Return if current page's widgetlayer custom widget area is not active.
		if ( ! is_active_sidebar( 'widgetlayer-page-' . $page_id ) ) {
			return '';
		}

		$css_array        = [];
		$sidebars_widgets = get_option( 'sidebars_widgets', [] );
		foreach ( $sidebars_widgets[ 'widgetlayer-page-' . $page_id ] as $widget ) {
			$widget_data = $this->get_widget_data_from_id( $page_id, $widget );
			if ( false === $widget_data ) {
				continue;
			}
			$css_array = array_merge_recursive( $css_array, $this->get_widget_css( $widget_data ) );
		}
		$final_css = $css_array ? $this->widget_css_array_to_string( $css_array ) : '';

		return $final_css;
	}

	/**
	 * Get dynamically generated inline css from widget id.
	 *
	 * @since 1.0.1
	 *
	 * @param array $widget_data {
	 *     Current widget's data to generate customized output.
	 *     @type str   $widget_id  Widget ID.
	 *     @type int   $widget_pos Widget position in widgetlayer widget-area.
	 *     @type array $instance   Current widget instance settings.
	 *     @type str   $id_base    Widget ID base.
	 * }
	 * @return string Verified css string or empty string.
	 */
	public function get_widget_css( $widget_data ) {
		if ( ! $widget_data || ! is_array( $widget_data ) ) {
			return [];
		}

		$widget_id  = isset( $widget_data[0] ) ? $widget_data[0] : false;
		$widget_pos = isset( $widget_data[1] ) ? $widget_data[1] : false;
		$instance   = isset( $widget_data[2] ) ? $widget_data[2] : false;
		$id_base    = isset( $widget_data[3] ) ? $widget_data[3] : false;

		if ( false === $widget_id || false === $widget_pos || false === $instance || false === $id_base ) {
			return [];
		}

		$widget_css             = [];
		$widget_css['common'][] = 'order:' . 2 * $widget_pos;
		$wid_settings           = array_intersect_key( $instance, $this->get_widget_options() );

		if ( ! empty( $wid_settings ) ) {
			foreach ( $this->get_widget_options() as $key => $args ) {
				if ( ! isset( $instance[ $key ] ) || '' === $instance[ $key ] ) {
					continue;
				}
				$val = $instance[ $key ];
				switch ( $key ) {
					case 'aamla_width':
						if ( '' !== $instance['aamla_width_tablet'] ) {
							$widget_css['desktop'][] = sprintf( 'flex: 0 0 %s%%', absint( $val ) );
						} else {
							$widget_css['tablet'][] = sprintf( 'flex: 0 0 %s%%', absint( $val ) );
						}
						break;
					case 'aamla_width_tablet':
						$widget_css['tablet'][] = sprintf( 'flex: 0 0 %s%%', absint( $val ) );
						break;
					case 'aamla_vert_align':
						$widget_css['tablet'][] = 'display:flex';
						$widget_css['tablet'][] = 'flex-direction:column';
						$widget_css['tablet'][] = ( 'middle' === $val ) ? 'justify-content:center' : 'justify-content:flex-end';
						break;
					case 'aamla_text_align':
						$widget_css['common'][] = ( 'center' === $val ) ? 'text-align:center' : 'text-align:right';
						break;
					case 'aamla_show_mobile':
						$widget_css['mobile_only'][] = 'display:none';
						break;
					case 'aamla_push_down':
						$widget_css['mobile_only'][] = 'order:' . ( 2 * ( $widget_pos + 1 ) + 1 );
						break;
					case 'aamla_push_down_tablet':
						$widget_css['tablet_only'][] = 'order:' . ( 2 * ( $widget_pos + 1 ) + 1 );
						break;
					default:
						break;
				}
			}
		}

		$widget_css = apply_filters( 'aamla_widget_custom_css', $widget_css, $widget_data );

		if ( ! empty( $widget_css ) ) {
			foreach ( $widget_css as $key => $rules ) {
				$widget_css[ $key ] = (array) sprintf( '.widgetlayer .%s{%s}', $widget_id, implode( ';', $rules ) );
			}
		}

		return $widget_css;
	}

	/**
	 * Properly format Widget CSS array to css string.
	 *
	 * @since 1.0.1
	 *
	 * @param array $css_arr Array of css strings.
	 * @return string Formatted css string.
	 */
	public function widget_css_array_to_string( $css_arr ) {
		if ( empty( $css_arr ) ) {
			return '';
		}

		$css_str = '';

		if ( isset( $css_arr['common'] ) ) {
			$css_str .= implode( '', $css_arr['common'] );
		}

		if ( isset( $css_arr['mobile_only'] ) ) {
			$css_str .= sprintf( '@media only screen and (max-width: %s) {%s}', '767px', implode( '', $css_arr['mobile_only'] ) );
		}

		if ( isset( $css_arr['tablet'] ) ) {
			$css_str .= sprintf( '@media only screen and (min-width: %s) {%s}', '768px', implode( '', $css_arr['tablet'] ) );
		}

		if ( isset( $css_arr['tablet_only'] ) ) {
			$css_str .= sprintf( '@media only screen and (min-width: %s) and (max-width: %s) {%s}', '768px', '1024px', implode( '', $css_arr['tablet_only'] ) );
		}

		if ( isset( $css_arr['desktop'] ) ) {
			$css_str .= sprintf( '@media only screen and (min-width: %s) {%s}', '1025px', implode( '', $css_arr['desktop'] ) );
		}

		if ( ! $css_str ) {
			return '';
		}

		return aamla_prepare_css( $css_str );
	}

	/**
	 * Get dynamically generated Widget html classes.
	 *
	 * @since 1.0.1
	 *
	 * @param array $widget_data {
	 *     Current widget's data to generate customized output.
	 *     @type str   $widget_id  Widget ID.
	 *     @type int   $widget_pos Widget position in widgetlayer widget-area.
	 *     @type array $instance   Current widget instance settings.
	 *     @type str   $id_base    Widget ID base.
	 * }
	 * @return array  Verified class string or empty string.
	 */
	public function get_widget_classes( $widget_data ) {
		if ( ! $widget_data || ! is_array( $widget_data ) ) {
			return '';
		}

		$widget_id  = isset( $widget_data[0] ) ? $widget_data[0] : false;
		$widget_pos = isset( $widget_data[1] ) ? $widget_data[1] : false;
		$instance   = isset( $widget_data[2] ) ? $widget_data[2] : false;
		$id_base    = isset( $widget_data[3] ) ? $widget_data[3] : false;

		if ( false === $widget_id || false === $widget_pos || false === $instance || false === $id_base ) {
			return '';
		}

		$widget_classes   = [];
		$widget_classes[] = 'brick-' . $widget_pos;
		$widget_classes   = apply_filters( 'aamla_widget_custom_classes', $widget_classes, $id_base, $instance, $widget_id );
		$widget_classes   = array_map( 'esc_attr', $widget_classes );
		$widget_classes   = array_unique( $widget_classes );

		return join( ' ', $widget_classes );
	}

	/**
	 * Adds widget specific css to front end.
	 *
	 * @since 1.0.1
	 *
	 * @param array  $classes  Array of css rules.
	 * @param string $type     Type of widget (id_base).
	 * @param array  $settings Array of settings for widget instance.
	 * @return array
	 */
	public function widget_classes( $classes, $type, $settings ) {
		if ( 'text' === $type ) {
			if ( isset( $settings['text'] ) && empty( $settings['text'] ) ) {
				$classes[] = 'only-title';
			}
			if ( isset( $settings['aamla_text_featured_image'] ) && absint( $settings['aamla_text_featured_image'] ) ) {
				$classes[] = 'has-featured-image';
			}
		}

		return $classes;
	}

	/**
	 * Register widget area.
	 *
	 * @since 1.0.1
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 *
	 * @param array $widgets Array of arguments for the sidebar being registered.
	 * @return array Array of arguments for the sidebar being registered.
	 */
	public function register_widget_areas( $widgets ) {
		foreach ( $this->get_pages_with_custom_widget() as $id => $title ) {
			array_push( $widgets,
				[
					'name'          => esc_html__( 'Page - ', 'aamla' ) . esc_html( $title ),
					'id'            => 'widgetlayer-page-' . absint( $id ),
					'before_widget' => '<section id="%1$s" class="widget brick %2$s">',
				]
			);
		}
		return $widgets;
	}

	/**
	 * Display widgets.
	 *
	 * @since 1.0.1
	 *
	 * @param string $calledby Hook by which this function is called.
	 */
	public function display_widget_areas( $calledby ) {
		if ( is_singular( 'page' ) && 'after_header' === $calledby ) {
			$page_id = get_the_ID();
			if ( ! $page_id || ! array_key_exists( $page_id, $this->get_pages_with_custom_widget() ) ) {
				return;
			}
			aamla_widgets(
				'page-widget-area-top',
				'page-widget-area-top widgetlayer wrapper',
				esc_html__( 'Page Content Below Site Header', 'aamla' ),
				'widgetlayer-page-' . $page_id,
				false
			);
		}
	}

	/**
	 * Get array of all pages having custom widget enabaled.
	 *
	 * @since 1.0.1
	 */
	public function get_pages_with_custom_widget() {
		if ( ! empty( $this->pages_with_custom_widget ) ) {
			return $this->pages_with_custom_widget;
		}

		$pages = get_option( 'aamla_pages_with_custom_widget' );
		if ( false !== $pages ) {
			$this->pages_with_custom_widget = $pages;
			return $pages;
		}

		$pages = [];
		$args  = [
			'post_type'   => 'page',
			'post_status' => 'publish',
			'meta_query'  => [
				[
					'key'     => 'aamla_custom_widget_meta',
					'compare' => 'EXISTS',
				],
			],
		];
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$pages[ $query->post->ID ] = esc_html( get_the_title() );
			}
			// Reset our postdata.
			wp_reset_postdata();
			update_option( 'aamla_pages_with_custom_widget', $pages );
			$this->pages_with_custom_widget = $pages;
		}

		return $pages;
	}

	/**
	 * Get array of all widget options.
	 *
	 * @since 1.0.1
	 */
	public function get_widget_options() {
		if ( ! empty( $this->widget_options ) ) {
			return $this->widget_options;
		}

		$this->widget_options = apply_filters( 'aamla_widgetlayer_widget_options',
			[
				'aamla_width'               => [
					'setting'     => 'aamla_width',
					'label'       => esc_html__( 'Width on desktop (in %)', 'aamla' ),
					'default'     => 100,
					'type'        => 'number',
					'input_attrs' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 0.01,
					],
				],
				'aamla_width_tablet'        => [
					'setting'     => 'aamla_width_tablet',
					'label'       => esc_html__( 'Width on tablet (in %)', 'aamla' ),
					'default'     => '',
					'type'        => 'number',
					'input_attrs' => [
						'min'         => 0,
						'max'         => 100,
						'step'        => 0.01,
						'placeholder' => 'Same as desktop',
					],
				],
				'aamla_vert_align'          => [
					'setting' => 'aamla_vert_align',
					'label'   => esc_html__( 'Content Vertical Alignment', 'aamla' ),
					'default' => esc_html__( 'Top', 'aamla' ),
					'type'    => 'select',
					'choices' => [
						'middle' => esc_html__( 'Middle', 'aamla' ),
						'bottom' => esc_html__( 'Bottom', 'aamla' ),
					],
				],
				'aamla_text_align'          => [
					'setting' => 'aamla_text_align',
					'label'   => esc_html__( 'Text Alignment', 'aamla' ),
					'default' => esc_html__( 'Left', 'aamla' ),
					'type'    => 'select',
					'choices' => [
						'center' => esc_html__( 'Center', 'aamla' ),
						'right'  => esc_html__( 'Right', 'aamla' ),
					],
				],
				'aamla_show_mobile'         => [
					'setting' => 'aamla_show_mobile',
					'label'   => esc_html__( 'Hide widget on mobile', 'aamla' ),
					'type'    => 'checkbox',
				],
				'aamla_push_down_tablet'    => [
					'setting' => 'aamla_push_down_tablet',
					'label'   => esc_html__( 'Move below next widget on tablet', 'aamla' ),
					'type'    => 'checkbox',
				],
				'aamla_push_down'           => [
					'setting' => 'aamla_push_down',
					'label'   => esc_html__( 'Move below next widget on mobile', 'aamla' ),
					'type'    => 'checkbox',
				],
				'aamla_text_featured_image' => [
					'setting' => 'aamla_text_featured_image',
					'label'   => esc_html__( 'Text Widget Featured Image', 'aamla' ),
					'type'    => 'custom',
					'id_base' => 'text',
				],
			]
		);

		return $this->widget_options;
	}

	/**
	 * Adds a text filed to widgets for adding classes.
	 *
	 * @since 1.0.1
	 *
	 * @param object $widget The widget instance (passed by reference).
	 * @param null   $return Return null if new fields are added.
	 * @param array  $instance An array of the widget's settings.
	 */
	public function extend_widget_form( $widget, $return, $instance ) {
		$fields = [];
		foreach ( $this->get_widget_options() as $option => $value ) {
			$setting     = $value['setting'];
			$id          = esc_attr( $widget->get_field_id( $setting ) );
			$name        = esc_attr( $widget->get_field_name( $setting ) );
			$instance    = wp_parse_args( $instance, [ $setting => '' ] );
			$value       = wp_parse_args( $value,
				[
					'default'        => '',
					'description'    => '',
					'id_base'        => 'all',
					'premium_option' => false,
				]
			);
			$input_attrs = isset( $value['input_attrs'] ) ? (array) $value['input_attrs'] : [];
			$description = $value['description'] ? sprintf( '<span class="%s wid-setting-desc">%s</span>', esc_attr( $value['setting'] ) . '-desc', esc_html( $value['description'] ) ) : '';

			// Check if current Widget Option to be shown for this widget type.
			if ( 'all' !== $value['id_base'] && $widget->id_base !== $value['id_base'] ) {
				continue;
			}

			// Prepare markup for custom widget options.
			if ( current_user_can( 'edit_theme_options' ) ) {
				switch ( $value['type'] ) {
					case 'select':
						$field  = '<label for="' . $id . '">' . $value['label'] . ': </label>';
						$field .= $description;
						// Select option field.
						$field .= sprintf( '<select name="%s" id="%s">', $name, $id );
						$field .= sprintf( '<option value="">%s</option>', $value['default'] );
						foreach ( $value['choices'] as $val => $label ) {
							$field .= sprintf( '<option value="%s" %s>%s</option>',
								esc_attr( $val ),
								selected( $instance[ $setting ], $val, false ),
								$label
							);
						}
						$field .= '</select>';
						$field  = sprintf( '<p class="%s widget-setting">%s</p>', esc_attr( $setting ), $field );
						break;
					case 'checkbox':
						$field  = sprintf( '<input name="%s" id="%s" type="checkbox" value="yes" %s />', $name, $id, checked( $instance[ $setting ], 'yes' ) );
						$field .= '<label for="' . $id . '">' . $value['label'] . '</label>';
						$field .= $description;
						$field  = sprintf( '<p class="%s widget-small-text">%s</p>', esc_attr( $setting ), $field );
						break;
					case 'custom':
						$field  = '<label for="' . $id . '">' . $value['label'] . '</label>';
						$field .= $description;
						$field .= apply_filters( 'aamla_custom_widget_form', '', $setting, $id, $name, $instance[ $setting ] );
						$field  = sprintf( '<p class="%s  widget-setting">%s</p>', esc_attr( $setting ), $field );
						break;
					default:
						$field  = '<label for="' . $id . '">' . $value['label'] . ': </label>';
						$field .= $description;
						$field .= sprintf( '<input name="%s" id="%s" type="%s" ', $name, $id, esc_attr( $value['type'] ) );
						foreach ( $input_attrs as $attr => $val ) {
							$field .= esc_html( $attr ) . '="' . esc_attr( $val ) . '" ';
						}
						if ( ! isset( $input_attrs['value'] ) ) {
							$field .= sprintf( 'value=%s', ( '' !== $instance[ $setting ] ) ? $instance[ $setting ] : $value['default'] );
						}
						$field .= ' />';
						$field  = sprintf( '<p class="%s widget-setting">%s</p>', esc_attr( $setting ), $field );
						break;
				}
				if ( false === $value['premium_option'] ) {
					$fields['basic'][] = $field;
				} else {
					$fields['premium'][] = $field;
				}
			} else {
				?>
				<input type="hidden" name="<?php echo esc_attr( $widget->get_field_name( $setting ) ); ?>" value="<?php echo esc_attr( $instance[ $setting ] ); ?>" />
				<?php
			}
		}

		if ( ! empty( $fields ) ) {
			// Add widget options title.
			$title = sprintf( '<h4 class="widget-options-title">%s</h4>', esc_html__( 'Theme specific styling options', 'aamla' ) );

			// Add widget Options Content.
			$content = sprintf( '<div class="widget-options-content">%s</div>', implode( '', $fields['basic'] ) );

			// Display Widget Options.
			printf( '<div class="widget-options-section">%s%s</div>', $title, $content ); // WPCS xss ok. Contains HTML, other values escaped.
		}
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
	public function image_upload( $markup, $setting, $id, $name, $value ) {
		if ( 'aamla_text_featured_image' !== $setting ) {
			return $markup;
		}

		$value          = absint( $value );
		$uploader_class = '';
		$class          = 'aamla-hidden';

		if ( $value ) {
			$image_src = wp_get_attachment_image_src( $value, 'aamla-medium' );
			if ( $image_src ) {
				$featured_markup = sprintf( '<img class="text-widget-thumbnail" src="%s">', esc_url( $image_src[0] ) );
				$class           = '';
				$uploader_class  = 'has-image';
			} else {
				$featured_markup = esc_html( 'Set Featured Image', 'aamla' );
			}
		} else {
			$featured_markup = esc_html( 'Set Featured Image', 'aamla' );
		}

		$markup  = sprintf( '<a class="aamla-widget-img-uploader %s">%s</a>', $uploader_class, $featured_markup );
		$markup .= sprintf( '<span class="aamla-widget-img-instruct %s">%s</span>', $class, esc_html__( 'Click the image to edit/update', 'aamla' ) );
		$markup .= sprintf( '<a class="aamla-widget-img-remover %s">%s</a>', $class, esc_html__( 'Remove Featured Image', 'aamla' ) );
		$markup .= sprintf( '<input class="aamla-widget-img-id" name="%s" id="%s" value="%s" type="hidden" />', $name, $id, $value );
		return $markup;
	}

	/**
	 * Update settings for current widget instance.
	 *
	 * @since 1.0.1
	 *
	 * @param array $instance The current widget instance's settings.
	 * @param array $new_instance Array of new widget settings.
	 * @return false|array
	 */
	public function update_settings( $instance, $new_instance ) {
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			return $instance;
		}

		foreach ( $this->get_widget_options() as $option => $value ) {
			$setting      = $value['setting'];
			$new_instance = wp_parse_args( $new_instance, [ $setting => '' ] );
			switch ( $value['type'] ) {
				case 'select':
					$instance[ $setting ] = array_key_exists( $new_instance[ $setting ], $value['choices'] ) ? $new_instance[ $setting ] : '';
					break;
				case 'checkbox':
					$instance[ $setting ] = ( 'yes' === $new_instance[ $setting ] ) ? 'yes' : '';
					break;
				case 'text':
					$instance[ $setting ] = sanitize_text_field( $new_instance[ $setting ] );
					break;
				case 'url':
					$instance[ $setting ] = esc_url_raw( $new_instance[ $setting ] );
					break;
				case 'number':
					$number = $new_instance[ $setting ];
					$attr   = isset( $value['input_attrs'] ) ? (array) $value['input_attrs'] : array();

					if ( '' !== $number ) {
						if ( isset( $attr['max'] ) ) {
							$number = $number > $attr['max'] ? $attr['max'] : $number;
						}

						if ( isset( $attr['min'] ) ) {
							$number = $number < $attr['min'] ? $attr['min'] : $number;
						}

						if ( isset( $attr['step'] ) && is_float( $attr['step'] ) ) {
							$number = abs( floatval( $number ) );
						} else {
							$number = absint( $number );
						}
					}

					$instance[ $setting ] = ( '' !== $number ) ? $number : '';
					break;
				case 'custom':
					if ( 'aamla_text_featured_image' === $setting ) {
						$img_id               = absint( $new_instance[ $setting ] );
						$img_url              = wp_get_attachment_image_src( $img_id );
						$instance[ $setting ] = $img_url ? $img_id : '';
					} else {
						$instance[ $setting ] = '';
					}
					$instance[ $setting ] = apply_filters( 'aamla_custom_widget_form_update', $instance[ $setting ], $setting, $new_instance );
					break;
				default:
					$instance[ $setting ] = '';
					break;
			}
		}
		return $instance;
	}

	/**
	 * Adds the classes to the widget in the front-end.
	 *
	 * @since 1.0.1
	 *
	 * @param array $params Parameters passed to a widget's display callback.
	 * @return false|array
	 */
	public function add_widget_customizations( $params ) {
		if ( is_admin() ) {
			return $params;
		}

		$page_id = get_the_ID();

		if ( ! $page_id || ! array_key_exists( $page_id, $this->get_pages_with_custom_widget() ) ) {
			return $params;
		}

		if ( ! is_active_sidebar( 'widgetlayer-page-' . $page_id ) ) {
			return $params;
		}

		$widget_data = $this->get_widget_data_from_id( $page_id, $params[0]['widget_id'] );
		if ( false === $widget_data ) {
			return $params;
		}

		$custom_classes = $this->get_widget_classes( $widget_data );
		$custom_classes = $custom_classes ? esc_attr( $params[0]['widget_id'] ) . ' ' . $custom_classes : esc_attr( $params[0]['widget_id'] );

		// Add class(es) to widget front end.
		$params[0]['before_widget'] = str_replace( 'brick', 'brick ' . $custom_classes, $params[0]['before_widget'] );

		// Change markup for Blank Widget.
		if ( false !== strpos( $params[0]['widget_id'], 'aamla_blank_widget' ) ) {
			$params[0]['before_widget'] = str_replace( '<section', '<span aria-hidden="true"', $params[0]['before_widget'] );
			$params[0]['after_widget']  = '</span>';
		}

		$before_widget_content      = $this->get_before_widget_content( $widget_data );
		$after_widget_content       = $this->get_after_widget_content( $widget_data );
		$params[0]['before_widget'] = $params[0]['before_widget'] . $before_widget_content;
		$params[0]['after_widget']  = $after_widget_content . $params[0]['after_widget'];

		// Add inline style, only if we are in customizer preview.
		if ( ! is_customize_preview() ) {
			return $params;
		}

		$inline_css = $this->get_widget_css( $widget_data );
		$inline_css = $this->widget_css_array_to_string( $inline_css );
		if ( $inline_css ) {
			echo '<style>' . $inline_css . '</style>'; // WPCS xss ok. CSS with strip all tags.
		}

		return $params;
	}

	/**
	 * Get widget settings and other information from widget id.
	 *
	 * @since 1.0.2
	 *
	 * @param int $page_id   Page ID.
	 * @param str $widget_id Widget ID.
	 * @return false|array
	 */
	public function get_widget_data_from_id( $page_id, $widget_id ) {
		global $wp_registered_widgets;

		if ( ! $page_id || ! $widget_id ) {
			return false;
		}

		$sidebars_widgets = get_option( 'sidebars_widgets', [] );
		$widget_pos       = array_search( $widget_id, $sidebars_widgets[ 'widgetlayer-page-' . $page_id ], true );
		if ( false === $widget_pos ) {
			return false;
		}

		// Get widget parameters.
		$widget_params = $wp_registered_widgets[ $widget_id ];

		/*
		 * Widget's display callback function is actually an array of widget object
		 * and 'display callback' method. Let's use that object to get widget settings.
		 */
		if ( ! ( is_array( $widget_params['callback'] ) && is_object( $widget_params['callback'][0] ) ) ) {
			return false;
		}
		$widget_obj = $widget_params['callback'][0];
		if ( ! ( method_exists( $widget_obj, 'get_settings' ) && isset( $widget_params['params'][0]['number'] ) ) ) {
			return false;
		}
		$instances = $widget_obj->get_settings();
		$number    = $widget_params['params'][0]['number'];
		if ( array_key_exists( $number, $instances ) ) {
			$instance = $instances[ $number ];
			$id_base  = property_exists( $widget_obj, 'id_base' ) ? $widget_obj->id_base : '';
		} else {
			return false;
		}

		return [ $widget_id, $widget_pos, $instance, $id_base ];
	}

	/**
	 * Get before widget customized content.
	 *
	 * @since 1.0.2
	 *
	 * @param array $widget_data {
	 *     Current widget's data to generate customized output.
	 *     @type str   $widget_id  Widget ID.
	 *     @type int   $widget_pos Widget position in widgetlayer widget-area.
	 *     @type array $instance   Current widget instance settings.
	 *     @type str   $id_base    Widget ID base.
	 * }
	 * @return string Widget customized content markup.
	 */
	public function get_before_widget_content( $widget_data ) {

		$widget_id  = isset( $widget_data[0] ) ? $widget_data[0] : false;
		$widget_pos = isset( $widget_data[1] ) ? $widget_data[1] : false;
		$instance   = isset( $widget_data[2] ) ? $widget_data[2] : false;
		$id_base    = isset( $widget_data[3] ) ? $widget_data[3] : false;

		if ( false === $widget_id || false === $widget_pos || false === $instance || false === $id_base ) {
			return '';
		}

		// Short circuit filter.
		$check = apply_filters( 'aamla_before_widget_content', false, $widget_data );
		if ( false !== $check ) {
			return $check;
		}

		// Generate markup for text widget featured image.
		if ( 'text' === $id_base && isset( $instance['aamla_text_featured_image'] ) ) {
			$image_id = absint( $instance['aamla_text_featured_image'] );
			if ( $image_id ) {
				$orientation = '';
				$image_size  = apply_filters( 'aamla_text_image_size', 'aamla-medium', $widget_data );
				$classes[]   = 'text-widget-featured-image';
				$image_meta  = wp_get_attachment_metadata( $image_id );
				if ( isset( $image_meta['height'] ) && isset( $image_meta['width'] ) ) {
					$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
				}
				$classes    = apply_filters( 'aamla_text_image_classes', $classes, $widget_data );
				$img_markup = wp_get_attachment_image( $image_id, $image_size, false, [ 'class' => join( ' ', $classes ) ] );
				return sprintf( '<div class="widget-thumbnail %s"><div class="thumb-wrapper">%s</div></div>', $orientation, $img_markup );
			}
		}
	}

	/**
	 * Get after widget customized content.
	 *
	 * @since 1.0.2
	 *
	 * @param array $widget_data {
	 *     Current widget's data to generate customized output.
	 *     @type str   $widget_id  Widget ID.
	 *     @type int   $widget_pos Widget position in widgetlayer widget-area.
	 *     @type array $instance   Current widget instance settings.
	 *     @type str   $id_base    Widget ID base.
	 * }
	 * @return string Widget customized content markup.
	 */
	public function get_after_widget_content( $widget_data ) {

		$widget_id  = isset( $widget_data[0] ) ? $widget_data[0] : false;
		$widget_pos = isset( $widget_data[1] ) ? $widget_data[1] : false;
		$instance   = isset( $widget_data[2] ) ? $widget_data[2] : false;
		$id_base    = isset( $widget_data[3] ) ? $widget_data[3] : false;

		if ( false === $widget_id || false === $widget_pos || false === $instance || false === $id_base ) {
			return '';
		}

		return apply_filters( 'aamla_after_widget_content', '', $widget_data );
	}

	/**
	 * Add Custom widget meta box to 'page' edit screen.
	 *
	 * @since  1.0.1
	 *
	 * @param string $post_type Post Type.
	 * @param Object $post      Post Object.
	 */
	public function add_custom_widget_metabox( $post_type, $post ) {
		if ( ! current_user_can( 'edit_theme_options' ) || 'page' !== $post_type ) {
			return;
		}

		// Short circuit filter.
		$check = apply_filters( 'aamla_custom_widget_metabox', false, (int) $post->ID );
		if ( false !== $check ) {
			return;
		}

		add_meta_box(
			'aamla_custom_widget_meta',
			esc_html__( 'Page Specific Widget Area', 'aamla' ),
			array( $this, 'render_widget_metabox' ),
			array( 'page' ),
			'side',
			'default'
		);
	}

	/**
	 * Render meta box to 'page' edit screen.
	 *
	 * @since  1.0.1
	 *
	 * @param obj $post Current post object.
	 */
	public function render_widget_metabox( $post ) {

		// Add nonce for security and authentication.
		wp_nonce_field( basename( __FILE__ ), 'aamla_widget_nonce' );
		$widget_meta = get_post_meta( $post->ID );

		$widget_meta['aamla_custom_widget_meta'][0] = ( isset( $widget_meta['aamla_custom_widget_meta'][0] ) ) ? $widget_meta['aamla_custom_widget_meta'][0] : '';
		?>
		<p>
			<div class="aamla-custom-widget-content">
				<label for="aamla_custom_widget_meta">
					<input type="checkbox" name="aamla_custom_widget_meta" id="aamla-custom-widget" value="yes" <?php checked( $widget_meta['aamla_custom_widget_meta'][0], 'yes' ); ?> />
					<?php esc_html_e( 'Create custom widget area for this page ( Will be displayed immediately below header ).', 'aamla' ); ?>
				</label>
			</div>
		</p>
		<?php
	}

	/**
	 * Saves the custom meta input
	 *
	 * @since  1.0.1
	 *
	 * @param int $post_id Post ID.
	 * @param obj $post    (WP_Post) Post object.
	 */
	public function save_widget_metabox( $post_id, $post ) {

		// Checks save status.
		$is_autosave    = wp_is_post_autosave( $post_id );
		$is_revision    = wp_is_post_revision( $post_id );
		$is_valid_nonce = ( isset( $_POST['aamla_widget_nonce'] ) && wp_verify_nonce( $_POST['aamla_widget_nonce'], basename( __FILE__ ) ) ) ? true : false;

		// Exits script if we are not on a page.
		if ( 'page' !== get_post_type( $post_id ) ) {
			return;
		}

		/*
		 * Conditionally delete saved array of pages with custom widget.
		 * Note: Delete data before user capability check, as a user with less than
		 * required capability (edit_theme_options) can still delete a page (on page deletion, that page
		 * specific widget should also be deleted).
		 */
		$this->delete_pages_with_custom_widget( $post_id );

		// Exits script depending on user capability.
		// Adding widget area is not useful unless you can add some widgets in it.
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			return;
		}

		// Exits script depending on save status.
		if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
			return;
		}

		// Checks for input and saves - save checked as yes.
		if ( isset( $_POST['aamla_custom_widget_meta'] ) ) {
			update_post_meta( $post_id, 'aamla_custom_widget_meta', 'yes' );
		} else {
			delete_post_meta( $post_id, 'aamla_custom_widget_meta' );
		}
	}

	/**
	 * Update array of pages with custom widgets.
	 *
	 * @since  1.0.1
	 *
	 * @param int $post_id Post ID.
	 */
	public function delete_pages_with_custom_widget( $post_id ) {

		// Conditionally delete saved array of pages with custom widget.
		$pages = get_option( 'aamla_pages_with_custom_widget' );
		if ( false !== $pages ) {
			delete_option( 'aamla_pages_with_custom_widget' );
		}
	}

	/**
	 * Register Custom Blank Widget.
	 *
	 * @since 1.0.1
	 */
	public function register_custom_widget() {
		require_once get_template_directory() . '/add-on/widgetlayer/class-blank-widget.php';
		register_widget( 'aamla\Blank_Widget' );
	}
}

WidgetLayer::init();
