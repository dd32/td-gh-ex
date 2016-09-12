<?php // Customizer options for Bento


// Extra styles
function bnt_customizer_stylesheet() {
	
	// Stylesheet
	wp_register_style( 'bento-customizer-css', get_template_directory_uri().'/includes/customizer/customizer-styles.css', NULL, NULL, 'all' );
	wp_enqueue_style( 'bento-customizer-css' );
	
	// Extra styles
	wp_add_inline_style( 'bento-customizer-css', bnt_customizer_extra_css() );
	
}

// Add extra CSS
function bnt_customizer_extra_css() {
	$extra_styles = '';
	if ( get_option( 'bnt_ep_license_status' ) != 'valid' ) {
		$extra_styles = '
			#accordion-section-bnt_seo .accordion-section-title:after,
			#accordion-section-bnt_analytics .accordion-section-title:after,
			#accordion-section-bnt_cta_popup .accordion-section-title:after,
			#accordion-section-bnt_preloader .accordion-section-title:after {
				content: "\f511";
				color: #ff8c00;
			}
		';
	}
	return $extra_styles;
}


// Custom scripts
function bnt_customizer_scripts() {
	
	// Enqueue the script file
	wp_enqueue_script( 'bento-customizer-scripts', get_template_directory_uri().'/includes/customizer/customizer-scripts.js', array('jquery'), false, true );
	
	// Passing php variables to admin scripts
	bnt_localize_customizer_scripts();
	
}


// Additional Customizer content
function bnt_localize_customizer_scripts() {
	$bnt_license_status = 'invalid';
	if ( get_option( 'bnt_ep_license_status' ) == 'valid' ) {
		$bnt_license_status = 'valid';
	}
	wp_localize_script( 'bento-customizer-scripts', 'bntCustomizerVars', array(
		'exp' => __( 'Get the Expansion Pack', 'bento' ),
		'review' => __( 'Rate the theme (thanks!)', 'bento' ),
		'license_status' => $bnt_license_status,
	) );
}


// Notification for disabled fields
function bnt_customizer_disabled_field() {
	$exp_url = '<a href="http://satoristudio.net/bento-free-wordpress-theme/#expansion-pack" target="_blank">'.__( 'Expansion Pack', 'bento' ).'</a>';
	$exp_link = '<span class="disabled-exp">' . sprintf( __( 'This option (and much more cool stuff) is available in the %s. Supercharge your Bento!', 'bento' ), $exp_url ) . '</span>';
	if ( get_option( 'bnt_ep_license_status' ) == 'valid' ) {
		$exp_link = '';
	}
	echo $exp_link;
}


// Sanitize copyright field
function bnt_sanitize_copyright( $input ) {
	$allowed_html = array(
		'a' => array(
			'href' => array(),
		),
		'span' => array(),
		'div' => array(),
	);
	$input = wp_kses( $input, $allowed_html );
	return $input;
}


// Sanitize font uploads
function bnt_sanitize_font_uploads( $input ) {
    $output = '';
    $filetype = wp_check_filetype( $input );
	$allowed_types = array( 'image/svg+xml', 'application/x-font-ttf', 'application/x-font-opentype', 'application/font-woff', 'application/vnd.ms-fontobject' );
    $mime_type = $filetype['type'];
    if ( in_array( $mime_type, $allowed_types ) ) {
        $output = $input;
		$output = esc_url($output);
    }
    return $output;
}


// Sanitize checkboxes
function bnt_sanitize_checkboxes( $input ) {
	if ( $input == 1 ) {
        return 1;
    } else {
        return 0;
    }
}


// Sanitize select drop-downs
function bnt_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}


// Controls
function bnt_customize_register( $wp_customize ) {
	
	// Custom copyright control
	class WP_Copyright_Customize_Control extends WP_Customize_Control {
		public $type = 'text_copyright';
		public function render_content() {
			if ( ! empty( $this->label ) ) {
				echo '<span class="customize-control-title">'.esc_html( $this->label ).'</span>';
			}
			if ( ! empty( $this->description ) ) {
				echo '<span class="description customize-control-description">'.$this->description.'</span>';
			}
			bnt_customizer_disabled_field();
			$disabled_field = '';
			if ( get_option( 'bnt_ep_license_status' ) != 'valid' ) {
				$disabled_field = 'disabled';
			}
			echo '<input type="text" value="" '.$disabled_field.' data-customize-setting-link="bnt_footer_copyright">';
		}
	}
	
	// Custom help section
	class WP_Help_Customize_Control extends WP_Customize_Control {
		public $type = 'text_help';
		public function render_content() {
			echo '
				<div class="bnt-customizer-help">
					<a class="bnt-customizer-link bnt-support-link" href="http://satoristudio.net/bento-manual/" target="_blank">
						<span class="dashicons dashicons-book">
						</span>
						'.__( 'View theme manual', 'bento' ).'
					</a>
					<a class="bnt-customizer-link bnt-support-link" href="https://wordpress.org/support/theme/bento/" target="_blank">
						<span class="dashicons dashicons-sos">
						</span>
						'.__( 'Visit support forum', 'bento' ).'
					</a>
					<a class="bnt-customizer-link bnt-support-link" href="https://www.facebook.com/satoristudio.net/" target="_blank">
						<span class="dashicons dashicons-facebook-alt">
						</span>
						'.__( 'Like our Facebook page', 'bento' ).'
					</a>
					<a class="bnt-customizer-link bnt-support-link" href="https://twitter.com/satoristudionet/" target="_blank">
						<span class="dashicons dashicons-twitter">
						</span>
						'.__( 'Follow us on Twitter', 'bento' ).'
					</a>
				</div>
			';
		}
	}
	
	// This feature is available in the EP call
	class WP_EP_Customize_Control extends WP_Customize_Control {
		public $type = 'text_ep';
		public function render_content() {
			$exp_url = '<a href="http://satoristudio.net/bento-free-wordpress-theme/#expansion-pack" target="_blank">'.__( 'Expansion Pack', 'bento' ).'</a>';
			$exp_link = sprintf( __( 'These options (and many more cool features) are available in the %s. Supercharge your Bento!', 'bento' ), $exp_url );
			if ( get_option( 'bnt_ep_license_status' ) == 'valid' ) {
				$exp_link = '';
			}
			echo '
				<div class="bnt-customizer-ep-cta">
					'.$exp_link.'
				</div>
			';
		}
	}
	
	// Theme support
	
	$wp_customize->add_section( 
		'bnt_theme_support', 
		array(
			'title' => __( 'Bento Help', 'bento' ),
			'priority' => 19,
		) 
	);
	
	$wp_customize->add_setting( 
		'bnt_support', 
		array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		new WP_Help_Customize_Control(
		$wp_customize,
		'bnt_support', 
			array(
				'section' => 'bnt_theme_support',
				'type' => 'text_help',
			)
		)
	);
	
	// Site Identity
	
	$wp_customize->add_setting( 
		'bnt_footer_copyright', 
		array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'bnt_sanitize_copyright',
		)
	);
	$wp_customize->add_control(
		new WP_Copyright_Customize_Control(
		$wp_customize,
		'bnt_footer_copyright', 
			array(
				'section' => 'title_tagline',
				'priority' => 4,
				'type' => 'text_copyright',
				'label' => __( 'Customize the copyright message in the footer', 'bento' ),
				'description' => __( 'Use this field to add your own message instead of the theme link in the footer.', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_logo_mobile', 
		array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Media_Control( 
			$wp_customize, 
			'bnt_logo_mobile', 
			array(
				'section' => 'title_tagline',
				'priority' => 9,
				'mime_type' => 'image',
				'label' => __( 'Logo for mobile devices (optional)', 'bento' ),
				'description' => __( 'Upload the image to be used as the logo on smartphones and tablets (i.e. all devices with screens smaller than 1280px). Leave this blank to use the default logo above.', 'bento' ),
			) 
		) 
	);
	
	// Site Elements
	
	$wp_customize->add_section( 
		'bnt_site_elements', 
		array(
			'title' => __( 'Website Elements', 'bento' ),
			'priority' => 21,
		) 
	);
	
	$wp_customize->add_setting( 
		'bnt_author_meta', 
		array(
			'type' => 'theme_mod',
			'default' => 0,
			'sanitize_callback' => 'bnt_sanitize_checkboxes',
		)
	);
	$wp_customize->add_control( 
		'bnt_author_meta', 
		array(
			'section' => 'bnt_site_elements',
			'type' => 'checkbox',
			'label' => __( 'Hide author block below posts', 'bento' ),
			'description' => __( 'Check this option to stop displaying the author information in blog posts, below the content.', 'bento' ),
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_ajax_pagination', 
		array(
			'type' => 'theme_mod',
			'default' => 0,
			'sanitize_callback' => 'bnt_sanitize_checkboxes',
		)
	);
	$wp_customize->add_control( 
		'bnt_ajax_pagination', 
		array(
			'section' => 'bnt_site_elements',
			'type' => 'checkbox',
			'label' => __( 'Load posts on the same page in blog', 'bento' ),
			'description' => __( 'Enable this to replace the standard blog pagination with a "Load more" button that does not reload the page.', 'bento' ),
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_fixed_header', 
		array(
			'type' => 'theme_mod',
			'default' => 0,
			'sanitize_callback' => 'bnt_sanitize_checkboxes',
		)
	);
	$wp_customize->add_control( 
		'bnt_fixed_header', 
		array(
			'section' => 'bnt_site_elements',
			'type' => 'checkbox',
			'label' => __( 'Fix header on top of page on scroll', 'bento' ),
			'description' => __( 'Check this option if you wish to fix the header to the top of the screen while the website is being scrolled.', 'bento' ),
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_mobile_menu_submenus', 
		array(
			'type' => 'theme_mod',
			'default' => 0,
			'sanitize_callback' => 'bnt_sanitize_checkboxes',
		)
	);
	$wp_customize->add_control( 
		'bnt_mobile_menu_submenus', 
		array(
			'section' => 'bnt_site_elements',
			'type' => 'checkbox',
			'label' => __( 'Hide submenu items in mobile menu', 'bento' ),
			'description' => __( 'Check this option to only display top-level items in the mobile menu.', 'bento' ),
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_wc_shop_number_items', 
		array(
			'type' => 'theme_mod',
			'default' => 12,
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( 
		'bnt_wc_shop_number_items', 
		array(
			'section' => 'bnt_site_elements',
			'type' => 'number',
			'input_attrs' => array(
				'min' => 1,
				'max' => 999,
				'step' => 1,
			),
			'active_callback' => 'bnt_woo_active',
			'label' => __( 'Number of products per shop page (WooCommerce only)', 'bento' ),
			'description' => __( 'Indicate the number of products to be displayed per page in the WooCommerce shop page; default is 12. Note that the WooCommerce plugin is not part of the theme needs to be installed separately.', 'bento' ),
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_wc_shop_columns', 
		array(
			'type' => 'theme_mod',
			'default' => 4,
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( 
		'bnt_wc_shop_columns', 
		array(
			'section' => 'bnt_site_elements',
			'type' => 'number',
			'input_attrs' => array(
				'min' => 1,
				'max' => 6,
				'step' => 1,
			),
			'active_callback' => 'bnt_woo_active',
			'label' => __( 'Number of columns on the shop page (WooCommerce only)', 'bento' ),
			'description' => __( 'Input the number of columns for the WooCommerce shop page; default is 4; Note that the WooCommerce plugin is not part of the theme needs to be installed separately.', 'bento' ),
		)
	);
	
	// Layout and Background
	
	$wp_customize->add_section( 
		'bnt_layout_background', 
		array(
			'title' => __( 'Layout and Background', 'bento' ),
			'priority' => 23,
		) 
	);
	
	$wp_customize->add_setting( 
		'bnt_content_width', 
		array(
			'type' => 'theme_mod',
			'default' => '1080',
			'sanitize_callback' => 'bnt_sanitize_choices',
		)
	);
	$wp_customize->add_control( 
		'bnt_content_width', 
		array(
			'section' => 'bnt_layout_background',
			'type' => 'select',
			'choices' => array( 
				'900' => '900',
				'960' => '960', 
				'1020' => '1020',
				'1080' => __( '1080 (default)', 'bento' ),
				'1140' => '1140',
				'1200' => '1200',
				'1260' => '1260',
				'1320' => '1320'
			),
			'label' => __( 'Content width', 'bento' ),
			'description' => __( 'Set the width of the content container, in pixels; default is 1080.', 'bento' ),
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_website_layout', 
		array(
			'type' => 'theme_mod',
			'default' => 0, 
			'sanitize_callback' => 'bnt_sanitize_choices',
		)
	);
	$wp_customize->add_control( 
		'bnt_website_layout', 
		array(
			'section' => 'bnt_layout_background',
			'type' => 'select',
			'choices' => array( 
				__( 'Wide (default)', 'bento' ), 
				__( 'Boxed', 'bento' ) 
			),
			'label' => __( 'Website layout', 'bento' ),
			'description' => __( 'Choose the layout of the website: - "wide" means that the full-width elements such as the header will stretch the entire width of the browser window (this is default). - "boxed" means that the website will be restricted to a maximum width and there will be space left between the content and the sides of the browser window.', 'bento' ),
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_website_background', 
		array(
			'type' => 'theme_mod',
			'default' => 0,
			'sanitize_callback' => 'bnt_sanitize_choices',
		)
	);
	$wp_customize->add_control( 
		'bnt_website_background', 
		array(
			'section' => 'bnt_layout_background',
			'type' => 'select',
			'choices' => array( 
				__( 'Solid color (default)', 'bento' ), 
				__( 'Repeated texture', 'bento' ),
				__( 'Full-size image', 'bento' )
			),
			'label' => __( 'Boxed layout: website background', 'bento' ),
			'description' => __( 'Choose the type of background for the boxed website layout; default is solid color.', 'bento' ),
		) 
	);
	
	$wp_customize->add_setting( 
		'bnt_website_background_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#e6e6e6',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_website_background_color', 
			array(
				'section' => 'bnt_layout_background',
				'label' => __( 'Boxed layout: website background color', 'bento' ),
				'description' => __( 'Choose the background color for the outer parts of the boxed website; default is #e6e6e6 (light-grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_website_background_texture', 
		array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Media_Control(
			$wp_customize,
			'bnt_website_background_texture', 
			array(
				'section' => 'bnt_layout_background',
				'mime_type' => 'image',
				'label' => __( 'Boxed layout: website background texture', 'bento' ),
				'description' => __( 'Upload the image to serve as the repeating texture for the outer parts of the boxed website.', 'bento' ),
			) 
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_website_background_image', 
		array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Media_Control(
			$wp_customize,
			'bnt_website_background_image', 
			array(
				'section' => 'bnt_layout_background',
				'mime_type' => 'image',
				'label' => __( 'Boxed layout: website background image', 'bento' ),
				'description' => __( 'Upload the image to serve as the full-width background for the outer parts of the boxed website.', 'bento' ),
			) 
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_menu_config', 
		array(
			'type' => 'theme_mod',
			'default' => 0,
			'sanitize_callback' => 'bnt_sanitize_choices',
		)
	);
	$wp_customize->add_control( 
		'bnt_menu_config', 
		array(
			'section' => 'bnt_layout_background',
			'type' => 'select',
			'choices' => array( 
				__( 'Top, right-aligned (default)', 'bento' ),
				__( 'Top, centered', 'bento' ),
				__( 'Top, hamburger button + overlay', 'bento' ),
				__( 'Left side', 'bento' ),
			),
			'label' => __( 'Menu layout', 'bento' ),
			'description' => __( 'Choose the way the primary menu is displayed: - "top, right-aligned" is the classic header with menu on the right (this is default); "top, centered" makes the menu and the logo align to the center of the header, "top, hamburger button" hides the menu behind a mobile-style three-line icon which displays a full-page overlay menu when clicked - suitable for websites with simple and non-hierarchical navigation structure; "left side" displays the menu and the logo to the left of the content area, as a separate section.', 'bento' ),
		) 
	);
	
	// Fonts and Typography
	
	$wp_customize->add_section( 
		'bnt_fonts', 
		array(
			'title' => __( 'Fonts and Typography', 'bento' ),
			'priority' => 24,
		) 
	);
	
	$fonts_url = '<a href="http://www.google.com/webfonts" style="color:#999;" target="_blank">http://www.google.com/webfonts</a>';
	
	$wp_customize->add_setting( 
		'bnt_font_body', 
		array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 
		'bnt_font_body', 
		array(
			'section' => 'bnt_fonts',
			'type' => 'text',
			'label' => __( 'Body font (Google Fonts)', 'bento' ),
			'description' => sprintf( __( 'Input Google Font name for the body font, e.g. Open Sans, exactly as spelled in the Google Fonts directory. You can preview Google Fonts here: %s; Default is Open Sans.', 'bento' ), $fonts_url ),
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_font_body_upload', 
		array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'bnt_sanitize_font_uploads',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Upload_Control(
			$wp_customize,
			'bnt_font_body_upload', 
			array(
				'section' => 'bnt_fonts',
				'label' => __( 'Body font (Upload your own)', 'bento' ),
				'description' => __( 'Upload the font file to be used as body font; you can use .ttf, .otf, .woff and .eot file formats. This overrides the previous setting.', 'bento' ),
			) 
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_text_size_body', 
		array(
			'type' => 'theme_mod',
			'default' => 14,
			'sanitize_callback' => 'bnt_sanitize_choices',
		)
	);
	$wp_customize->add_control( 
		'bnt_text_size_body', 
		array(
			'section' => 'bnt_fonts',
			'type' => 'select',
			'choices' => array( 
				12 => '12',
				13 => '13', 
				14 => __( '14 (default)', 'bento' ),
				16 => '16',
				18 => '18',
				20 => '20',
				24 => '24',
			),
			'label' => __( 'Body text size', 'bento' ),
			'description' => __( 'Choose the font size for the body text; default is 14px.', 'bento' ),
		) 
	);
	
	$wp_customize->add_setting( 
		'bnt_font_headings', 
		array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 
		'bnt_font_headings', 
		array(
			'section' => 'bnt_fonts',
			'type' => 'text',
			'label' => __( 'Headings font (Google Fonts)', 'bento' ),
			'description' => sprintf( __( 'Input Google Font name for the headings font, e.g. Open Sans, exactly as spelled in the Google Fonts directory. You can preview Google Fonts here: %s; Default is Open Sans.', 'bento' ), $fonts_url ),
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_font_headings_upload', 
		array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'bnt_sanitize_font_uploads',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Upload_Control(
			$wp_customize,
			'bnt_font_headings_upload', 
			array(
				'section' => 'bnt_fonts',
				'label' => __( 'Headings font (Upload your own)', 'bento' ),
				'description' => __( 'Upload the font file to be used as headings font; you can use .ttf, .otf, .woff and .eot file formats. This overrides the previous setting.', 'bento' ),
			) 
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_font_menu', 
		array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 
		'bnt_font_menu', 
		array(
			'section' => 'bnt_fonts',
			'type' => 'text',
			'label' => __( 'Menu font (Google Fonts)', 'bento' ),
			'description' => sprintf( __( 'Input Google Font name for the menu font, e.g. Montserrat, exactly as spelled in the Google Fonts directory. You can preview Google Fonts here: %s; Default is Montserrat.', 'bento' ), $fonts_url ),
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_font_menu_upload', 
		array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'bnt_sanitize_font_uploads',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Upload_Control(
			$wp_customize,
			'bnt_font_menu_upload', 
			array(
				'section' => 'bnt_fonts',
				'label' => __( 'Menu font (Upload your own)', 'bento' ),
				'description' => __( 'Upload the font file to be used as menu font; you can use .ttf, .otf, .woff and .eot file formats. This overrides the previous setting.', 'bento' ),
			) 
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_text_size_menu', 
		array(
			'type' => 'theme_mod',
			'default' => 14,
			'sanitize_callback' => 'bnt_sanitize_choices',
		)
	);
	$wp_customize->add_control( 
		'bnt_text_size_menu', 
		array(
			'section' => 'bnt_fonts',
			'type' => 'select',
			'choices' => array( 
				12 => '12',
				13 => '13', 
				14 => __( '14 (default)', 'bento' ),
				16 => '16',
				18 => '18',
				20 => '20',
				24 => '24',
			),
			'label' => __( 'Menu text size', 'bento' ),
			'description' => __( 'Choose the font size for the menu text; default is 14px.', 'bento' ),
		) 
	);
	
	$wp_customize->add_setting( 
		'bnt_sentence_case_menu', 
		array(
			'type' => 'theme_mod',
			'default' => 0,
			'sanitize_callback' => 'bnt_sanitize_checkboxes',
		)
	);
	$wp_customize->add_control( 
		'bnt_sentence_case_menu', 
		array(
			'section' => 'bnt_fonts',
			'type' => 'checkbox',
			'label' => __( 'Remove uppercase from menu text', 'bento' ),
			'description' => __( 'Check this option to render the menu items in sentence case (normal caps).', 'bento' ),
		)
	);
	
	// Header Colors
	
	$wp_customize->add_section( 
		'bnt_colors_header', 
		array(
			'title' => __( 'Header Colors', 'bento' ),
			'priority' => 25,
		) 
	);
	
	$wp_customize->add_setting( 
		'bnt_header_background_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_header_background_color', 
			array(
				'section' => 'bnt_colors_header',
				'label' => __( 'Header background color', 'bento' ),
				'description' => __( 'Choose the background color for the top section of the website; default is #ffffff (white).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_primary_menu_background', 
		array(
			'type' => 'theme_mod',
			'default' => '#eeeeee',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_primary_menu_background', 
			array(
				'section' => 'bnt_colors_header',
				'label' => __( 'Primary menu: background color', 'bento' ),
				'description' => __( 'Choose the background color of the overlay menu; default is #eeeeee (light-grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_primary_menu_text_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#333333',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_primary_menu_text_color', 
			array(
				'section' => 'bnt_colors_header',
				'label' => __( 'Primary menu: text color', 'bento' ),
				'description' => __( 'Choose the text color for the main navigation menu; this will also apply to mobile menu text color by default, if nothing is chosen in the respective option below; default is #333333 (dark-grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_primary_menu_text_hover_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#00B285',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_primary_menu_text_hover_color', 
			array(
				'section' => 'bnt_colors_header',
				'label' => __( 'Primary menu: text color on hover', 'bento' ),
				'description' => __( 'Choose which color menu items become on mouse hover; default is #00b285 (blue-green).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_menu_separators', 
		array(
			'type' => 'theme_mod',
			'default' => '#eeeeee',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_menu_separators', 
			array(
				'section' => 'bnt_colors_header',
				'label' => __( 'Primary menu: item separators', 'bento' ),
				'description' => __( 'Choose the color for the separator lines in the primary menu; default is #eeeeee (light-grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_primary_menu_submenu_background_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#dddddd',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_primary_menu_submenu_background_color', 
			array(
				'section' => 'bnt_colors_header',
				'label' => __( 'Primary menu: submenu background color', 'bento' ),
				'description' => __( 'Choose the background color for the submenus; this will also apply to mobile menu background color by default, if nothing is chosen in the respective option below; default is #dddddd (grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_primary_menu_submenu_background_hover_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#cccccc',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_primary_menu_submenu_background_hover_color', 
			array(
				'section' => 'bnt_colors_header',
				'label' => __( 'Primary menu: submenu background color on hover', 'bento' ),
				'description' => __( 'Choose the color used as a background for submenu items on mouse hover; this will also apply to mobile menu hover background color by default, if nothing is chosen in the respective option below; default is #cccccc (grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_primary_menu_submenu_border_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#cccccc',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_primary_menu_submenu_border_color', 
			array(
				'section' => 'bnt_colors_header',
				'label' => __( 'Primary menu: submenu border color', 'bento' ),
				'description' => __( 'Choose the color of submenu item borders; this will also apply to mobile menu border color by default, if nothing is chosen in the respective option below; default is #cccccc (grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_primary_menu_submenu_text_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#333333',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_primary_menu_submenu_text_color', 
			array(
				'section' => 'bnt_colors_header',
				'label' => __( 'Primary menu: submenu text color', 'bento' ),
				'description' => __( 'Choose the text color for the submenus; default is #333333 (dark-grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_primary_menu_submenu_text_hover_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#333333',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_primary_menu_submenu_text_hover_color', 
			array(
				'section' => 'bnt_colors_header',
				'label' => __( 'Primary menu: submenu text color on hover', 'bento' ),
				'description' => __( 'Choose the mouse-hover text color for the submenus; default is #333333 (dark-grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_mobile_menu_background_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#dddddd',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_mobile_menu_background_color', 
			array(
				'section' => 'bnt_colors_header',
				'label' => __( 'Mobile menu: background color', 'bento' ),
				'description' => __( 'Choose the background color for the mobile menu; default is #dddddd (light-grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_mobile_menu_background_hover_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#cccccc',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_mobile_menu_background_hover_color', 
			array(
				'section' => 'bnt_colors_header',
				'label' => __( 'Mobile menu: background color on hover', 'bento' ),
				'description' => __( 'Choose the background color on hover; default is #cccccc (light-grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_mobile_menu_border_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#cccccc',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_mobile_menu_border_color', 
			array(
				'section' => 'bnt_colors_header',
				'label' => __( 'Mobile menu: border color', 'bento' ),
				'description' => __( 'Choose the border color for the mobile menu; default is #cccccc (light-grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_mobile_menu_text_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#333333',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_mobile_menu_text_color', 
			array(
				'section' => 'bnt_colors_header',
				'label' => __( 'Mobile menu: text color', 'bento' ),
				'description' => __( 'Choose the text color for the mobile menu; default is #333333 (dark-grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_mobile_menu_text_hover_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#333333',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_mobile_menu_text_hover_color', 
			array(
				'section' => 'bnt_colors_header',
				'label' => __( 'Mobile menu: text color on hover', 'bento' ),
				'description' => __( 'Choose the text color on mouse hover for the mobile menu; default is #333333 (dark-grey).', 'bento' ),
			)
		)
	);
	
	// Content Colors
	
	$wp_customize->add_section( 
		'bnt_colors_content', 
		array(
			'title' => __( 'Content Colors', 'bento' ),
			'priority' => 26,
		) 
	);
	
	$wp_customize->add_setting( 
		'bnt_content_background_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#f4f4f4',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_content_background_color', 
			array(
				'section' => 'bnt_colors_content',
				'label' => __( 'Content area background color', 'bento' ),
				'description' => __( 'Choose the background color for the main content area of the website; default is #f4f4f4 (light-grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_content_heading_text_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#333333',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_content_heading_text_color', 
			array(
				'section' => 'bnt_colors_content',
				'label' => __( 'Heading color', 'bento' ),
				'description' => __( 'Choose the color of headings throughout the website; default is #333333 (dark-grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_content_body_text_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#333333',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_content_body_text_color', 
			array(
				'section' => 'bnt_colors_content',
				'label' => __( 'Body text color', 'bento' ),
				'description' => __( 'Choose the primary text color for the body of the website; default is #333333 (dark-grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_content_link_text_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#00b285',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_content_link_text_color', 
			array(
				'section' => 'bnt_colors_content',
				'label' => __( 'Link text color', 'bento' ),
				'description' => __( 'Choose the color for the link text throughout the website; default is #00b285 (blue-green).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_content_meta_text_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#999999',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_content_meta_text_color', 
			array(
				'section' => 'bnt_colors_content',
				'label' => __( 'Meta text color', 'bento' ),
				'description' => __( 'Pick the color for meta content such as post dates, comment counts, and post counts; default is #999999 (grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_content_delimiter_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#dddddd',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_content_delimiter_color', 
			array(
				'section' => 'bnt_colors_content',
				'label' => __( 'Delimiter line color', 'bento' ),
				'description' => __( 'Choose the color for delimiter lines, e.g. before comments, in sidebar widgets and in the shopping cart; also applies to in-text tables; default is #dddddd (light-grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_content_input_background_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#e4e4e4',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_content_input_background_color', 
			array(
				'section' => 'bnt_colors_content',
				'label' => __( 'Input fields: background color', 'bento' ),
				'description' => __( 'Choose the background color for input fields, such as comments and search; default is #e4e4e4 (light-grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_content_input_text_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#333333',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_content_input_text_color', 
			array(
				'section' => 'bnt_colors_content',
				'label' => __( 'Input fields: text color', 'bento' ),
				'description' => __( 'Choose the color for the text typed into input fields, such as comment forms; default is #333333 (dark-grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_content_input_placeholder_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#aaaaaa',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_content_input_placeholder_color', 
			array(
				'section' => 'bnt_colors_content',
				'label' => __( 'Input fields: placeholder text color', 'bento' ),
				'description' => __( 'Choose the placeholder text color for input fields, i.e. the text that appears in empty fields; default is #aaaaaa (grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_content_button_background_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#00b285',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_content_button_background_color', 
			array(
				'section' => 'bnt_colors_content',
				'label' => __( 'Buttons color', 'bento' ),
				'description' => __( 'Choose the color for buttons throughout the website; default is #00b285 (blue-green).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_content_button_hover_background_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#00906c',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_content_button_hover_background_color', 
			array(
				'section' => 'bnt_colors_content',
				'label' => __( 'Button color on hover', 'bento' ),
				'description' => __( 'Choose the color for buttons on mouse hover; default is #00906c (dark blue-green).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_content_button_text_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_content_button_text_color', 
			array(
				'section' => 'bnt_colors_content',
				'label' => __( 'Button text color', 'bento' ),
				'description' => __( 'Choose the color for button text; default is #ffffff (white).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_content_button_text_hover_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_content_button_text_hover_color', 
			array(
				'section' => 'bnt_colors_content',
				'label' => __( 'Button text color on hover', 'bento' ),
				'description' => __( 'Choose the color for button text on mouse hover; default is #ffffff (white).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_content_secondary_button_background_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#999999',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_content_secondary_button_background_color', 
			array(
				'section' => 'bnt_colors_content',
				'label' => __( 'Secondary button color', 'bento' ),
				'description' => __( 'Choose the color for secondary buttons, mainly for WooCommerce plugin, e.g. "update basket" and "apply coupon"; default is #999999 (grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_content_secondary_button_hover_background_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#777777',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_content_secondary_button_hover_background_color', 
			array(
				'section' => 'bnt_colors_content',
				'label' => __( 'Secondary button color on hover', 'bento' ),
				'description' => __( 'Choose the color for secondary buttons on mouse hover; default is #777777 (grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_content_secondary_button_text_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_content_secondary_button_text_color', 
			array(
				'section' => 'bnt_colors_content',
				'label' => __( 'Secondary button text color', 'bento' ),
				'description' => __( 'Choose the text color for secondary buttons, mainly for WooCommerce plugin, e.g. "update basket" and "apply coupon"; default is #ffffff (white).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_content_secondary_button_text_hover_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_content_secondary_button_text_hover_color', 
			array(
				'section' => 'bnt_colors_content',
				'label' => __( 'Secondary button text color on hover', 'bento' ),
				'description' => __( 'Choose the text color for secondary buttons on mouse hover; default is #ffffff (white).', 'bento' ),
			)
		)
	);
	
	// Footer Colors
	
	$wp_customize->add_section( 
		'bnt_colors_footer', 
		array(
			'title' => __( 'Footer Colors', 'bento' ),
			'priority' => 27,
		) 
	);
	
	$wp_customize->add_setting( 
		'bnt_footer_widgets_background_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#888888',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_footer_widgets_background_color', 
			array(
				'section' => 'bnt_colors_footer',
				'label' => __( 'Footer widget area background color', 'bento' ),
				'description' => __( 'Choose the background color for the footer widget area; default is #888888 (grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_footer_text_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#cccccc',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_footer_text_color', 
			array(
				'section' => 'bnt_colors_footer',
				'label' => __( 'Footer text color', 'bento' ),
				'description' => __( 'Choose the text color for the footer; default is #cccccc (light-grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_footer_link_text_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_footer_link_text_color', 
			array(
				'section' => 'bnt_colors_footer',
				'label' => __( 'Footer link color', 'bento' ),
				'description' => __( 'Choose the color for links in the footer; default is #ffffff (white).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_footer_meta_text_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#aaaaaa',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_footer_meta_text_color', 
			array(
				'section' => 'bnt_colors_footer',
				'label' => __( 'Footer meta text color', 'bento' ),
				'description' => __( 'Choose the color meta text, such as dates and post counts, in the footer; default is #aaaaaa (light-grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_footer_delimiter_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#999999',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_footer_delimiter_color', 
			array(
				'section' => 'bnt_colors_footer',
				'label' => __( 'Footer delimiter text color', 'bento' ),
				'description' => __( 'Choose the color for delimiter lines in the footer widgets; default is #999999 (light-grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_footer_bottom_background_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#666666',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_footer_bottom_background_color', 
			array(
				'section' => 'bnt_colors_footer',
				'label' => __( 'Bottom footer background color', 'bento' ),
				'description' => __( 'Choose the background color for the bottom part of the footer containing the optional footer menu and the copyright information; default is #666666 (grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_footer_bottom_text_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#cccccc',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_footer_bottom_text_color', 
			array(
				'section' => 'bnt_colors_footer',
				'label' => __( 'Bottom footer: text color', 'bento' ),
				'description' => __( 'Choose the color for the bottom footer text; default is #cccccc (light-grey).', 'bento' ),
			)
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_footer_bottom_link_text_color', 
		array(
			'type' => 'theme_mod',
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'bnt_footer_bottom_link_text_color', 
			array(
				'section' => 'bnt_colors_footer',
				'label' => __( 'Bottom footer: link color', 'bento' ),
				'description' => __( 'Choose the color for links in the bottom footer area; default is #ffffff (white).', 'bento' ),
			)
		)
	);
	
	// Custom CSS
	
	$wp_customize->add_section( 
		'bnt_custom_css', 
		array(
			'title' => __( 'Custom CSS', 'bento' ),
			'priority' => 28,
		) 
	);
	
	$wp_customize->add_setting( 
		'bnt_custom_css', 
		array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		)
	);
	$wp_customize->add_control( 
		'bnt_custom_css', 
		array(
			'section' => 'bnt_custom_css',
			'type' => 'textarea',
			'label' => __( 'Custom Styles', 'bento' ),
			'description' => __( 'Enter any custom CSS here to apply to the website.', 'bento' ),
		)
	);
	
	// SEO Settings
	
	$wp_customize->add_section( 
		'bnt_seo', 
		array(
			'title' => __( 'SEO Settings', 'bento' ),
			'priority' => 29,
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_ep_seo_upg', 
		array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		new WP_EP_Customize_Control(
		$wp_customize,
		'bnt_ep_seo_upg', 
			array(
				'section' => 'bnt_seo',
				'type' => 'text_ep',
			)
		)
	);
	
	// Analytics code
	
	$wp_customize->add_section( 
		'bnt_analytics', 
		array(
			'title' => __( 'Analytics Code', 'bento' ),
			'priority' => 30,
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_ep_analytics_upg', 
		array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		new WP_EP_Customize_Control(
		$wp_customize,
		'bnt_ep_analytics_upg', 
			array(
				'section' => 'bnt_analytics',
				'type' => 'text_ep',
			)
		)
	);
	
	// Call to action popup
	
	$wp_customize->add_section( 
		'bnt_cta_popup', 
		array(
			'title' => __( 'Call to Action Popup', 'bento' ),
			'priority' => 31,
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_ep_popup_upg', 
		array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		new WP_EP_Customize_Control(
		$wp_customize,
		'bnt_ep_popup_upg', 
			array(
				'section' => 'bnt_cta_popup',
				'type' => 'text_ep',
			)
		)
	);
	
	// Preloader
	
	$wp_customize->add_section( 
		'bnt_preloader', 
		array(
			'title' => __( 'Preloader', 'bento' ),
			'priority' => 32,
		)
	);
	
	$wp_customize->add_setting( 
		'bnt_ep_preloader_upg', 
		array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control(
		new WP_EP_Customize_Control(
		$wp_customize,
		'bnt_ep_preloader_upg', 
			array(
				'section' => 'bnt_preloader',
				'type' => 'text_ep',
			)
		)
	);

}


// Insert CSS from settings
function bnt_customizer_css() {
	
	$customizer_css = '';
	
	// Theme Options: Layout and Background tab
	$bnt_content_width_med_px = (int) get_theme_mod( 'bnt_content_width' );
	$bnt_content_width_med_rem = $bnt_content_width_med_px / 10;
	$bnt_content_width_hi_px = $bnt_content_width_med_px + 360;
	$bnt_content_width_hi_rem = $bnt_content_width_hi_px / 10;
	$bnt_box_width_med_px = $bnt_box_width_med_rem = $bnt_box_width_hi_px = $bnt_box_width_hi_rem = 'none';
	$bnt_box_width_med_px = $bnt_content_width_med_px + 80;
	$bnt_box_width_med_rem = $bnt_box_width_med_px / 10;
	$bnt_box_width_hi_px = $bnt_content_width_hi_px + 120;
	$bnt_box_width_hi_rem = $bnt_box_width_hi_px / 10;
	$customizer_css .= '
		@media screen and (min-width: 80em) {
			.bnt-container {
				max-width: '.$bnt_content_width_med_px.'px;
				max-width: '.$bnt_content_width_med_rem.'rem;
			}
		}
		@media screen and (min-width: 120em) {
			.bnt-container {
				max-width: '.$bnt_content_width_hi_px.'px;
				max-width: '.$bnt_content_width_hi_rem.'rem;
			}
		}
	';
	if ( get_theme_mod( 'bnt_website_layout' ) == 1 ) {
		$customizer_css .= '
			@media screen and (min-width: 80em) {
				.site-wrapper {
					max-width: '.$bnt_box_width_med_px.'px;
					max-width: '.$bnt_box_width_med_rem.'rem;
				}
			}
			@media screen and (min-width: 120em) {
				.site-wrapper {
					max-width: '.$bnt_box_width_hi_px.'px;
					max-width: '.$bnt_box_width_hi_rem.'rem;
				}
			}
		';
		if ( get_theme_mod( 'bnt_website_background' ) == 1 && get_theme_mod( 'bnt_website_background_texture' ) != '' ) {
			$website_background_texture_id = get_theme_mod( 'bnt_website_background_texture' );
			$website_background_texture_image = wp_get_attachment_image_src( $website_background_texture_id , 'full' );
			$website_background_texture = $website_background_texture_image[0];
			$customizer_css .= '
				body {
					background-image: url('.$website_background_texture.');
					background-repeat: repeat;
				}
			';
		} elseif ( get_theme_mod( 'bnt_website_background' ) == 2 && get_theme_mod( 'bnt_website_background_image' ) != '' ) {
			$website_background_image_id = get_theme_mod( 'bnt_website_background_image' );
			$website_background_image_image = wp_get_attachment_image_src( $website_background_image_id , 'full' );
			$website_background_image = $website_background_image_image[0];
			$customizer_css .= '
				body {
					background-image: url('.$website_background_image.');
					background-repeat: no-repeat;
					background-position: center center;
					background-size: cover;
				}
			';
		} else {
			$customizer_css .= '
				body {
					background-color: '.get_theme_mod( 'bnt_website_background_color' ).';
				}
			';
		}
	}
	if ( get_theme_mod( 'bnt_menu_config' ) == 2 ) {
		$customizer_css .= '
			.header-menu {
				background-color: '.get_theme_mod( 'bnt_primary_menu_background' ).';
			}
		';
	} else if ( get_theme_mod( 'bnt_menu_config' ) == 3 ) {
		$customizer_css .= '
			@media screen and (min-width: 48em) {
				.header-side .primary-menu > li,
				.header-side .primary-menu .sub-menu, 
				.header-side .primary-menu .sub-menu li {
					border-color: '.get_theme_mod( 'bnt_menu_separators' ).';
				}
				.header-side .primary-menu .sub-menu li a:hover {
					color: '.get_theme_mod( 'bnt_primary_menu_text_hover_color' ).';
				}
				.header-side .primary-menu .sub-menu li, 
				.header-side #nav-mobile {
					background-color: transparent;
				}
			}
		';
	}
	
	// Theme Options: Fonts and Typography tab
	$bnt_font_face_body = $bnt_font_face_headings = $bnt_font_face_menu = '';
	$bnt_body_font = $bnt_headings_font = 'Open Sans';
	$bnt_menu_font = 'Montserrat';
	$bnt_body_text_size = $bnt_menu_text_size = 14;
	if ( get_theme_mod( 'bnt_font_body_upload' ) != '' ) {
		$bnt_font_face_body = '
			@font-face {
				font-family: bodyFont;
				src: url('.get_theme_mod( 'bnt_font_body_upload' ).');
			}
		';
		$bnt_body_font = 'bodyFont';
	} else if ( get_theme_mod( 'bnt_font_body' ) != '' ) {
		$bnt_body_font = get_theme_mod( 'bnt_font_body' );
	}
	if ( get_theme_mod( 'bnt_font_headings_upload' ) != '' ) {
		$bnt_font_face_headings = '
			@font-face {
				font-family: headingsFont;
				src: url('.get_theme_mod( 'bnt_font_headings_upload' ).');
			}
		';
		$bnt_headings_font = 'headingsFont';
	} else if ( get_theme_mod( 'bnt_font_headings' ) != '' ) {
		$bnt_headings_font = get_theme_mod( 'bnt_font_headings' );
	}
	if ( get_theme_mod( 'bnt_font_menu_upload' ) != '' ) {
		$bnt_font_face_menu = '
			@font-face {
				font-family: menuFont;
				src: url('.get_theme_mod( 'bnt_font_menu_upload' ).');
			}
		';
		$bnt_menu_font = 'menuFont';
	} else if ( get_theme_mod( 'bnt_font_menu' ) != '' ) {
		$bnt_menu_font = get_theme_mod( 'bnt_font_menu' );
	}
	if ( get_theme_mod( 'bnt_text_size_body' ) != 14 ) {
		$bnt_body_text_size = get_theme_mod( 'bnt_text_size_body' );
	}
	if ( get_theme_mod( 'bnt_text_size_menu' ) != 14 ) {
		$bnt_menu_text_size = get_theme_mod( 'bnt_text_size_menu' );
	}
	$bnt_body_text_size_em = $bnt_body_text_size / 10;
	$bnt_menu_text_size_rem = $bnt_menu_text_size / 10;
	if ( get_theme_mod( 'bnt_menu_config' ) == 3 ) {
		$bnt_menu_parent_after = ( $bnt_menu_text_size_rem * 2 + 2 ) / 1.2;
	} else {
		$bnt_menu_parent_after = $bnt_menu_text_size_rem * 6 / 1.2;
	}
	$customizer_css .= 
		$bnt_font_face_body.
		$bnt_font_face_headings.
		$bnt_font_face_menu.'
		body {
			font-family: '.$bnt_body_font.', Arial, sans-serif;
			font-size: '.$bnt_body_text_size.'px;
			font-size: '.$bnt_body_text_size_em.'em;
		}
		.site-content h1, 
		.site-content h2, 
		.site-content h3, 
		.site-content h4, 
		.site-content h5, 
		.site-content h6,
		.post-header-title h1 {
			font-family: '.$bnt_headings_font.', Arial, sans-serif;
		}
		#nav-primary {
			font-family: '.$bnt_menu_font.', Arial, sans-serif;
		}
		.primary-menu > li > a {
			font-size: '.$bnt_menu_text_size.'px;
			font-size: '.$bnt_menu_text_size_rem.'rem;
		}
		.primary-menu > .menu-item-has-children > a:after {
			line-height: '.$bnt_menu_parent_after.';
		}
	';
	if ( get_theme_mod( 'bnt_sentence_case_menu' ) == 1 ) {
		$customizer_css .= '
			#nav-primary {
				text-transform: none;
			}
		';
	}
	
	// Theme Options: Header Colors tab
	$customizer_css .= '
		.site-header,
		.header-default .site-header.fixed-header,
		.header-side .site-wrapper {
			background: '.get_theme_mod( 'bnt_header_background_color' ).';
		}
		.primary-menu > li > .sub-menu {
			border-top-color: '.get_theme_mod( 'bnt_header_background_color' ).';
		}
		.primary-menu > li > a,
		#nav-mobile li a,
		.mobile-menu-trigger,
		.mobile-menu-close,
		.ham-menu-close {
			color: '.get_theme_mod( 'bnt_primary_menu_text_color' ).';
		}
		.primary-menu > li > a:hover,
		.primary-menu > li.current-menu-item > a,
		.primary-menu > li.current-menu-ancestor > a {
			color: '.get_theme_mod( 'bnt_primary_menu_text_hover_color' ).';
		}
		.primary-menu .sub-menu li,
		#nav-mobile {
			background-color: '.get_theme_mod( 'bnt_primary_menu_submenu_background_color' ).';
		}
		.primary-menu .sub-menu li a:hover,
		.primary-menu .sub-menu .current-menu-item:not(.current-menu-ancestor) > a,
		#nav-mobile li a:hover,
		#nav-mobile .current-menu-item:not(.current-menu-ancestor) > a {
			background-color: '.get_theme_mod( 'bnt_primary_menu_submenu_background_hover_color' ).';
		}
		.primary-menu .sub-menu,
		.primary-menu .sub-menu li,
		#nav-mobile li a,
		#nav-mobile .primary-mobile-menu > li:first-child > a {
			border-color: '.get_theme_mod( 'bnt_primary_menu_submenu_border_color' ).';
		}
		.primary-menu .sub-menu li a {
			color: '.get_theme_mod( 'bnt_primary_menu_submenu_text_color' ).'; 
		}
		.primary-menu .sub-menu li:hover a {
			color: '.get_theme_mod( 'bnt_primary_menu_submenu_text_hover_color' ).'; 
		}
		#nav-mobile {
			background-color: '.get_theme_mod( 'bnt_mobile_menu_background_color' ).';
		}
		#nav-mobile li a,
		.mobile-menu-trigger,
		.mobile-menu-close {
			color: '.get_theme_mod( 'bnt_mobile_menu_text_color' ).';
		}
		#nav-mobile li a:hover,
		#nav-mobile .current-menu-item:not(.current-menu-ancestor) > a {
			background-color: '.get_theme_mod( 'bnt_mobile_menu_background_hover_color' ).';
		}
		#nav-mobile li a,
		#nav-mobile .primary-mobile-menu > li:first-child > a {
			border-color: '.get_theme_mod( 'bnt_mobile_menu_border_color' ).';	
		}
		#nav-mobile li a:hover,
		.mobile-menu-trigger-container:hover,
		.mobile-menu-close:hover {
			color: '.get_theme_mod( 'bnt_mobile_menu_text_hover_color' ).';
		}
	';
	
	// Theme Options: Content Colors tab
	$customizer_css .= '
		.site-content {
			background-color: '.get_theme_mod( 'bnt_content_background_color' ).';
		}
		.site-content h1, 
		.site-content h2, 
		.site-content h3, 
		.site-content h4, 
		.site-content h5, 
		.site-content h6 {
			color: '.get_theme_mod( 'bnt_content_heading_text_color' ).';
		}
		.products .product a h3,
		.masonry-item-box a h2 {
			color: inherit;	
		}
		.site-content {
			color: '.get_theme_mod( 'bnt_content_body_text_color' ).';
		}
		.site-content a:not(.masonry-item-link):not(.page-numbers):not(.ajax-load-more):not(.remove):not(.button) {
			color: '.get_theme_mod( 'bnt_content_link_text_color' ).';
		}
		.page-link-text:not(:hover) {
			color: #00B285;
		}
		label,
		.wp-caption-text,
		.post-date-blog,
		.entry-footer, 
		.archive-header .archive-description, 
		.comment-meta,
		.comment-notes,
		.project-types,
		.widget_archive li,
		.widget_categories li,
		.widget .post-date,
		.widget_calendar table caption,
		.widget_calendar table th,
		.widget_recent_comments .recentcomments,
		.product .price del,
		.widget del,
		.widget del .amount,
		.product_list_widget a.remove,
		.product_list_widget .quantity,
		.product-categories .count,
		.product_meta,
		.shop_table td.product-remove a,
		.woocommerce-checkout .payment_methods .wc_payment_method .payment_box {
			color: '.get_theme_mod( 'bnt_content_meta_text_color' ).';
		}
		hr,
		.entry-content table,
		.entry-content td,
		.entry-content th,
		.separator-line,
		.comment .comment .comment-nested,
		.comment-respond,
		.sidebar .widget_recent_entries ul li,
		.sidebar .widget_recent_comments ul li,
		.sidebar .widget_categories ul li,
		.sidebar .widget_archive ul li,
		.sidebar .widget_product_categories ul li,
		.woocommerce .site-footer .widget-woo .product_list_widget li,
		.woocommerce .site-footer .widget-woo .cart_list li:last-child,
		.woocommerce-tabs .tabs,
		.woocommerce-tabs .tabs li.active,
		.cart_item,
		.cart_totals .cart-subtotal,
		.cart_totals .order-total,
		.woocommerce-checkout-review-order table tfoot,
		.woocommerce-checkout-review-order table tfoot .order-total,
		.woocommerce-checkout-review-order table tfoot .shipping {
			border-color: '.get_theme_mod( 'bnt_content_delimiter_color' ).';	
		}
		input[type="text"], 
		input[type="password"], 
		input[type="email"], 
		input[type="number"], 
		input[type="tel"], 
		input[type="search"], 
		textarea, 
		select, 
		.select2-container {
			background-color: '.get_theme_mod( 'bnt_content_input_background_color' ).';
			color: '.get_theme_mod( 'bnt_content_input_text_color' ).';
		}
		::-webkit-input-placeholder { 
			color: '.get_theme_mod( 'bnt_content_input_placeholder_color' ).'; 
		}
		::-moz-placeholder { 
			color: '.get_theme_mod( 'bnt_content_input_placeholder_color' ).'; 
		}
		:-ms-input-placeholder { 
			color: '.get_theme_mod( 'bnt_content_input_placeholder_color' ).'; 
		}
		input:-moz-placeholder { 
			color: '.get_theme_mod( 'bnt_content_input_placeholder_color' ).'; 
		}
		.pagination a.page-numbers:hover,
		.woocommerce-pagination a.page-numbers:hover,
		.site-content a.ajax-load-more:hover,
		.page-links .page-link-text:hover,
		.widget_price_filter .ui-slider .ui-slider-range, 
		.widget_price_filter .ui-slider .ui-slider-handle,
		input[type="submit"],
		.site-content .button,
		.widget_price_filter .ui-slider .ui-slider-range, 
		.widget_price_filter .ui-slider .ui-slider-handle {
			background-color: '.get_theme_mod( 'bnt_content_button_background_color' ).';	
		}
		.pagination a.page-numbers:hover,
		.woocommerce-pagination a.page-numbers:hover,
		.site-content a.ajax-load-more:hover,
		.page-links .page-link-text:hover {
			border-color: '.get_theme_mod( 'bnt_content_button_background_color' ).';
		}
		.page-link-text:not(:hover),
		.pagination a, 
		.woocommerce-pagination a,
		.site-content a.ajax-load-more {
			color: '.get_theme_mod( 'bnt_content_button_background_color' ).';
		}
		input[type="submit"]:hover,
		.site-content .button:hover {
			background-color: '.get_theme_mod( 'bnt_content_button_hover_background_color' ).';
		}
		input[type="submit"],
		.site-content .button,
		.pagination a.page-numbers:hover,
		.woocommerce-pagination a.page-numbers:hover,
		.site-content a.ajax-load-more:hover,
		.page-links .page-link-text:hover {
			color: '.get_theme_mod( 'bnt_content_button_text_color' ).';	
		}
		input[type="submit"]:hover,
		.site-content .button:hover {
			color: '.get_theme_mod( 'bnt_content_button_text_hover_color' ).';
		}
		.shop_table .actions .button,
		.shipping-calculator-form .button,
		.checkout_coupon .button,
		.widget_shopping_cart .button:first-child,
		.price_slider_amount .button {
			background-color: '.get_theme_mod( 'bnt_content_secondary_button_background_color' ).';
		}
		.shop_table .actions .button:hover,
		.shipping-calculator-form .button:hover,
		.checkout_coupon .button:hover,
		.widget_shopping_cart .button:first-child:hover,
		.price_slider_amount .button:hover {
			background-color: '.get_theme_mod( 'bnt_content_secondary_button_hover_background_color' ).';
		}
		.shop_table .actions .button,
		.shipping-calculator-form .button,
		.checkout_coupon .button,
		.widget_shopping_cart .button:first-child,
		.price_slider_amount .button {
			color: '.get_theme_mod( 'bnt_content_secondary_button_text_color' ).';
		}
		.shop_table .actions .button:hover,
		.shipping-calculator-form .button:hover,
		.checkout_coupon .button:hover,
		.widget_shopping_cart .button:first-child:hover,
		.price_slider_amount .button:hover {
			color: '.get_theme_mod( 'bnt_content_secondary_button_text_hover_color' ).';
		}
	';
	
	// Theme Options: Footer Colors tab
	$customizer_css .= '
		.sidebar-footer {
			background-color: '.get_theme_mod( 'bnt_footer_widgets_background_color' ).';
		}
		.site-footer {
			color: '.get_theme_mod( 'bnt_footer_text_color' ).';
		}
		.site-footer a {
			color: '.get_theme_mod( 'bnt_footer_link_text_color' ).';
		}
		.site-footer label, 
		.site-footer .post-date-blog, 
		.site-footer .entry-footer, 
		.site-footer .comment-meta, 
		.site-footer .comment-notes, 
		.site-footer .widget_archive li, 
		.site-footer .widget_categories li, 
		.site-footer .widget .post-date, 
		.site-footer .widget_calendar table caption, 
		.site-footer .widget_calendar table th, 
		.site-footer .widget_recent_comments .recentcomments {
			color: '.get_theme_mod( 'bnt_footer_meta_text_color' ).';
		}
		.sidebar-footer .widget_recent_entries ul li, 
		.sidebar-footer .widget_recent_comments ul li, 
		.sidebar-footer .widget_categories ul li, 
		.sidebar-footer .widget_archive ul li {
			border-color: '.get_theme_mod( 'bnt_footer_delimiter_color' ).';
		}
		.bottom-footer {
			background-color: '.get_theme_mod( 'bnt_footer_bottom_background_color' ).';
			color: '.get_theme_mod( 'bnt_footer_bottom_text_color' ).';
		}
		.bottom-footer a {
			color: '.get_theme_mod( 'bnt_footer_bottom_link_text_color' ).';
		}
	';
	
	// Theme Options: Custom CSS tab
	$customizer_css .= get_theme_mod( 'bnt_custom_css' );
	
	return $customizer_css;
	
}


// Control display callback - check for WooCommerce
function bnt_woo_active() {
	return class_exists( 'WooCommerce' );
}


// Display admin notice for migrating theme settings to Customizer
function bnt_customizer_admin_notice() {
	$old_options = get_option( 'satori_options', 'none' );
	$customizer_url = get_admin_url( null, 'customize.php' );
	$success_message = sprintf( wp_kses( __( 'Migration successful! Check out the <a href="%s">Customizer</a>', 'bento' ), array(  'a' => array( 'href' => array() ) ) ), esc_url( $customizer_url ) );
	if ( $old_options != 'none' ) {
		?>
		<div class="notice notice-warning is-dismissible notice-migrate-bento-options">
			<h3>
				<?php _e( 'Action required - migrate Bento theme options into the Customizer', 'bento' ); ?>
			</h3>
			<p>
				<?php _e( 'Due to a change in WordPress rules, all theme options are now handled by the native Customizer ("Appearance -> Customize" admin section). Please click on the button below to transfer existing Bento theme options to the Customizer', 'bento' ); ?>:
			</p>
			<p>
				<input name="Migrate Bento options" type="submit" class="button-primary" value="<?php _e( 'Transfer theme options', 'bento' ); ?> &rsaquo;">
			</p>
		</div>
		<div class="notice notice-success is-dismissible hidden notice-migrate-bento-options-success">
			<p>
				<?php echo $success_message; ?>
			</p>
		</div>
		<?php
	}
}


// Get attachment ID from URL
function bnt_get_attachment_id( $url ) {
	$attachment_id = '';
	$dir = wp_upload_dir();
	if ( false !== strpos( $url, $dir['baseurl'] . '/' ) ) {
		$file = basename( $url );
		$query_args = array(
			'post_type'   => 'attachment',
			'post_status' => 'inherit',
			'fields'      => 'ids',
			'meta_query'  => array(
				array(
					'value'   => $file,
					'compare' => 'LIKE',
					'key'     => '_wp_attachment_metadata',
				),
			)
		);
		$query = new WP_Query( $query_args );
		if ( $query->have_posts() ) {
			foreach ( $query->posts as $post_id ) {
				$meta = wp_get_attachment_metadata( $post_id );
				$original_file = basename( $meta['file'] );
				$cropped_image_files = wp_list_pluck( $meta['sizes'], 'file' );
				if ( $original_file === $file || in_array( $file, $cropped_image_files ) ) {
					$attachment_id = $post_id;
					break;
				}
			}
		}
	}
	return $attachment_id;
}	


// Migrate older options to Customizer
function bnt_migrate_customizer_options() {
	if ( isset($_POST['action']) && $_POST['action'] == 'bnt_migrate_customizer_options' ) {
		$old_options = get_option( 'satori_options' );
		if ( $old_options ) {
			foreach ( $old_options as $old_option_name => $old_option_value ) {
				if ( $old_option_value != '' ) {
					if ( $old_option_name == 'bnt_logo_mobile' ) {
						$file_id = bnt_get_attachment_id( $old_option_value );
						set_theme_mod( $old_option_name, $file_id );
					} else if ( $old_option_name == 'bnt_logo' ) {
						$file_id = bnt_get_attachment_id( $old_option_value );
						set_theme_mod( 'custom_logo', $file_id );
					} else if ( $old_option_name == 'bnt_favicon' ) {
						$file_id = bnt_get_attachment_id( $old_option_value );
						update_option( 'site_icon', $file_id );
					} else {
						set_theme_mod( $old_option_name, $old_option_value );
					}
				}
			}
			delete_option( 'satori_options' );
		}
	}
	die();
}


?>