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
$wp_customize->add_section( 'front_page', array(
	'title'         => __( 'Front Page Settings', 'bassist' ),
	'priority'      => 169,
	'description'   => __( 'In this section you can choose several settings of the Front Page.', 'bassist'),
	'panel'         => 'theme_options',
) );

//===============================
$wp_customize->add_setting( 'bassist_theme_options[about_slug]', array(
	'default'        => 'about',
	'sanitize_callback' => 'sanitize_text_field',
	'type'           => 'option',
	'capability'     => 'edit_theme_options',
) );

$wp_customize->add_control( 'about_slug', array(
	'label'    => __('Slug of your About Page', 'bassist'),
	'description'      => __('Create a page with an introduction about yourself and write the slug of the page below.', 'bassist'),
	'section'  => 'front_page',
	'settings' => 'bassist_theme_options[about_slug]',
));

//===============================
$wp_customize->add_setting( 'bassist_theme_options[about_section_background_color]', array(
	'default'        => '#aa0000',
	'sanitize_callback' => 'sanitize_hex_color',
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
));

$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'about_section_background_color', array(
	'label'      => __('About Section Background Color', 'bassist'),
	'section'    => 'front_page',
	'settings'   => 'bassist_theme_options[about_section_background_color]',
)));

//===============================
$wp_customize->add_setting( 'bassist_theme_options[audio_section_title]', array(
	'default'        => 'Music',
	'sanitize_callback' => 'sanitize_text_field',
	'type'           => 'option',
	'capability'     => 'edit_theme_options',
) );

$wp_customize->add_control( 'audio_section_title', array(
	'label'    => __('Title of the Audio Section', 'bassist'),
	'description'      => __('This section shows your posts with format audio.', 'bassist'),
	'section'  => 'front_page',
	'settings' => 'bassist_theme_options[audio_section_title]',
));

//===============================
$wp_customize->add_setting( 'bassist_theme_options[audio_section_background_color]', array(
	'default'        => '#971598',
	'sanitize_callback' => 'sanitize_hex_color',
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
));

$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'audio_section_background_color', array(
	'label'      => __('Audio Section Background Color', 'bassist'),
	'section'    => 'front_page',
	'settings'   => 'bassist_theme_options[audio_section_background_color]',
)));

//===============================
$wp_customize->add_setting( 'bassist_theme_options[video_section_title]', array(
	'default'        => 'Performances',
	'sanitize_callback' => 'sanitize_text_field',
	'type'           => 'option',
	'capability'     => 'edit_theme_options',
) );

$wp_customize->add_control( 'video_section_title', array(
	'label'    => __('Title of the Video Section', 'bassist'),
	'description'      => __('This section shows your posts with format video.', 'bassist'),
	'section'  => 'front_page',
	'settings' => 'bassist_theme_options[video_section_title]',
));

//===============================
$wp_customize->add_setting( 'bassist_theme_options[video_section_background_color]', array(
	'default'        => '#5352c1',
	'sanitize_callback' => 'sanitize_hex_color',
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
));

$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'video_section_background_color', array(
	'label'      => __('Video Section Background Color', 'bassist'),
	'section'    => 'front_page',
	'settings'   => 'bassist_theme_options[video_section_background_color]',
)));

//  =============================
//  ==   Parallax Section    ==
//  ============================= 
$wp_customize->add_section( 'Parallax', array(
	'title'          => __( 'Parallax Settings', 'bassist' ),
	'priority'      => 170,
	'description' => __( 'In this section you can add three parallax image blocks to the Front Page. If the image is left empty, no parallax block is created.', 'bassist'),
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
	'label'      => __('Parallax 1 Background Image', 'bassist'),
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
	'label'      => __('Parallax 2 Background Image', 'bassist'),
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
	'label'      => __('Parallax 3 Background Image', 'bassist'),
	'section'    => 'Parallax',
	'settings'   => 'bassist_theme_options[parallax_background_image_3]',
)));

//  =============================
//  ==   Contact Section    ==
//  ============================= 
$wp_customize->add_section( 'Contact', array(
	'title'          => __( 'Contact Section Settings', 'bassist' ),
	'priority'      => 171,
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
	'description' => __('Install the contact plugin of your preference. Create a page with a title like Contact or Contact me, write the shortcode given by the Contact plugin in the content of the page and write the slug of the page below.', 'bassist'),
	'section'  => 'Contact',
	'settings' => 'bassist_theme_options[contact_page_slug]',
));

//  =============================
//  == Special Pages Section   ==
//  =============================
$wp_customize->add_section( 'Special Pages Settings', array(
	'title'         => __( 'Special Pages', 'bassist' ),
	'priority'      => 172,
	'description'   => __( 'This section saves the slug (i.e. its URL valid name) of the pages made with the special page templates, so they can be used across the theme. Write the pages slug here.', 'bassist'),
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

//  =============================
//  ==   Blog Settings    ==
//  ============================= 
$wp_customize->add_section( 'Blog Settings', array(
	'title'          => __( 'Blog Settings', 'bassist' ),
	'priority'      => 173,
	'description' => __( 'In this section you can choose several blog options.', 'bassist'),
	'panel' => 'theme_options',

) );
//===============================
 $wp_customize->add_setting('bassist_theme_options[entry_meta_options]', array(
	'sanitize_callback' => 'bassist_sanitize_checkbox',
	'capability'     => 'edit_theme_options',
	'type'           => 'option',
	'default'        => '0', 
));

$wp_customize->add_control( 'entry_meta_options', array(
	'settings' => 'bassist_theme_options[entry_meta_options]',
	'label'   => __('Hide the post meta information on the front page','bassist'),
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
	'description' => __( 'In this section you can choose between navigation or pagination in multiple view pages.', 'bassist'),
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

	$about_section_background_color = $bassist_theme_options['about_section_background_color'];
	$audio_section_background_color = $bassist_theme_options['audio_section_background_color'];
	$video_section_background_color = $bassist_theme_options['video_section_background_color'];

	$contact_section_background_color = $bassist_theme_options['contact_section_background_color'];
	$contact_section_background_image = $bassist_theme_options['contact_section_background_image'];

	$css = '';

	if ( is_front_page() && '1' == $entry_meta_options )
	$css .= '.entry-meta { position: absolute; left: -9999px;}' . "\n";

	if ( $parallax_background_image_1 )
	$css .= '.parallax .bg__1 { background-image: url(' . $parallax_background_image_1 . ')}' . "\n";

	if ( $parallax_background_image_2 )
	$css .= '.parallax .bg__2 { background-image: url(' . $parallax_background_image_2 . ')}' . "\n";

	if ( $parallax_background_image_3 )
	$css .= '.parallax .bg__3 { background-image: url(' . $parallax_background_image_3 . ')}' . "\n";

	if ( $about_section_background_color )
	$css .= '.about-section { background-color: ' . $about_section_background_color . '}' . "\n";

	if ( $audio_section_background_color )
	$css .= '.audio-format-section { background-color: ' . $audio_section_background_color . '}' . "\n";

	if ( bassist_relative_luminance($audio_section_background_color) <= 0.324 ) {
	$css .= '.audio-format-section .entry-meta, .audio-format-section .entry-meta a, .audio-format-section .entry-title a:hover { color: #bbb}' . "\n";
	$css .= '.audio-format-section .entry-meta a:hover { color: #eee}' . "\n";
	$css .= '.audio-format-section .entry-title a:hover { color: #bbb}' . "\n";
}

	if ( $video_section_background_color )
	$css .= '.video-format-section { background-color: ' . $video_section_background_color . '}' . "\n";

	if ( bassist_relative_luminance($video_section_background_color) <= 0.324 ) {
	$css .= '.video-format-section .entry-meta, .video-format-section .entry-meta a, .video-format-section .entry-title a:hover { color: #bbb}' . "\n";
	$css .= '.video-format-section .entry-meta a:hover { color: #eee}' . "\n";
}

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
		'entry_meta_options' => 0,
		'about_section_background_color' => '#aa0000',
		'audio_section_background_color' => '#971598',
		'audio_section_title' => 'Music',
		'video_section_background_color' => '#5352c1',
		'video_section_title' => 'Performances',
		'about_slug' => 'about',
		'contributors_slug' => 'contributors',
		'featured_articles_slug' => 'featured',
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

