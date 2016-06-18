<?php
add_action( 'customize_register', 'becorp_header_customizer' );
function becorp_header_customizer( $wp_customize ) {
wp_enqueue_style('becorp-customizr', BECORP_TEMPLATE_DIR_URI .'/css/customizr.css');
$wp_customize->remove_control('header_textcolor');

/* Header Section */
	$wp_customize->add_panel( 'header_options', array(
		'priority'       => 1,
		'capability'     => 'edit_theme_options',
		'title'      => __('Theme Options Settings', 'becorp'),
	) );
	
   	$wp_customize->add_section( 'header_front_data' , array(
		'title'      => __('Custom Header Settings', 'becorp'),
		'panel'  => 'header_options',
		'priority'   => 20,
   	) );
	
	//Show and hide Header Email and Phone
	$wp_customize->add_setting(
	'becorp_option[header_phone_email_enabled]',
    array(
        'default' => 0,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'becorp_option[header_phone_email_enabled]',
    array(
        'label' => __('Enable/Disable Mobile and Email','becorp'),
        'section' => 'header_front_data',
        'type' => 'checkbox',
    )
	);
	
	//Email and Mobile
	$wp_customize->add_setting(
	'becorp_option[header_info_phone]', array(
        'default'        => __('(2)245 23 68','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('becorp_option[header_info_phone]', array(
        'label'   => __('Header Headline :', 'becorp'),
        'section' => 'header_front_data',
        'type'    => 'text',
    ));
	$wp_customize->add_setting('becorp_option[header_info_mail]'
		, array(
        'default'        => 'becorp@gmail.com',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'becorp_option[header_info_mail]', array(
        'label'   => __('Header Text :', 'becorp'),
        'section' => 'header_front_data',
        'type'    => 'text',
    ));
	
	
	
	//Header social Icon

	$wp_customize->add_section(
        'header_social_icon',
        array(
            'title' => 'Social Link ',
			'panel' => 'header_options',
			'priority' => 23,
        )
    );
	
	//Show and hide Header Social Icons
	$wp_customize->add_setting(
	'becorp_option[header_social_media_enabled]'
    ,
    array(
        'default' => 0,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'becorp_option[header_social_media_enabled]',
    array(
        'label' => __('Show Social icons','becorp'),
        'section' => 'header_social_icon',
        'type' => 'checkbox',
    )
	);

	
	

	// Facebook link
	$wp_customize->add_setting(
    'becorp_option[social_media_facebook_link]',
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'becorp_option[social_media_facebook_link]',
    array(
        'label' => __('Facebook URL','becorp'),
        'section' => 'header_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'becorp_option[facebook_media_enabled]',array(
	'default' => 0,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'becorp_option[facebook_media_enabled]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','becorp'),
        'section' => 'header_social_icon',
    )
);

	//twitter link
	
	$wp_customize->add_setting(
    'becorp_option[social_media_twitter_link]',
    array(
        'default' => '#',
		'type' => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'becorp_option[social_media_twitter_link]',
    array(
        'label' => __('Twitter URL','becorp'),
        'section' => 'header_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'becorp_option[twitter_media_enabled]'
    ,array(
	'default' => 0,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'becorp_option[twitter_media_enabled]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','becorp'),
        'section' => 'header_social_icon',
    )
);
	//Linkdin link
	
	$wp_customize->add_setting(
	'becorp_option[social_media_linkedin_link]' ,
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'becorp_option[social_media_linkedin_link]',
    array(
        'label' => __('Linkdin URL','becorp'),
        'section' => 'header_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'becorp_option[linkedin_media_enabled]'
	,array(
	'default' => 0,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    	'becorp_option[linkedin_media_enabled]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','becorp'),
        'section' => 'header_social_icon',
    )
);

	//dribbble link
	
	$wp_customize->add_setting(
	'becorp_option[social_media_dribbble_link]' ,
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'becorp_option[social_media_dribbble_link]',
    array(
        'label' => __('Dribbble URL','becorp'),
        'section' => 'header_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'becorp_option[dribbble_media_enabled]'
	,array(
	'default' => 0,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    	'becorp_option[dribbble_media_enabled]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','becorp'),
        'section' => 'header_social_icon',
    )
);

	//googlelink
	
	$wp_customize->add_setting(
	'becorp_option[social_media_google_link]' ,
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'becorp_option[social_media_google_link]',
    array(
        'label' => __('Google URL','becorp'),
        'section' => 'header_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'becorp_option[google_media_enabled]'
	,array(
	'default' => 0,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    	'becorp_option[google_media_enabled]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','becorp'),
        'section' => 'header_social_icon',
    )
);

	//rss link
	
	$wp_customize->add_setting(
	'becorp_option[social_media_rss_link]' ,
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'becorp_option[social_media_rss_link]',
    array(
        'label' => __('rss URL','becorp'),
        'section' => 'header_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'becorp_option[rss_media_enabled]'
	,array(
	'default' => 0,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    	'becorp_option[rss_media_enabled]',
    array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','becorp'),
        'section' => 'header_social_icon',
    )
);
	//Custom css
	$wp_customize->add_section( 'custom_css' , array(
		'title'      => __('Custom css', 'becorp'),
		'panel'  => 'header_options',
		'priority' => 24,
   	) );
	$wp_customize->add_setting(
	'becorp_option[becorp_custom_css]'
		, array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'wp_strip_all_tags',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'becorp_option[becorp_custom_css]', array(
        'label'   => __('Custom css snippet:', 'becorp'),
        'section' => 'custom_css',
        'type' => 'textarea',
    ));
	
	// Footer Copyright Option Settings
	$wp_customize->add_section( 'footer_copyright_setting' , array(
		'title'      => __('Footer Customization', 'becorp'),
		'panel'  => 'header_options',
		'priority' => 39,
   	) );
	$wp_customize->add_setting(
	'becorp_option[footer_customization_text]'
		, array(
        'default'        => __('@ 2016 Becorp Theme ','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'becorp_option[footer_customization_text]', array(
        'label'   => __('Footer Customization Text', 'becorp'),
        'section' => 'footer_copyright_setting',
        'type' => 'text',
    ));	
	
	$wp_customize->add_setting(
	'becorp_option[footer_customization_develop]'
		, array(
        'default'        => __('Developed By ','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'becorp_option[footer_customization_develop]', array(
        'label'   => __('Footer Customization Developed By', 'becorp'),
        'section' => 'footer_copyright_setting',
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
	'becorp_option[develop_by_name]'
		, array(
        'default'        => __('Asia Themes ','becorp'),
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'becorp_option[develop_by_name]', array(
        'label'   => __('Theme Developed By Name', 'becorp'),
        'section' => 'footer_copyright_setting',
        'type' => 'text',
    ));
	
	$wp_customize->add_setting(
	'becorp_option[develop_by_link]'
		, array(
        'default'        => 'https://asiathemes.com/',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'becorp_option[develop_by_link]', array(
        'label'   => __('Theme Developed By Link', 'becorp'),
        'section' => 'footer_copyright_setting',
        'type' => 'text',
    ));
	
	$wp_customize->add_section( 'becorp_pro' , array(
				'title'      	=> __( 'Upgrade to Becorp Premium', 'becorp' ),
				'priority'   	=> 999,
				'panel'=>'header_options',
			) );

			$wp_customize->add_setting( 'becorp_pro', array(
				'default'    		=> null,
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( new More_becorp_Control( $wp_customize, 'becorp_pro', array(
				'label'    => __( 'becorp Premium', 'becorp' ),
				'section'  => 'becorp_pro',
				'settings' => 'becorp_pro',
				'priority' => 1,
			) ) );
} 
/* Custom Control Class */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'becorp_Customize_Misc_Control' ) ) :
class becorp_Customize_Misc_Control extends WP_Customize_Control {
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
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'More_becorp_Control' ) ) :
class More_becorp_Control extends WP_Customize_Control {

	/**
	* Render the content on the theme customizer page
	*/
	public function render_content() {
		?>
		<label style="overflow: hidden; zoom: 1;">
			<div class="col-md-2 col-sm-6 content-btn">					
					<a style="margin-bottom:20px;margin-left:20px;" href="https://asiathemes.com/becorpdetail/" target="blank" class="btn pro-btn-success btn"><?php _e('Upgrade to becorp Premium','becorp'); ?> </a>
			</div>
			<div class="col-md-4 col-sm-6">
				<img class="becorp_img_responsive " src="<?php echo BECORP_TEMPLATE_DIR_URI .'/images/becorp.jpg'?>">
			</div>			
			<div class="col-md-3 col-sm-6">
				<h3 style="margin-top:10px;margin-left: 20px;text-decoration:underline;color:#0099ff;"><?php echo _e( 'Becorp Premium - Features','becorp'); ?></h3>
					<ul style="padding-top:20px">
						<li class="becorp-content" style="color:#0099ff"> <div class="dashicons dashicons-yes"></div> <?php _e('One Year Free Support ','becorp'); ?> </li>
						<li class="becorp-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Responsive Design','becorp'); ?> </li>						
						<li class="becorp-content"> <div class="dashicons dashicons-yes"></div> <?php _e('More than 10 Templates','becorp'); ?> </li>
						<li class="becorp-content"> <div class="dashicons dashicons-yes"></div> <?php _e('3 Types of Portfolio Templates','becorp'); ?></li>
						<li class="becorp-content"> <div class="dashicons dashicons-yes"></div> <?php _e('8 types Themes Colors Scheme','becorp'); ?></li>
						<li class="becorp-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Patterns Background','becorp'); ?>   </li>
						<li class="becorp-content"> <div class="dashicons dashicons-yes"></div> <?php _e('WPML Compatible','becorp'); ?>   </li>
						<li class="becorp-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Image Background','becorp'); ?>  </li>
						<li class="becorp-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Ultimate Portfolio layout with Taxonomy Tab effect','becorp'); ?> </li>
						<li class="becorp-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Translation Ready','becorp'); ?> </li>
						<li class="becorp-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Coming Soon Mode','becorp'); ?>  </li>
						<li class="becorp-content"> <div class="dashicons dashicons-yes"></div> <?php _e('Google Fonts','becorp'); ?>  </li>
					
					</ul>
			</div>
			<div class="col-md-2 col-sm-6 content-btn">					
					<a style="margin-bottom:20px;margin-left:20px;" href="https://asiathemes.com/becorpdetail/" target="blank" class="btn pro-btn-success btn"><?php _e('Upgrade to becorp Premium','becorp'); ?> </a>
			</div>
			<span class="customize-control-title"><?php _e( 'Enjoying With Becorp', 'becorp' ); ?></span>
			<p>
				<?php
					printf( __( 'If you Like our Products , Please do Rate us on %sWordPress.org%s?  We\'d really appreciate it!', 'becorp' ), '<a target="" href="https://wordpress.org/support/view/theme-reviews/becorp?filter=5">', '</a>' );
				?>
			</p>
		</label>
		<?php
	}
}
endif;