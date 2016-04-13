<?php
/**
 * Adds postMessage support for site title and description for the Customizer.
 *
 * @since Actions 1.0.4
 *
 * @param WP_Customize_Manager $wp_customize The Customizer object.
 */
function actions_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.site-title a',
			'container_inclusive' => false,
			'render_callback' => 'actions_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector' => '.site-description',
			'container_inclusive' => false,
			'render_callback' => 'actions_customize_partial_blogdescription',
		) );
	}
	
	$wp_customize->add_setting(
		'actions_show_title',
		array(
			'default'			=> true,
			'type'				=> 'theme_mod',
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'actions_sanitize_checkbox'
		)
	);
	
	$wp_customize->add_control(
		'actions_show_title',
		array(
			'settings'		=> 'actions_show_title',
			'section'		=> 'title_tagline',
			'type'			=> 'checkbox',
			'label'			=> __( 'Display Site Title and Tagline ', 'actions' ),
			'description'	=> __( 'Unchek this box if you\'ve uploaded a logo and therefore wish to hide the site title.', 'actions' ),
		)
	);
	
}
add_action( 'customize_register', 'actions_customize_register', 11 );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Actions 1.0.4
 */
function actions_customize_preview_js() {
	wp_enqueue_script( 'actions-customize-preview', get_template_directory_uri() . '/js/customize.js', array( 'customize-preview' ), '20160412', true );
}
add_action( 'customize_preview_init', 'actions_customize_preview_js' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Actions 1.0.4
 * @see actions_customize_register()
 *
 * @return void
 */
function actions_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Twenty Sixteen 1.2
 * @see actions_customize_register()
 *
 * @return void
 */
function actions_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function actions_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

if ( ! function_exists( 'actions_custom_style' ) && get_theme_mod( 'actions_show_title' ) === false ) {
/**
 * Extra Styles specific to user actions via the customizer.
 *
 * @since Actions 1.0.4
 */
    function actions_custom_style() {
    ?>
	    <style type="text/css" id="actions-logo-css">
		    .site-title a,
            .site-description {
			    clip: rect(1px, 1px, 1px, 1px);
			    position: absolute;
		    }
	    </style>
	<?php
    }
	add_action( 'wp_head', 'actions_custom_style');
}
