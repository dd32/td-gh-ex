<?php add_action( 'customize_register', 'weblizar_gl_customizer' );

function weblizar_gl_customizer( $wp_customize ) {
	wp_enqueue_style( 'customizr', get_template_directory_uri() . '/css/customizr.css' );
	wp_enqueue_style( 'FA-5.11.2', get_template_directory_uri() . '/css/font-awesome-5.11.2/css/all.min.css' );
	$ImageUrl1 = esc_url( get_template_directory_uri() . "/images/1.png" );
	$ImageUrl2 = esc_url( get_template_directory_uri() . "/images/2.png" );
	$ImageUrl3 = esc_url( get_template_directory_uri() . "/images/3.png" );
	$port['1'] = esc_url( get_template_directory_uri() . "/images/portfolio1.png" );
	$port['2'] = esc_url( get_template_directory_uri() . "/images/portfolio2.png" );
	$port['3'] = esc_url( get_template_directory_uri() . "/images/portfolio3.png" );
	$port['4'] = esc_url( get_template_directory_uri() . "/images/portfolio4.png" );

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo h1',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.logo p',
	) );

	/* Genral section */
	$wp_customize->add_panel( 'enigma_theme_option', array(
		'title'    => __( 'Theme Options', 'enigma' ),
		'priority' => 1, // Mixed with top-level-section hierarchy.
	) );

	$wp_customize->add_section(
		'general_sec',
		array(
			'title'       => __( 'Theme General Options', 'enigma' ),
			'description' => 'Here you can customize Your theme\'s general Settings',
			'panel'       => 'enigma_theme_option',
			'capability'  => 'edit_theme_options',
			'priority'    => 35,

		)
	);

	//$wl_theme_options = weblizar_get_options();
	$wp_customize->add_setting(
		'title_position',
		array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'enigma_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'title_position', array(
		'label'    => __( 'Show Site Title in Center', 'enigma' ),
		'type'     => 'checkbox',
		'section'  => 'general_sec',
		'settings' => 'title_position',
	) );

	$wp_customize->add_setting(
		'breadcrumb',
		array(
			'type'              => 'theme_mod',
			'default'           => 1,
			'sanitize_callback' => 'enigma_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'breadcrumb', array(
		'label'    => __( 'Enable Breadcrumb', 'enigma' ),
		'type'     => 'checkbox',
		'section'  => 'general_sec',
		'settings' => 'breadcrumb',
	) );

	$wp_customize->add_setting(
		'breadcrumb_title',
		array(
			'type'              => 'theme_mod',
			'default'           => 1,
			'sanitize_callback' => 'enigma_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'breadcrumb_title', array(
		'label'    => __( 'Enable Breadcrumb Title', 'enigma' ),
		'type'     => 'checkbox',
		'section'  => 'general_sec',
		'settings' => 'breadcrumb_title',
	) );

	// site title and logo position : left and center //

	// logo height width //
	$wp_customize->add_setting(
		'logo_height',
		array(
			'type'              => 'theme_mod',
			'default'           => '55',
			'sanitize_callback' => 'enigma_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'logo_height', array(
		'label'       => __( 'Logo Height', 'enigma' ),
		'description' => '',
		'type'        => 'text',
		'section'     => 'general_sec',
		'settings'    => 'logo_height',
	) );
	$wp_customize->add_setting(
		'logo_width',
		array(
			'type'              => 'theme_mod',
			'default'           => '150',
			'sanitize_callback' => 'enigma_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'logo_width', array(
		'label'       => __( 'Logo Width', 'enigma' ),
		'description' => '',
		'type'        => 'text',
		'section'     => 'general_sec',
		'settings'    => 'logo_width',
	) );
	// logo height width //

	$wp_customize->add_setting(
		'custom_css',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_sanitize_text',
		)
	);
	$wp_customize->add_control( 'custom_css', array(
		'label'    => __( 'Custom CSS', 'enigma' ),
		'type'     => 'textarea',
		'section'  => 'general_sec',
		'settings' => 'custom_cs]'
	) );
	/* Slider options */
	$wp_customize->add_section(
		'slider_sec',
		array(
			'title'           => __( 'Theme Slider Options', 'enigma' ),
			'panel'           => 'enigma_theme_option',
			'description'     => 'Here you can add slider images',
			'capability'      => 'edit_theme_options',
			'priority'        => 35,
			'active_callback' => 'is_front_page',
		)
	);

	//

	$wp_customize->add_setting(
		'slider_image_speed',
		array(
			'type'              => 'theme_mod',
			'default'           => '2000',
			'sanitize_callback' => 'enigma_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_slider_speed', array(
		'label'       => __( 'Slider Speed Option', 'enigma' ),
		'description' => 'Value will be in milliseconds',
		'type'        => 'text',
		'section'     => 'slider_sec',
		'settings'    => 'slider_image_speed',
	) );

	//
	//slider animation
	$wp_customize->add_setting( 'slider_anim',
		array(
			'type'              => 'theme_mod',
			'default'           => 'slide',
			'sanitize_callback' => 'enigma_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control( 'slider_anim', array(
		'label'    => __( 'Slider Animation', 'enigma' ),
		'type'     => 'select',
		'section'  => 'slider_sec',
		'settings' => 'slider_anim',
		'choices'  => array(
			'slide'  => __( 'Slide', 'enigma' ),
			'fadeIn' => __( 'Fade', 'enigma' ),
		)
	) );

	$wp_customize->add_setting( 'animate_type_title',
		array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'enigma_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control( new enigma_animation( $wp_customize, 'animate_type_title', array(
		'label'    => __( 'Animation for Slider Title', 'enigma' ),
		'type'     => 'select',
		'section'  => 'slider_sec',
		'settings' => 'animate_type_title',
	) ) );

	$wp_customize->add_setting( 'animate_type_desc',
		array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'enigma_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control( new enigma_animation( $wp_customize, 'animate_type_desc', array(
		'label'    => __( 'Animation for Slider Description', 'enigma' ),
		'type'     => 'select',
		'section'  => 'slider_sec',
		'settings' => 'animate_type_desc',
	) ) );

	$wp_customize->add_setting(
		'slide_image_1',
		array(
			'type'              => 'theme_mod',
			'default'           => $ImageUrl1,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_setting(
		'slide_image_2',
		array(
			'type'              => 'theme_mod',
			'default'           => $ImageUrl2,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_setting(
		'slide_image_3',
		array(
			'type'              => 'theme_mod',
			'default'           => $ImageUrl3,
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_setting(
		'slide_title_1',
		array(
			'type'              => 'theme_mod',
			'default'           => __( 'Slide Title', 'enigma' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_sanitize_text',

		)
	);

	$wp_customize->add_setting(
		'slide_title_2',
		array(
			'type'              => 'theme_mod',
			'default'           => __( 'variations of passages', 'enigma' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_sanitize_text',

		)
	);

	$wp_customize->add_setting(
		'slide_title_3',
		array(
			'type'              => 'theme_mod',
			'default'           => __( 'Contrary to popular ', 'enigma' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_sanitize_text',

		)
	);
	$wp_customize->add_setting(
		'slide_desc_1',
		array(
			'default'           => __( 'Lorem Ipsum is simply dummy text of the printing', 'enigma' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_sanitize_text',

		)
	);
	$wp_customize->add_setting(
		'slide_desc_2',
		array(
			'default'           => __( 'Contrary to popular belief, Lorem Ipsum is not simply random text', 'enigma' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_sanitize_text',

		)
	);
	$wp_customize->add_setting(
		'slide_desc_3',
		array(
			'default'           => __( 'Aldus PageMaker including versions of Lorem Ipsum, rutrum turpi', 'enigma' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_sanitize_text',

		)
	);
	$wp_customize->add_setting(
		'slide_btn_text_1',
		array(
			'type'              => 'theme_mod',
			'default'           => __( 'Read More', 'enigma' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_sanitize_text',

		)
	);
	$wp_customize->add_setting(
		'slide_btn_text_2',
		array(
			'type'              => 'theme_mod',
			'default'           => __( 'Read More', 'enigma' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_sanitize_text',

		)
	);
	$wp_customize->add_setting(
		'slide_btn_text_3',
		array(
			'type'              => 'theme_mod',
			'default'           => __( 'Read More', 'enigma' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'enigma_sanitize_text',

		)
	);
	$wp_customize->add_setting(
		'slide_btn_link_1',
		array(
			'type'              => 'theme_mod',
			'default'           => '#',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',

		)
	);
	$wp_customize->add_setting(
		'slide_btn_link_2',
		array(
			'type'              => 'theme_mod',
			'default'           => '#',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',

		)
	);
	$wp_customize->add_setting(
		'slide_btn_link_3',
		array(
			'type'              => 'theme_mod',
			'default'           => '#',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',

		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'enigma_slider_image_1', array(
		'label'    => __( 'Slider Image One', 'enigma' ),
		'section'  => 'slider_sec',
		'settings' => 'slide_image_1'
	) ) );
	$wp_customize->add_control( 'enigma_slide_title_1', array(
		'label'    => __( 'Slider title one', 'enigma' ),
		'type'     => 'text',
		'section'  => 'slider_sec',
		'settings' => 'slide_title_1'
	) );

	$wp_customize->selective_refresh->add_partial( 'slide_title_1', array(
		'selector' => '.carousel-text .head_1',
    ));

    $wp_customize->add_control( new One_Page_Editor( $wp_customize, 'slide_desc_1', array(
	    'label'                      => __( 'Slider description one', 'enigma' ),
	    'active_callback'            => 'show_on_front',
	    'include_admin_print_footer' => true,
	    'section'                    => 'slider_sec',
	    'settings'                   => 'slide_desc_1'
    ) ) );

    $wp_customize->selective_refresh->add_partial( 'slide_desc_1', array(
	    'selector' => '.desc_1',
    ) );

    $wp_customize->add_control( 'Slider button one', array(
	    'label'    => __( 'Slider Button Text One', 'enigma' ),
	    'type'     => 'text',
	    'section'  => 'slider_sec',
	    'settings' => 'slide_btn_text_1'
    ) );

    $wp_customize->selective_refresh->add_partial( 'slide_btn_text_1', array(
	    'selector' => '.rdm_1',
    ));

    $wp_customize->add_control( 'enigma_slide_btnlink_1', array(
	    'label'    => __( 'Slider Button Link One', 'enigma' ),
	    'type'     => 'url',
	    'section'  => 'slider_sec',
	    'settings' => 'slide_btn_link_1'
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'enigma_slider_image_2', array(
	    'label'    => __( 'Slider Image Two ', 'enigma' ),
	    'section'  => 'slider_sec',
	    'settings' => 'slide_image_2'
    ) ) );

    $wp_customize->add_control( 'enigma_slide_title_2', array(
	    'label'    => __( 'Slider Title Two', 'enigma' ),
	    'type'     => 'text',
	    'section'  => 'slider_sec',
	    'settings' => 'slide_title_2'
    ) );

    $wp_customize->selective_refresh->add_partial( 'slide_title_2', array(
	    'selector' => '.carousel-text .head_2',
    ));

    $wp_customize->add_control( new One_Page_Editor( $wp_customize, 'slide_desc_2', array(
	    'label'                      => __( 'Slider Description Two', 'enigma' ),
	    'active_callback'            => 'show_on_front',
	    'include_admin_print_footer' => true,
	    'section'                    => 'slider_sec',
	    'settings'                   => 'slide_desc_2'
    ) ) );

    $wp_customize->selective_refresh->add_partial( 'slide_desc_2', array(
	    'selector' => '.desc_2',
    ) );

    $wp_customize->add_control( 'enigma_slide_btn_2', array(
	    'label'    => __( 'Slider Button Text Two', 'enigma' ),
	    'type'     => 'text',
	    'section'  => 'slider_sec',
	    'settings' => 'slide_btn_text_2'
    ) );

    $wp_customize->selective_refresh->add_partial( 'slide_btn_text_2', array(
	    'selector' => '.rdm_2',
    ));

    $wp_customize->add_control( 'enigma_slide_btnlink_2', array(
	    'label'    => __( 'Slider Button Link Two', 'enigma' ),
	    'type'     => 'url',
	    'section'  => 'slider_sec',
	    'settings' => 'slide_btn_link_2'
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'enigma_slider_image_3', array(
	    'label'    => __( 'Slider Image Three', 'enigma' ),
	    'section'  => 'slider_sec',
	    'settings' => 'slide_image_3'
    ) ) );
    $wp_customize->add_control( 'enigma_slide_title_3', array(
	    'label'    => __( 'Slider Title Three', 'enigma' ),
	    'type'     => 'text',
	    'section'  => 'slider_sec',
	    'settings' => 'slide_title_3'
    ) );

    $wp_customize->selective_refresh->add_partial( 'slide_title_3', array(
	    'selector' => '.carousel-text .head_3',
    ));

    $wp_customize->add_control( new One_Page_Editor( $wp_customize, 'slide_desc_3', array(
	    'label'                      => __( 'Slider Description Three', 'enigma' ),
	    'active_callback'            => 'show_on_front',
	    'include_admin_print_footer' => true,
	    'section'                    => 'slider_sec',
	    'settings'                   => 'slide_desc_3'
    ) ) );

    $wp_customize->selective_refresh->add_partial( 'slide_desc_3', array(
	    'selector' => '.desc_3',
    ) );

    $wp_customize->add_control( 'enigma_slide_btn_3', array(
	    'label'    => __( 'Slider Button Text Three', 'enigma' ),
	    'type'     => 'text',
	    'section'  => 'slider_sec',
	    'settings' => 'slide_btn_text_3'
    ) );

    $wp_customize->selective_refresh->add_partial( 'slide_btn_text_3', array(
	    'selector' => '.rdm_3',
    ));

    $wp_customize->add_control( 'enigma_slide_btnlink_3', array(
	    'label'    => __( 'Slider Button Link Three', 'enigma' ),
	    'type'     => 'url',
	    'section'  => 'slider_sec',
	    'settings' => 'slide_btn_link_3'
    ) );

    /*search-box*/
    if ( is_child_theme() ) {
	    $wp_customize->add_section(
		    'search_sec',
		    array(
			    'title'       => __( 'Search Box', 'enigma' ),
			    'description' => __( 'Here you can Search Box in header', 'enigma' ),
			    'panel'       => 'enigma_theme_option',
			    'capability'  => 'edit_theme_options',
			    'priority'    => 35,
		    ) );

	    $wp_customize->add_setting(
		    'search_box',
		    array(
			    'type'              => 'theme_mod',
			    'default'           => '',
			    'sanitize_callback' => 'enigma_sanitize_text',
			    'capability'        => 'edit_theme_options',
		    )
	    );
	    $wp_customize->add_control( 'enigma_options_search_box', array(
		    'label'    => __( 'Enable Search Box in header', 'enigma' ),
		    'type'     => 'checkbox',
		    'section'  => 'search_sec',
		    'settings' => 'search_box',
	    ) );
	    /* search-box */

	    /* Product options */
	    $wp_customize->add_section( 'product_section', array(
		    'title'      => __( "Product Options", 'enigma' ),
		    'panel'      => 'enigma_theme_option',
		    'capability' => 'edit_theme_options',
		    'priority'   => 35,
	    ) );

	    $wp_customize->add_setting(
		    'product_title',
		    array(
			    'default'           => __( 'Our Products', 'enigma' ),
			    'type'              => 'theme_mod',
			    'capability'        => 'edit_theme_options',
			    'sanitize_callback' => 'enigma_sanitize_text',

		    )
	    );
	    $wp_customize->add_control( 'product_title', array(
		    'label'    => __( 'Product Title', 'enigma' ),
		    'type'     => 'text',
		    'section'  => 'product_section',
		    'settings' => 'product_title'
	    ) );
    }


    /* Service Options */
    $wp_customize->add_section( 'service_section', array(
	    'title'           => __( "Service Options", 'enigma' ),
	    'panel'           => 'enigma_theme_option',
	    'capability'      => 'edit_theme_options',
	    'priority'        => 35,
	    'active_callback' => 'is_front_page',
    ) );
    $wp_customize->add_setting(
	    'services_home',
	    array(
		    'type'              => 'theme_mod',
		    'default'           => 1,
		    'sanitize_callback' => 'enigma_sanitize_checkbox',
		    'capability'        => 'edit_theme_options'
	    )
    );


    $wp_customize->add_setting(
	    'home_service_heading',
	    array(
		    'default'           => __( 'Our Services', 'enigma' ),
		    'type'              => 'theme_mod',
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'enigma_sanitize_text',

	    )
    );
    $wp_customize->add_control( 'home_service_heading', array(
	    'label'    => __( 'Home Service Title', 'enigma' ),
	    'type'     => 'text',
	    'section'  => 'service_section',
	    'settings' => 'home_service_headin]'
    ) );

    $wp_customize->selective_refresh->add_partial( 'home_service_heading]', array(
	    'selector' => '.enigma_service .enigma_heading_title h3',
    ));

    $wp_customize->add_setting(
	    'service_1_icons',
	    array(
		    'default'           => 'fa-google',
		    'type'              => 'theme_mod',
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'enigma_sanitize_text',

	    )
    );
    $wp_customize->add_setting(
	    'service_2_icons',
	    array(
		    'default'           => 'fa-database',
		    'type'              => 'theme_mod',
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'enigma_sanitize_text',

	    )
    );
    $wp_customize->add_setting(
	    'service_3_icons',
	    array(
		    'default'           => 'fa-wordpress',
		    'type'              => 'theme_mod',
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'enigma_sanitize_text',

	    )
    );
    $wp_customize->add_setting(
	    'service_1_title',
	    array(
		    'default'           => __( "Idea", 'enigma' ),
		    'type'              => 'theme_mod',
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'enigma_sanitize_text',
	    )
    );
    $wp_customize->add_setting(
	    'service_2_title',
	    array(
		    'default'           => __( 'Records', 'enigma' ),
		    'type'              => 'theme_mod',
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'enigma_sanitize_text'
	    )
    );
    $wp_customize->add_setting(
	    'service_3_title',
	    array(
		    'default'           => __( "WordPress", 'enigma' ),
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'enigma_sanitize_text',
		    'capability'        => 'edit_theme_options',
	    )
    );
    $wp_customize->add_setting(
	    'service_1_text',
	    array(
		    'default'           => __( "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.", 'enigma' ),
		    'sanitize_callback' => 'enigma_sanitize_text',
		    'capability'        => 'edit_theme_options'
	    ) );
    $wp_customize->add_setting(
	    'service_2_text',
	    array(
		    'default'           => __( "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.", 'enigma' ),
		    'sanitize_callback' => 'enigma_sanitize_text',
		    'capability'        => 'edit_theme_options',
	    )
    );
    $wp_customize->add_setting(
	    'service_3_text',
	    array(
		    'default'           => __( "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.", 'enigma' ),
		    'sanitize_callback' => 'enigma_sanitize_text',
		    'capability'        => 'edit_theme_options',
	    )
    );

    $wp_customize->add_setting(
	    'service_1_link',
	    array(
		    'default'           => '#',
		    'type'              => 'theme_mod',
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'esc_url_raw',
	    ) );
    $wp_customize->add_setting(
	    'service_2_link',
	    array(
		    'default'           => '#',
		    'type'              => 'theme_mod',
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'esc_url_raw',
	    ) );
    $wp_customize->add_setting(
	    'service_3_link',
	    array(
		    'default'           => '#',
		    'type'              => 'theme_mod',
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'esc_url_raw',
	    ) );

    $wp_customize->add_control( 'enigma_show_service', array(
	    'label'    => __( 'Enable Service on Home', 'enigma' ),
	    'type'     => 'checkbox',
	    'section'  => 'service_section',
	    'settings' => 'services_home'
    ) );

    $wp_customize->add_control(
	    new enigma_Customize_Misc_Control(
		    $wp_customize,
		    'service_options1-line',
		    array(
			    'section' => 'service_section',
			    'type'    => 'line'
		    )
	    ) );

    $wp_customize->add_control( 'service_one_title', array(
	    'label'    => __( 'Service One Title', 'enigma' ),
	    'type'     => 'text',
	    'section'  => 'service_section',
	    'settings' => 'service_1_title'
    ) );

    $wp_customize->selective_refresh->add_partial( 'service_1_title', array(
	    'selector' => '.enigma_service_detail .head_1',
    ));

    $wp_customize->add_control( new Enigma_Customizer_Icon_Picker_Control( $wp_customize, 'service_1_icons',
	    array(
		    'label'    => __( 'Service Icon One', 'enigma' ),
		    'type'     => 'text',
		    'section'  => 'service_section',
		    'settings' => 'service_1_icons'
	    )
    ) );

    $wp_customize->add_control( new One_Page_Editor( $wp_customize, 'service_1_text', array(
	    'label'                      => __( 'Service One Text', 'enigma' ),
	    'section'                    => 'service_section',
	    'active_callback'            => 'show_on_front',
	    'include_admin_print_footer' => true,
	    'settings'                   => 'service_1_text'
    ) ) );

    $wp_customize->add_control( 'service_1_link', array(
	    'label'    => __( 'Service One Link', 'enigma' ),
	    'type'     => 'url',
	    'section'  => 'service_section',
	    'settings' => 'service_1_link'
    ) );
    $wp_customize->add_setting( 'service_1_youtube',
	    array(
		    'default'           => '',
		    'type'              => 'theme_mod',
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'esc_url_raw',
	    ) );

    $wp_customize->add_control( 'service_1_youtube', array(
	    'label'    => __( 'Service One Embed Youtube URL', 'enigma' ),
	    'type'     => 'url',
	    'section'  => 'service_section',
	    'settings' => 'service_1_youtube'
    ) );
    $wp_customize->add_control( new enigma_Customize_Misc_Control(
	    $wp_customize,
	    'service_options2-line',
	    array(
		    'section' => 'service_section',
		    'type'    => 'line'
	    )
    ) );
    $wp_customize->add_control( 'service_two_title', array(
	    'label'    => __( 'Service Two Title', 'enigma' ),
	    'type'     => 'text',
	    'section'  => 'service_section',
	    'settings' => 'service_2_title'
    ) );

    $wp_customize->selective_refresh->add_partial( 'service_2_title', array(
	    'selector' => '.enigma_service_detail .head_2',
    ));
    $wp_customize->add_control( new Enigma_Customizer_Icon_Picker_Control( $wp_customize, 'service_2_icons',
	    array(
		    'label'    => __( 'Service Icon Two', 'enigma' ),
		    'type'     => 'text',
		    'section'  => 'service_section',
		    'settings' => 'service_2_icons'
	    )
    ) );
    $wp_customize->add_control( new One_Page_Editor( $wp_customize, 'service_2_text', array(
	    'label'                      => __( 'Service Two Text', 'enigma' ),
	    'section'                    => 'service_section',
	    'active_callback'            => 'show_on_front',
	    'include_admin_print_footer' => true,
	    'settings'                   => 'service_2_text'
    ) ) );

    $wp_customize->add_control( 'service_2_link', array(
	    'label'    => __( 'Service Two Link', 'enigma' ),
	    'type'     => 'url',
	    'section'  => 'service_section',
	    'settings' => 'service_2_link'
    ) );

    $wp_customize->add_setting(
	    'service_2_youtube',
	    array(
		    'default'           => '',
		    'type'              => 'theme_mod',
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'esc_url_raw',
	    ) );

    $wp_customize->add_control( 'service_2_youtube', array(
	    'label'    => __( 'Service Two Embed Youtube URL', 'enigma' ),
	    'type'     => 'url',
	    'section'  => 'service_section',
	    'settings' => 'service_2_youtube'
    ) );
    $wp_customize->add_control( new enigma_Customize_Misc_Control(
	    $wp_customize, 'enigma_service_options3-line',
	    array(
		    'section' => 'service_section',
		    'type'    => 'line'
	    )
    ) );
    $wp_customize->add_control( 'enigma_service_three_title', array(
	    'label'    => __( 'Service Three Title', 'enigma' ),
	    'type'     => 'text',
	    'section'  => 'service_section',
	    'settings' => 'service_3_title'
    ) );
    $wp_customize->selective_refresh->add_partial( 'service_3_title', array(
	    'selector' => '.enigma_service_detail .head_3',
    ));
    $wp_customize->add_control( new Enigma_Customizer_Icon_Picker_Control( $wp_customize, 'service_3_icons',
	    array(
		    'label'    => __( 'Service Icon Three', 'enigma' ),
		    'type'     => 'text',
		    'section'  => 'service_section',
		    'settings' => 'service_3_icons'
	    )
    ) );
    $wp_customize->add_control( new One_Page_Editor( $wp_customize, 'service_3_text', array(
	    'label'                      => __( 'Service Three Text', 'enigma' ),
	    'active_callback'            => 'show_on_front',
	    'include_admin_print_footer' => true,
	    'section'                    => 'service_section',
	    'settings'                   => 'service_3_text'
    ) ) );

    $wp_customize->add_control( 'service_3_link', array(
	    'label'    => __( 'Service Three Link', 'enigma' ),
	    'type'     => 'url',
	    'section'  => 'service_section',
	    'settings' => 'service_3_link'
    ) );


    $wp_customize->add_setting(
	    'service_3_youtube',
	    array(
		    'default'           => '',
		    'type'              => 'theme_mod',
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'esc_url_raw',
	    ) );

    $wp_customize->add_control( 'service_3_youtube', array(
	    'label'    => __( 'Service Three Embed Youtube URL', 'enigma' ),
	    'type'     => 'url',
	    'section'  => 'service_section',
	    'settings' => 'service_3_youtube'
    ) );

    /* Portfolio Section */
    $wp_customize->add_section(
	    'portfolio_section',
	    array(
		    'title'       => __( 'Portfolio Options', 'enigma' ),
		    'description' => __( 'Here you can add Portfolio title,description and even portfolios', 'enigma' ),
		    'panel'       => 'enigma_theme_option',
		    'capability'  => 'edit_theme_options',
		    'priority'    => 35,
	    )
    );

    $wp_customize->add_setting(
	    'portfolio_home',
	    array(
		    'type'              => 'theme_mod',
		    'default'           => 1,
		    'sanitize_callback' => 'enigma_sanitize_checkbox',
		    'capability'        => 'edit_theme_options'
	    )
    );
    $wp_customize->add_setting(
	    'port_heading',
	    array(
		    'type'              => 'theme_mod',
		    'default'           => __( 'Recent Works', 'enigma' ),
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'enigma_sanitize_text',
	    )
    );

    for ( $i = 1; $i <= 4; $i ++ ) {

	    if ( $i == 1 ) {
		    $port_title = __( 'Bonorum', 'enigma' );
	    } elseif ( $i == 2 ) {
		    $port_title = __( 'Content', 'enigma' );
	    } elseif ( $i == 3 ) {
		    $port_title = __( 'dictionary', 'enigma' );
	    } elseif ( $i == 4 ) {
		    $port_title = __( 'randomised', 'enigma' );
	    }

	    $wp_customize->add_setting(
		    'port_' . $i . '_img',
		    array(
			    'type'              => 'theme_mod',
			    'default'           => $port[ $i ],
			    'capability'        => 'edit_theme_options',
			    'sanitize_callback' => 'esc_url_raw',
		    )
	    );
	    $wp_customize->add_setting(
		    'port_' . $i . '_title',
		    array(
			    'type'              => 'theme_mod',
			    'default'           => $port_title,
			    'capability'        => 'edit_theme_options',
			    'sanitize_callback' => 'enigma_sanitize_text',
		    )
	    );

	    $wp_customize->add_setting(
		    'port_' . $i . '_link',
		    array(
			    'type'              => 'theme_mod',
			    'default'           => '#',
			    'capability'        => 'edit_theme_options',
			    'sanitize_callback' => 'esc_url_raw',
		    )
	    );
    }

    $wp_customize->add_control( 'enigma_show_portfolio', array(
	    'label'    => __( 'Enable Portfolio on Home', 'enigma' ),
	    'type'     => 'checkbox',
	    'section'  => 'portfolio_section',
	    'settings' => 'portfolio_home'
    ) );
    $wp_customize->add_control( 'port_heading', array(
	    'label'    => __( 'Portfolio Heading', 'enigma' ),
	    'type'     => 'text',
	    'section'  => 'portfolio_section',
	    'settings' => 'port_heading'
    ) );

    $wp_customize->selective_refresh->add_partial( 'port_heading', array(
	    'selector' => '.enigma_project_section .enigma_heading_title h3',
    ));

    for ( $i = 1; $i <= 4; $i ++ ) {
	    $j = array( ' One', ' Two', ' Three', ' Four' );
	    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'enigma_portfolio_img_' . $i, array(
		    'label'    => __( 'Portfolio Image', 'enigma' ) . $j[ $i - 1 ],
		    'section'  => 'portfolio_section',
		    'settings' => 'port_' . $i . '_img'
	    ) ) );
	    $wp_customize->add_control( 'enigma_portfolio_title_' . $i, array(
		    'label'    => __( 'Portfolio Title', 'enigma' ) . $j[ $i - 1 ],
		    'type'     => 'text',
		    'section'  => 'portfolio_section',
		    'settings' => 'port_' . $i . '_title'
	    ) );

	    $wp_customize->selective_refresh->add_partial( 'port_' . $i . '_title', array(
		    'selector' => '.enigma_home_portfolio_caption .port_' . $i,
        ));

        $wp_customize->add_control( 'enigma_portfolio_link_' . $i, array(
	        'label'    => __( 'Portfolio Link', 'enigma' ) . $j[ $i - 1 ],
	        'type'     => 'url',
	        'section'  => 'portfolio_section',
	        'settings' => 'port_' . $i . '_link'
        ) );
    }

    /* Blog Option */
    $wp_customize->add_section( 'blog_section', array(
	    'title'      => __( 'Home Blog Options', 'enigma' ),
	    'panel'      => 'enigma_theme_option',
	    'capability' => 'edit_theme_options',
	    'priority'   => 35
    ) );

    $wp_customize->add_setting(
	    'blog_home',
	    array(
		    'default'           => 1,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'enigma_sanitize_checkbox',
		    'capability'        => 'edit_theme_options'
	    )
    );

    $wp_customize->add_control( 'blog_home', array(
	    'label'    => __( 'Enable Social Media Icons in Header', 'enigma' ),
	    'type'     => 'checkbox',
	    'section'  => 'blog_section',
	    'settings' => 'blog_home'
    ) );

    $wp_customize->add_setting(
	    'blog_title',
	    array(
		    'type'              => 'theme_mod',
		    'default'           => __( 'Latest News', 'enigma' ),
		    'sanitize_callback' => 'enigma_sanitize_text',
		    'capability'        => 'edit_theme_options',
	    )
    );

    $wp_customize->add_control( 'enigma_latest_post', array(
	    'label'    => __( 'Home Blog Title', 'enigma' ),
	    'type'     => 'text',
	    'section'  => 'blog_section',
	    'settings' => 'blog_title',
    ) );

    $wp_customize->selective_refresh->add_partial( 'blog_title]', array(
	    'selector' => '.enigma_blog_area .enigma_heading_title h3',
    ));

    $wp_customize->add_setting(
	    'blog_speed',
	    array(
		    'type'              => 'theme_mod',
		    'default'           => '2000',
		    'sanitize_callback' => 'enigma_sanitize_text',
		    'capability'        => 'edit_theme_options',
	    )
    );

    $wp_customize->add_control( 'blog_speed', array(
	    'label'       => __( 'Slider Speed Option', 'enigma' ),
	    'description' => 'Value will be in milliseconds',
	    'type'        => 'text',
	    'section'     => 'blog_section',
	    'settings'    => 'blog_speed',
    ) );

    $wp_customize->add_setting( 'blog_category',
	    array(
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'enigma_sanitize_text',
		    'capability'        => 'edit_theme_options',
	    )
    );

    $wp_customize->add_control( new enigma_category_Control( $wp_customize, 'blog_category', array(
	    'label'    => __( 'Blog Category', 'enigma' ),
	    'type'     => 'select',
	    'section'  => 'blog_section',
	    'settings' => 'blog_category',
    ) ) );

    $wp_customize->add_setting( 'read_more', array(
	    'type' => 'theme_mod',
            'default' => __( 'Read More', 'enigma' ),
            'sanitize_callback' => 'enigma_sanitize_text',
            'capability' => 'edit_theme_options',
        )
    );

    $wp_customize->add_control( 'read_more', array(
	    'label'       => __( 'Blog Read More Button', 'enigma' ),
	    'description' => 'Enter Read More button text',
	    'type'        => 'text',
	    'section'     => 'blog_section',
	    'settings'    => 'read_more',
    ) );

    $wp_customize->add_setting( 'autoplay', array(
	    'type' => 'theme_mod',
            'default' => 1,
            'sanitize_callback' => 'enigma_sanitize_checkbox',
            'capability' => 'edit_theme_options',
        )
    );

    $wp_customize->add_control( 'autoplay', array(
	    'label'       => __( 'Blog AutoPlay', 'enigma' ),
	    'description' => 'blog autoplay on/off',
	    'type'        => 'checkbox',
	    'section'     => 'blog_section',
	    'settings'    => 'autoplay',
    ) );

    /* Extra Section Option */
    $wp_customize->add_section( 'extra_section', array(
	    'title'      => __( 'Home Extra Section Options', 'enigma' ),
	    'panel'      => 'enigma_theme_option',
	    'capability' => 'edit_theme_options',
	    'priority'   => 35
    ) );

    $wp_customize->add_setting(
	    'editor_home',
	    array(
		    'default'           => '',
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'enigma_sanitize_checkbox',
		    'capability'        => 'edit_theme_options'
	    )
    );

    $wp_customize->add_control( 'editor_home', array(
	    'label'    => __( 'Enable extra section on homepage.', 'enigma' ),
	    'type'     => 'checkbox',
	    'section'  => 'extra_section',
	    'settings' => 'editor_home'
    ) );

    $wp_customize->add_setting(
	    'extra_sec_desc',
	    array(
		    'default'           => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'enigma_sanitize_text',
		    'capability'        => 'edit_theme_options'
	    )
    );

    $wp_customize->add_control( new One_Page_Editor( $wp_customize, 'extra_sec_desc', array(
	    'label'                      => __( 'Extra section content', 'enigma' ),
	    'active_callback'            => 'show_on_front',
	    'include_admin_print_footer' => true,
	    'section'                    => 'extra_section',
	    'settings'                   => 'extra_sec_desc'
    ) ) );

    /* Font Family Section */
    $wp_customize->add_section( 'font_section', array(
	    'title'      => __( 'Typography Settings', 'enigma' ),
	    'panel'      => 'enigma_theme_option',
	    'capability' => 'edit_theme_options',
	    'priority'   => 35
    ) );

    $wp_customize->add_setting(
	    'main_heading_font',
	    array(
		    'default'           => 'Open Sans',
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'enigma_sanitize_text',
		    'capability'        => 'edit_theme_options',
	    ) );

    $wp_customize->add_control( new enigma_Font_Control( $wp_customize, 'main_heading_font', array(
	    'label'    => __( 'Logo Font Style', 'enigma' ),
	    'section'  => 'font_section',
	    'settings' => 'main_heading_font',
    ) ) );

    $wp_customize->add_setting(
	    'menu_font',
	    array(
		    'default'           => 'Open Sans',
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'enigma_sanitize_text',
		    'capability'        => 'edit_theme_options'
	    ) );

    $wp_customize->add_control( new enigma_Font_Control( $wp_customize, 'menu_font', array(
	    'label'    => __( 'Header Menu Font Style', 'enigma' ),
	    'section'  => 'font_section',
	    'settings' => 'menu_fon]'
    ) ) );

    $wp_customize->add_setting(
	    'theme_title',
	    array(
		    'default'           => 'Open Sans',
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'enigma_sanitize_text',
		    'capability'        => 'edit_theme_options'
	    ) );

    $wp_customize->add_control( new enigma_Font_Control( $wp_customize, 'theme_title', array(
	    'label'    => __( 'Theme Title Font Style', 'enigma' ),
	    'section'  => 'font_section',
	    'settings' => 'theme_titl]'
    ) ) );

    $wp_customize->add_setting(
	    'desc_font_all',
	    array(
		    'default'           => 'Open Sans',
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'enigma_sanitize_text',
		    'capability'        => 'edit_theme_options'
	    ) );

    $wp_customize->add_control( new enigma_Font_Control( $wp_customize, 'desc_font_all', array(
	    'label'    => __( 'Theme Description Font Style', 'enigma' ),
	    'section'  => 'font_section',
	    'settings' => 'desc_font_al]'
    ) ) );

    /* Social options */
    $wp_customize->add_section( 'social_section', array(
	    'title'      => __( "Social Options", 'enigma' ),
	    'panel'      => 'enigma_theme_option',
	    'capability' => 'edit_theme_options',
	    'priority'   => 35
    ) );

    $wp_customize->add_setting(
	    'header_social_media_in_enabled',
	    array(
		    'default'           => 1,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'enigma_sanitize_checkbox',
		    'capability'        => 'edit_theme_options'
	    )
    );

    $wp_customize->add_control( 'header_social_media_in_enabled', array(
	    'label'    => __( 'Enable Social Media Icons in Header', 'enigma' ),
	    'type'     => 'checkbox',
	    'section'  => 'social_section',
	    'settings' => 'header_social_media_in_enabled'
    ) );

    $wp_customize->selective_refresh->add_partial( 'header_social_media_in_enabled', array(
	    'selector' => '.header_section .social',
    ));

    $wp_customize->add_setting(
	    'footer_section_social_media_enbled',
	    array(
		    'default'           => 1,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'enigma_sanitize_checkbox',
		    'capability'        => 'edit_theme_options'
	    )
    );

    $wp_customize->add_control( 'footer_section_social_media_enbled', array(
	    'label'    => __( 'Enable Social Media Icons in Footer', 'enigma' ),
	    'type'     => 'checkbox',
	    'section'  => 'social_section',
	    'settings' => 'footer_section_social_media_enbled'
    ) );

    $wp_customize->selective_refresh->add_partial( 'footer_section_social_media_enbled', array(
	    'selector' => '.enigma_footer_area .social',
    ));

    $wp_customize->add_setting(
	    'email_id',
	    array(
		    'default'           => __( 'example@mymail.com', 'enigma' ),
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'sanitize_email',
		    'capability'        => 'edit_theme_options'
	    )
    );

    $wp_customize->add_control( 'email_id', array(
	    'label'    => __( 'Email ID', 'enigma' ),
	    'type'     => 'email',
	    'section'  => 'social_section',
	    'settings' => 'email_id'
    ) );

    $wp_customize->selective_refresh->add_partial( 'email_id', array(
	    'selector' => '.head-contact-info',
    ));

    $wp_customize->add_setting(
	    'phone_no',
	    array(
		    'default'           => __( '0159753586', 'enigma' ),
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'enigma_sanitize_text',
		    'capability'        => 'edit_theme_options'
	    )
    );

    $wp_customize->add_control( 'phone_no', array(
	    'label'    => __( 'Phone Number', 'enigma' ),
	    'type'     => 'text',
	    'section'  => 'social_section',
	    'settings' => 'phone_no'
    ) );

    $wp_customize->add_setting(
	    'twitter_link',
	    array(
		    'default'           => '#',
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'esc_url_raw',
		    'capability'        => 'edit_theme_options'
	    )
    );

    $wp_customize->add_control( 'twitter_link', array(
	    'label'    => __( 'Twitter', 'enigma' ),
	    'type'     => 'url',
	    'section'  => 'social_section',
	    'settings' => 'twitter_link'
    ) );

    $wp_customize->add_setting(
	    'fb_link',
	    array(
		    'default'           => '#',
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'esc_url_raw',
		    'capability'        => 'edit_theme_options'
	    )
    );

    $wp_customize->add_control( 'fb_link', array(
	    'label'    => __( 'Facebook', 'enigma' ),
	    'type'     => 'url',
	    'section'  => 'social_section',
	    'settings' => 'fb_link'
    ) );

    $wp_customize->add_setting(
	    'linkedin_link',
	    array(
		    'default'           => '#',
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'esc_url_raw',
		    'capability'        => 'edit_theme_options'
	    )
    );
    $wp_customize->add_control( 'linkedin_link', array(
	    'label'    => __( 'LinkedIn', 'enigma' ),
	    'type'     => 'url',
	    'section'  => 'social_section',
	    'settings' => 'linkedin_link'
    ) );

    $wp_customize->add_setting(
	    'youtube_link',
	    array(
		    'default'           => '#',
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'esc_url_raw',
		    'capability'        => 'edit_theme_options'
	    )
    );
    $wp_customize->add_control( 'youtube_link', array(
	    'label'    => __( 'Youtube', 'enigma' ),
	    'type'     => 'url',
	    'section'  => 'social_section',
	    'settings' => 'youtube_link'
    ) );
    $wp_customize->add_setting(
	    'instagram',
	    array(
		    'default'           => '#',
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'esc_url_raw',
		    'capability'        => 'edit_theme_options'
	    )
    );
    $wp_customize->add_control( 'instagram', array(
	    'label'    => __( 'Instagram', 'enigma' ),
	    'type'     => 'url',
	    'section'  => 'social_section',
	    'settings' => 'instagram'
    ) );
    /*extra icons added 2.7.1*/
    $wp_customize->add_setting(
	    'vk_link',
	    array(
		    'default'           => '#',
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'esc_url_raw',
		    'capability'        => 'edit_theme_options'
	    )
    );
    $wp_customize->add_control( 'vk_link', array(
	    'label'    => __( 'VK', 'enigma' ),
	    'type'     => 'url',
	    'section'  => 'social_section',
	    'settings' => 'vk_link'
    ) );
    $wp_customize->add_setting(
	    'qq_link',
	    array(
		    'default'           => '#',
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'esc_url_raw',
		    'capability'        => 'edit_theme_options'
	    )
    );
    $wp_customize->add_control( 'qq_link', array(
	    'label'    => __( 'QQ', 'enigma' ),
	    'type'     => 'url',
	    'section'  => 'social_section',
	    'settings' => 'qq_link'
    ) );
    $wp_customize->add_setting(
	    'whatsapp_link',
	    array(
		    'default'           => '#',
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'esc_attr',
		    'capability'        => 'edit_theme_options'
	    )
    );
    $wp_customize->add_control( 'whatsapp_link', array(
	    'label'    => __( 'WhatsApp', 'enigma' ),
	    'type'     => 'url',
	    'section'  => 'social_section',
	    'settings' => 'whatsapp_link'
    ) );
    /* Footer callout */
    $wp_customize->add_section( 'callout_section', array(
	    'title'      => __( "Footer Call-Out Options", 'enigma' ),
	    'panel'      => 'enigma_theme_option',
	    'capability' => 'edit_theme_options',
	    'priority'   => 35
    ) );
    $wp_customize->add_setting(
	    'fc_home',
	    array(
		    'default'           => 1,
		    'type'              => 'theme_mod',
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'enigma_sanitize_checkbox',
	    )
    );
    $wp_customize->add_control( 'fc_home', array(
	    'label'    => __( 'Enable Footer callout on Home', 'enigma' ),
	    'type'     => 'checkbox',
	    'section'  => 'callout_section',
	    'settings' => 'fc_home'
    ) );
    $wp_customize->add_setting(
	    'fc_title',
	    array(
		    'default'           => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'enigma' ),
		    'type'              => 'theme_mod',
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'enigma_sanitize_text',
	    )
    );
    $wp_customize->add_control( 'fc_title', array(
	    'label'    => __( 'Footer callout Title', 'enigma' ),
	    'type'     => 'text',
	    'section'  => 'callout_section',
	    'settings' => 'fc_title'
    ) );

    $wp_customize->selective_refresh->add_partial( 'fc_title', array(
	    'selector' => '.enigma_callout_area p',
    ));

    $wp_customize->add_setting(
	    'fc_btn_txt',
	    array(
		    'default'           => __( 'More Features', 'enigma' ),
		    'type'              => 'theme_mod',
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'enigma_sanitize_text',
	    )
    );
    $wp_customize->add_control( 'fc_btn_txt', array(
	    'label'    => __( 'Footer callout Button Text', 'enigma' ),
	    'type'     => 'text',
	    'section'  => 'callout_section',
	    'settings' => 'fc_btn_txt'
    ) );

    $wp_customize->selective_refresh->add_partial( 'fc_btn_txt', array(
	    'selector' => '.enigma_callout_area a',
    ));

    $wp_customize->add_setting(
	    'fc_btn_link',
	    array(
		    'default'           => '#',
		    'type'              => 'theme_mod',
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'enigma_sanitize_text',
	    )
    );
    $wp_customize->add_control( 'fc_btn_link', array(
	    'label'    => __( 'Footer callout Button Link', 'enigma' ),
	    'type'     => 'text',
	    'section'  => 'callout_section',
	    'settings' => 'fc_btn_link'
    ) );
    $wp_customize->add_setting(
	    'fc_icon',
	    array(
		    'default'           => 'fa fa-thumbs-up',
		    'type'              => 'theme_mod',
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'enigma_sanitize_text',
	    )
    );
    $wp_customize->add_control( 'fc_icon', array(
	    'label'    => __( 'Footer callout Icon', 'enigma' ),
	    'type'     => 'text',
	    'section'  => 'callout_section',
	    'settings' => 'fc_icon'
    ) );

    /* Footer Options */
    $wp_customize->add_section( 'footer_section', array(
	    'title'      => __( "Footer Options", 'enigma' ),
	    'panel'      => 'enigma_theme_option',
	    'capability' => 'edit_theme_options',
	    'priority'   => 35
    ) );

    $wp_customize->add_setting( 'footer_widgets', array(
	    'type' => 'theme_mod',
            'default' => 1,
            'sanitize_callback' => 'enigma_sanitize_checkbox',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( 'enigma_footer_widgets', array(
	    'label'    => __( 'Show/Hide Footer Widgets', 'enigma' ),
	    'type'     => 'checkbox',
	    'section'  => 'footer_section',
	    'settings' => 'footer_widgets',
    ) );

    $wp_customize->add_setting(
	    'footer_customizations',
	    array(
		    'default'           => __( '@ Copyright ', 'enigma' ),
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'enigma_sanitize_text',
		    'capability'        => 'edit_theme_options'
	    )
    );
    $wp_customize->add_control( 'footer_customizations', array(
	    'label'    => __( 'Footer Customization Text', 'enigma' ),
	    'type'     => 'text',
	    'section'  => 'footer_section',
	    'settings' => 'footer_customizations'
    ) );

    $wp_customize->selective_refresh->add_partial( 'footer_customizations', array(
	    'selector' => '.enigma_footer_copyright_info',
    ));

    $wp_customize->add_setting(
	    'developed_by_text',
	    array(
		    'default'           => __( 'Developed By', 'enigma' ),
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'enigma_sanitize_text',
		    'capability'        => 'edit_theme_options'
	    )
    );
    $wp_customize->add_control( 'developed_by_text', array(
	    'label'    => __( 'Developed By Text', 'enigma' ),
	    'type'     => 'text',
	    'section'  => 'footer_section',
	    'settings' => 'developed_by_text'
    ) );
    $wp_customize->add_setting(
	    'developed_by_weblizar_text',
	    array(
		    'default'           => '',
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'enigma_sanitize_text',
		    'capability'        => 'edit_theme_options'
	    )
    );
    $wp_customize->add_control( 'developed_by_weblizar_text', array(
	    'label'    => __( 'Developed By Link Text', 'enigma' ),
	    'type'     => 'text',
	    'section'  => 'footer_section',
	    'settings' => 'developed_by_weblizar_text'
    ) );
    $wp_customize->add_setting(
	    'developed_by_link',
	    array(
		    'default'           => '#',
		    'type'              => 'theme_mod',
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'esc_url_raw'
	    )
    );
    $wp_customize->add_control( 'developed_by_link', array(
	    'label'    => __( 'Developed By Link', 'enigma' ),
	    'type'     => 'url',
	    'section'  => 'footer_section',
	    'settings' => 'developed_by_link'
    ) );

    // excerpt option
    $wp_customize->add_section( 'excerpt_option', array(
	    'title'      => __( "Excerpt Option", 'enigma' ),
	    'panel'      => 'enigma_theme_option',
	    'capability' => 'edit_theme_options',
	    'priority'   => 37,
    ) );

    $wp_customize->add_setting( 'excerpt_blog', array(
	    'default'           => '55',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'enigma_sanitize_integer',
        'capability'        => 'edit_theme_options'
    ));
    $wp_customize->add_control( 'excerpt_blog', array(
	    'label'       => __( 'Excerpt length blog section', 'enigma' ),
	    'type'        => 'number',
	    'section'     => 'excerpt_option',
	    'description' => esc_html__( 'Excerpt length only for home blog section.', 'enigma' ),
	    'settings'    => 'excerpt_blog'
    ) );

    // home layout //
    $wp_customize->add_section( 'Home_Page_Layout', array(
	    'title'      => __( "Home Page Layout Option", 'enigma' ),
	    'panel'      => 'enigma_theme_option',
	    'capability' => 'edit_theme_options',
	    'priority'   => 37,
    ) );
    $wp_customize->add_setting( 'home_reorder',
	    array(
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'sanitize_json_string',
		    'capability'        => 'edit_theme_options',
	    )
    );
    $wp_customize->add_control( new enigma_Custom_sortable_Control( $wp_customize, 'home_reorder', array(
	    'label'    => __( 'Front Page Layout Option', 'enigma' ),
	    'section'  => 'Home_Page_Layout',
	    'type'     => 'home-sortable',
	    'choices'  => array(
		    'services'  => __( 'Home Services', 'enigma' ),
		    'portfolio' => __( 'Home Portfolio', 'enigma' ),
		    'blog'      => __( 'Home Blog', 'enigma' ),
		    'editor'    => __( 'Home Extra Section', 'enigma' ),
	    ),
	    'settings' => 'home_reorder',
    ) ) );

    $wp_customize->add_setting( 'box_layout',
	    array(
		    'type'              => 'theme_mod',
		    'default'           => '1',
		    'sanitize_callback' => 'enigma_sanitize_integer',
		    'capability'        => 'edit_theme_options',
	    )
    );
    $wp_customize->add_control( 'box_layout', array(
	    'label'    => __( 'Boxed Layout', 'enigma' ),
	    'section'  => 'Home_Page_Layout',
	    'type'     => 'select',
	    'choices'  => array(
		    '1' => __( 'Full-Width', 'enigma' ),
		    '2' => __( 'Boxed', 'enigma' ),
	    ),
	    'settings' => 'box_layout',
    ) );
    // home layout close //
}

function enigma_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function enigma_sanitize_checkbox( $input ) {
	return $input;
}

function enigma_sanitize_integer( $input ) {
	return (int) ( $input );
}

/* Custom Control Class */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'enigma_Customize_Misc_Control' ) ) :
	class enigma_Customize_Misc_Control extends WP_Customize_Control {
		public $settings = 'blogname';
		public $description = '';

		public function render_content() {
			switch ( $this->type ) {
				default:

				case 'heading':
					echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
					break;

				case 'line' :
					echo '<hr />';
					break;

			}
		}
	}
endif;


/* class for font-family */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'enigma_Font_Control' ) ) :
	class enigma_Font_Control extends WP_Customize_Control {
		public function render_content() {
			?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php $google_api_url = 'https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyC8GQW0seCcIYbo8xt_gXuToPK8xAMx83A';
			//lets fetch it
			$response = wp_remote_retrieve_body( wp_remote_get( $google_api_url, array( 'sslverify' => false ) ) );
			if ( $response == '' ) {
				echo '<script>jQuery(document).ready(function() {alert("Something went wrong! this works only when you are connected to Internet....!!");});</script>';
			}
			if ( is_wp_error( $response ) ) {
				echo 'Something went wrong!';
			} else {
				$json_fonts = json_decode( $response, true );
				// that's it
				$items = $json_fonts['items'];
				$i     = 0; ?>
                <select <?php $this->link(); ?> >
					<?php foreach ( $items as $item ) {
						$i ++;
						$str = $item['family']; ?>
                        <option value="<?php echo esc_attr( $str ); ?>" <?php if ( $this->value() == $str ) {
							echo 'selected="selected"';
						} ?>><?php echo esc_attr( $str ); ?></option>
					<?php } ?>
                </select>
				<?php
			}
		}
	}
endif;

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Enigma_Customizer_Icon_Picker_Control' ) ) :
	class Enigma_Customizer_Icon_Picker_Control extends WP_Customize_Control {
		public function enqueue() {
			wp_enqueue_script( 'fontawesome-iconpicker', get_template_directory_uri() . '/iconpicker-control/assets/js/fontawesome-iconpicker.min.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'iconpicker-control', get_template_directory_uri() . '/iconpicker-control/assets/js/iconpicker-control.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_style( 'fontawesome-iconpicker', get_template_directory_uri() . '/iconpicker-control/assets/css/fontawesome-iconpicker.min.css' );
			wp_enqueue_style( 'font-awesome-latest', get_template_directory_uri() . '/css/font-awesome-5.11.2/css/all.min.css' );
		}


		public function render_content() {
			?>
            <label>
				<span class="customize-control-title">
					<?php echo esc_html( $this->label ); ?>
				</span>
                <div class="input-group icp-container">
                    <input data-placement="bottomRight" class="icp icp-auto icon-picker-input" <?php $this->link(); ?>
                           value="<?php echo esc_attr( $this->value() ); ?>" type="text">
                    <span class="input-group-addon"></span>
                </div>
            </label>
			<?php
		}
	}
endif;

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'enigma_Custom_sortable_Control' ) ) :
	class enigma_Custom_sortable_Control extends WP_Customize_Control {
		public $type = 'home-sortable';

		/*Enqueue resources for the control*/
		public function enqueue() {

			wp_enqueue_style( 'customizer-repeater-admin-stylesheet', get_template_directory_uri() . '/assets/customizer_js_css/css/enigma-admin-style.css', time() );

			wp_enqueue_script( 'customizer-repeater-script', get_template_directory_uri() . '/assets/customizer_js_css/js/enigma-customizer_repeater.js', array(
				'jquery',
				'jquery-ui-draggable'
			), time(), true );

		}

		public function render_content() {
			if ( empty( $this->choices ) ) {
				return;
			}
			$values = json_decode( $this->value() );
			$name   = $this->id;
			?>

            <span class="customize-control-title">
			<?php echo esc_attr( $this->label ); ?>
		</span>

			<?php if ( ! empty( $this->description ) ): ?>
                <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>

            <div class="customizer-repeater-general-control-repeater customizer-repeater-general-control-droppable">
				<?php
				if ( ! empty( $values ) ) {
					foreach ( $values as $value ) { ?>
                        <div class="customizer-repeater-general-control-repeater-container customizer-repeater-draggable ui-sortable-handle">
                            <div class="customizer-repeater-customize-control-title">
								<?php echo esc_attr( $this->choices[ $value ] ); ?>
                            </div>
                            <input type="hidden" class="section-id" value="<?php echo esc_attr( $value ); ?>">
                        </div>
					<?php } ?>

				<?php } else {
					foreach ( $this->choices as $value => $label ): ?>
                        <div class="customizer-repeater-general-control-repeater-container customizer-repeater-draggable ui-sortable-handle">
                            <div class="customizer-repeater-customize-control-title">
								<?php echo esc_attr( $label ); ?>
                            </div>
                            <input type="hidden" class="section-id" value="<?php echo esc_attr( $value ); ?>">
                        </div>

					<?php endforeach;
				}
				if ( ! empty( $value ) ) { ?>
                    <input type="hidden"
                           id="customizer-repeater-<?php echo esc_attr( $this->id ); ?>-colector" <?php esc_url( $this->link() ); ?>
                           class="customizer-repeater-colector"
                           value="<?php echo esc_textarea( json_encode( $value ) ); ?>"/>
					<?php
				} else { ?>
                    <input type="hidden"
                           id="customizer-repeater-<?php echo esc_attr( $this->id ); ?>-colector" <?php esc_url( $this->link() ); ?>
                           class="customizer-repeater-colector"/>
					<?php
				} ?>
            </div>
			<?php
		}
	}
endif;

function sanitize_json_string( $json ) {
	$sanitized_value = array();
	foreach ( json_decode( $json, true ) as $value ) {
		$sanitized_value[] = esc_attr( $value );
	}

	return json_encode( $sanitized_value );
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'One_Page_Editor' ) ) :
	/* Class to create a custom tags control */
	class One_Page_Editor extends WP_Customize_Control {
		private $include_admin_print_footer = false;
		private $teeny = false;
		public $type = 'text-editor';

		public function __construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
			if ( ! empty( $args['include_admin_print_footer'] ) ) {
				$this->include_admin_print_footer = $args['include_admin_print_footer'];
			}
			if ( ! empty( $args['teeny'] ) ) {
				$this->teeny = $args['teeny'];
			}
		}

		/* Enqueue scripts */
		public function enqueue() {
			wp_enqueue_script( 'one_lite_text_editor', get_template_directory_uri() . '/inc/customizer-page-editor/js/one-lite-text-editor.js', array( 'jquery' ), false, true );
		}

		/* Render the content on the theme customizer page */
		public function render_content() {
			?>

            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>">
			<?php
			$settings        = array(
				'textarea_name' => $this->id,
				'teeny'         => $this->teeny,
			);
			$control_content = $this->value();
			wp_editor( $control_content, $this->id, $settings );

			if ( $this->include_admin_print_footer === true ) {
				do_action( 'admin_print_footer_scripts' );
			}
		}
	}
endif;

function show_on_front() {
	if ( is_front_page() ) {
		return is_front_page() && 'posts' !== get_option( 'show_on_front' );
	} elseif ( is_home() ) {
		return is_home();
	}
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'enigma_animation' ) ) :
	class enigma_animation extends WP_Customize_Control {

		/**
		 * Render the content on the theme customizer page
		 */
		public function render_content() { ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php
//			$wl_theme_options = weblizar_get_options();
			//$animate_slider   = $wl_theme_options['animate_type_title'];
			$animation        = array(
				'fadeIn',
				'fadeInUp',
				'fadeInDown',
				'fadeInLeft',
				'fadeInRight',
				'bounceIn',
				'bounceInUp',
				'bounceInDown',
				'bounceInLeft',
				'bounceInRight',
				'rotateIn',
				'rotateInUpLeft',
				'rotateInDownLeft',
				'rotateInUpRight',
				'rotateInDownRight',
			); ?>

            <select name="animate_slider" class="webriti_inpute" <?php $this->link(); ?>>
				<?php foreach ( $animation as $animate ) { ?>
                    <option value="<?php echo esc_attr( $animate ); ?>" <?php echo selected( $animate_slider, $animate ); ?>><?php echo esc_attr( $animate ); ?></option>
				<?php } ?>
            </select>
			<?php
		}
	}
endif;

/* class for categories */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'enigma_category_Control' ) ) :
	class enigma_category_Control extends WP_Customize_Control {
		public function render_content() { ?>
            <span class="customize-control-title"><?php echo esc_attr( $this->label ); ?></span>
			<?php $enigma_category = get_categories(); ?>
            <select <?php $this->link(); ?> >
				<?php foreach ( $enigma_category as $category ) { ?>
                    <option value="<?php echo esc_attr( $category->term_id ); ?>" <?php if ( $this->value() == '' ) {
						echo 'selected="selected"';
					} ?> ><?php echo esc_attr( $category->cat_name ); ?></option>
				<?php } ?>
            </select> <?php
		}  /* public function ends */
	}/*   class ends */
endif;
?>