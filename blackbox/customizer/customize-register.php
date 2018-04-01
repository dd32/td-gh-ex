<?php
/**
 * Aamla Theme Customizer.
 *
 * @link https://codex.wordpress.org/Theme_Customization_API
 *
 * @package Aamla
 * @since 1.0.0
 */

/**
 * Add theme modification options to Theme Customizer.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aamla_customize_register( $wp_customize ) {

	/**
	 * Filters required information to generate customizer panels.
	 *
	 * The filter fecilitates inserting array of data to control customizer panels.
	 *
	 * @since 1.0.0
	 *
	 * @param $panels {
	 *     @type WP_Customize_Panel|string $id   Customize Panel object, or Panel ID.
	 *     @type array                     $args {
	 *         Optional. Array of properties for the new Panel object. Default empty array.
	 *         @type int          $priority        Priority of the panel, defining the display order of panels and sections. Default 160.
	 *         @type string       $capability      Capability required for the panel. Default `edit_theme_options`
	 *         @type string|array $theme_supports  Theme features required to support the panel.
	 *         @type string       $title           Title of the panel to show in UI.
	 *         @type string       $description     Description to show in the UI.
	 *     }
	 * }
	 */
	$panels = apply_filters( 'aamla_theme_panels', array() );
	if ( ! empty( $panels ) ) {
		foreach ( $panels as $id => $args ) {
			$wp_customize->add_panel( $id, $args );
		}
	}

	/**
	 * Filters required information to generate customizer sections.
	 *
	 * The filter fecilitates inserting array of data to control customizer sections.
	 *
	 * @since 1.0.0
	 *
	 * @param $sections {
	 *     @type WP_Customize_Section|string $id   Customize Section object, or Section ID.
	 *     @type array                     $args {
	 *         Optional. Array of properties for the new Panel object. Default empty array.
	 *         @type int          $priority           Priority of the panel, defining the display order of panels and sections. Default 160.
	 *         @type string       $panel              The panel this section belongs to.
	 *         @type string       $capability         Capability required for the panel. Default 'edit_theme_options'
	 *         @type string|array $theme_supports     Theme features required to support the panel.
	 *         @type string       $title              Title of the panel to show in UI.
	 *         @type string       $description        Description to show in the UI.
	 *         @type string       $type               Type of the panel.
	 *         @type callable     $active_callback    Active callback.
	 *         @type bool         $description_hidden Hide the description behind a help icon, instead of . Default false.
	 *     }
	 * }
	 */
	$sections = apply_filters( 'aamla_theme_sections', array() );
	if ( ! empty( $sections ) ) {
		foreach ( $sections as $id => $args ) {
			$wp_customize->add_section( $id, $args );
		}
	}

	/**
	 * Filters required information to generate customizer settings & controls.
	 *
	 * The filter fecilitates inserting array of data to control customizer settings
	 * and controls.
	 *
	 * @since 1.0.0
	 *
	 * @param $controls {
	 *     @type WP_Customize_Control|string $id   Customize Control object, or ID.
	 *     @type array                       $args {
	 *         Optional. Array of properties for the new Control object. Default empty array.
	 *
	 *         @type array        $settings          All settings tied to the control. If undefined, defaults to `$setting`. IDs in the array correspond to the ID of a registered `WP_Customize_Setting`.
	 *         @type string       $setting           The primary setting for the control (if there is one). Default is 'default'.
	 *         @type string       $capability        Capability required to use this control. Normally derived from `$settings`.
	 *         @type int          $priority          Order priority to load the control. Default 10.
	 *         @type string       $section           The section this control belongs to. Default empty.
	 *         @type string       $label             Label for the control. Default empty.
	 *         @type string       $description       Description for the control. Default empty.
	 *         @type array        $choices           List of choices for 'radio' or 'select' type controls, where values are the keys, and labels are the values. Default empty array.
	 *         @type array        $input_attrs       List of custom input attributes for control output, where attribute names are the keys and values are the values. Default empty array.
	 *         @type bool         $allow_addition    Show UI for adding new content, currently only used for the dropdown-pages control. Default false.
	 *         @type string       $type              The type of the control. Default 'text'.
	 *         @type callback     $active_callback   Active callback.
	 *         @type string       $default           Default value for the setting. Default is empty string.
	 *         @type string       $transport         Options for rendering the live preview of changes in Theme Customizer. Using 'refresh' makes the change visible by reloading the whole preview. Using 'postMessage' allows a custom JavaScript to handle live changes. @link https://developer.wordpress.org/themes/customize-api. Default is 'refresh'
	 *         @type callable     $sanitize_callback Callback to filter a Customize setting value in un-slashed form.
	 *         @type string       $path              File name without .php extension of custom control class. File is to be kept in 'blackbox/customizer/controls' folder.
	 *         @type string       $class             This is Aamla theme custom option. Custom control class name.
	 *         @type string       $js_template       This is Aamla theme custom option. Customizer JavaScript API to be used or not with custom control class.
	 *         @type array        $select_refresh    This is Aamla theme custom option. Array of options for selective refresh.
	 *     }
	 * }
	 */
	$controls = apply_filters( 'aamla_theme_controls', array() );
	if ( empty( $controls ) ) {
		return;
	}

	$defaults = array(
		'default'        => null,
		'transport'      => 'refresh',
		'class'          => '',
		'path'           => '',
		'js_template'    => '',
		'select_refresh' => '',
	);

	foreach ( $controls as $id => $args ) {
		$args = wp_parse_args( $args, $defaults );

		if ( ! empty( $args['path'] ) ) {
			$path = get_template_directory() . "/blackbox/customizer/controls/{$args['path']}.php";

			/**
			 * Filters a file path to the custom control class.
			 *
			 * For changing custom control class file path, in-case file is at other location
			 * then the theme default location.
			 *
			 * @since 1.0.0
			 *
			 * @param string $path             Control class file path.
			 * @param string $args['settings'] Customize Control object, or ID.
			 */
			$args['path'] = apply_filters( 'aamla_control_class_path', $path, $args['settings'] );
		}

		$wp_customize->add_setting( $args['settings'], array(
			'default'           => ( null === $args['default'] ) ? aamla_get_theme_defaults( $args['settings'] ) : $args['default'],
			'sanitize_callback' => 'aamla_sanitization',
			'transport'         => $args['transport'],
		) );

		// Load custom control class file, if not already loaded.
		if ( $args['class'] && $args['path'] && file_exists( $args['path'] ) ) {
			require_once $args['path'];
		}

		if ( $args['class'] && class_exists( $args['class'] ) ) {
			$class = $args['class'];
			$wp_customize->add_control( new $class( $wp_customize, $args['settings'], $args ) );
		} else {
			$wp_customize->add_control( $args['settings'], $args );
		}

		// Register control type if we are using Customizer JavaScript API.
		if ( $args['class'] && $args['js_template'] ) {
			$wp_customize->register_control_type( $args['class'] );
		}

		// Implement Customizer selective refresh.
		if ( $args['select_refresh'] && is_array( $args['select_refresh'] ) ) {
			$wp_customize->selective_refresh->add_partial( $args['settings'], $args['select_refresh'] );
		}
	} // End foreach().
}
add_action( 'customize_register', 'aamla_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 1.0.0
 */
function aamla_customize_preview_js() {
	wp_enqueue_script(
		'aamla_customizer',
		get_template_directory_uri() . '/assets/admin/js/customize-preview.js',
		array( 'customize-preview' ),
		'1.0.0',
		true
	);
}
add_action( 'customize_preview_init', 'aamla_customize_preview_js' );

/**
 * Enqueue customizer control JS file.
 *
 * @since 1.0.0
 */
function aamla_customize_control_js() {
	wp_enqueue_script(
		'aamla_customizer_control',
		get_template_directory_uri() . '/assets/admin/js/customize-control.js',
		array( 'customize-controls', 'jquery' ),
		'1.0.0',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'aamla_customize_control_js' );

/**
 * Enqueue customizer control CSS file.
 *
 * @since 1.0.0
 */
function aamla_customize_control_css() {
	wp_enqueue_style(
		'aamla_customizer_control_style',
		get_template_directory_uri() . '/assets/admin/css/customize-control.css'
	);
}
add_action( 'customize_controls_print_styles', 'aamla_customize_control_css' );

/**
 * Returns sanitized customizer options.
 *
 * @since 1.0.0
 *
 * @param  Mixed                $option  Selected customizer option.
 * @param  WP_Customize_Setting $setting Setting instance.
 * @return Mixed Returns sanitized value of customizer option.
 */
function aamla_sanitization( $option, $setting ) {
	$type = $setting->manager->get_control( $setting->id )->type;
	switch ( $type ) {
		case 'select':
			$sanitized_value = aamla_sanitize_select( $option, $setting );
			break;

		case 'checkbox':
			$sanitized_value = aamla_sanitize_checkbox( $option );
			break;

		case 'number':
			$sanitized_value = aamla_sanitize_number( $option, $setting );
			break;

		case 'range':
			$sanitized_value = aamla_sanitize_number( $option, $setting );
			break;

		case 'range-slider':
			$sanitized_value = aamla_sanitize_number( $option, $setting );
			break;

		case 'text':
			$sanitized_value = aamla_sanitize_text( $option );
			break;

		case 'textarea':
			$sanitized_value = aamla_sanitize_textarea( $option );
			break;

		case 'url':
			$sanitized_value = aamla_sanitize_url( $option );
			break;

		case 'image':
			$sanitized_value = aamla_sanitize_url( $option );
			break;

		case 'color':
			$sanitized_value = aamla_sanitize_color( $option );
			break;

		default:
			$sanitized_value = $setting->default;
			break;
	} // End switch().

	return $sanitized_value;
}

/**
 * Sanitize select choices.
 *
 * @since 1.0.0
 *
 * @param str                  $option  Customizer Option selected.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string
 */
function aamla_sanitize_select( $option, $setting ) {
	$choices = $setting->manager->get_control( $setting->id )->choices;
	if ( array_key_exists( $option, $choices ) ) :
		return $option;
	elseif ( in_array( $option, $choices, true ) ) :
		return $option;
	else :
		return $setting->default;
	endif;
}

/**
 * Sanitize text.
 *
 * @since 1.0.0
 *
 * @param str $option text.
 * @return string
 */
function aamla_sanitize_text( $option ) {
	return sanitize_text_field( $option );
}

/**
 * Sanitize textarea.
 *
 * @since 1.0.0
 *
 * @param str $option textarea.
 * @return string
 */
function aamla_sanitize_textarea( $option ) {
	return wp_kses_post( $option );
}

/**
 * Sanitize url.
 *
 * @since 1.0.0
 *
 * @param str $option url.
 * @return string
 */
function aamla_sanitize_url( $option ) {
	return esc_url_raw( $option );
}

/**
 * Sanitize and Validate number
 *
 * @since 1.0.0
 *
 * @param int                  $option  excerpt length.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return integer
 */
function aamla_sanitize_number( $option, $setting ) {
	if ( '' === $option && '' === $setting->default ) {
		return $setting->default;
	}

	$attr   = $setting->manager->get_control( $setting->id )->input_attrs;
	$option = abs( $option );

	if ( isset( $attr['max'] ) ) {
		$option = $option > $attr['max'] ? $attr['max'] : $option;
	}

	if ( isset( $attr['min'] ) ) {
		$option = $option < $attr['min'] ? $attr['min'] : $option;
	}

	if ( isset( $attr['step'] ) && is_float( $attr['step'] ) ) {
		$option = abs( floatval( $option ) );
	} else {
		$option = absint( $option );
	}

	if ( $option ) {
		return $option;
	}

	return $setting->default;
}

/**
 * Validate checkbox value to be '1'
 *
 * @since  1.0.0
 *
 * @param  bool $option checkbox value.
 * @return bool
 */
function aamla_sanitize_checkbox( $option ) {
	if ( 1 == $option ) {
		return 1;
	} else {
		return '';
	}
}

/**
 * Sanitizes a hex color.
 *
 * @since 1.0.0
 *
 * @param str $option color.
 * @return string|void
 */
function aamla_sanitize_color( $option ) {
	return sanitize_hex_color( $option );
}
