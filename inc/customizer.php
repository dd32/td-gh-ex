<?php
/**
 * Bassist customization 
 *
 * @package Bassist
 * @since Bassist 1.0.0
 */

/**
 * Implement Customizer additions and adjustments.
 *
 * @since Bassist 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */

function bassist_customize_register ($wp_customize) {

    $blog_navigation_array = array(
        'navigation' => __('Navigation', 'bassist'),
        'pagination' => __('Pagination', 'bassist'),
    );

    $entry_meta_array = array(
        'show' => __('Show', 'bassist'),
        'hide' => __('Hide', 'bassist'),
    );

/**
* Removes the control for displaying or not the header text and adds the posibility of displaying the site title and tagline separately. 
**/

// ===============================
$wp_customize->remove_control('display_header_text');

//===============================
$wp_customize->add_setting('bassist_theme_options[show_site_title]', array(
    'default'           => 1,
    'sanitize_callback' => 'absint',
    'capability'        => 'edit_theme_options',
    'type'           => 'option',
));

$wp_customize->add_control( 'show_site_title', array(
    'label'    => __('Display Site Title', 'bassist'),
    'section'  => 'title_tagline',
    'settings' => 'bassist_theme_options[show_site_title]',
    'type' => 'checkbox',
));
//===============================
$wp_customize->add_setting( 'bassist_theme_options[show_site_description]', array(
    'default'        => 1,
    'sanitize_callback' => 'absint',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
));

$wp_customize->add_control('show_site_description', array(
    'label'      => __('Display Tagline', 'bassist'),
    'section'    => 'title_tagline',
    'settings'   => 'bassist_theme_options[show_site_description]',
    'type' => 'checkbox',
));

//  ==============================
//  ==     Colors Section       ==
//  ==============================
$wp_customize->add_setting( 'bassist_theme_options[site_description_color]', array(
    'default'        => '#111111',
    'sanitize_callback' => 'sanitize_hex_color',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
));

$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'site_description_color', array(
    'label'      => __('Site Description Color', 'bassist'),
    'section'    => 'colors',
    'settings'   => 'bassist_theme_options[site_description_color]',
)));

//===============================
$wp_customize->add_setting( 'bassist_theme_options[front_page_background_color]', array(
    'default'        => '#aa0000',
    'sanitize_callback' => 'sanitize_hex_color',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
));

$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'front_page_background_color', array(
    'label'      => __('Front Page Background Color', 'bassist'),
    'section'    => 'colors',
    'settings'   => 'bassist_theme_options[front_page_background_color]',
)));

//  =============================
//  ==    Theme's Options      ==
//  =============================
$wp_customize->add_panel( 'theme_options', array(
    'priority'       => 25,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Bassist Theme Options', 'bassist' ),
    ));

//  =============================
//  == Front Page Settings   ==
//  =============================
$wp_customize->add_section( 'Front Page Settings', array(
    'title'         => __( 'Front Page Settings', 'bassist' ),
    'priority'      => 169,
    'description'   => __( 'This section is for choosing several settings of the Front Page.', 'bassist'),
    'panel'         => 'theme_options',
) );
//===============================
$wp_customize->add_setting( 'bassist_theme_options[audio_section_title]', array(
    'default'        => 'Music',
    'sanitize_callback' => 'sanitize_text_field',
    'type'           => 'option',
    'capability'     => 'edit_theme_options',
) );

$wp_customize->add_control( 'audio_section_title', array(
    'label'    => __('Title of the Audio Format Section', 'bassist'),
    'section'  => 'Front Page Settings',
    'settings' => 'bassist_theme_options[audio_section_title]',
));

//===============================
$wp_customize->add_setting( 'bassist_theme_options[video_section_title]', array(
    'default'        => 'Performances',
    'sanitize_callback' => 'sanitize_text_field',
    'type'           => 'option',
    'capability'     => 'edit_theme_options',
) );

$wp_customize->add_control( 'video_section_title', array(
    'label'    => __('Title of the Video Format Section', 'bassist'),
    'section'  => 'Front Page Settings',
    'settings' => 'bassist_theme_options[video_section_title]',
));

//  =============================
//  == Special Pages Section   ==
//  =============================
$wp_customize->add_section( 'Special Pages Settings', array(
    'title'         => __( 'Special Pages', 'bassist' ),
    'priority'      => 170,
    'description'   => __( 'This section saves the slug (i.e. its URL valid name) of the pages made with the special page templates, so they can be used across the theme. Put the pages slug here.', 'bassist'),
    'panel'         => 'theme_options',
) );
//===============================
$wp_customize->add_setting( 'bassist_theme_options[contributors_slug]', array(
    'default'        => 'contributors',
    'sanitize_callback' => 'sanitize_text_field',
    'type'           => 'option',
    'capability'     => 'edit_theme_options',
) );

$wp_customize->add_control( 'contributors_slug', array(
    'label'    => __('Slug of your Contributors Page', 'bassist'),
    'section'  => 'Special Pages Settings',
    'settings' => 'bassist_theme_options[contributors_slug]',
));

//===============================
$wp_customize->add_setting( 'bassist_theme_options[featured_articles_slug]', array(
    'default'        => 'featured',
    'sanitize_callback' => 'sanitize_text_field',
    'type'           => 'option',
    'capability'     => 'edit_theme_options',
) );

$wp_customize->add_control( 'featured_articles_slug', array(
    'label'    => __('Slug of your Featured Articles Page', 'bassist'),
    'section'  => 'Special Pages Settings',
    'settings' => 'bassist_theme_options[featured_articles_slug]',
));

//===============================
$wp_customize->add_setting( 'bassist_theme_options[biography_slug]', array(
    'default'        => 'biography',
    'sanitize_callback' => 'sanitize_text_field',
    'type'           => 'option',
    'capability'     => 'edit_theme_options',
) );

$wp_customize->add_control( 'biography_slug', array(
    'label'    => __('Slug of your Biography Page', 'bassist'),
    'section'  => 'Special Pages Settings',
    'settings' => 'bassist_theme_options[biography_slug]',
));

//  =============================
//  ==   Parallax Section    ==
//  ============================= 
$wp_customize->add_section( 'Parallax', array(
    'title'          => __( 'Parallax Settings', 'bassist' ),
    'priority'      => 171,
    'description' => __( 'This section adds the possibility of adding three parallax pictures to the Front Page.', 'bassist'),
    'panel' => 'theme_options',
) );

//===============================
$wp_customize->add_setting( 'bassist_theme_options[parallax_background_image_1]', array(
    'default'        => '',
    'sanitize_callback' => 'esc_url',
    'capability'     => 'edit_theme_options',
    'type'           => 'option', 
));

$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'parallax_background_image_1', array(
    'label'      => __('Parallax Background Image 1', 'bassist'),
    'section'    => 'Parallax',
    'settings'   => 'bassist_theme_options[parallax_background_image_1]',
)));
//===============================
$wp_customize->add_setting( 'bassist_theme_options[parallax_background_image_2]', array(
    'default'        => '',
    'sanitize_callback' => 'esc_url',
    'capability'     => 'edit_theme_options',
    'type'           => 'option', 
));

$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'parallax_background_image_2', array(
    'label'      => __('Parallax Background Image 2', 'bassist'),
    'section'    => 'Parallax',
    'settings'   => 'bassist_theme_options[parallax_background_image_2]',
)));
//===============================
$wp_customize->add_setting( 'bassist_theme_options[parallax_background_image_3]', array(
    'default'        => '',
    'sanitize_callback' => 'esc_url',
    'capability'     => 'edit_theme_options',
    'type'           => 'option', 
));

$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'parallax_background_image_3', array(
    'label'      => __('Parallax Background Image 3', 'bassist'),
    'section'    => 'Parallax',
    'settings'   => 'bassist_theme_options[parallax_background_image_3]',
)));

//  =============================
//  ==   Contact Section    ==
//  ============================= 
$wp_customize->add_section( 'Contact', array(
    'title'          => __( 'Contact Section Settings', 'bassist' ),
    'priority'      => 172,
    'panel' => 'theme_options',
) );

//===============================
$wp_customize->add_setting( 'bassist_theme_options[contact_section_background_color]', array(
    'default'        => '#dfdfdf',
    'sanitize_callback' => 'sanitize_hex_color',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
));

$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'contact_section_background_color', array(
    'label'      => __('Contact Section Background Color', 'bassist'),
    'section'    => 'Contact',
    'settings'   => 'bassist_theme_options[contact_section_background_color]',
)));

//===============================
$wp_customize->add_setting( 'bassist_theme_options[contact_section_background_image]', array(
    'default'        => '',
    'sanitize_callback' => 'esc_url',
    'capability'     => 'edit_theme_options',
    'type'           => 'option', 
));

$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'contact_section_background_image', array(
    'label'      => __('Contact Section Background Image', 'bassist'),
    'section'    => 'Contact',
    'settings'   => 'bassist_theme_options[contact_section_background_image]',
)));

//===============================
$wp_customize->add_setting( 'bassist_theme_options[contact_page_slug]', array(
    'default'        => 'contact',
    'sanitize_callback' => 'sanitize_text_field',
    'type'           => 'option',
    'capability'     => 'edit_theme_options',
) );

$wp_customize->add_control( 'contact_page_slug', array(
    'label'    => __('Slug of your Contact Page', 'bassist'),
    'section'  => 'Contact',
    'settings' => 'bassist_theme_options[contact_page_slug]',
));

//  =============================
//  ==   Blog Settings    ==
//  ============================= 
$wp_customize->add_section( 'Blog Settings', array(
    'title'          => __( 'Blog Settings', 'bassist' ),
    'priority'      => 173,
    'description' => __( 'This section adds the possibility of choosing several blog options.', 'bassist'),
    'panel' => 'theme_options',

) );
//===============================
 $wp_customize->add_setting('bassist_theme_options[entry_meta_options]', array(
    'sanitize_callback' => 'bassist_sanitize_checkbox',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
    'default'        => '1', 
));

$wp_customize->add_control( 'entry_meta_options', array(
    'settings' => 'bassist_theme_options[entry_meta_options]',
    'label'   => __('Show the post meta information','bassist'),
    'section' => 'Blog Settings',
    'type'    => 'checkbox',
    //'choices'    => $entry_meta_array,
));

//  =============================
//  ==   Navigation Settings    ==
//  ============================= 
$wp_customize->add_section( 'Navigation Settings', array(
    'title'          => __( 'Navigation Settings', 'bassist' ),
    'priority'      => 174,
    'description' => __( 'This section adds the possibility of choosing between navigation or pagination in multiple view pages.', 'bassist'),
    'panel' => 'theme_options',

) );
//===============================
 $wp_customize->add_setting('bassist_theme_options[blog_navigation]', array(
    'sanitize_callback' => 'bassist_sanitize_blog_nav',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
    'default'        => 'navigation', 
));

$wp_customize->add_control( 'blog_navigation', array(
    'settings' => 'bassist_theme_options[blog_navigation]',
    'label'   => __('Choose your preferred mode of navigating between old and new articles','bassist'),
    'section' => 'Navigation Settings',
    'type'    => 'radio',
    'choices'    => $blog_navigation_array,
));

}

add_action( 'customize_register', 'bassist_customize_register' );

/**
* Theme's Custom Styling
*/

function bassist_theme_custom_styling() {
    $bassist_theme_options = bassist_get_options( 'bassist_theme_options' );
    $entry_meta_options = $bassist_theme_options['entry_meta_options'] ;

    $parallax_background_image_1 = $bassist_theme_options['parallax_background_image_1'];
    $parallax_background_image_2 = $bassist_theme_options['parallax_background_image_2'];
    $parallax_background_image_3 = $bassist_theme_options['parallax_background_image_3'];

    $front_page_background_color = $bassist_theme_options['front_page_background_color'];

    $contact_section_background_color = $bassist_theme_options['contact_section_background_color'];
    $contact_section_background_image = $bassist_theme_options['contact_section_background_image'];

    $css = '';

    if ( $entry_meta_options !== '1' )
    $css .= '.entry-meta { position: absolute; left: -9999px;}' . "\n";

    if ( $parallax_background_image_1 )
    $css .= '.parallax .bg__1 { background-image: url(' . $parallax_background_image_1 . ')}' . "\n";

    if ( $parallax_background_image_2 )
    $css .= '.parallax .bg__2 { background-image: url(' . $parallax_background_image_2 . ')}' . "\n";

    if ( $parallax_background_image_3 )
    $css .= '.parallax .bg__3 { background-image: url(' . $parallax_background_image_3 . ')}' . "\n";

    if ( $front_page_background_color )
    $css .= '.biography-section, .audio-format-section, .video-format-section { background-color: ' . $front_page_background_color . '}' . "\n";

    if ( $contact_section_background_color )
    $css .= '.contact-section { background-color: ' . $contact_section_background_color . '}' . "\n";

    if ( $contact_section_background_image )
    $css .= '.contact-section { background-image: url(' . $contact_section_background_image . ')}' . "\n";

    // CSS styles
    if ( isset( $css ) && $css != '' ) {
        $css = strip_tags( $css );
        $css = "<!--Custom Styling-->\n<style media=\"screen\" type=\"text/css\">\n" . esc_html($css) . "</style>\n";
        echo $css;
    }

}
add_action('wp_head','bassist_theme_custom_styling');


function bassist_sanitize_checkbox( $input ) {
    if ( $input ) {
        $output = '1';
    } else {
        $output = false;
    }
    return $output;
}

/**
 * Sanitization for navigation choice
 */
function bassist_sanitize_blog_nav( $value ) {
    $recognized = bassist_blog_nav();
    if ( array_key_exists( $value, $recognized ) ) {
        return $value;
    }
    return apply_filters( 'bassist_blog_nav', current( $recognized ) );
}

function bassist_sanitize_post_entry_meta( $value ) {
    $recognized = bassist_entry_meta();
    if ( array_key_exists( $value, $recognized ) ) {
        return $value;
    }
    return apply_filters( 'bassist_entry_meta', current( $recognized ) );
}

function bassist_blog_nav() {
    $default = array(
        'navigation' => 'navigation',
        'pagination' => 'pagination',
    );
    return apply_filters( 'bassist_blog_nav', $default );
}

function bassist_entry_meta() {
    $default = array(
        'show' => 'show',
        'hide' => 'hide',
    );
    return apply_filters( 'bassist_entry_meta', $default );
}

function bassist_get_option_defaults() {
	$defaults = array(
		'show_site_title' => 1,
		'show_site_description' => 1,
        'site_description_color' => '#111111',
        'entry_meta_options' => 1,
        'front_page_background_color' => '#aa0000',
        'audio_section_title' => 'Music',
        'video_section_title' => 'Performances',
        'contributors_slug' => 'contributors',
        'featured_articles_slug' => 'featured',
        'biography_slug' => 'biography',
        'blog_navigation' => 'navigation',	
        'parallax_background_image_1' => '',
        'parallax_background_image_2' => '',
        'parallax_background_image_3' => '',
        'contact_section_background_color' => '#dfdfdf',
        'contact_section_background_image' => '',
        'contact_page_slug' => 'contact',	
	);
	return apply_filters( 'bassist_get_option_defaults', $defaults );
}

function bassist_get_options() {
    // Options API
    return wp_parse_args( 
        get_option( 'bassist_theme_options', array() ), 
        bassist_get_option_defaults() 
    );
}




