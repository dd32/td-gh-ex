<?php
/**
 * Figure/Ground Theme Customizer
 *
 * @package Figure/Ground
 */

/**
 * Add theme options to the customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function figureground_customize_register( $wp_customize ) {
	// Define a generic custom control, facillitating easy creation of number & radio controls.
	// @link https://core.trac.wordpress.org/ticket/28477
	class FG_Customize_Generic_Control extends WP_Customize_Control {
		public $input_attrs = array();
		public $description = '';

	 	/**
		 * Render the custom attributes for the control's input element.
		 */
		public function input_attrs() {
			$attrs = $this->input_attrs;
			$allowed_attrs = array( 'class', 'style', 'title', 'spellcheck', 'placeholder', 'required', 'pattern', 'min', 'max', 'step' );
			foreach( $attrs as $attr => $value ) {
				if ( in_array( $attr, $allowed_attrs ) ) {
					echo $attr . '="' . esc_attr( $value ) . '" ';
				}
			}
		}

		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<input type="<?php echo esc_attr( $this->type ); ?>" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
			</label>
			<?php
		}
	}

	// postMessage support for blog name and description.
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	// Add the footer/copyright information section, settings & controls.
	$wp_customize->add_section( 'footer' , array(
		'title'	   => __( 'Footer', 'figureground' ),
		'priority' => 100,
	) );

	$wp_customize->add_setting( 'copy_name' , array(
		'default'	=> get_bloginfo( 'name' ),
		'transport' => 'postMessage',
	) );

	$wp_customize->add_setting( 'powered_by_wp' , array(
		'default'	=> true,
	) );

	$wp_customize->add_setting( 'theme_meta' , array(
		'default'	=> false,
	) );

	$wp_customize->add_control( 'copy_name', array(
		'label'		=> __( 'Copyright Name', 'figureground' ),
		'section'	=> 'footer',
		'type'      => 'text',
	) );

	$wp_customize->add_control( 'powered_by_wp', array(
		'label'		=> __( 'Proudly Powered By WordPress', 'figureground' ),
		'section'	=> 'footer',
		'type'		=> 'checkbox',
	) );

	$wp_customize->add_control( 'theme_meta', array(
		'label'		=> __( 'Theme Information', 'figureground' ),
		'section'	=> 'footer',
		'type'		=> 'checkbox',
	) );

	// Add the Figure/Ground section.
	$wp_customize->add_section( 'figure_ground' , array(
		'title'	      => __( 'Figure/Ground', 'figureground' ),
		'description' => __( 'These settings control the background animation. Try out the circular mode for something even more different, and adjust the detail and speed of the animation.', 'figureground' ),
		'priority'    => 60,
	) );

	// Add the Figure/Ground settings, which all support postMessage.
	$wp_customize->add_setting( 'fg_type' , array(
		'default'			=> 'orthogonal',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'figureground_sanitize_type',
	) );

	$wp_customize->add_setting( 'fg_max_width' , array(
		'default'			=> 256,
		'transport'         => 'postMessage',
		'sanitize_callback'	=> 'absint',
	) );

	$wp_customize->add_setting( 'fg_max_height' , array(
		'default'			=> 256,
		'transport'         => 'postMessage',
		'sanitize_callback'	=> 'absint',
	) );

	$wp_customize->add_setting( 'fg_speed' , array(
		'default'			=> 320,
		'transport'         => 'postMessage',
		'sanitize_callback'	=> 'absint',
	) );

	$wp_customize->add_setting( 'fg_initial' , array(
		'default'			=> 192,
		'transport'         => 'postMessage',
		'sanitize_callback'	=> 'absint',
	) );

	// Add the color settings.
	$wp_customize->add_setting( 'fg_color_dark' , array(
		'default'     => '#222222',
	) );

	$wp_customize->add_setting( 'fg_color_light' , array(
		'default'     => '#f7f7ec',
	) );

	$wp_customize->add_setting( 'accent_color_light' , array(
		'default'     => '#87f',
	) );

	$wp_customize->add_setting( 'accent_color_dark' , array(
		'default'     => '#903',
	) );

	// Add the color customization controls.
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fg_color_light', array(
		'label'        => __( 'Figure/Ground Light Color', 'figureground' ),
		'section'    => 'colors',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fg_color_dark', array(
		'label'        => __( 'Figure/Ground Dark Color', 'figureground' ),
		'section'    => 'colors',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color_light', array(
		'label'        => __( 'Light Accent Color', 'figureground' ),
		'section'    => 'colors',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color_dark', array(
		'label'        => __( 'Dark Accent Color', 'figureground' ),
		'section'    => 'colors',
	) ) );

	// Add the Figure/Ground controls.
	$wp_customize->add_control( 'fg_type', array(
		'label'		=> __( 'Pattern', 'figureground' ),
		'section'	=> 'figure_ground',
		'type'		=> 'radio',
		'choices'	=> array(
			'orthogonal'	=> __( 'Orthogonal', 'figureground' ),
			'circular'		=> __( 'Circular', 'figureground' ),
		),
	) );

	$wp_customize->add_control( new FG_Customize_Generic_Control( $wp_customize, 'fg_max_width', array(
		'label'		  => __( 'Max Width', 'figureground' ),
		'section'	  => 'figure_ground',
		'type'      => 'number',
		'input_attrs' => array(
			'min'  => 16,
			'max'  => 512,
			'step' => 16,
		),
	) ) );

	$wp_customize->add_control( new FG_Customize_Generic_Control( $wp_customize, 'fg_max_height', array(
		'label'		=> __( 'Max Height', 'figureground' ),
		'section'	=> 'figure_ground',
		'type'      => 'number',
		'input_attrs' => array(
			'min'  => 16,
			'max'  => 512,
			'step' => 16,
		),
	) ) );

	$wp_customize->add_control( new FG_Customize_Generic_Control( $wp_customize, 'fg_speed', array(
		'label'		  => __( 'Speed', 'figureground' ),
		'description' => __( 'Delay between animations in milliseconds: lower is faster. To turn the animation off, set this to 0.', 'figureground' ),
		'section'	  => 'figure_ground',
		'type'      => 'number',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 16000,
			'step' => 32,
		),
	) ) );

	$wp_customize->add_control( new FG_Customize_Generic_Control( $wp_customize, 'fg_initial', array(
		'label'		=> __( 'Iterations on Page-load', 'figureground' ),
		'section'	=> 'figure_ground',
		'type'      => 'range',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 640,
			'step' => 32,
		),
	) ) );

	// This filter allows the colors CSS to be generated from each of the separate settings and updated as needed.
	add_filter( 'theme_mod_figureground_colors_css', 'figureground_generate_colors_css' );
}
add_action( 'customize_register', 'figureground_customize_register' );

// Contains functions that generate CSS for all color modification patterns.
require( 'color-patterns.php' );

/**
 * Returns the CSS output of the custom colors.
 *
 * @since Figure/Ground 1.0
 *
 * @return string
 */
function figureground_generate_colors_css() {
	return figureground_fg_colors_css() . figureground_accent_colors_css();
}

/**
 * Caches the CSS output of the custom colors.
 *
 * @since Figure/Ground 1.0
 *
 * @return void
 */
function figureground_rebuild_color_patterns() {
	set_theme_mod( 'figureground_colors_css', figureground_generate_colors_css() );
}
// Allow custom colors to work on child themes by not hardcoding "figureground".
$figureground_theme = get_stylesheet();
add_action( "update_option_theme_mods_$figureground_theme", 'figureground_rebuild_color_patterns' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function figureground_customize_preview_js() {
	wp_enqueue_script( 'figureground_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20140622', true );
}
add_action( 'customize_preview_init', 'figureground_customize_preview_js' );

/**
 * Sanitize the Figure/Ground type value.
 *
 * @since Figure/Ground 1.0
 *
 * @param string $layout Type.
 * @return string Filtered type (orthogonal|circular).
 */
function figureground_sanitize_type( $type ) {
	if ( ! in_array( $type, array( 'orthogonal', 'circular' ) ) ) {
		$type = 'orthogonal';
	}

	return $type;
}

function figureground_custom_colors_head() {
	echo '<style type="text/css" id="figureground-colors">' .
		get_theme_mod( 'figureground_colors_css', '' ) .
	'</style>';
}
add_action( 'wp_head', 'figureground_custom_colors_head' );

function figureground_customizer_body_class( $classes ) {
	if( 'circular' === get_theme_mod( 'fg_type', 'orthogonal' ) ) {
		$classes[] = 'circular';
	}

	return $classes;
}
add_filter( 'body_class', 'figureground_customizer_body_class' );