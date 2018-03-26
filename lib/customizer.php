<?php
function backyard_themes_customizer($wp_customize) {
	$comley_cat_array = array('');
	$get_categories=get_categories();
	if ($get_categories) {
		$comley_cat_array[] = '';
		foreach ( $get_categories as $get_categoriesvalues ) {
			$comley_cat_array[$get_categoriesvalues->term_id] = $get_categoriesvalues->name;
		}
	} else {
		$comley_cat_array["No content blocks found"] = 0;
	}
require get_template_directory() . '/lib/backyard-customizerclass.php';
//theme options
$wp_customize->add_panel( 'backyard_options',
			array(
				'priority'       => 2,
			    'capability'     => 'edit_theme_options',
			    'theme_supports' => '',
			    'title'          => esc_html__( 'Theme options', 'backyard' ),
			    'description'    => '',
			)
		);

		/* Global Settings
		----------------------------------------------------------------------*/
		//logo settings
		$wp_customize->add_section(
   'header_logo_settings',
   array(
       'title' => esc_html__('Logo Settings', 'backyard'),
       'priority' => 1,
	   'panel'       => 'backyard_options',
   )
);
$wp_customize->add_setting(
					'logolayout',
					array(
					'default' => 'logolayout_first',
					'sanitize_callback' => 'sanitize_text_field',
					'transport'   => 'refresh',
					)
					);

	$wp_customize->add_control(
		new backyard_Custom_Radio_Image_Control( 
			// $wp_customize object
			$wp_customize,
			// $id
			'logolayout',
			// $args
			array(
				'settings'		=> 'logolayout',
				'section'		=> 'header_logo_settings',
				'description'	=> esc_html__( 'Select logo layout.', 'backyard' ),
				'choices'		=> array(
				'logolayout_first' => array(
                        'label' => esc_html__( 'Left logo', 'backyard' ),
                        'url'   => get_template_directory_uri() . '/assets/images/left-logo.jpg',
                    ),
				'logolayout_second' => array(
                        'label' => esc_html__( 'Right logo', 'backyard' ),
                        'url'   => get_template_directory_uri() . '/assets/images/right-logo.jpg',
                    ),
					'logolayout_third' => array(
                        'label' => esc_html__( 'Center logo', 'backyard' ),
                        'url'   => get_template_directory_uri() . '/assets/images/cetner-logo.jpg',
                    ),
					
				)
			)
		)
	);
		//end
		//Top header
		$wp_customize->add_section(
   'topheader_settings',
   array(
       'title' => esc_html__('Top header settings', 'backyard'),
       'priority' => 1,
	   'panel'       => 'backyard_options',
   )
);
$wp_customize->add_setting(
'show_top_bar',array(
'default' => '',
'sanitize_callback' => 'backyard_boolean',
'transport'=> 'refresh',));

$wp_customize->add_control(
'show_top_bar',
array(
   'type' => 'checkbox',
   'label' => esc_html__('Show Top Bar', 'backyard'),
   'section' => 'topheader_settings',
)
);
$wp_customize->add_setting(
					'topheaderlayout',
					array(
					'default' => 'topheaderlayout_a',
					'sanitize_callback' => 'sanitize_text_field',
					'transport'   => 'refresh',
					)
					);

	$wp_customize->add_control(
		new backyard_Custom_Radio_Image_Control( 
			// $wp_customize object
			$wp_customize,
			// $id
			'topheaderlayout',
			// $args
			array(
				'settings'		=> 'topheaderlayout',
				'section'		=> 'topheader_settings',
				'description'	=> esc_html__( 'Select top header layout.', 'backyard' ),
				'choices'		=> array(
				'topheaderlayout_a' => array(
				        'label' => esc_html__( 'Left search/Right social icon', 'backyard' ),
                        'url'   => get_template_directory_uri() . '/assets/images/leftsearch-righticon.jpg',
                    ),
				'topheaderlayout_b' => array(
				'label' => esc_html__( 'Right search/Left social icon', 'backyard' ),
                        'url'   => get_template_directory_uri() . '/assets/images/rightsearch-lefticon.jpg',
                    ),
					'topheaderlayout_c' => array(
					'label' => esc_html__( 'Left search', 'backyard' ),
                        'url'   => get_template_directory_uri() . '/assets/images/leftsearch.jpg',
                    ),
					'topheaderlayout_d' => array(
					'label' => esc_html__( 'Right search', 'backyard' ),
                        'url'   => get_template_directory_uri() . '/assets/images/rightsearch.jpg',
                    ),
					'topheaderlayout_e' => array(
					'label' => esc_html__( 'Left social icon', 'backyard' ),
                        'url'   => get_template_directory_uri() . '/assets/images/lefticon.jpg',
                    ),
					'topheaderlayout_f' => array(
					     'label' => esc_html__( 'Right social icon', 'backyard' ),
                        'url'   => get_template_directory_uri() . '/assets/images/righticon.jpg',
                    ),
					'topheaderlayout_g' => array(
					     'label' => esc_html__( 'Center search', 'backyard' ),
                        'url'   => get_template_directory_uri() . '/assets/images/centersearch.jpg',
                    ),
					'topheaderlayout_h' => array(
					     'label' => esc_html__( 'Center social icon', 'backyard' ),
                        'url'   => get_template_directory_uri() . '/assets/images/centericon.jpg',
                    ),
					
				)
			)
		)
	);
	//Typography
	$wp_customize->add_section(
   'typography_settings',
   array(
       'title' => esc_html__('Typography', 'backyard'),
       'priority' => 1,
	   'panel'       => 'backyard_options',
   )
);
//font
$wp_customize->add_setting(
			'backyard_headings_font', array(
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			new backyard_Font_Selector(
				$wp_customize, 'backyard_headings_font', array(
					'label'    => esc_html__( 'Typography font family', 'backyard' ),
					'section'  => 'typography_settings',
					'priority' => 5,
					'type'     => 'select',
				)
			)
		);
//end
$wp_customize->add_setting(
'heading_h1',array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport'=> 'refresh',));

$wp_customize->add_control( new backyard_Customizer_Range_Value_Control( $wp_customize, 'heading_h1', array(
	'type'     => 'range-value',
	'section'  => 'typography_settings',
	'settings' => 'heading_h1',
	'label'    => esc_html__( 'H1 font size','backyard' ),
	'input_attrs' => array(
		'min'    => 1,
		'max'    => 70,
		'step'   => 1,
		'suffix' => 'px', //optional suffix
  	),
) ) );
//h2
$wp_customize->add_setting(
'heading_h2',array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport'=> 'refresh',));

$wp_customize->add_control( new backyard_Customizer_Range_Value_Control( $wp_customize, 'heading_h2', array(
	'type'     => 'range-value',
	'section'  => 'typography_settings',
	'settings' => 'heading_h2',
	'label'    => esc_html__( 'H2 font size','backyard' ),
	'input_attrs' => array(
		'min'    => 1,
		'max'    => 70,
		'step'   => 1,
		'suffix' => 'px', //optional suffix
  	),
) ) );
$wp_customize->add_setting(
'heading_h3',array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport'=> 'refresh',));

$wp_customize->add_control( new backyard_Customizer_Range_Value_Control( $wp_customize, 'heading_h3', array(
	'type'     => 'range-value',
	'section'  => 'typography_settings',
	'settings' => 'heading_h3',
	'label'    => esc_html__( 'H3 font size','backyard' ),
	'input_attrs' => array(
		'min'    => 1,
		'max'    => 70,
		'step'   => 1,
		'suffix' => 'px', //optional suffix
  	),
) ) );
$wp_customize->add_setting(
'heading_h4',array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport'=> 'refresh',));

$wp_customize->add_control( new backyard_Customizer_Range_Value_Control( $wp_customize, 'heading_h4', array(
	'type'     => 'range-value',
	'section'  => 'typography_settings',
	'settings' => 'heading_h4',
	'label'    => esc_html__( 'H4 font size','backyard' ),
	'input_attrs' => array(
		'min'    => 1,
		'max'    => 70,
		'step'   => 1,
		'suffix' => 'px', //optional suffix
  	),
) ) );

$wp_customize->add_setting(
'heading_h5',array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport'=> 'refresh',));

$wp_customize->add_control( new backyard_Customizer_Range_Value_Control( $wp_customize, 'heading_h5', array(
	'type'     => 'range-value',
	'section'  => 'typography_settings',
	'settings' => 'heading_h5',
	'label'    => esc_html__( 'H5 font size','backyard' ),
	'input_attrs' => array(
		'min'    => 1,
		'max'    => 70,
		'step'   => 1,
		'suffix' => 'px', //optional suffix
  	),
) ) );
$wp_customize->add_setting(
'heading_h6',array(
'default' => '',
'sanitize_callback' => 'sanitize_text_field',
'transport'=> 'refresh',));

$wp_customize->add_control( new backyard_Customizer_Range_Value_Control( $wp_customize, 'heading_h6', array(
	'type'     => 'range-value',
	'section'  => 'typography_settings',
	'settings' => 'heading_h6',
	'label'    => esc_html__( 'H6 font size','backyard' ),
	'input_attrs' => array(
		'min'    => 1,
		'max'    => 70,
		'step'   => 1,
		'suffix' => 'px', //optional suffix
  	),
) ) );
	//end
	//footer
	$wp_customize->add_section(
   'footer_settings',
   array(
       'title' => esc_html__('Footer', 'backyard'),
       'description' => esc_html__('This is a footer settings.', 'backyard'),
       'priority' => 1,
	   'panel'       => 'backyard_options',
   )
);
$wp_customize->add_setting(
'footer_widgets',array(
'default' => '',
'sanitize_callback' => 'backyard_boolean',
'transport'=> 'refresh',));

$wp_customize->add_control(
'footer_widgets',
array(
   'type' => 'checkbox',
   'label' => esc_html__('Footer Widget Area', 'backyard'),
   'section' => 'footer_settings',
)
);
$wp_customize->add_setting(
'footer_copyright_bar',array(
'default' => '',
'sanitize_callback' => 'backyard_boolean',
'transport'=> 'refresh',));

$wp_customize->add_control(
'footer_copyright_bar',
array(
   'type' => 'checkbox',
   'label' => esc_html__('Footer Copyright Bar', 'backyard'),
   'section' => 'footer_settings',
)
);	
$wp_customize->add_setting(
'copyright',array(
'default' => '',
'sanitize_callback' => 'backyard_allowhtml_string',
'transport'=> 'refresh',));

$wp_customize->add_control(
'copyright',
array(
   'type' => 'textarea',
   'label' => esc_html__('Footer Copyright Text (Validated for HTML)', 'backyard'),
   'description' =>__('Validated for HTML', 'backyard'),
   'section' => 'footer_settings',
)
);	
//home
	$wp_customize->add_section(
   'home_settings',
   array(
       'title' => esc_html__('Home', 'backyard'),
       'description' => esc_html__('Home Page options', 'backyard'),
       'priority' => 1,
	   'panel'       => 'backyard_options',
   )
);
$wp_customize->add_setting(
'choose_slider',array(
'default' => '',
'sanitize_callback' => 'backyard_boolean',
'transport'=> 'refresh',));

$wp_customize->add_control(
'choose_slider',
array(
   'type' => 'checkbox',
   'label' => esc_html__('Home Page Slider', 'backyard'),
   'section' => 'home_settings',
)
);
$wp_customize->add_setting(
'slider_cat',array(
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'   => 'refresh',
			)
);
$wp_customize->add_control(
'slider_cat',
array(
    'type' => 'select',
    'label' =>__('Slider Category', 'backyard'),
	'choices' =>$comley_cat_array,
	'section' => 'home_settings',
)
);
$wp_customize->add_setting( 'home_template_blog', array(
  'default' => 'left',
  'sanitize_callback' => 'backyard_themeslug_sanitize_select',
) );

$wp_customize->add_control( 'home_template_blog', array(
  'type' => 'radio',
  'section' => 'home_settings', // Add a default or your own section
  'label' => esc_html__( 'Template home sidebar settings' ,'backyard'),
  'choices' => array(
    'standardleft' => esc_html__( 'Standard Left sidebar','backyard' ),
    'standardright' => esc_html__( 'Standard Right sidebar' ,'backyard'),
    'standardfull' => esc_html__( 'Standard Full width' ,'backyard'),
    'gridleft' => esc_html__( 'Grid Left sidebar' ,'backyard'),
	'gridright' => esc_html__( 'Grid Right sidebar' ,'backyard'),
	'gridfull' => esc_html__( 'Grid Full sidebar' ,'backyard'),
	'listleft' => esc_html__( 'List Left sidebar' ,'backyard'),
	'listright' => esc_html__( 'List Right sidebar' ,'backyard'),
	'listfull' => esc_html__( 'List Full sidebar' ,'backyard'),	
  ),
) );
//Social icon
	$wp_customize->add_section(
   'social_media',
   array(
       'title' => esc_html__('Social Media', 'backyard'),
       'description' => esc_html__('Social media options', 'backyard'),
       'priority' => 1,
	   'panel'       => 'backyard_options',
   )
);
$wp_customize->add_setting(
'facebook_url',array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'=> 'refresh',));

$wp_customize->add_control(
'facebook_url',
array(
   'type' => 'text',
   'label' => esc_html__('Facebook URL', 'backyard'),
   'section' => 'social_media',
)
);
$wp_customize->add_setting(
'twitter_url',array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'=> 'refresh',));

$wp_customize->add_control(
'twitter_url',
array(
   'type' => 'text',
   'label' => esc_html__('Twitter URL', 'backyard'),
   'section' => 'social_media',
)
);
$wp_customize->add_setting(
'google_url',array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'=> 'refresh',));

$wp_customize->add_control(
'google_url',
array(
   'type' => 'text',
   'label' => esc_html__('Google+ URL', 'backyard'),
   'section' => 'social_media',
)
);
$wp_customize->add_setting(
'instagram_url',array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'=> 'refresh',));

$wp_customize->add_control(
'instagram_url',
array(
   'type' => 'text',
   'label' => esc_html__('Instagram URL', 'backyard'),
   'section' => 'social_media',
)
);

$wp_customize->add_setting(
'youtube_channel_link',array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'=> 'refresh',));

$wp_customize->add_control(
'youtube_channel_link',
array(
   'type' => 'text',
   'label' => esc_html__('Youtube Channel Link', 'backyard'),
   'section' => 'social_media',
)
);
$wp_customize->add_setting(
'linkedin_link',array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'=> 'refresh',));

$wp_customize->add_control(
'linkedin_link',
array(
   'type' => 'text',
   'label' => esc_html__('Linkedin Link', 'backyard'),
   'section' => 'social_media',
)
);
$wp_customize->add_setting(
'pinterest_link',array(
'default' => '',
'sanitize_callback' => 'esc_url_raw',
'transport'=> 'refresh',));

$wp_customize->add_control(
'pinterest_link',
array(
   'type' => 'text',
   'label' => esc_html__('Pinterest Link', 'backyard'),
   'section' => 'social_media',
)
);
		/* Global Settings
		----------------------------------------------------------------------*/
		$wp_customize->add_section(
   'blog_settings',
   array(
       'title' => esc_html__('Blog Settings', 'backyard'),
       'description' => esc_html__('This is a page settings.', 'backyard'),
       'priority' => 5,
	   'panel'       => 'backyard_options',
   )
);
$wp_customize->add_setting( 'blog_sidebar', array(
  'default' => 'left',
  'sanitize_callback' => 'backyard_themeslug_sanitize_select',
) );

$wp_customize->add_control( 'blog_sidebar', array(
  'type' => 'radio',
  'section' => 'blog_settings', // Add a default or your own section
  'label' => esc_html__( 'Blog sidebar settings' ,'backyard'),
  'choices' => array(
    'left' => esc_html__( 'Left sidebar','backyard' ),
    'right' => esc_html__( 'Right sidebar' ,'backyard'),
    'full' => esc_html__( 'Full width' ,'backyard'),
	'gridleft' => esc_html__( 'Grid Left sidebar' ,'backyard'),
	'gridright' => esc_html__( 'Grid Right sidebar' ,'backyard'),
	'gridfull' => esc_html__( 'Grid Full sidebar' ,'backyard'),
	'listleft' => esc_html__( 'List Left sidebar' ,'backyard'),
	'listright' => esc_html__( 'List Right sidebar' ,'backyard'),
	'listfull' => esc_html__( 'List Full sidebar' ,'backyard'),
  ),
) );
//
$wp_customize->add_setting( 'single_blog_layouts', array(
  'default' => 'singleleftsidebar',
  'sanitize_callback' => 'backyard_themeslug_sanitize_select',
) );

$wp_customize->add_control( 'single_blog_layouts', array(
  'type' => 'radio',
  'section' => 'blog_settings', // Add a default or your own section
  'label' => esc_html__( 'Blog sidebar settings' ,'backyard'),
  'choices' => array(
     'singlerightsidebar' => esc_html__('Single Blog with Right Sidebar', 'backyard'),
        'singleleftsidebar' => esc_html__('Single Blog with Left Sidebar', 'backyard')
  ),
) );
$wp_customize->add_section(
   'subbg_color_settings',
   array(
       'title' => esc_html__('Submenu background color', 'backyard'),
       'priority' => 20,
	   'panel'       => 'backyard_options',
   )
);
$wp_customize->add_setting( 'submenu_bg' , array(
    'default'     => '',
    'transport'   => 'refresh',
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control(
  new WP_Customize_Color_Control( $wp_customize, 'submenu_bg',
  array(
    'label' => esc_html__( 'Color Setting','backyard' ),
    'description' =>'',
    'section' => 'subbg_color_settings', // Add a default or your own section
) ) );
//
}
add_action('customize_register', 'backyard_themes_customizer');
function backyard_themeslug_sanitize_select( $input, $setting ) {

  // Ensure input is a slug.
  $input = sanitize_key( $input );

  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( $setting->id )->choices;

  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
/* add settings to create various social media text areas. */
function backyard_boolean($value){
	if(is_bool($value)) {
		return $value;
	} else {
		return false;
	}
}

function backyard_breadcrumb_char_choices($value='') {
	$choices = array('1','2','3');

	if( in_array($value, $choices)) {
		return $value;
	} else {
		return '1';
	}
}

if (!function_exists('backyard_allowhtml_string')) {

    function backyard_allowhtml_string($string) {
        $allowed_tags = array(    
        'a' => array(
        'href' => array(),
        'title' => array()),
        'img' => array(
        'src' => array(),  
        'alt' => array(),),
        'iframe' => array(
        'src' => array(),  
        'frameborder' => array(),
        'allowfullscreen' => array(),
         ),
        'p' => array(),
        'br' => array(),
        'em' => array(),
        'strong' => array(),);
        return wp_kses($string,$allowed_tags);

    }
}