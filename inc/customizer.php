<?php
/**
 * Atlantic Theme Customizer.
 *
 * @package Atlantic
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function atlantic_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// Color options
	$wp_customize->add_section( 'atlantic_color_options',
		array(
			'title'       => __( 'Colors', 'atlantic' ),
			'priority'    => 300,
			'capability'  => 'edit_theme_options',
			'description' => __('Change color options here.', 'atlantic'), 
		) 
	);

	$wp_customize->add_setting( 'atlantic_bg_color',
		array(
			'default' => '#ffffff',
			'transport'  => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_setting( 'atlantic_heading_color',
		array(
			'default' => '#404040',
			'transport'  => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_setting( 'atlantic_navigation_color',
		array(
			'default' => '#404040',
			'transport'  => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_setting( 'atlantic_font_color',
		array(
			'default' => '#404040',
			'transport'  => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_setting( 'atlantic_link_color',
		array(
			'default' => '#404040',
			'transport'  => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'atlantic_bg_color_control',
		array(
			'label'    => __( 'Background Color', 'atlantic' ), 
			'section'  => 'atlantic_color_options',
			'settings' => 'atlantic_bg_color',
			'priority' => 10,
		) 
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'atlantic_heading_color_control',
		array(
			'label'    => __( 'Headings Color', 'atlantic' ), 
			'section'  => 'atlantic_color_options',
			'settings' => 'atlantic_heading_color',
			'priority' => 20,
		) 
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'atlantic_navigation_color_control',
		array(
			'label'    => __( 'Navigation Color', 'atlantic' ), 
			'section'  => 'atlantic_color_options',
			'settings' => 'atlantic_navigation_color',
			'priority' => 20,
		) 
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'atlantic_font_color_control',
		array(
			'label'    => __( 'Font Color', 'atlantic' ), 
			'section'  => 'atlantic_color_options',
			'settings' => 'atlantic_font_color',
			'priority' => 30,
		) 
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'atlantic_link_color_control',
		array(
			'label'    => __( 'Links Color', 'atlantic' ), 
			'section'  => 'atlantic_color_options',
			'settings' => 'atlantic_link_color',
			'priority' => 20,
		) 
	));

	// Width options
	$wp_customize->add_section( 'atlantic_width_options',
		array(
			'title'       => __( 'Widths', 'atlantic' ),
			'priority'    => 310,
			'capability'  => 'edit_theme_options',
			'description' => __('Change width options here.', 'atlantic'), 
		) 
	);

	$wp_customize->add_setting( 'atlantic_width',
		array(
			'default' => '1280',
			'transport'  => 'postMessage',
			'sanitize_callback' => 'absint'
		)
	);
	$wp_customize->add_setting( 'atlantic_content_width',
		array(
			'default' => '640',
			'transport'  => 'postMessage',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'atlantic_width_control',
		array(
			'label'    => __( 'Website Width', 'atlantic' ), 
			'section'  => 'atlantic_width_options',
			'settings' => 'atlantic_width',
			'type' => 'number',
			'priority' => 10,
		) 
	));
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'atlantic_content_width_control',
		array(
			'label'    => __( 'Content Width', 'atlantic' ), 
			'section'  => 'atlantic_width_options',
			'settings' => 'atlantic_content_width',
			'type' => 'number',
			'priority' => 20,
		) 
	));

	// Logo options
	$wp_customize->add_section( 'atlantic_logo_options',
		array(
			'title'       => __( 'Logo', 'atlantic' ),
			'priority'    => 320,
			'capability'  => 'edit_theme_options',
			'description' => __('Change logo here.', 'atlantic'), 
		) 
	);
	$wp_customize->add_setting('atlantic_logo', array(
	    'default' => '',
		'transport'  => 'postMessage',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'atlantic_logo_control',
			array(
				'label'      => __( 'Upload a logo', 'atlantic' ),
				'section'    => 'atlantic_logo_options',
				'settings'   => 'atlantic_logo'
			)
		)
	);

	// Google fonts
	if (get_transient('atlantic_google_fonts')) :
        $google_fonts = get_transient('atlantic_google_fonts');

    else :
        $google_api = 'https://www.googleapis.com/webfonts/v1/webfonts?sort=alpha&key=AIzaSyCS29WfOgw3EUqe-VPzh0WLAsMLZ67mqS4';

        $font_content = wp_remote_get( $google_api, array('sslverify'   => false) );

        $google_fonts = json_decode($font_content['body']);

        set_transient( 'atlantic_google_fonts', $google_fonts, WEEK_IN_SECONDS );

	endif;

	foreach ($google_fonts->items as $google_font) :
		$font_choices[$google_font->family] = $google_font->family;
	endforeach;

	$wp_customize->add_section( 'atlantic_font_options',
		array(
			'title'       => __( 'Fonts', 'atlantic' ),
			'priority'    => 330,
			'capability'  => 'edit_theme_options',
			'description' => __('Change font options here.', 'atlantic'), 
		) 
	);

	$wp_customize->add_setting( 'atlantic_font',
		array(
			'default' => '',
			'transport'  => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_setting( 'atlantic_heading_font',
		array(
			'default' => '',
			'transport'  => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'atlantic_font_control',
		array(
			'label'    => __( 'Website Font', 'atlantic' ), 
			'section'  => 'atlantic_font_options',
			'settings' => 'atlantic_font',
			'type' => 'select',
			'choices' => $font_choices,
			'priority' => 10,
		) 
	));
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'atlantic_heading_font_control',
		array(
			'label'    => __( 'Heading Font', 'atlantic' ), 
			'section'  => 'atlantic_font_options',
			'settings' => 'atlantic_heading_font',
			'type' => 'select',
			'choices' => $font_choices,
			'priority' => 20,
		) 
	));
}
add_action( 'customize_register', 'atlantic_customize_register' );

function atlantic_dynamic_css() {
?>
	<style type='text/css'>
		<?php if ( get_theme_mod('atlantic_bg_color') ) : ?>
			body {
				background-color:<?php echo get_theme_mod('atlantic_bg_color'); ?>;
			}
		<?php endif; ?>

		<?php if ( get_theme_mod('atlantic_heading_color') ) : ?>
			h1, h2, h3, h4, h5, h6,
			h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,
			h1 a:visited, h2 a:visited, h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited {
				color:<?php echo get_theme_mod('atlantic_heading_color'); ?>;
			}
		<?php endif; ?>

		<?php if ( get_theme_mod('atlantic_navigation_color') ) : ?>
			.main-navigation a,
			.main-navigation a:visited {
				color:<?php echo get_theme_mod('atlantic_navigation_color'); ?>;
			}
		<?php endif; ?>

		<?php if ( get_theme_mod('atlantic_font_color') ) : ?>
			body,
			button,
			input,
			select,
			textarea {
				color:<?php echo get_theme_mod('atlantic_font_color'); ?>;
			}
		<?php endif; ?>

		<?php if ( get_theme_mod('atlantic_link_color') ) : ?>
			a,
			a:visited {
				color:<?php echo get_theme_mod('atlantic_link_color'); ?>;
			}
		<?php endif; ?>

		<?php if ( get_theme_mod('atlantic_width') ) : ?>
			.inner {
				max-width: <?php echo get_theme_mod('atlantic_width'); ?>px;
			}
		<?php endif; ?>

		<?php if ( get_theme_mod('atlantic_content_width') ) : ?>
			.inner .inner {
				max-width: <?php echo get_theme_mod('atlantic_content_width'); ?>px;
			}
		<?php endif; ?>

		<?php if ( get_theme_mod('atlantic_font') ) : ?>
			body,
			button,
			input,
			select,
			textarea {
				font-family: '<?php echo get_theme_mod('atlantic_font'); ?>', 'Courier New', Helvetica, Arial, sans-serif;
			}
		<?php endif; ?>

		<?php if ( get_theme_mod('atlantic_heading_font') ) : ?>
			h1, h2, h3, h4, h5, h6 {
				font-family: '<?php echo get_theme_mod('atlantic_font'); ?>', 'Courier New', Helvetica, Arial, sans-serif;
			}
		<?php endif; ?>
	</style>
<?php
}
add_action( 'wp_head' , 'atlantic_dynamic_css' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function atlantic_customize_preview_js() {
	wp_enqueue_script( 'atlantic_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20150114', true );
}
add_action( 'customize_preview_init', 'atlantic_customize_preview_js' );
