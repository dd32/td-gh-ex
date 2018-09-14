<?php
/**
 * Setting general
 *
 * @package Atlantic
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function atlantic_customize_register( $wp_customize ) {

	$setting = atlantic_setting_default();

	// Arctic Theme Setting Panel
	$wp_customize->add_panel( 'theme_settings', array(
		'title' 		=> esc_html__( 'Theme Settings', 'atlantic' ),
		'priority' 		=> 199,
	) );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/** WP */
	$wp_customize->get_section( 'header_image' )->panel 				= 'theme_settings';
	$wp_customize->get_section( 'background_image' )->panel 			= 'theme_settings';
	$wp_customize->get_section( 'colors' )->panel 						= 'theme_settings';

	/** WC */
	$wp_customize->remove_control( 'woocommerce_catalog_columns' );

	/** Theme Colors */
	$wp_customize->add_setting(
		'primary_text_color',
		array(
			'default'           => $setting['primary_text_color'],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
		'primary_text_color',
		array(
			'label'       	=> esc_html__( 'Primary Text Color', 'atlantic' ),
			'section'     	=> 'colors',
			'setting'		=> 'primary_text_color',
			'priority'		=> 99
	) ) );

	$wp_customize->add_setting(
		'secondary_text_color',
		array(
			'default'           => $setting['secondary_text_color'],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
		'secondary_text_color',
		array(
			'label'       	=> esc_html__( 'Secondary Text Color', 'atlantic' ),
			'section'     	=> 'colors',
			'setting'		=> 'secondary_text_color',
			'priority'		=> 99
	) ) );

	$wp_customize->add_setting(
		'primary_color',
		array(
			'default'           => $setting['primary_color'],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
		'primary_color',
		array(
			'label'       	=> esc_html__( 'Link Color', 'atlantic' ),
			'description'	=> esc_html__( 'Used for link, button, selection.', 'atlantic' ),
			'section'     	=> 'colors',
			'setting'		=> 'primary_color',
			'priority'		=> 99
	) ) );

	$wp_customize->add_setting(
		'secondary_color',
		array(
			'default'           => $setting['secondary_color'],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
		'secondary_color',
		array(
			'label'       	=> esc_html__( 'Hover Color', 'atlantic' ),
			'description'	=> esc_html__( 'Used for link:hover, button:hover.', 'atlantic' ),
			'section'     	=> 'colors',
			'setting'		=> 'secondary_color',
			'priority'		=> 99
	) ) );

	// Archive Setting
	$wp_customize->add_section(
		'blog_section' ,
		array(
			'title' 			=> esc_html__( 'Blog Setting', 'atlantic' ),
			'priority' 			=> 200,
			'panel'				=> 'theme_settings'
	) );

	$wp_customize->add_setting(
		'blog_layout',
		array(
			'default'           => $setting['blog_layout'],
			'sanitize_callback' => 'atlantic_sanitize_select',
	) );

	$wp_customize->add_control(
		'blog_layout',
		array(
			'label'    => esc_html__( 'Blog Layout', 'atlantic' ),
			'section'  => 'blog_section',
			'setting'  => 'posts_navigation',
			'type'     => 'select',
			'choices'  => array(
				'default-container' 	=> esc_attr__( '1 Column', 'atlantic' ),
				'masonry-container' 	=> esc_attr__( '2 Columns', 'atlantic' ),
			),
	) );

	$wp_customize->add_setting(
		'max_gallery' ,
		 array(
		    'default' 			=> $setting['max_gallery'],
		    'sanitize_callback' => 'atlantic_sanitize_number_absint',
	) );

	$wp_customize->add_control(
		'max_gallery',
		array(
			'label'    		=> esc_html__( 'Max gallery item slideshow', 'atlantic' ),
			'description'   => esc_html__( 'Post format gallery slideshow at archive page.', 'atlantic' ),
			'section'  		=> 'blog_section',
			'settings' 		=> 'max_gallery',
			'type'     		=> 'number',
		    'input_attrs' => array(
		        'min'   => 1,
		        'max'   => 9999,
		    )
		)
	);

	$wp_customize->add_setting(
		'excerpt_length' ,
		 array(
		    'default' 			=> $setting['excerpt_length'],
		    'sanitize_callback' => 'atlantic_sanitize_number_absint',
	) );

	$wp_customize->add_control(
		'excerpt_length',
		array(
			'label'    => esc_html__( 'Excerpt length', 'atlantic' ),
			'section'  => 'blog_section',
			'settings' => 'excerpt_length',
			'type'     => 'number',
		    'input_attrs' => array(
		        'min'   => 1,
		        'max'   => 9999,
		    )
		)
	);

	$wp_customize->add_setting(
		'posts_navigation',
		array(
			'default'           => $setting['posts_navigation'],
			'sanitize_callback' => 'atlantic_sanitize_select',
	) );

	$wp_customize->add_control(
		'posts_navigation',
		array(
			'label'    => esc_html__( 'Posts Navigation', 'atlantic' ),
			'section'  => 'blog_section',
			'setting'  => 'posts_navigation',
			'type'     => 'select',
			'choices'  => array(
				'posts_navigation' 	=> esc_attr__( 'Prev / Next', 'atlantic' ),
				'posts_pagination' 	=> esc_attr__( 'Numeric', 'atlantic' ),
			),
	) );

	$wp_customize->add_setting(
		'post_date' ,
		 array(
		    'default' 			=> $setting['post_date'],
		    'transport'			=> 'postMessage',
		    'sanitize_callback' => 'atlantic_sanitize_checkbox',
	) );

	$wp_customize->add_control(
		'post_date',
		array(
			'label'    => esc_html__( 'Display Post Date', 'atlantic' ),
			'section'  => 'blog_section',
			'settings' => 'post_date',
			'type'     => 'checkbox'
		)
	);

	$wp_customize->add_setting(
		'post_author' ,
		 array(
		    'default' 			=> $setting['post_author'],
		    'transport'			=> 'postMessage',
		    'sanitize_callback' => 'atlantic_sanitize_checkbox',
	) );

	$wp_customize->add_control(
		'post_author',
		array(
			'label'    => esc_html__( 'Display Post Author', 'atlantic' ),
			'section'  => 'blog_section',
			'settings' => 'post_author',
			'type'     => 'checkbox'
		)
	);

	$wp_customize->add_setting(
		'post_cat' ,
		 array(
		    'default' 			=> $setting['post_cat'],
		    'transport'			=> 'postMessage',
		    'sanitize_callback' => 'atlantic_sanitize_checkbox',
	) );

	$wp_customize->add_control(
		'post_cat',
		array(
			'label'    => esc_html__( 'Display Post Category', 'atlantic' ),
			'section'  => 'blog_section',
			'settings' => 'post_cat',
			'type'     => 'checkbox'
		)
	);

	$wp_customize->add_setting(
		'post_tag' ,
		 array(
		    'default' 			=> $setting['post_tag'],
		    'transport'			=> 'postMessage',
		    'sanitize_callback' => 'atlantic_sanitize_checkbox',
	) );

	$wp_customize->add_control(
		'post_tag',
		array(
			'label'    => esc_html__( 'Display Post Tag', 'atlantic' ),
			'section'  => 'blog_section',
			'settings' => 'post_tag',
			'type'     => 'checkbox'
		)
	);

	$wp_customize->add_setting(
		'post_comments' ,
		 array(
		    'default' 			=> $setting['post_comments'],
		    'transport'			=> 'postMessage',
		    'sanitize_callback' => 'atlantic_sanitize_checkbox',
	) );

	$wp_customize->add_control(
		'post_comments',
		array(
			'label'    => esc_html__( 'Display comments count', 'atlantic' ),
			'section'  => 'blog_section',
			'settings' => 'post_comments',
			'type'     => 'checkbox'
		)
	);

	$wp_customize->add_setting(
		'author_display' ,
		 array(
		    'default' 			=> $setting['author_display'],
		    'transport'			=> 'postMessage',
		    'sanitize_callback' => 'atlantic_sanitize_checkbox',
	) );

	$wp_customize->add_control(
		'author_display',
		array(
			'label'    => esc_html__( 'Display Author biography at single post', 'atlantic' ),
			'section'  => 'blog_section',
			'settings' => 'author_display',
			'type'     => 'checkbox'
		)
	);

	// Footer Widgets
	$wp_customize->add_section(
		'footer_area' ,
		array(
			'title' 			=> esc_html__( 'Footer', 'atlantic' ),
			'priority' 			=> 200,
			'panel'				=> 'theme_settings'
	) );

	$wp_customize->add_setting(
		'footer_copyright' ,
		 array(
		    'default' 			=> '',
		    'transport'			=> 'postMessage',
		    'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control(
		'footer_copyright',
		array(
			'label'    		=> esc_html__( 'Footer copyright', 'atlantic' ),
			'description'	=> esc_html__( 'Use [YEAR] for dynamic current year. Use [SITE] to render site link.', 'atlantic' ),
			'section'  		=> 'footer_area',
			'settings' 		=> 'footer_copyright',
			'type'     		=> 'textarea'
		)
	);

	$wp_customize->add_setting(
		'theme_designer' ,
		 array(
		    'default' 			=> $setting['theme_designer'],
		    'transport'			=> 'postMessage',
		    'sanitize_callback' => 'atlantic_sanitize_checkbox',
	) );

	$wp_customize->add_control(
		'theme_designer',
		array(
			'label'    => esc_html__( 'Display theme designer at footer?', 'atlantic' ),
			'section'  => 'footer_area',
			'settings' => 'theme_designer',
			'type'     => 'checkbox'
		)
	);

	$wp_customize->add_setting(
		'return_top' ,
		 array(
		    'default' 			=> $setting['return_top'],
		    'transport'			=> 'postMessage',
		    'sanitize_callback' => 'atlantic_sanitize_checkbox',
	) );

	$wp_customize->add_control(
		'return_top',
		array(
			'label'    => esc_html__( 'Enable return to top link', 'atlantic' ),
			'section'  => 'footer_area',
			'settings' => 'return_top',
			'type'     => 'checkbox'
		)
	);

	if ( class_exists( 'WooCommerce' ) ) {

		$wp_customize->add_setting(
			'wc_columns',
			array(
				'default'           => $setting['wc_columns'],
				'sanitize_callback' => 'atlantic_sanitize_select',
		) );

		$wp_customize->add_control(
			'wc_columns',
			array(
				'label'    => esc_html__( 'Products columns', 'atlantic' ),
				'section'  => 'woocommerce_product_catalog',
				'setting'  => 'wc_columns',
				'type'     => 'select',
				'choices'  => array(
					'col-shop-2' 	=> esc_attr__( '2 Columns', 'atlantic' ),
					'col-shop-3' 	=> esc_attr__( '3 Columns', 'atlantic' ),
					'col-shop-4' 	=> esc_attr__( '4 Columns', 'atlantic' ),
				),
		) );

		$wp_customize->add_setting(
			'wc_products_per_page' ,
			 array(
			    'default' 			=> $setting['wc_products_per_page'],
			    'sanitize_callback' => 'atlantic_sanitize_number_absint',
		) );

		$wp_customize->add_control(
			'wc_products_per_page',
			array(
				'label'    => esc_html__( 'Number of products per page', 'atlantic' ),
				'section'  => 'woocommerce_product_catalog',
				'settings' => 'wc_products_per_page',
				'type'     => 'number',
			    'input_attrs' => array(
			        'min'   => 1,
			        'max'   => 9999,
			    )
			)
		);

		$wp_customize->add_section(
			'atlantic_wc_colors' ,
			array(
				'title' 			=> esc_html__( 'Colors', 'atlantic' ),
				'priority' 			=> 200,
				'panel'				=> 'woocommerce'
		) );

		$wp_customize->add_setting(
			'price_color',
			array(
				'default'           => $setting['price_color'],
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'price_color',
			array(
				'label'       	=> esc_html__( 'WooCommerce Price Color', 'atlantic' ),
				'section'     	=> 'atlantic_wc_colors',
				'setting'		=> 'price_color',
				'priority'		=> 99
		) ) );

		$wp_customize->add_setting(
			'sale_color',
			array(
				'default'           => $setting['sale_color'],
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'sale_color',
			array(
				'label'       	=> esc_html__( 'WooCommerce Sale Color', 'atlantic' ),
				'section'     	=> 'atlantic_wc_colors',
				'setting'		=> 'sale_color',
				'priority'		=> 99
		) ) );

		$wp_customize->add_setting(
			'stars_color',
			array(
				'default'           => $setting['stars_color'],
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
			'stars_color',
			array(
				'label'       	=> esc_html__( 'WooCommerce Stars/Rating Color', 'atlantic' ),
				'section'     	=> 'atlantic_wc_colors',
				'setting'		=> 'stars_color',
				'priority'		=> 99
		) ) );

	}

	if ( isset( $wp_customize->selective_refresh ) ) {

		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'atlantic_customize_partial_blogname',
		) );

		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'atlantic_customize_partial_blogdescription',
		) );

		$wp_customize->selective_refresh->add_partial(
			'footer_copyright',
			array(
				'selector' 				=> '.site-info',
				'settings' 				=> array( 'footer_copyright' ),
				'render_callback' 		=> 'atlantic_get_footer_copyright',
				'container_inclusive'	=> false,
		) );

	}

}
add_action( 'customize_register', 'atlantic_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function atlantic_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function atlantic_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
