<?php
/**
 * bharat Theme Customizer
 *
 * @package bharat
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bharat_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	/**
	 * Adds textarea support to the theme customizer
	 */
	class Bharat_Customize_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';
	 
		public function render_content() {
			?>
				<label>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
				</label>
			<?php
		}
	}
}
add_action( 'customize_register', 'bharat_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bharat_customize_preview_js() {
	wp_enqueue_script( 'bharat_customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'bharat_customize_preview_js' );

function bharat_customizer($wp_customize) {
	
	//section theme
    $wp_customize->add_section(
            //main key for section
            'bharat_settings', array(
        'title' => __('Theme', 'bharat'),
        'priority' => 140,
            )
    );
	
	//Top Logo
	$wp_customize->add_setting('bharat_logo', array(
	'default' => '',
	'sanitize_callback' => 'esc_url_raw',
	'transport'   => 'refresh',
	));
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'bharat_logo', array(
        'label' => __('Logo', 'bharat'),
        //section is key
        'section' => 'bharat_settings',
        'priority' => 1,
    )));
	

	
//----------------------------------------------------------------------	
	//section Feature area
    $wp_customize->add_section(
            //main key for section
            'bharat_feature', array(
        'title' => __('Feature Area', 'bharat'),
        'priority' => 141,
            )
    );
	
	//Top Feature Image
	$wp_customize->add_setting('bharat_top_feature_left_image', array(
	'default' => '',
	'sanitize_callback' => 'esc_url_raw',
	'transport'   => 'refresh',
	));
			
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'bharat_top_feature_left_image', array(
        'label' => __('Two Column Feature Image', 'bharat'),
        //section is key
        'section' => 'bharat_feature',
        'priority' => 1,
    )));
	
    // Top Heading
    $wp_customize->add_setting(
            'bharat_feature_top_headline', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );
    $wp_customize->add_control(
		new Bharat_Customize_Textarea_Control(
        $wp_customize,
            'bharat_feature_top_headline', array(
        'label' => __('Two Column Feature Heading', 'bharat'),
        //section is key
        'section' => 'bharat_feature',
        'type' => 'text',
        'priority' => 2,
			)
		)
	);
    
    // Top Tagline
    $wp_customize->add_setting(
			'bharat_feature_top_desc', array(
        'default' => '',
        'sanitize_callback' => 'esc_attr',
            )
    );
    $wp_customize->add_control(
	new Bharat_Customize_Textarea_Control(
        $wp_customize,
            'bharat_feature_top_desc', array(
        'label' => __('Two Column Feature Description', 'bharat'),
        //section is key
        'section' => 'bharat_feature',
        'type' => 'textarea',
        'priority' => 3,
            )
		)
    );
	
		//  Top CTA button text
    $wp_customize->add_setting(
            'bharat_top_cta_button_text', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );
    $wp_customize->add_control(
            'bharat_top_cta_button_text', array(
        'label' => __('CTA Button Text ', 'bharat'),
        //section is key
        'section' => 'bharat_feature',
        'type' => 'text',
        'priority' => 4,
    ));
	
	
	//  Top CTA button link
    $wp_customize->add_setting(
            'bharat_top_cta_button_link', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );
    $wp_customize->add_control(
            'bharat_top_cta_button_link', array(
        'label' => __('CTA Buttonlink', 'bharat'),
        //section is key
        'section' => 'bharat_feature',
        'type' => 'text',
        'priority' => 5,
    ));
	
	
//-------------------------------------------------------------------------
	//Three Column Feature area
    $wp_customize->add_section(
            //main key for section
            'bharat_threecolumn_feature', array(
        'title' => __('Three Column Feature Area', 'bharat'),
        'priority' => 141,
            )
    );
	
	// Three Column Feature Heading
    $wp_customize->add_setting(
            'bharat_three_feature_heading', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );
    $wp_customize->add_control(
		new Bharat_Customize_Textarea_Control(
        $wp_customize,
            'bharat_three_feature_heading', array(
        'label' => __('Three Column Heading', 'bharat'),
        //section is key
        'section' => 'bharat_threecolumn_feature',
        'type' => 'text',
        'priority' => 1,
    )));
	
	//  First image
	$wp_customize->add_setting('bharat_three_feature_image1', array(
	'default' => '',
	'sanitize_callback' => 'esc_url_raw',
	));
			
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'bharat_three_feature_image1', array(
        'label' => __('First Image', 'bharat'),
        //section is key
        'section' => 'bharat_threecolumn_feature',
        'priority' => 2,
    )));
	
	//  First title
    $wp_customize->add_setting(
            'bharat_three_feature_title1', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );
    $wp_customize->add_control(
		new Bharat_Customize_Textarea_Control(
        $wp_customize,
            'bharat_three_feature_title1', array(
        'label' => __('First Title', 'bharat'),
        //section is key
        'section' => 'bharat_threecolumn_feature',
        'type' => 'text',
        'priority' => 3,
    )));
	
	//  First description
    $wp_customize->add_setting(
            'bharat_three_feature_desc1', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );
    $wp_customize->add_control(
		new Bharat_Customize_Textarea_Control(
        $wp_customize,
            'bharat_three_feature_desc1', array(
        'label' => __('First Description', 'bharat'),
        //section is key
        'section' => 'bharat_threecolumn_feature',
        'type' => 'text',
        'priority' => 4,
    )));
	
	//  Second icon
	// --------------------------------------
	//  Second image
	$wp_customize->add_setting('bharat_three_feature_image2', array(
	'default' => '',
	'sanitize_callback' => 'esc_url_raw',
	));
			
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'bharat_three_feature_image2', array(
        'label' => __('Second Image', 'bharat'),
        //section is key
        'section' => 'bharat_threecolumn_feature',
        'priority' => 5,
    )));
	
	//  Second title
    $wp_customize->add_setting(
            'bharat_three_feature_title2', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );
    $wp_customize->add_control(
		new Bharat_Customize_Textarea_Control(
        $wp_customize,
            'bharat_three_feature_title2', array(
        'label' => __('Second Title', 'bharat'),
        //section is key
        'section' => 'bharat_threecolumn_feature',
        'type' => 'text',
        'priority' => 6,
    )));
	
	//  Second description
    $wp_customize->add_setting(
            'bharat_three_feature_desc2', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );
    $wp_customize->add_control(
		new Bharat_Customize_Textarea_Control(
        $wp_customize,
            'bharat_three_feature_desc2', array(
        'label' => __('Second Description', 'bharat'),
        //section is key
        'section' => 'bharat_threecolumn_feature',
        'type' => 'text',
        'priority' => 7,
    )));
	
	
	//  Third icon
	// --------------------------------------
	//  Third image
	$wp_customize->add_setting('bharat_three_feature_image3', array(
	'default' => '',
	'sanitize_callback' => 'esc_url_raw',
	));
			
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize, 'bharat_three_feature_image3', array(
        'label' => __('Third Image', 'bharat'),
        //section is key
        'section' => 'bharat_threecolumn_feature',
        'priority' => 8,
    )));
	
	//  Third title
    $wp_customize->add_setting(
            'bharat_three_feature_title3', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );
    $wp_customize->add_control(
		new Bharat_Customize_Textarea_Control(
        $wp_customize,
            'bharat_three_feature_title3', array(
        'label' => __('Third Title', 'bharat'),
        //section is key
        'section' => 'bharat_threecolumn_feature',
        'type' => 'text',
        'priority' => 9,
    )));
	
	//  Third description
    $wp_customize->add_setting(
            'bharat_three_feature_desc3', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );
    $wp_customize->add_control(
		new Bharat_Customize_Textarea_Control(
        $wp_customize,
            'bharat_three_feature_desc3', array(
        'label' => __('Third Description', 'bharat'),
        //section is key
        'section' => 'bharat_threecolumn_feature',
        'type' => 'text',
        'priority' => 10,
    )));

//----------------------------------------------------------------------
	//section CTA
    $wp_customize->add_section(
            //main key for section
            'bharat_cta_section', array(
        'title' => __('Call to Action', 'bharat'),
        'priority' => 142,
            )
    );
	
		//  CTA Heading
    $wp_customize->add_setting(
            'bharat_cta_head', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );
    $wp_customize->add_control(
		new Bharat_Customize_Textarea_Control(
        $wp_customize,
            'bharat_cta_head', array(
        'label' => __('Heading for CTA', 'bharat'),
        //section is key
        'section' => 'bharat_cta_section',
        'type' => 'text',
        'priority' => 1,
    )));
	
	//  CTA description
    $wp_customize->add_setting(
            'bharat_cta_desc', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );
    $wp_customize->add_control(
		new Bharat_Customize_Textarea_Control(
        $wp_customize,
            'bharat_cta_desc', array(
        'label' => __('Decription for CTA', 'bharat'),
        //section is key
        'section' => 'bharat_cta_section',
        'type' => 'text',
        'priority' => 2,
    )));
	
	//  CTA button text
    $wp_customize->add_setting(
            'bharat_cta_button_text', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );
    $wp_customize->add_control(
            'bharat_cta_button_text', array(
        'label' => __('CTA Button Text ', 'bharat'),
        //section is key
        'section' => 'bharat_cta_section',
        'type' => 'text',
        'priority' => 3,
    ));
	
	
	//  CTA button link
    $wp_customize->add_setting(
            'bharat_cta_button_link', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );
    $wp_customize->add_control(
            'bharat_cta_button_link', array(
        'label' => __('CTA Buttonlink', 'bharat'),
        //section is key
        'section' => 'bharat_cta_section',
        'type' => 'text',
        'priority' => 4,
    ));
	
	// Footer *****************
	
	//section Footer
    $wp_customize->add_section(
            //main key for section
            'bharat_footer_section', array(
        'title' => __('Footer', 'bharat'),
        'priority' => 143,
            )
    );
	
	//  Footer text
    $wp_customize->add_setting(
            'bharat_footertext', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );
    $wp_customize->add_control(
		new Bharat_Customize_Textarea_Control(
        $wp_customize,
            'bharat_footertext', array(
        'label' => __('Footer copyright text', 'bharat'),
        //section is key
        'section' => 'bharat_footer_section',
        'type' => 'text',
        'priority' => 1,
    )));
	
	//section Social Icons
    $wp_customize->add_section(
            //main key for section
            'bharat_footer_social', array(
        'title' => __('Social Icons', 'bharat'),
        'priority' => 144,
            )
    );
	
	//  Facebook
    $wp_customize->add_setting(
            'bharat_social_fb', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );
    $wp_customize->add_control(
		new Bharat_Customize_Textarea_Control(
        $wp_customize,
            'bharat_social_fb', array(
        'label' => __('Facebook', 'bharat'),
        //section is key
        'section' => 'bharat_footer_social',
        'type' => 'text',
        'priority' => 1,
    )));
	
	//  Google Plus
    $wp_customize->add_setting(
            'bharat_social_gp', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );
    $wp_customize->add_control(
		new Bharat_Customize_Textarea_Control(
        $wp_customize,
            'bharat_social_gp', array(
        'label' => __('Google Plus', 'bharat'),
        //section is key
        'section' => 'bharat_footer_social',
        'type' => 'text',
        'priority' => 2,
    )));

	//  Linkedin
    $wp_customize->add_setting(
            'bharat_social_ln', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );
    $wp_customize->add_control(
		new Bharat_Customize_Textarea_Control(
        $wp_customize,
            'bharat_social_ln', array(
        'label' => __('Linkedin', 'bharat'),
        //section is key
        'section' => 'bharat_footer_social',
        'type' => 'text',
        'priority' => 3,
    )));
	
	//  Pinterest
    $wp_customize->add_setting(
            'bharat_social_pn', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );
    $wp_customize->add_control(
		new Bharat_Customize_Textarea_Control(
        $wp_customize,
            'bharat_social_pn', array(
        'label' => __('Linkedin', 'bharat'),
        //section is key
        'section' => 'bharat_footer_social',
        'type' => 'text',
        'priority' => 4,
    )));
	
	//  Twitter
    $wp_customize->add_setting(
            'bharat_social_tw', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );
    $wp_customize->add_control(
		new Bharat_Customize_Textarea_Control(
        $wp_customize,
            'bharat_social_tw', array(
        'label' => __('Twitter', 'bharat'),
        //section is key
        'section' => 'bharat_footer_social',
        'type' => 'text',
        'priority' => 5,
    )));
	
	//  WordPress
    $wp_customize->add_setting(
            'bharat_social_wp', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );
    $wp_customize->add_control(
		new Bharat_Customize_Textarea_Control(
        $wp_customize,
            'bharat_social_wp', array(
        'label' => __('WordPress', 'bharat'),
        //section is key
        'section' => 'bharat_footer_social',
        'type' => 'text',
        'priority' => 6,
    )));
	
	//  YouTube
    $wp_customize->add_setting(
            'bharat_social_yt', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );
    $wp_customize->add_control(
		new Bharat_Customize_Textarea_Control(
        $wp_customize,
            'bharat_social_yt', array(
        'label' => __('YouTube', 'bharat'),
        //section is key
        'section' => 'bharat_footer_social',
        'type' => 'text',
        'priority' => 7,
    )));
	
	//  Dribble
    $wp_customize->add_setting(
            'bharat_social_db', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
            )
    );
    $wp_customize->add_control(
		new Bharat_Customize_Textarea_Control(
        $wp_customize,
            'bharat_social_db', array(
        'label' => __('Dribble', 'bharat'),
        //section is key
        'section' => 'bharat_footer_social',
        'type' => 'text',
        'priority' => 8,
    )));
	
    //Ends
}

add_action('customize_register', 'bharat_customizer');
