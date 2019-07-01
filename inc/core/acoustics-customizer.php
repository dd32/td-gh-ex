<?php
/**
 * Acoustics Theme Customizer
 *
 * @author      CodeGearThemes
 * @category    WordPress
 * @package     Acoustics
 * @version     1.0.0
 *
 */

/*-------------------------------------
  #Color
---------------------------------------*/
$wp_customize->add_panel( 'acoustics_color_panel', array(
   'title' => esc_html__( 'Color Schema', 'acoustics' ),
   'description' => esc_html__( 'Color schema settings', 'acoustics' ),
   'priority' => 5,
	)
);

$wp_customize->get_section( 'colors' )->panel  = 'acoustics_color_panel';
$wp_customize->get_section( 'colors' )->title  = esc_html__( 'Header Color', 'acoustics' );
$wp_customize->get_section( 'background_image' )->panel     = 'acoustics_color_panel';
$wp_customize->get_control( 'background_color' )->section   = 'background_image';
$wp_customize->get_section( 'background_image' )->title     = esc_html__( 'Body Color', 'acoustics' );


/*-------------------------------------
 #Social
---------------------------------------*/
$wp_customize->add_panel( 'acoustics_social_panel', array(
	   'title' => esc_html__( 'Social Profiles', 'acoustics' ),
	   'description' => esc_html__( 'Social settings', 'acoustics' ),
	   'priority' => 15,
	)
);

$wp_customize->add_section( 'acoustics_social_section', array(
	'title'          => esc_html__( 'Social Links', 'acoustics' ),
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'panel'			 => 'acoustics_social_panel',
	'priority'       => 10,
));

$social_icons = array( 'twitter', 'facebook', 'linkedin', 'instagram','pinterest', 'youtube' );
foreach( $social_icons as $icon) {
  $label = ucfirst($icon);
  $wp_customize->add_setting( 'acoustics_'.$icon.'_url', array(
	'sanitize_callback' => 'esc_url_raw'
  ));

  $wp_customize->add_control( 'acoustics_'.$icon.'_url', array(
	'label'         => esc_html( $label ),
	'type'          => 'url',
	'section'       => 'acoustics_social_section',
  ));
}

/*-------------------------------------
  #Header
---------------------------------------*/
$wp_customize->add_panel( 'acoustics_header_panel', array(
	 'title' => esc_html__( 'Header Settings', 'acoustics' ),
	 'description' => esc_html__( 'Header section & settings', 'acoustics' ),
	 'priority' => 20,
	)
);

$wp_customize->get_section('title_tagline')->panel = 'acoustics_header_panel';

/*-------------------------------------
  #Landing Page
---------------------------------------*/
$wp_customize->add_panel( 'acoustics_landing_panel', array(
	   'title' => esc_html__( 'Home Sections', 'acoustics' ),
	   'description' => esc_html__( 'Home / Landing page settings', 'acoustics' ),
	   'priority' => 25,
	)
);

$wp_customize->get_section('header_image')->panel = 'acoustics_landing_panel';
$wp_customize->get_section('header_image')->title = esc_html__( 'Hero Section', 'acoustics');
$wp_customize->get_section('header_image')->priority = 5;

$wp_customize->add_setting( 'acoustics_hero_section_enable', array(
		'default'             => false,
		'transport' 		  => 'refresh',
		'sanitize_callback'   => 'acoustics_sanitize_checkbox',
	)
);

$wp_customize->add_control( 'acoustics_hero_section_enable' , array(
		'label'         => esc_html__( 'Enable Section', 'acoustics' ),
		'type'			=> 'checkbox',
		'section'       => 'header_image',
		'priority'      => 1,
	)
);

$wp_customize->add_setting( 'acoustics_hero_section_title', array(
	 'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control( 'acoustics_hero_section_title',
    array(
        'label'    => esc_html__( 'Caption Title', 'acoustics' ),
        'section'  => 'header_image',
        'settings' => 'acoustics_hero_section_title',
        'type'     => 'text',
		'priority'      => 15,
    )
);

$wp_customize->add_setting( 'acoustics_hero_section_details', array(
	 'sanitize_callback' => 'sanitize_textarea_field'
	)
);

$wp_customize->add_control( 'acoustics_hero_section_details', array(
        'label'    => esc_html__( 'Caption Details', 'acoustics' ),
        'section'  => 'header_image',
        'settings' => 'acoustics_hero_section_details',
        'type'     => 'textarea',
		'priority'      => 20,
    )
);

$wp_customize->add_setting( 'acoustics_hero_section_link', array(
	 'sanitize_callback' => 'esc_url_raw'
	)
);

$wp_customize->add_control( 'acoustics_hero_section_link',
    array(
        'label'    => esc_html__( 'Button Link', 'acoustics' ),
        'section'  => 'header_image',
        'settings' => 'acoustics_hero_section_link',
        'type'     => 'url',
		'priority'      => 25,
    )
);

$wp_customize->add_section( 'acoustics_featured_section', array(
		'title'      =>  esc_html__('Featured Section', 'acoustics'),
		'priority'   =>  5,
		'panel' 	 => 'acoustics_landing_panel'
	)
);

$wp_customize->add_setting( 'acoustics_featured_section_enable', array(
		'default'             => false,
		'transport' 		  => 'refresh',
		'sanitize_callback'   => 'acoustics_sanitize_checkbox',
	)
);

$wp_customize->add_control( 'acoustics_featured_section_enable' , array(
		'label'         => esc_html__( 'Enable Section', 'acoustics' ),
		'type'			=> 'checkbox',
		'section'       => 'acoustics_featured_section',
		'priority'      => 5,
	)
);

for( $i = 0; $i < 3; $i++) {
  $wp_customize->add_setting( 'acoustics_featured_image_'.$i, array(
			'transport' 		  => 'refresh',
			'sanitize_callback'   => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'acoustics_featured_image_'.$i,
	       array(
	           'label'      => esc_html__( 'Upload image', 'acoustics' ),
	           'section'    => 'acoustics_featured_section',
	           'settings'   => 'acoustics_featured_image_'.$i,
	       )
	   )
	);

	$wp_customize->add_setting( 'acoustics_featured_title_'.$i, array(
		  'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'acoustics_featured_title_'.$i, array(
		  'label'     => esc_html__( 'Title', 'acoustics' ),
		  'type'      => 'text',
		  'section'   => 'acoustics_featured_section',
		)
	);

	$wp_customize->add_setting( 'acoustics_featured_details_'.$i, array(
		  'sanitize_callback' => 'sanitize_textarea_field',
		)
	);

	$wp_customize->add_control( 'acoustics_featured_details_'.$i, array(
		  'label'     => esc_html__( 'Content', 'acoustics' ),
		  'type'      => 'textarea',
		  'section'   => 'acoustics_featured_section',
		)
	);

	$wp_customize->add_setting( 'acoustics_featured_link_'.$i, array(
		 'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control( 'acoustics_featured_link_'.$i,
	    array(
	        'label'    => esc_html__( 'Button Link', 'acoustics' ),
	        'section'  => 'acoustics_featured_section',
	        'type'     => 'url',
	    )
	);
}

if( class_exists( 'WooCommerce' ) ):
	$acoustics_product_collections = acoustics_product_categories();

	$wp_customize->add_section( 'acoustics_newarrival_section', array(
			'title'      =>  esc_html__('New Arrivals', 'acoustics'),
			'priority'   =>  10,
			'panel' 	 => 'acoustics_landing_panel'
		)
	);

	$wp_customize->add_setting( 'acoustics_newarrival_section_enable', array(
			'default'             => false,
			'sanitize_callback'   => 'acoustics_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( 'acoustics_newarrival_section_enable' , array(
			'label'         => esc_html__( 'Enable Section', 'acoustics' ),
			'type'			=> 'checkbox',
			'section'       => 'acoustics_newarrival_section',
			'priority'      => 5,
		)
	);


	$wp_customize->add_setting( 'acoustics_newarrival_collection' , array(
			'default'     => 0,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control( 'acoustics_newarrival_collection' , array(
			'label'       => esc_html__('Select Category', 'acoustics'),
			'description' => esc_html__('Display product from the selected product category as new arrival.', 'acoustics'),
			'section'     => 'acoustics_newarrival_section',
			'type'        => 'select',
			'choices'     => $acoustics_product_collections,
		)
	);

	$wp_customize->add_section( 'acoustics_product_category_section', array(
			'title'      =>  esc_html__('Featured Category', 'acoustics'),
			'priority'   =>  15,
			'panel' 	 => 'acoustics_landing_panel'
		)
	);

	$wp_customize->add_setting( 'acoustics_product_category_section_enable', array(
			'default'             => false,
			'transport' 		  => 'refresh',
			'sanitize_callback'   => 'acoustics_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( 'acoustics_product_category_section_enable' , array(
			'label'         => esc_html__( 'Enable Section', 'acoustics' ),
			'type'			=> 'checkbox',
			'section'       => 'acoustics_product_category_section',
			'priority'      => 5,
		)
	);

	for( $i = 0; $i < 4; $i++) {
  $wp_customize->add_setting( 'acoustics_product_categories_'.$i , array(
				'default'     		=> 0,
				'transport' => 'refresh',
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control( 'acoustics_product_categories_'.$i , array(
				'label'       => esc_html__('Category', 'acoustics'),
				'description' => esc_html__('Display product category.', 'acoustics'),
				'section'     => 'acoustics_product_category_section',
				'type'        => 'select',
				'choices'     => $acoustics_product_collections,
			)
		);
}

	$wp_customize->add_section( 'acoustics_bestseller_section', array(
			'title'      =>  esc_html__('Best Sellers', 'acoustics'),
			'priority'   =>  20,
			'panel' 	 => 'acoustics_landing_panel'
		)
	);

	$wp_customize->add_setting( 'acoustics_bestseller_section_enable', array(
			'default'             => false,
			'sanitize_callback'   => 'acoustics_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( 'acoustics_bestseller_section_enable' , array(
			'label'         => esc_html__( 'Enable Section', 'acoustics' ),
			'type'			=> 'checkbox',
			'section'       => 'acoustics_bestseller_section',
			'priority'      => 5,
		)
	);


	$wp_customize->add_setting( 'acoustics_bestseller_collection' , array(
			'default'     => 0,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control( 'acoustics_bestseller_collection' , array(
			'label'       => esc_html__('Select Category', 'acoustics'),
			'description' => esc_html__('Display product from the selected product category as new arrival.', 'acoustics'),
			'section'     => 'acoustics_bestseller_section',
			'type'        => 'select',
			'choices'     => $acoustics_product_collections,
		)
	);

	$wp_customize->add_section( 'acoustics_product_category_grid_section', array(
			'title'      =>  esc_html__('Category Grid', 'acoustics'),
			'priority'   =>  20,
			'panel' 	 => 'acoustics_landing_panel'
		)
	);

	$wp_customize->add_setting( 'acoustics_product_category_grid_section_enable', array(
			'default'             => false,
			'transport' 		  => 'refresh',
			'sanitize_callback'   => 'acoustics_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( 'acoustics_product_category_grid_section_enable' , array(
			'label'         => esc_html__( 'Enable Section', 'acoustics' ),
			'type'			=> 'checkbox',
			'section'       => 'acoustics_product_category_grid_section',
			'priority'      => 5,
		)
	);

	$collection = 6;
	for( $i = 0; $i < $collection; $i++) {
  $wp_customize->add_setting( 'acoustics_product_categories_grid_'.$i , array(
				'default'     		=> 0,
				'transport' => 'refresh',
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control( 'acoustics_product_categories_grid_'.$i , array(
				'label'       => esc_html__('Category', 'acoustics'),
				'description' => esc_html__('Display product category.', 'acoustics'),
				'section'     => 'acoustics_product_category_grid_section',
				'type'        => 'select',
				'choices'     => $acoustics_product_collections,
			)
		);
}

endif;

$wp_customize->add_section( 'acoustics_values_section', array(
		'title'      =>  esc_html__('Proposition', 'acoustics'),
		'priority'   =>  25,
		'panel' 	 => 'acoustics_landing_panel'
	)
);

$wp_customize->add_setting( 'acoustics_values_section_enable', array(
		'default'             => false,
		'transport' 		  => 'refresh',
		'sanitize_callback'   => 'acoustics_sanitize_checkbox',
	)
);

$wp_customize->add_control( 'acoustics_values_section_enable' , array(
		'label'         => esc_html__( 'Enable Section', 'acoustics' ),
		'type'			=> 'checkbox',
		'section'       => 'acoustics_values_section',
		'priority'      => 5,
	)
);

for( $i = 0; $i < 4; $i++) {
  $count = 10 + $i;
	$wp_customize->add_setting( 'acoustics_values_section_image_'.$i, array(
			'transport' 		  => 'refresh',
			'sanitize_callback'   => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'acoustics_values_section_image_'.$i,
	       array(
	           'label'      => esc_html__( 'Upload image', 'acoustics' ),
	           'section'    => 'acoustics_values_section',
	           'settings'   => 'acoustics_values_section_image_'.$i,
			   'priority'      => $count,
	       )
	   )
	);

	$wp_customize->add_setting( 'acoustics_values_section_title_'.$i, array(
		  'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'acoustics_values_section_title_'.$i, array(
		  'label'     => esc_html__( 'Title', 'acoustics' ),
		  'type'      => 'text',
		  'section'   => 'acoustics_values_section',
		  'priority'      => $count,
		)
	);

	$wp_customize->add_setting( 'acoustics_values_section_details_'.$i, array(
		  'sanitize_callback' => 'sanitize_textarea_field',
		)
	);

	$wp_customize->add_control( 'acoustics_values_section_details_'.$i, array(
		  'label'     => esc_html__( 'Content', 'acoustics' ),
		  'type'      => 'textarea',
		  'section'   => 'acoustics_values_section',
		  'priority'      => $count,
		)
	);
}

$wp_customize->get_section( 'static_front_page' )->panel     = 'acoustics_landing_panel';
$wp_customize->get_section( 'static_front_page' )->title     = __( 'Landing Page', 'acoustics' );
$wp_customize->get_section( 'static_front_page' )->priority = 0;

/*-------------------------------------
  #Footer
---------------------------------------*/
$wp_customize->add_panel( 'acoustics_footer_panel', array(
   'title' => esc_html__( 'Footer Settings', 'acoustics' ),
   'description' => esc_html__( 'Footer section & settings', 'acoustics' ),
   'priority' => 30,
	)
);

$wp_customize->add_section( 'acoustics_footer_section', array(
	'title'          => esc_html__( 'Copyright Setting', 'acoustics' ),
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'panel'			 => 'acoustics_footer_panel',
	'priority'       => 5,
));

$wp_customize->add_setting( 'acoustics_footer_copyright', array(
  'sanitize_callback' => 'sanitize_textarea_field',
));

$wp_customize->add_control( 'acoustics_footer_copyright', array(
  'label'     => esc_html__( 'Copyright Text', 'acoustics' ),
  'type'      => 'textarea',
  'section'   => 'acoustics_footer_section'
));

/*-------------------------------------
  #Layout
---------------------------------------*/
$wp_customize->add_panel( 'acoustics_layout_panel', array(
   'title' => esc_html__( 'Layout Settings', 'acoustics' ),
   'description' => esc_html__( 'Archive, post & page layout settings', 'acoustics' ),
   'priority' => 35,
	)
);


$wp_customize->add_section( 'acoustics_archive_section', array(
	'title'          => esc_html__( 'Archive Sidebar', 'acoustics' ),
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'panel'			 => 'acoustics_layout_panel',
	'priority'       => 5,
	)
);

$wp_customize->add_setting('acoustics_archive_layout', array(
  'default'  =>      'left-sidebar',
  'sanitize_callback' => 'acoustics_sanitize_radioimage'
  )
);

$wp_customize->add_control( new Acoustics_Customize_Control_Radio_Image( $wp_customize,'acoustics_archive_layout', array(
  'section'       =>      'acoustics_archive_section',
  'label'         =>      esc_html__('Archive Sidebar', 'acoustics'),
  'type'          =>      'radio-image',
  'choices'       =>      array(
	    'left-sidebar'  => '%s/assets/src/layout/left-sidebar.png',
		'no-sidebar'    => '%s/assets/src/layout/no-sidebar.png',
	    'right-sidebar' => '%s/assets/src/layout/right-sidebar.png',
	  )
  ))
);

$wp_customize->add_section( 'acoustics_page_section', array(
	'title'          => esc_html__( 'Page Sidebar', 'acoustics' ),
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'panel'			 => 'acoustics_layout_panel',
	'priority'       => 10,
	)
);

$wp_customize->add_setting('acoustics_page_layout', array(
  'default'  =>      'no-sidebar',
  'sanitize_callback' => 'acoustics_sanitize_radioimage'
  )
);

$wp_customize->add_control( new Acoustics_Customize_Control_Radio_Image( $wp_customize,'acoustics_page_layout', array(
  'section'       =>      'acoustics_page_section',
  'label'         =>      esc_html__('Page Sidebar', 'acoustics'),
  'type'          =>      'radio-image',
  'choices'       =>      array(
	    'left-sidebar'  => '%s/assets/src/layout/left-sidebar.png',
		'no-sidebar'    => '%s/assets/src/layout/no-sidebar.png',
	    'right-sidebar' => '%s/assets/src/layout/right-sidebar.png',
	  )
  ))
);

$wp_customize->add_section( 'acoustics_post_section', array(
	'title'          => esc_html__( 'Post Sidebar', 'acoustics' ),
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'panel'			 => 'acoustics_layout_panel',
	'priority'       => 15,
	)
);

$wp_customize->add_setting('acoustics_post_layout', array(
  'default'  =>      'no-sidebar',
  'sanitize_callback' => 'acoustics_sanitize_radioimage'
  )
);

$wp_customize->add_control( new Acoustics_Customize_Control_Radio_Image( $wp_customize,'acoustics_post_layout', array(
  'section'       =>      'acoustics_post_section',
  'label'         =>      esc_html__('Post Sidebar', 'acoustics'),
  'type'          =>      'radio-image',
  'choices'       =>      array(
	    'left-sidebar'  => '%s/assets/src/layout/left-sidebar.png',
		'no-sidebar'    => '%s/assets/src/layout/no-sidebar.png',
	    'right-sidebar' => '%s/assets/src/layout/right-sidebar.png',
	  )
  ))
);
