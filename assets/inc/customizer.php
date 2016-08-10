<?php
add_action( 'customize_register', 'bhumi_customizer' );

function bhumi_customizer( $wp_customize ) {
	wp_enqueue_style('customizer', BHUMI_TEMPLATE_DIR_URI .'/assets/css/customizer.css');
		$cpm_theme_options = bhumi_get_options();

		if(!function_exists('bhumi_get_categories_select')):
			function bhumi_get_categories_select() {
				$bhumi_cat = get_categories();
				$results = array();

			if(!empty($bhumi_cat)):
				$results['bhumi_default'] = 'Select Category';
				foreach($bhumi_cat as $result){
					$results[$result->slug] = $result->name;
				}
			endif;
			return $results;
			}
		endif;

		$wp_customize->add_section( 'bhumi_theme_support', array(
		    'title' => __( 'Support','bhumi' ),
		    'priority' => 1, // Mixed with top-level-section hierarchy.
		) );

		$wp_customize->add_setting('bhumi_options[support_links]',
				array(
					'type' => 'option',
					'default' => '',
					'sanitize_callback' => 'esc_url',
					'capability' => 'edit_theme_options',
					)
				);
		$wp_customize->add_control(new Bhumi_Support_Control($wp_customize,'support_links',array(
			'label' => 'Support',
			'section' => 'bhumi_theme_support',
			'settings' => 'bhumi_options[support_links]',
			'type' => 'bhumi-support',
			)
			)
		);

		$wp_customize->add_setting(
            'bhumi_options[site_color]',
             array(
                'type'          => 'option',
                'default'          => '#A13F40',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'bhumi_sanitize_checkbox',
            ) );
        $wp_customize->add_control(new WP_Customize_Color_Control ( $wp_customize, 'site_color', array(
                'label' => __( 'Theme Color:', 'bhumi' ),
                'section'     => 'colors',
                'settings'   => 'bhumi_options[site_color]')
            ) );


	/* Genral section */
	$wp_customize->add_panel( 'bhumi_theme_option', array(
    'title' => __( 'Theme Options','bhumi' ),
    'priority' => 2, // Mixed with top-level-section hierarchy.
	) );

	$wp_customize->add_section('slider_sec',
		array(
			'title' => __('Slider Options','bhumi'),
			'panel' => 'bhumi_theme_option',
			'capability' => 'edit_theme_options',
			'priority' => 35, // Mixed with top-level-section hierarchy.
			)
		);
		$wp_customize->add_setting('bhumi_options[slider_category]',
	        array(
	            'type' => 'option',
	            'sanitize_callback' => 'bhumi_sanitize_checkbox',
	            'default' => 'bhumi_default',
	        )
	);
	$wp_customize->add_control('slider_category',
	        array(
	            'type'              => 'select',
	            'section'           => 'slider_sec',
	            'label'             => esc_html__('Select Category','bhumi'),
	            'choices'           => bhumi_get_categories_select(),
	            'settings'   => 'bhumi_options[slider_category]'
	        )
	);
	$version_wp = get_bloginfo('version');
    if($version_wp < 4.5){
		$wp_customize->add_section(
	        'general_sec',
	        array(
	            'title' => __( 'General Options','bhumi' ),
	            'description' => __( 'Here you can customize Your theme\'s general Settings' , 'bhumi' ),
				'panel'=>'bhumi_theme_option',
				'capability'=>'edit_theme_options',
	            'priority' => 35,
	        )
	    );

		$wp_customize->add_setting(
			'bhumi_options[upload_image_logo]',
			array(
				'type'    => 'option',
				'default'=> '',
				'sanitize_callback'=>'esc_url_raw',
				'capability'        => 'edit_theme_options',
			)
		);
		$wp_customize->add_setting(
			'bhumi_options[height]',
			array(
				'type'    => 'option',
				'default'=>'55',
				'sanitize_callback'=>'bhumi_sanitize_integer',
				'capability'        => 'edit_theme_options'
			)
		);
		$wp_customize->add_setting(
			'bhumi_options[width]',
			array(
				'type'    => 'option',
				'default'=>'150',
				'sanitize_callback'=>'bhumi_sanitize_integer',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bhumi_upload_image_logo', array(
			'label'        => __( 'Website Logo', 'bhumi' ),
			'section'    => 'general_sec',
			'settings'   => 'bhumi_options[upload_image_logo]',
		) ) );
		$wp_customize->add_control( 'bhumi_logo_height', array(
			'label'        => __( 'Logo Height', 'bhumi' ),
			'type'=>'number',
			'section'    => 'general_sec',
			'settings'   => 'bhumi_options[height]',
		) );
		$wp_customize->add_control( 'bhumi_logo_width', array(
			'label'        => __( 'Logo Width', 'bhumi' ),
			'type'=>'number',
			'section'    => 'general_sec',
			'settings'   => 'bhumi_options[width]',
		) );
	}

	/*Breadcrumb*/
	$wp_customize->add_section('breadcrumb_sec',
		array(
			'title' => __('Breadcrumb Options','bhumi'),
			'panel' => 'bhumi_theme_option',
			'capability' => 'edit_theme_options',
			'priority' => 35, // Mixed with top-level-section hierarchy.
			)
		);
	$wp_customize->add_setting(
		'bhumi_options[breadcrumb_show]',
		array(
			'type'    => 'option',
			'default'=>'1',
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'bhumi_sanitize_text',
		)
	);
	$wp_customize->add_control( 'breadcrumb_show', array(
			'label'    => __( 'Enable/Disable Breadcrumb','bhumi' ),
			'section'  => 'breadcrumb_sec',
			'type'     => 'radio',
			'choices' => array(
	            '1' => __('Show', 'bhumi'),
	            '0' =>__('hide', 'bhumi'),
	        ),
	        'settings' => 'bhumi_options[breadcrumb_show]'
		)
	);

	/* Service Options */
	$wp_customize->add_section('service_section',array(
	'title'=>__("Service Options",'bhumi'),
	'panel'=>'bhumi_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35,
	'active_callback' => 'is_front_page',
	));

	$wp_customize->add_setting(
	'bhumi_options[home_service_heading]',
		array(
		'default'=>'',
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'bhumi_sanitize_text',

			)
	);
	$wp_customize->add_control( 'home_service_heading', array(
		'label'        => __( 'Home Service Title', 'bhumi' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'bhumi_options[home_service_heading]'
	) );


	$wp_customize->add_setting('bhumi_options[service_category]',
	        array(
	            'type' => 'option',
	            'sanitize_callback' => 'bhumi_sanitize_checkbox',
	            'default' => 'bhumi_default',
	        )
	);
	$wp_customize->add_control('service_category',
	        array(
	            'type'              => 'select',
	            'section'           => 'service_section',
	            'label'             => esc_html__('Select Category','bhumi'),
	            'choices'           => bhumi_get_categories_select(),
	            'settings'   => 'bhumi_options[service_category]'
	        )
	);
/* Portfolio Section */
	$wp_customize->add_section(
        'portfolio_section',
        array(
            'title' => __('Portfolio Options','bhumi'),
			'panel'=>'bhumi_theme_option',
			'capability'=>'edit_theme_options',
            'priority' => 35,
        )
    );

	$wp_customize->add_setting(
		'bhumi_options[portfolio_home]',
		array(
			'type'    => 'option',
			'default'=>1,
			'sanitize_callback'=>'bhumi_sanitize_checkbox',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_setting(
		'bhumi_options[port_heading]',
		array(
			'type'    => 'option',
			'default'=>'',
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'bhumi_sanitize_text',
		)
	);

	$wp_customize->add_control( 'bhumi_show_portfolio', array(
		'label'        => __( 'Enable Portfolio on Home', 'bhumi' ),
		'type'=>'checkbox',
		'section'    => 'portfolio_section',
		'settings'   => 'bhumi_options[portfolio_home]'
	) );
	$wp_customize->add_control( 'bhumi_portfolio_title', array(
		'label'        => __( 'Portfolio Heading', 'bhumi' ),
		'type'=>'text',
		'section'    => 'portfolio_section',
		'settings'   => 'bhumi_options[port_heading]'
	) );

	$wp_customize->add_setting('bhumi_options[portfolio_category]',
	        array(
	            'type' => 'option',
	            'sanitize_callback' => 'bhumi_sanitize_checkbox',
	            'default' => 'bhumi_default',
	        )
	);
	$wp_customize->add_control('portfolio_category',
	        array(
	            'type'              => 'select',
	            'section'           => 'portfolio_section',
	            'label'             => esc_html__('Select Category','bhumi'),
	            'choices'           => bhumi_get_categories_select(),
	            'settings'   => 'bhumi_options[portfolio_category]'
	        )
	);

/* Blog Option */
	$wp_customize->add_section('blog_section',array(
	'title'=>__('Home Blog Options','bhumi'),
	'panel'=>'bhumi_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
	'bhumi_options[show_blog]',
		array(
		'default'=>1,
		'type'=>'option',
		'sanitize_callback'=>'bhumi_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'show_blog', array(
		'label'        => __( 'Show Blog Posts', 'bhumi' ),
		'type'=>'checkbox',
		'section'    => 'blog_section',
		'settings'   => 'bhumi_options[show_blog]'
	) );

	$wp_customize->add_setting(
		'bhumi_options[blog_title]',
		array(
			'type'    => 'option',
			'default'=>'',
			'sanitize_callback'=>'bhumi_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'bhumi_latest_post', array(
		'label'        => __( 'Home Blog Title', 'bhumi' ),
		'type'=>'text',
		'section'    => 'blog_section',
		'settings'   => 'bhumi_options[blog_title]',
	) );

	$wp_customize->add_setting(
		'bhumi_options[blog_show_posts]',
		array(
			'type'    => 'option',
			'default'=>'all_posts',
			'sanitize_callback'=>'bhumi_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'bhumi_latest_show_posts', array(
		'label'        => __( 'Show Blog Section', 'bhumi' ),
		'type'=>'radio',
		'section'    => 'blog_section',
		'settings'   => 'bhumi_options[blog_show_posts]',
		'choices'	=> array(
			'all_posts' => esc_html__( 'Show All Posts','bhumi' ),
			'catg' => esc_html__( 'Show Posts Through Category', 'bhumi' )
			),
	) );

	$wp_customize->add_setting('bhumi_options[blog_category]',
	        array(
	            'type' => 'option',
	            'sanitize_callback' => 'bhumi_sanitize_checkbox',
	            'default' => 'bhumi_default',
	        )
	);
	$wp_customize->add_control('blog_category',
	        array(
	            'type'              => 'select',
	            'section'           => 'blog_section',
	            'label'             => esc_html__('Select Category','bhumi'),
	            'choices'           => bhumi_get_categories_select(),
	            'settings'   => 'bhumi_options[blog_category]',
	            'active_callback'	=> 'bhumi_blog_category_select'
	        )
	);

/* Social options */
	$wp_customize->add_section('social_section',array(
	'title'=>__("Social Options",'bhumi'),
	'panel'=>'bhumi_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
	'bhumi_options[header_social_media_in_enabled]',
		array(
		'default'=>1,
		'type'=>'option',
		'sanitize_callback'=>'bhumi_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'header_social_media_in_enabled', array(
		'label'        => __( 'Enable Social Media Icons in Header', 'bhumi' ),
		'type'=>'checkbox',
		'section'    => 'social_section',
		'settings'   => 'bhumi_options[header_social_media_in_enabled]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[footer_section_social_media_enbled]',
		array(
		'default'=>1,
		'type'=>'option',
		'sanitize_callback'=>'bhumi_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'footer_section_social_media_enbled', array(
		'label'        => __( 'Enable Social Media Icons in Footer', 'bhumi' ),
		'type'=>'checkbox',
		'section'    => 'social_section',
		'settings'   => 'bhumi_options[footer_section_social_media_enbled]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[email_id]',
		array(
		'default'=>'',
		'type'=>'option',
		'sanitize_callback'=>'sanitize_email',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'email_id', array(
		'label'        =>  __('Email ID', 'bhumi' ),
		'type'=>'email',
		'section'    => 'social_section',
		'settings'   => 'bhumi_options[email_id]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[phone_no]',
		array(
		'default'=>'',
		'type'=>'option',
		'sanitize_callback'=>'bhumi_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'phone_no', array(
		'label'        =>  __('Phone Number', 'bhumi' ),
		'type'=>'text',
		'section'    => 'social_section',
		'settings'   => 'bhumi_options[phone_no]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[twitter_link]',
		array(
		'default'=>'',
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'twitter_link', array(
		'label'        =>  __('Twitter', 'bhumi' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'bhumi_options[twitter_link]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[fb_link]',
		array(
		'default'=>'',
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'fb_link', array(
		'label'        => __( 'Facebook', 'bhumi' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'bhumi_options[fb_link]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[linkedin_link]',
		array(
		'default'=>'',
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'linkedin_link', array(
		'label'        => __( 'LinkedIn', 'bhumi' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'bhumi_options[linkedin_link]'
	) );

	$wp_customize->add_setting(
	'bhumi_options[gplus]',
		array(
		'default'=>'',
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'gplus', array(
		'label'        => __( 'Google+', 'bhumi' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'bhumi_options[gplus]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[youtube_link]',
		array(
		'default'=>'',
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'youtube_link', array(
		'label'        => __( 'Youtube', 'bhumi' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'bhumi_options[youtube_link]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[instagram]',
		array(
		'default'=>'',
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'instagram', array(
		'label'        => __( 'Instagram', 'bhumi' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'bhumi_options[instagram]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[skype]',
		array(
		'default'=>'',
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'skype', array(
		'label'        => __( 'Skype', 'bhumi' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'bhumi_options[skype]'
	) );
	/* Footer callout */
	$wp_customize->add_section('callout_section',array(
	'title'=>__("Call-to-Action Options",'bhumi'),
	'panel'=>'bhumi_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
	'bhumi_options[fc_home]',
		array(
		'default'=>1,
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'bhumi_sanitize_text',
		)
	);
	$wp_customize->add_control( 'fc_home', array(
		'label'        => __( 'Enable CTA on Home Page', 'bhumi' ),
		'type'=>'checkbox',
		'section'    => 'callout_section',
		'settings'   => 'bhumi_options[fc_home]'
	) );
	$wp_customize->add_setting(
		'bhumi_options[fc_radio]',
		     array(
			'default'           => 'bottom',
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'bhumi_sanitize_text',
		)
	);
	$wp_customize->add_control( 'bhumi_options[fc_radio]', array(
			'label'    => __( 'CTA Location on Home Page','bhumi' ),
			'section'  => 'callout_section',
			'type'     => 'radio',
			'choices' => array(
	            'top' => __('Top', 'bhumi'),
	            'middle'=>__('Middle', 'bhumi'),
	            'bottom' =>__('Bottom', 'bhumi'),
	        ),
	        'settings' => 'bhumi_options[fc_radio]'
		)
	);
	$wp_customize->add_setting(
	'bhumi_options[fc_title]',
		array(
		'default'=>'',
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'bhumi_sanitize_text',
		)
	);
	$wp_customize->add_control( 'fc_title', array(
		'label'        => __( 'Call To Action Description', 'bhumi' ),
		'type'=>'textarea',
		'section'    => 'callout_section',
		'settings'   => 'bhumi_options[fc_title]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[fc_btn_txt]',
		array(
		'default'=>'',
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'bhumi_sanitize_text',
		)
	);
	$wp_customize->add_control( 'fc_btn_txt', array(
		'label'        => __( 'Call To Action Button Text', 'bhumi' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'bhumi_options[fc_btn_txt]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[fc_btn_link]',
		array(
		'default'=>'',
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'bhumi_sanitize_text',
		)
	);
	$wp_customize->add_control( 'fc_btn_link', array(
		'label'        => __( 'Call To Action Button Link', 'bhumi' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'bhumi_options[fc_btn_link]'
	) );
	/* Footer Options */
	$wp_customize->add_section('footer_section',array(
	'title'=>__("Footer Options",'bhumi'),
	'panel'=>'bhumi_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
	'bhumi_options[footer_customizations]',
		array(
		'default'=>esc_html($cpm_theme_options['footer_customizations']),
		'type'=>'option',
		'sanitize_callback'=>'bhumi_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'footer_customizations', array(
		'label'        => __( 'Footer Customization Text', 'bhumi' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'bhumi_options[footer_customizations]'
	) );

	$wp_customize->add_setting(
	'bhumi_options[developed_by_text]',
		array(
		'default'=>esc_html($cpm_theme_options['developed_by_text']),
		'type'=>'option',
		'sanitize_callback'=>'bhumi_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'developed_by_text', array(
		'label'        => __( 'Developed By Text', 'bhumi' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'bhumi_options[developed_by_text]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[developed_by_bhumi_text]',
		array(
		'default'=>esc_html($cpm_theme_options['developed_by_bhumi_text']),
		'type'=>'option',
		'sanitize_callback'=>'bhumi_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'developed_by_bhumi_text', array(
		'label'        => __( 'Developed By Link Text', 'bhumi' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'bhumi_options[developed_by_bhumi_text]'
	) );
	$wp_customize->add_setting(
	'bhumi_options[developed_by_link]',
		array(
		'default'=>esc_url($cpm_theme_options['developed_by_link']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_control( 'developed_by_link', array(
		'label'        => __( 'Developed By Link', 'bhumi' ),
		'type'=>'url',
		'section'    => 'footer_section',
		'settings'   => 'bhumi_options[developed_by_link]'
	) );

	$wp_customize->add_section('custom_css',array(
	'title'=>__("Add CSS",'bhumi'),
	'panel'=>'bhumi_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 35
	));
	$wp_customize->add_setting(
	'bhumi_options[custom_css]',
		array(
		'default'=>'',
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'esc_js'
		)
	);
	$wp_customize->add_control( 'custom_css', array(
		'label'        => __( 'Add CSS', 'bhumi' ),
		'type'=>'textarea',
		'section'    => 'custom_css',
		'settings'   => 'bhumi_options[custom_css]'
	) );
}
function bhumi_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function bhumi_sanitize_checkbox( $input ) {
    return $input;
}
function bhumi_sanitize_integer( $input ) {
    return (int)($input);
}
/* Custom Control Class */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'bhumi_Customize_Misc_Control' ) ) :
class bhumi_Customize_Misc_Control extends WP_Customize_Control {
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

if(!function_exists('bhumi_blog_category_select')):
    function bhumi_blog_category_select($control){
    	$blog_setting = $control->manager->get_setting('bhumi_options[blog_show_posts]')->value();
        $control_id = $control->id;
         if ( $control_id == 'blog_category'  && $blog_setting == 'catg' ){
            return true;
        }

        return false;
    }
endif;