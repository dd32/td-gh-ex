<?php
    /**
     * customizer assets - Appeal
	 * Header Background Color setting
	 *
	 * Uses a color wheel to configure the Header Background Color setting.
	 *
	 * https://developer.wordpress.org/reference/classes/wp_customize_manager/add_setting/
     *
     * Excerpt Length for Pullquote (page excerpt enabled in functions.php)
     * Uses 'appeal_teaser_length()' to callback on page output
*/

function appeal_register_theme_customizer($wp_customize)
{

    $wp_customize->add_section('appeal_custom_teaser_length_section', array(
            'title'             => __( 'Appeal Theme Controls', 'appeal' ),
            'priority'          => 45
        ));

    /* (1)
     * WP_Customize_Manager/add_setting for header background color
    */
	$wp_customize->add_setting(	'appeal_header_background_color_setting', array(
            'type'              => 'theme_mod',
            'default'           => 'ffffff',
			'sanitize_callback'	=> 'esc_attr',
			'transport'			=> 'postMessage'
		)
	);

    /* (2)
     * WP_Customize_Manager/add_setting for header background color
    */
	$wp_customize->add_setting(	'appeal_page_background_color_setting', array(
            'type'              => 'theme_mod',
            'default'           => 'ffffff',
			'sanitize_callback'	=> 'esc_attr',
			'transport'			=> 'refresh'
		)
	);

    /* (3)
     * WP_Customize_Manager/add_setting for pullquote teaser words
    */
	$wp_customize->add_setting(	'appeal_custom_teaser_length_setting', array(
            'type'              => 'theme_mod',
            'default'           => 22,
			'sanitize_callback'	=> 'appeal_sanitize_number_absint',
			'transport'			=> 'refresh'
		)
	);

    /* (4)
     * WP_Customize_Manager/add_setting for post excerpt words
    */
	$wp_customize->add_setting(	'appeal_posts_excerpt_length_setting', array(
            'type'              => 'theme_mod',
            'default'           => 58,
			'sanitize_callback'	=> 'appeal_sanitize_number_absint',
			'transport'			=> 'refresh'
		)
	);

    /* (5)
     * WP_Customize_Manager/add_setting for theme instructions
    */
	$wp_customize->add_setting(	'appeal_theme_instructions_setting', array(
            'type'              => 'option',
            'default'           => '',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

    // (1)
    $wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_background_color', array(
				'settings'		=> 'appeal_header_background_color_setting',
				'section'		=> 'colors',
				'label'			=> __( 'Header Background Color', 'appeal' ),
				'description'	=> __(
                    'Select the background color of the header area.
                    Header Image should be Off.', 'appeal' ),
			)
		)
    );

    // (2)
    $wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_background_color', array(
				'settings'		=> 'appeal_page_background_color_setting',
				'section'		=> 'colors',
				'label'			=> __( 'Content Background Color', 'appeal' ),
				'description'	=> __(
                    'Sets background color of Post and Page content', 'appeal' ),
			)
		)
    );

    // (3)
    $wp_customize->add_control(
        'appeal_custom_theme_teaser_length', array(
            'settings'          => 'appeal_custom_teaser_length_setting',
            'type'              => 'number',
            'section'           => 'appeal_custom_teaser_length_section',
            'label'             => __( 'PullQuote Number of Words', 'appeal' ),
            'description'       => __( 'Set how many words display on the pullquote.',
                                       'appeal' ),
            'input_attrs' => array(
                'min' => 0,
                'max' => 45,
            ),
        )
    );

    // (4)
    $wp_customize->add_control(
        'appeal_custom_posts_excerpt_length', array(
            'settings'          => 'appeal_posts_excerpt_length_setting',
            'type'              => 'number',
            'section'           => 'appeal_custom_teaser_length_section',
            'label'             => __( 'Set Excerpt Length', 'appeal' ),
            'description'       => __( 'This sets excertps for POSTS ONLY.
                                   Author page excerpt length must be changed from template.',
                                       'appeal' ),
            'input_attrs' => array(
                'min' => 0,
                'max' => 385,
            ),
        )
    );

    // (5)
    $wp_customize->add_control(
        'appeal_theme_instructions', array(
            'settings'          => 'appeal_theme_instructions_setting',
            'type'              => 'hidden',
            'section'           => 'appeal_custom_teaser_length_section',
            'label'             => __( 'Further Theme Instructions', 'appeal' ),
            'description'       => __( 'To set up social or company media links in the display on the Author page---and the popup---use the Menu settings Appearance > Menus. Then create your links using Custom Links panel to left of Menu Structure panel.', 'appeal' ),
        )
    );

}
add_action('customize_register', 'appeal_register_theme_customizer');


//sanitizer for integer
function appeal_sanitize_number_absint( $number, $setting ) {
  // Ensure $number is an absolute integer (whole number, zero or greater).
  $number = absint( $number );

  // If the input is an absolute integer, return it; otherwise, return the default
  return ( $number ? $number : $setting->default );
}


/** (1), (2)
 * Writes the Header Background related controls' values outputed to the 'head' of the document
 * by reading the value(s) from the theme mod value in the options table.
 */
function appeal_customizer_css() {
    if ( get_theme_mods() )
    {
    echo '<style type="text/css">';

        if ( get_theme_mod( 'appeal_header_background_color_setting' ) ) :
             $appealheader = get_theme_mod( 'appeal_header_background_color_setting');
             echo '.site-head, .footer-footer {background: ' . $appealheader . ';}';
        endif;

        if ( get_theme_mod( 'appeal_page_background_color_setting' ) ) :
             $appealpage = get_theme_mod( 'appeal_page_background_color_setting');
             echo '#content {background: ' . $appealpage . ';}';
        endif;

    echo '</style>';
    }
}
add_action( 'wp_head', 'appeal_customizer_css');


/** (3)
 * Writes the teaser_length to the_excerpt
 * by reading the value(s) from the theme mod value in the options table.
 */
function appeal_teaser_length()
{
    if ( get_theme_mods( ) ) {
        $length = get_theme_mod( 'appeal_custom_teaser_length_setting', '12' );
        $content = wp_strip_all_tags(get_the_excerpt() , true );
            echo wp_trim_words( $content, $length );
    }
}
add_filter( 'the_excerpt', 'appeal_teaser_length' );


/** (4)
 * custom excerpt length
 * @return excerpt_length
 * integer value
*/
function appeal_theme_excerpt_length()
{
    if ( get_theme_mods( ) ) {
        $content = wp_strip_all_tags(get_the_content() , true );
        $length = get_theme_mod( 'appeal_posts_excerpt_length_setting', '58' );
            echo wp_trim_words( $content, $length );
    }
}
add_filter( 'excerpt_length', 'appeal_theme_excerpt_length', 999 );


/**
 * Registers the Theme Customizer Preview JavaScript with WordPress.
 *
 * @package Theme: Appeal
 */
function appeal_customizer_live_preview() {
	wp_enqueue_script(
		'appeal-theme-customizer',
		get_template_directory_uri().'/assets/customizer-javascript.js',
		array( 'customize-preview' ),
		'',
		true
	);
}
add_action( 'customize_preview_init', 'appeal_customizer_live_preview' );
