<?php
function aqua_customize_register( $wp_customize ) {  

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	
	$wp_customize->get_control( 'display_header_text' )->label = esc_html( 'Display Site Tagline', 'aquaparallax' );
	
 // remove control
$wp_customize->remove_control('display_header_text');

//Header section
$wp_customize->add_section(
        'aqua_header_section',
        array(
            'title' => esc_html( 'Header Section', 'aquaparallax' ),
            'description' => esc_html( 'Header section', 'aquaparallax' ),
            'priority' => 33,
        )
    );
	$wp_customize->add_setting( 'aqua_header_logo', array(
		'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'aqua_header_logo',
        array(
            'label' => esc_html( 'Header-logo:', 'aquaparallax' ),
            'section' => 'aqua_header_section',
            'settings' => 'aqua_header_logo'
        )
    )
    );
	
	// Favicon
	$wp_customize->add_setting( 'aqua_favicon', array(
		'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'aqua_favicon',
        array(
            'label' => esc_html( 'Favicon:', 'aquaparallax' ),
            'section' => 'aqua_header_section',
            'settings' => 'aqua_favicon'
        )
    )
    );
	
    // Search box
    $wp_customize->add_setting('aqua_search_box', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_search_box',
    array(
        'type' => 'checkbox',
        'label' => esc_html( 'Include search box', 'aquaparallax' ),
        'section' => 'aqua_header_section',
    )
    );	
	
// Banner section
$wp_customize->add_section(
        'aqua_banner_section',
        array(
            'title' => esc_html( 'Banner Section', 'aquaparallax' ),
            'description' => esc_html( 'Banner section.', 'aquaparallax' ),
            'priority' => 34,
        )
    );
	// Banner image
    $wp_customize->add_setting('aqua_banner_image', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'aqua_banner_image',
        array(
            'label' => esc_html( 'Banner image:', 'aquaparallax' ),
            'section' => 'aqua_banner_section',
            'settings' => 'aqua_banner_image'
        )
    )
    );
	// Banner title
	$wp_customize->add_setting('aqua_banner_title', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_banner_title',
    array(
        'type' => 'text',
        'label' => esc_html( 'Banner title', 'aquaparallax' ),
        'section' => 'aqua_banner_section',
		'settings' => 'aqua_banner_title'
    )
    );	
	// Banner content
	$wp_customize->add_setting('aqua_banner_content', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_banner_content',
    array(
        'type' => 'textarea',
        'label' => esc_html( 'Banner content', 'aquaparallax' ),
        'section' => 'aqua_banner_section',
		'settings' => 'aqua_banner_content'
    )
    );	
	// Read more link content
	$wp_customize->add_setting('aqua_read_link', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_read_link',
    array(
        'type' => 'text',
        'label' => esc_html( 'Read more link', 'aquaparallax' ),
        'section' => 'aqua_banner_section',
		'settings' => 'aqua_read_link'
    )
    );	
	// Download link content
	$wp_customize->add_setting('aqua_download_link', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_download_link',
    array(
        'type' => 'text',
        'label' => esc_html( 'Download link', 'aquaparallax' ),
        'section' => 'aqua_banner_section',
		'settings' => 'aqua_download_link'
    )
    );	
	
// Feature area section
$wp_customize->add_section(
        'aqua_feature_section',
        array(
            'title' => esc_html( 'Feature Area', 'aquaparallax' ),
            'description' => esc_html( 'Feature area section.', 'aquaparallax' ),
            'priority' => 35,
        )
    );
	// Feature title
	$wp_customize->add_setting('aqua_feature_title', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_feature_title',
    array(
        'type' => 'text',
        'label' => esc_html( 'Feature area title', 'aquaparallax' ),
        'section' => 'aqua_feature_section',
		'settings' => 'aqua_feature_title'
    )
    );	
	// Feature content
	$wp_customize->add_setting('aqua_feature_content', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_feature_content',
    array(
        'type' => 'textarea',
        'label' => esc_html( 'Feature area description content', 'aquaparallax' ),
        'section' => 'aqua_feature_section',
		'settings' => 'aqua_feature_content'
    )
    );	
	// section one icon
	$wp_customize->add_setting('aqua_feature_one_icon', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_feature_one_icon',
    array(
        'type' => 'text',
        'label' => esc_html( 'Section one icon', 'aquaparallax' ),
        'section' => 'aqua_feature_section',
		'settings' => 'aqua_feature_one_icon'
    )
    );
	// Section one title
	$wp_customize->add_setting('aqua_feature_one_title', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_feature_one_title',
    array(
        'type' => 'text',
        'label' => esc_html( 'Section one title', 'aquaparallax' ),
        'section' => 'aqua_feature_section',
		'settings' => 'aqua_feature_one_title'
    )
    );	
	// section one content
	$wp_customize->add_setting('aqua_feature_one_content', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_feature_one_content',
    array(
        'type' => 'textarea',
        'label' => esc_html( 'Section one content', 'aquaparallax' ),
        'section' => 'aqua_feature_section',
		'settings' => 'aqua_feature_one_content'
    )
    );
    // section two icon
	$wp_customize->add_setting('aqua_feature_two_icon', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_feature_two_icon',
    array(
        'type' => 'text',
        'label' => esc_html( 'Section two icon', 'aquaparallax' ),
        'section' => 'aqua_feature_section',
		'settings' => 'aqua_feature_two_icon'
    )
    );
	// Section two title
	$wp_customize->add_setting('aqua_feature_two_title', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_feature_two_title',
    array(
        'type' => 'text',
        'label' => esc_html( 'Section two title', 'aquaparallax' ),
        'section' => 'aqua_feature_section',
		'settings' => 'aqua_feature_two_title'
    )
    );	
	// Section two content
	$wp_customize->add_setting('aqua_feature_two_content', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_feature_two_content',
    array(
        'type' => 'textarea',
        'label' => esc_html( 'Section two content', 'aquaparallax' ),
        'section' => 'aqua_feature_section',
		'settings' => 'aqua_feature_two_content'
    )
    );		
	// section three icon
	$wp_customize->add_setting('aqua_feature_three_icon', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_feature_three_icon',
    array(
        'type' => 'text',
        'label' => esc_html( 'Section three icon', 'aquaparallax' ),
        'section' => 'aqua_feature_section',
		'settings' => 'aqua_feature_three_icon'
    )
    );
	// Section three title
	$wp_customize->add_setting('aqua_feature_three_title', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_feature_three_title',
    array(
        'type' => 'text',
        'label' => esc_html( 'Section three title', 'aquaparallax' ),
        'section' => 'aqua_feature_section',
		'settings' => 'aqua_feature_three_title'
    )
    );	
	// Section three content
	$wp_customize->add_setting('aqua_feature_three_content', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_feature_three_content',
    array(
        'type' => 'textarea',
        'label' => esc_html( 'Section three content', 'aquaparallax' ),
        'section' => 'aqua_feature_section',
		'settings' => 'aqua_feature_three_content'
    )
    );	
	// section four icon
	$wp_customize->add_setting('aqua_feature_four_icon', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_feature_four_icon',
    array(
        'type' => 'text',
        'label' => esc_html( 'Section four icon', 'aquaparallax' ),
        'section' => 'aqua_feature_section',
		'settings' => 'aqua_feature_four_icon'
    )
    );
	// Section four title
	$wp_customize->add_setting('aqua_feature_four_title', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_feature_four_title',
    array(
        'type' => 'text',
        'label' => esc_html( 'Section four title', 'aquaparallax' ),
        'section' => 'aqua_feature_section',
		'settings' => 'aqua_feature_four_title'
    )
    );	
	// Section four content
	$wp_customize->add_setting('aqua_feature_four_content', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_feature_four_content',
    array(
        'type' => 'textarea',
        'label' => esc_html( 'Section four content', 'aquaparallax' ),
        'section' => 'aqua_feature_section',
		'settings' => 'aqua_feature_four_content'
    )
    );	

// Parallax section
$wp_customize->add_section(
        'aqua_parallax_section',
        array(
            'title' => esc_html( 'Parallax Section', 'aquaparallax' ),
            'description' => esc_html( 'Parallax section.', 'aquaparallax' ),
            'priority' => 36,
        )
    );
	// Parallax image
    $wp_customize->add_setting('aqua_parallax_image', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'aqua_parallax_image',
        array(
            'label' => esc_html( 'Parallax image:', 'aquaparallax' ),
            'section' => 'aqua_parallax_section',
            'settings' => 'aqua_parallax_image'
        )
    )
    );
	// Parallax title
	$wp_customize->add_setting('aqua_parallax_title', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_parallax_title',
    array(
        'type' => 'text',
        'label' => esc_html( 'Parallax title', 'aquaparallax' ),
        'section' => 'aqua_parallax_section',
		'settings' => 'aqua_parallax_title'
    )
    );	
	// Parallax content
	$wp_customize->add_setting('aqua_parallax_content', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_parallax_content',
    array(
        'type' => 'textarea',
        'label' => esc_html( 'Parallax content', 'aquaparallax' ),
        'section' => 'aqua_parallax_section',
		'settings' => 'aqua_parallax_content'
    )
    );	
	// Parallax link content
	$wp_customize->add_setting('aqua_parallax_link', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_parallax_link',
    array(
        'type' => 'text',
        'label' => esc_html( 'Read more link', 'aquaparallax' ),
        'section' => 'aqua_parallax_section',
		'settings' => 'aqua_parallax_link'
    )
    );
	
// Blog section
$wp_customize->add_section(
        'aqua_blog_section',
        array(
            'title' => esc_html( 'Enable Blog, Portfolio and Testimonial', 'aquaparallax' ),
            'description' => esc_html( 'Blog, Portfolio and Testimonial section.', 'aquaparallax' ),
            'priority' => 37,
        )
    );
	// Blog section
    $wp_customize->add_setting('aqua_blogpost_section', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_blogpost_section',
    array(
        'type' => 'checkbox',
        'label' => esc_html( 'Include blog section', 'aquaparallax' ),
        'section' => 'aqua_blog_section',
    )
    );	
    // Testimonial section	
    $wp_customize->add_setting('aqua_testimonial_section', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_testimonial_section',
    array(
        'type' => 'checkbox',
        'label' => esc_html( 'Include testimonial section', 'aquaparallax' ),
        'section' => 'aqua_blog_section',
    )
    );
    // Portfolio section  
    $wp_customize->add_setting('aqua_portfolio_section', array(
        'sanitize_callback' => 'aqua_sanitize_text'
    ) );
    $wp_customize->add_control(
    'aqua_portfolio_section',
    array(
        'type' => 'checkbox',
        'label' => esc_html( 'Include portfolio section', 'aquaparallax' ),
        'section' => 'aqua_blog_section',
    )
    );
	
// Social icon section
$wp_customize->add_section(
        'aqua_social_section',
        array(
            'title' => esc_html( 'Social icon section', 'aquaparallax' ),
            'description' => esc_html( 'Social section.', 'aquaparallax' ),
            'priority' => 45,
        )
    );
	/* Facebook icon*/
	$wp_customize->add_setting('aqua_facebook_icon', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );

	$wp_customize->add_control(
		'aqua_facebook_icon',
		array(
			'type' => 'checkbox',
			'label' => 'Include facebook icon',
			'section' => 'aqua_social_section',
		)
	);

     /* Facebook link setting */

	$wp_customize->add_setting( 'aqua_facebook_link', array(
		'sanitize_callback' => 'aqua_sanitize_text'
	) );
	$wp_customize->add_control(

			 'aqua_facebook_link', array(
				'label'    => esc_html( 'Facebook Link:', 'aquaparallax' ),
				'section'  => 'aqua_social_section',
				'settings' => 'aqua_facebook_link',
				'type' => 'text',

			)
	);
	
	/* Twitter icon */
	$wp_customize->add_setting('aqua_twitter_icon', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
	$wp_customize->add_control(
		'aqua_twitter_icon',
		array(
			'type' => 'checkbox',
			'label' => 'Include twitter icon',
			'section' => 'aqua_social_section',
		)
	);
   /* Twitter link setting */
	$wp_customize->add_setting( 'aqua_twitter_link', array(
		'sanitize_callback' => 'aqua_sanitize_text'
	) );
	$wp_customize->add_control(

			 'aqua_twitter_link', array(
				'label'    => esc_html( 'Twitter Link:', 'aquaparallax' ),
				'section'  => 'aqua_social_section',
				'settings' => 'aqua_twitter_link',
				'type' => 'text',
			)
	);

	/* Google plus */
	$wp_customize->add_setting('aqua_google_icon', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );

	$wp_customize->add_control(
		'aqua_google_icon',
		array(
			'type' => 'checkbox',
			'label' => 'Include google plus icon',
			'section' => 'aqua_social_section',
		)
	);

    /* Google plus link setting */

	$wp_customize->add_setting( 'aqua_google_link', array(
		'sanitize_callback' => 'aqua_sanitize_text'
	) );

	$wp_customize->add_control(
			 'aqua_google_link', array(
				'label'    => esc_html( 'Google Plus Link:', 'aquaparallax' ),
				'section'  => 'aqua_social_section',
				'settings' => 'aqua_google_link',
				'type' => 'text',
			)
	);
	
	/* Instagram */
	$wp_customize->add_setting('aqua_instagram_icon', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );

	$wp_customize->add_control(
		'aqua_instagram_icon',
		array(
			'type' => 'checkbox',
			'label' => 'Include instagram icon',
			'section' => 'aqua_social_section',
		)
	);

    /* Instagram setting */

	$wp_customize->add_setting( 'aqua_instagram_link', array(
		'sanitize_callback' => 'aqua_sanitize_text'
	) );

	$wp_customize->add_control(

			 'aqua_instagram_link', array(
				'label'    => esc_html( 'Instagram Link:', 'aquaparallax' ),
				'section'  => 'aqua_social_section',
				'settings' => 'aqua_instagram_link',
				'type' => 'text',
			)
	);
   	
	/* Linkedin */
	$wp_customize->add_setting('aqua_linked_icon', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );

	$wp_customize->add_control(
		'aqua_linked_icon',
		array(
			'type' => 'checkbox',
			'label' => 'Include linkedin icon',
			'section' => 'aqua_social_section',
		)
	);
	
	/* Linkedin link setting */
	$wp_customize->add_setting( 'aqua_linked_link', array(
		'sanitize_callback' => 'aqua_sanitize_text'
	) );

	$wp_customize->add_control(

			 'aqua_linked_link', array(
				'label'    => esc_html( 'Linkedin Link:', 'aquaparallax' ),
				'section'  => 'aqua_social_section',
				'settings' => 'aqua_linked_link',
				'type' => 'text',
			)
	);
	
	/* Youtube */
	$wp_customize->add_setting('aqua_youtube_icon', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );

	$wp_customize->add_control(
		'aqua_youtube_icon',
		array(
			'type' => 'checkbox',
			'label' => 'Include youtube icon',
			'section' => 'aqua_social_section',
		)
	);
	
	/* Linkedin link setting */
	$wp_customize->add_setting( 'aqua_youtube_link', array(
		'sanitize_callback' => 'aqua_sanitize_text'
	) );

	$wp_customize->add_control(

			 'aqua_youtube_link', array(
				'label'    => esc_html( 'Youtube Link:', 'aquaparallax' ),
				'section'  => 'aqua_social_section',
				'settings' => 'aqua_youtube_link',
				'type' => 'text',
			)
	);
	
// Copyright section
$wp_customize->add_section(
        'aqua_copyright_section',
        array(
            'title' => esc_html( 'Copyright Section', 'aquaparallax' ),
            'description' => esc_html( 'Copyright section.', 'aquaparallax' ),
            'priority' => 50,
        )
    );
	// Copyright text
	$wp_customize->add_setting('aqua_copyright_text', array(
        'sanitize_callback' => 'aqua_sanitize_text'
	) );
    $wp_customize->add_control(
    'aqua_copyright_text',
    array(
        'type' => 'textarea',
        'label' => esc_html( 'Copyright text', 'aquaparallax' ),
        'section' => 'aqua_copyright_section',
		'settings' => 'aqua_copyright_text'
    )
    );		
   	
}
add_action( 'customize_register', 'aqua_customize_register' );

function aqua_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );
}

function aqua_customize_preview_js() {
	wp_enqueue_script( 'aqua_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'aqua_customize_preview_js' );