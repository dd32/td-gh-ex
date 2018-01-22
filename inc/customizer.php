<?php
/**
 * Atoz Theme Customizer
 *
 * @package atoz
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function atoz_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->default   = '#454545';
	$wp_customize->get_section( 'title_tagline' )->title  = __( 'Branding', 'atoz' );	    

	/**
	* This class adds toggle control to the customizer 
	*/
     class Atoz_Customizer_Toggle_Control extends WP_Customize_Control {
		public $type = 'ios';

		/**
		 * Enqueue scripts/styles.
		 *
		 * @since 3.4.0
		 */
		public function enqueue() 
		{
			
			wp_enqueue_style( 'atoz-pure-css-toggle-buttons', get_template_directory_uri() . '/css/pure-css-togle-buttons.css', array(), rand() );

			$css = '
				.disabled-control-title {
					color: #a0a5aa;
				}
				input[type=checkbox].tgl-light:checked + .tgl-btn {
			  		background: #0085ba;
				}
				input[type=checkbox].tgl-light + .tgl-btn {
				  background: #a0a5aa;
			  	}
				input[type=checkbox].tgl-light + .tgl-btn:after {
				  background: #f7f7f7;
			  	}

				input[type=checkbox].tgl-ios:checked + .tgl-btn {
				  background: #0085ba;
				}

				input[type=checkbox].tgl-flat:checked + .tgl-btn {
				  border: 4px solid #0085ba;
				}
				input[type=checkbox].tgl-flat:checked + .tgl-btn:after {
				  background: #0085ba;
				}

			';
			wp_add_inline_style( 'atoz-pure-css-toggle-buttons' , $css );
		}

		/**
		 * Render the control's content.
		 *
		 * @author soderlind
		 * @version 1.2.0
		 */
		public function render_content() 
		{
			?>
			<label>
				<div style="display:flex;flex-direction: row;justify-content: flex-start;">
					<span class="customize-control-title" style="flex: 2 0 0; vertical-align: middle;"><?php echo esc_html( $this->label ); ?></span>
					<input id="cb<?php echo esc_html( $this->instance_number ); ?>" type="checkbox" class="tgl tgl-<?php echo esc_html( $this->type ); ?>" value="<?php echo esc_html( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?> />
					<label for="cb<?php echo esc_html( $this->instance_number ); ?>" class="tgl-btn"></label>
				</div>
				<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php endif; ?>
			</label>
			<?php
		}
	}

	 /* Selective Refresh */
	if ( isset( $wp_customize->selective_refresh ) ) {	
	/*header title */
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.navbar-header h3',
			
		) ); 
	/*Search section */	
		$wp_customize->selective_refresh->add_partial( 'atoz_search_check', array(
			'selector'        => 'form#searchform',
			'render_callback' => 'atoz_customize_partial_searchcheck',
		) ); 
	/*Blog Listing*/
		$wp_customize->selective_refresh->add_partial( 'atoz_post_title', array(
			'selector'        => 'h2.blogpost_title',
			'render_callback' => 'atoz_customize_partial_blogtitle',
		) ); 
		$wp_customize->selective_refresh->add_partial( 'atoz_post_desc', array(
			'selector'        => 'p.blogpost_desc',
			'render_callback' => 'atoz_customize_partial_blogdesc',
		) ); 
	/*Featured items*/
		$wp_customize->selective_refresh->add_partial( 'atoz_title', array(
			'selector'        => '.serv-content h4',
			'render_callback' => 'atoz_customize_partial_serv_content',
		) ); 		
		$wp_customize->selective_refresh->add_partial( 'atoz_feat_desc', array(
			'selector'        => '.serv-content p',
			'render_callback' => 'atoz_customize_partial_atoz_feat_desc',
		) ); 
		$wp_customize->selective_refresh->add_partial( 'atoz_url_title', array(
			'selector'        => '.serv-content a',
			'render_callback' => 'atoz_customize_partial_atoz_url_title',
		) ); 
		$wp_customize->selective_refresh->add_partial( 'atoz_image', array(
			'selector'        => '.serv-img',
			'render_callback' => 'atoz_customize_partial_atoz_image',
		) ); 		
	}	
	
	/* A theme INFO panel */
	require get_template_directory() . '/inc/lib/theme-info.php';
	
	$wp_customize->add_section( 'atoz_theme_info', array(
		'title'    => __( 'Theme INFO', 'atoz' ),
		'priority' => 0,
	) );
	$wp_customize->add_setting( 'atoz_theme_info', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new atoz_info( $wp_customize, 'atoz_theme_info', array(
		'section'  => 'atoz_theme_info',
		'priority' => 10,
	) ) );
	/*Accent color*/   
	$wp_customize->add_setting( 'atoz_nav_text_color', array(
            'default'                     => '#cdcfd1',
            'transport'                   => 'postMessage',
            'sanitize_callback'           => 'sanitize_hex_color',
    ) );    
    $wp_customize->add_control ( new WP_Customize_Color_Control (
        $wp_customize, 'atoz_nav_text_color', array(
            'label'                       => esc_html__( 'Navigation Text', 'atoz' ),
            'section'                     => 'colors',
    ) ) );    	
	$wp_customize->add_setting( 'atoz_nav_bg', array(
            'default'                     => '#777',
            'transport'                   => 'postMessage',
            'sanitize_callback'           => 'sanitize_hex_color',
    ) );    
	$wp_customize->add_setting( 'atoz_submenu_bg', array(
            'default'                     => '#000',
            'transport'                   => 'postMessage',
            'sanitize_callback'           => 'sanitize_hex_color',
    ) );   
    $wp_customize->add_control ( new WP_Customize_Color_Control (
        $wp_customize, 'atoz_submenu_bg', array(
            'label'                       => esc_html__( 'Sub Menu Bg', 'atoz' ),
            'section'                     => 'colors',
    ) ) ); 
	$wp_customize->add_setting( 'atoz_menu_hover', array(
            'default'                     => '#000',
            'transport'                   => 'refresh',
            'sanitize_callback'           => 'sanitize_hex_color',
    ) );   
    $wp_customize->add_control ( new WP_Customize_Color_Control (
        $wp_customize, 'atoz_menu_hover', array(
            'label'                       => esc_html__( 'Menu Hover Color', 'atoz' ),
            'section'                     => 'colors',
    ) ) );  	
    $wp_customize->add_control ( new WP_Customize_Color_Control (
        $wp_customize, 'atoz_nav_bg', array(
            'label'                       => esc_html__( 'Navigation Background', 'atoz' ),
            'section'                     => 'colors',
    ) ) );   
     $wp_customize->add_setting( 'atoz_accent_color', 
            array(
                'default' => '#fe9c46',  
                'transport' => 'postMessage', 
                'sanitize_callback' => 'sanitize_hex_color', 
            ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'atoz_accent_color', 
           array(
			'label'      => esc_html__( 'Accent Color', 'atoz' ),
			'description' => esc_html__( 'Add Accent Color to post,button.', 'atoz' ),
			'section'    => 'colors',
		) ) ); 
    $wp_customize->add_setting( 'atoz_footer_text_color', array(
            'default'                     => '#cdcfd1',
            'transport'                   => 'postMessage',
            'sanitize_callback'           => 'sanitize_hex_color',
    ) );    
    $wp_customize->add_control ( new WP_Customize_Color_Control (
        $wp_customize, 'atoz_footer_text_color', array(
            'label'                       => esc_html__( 'Footer Text', 'atoz' ),
            'section'                     => 'colors',
    ) ) );    
    $wp_customize->add_setting( 'atoz_footer_bck_color', array(
            'default'                     => '#44484b',
            'transport'                   => 'postMessage',
            'sanitize_callback'           => 'sanitize_hex_color',
    ) );    
    $wp_customize->add_control ( new WP_Customize_Color_Control (
        $wp_customize, 'atoz_footer_bck_color', array(
            'label'                       => esc_html__( 'Footer Background', 'atoz' ),
            'section'                     => 'colors',
    ) ) );  
	$wp_customize->add_setting( 'atoz_fontawesome_icons', array(
            'default'                     => '#fff',
            'transport'                   => 'postMessage',
            'sanitize_callback'           => 'sanitize_hex_color',
    ) );    
    $wp_customize->add_control ( new WP_Customize_Color_Control (
        $wp_customize, 'atoz_fontawesome_icons', array(
            'label'                       => esc_html__( 'All Font Awesome Icons', 'atoz' ),
            'section'                     => 'colors',
    ) ) ); 	
	$wp_customize->add_setting( 'atoz_social_icon_color', array(
            'default'                     => '#fff',
            'transport'                   => 'postMessage',
            'sanitize_callback'           => 'sanitize_hex_color',
    ) );    
    $wp_customize->add_control ( new WP_Customize_Color_Control (
        $wp_customize, 'atoz_social_icon_color', array(
            'label'                       => esc_html__( 'Footer Social Icons', 'atoz' ),
            'section'                     => 'colors',
    ) ) );  
    /*Slider*/
    $wp_customize->add_section( 'atoz_slider_options' , array(
    'title'      => __('Slider','atoz'),
    'priority'   => 42,
	) );
	$wp_customize->add_setting( 'atoz_slider_check', 
		   array( 
			   'default' 	=> 0,
			   'transport' 	=> 'refresh',
			   'sanitize_callback' => 'atoz_sanitize_checkbox',
		   ) );
	
	$wp_customize->add_control( new Atoz_Customizer_Toggle_Control( $wp_customize, 'atoz_slider_check', array(
			'type'		=> 'checkbox',
			'label' 	=> __( 'Enable/Disable Slider', 'atoz' ),			
			'section'  	=> 'atoz_slider_options',
			'type'     => 'ios',
		)	
	) );
	global $atoz_options_categories;
	$wp_customize->add_setting('atoz_slide_categories', array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'atoz_sanitize_slidecat'
	));
	$wp_customize->add_control('atoz_slide_categories', array(
		'label' => __('Slider Category', 'atoz'),
		'section' => 'atoz_slider_options',
		'type'    => 'select',
		'description' => __('Select a category for the featured post slider', 'atoz'),
		'choices'    => $atoz_options_categories
	));
	$wp_customize->add_setting(
	'atoz_slide_number', array(
			'default' => 3,
			'sanitize_callback' => 'absint'
		)
	);
	$wp_customize->add_control(
	'atoz_slide_number', array(
		'type' => 'integer',				
		'label' => __('Number Of Slides To Show - i.e 10 (default is 3)','atoz'),
		'section' => 'atoz_slider_options',
		
		)
	);    
    /*Search*/    
    $wp_customize->add_section( 'atoz_search' , array(
    'title'      => __('Search Section','atoz'),
    'priority'   => 43,
	) );
    $wp_customize->add_setting( 'atoz_search_check', 
           array( 
               'default' => 0,
               'transport' => 'refresh',
               'sanitize_callback' => 'atoz_sanitize_checkbox',
           ) );
   
	$wp_customize-> add_control( new Atoz_Customizer_Toggle_Control( $wp_customize, 'atoz_search_check', array(
			'type'		=> 'checkbox',
			'label' 	=> __( 'Enable search form on homepage', 'atoz' ),			
			'section'  	=> 'atoz_search',
			'type'     => 'ios',
	) ) );
    
    /* Blog Settings*/    
    $wp_customize->add_section('atoz_post_section', array(
        'title'    => __('Blog Settings', 'atoz'),
        'description' => __('Add Title & Description to the blog listing on homepage. Post count can be changed from Settings -> Reading -> Blog pages show at most', 'atoz'),
        'priority' => 44,
    ));   
	$wp_customize->add_setting( 'atoz_post_title', 
           array( 
				'default' => __('Latest Posts', 'atoz'),
               'transport' => 'postMessage',
               'sanitize_callback' => 'sanitize_text_field',
    ) );
	$wp_customize->add_control( 'atoz_post_title', 
           array(
			'type' => 'text',
			'section' => 'atoz_post_section', 
			'label' => __( "Blog Title", 'atoz' ),
	) ); 
    $wp_customize->add_setting( 'atoz_post_desc', 
           array( 
               'transport' => 'postMessage',
               'sanitize_callback' => 'sanitize_text_field',
    ) );
	$wp_customize->add_control( 'atoz_post_desc', 
           array(
			'type' => 'text',
			'section' => 'atoz_post_section',
			'label' => __( "Description", 'atoz' ),
	) );
    $wp_customize->add_setting( 'atoz_related_post_check', 
           array( 
               'default' => 1,
               'transport' => 'refresh',
               'sanitize_callback' => 'atoz_sanitize_checkbox',
	) );    
   $wp_customize->add_control( new Atoz_Customizer_Toggle_Control( $wp_customize, 'atoz_related_post_check', array(
			'type'		=> 'checkbox',
			'label' 	=> __( 'Enable/Disable Related Post', 'atoz' ),			
			'section'  	=> 'atoz_post_section',
			'type'     => 'ios',
		)
	) );
    $wp_customize->add_setting( 'atoz_post_related_post_count', 
           array( 
               'default' => 3 ,
               'transport' => 'refresh',
               'sanitize_callback' => 'absint',
    ) );
	$wp_customize->add_control( 'atoz_post_related_post_count', 
           array(
			'type' => 'text',
			'section' => 'atoz_post_section', 
			'label' => __( "Related Post Count", 'atoz' ),
	) );     
    /* Featured item*/
		 $wp_customize->add_section('atoz_calender', array(
			'title'    		=> __('Featured Item', 'atoz'),
			'description' 	=> __('Link to your favorite post/page/link from here. Change the default values as it will not reflect on homepage.', 'atoz'),
			'priority' 		=> 45,
		));

	$wp_customize->add_setting( 'atoz_Featured_check',
			array(
				'sanitize_callback' => 'atoz_sanitize_checkbox',
				'default'           => '',
				'capability'        => 'manage_options',
				'transport'         => 'refresh',
			)
	);
	$wp_customize->add_control( new Atoz_Customizer_Toggle_Control( $wp_customize, 'atoz_Featured_check', array(
		'settings' => 'atoz_Featured_check',
		'label'    => __( 'Enable this section?', 'atoz' ),
		'section'  => 'atoz_calender',
		'type'     => 'ios',
		'priority' => 1,

	) ) );
    
	$wp_customize->add_setting( 'atoz_title', 
		   array( 
			   'default'  => esc_html__('Title of the item', 'atoz'),
			   'transport' => 'postMessage',
			   'sanitize_callback' => 'sanitize_text_field',
		   ) );
	$wp_customize->add_control( 'atoz_title', 
		   array(
			'type' => 'text',
			'section' => 'atoz_calender',
			'label' => __( "Heading", 'atoz' ),			
		) );

	$wp_customize->add_setting( 'atoz_feat_desc', 
		   array( 
			   'default' => esc_html__('Description goes here. This is the featured item section of the theme.', 'atoz') ,
			   'transport' => 'postMessage',
			   'sanitize_callback' => 'wp_kses_post',
		   ) );
	$wp_customize->add_control( 'atoz_feat_desc', 
		   array(
			'type' => 'textarea',
			'section' => 'atoz_calender',
			'label' => __( "Description", 'atoz' ),
		) );    
	$wp_customize->add_setting( 'atoz_url_title', 
		   array( 
			   'default' => esc_html__('Add Button Text', 'atoz') ,
			   'transport' => 'postMessage',
			   'sanitize_callback' => 'sanitize_text_field',
		   ) );
	$wp_customize->add_control( 'atoz_url_title', 
		   array(
			'type' => 'text',
			'section' => 'atoz_calender',
			'label' => __( "Button Text", 'atoz' ),			
		) );    
	$wp_customize->add_setting( 'atoz_url_link', 
		   array( 
			   'default' => '#',
			   'transport' => 'postMessage',
			   'sanitize_callback' => 'esc_url_raw',
		   ) );
	$wp_customize->add_control( 'atoz_url_link', 
		   array(
			'type' => 'text',
			'section' => 'atoz_calender',
			'label' => __( "Button Link", 'atoz' ),
		) );       
   $wp_customize->add_setting( 'atoz_image', array(
			'default'           => get_template_directory_uri(). '/img/ser-1.png',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport' => 'postMessage',
			'sanitize_callback' => 'esc_url_raw',
		) );

	$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'atoz_image',
				array(
					'label'    => __( 'Add a featured image', 'atoz' ),
					'section'  => 'atoz_calender',
					'settings' => 'atoz_image',
					'context'  => 'a_2_z_image',
					
				)
			)
		);
   $wp_customize->add_setting( 'atoz_bg_image', array(
			'default'           => get_template_directory_uri(). '/img/article-bg.jpg',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );
	$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'atoz_bg_image',
				array(
					'label'    => __( 'Add a background image', 'atoz' ),
					'section'  => 'atoz_calender',
					'settings' => 'atoz_bg_image',
					'context'  => 'atoz_bg_image',						
				)
			)
		);        
	$wp_customize->add_setting( 'atoz_quote_bg_color', 
			array(
				'default' => '#fe9c46',
				'transport' => 'postMessage', 
				'sanitize_callback' => 'sanitize_hex_color', 
			) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'atoz_quote_bg_color', 
		   array(
			'label'      => esc_html__( 'Background Color', 'atoz' ),
			'description' => esc_html__( 'Add a background overlay to add contrast to headings & descriptions.', 'atoz' ),
			'section'    => 'atoz_calender',
		) ) );			
	$wp_customize->add_setting( 'atoz_transparnt', 
		   array( 
			   'default' => '.95',
			   'transport' => 'refresh',
			   'sanitize_callback' => 'sanitize_text_field',
		   ) );
	$wp_customize->add_control( 'atoz_transparnt', 
		   array(
			'type' => 'text',
			'section' => 'atoz_calender',
			'label' => esc_html__( "Background Transparency", 'atoz' ),
			'description' => esc_html__( 'Change the opacity of the above background color.', 'atoz' ),
		) );    
}
add_action( 'customize_register', 'atoz_customize_register' );

function atoz_sanitize_slidecat( $input ) {
    global $atoz_options_categories;
    if ( array_key_exists( $input, $atoz_options_categories ) ) {
        return $input;
    } else {
        return '';
    }
}
function atoz_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
		return 1;
    } else {
		return 0;
    }
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function atoz_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function atoz_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
/*Render Blog listing for the selective refresh partial*/
function atoz_customize_partial_blogtitle(){
	echo esc_html(get_theme_mod( 'atoz_post_title' ));
}
function atoz_customize_partial_blogdesc(){
	echo esc_html(get_theme_mod( 'atoz_post_desc' ));
}

/*Featured Item - Render this item for the selective refresh partial */
function atoz_customize_partial_serv_content() {
	echo esc_html(get_theme_mod( 'atoz_title' ));
}

function atoz_customize_partial_atoz_feat_desc(){
	echo esc_html(get_theme_mod('atoz_feat_desc'));
}
function atoz_customize_partial_atoz_url_title(){
	echo esc_html(get_theme_mod('atoz_url_title'));
}
function atoz_customize_partial_atoz_image(){
	echo '<img src="' . esc_url(get_theme_mod('atoz_image')) . '" class="img-responsive wow  fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">';
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function atoz_customize_preview_js() {
	wp_enqueue_script( 'atoz_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'atoz_customize_preview_js' );
?>

<?php add_action( 'customize_controls_print_scripts', 'atoz_head_scripts', 20 );
function atoz_head_scripts() { ?>
<style>
#customize-controls .description {
    color: #73757d;
    border: 1px solid rgba(254, 156, 70, 0.38);
    padding: 10px;
    line-height: 22px;
    border-radius: 10px;
    background: #fff;
    font-style: italic;
}
.atoz-theme-info {
    background: #fff;
    padding: 10px;
    border-radius: 6px;
}
.atoz-theme-info a {
    padding: 10px;
    color: #fe9c46;
	text-decoration: none;
	    font-family: Roboto;
    font-size: 14px;
	    display: block;
}
.atoz-theme-info a:hover {
    text-decoration: underline;
}
</style>
<?php }?>

<?php
add_action( 'customize_controls_print_footer_scripts', 'atoz_customizer_custom_scripts' );
function atoz_customizer_custom_scripts() { ?>
<script type="text/javascript">
    jQuery(document).ready(function() {
        /* This one shows/hides the an option when a checkbox is clicked. */
        jQuery('#customize-control-atoz-atoz_slide_categories, #customize-control-atoz-atoz_slide_number').hide();
            jQuery('#customize-control-atoz-atoz_slide_categories, #customize-control-atoz-atoz_slide_number').fadeToggle(400);
        
            jQuery('#customize-control-atoz-atoz_slide_categories, #customize-control-atoz-atoz_slide_number').show();
       
    });
</script>
<?php }?>

<?php
function atoz_customizer_css() {
		wp_enqueue_style( 'atoz-customizer-css', get_template_directory_uri() . '/css/customizer.css' );
	}
add_action( 'customize_controls_print_styles', 'atoz_customizer_css' );
