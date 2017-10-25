<?php
function abaya_themes_customizer($wp_customize) {
	global $wpdb;
	$blocks = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE post_type = 'page'");
	$blocks_array = array('');
	if ($blocks) {
		foreach ( $blocks as $block ) {
$blocks_array[$block->ID] = $block->post_title;
		}
	} else {
		$blocks_array["No content blocks found"] = 0;
	}
$wp_customize->add_section(
   'theme_setting_section',
   array(
       'title' => esc_html__('Themes Settings', 'abaya'),
       'description' => esc_html__('This is a Themes Settings section.', 'abaya'),
       'priority' => 35,
   )
);
$wp_customize->add_setting(
'copyright_textbox',
array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport'   => 'refresh',
)
);
$wp_customize->add_control(
'copyright_textbox',
array(
   'label' => esc_html__('Copyright text', 'abaya'),
   'section' => 'theme_setting_section',
   'type' => 'textarea',
)
);
$wp_customize->add_setting(
'slider_option',
array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport'   => 'refresh',
)
);


$wp_customize->add_setting('bgimg-upload',array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
) );

$wp_customize->add_control(
new WP_Customize_Upload_Control(
   $wp_customize,
   'bgimg-upload',
   array(
       'label' => esc_html__('Banner Image Change', 'abaya'),
       'section' => 'theme_setting_section',
       'settings' => 'bgimg-upload'
   )
)
);

$wp_customize->add_setting(
'banner_title',array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport'   => 'refresh',
)
);

$wp_customize->add_control(
'banner_title',
array(
   'type' => 'text',
   'label' => esc_html__('Banner Title', 'abaya'),
   'section' => 'theme_setting_section',
)
);

$wp_customize->add_setting(
'banner_text',array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport'=> 'refresh',));

$wp_customize->add_control(
'banner_text',
array(
   'type' => 'textarea',
   'label' => esc_html__('Banner Text', 'abaya'),
   'section' => 'theme_setting_section',
)
);
$wp_customize->add_setting(
'banner_url',array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport'   => 'refresh',
)
);

$wp_customize->add_control(
'banner_url',
array(
   'type' => 'text',
   'label' => esc_html__('Button Url', 'abaya'),
   'section' => 'theme_setting_section',
)
);
///second slider
$wp_customize->add_setting('bgimg-upload-s',array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
) );

$wp_customize->add_control(
new WP_Customize_Upload_Control(
   $wp_customize,
   'bgimg-upload-s',
   array(
       'label' => esc_html__('Banner Image Change', 'abaya'),
       'section' => 'theme_setting_section',
       'settings' => 'bgimg-upload-s'
   )
)
);

$wp_customize->add_setting(
'banner_title_s',array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport'   => 'refresh',
)
);

$wp_customize->add_control(
'banner_title_s',
array(
   'type' => 'text',
   'label' => esc_html__('Banner Title', 'abaya'),
   'section' => 'theme_setting_section',
)
);

$wp_customize->add_setting(
'banner_text_s',array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport'=> 'refresh',));

$wp_customize->add_control(
'banner_text_s',
array(
   'type' => 'textarea',
   'label' => esc_html__('Banner Text', 'abaya'),
   'section' => 'theme_setting_section',
)
);
$wp_customize->add_setting(
'banner_url_s',array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport'   => 'refresh',
)
);

$wp_customize->add_control(
'banner_url_s',
array(
   'type' => 'text',
   'label' => esc_html__('Button Url', 'abaya'),
   'section' => 'theme_setting_section',
)
);
//Third sloider
$wp_customize->add_setting('bgimg-upload-t',array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'   => 'refresh',
) );

$wp_customize->add_control(
new WP_Customize_Upload_Control(
   $wp_customize,
   'bgimg-upload-t',
   array(
       'label' => esc_html__('Banner Image Change', 'abaya'),
       'section' => 'theme_setting_section',
       'settings' => 'bgimg-upload-t'
   )
)
);

$wp_customize->add_setting(
'banner_title_t',array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport'   => 'refresh',
)
);

$wp_customize->add_control(
'banner_title_t',
array(
   'type' => 'text',
   'label' => esc_html__('Banner Title', 'abaya'),
   'section' => 'theme_setting_section',
)
);

$wp_customize->add_setting(
'banner_text_t',array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport'=> 'refresh',));

$wp_customize->add_control(
'banner_text_t',
array(
   'type' => 'textarea',
   'label' => esc_html__('Banner Text', 'abaya'),
   'section' => 'theme_setting_section',
)
);
$wp_customize->add_setting(
'banner_url_t',array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport'   => 'refresh',
)
);

$wp_customize->add_control(
'banner_url_t',
array(
   'type' => 'text',
   'label' => esc_html__('Button Url', 'abaya'),
   'section' => 'theme_setting_section',
)
);
//video slider
$wp_customize->add_setting(
'video_code',array(
'default' => '',
'sanitize_callback' => 'abaya_sanitize_strip_slashes',
'transport'=> 'refresh',));

//Header section settings
$wp_customize->add_section(
   'header_setting_section',
   array(
       'title' => esc_html__('Heager Section Settings', 'abaya'),
       'description' => esc_html__('This is a Heager Settings section.', 'abaya'),
       'priority' => 35,
   )
);
$wp_customize->add_setting(
'header_text',array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport'=> 'refresh',));

$wp_customize->add_control(
'header_text',
array(
   'type' => 'text',
   'label' => esc_html__('Header Text', 'abaya'),
   'section' => 'header_setting_section',
)
);
// add color picker setting
$wp_customize->add_setting( 'header_text_color', array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_text_color', array(
	'label' => esc_html__('Header Text Color', 'abaya'),
	'section' => 'header_setting_section',
	'settings' => 'header_text_color',
) ) );
// add color picker setting
$wp_customize->add_setting( 'header_logotagline_color', array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_logotagline_color', array(
	'label' => esc_html__('Header Tag Line Color', 'abaya'),
	'section' => 'header_setting_section',
	'settings' => 'header_logotagline_color',
) ) );
//Shop Settings
$wp_customize->add_section(
   'shoppage_settings',
   array(
       'title' => esc_html__('Shop Page Settings', 'abaya'),
       'description' => esc_html__('This is a shop page section.', 'abaya'),
       'priority' => 35,
   )
);
$wp_customize->add_setting(
'shoppagesettings',
array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport'   => 'refresh',
)
);

$wp_customize->add_control(
'shoppagesettings',
array(
   'type' => 'radio',
   'label' => esc_html__('Shop page settings', 'abaya'),
   'section' => 'shoppage_settings',
   'choices' => array(
       '1' => esc_html__('Product Page With Right Sidebar', 'abaya'),
       '2' => esc_html__('Product Page With Left Sidebar', 'abaya'),
		'3' => esc_html__('Product Page Without Sidebar', 'abaya'),
   ),
)
);
//
$wp_customize->add_section(
   'page_headerimages',
   array(
       'title' => esc_html__('Inner header image', 'abaya'),
       'description' => esc_html__('This is a Themes Settings section.', 'abaya'),
       'priority' => 35,
   )
);
foreach ( $blocks as $blocks )
{
	$wp_customize->add_setting(
					'footer_logo_page'.$blocks->ID,
					array(
					'default' => '',
					'sanitize_callback' => 'sanitize_text_field',
					'transport'   => 'refresh',
					)
					);

			$wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'footer_logo_page'.$blocks->ID,
           array(
               'label'      => $blocks->post_title.(esc_html__(' &nbsp;Inner header image', 'abaya')),
               'section'    => 'page_headerimages',
               'height' => 146,
                'width' => 1920,
                'flex_width' => false,
                'flex_height' => false,
               'settings'   => 'footer_logo_page'.$blocks->ID,
               'settings'   => 'footer_logo_page'.$blocks->ID,
                
           )
       )
   );
}
	
}
add_action('customize_register', 'abaya_themes_customizer');
/* add settings to create various social media text areas. */
function abaya_sanitize_strip_slashes($input) {
   return wp_kses_post($input);
}
//
?>