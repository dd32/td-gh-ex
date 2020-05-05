<?php
/**
 * Animals Theme Customizer
 *
 * @package Animals
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function animals_customize_register( $wp_customize ) {

function animals_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}


//Add a class for titles
    class Animals_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		
	$wp_customize->add_setting('color_scheme', array(
		'default' => '#fc9530',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','animals'),
			'description'	=> __('Select color form here.','animals'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_setting('footer_color', array(
		'default' => '#191e1e',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'footer_color',array(
			'description'	=> __('Select background color for footer.','animals'),
			'section' => 'colors',
			'settings' => 'footer_color'
		))
	);
	
	$wp_customize->add_section('social_section',array(
		'title'	=> __('Social Links','animals'),
		'description'	=> __('Add your social links here.','animals'),
		'priority'		=> null
	));
	
	$wp_customize->add_setting('social_fb',array(
		'default'	=> '#',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control('social_fb',array(
		'label'	=> __('Add facebook icon link here','animals'),
		'section'	=> 'social_section',
		'setting'	=> 'social_fb',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('social_tw',array(
		'default'	=> '#',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control('social_tw',array(
		'label'	=> __('Add twitter icon link here','animals'),
		'section'	=> 'social_section',
		'setting'	=> 'social_tw',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('social_linked',array(
		'default'	=> '#',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control('social_linked',array(
		'label'	=> __('Add linkedin icon link here','animals'),
		'section'	=> 'social_section',
		'setting'	=> 'social_linked',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('social_pint',array(
		'default'	=> '#',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control('social_pint',array(
		'label'	=> __('Add pinterest icon link here','animals'),
		'section'	=> 'social_section',
		'setting'	=> 'social_pint',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('social_ytube',array(
		'default'	=> '#',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control('social_ytube',array(
		'label'	=> __('Add youtube icon link here','animals'),
		'section'	=> 'social_section',
		'setting'	=> 'social_ytube',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('hide_social',array(
			'default' => false,
			'sanitize_callback' => 'animals_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_social', array(
		   'settings' => 'hide_social',
    	   'section'   => 'social_section',
    	   'label'     => __('Check this to hide social icons','animals'),
    	   'type'      => 'checkbox'
     ));
	
	// Slider Section Start		
	$wp_customize->add_section(
        'slider_section',
        array(
            'title' => __('Slider Settings', 'animals'),
            'priority' => null,
			'description'	=> __('Recommended image size (1420x567)','animals'),	
        )
    );
	
	$wp_customize->add_setting('page-setting7',array(
			'default' => __('0','animals'),
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','animals'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'default' => __('0','animals'),
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','animals'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'default' => __('0','animals'),
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','animals'),
			'section'	=> 'slider_section'
	));	
	
	
	$wp_customize->add_setting('hide_slider',array(
			'default' => false,
			'sanitize_callback' => 'animals_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_slider', array(
		   'settings' => 'hide_slider',
    	   'section'   => 'slider_section',
    	   'label'     => __('Check this to hide slider','animals'),
    	   'type'      => 'checkbox'
     ));
	 
	 $wp_customize->add_setting('slidelink_text',array(
	 		'default'	=> __('Read More','animals'),
			'sanitize_callback'	=> 'sanitize_text_field'
	 ));
	 
	 $wp_customize->add_control('slidelink_text',array(
	 		'settings'	=> 'slidelink_text',
			'section'	=> 'slider_section',
			'label'		=> __('Add text for slide link button','animals'),
			'type'		=> 'text'
	 ));	
	
	// Slider Section End
	
	
}
add_action( 'customize_register', 'animals_customize_register' );

function animals_css(){
		?>
        <style>
				.social_icons h5,
				.social_icons a,
				a, 
				.tm_client strong,
				#footer a,
				#footer ul li:hover a, 
				#footer ul li.current_page_item a,
				.postmeta a:hover,
				#sidebar ul li a:hover,
				.blog-post h3.entry-title,
				.woocommerce ul.products li.product .price,
				.header .header-inner .nav ul li a:hover,
				.social-icons a{
					color:<?php echo esc_html(get_theme_mod('color_scheme','#fc9530')); ?>;
				}
				a.read-more, a.blog-more,
				.nav-links .current, 
				.nav-links a:hover,
				#commentform input#submit,
				input.search-submit,
				#header .main-nav ul li ul li a:hover,
				.social-icons a:hover{
					background-color:<?php echo esc_html(get_theme_mod('color_scheme','#fc9530')); ?>;
				}
				.shaper{ border-top:70px solid <?php echo esc_html(get_theme_mod('color_scheme','#fc9530')); ?>;}
				.copyright-wrapper{
					background-color:<?php echo esc_html(get_theme_mod('footer_color','#191e1e')); ?>;
				}
		</style>
	<?php }
add_action('wp_head','animals_css');

function animals_custom_customize_enqueue() {
	wp_enqueue_script( 'animals-custom-customize', get_template_directory_uri() . '/js/customize-preview.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'animals_custom_customize_enqueue' );