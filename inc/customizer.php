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

function animals_format_for_editor( $text, $default_editor = null ) {
    if ( $text ) {
        $text = htmlspecialchars( $text, ENT_NOQUOTES, get_option( 'blog_charset' ) );
    }
 
    /**
     * Filter the text after it is formatted for the editor.
     *
     * @since 4.3.0
     *
     * @param string $text The formatted text.
     */
    return apply_filters( 'animals_format_for_editor', $text, $default_editor );
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
	
	$wp_customize->remove_control('header_textcolor');
	
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
	
	
	$wp_customize->add_section('belowsld_section',array(
		'title'	=> __('Below Slider Strips','animals'),
		'description'	=> __('Add below slider strips content here.','animals'),
		'priority'		=> null
	));
	
	$wp_customize->add_setting('shpeone_txthd',array(
		'default'	=> 'Welcome to Pets Animals...',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('shpeone_txthd',array(
				'label' => __('Left shaper title here','animals'),
				'section' => 'belowsld_section',
				'setting'	=> 'shpeone_txthd',
				'type'	=> 'text'
		)
	);
	
	$wp_customize->add_setting('shpeone_txt',array(
		'default'	=> 'Lorem ipsum dolor sit amo nsec tetuer adipiscing elit',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('shpeone_txt',array(
				'label' => __('Left shaper content here','animals'),
				'section' => 'belowsld_section',
				'setting'	=> 'shpeone_txt',
				'type'	=> 'text'
		)
	);
	
	$wp_customize->add_setting('shapelink',array(
		'default'	=> '#',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control('shapelink',array(
				'label' => __('Right shape link here','animals'),
				'section' => 'belowsld_section',
				'setting'	=> 'shapelink',
				'type'	=> 'text'
		)
	);
	
	// Slide Image 1
	
	$wp_customize->add_section('slider_section',array(
		'title'	=> __('Slider Settings','animals'),
		'description'	=> __('Add slider images here.','animals'),
		'priority'		=> null
	));
	
	// Slide Image 1
	$wp_customize->add_setting('slide_image1',array(
		'default'	=> get_template_directory_uri().'/images/slides/slider1.jpg',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'slide_image1',
        array(
            'label' => __('Slide Image 1 (1440x700)','animals'),
            'section' => 'slider_section',
            'settings' => 'slide_image1'
        )
    )
);

	$wp_customize->add_setting('slide_title1',array(
		'default'	=> __('Responsive Design','animals'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('slide_title1',array(
		'label'	=> __('Slide Title 1','animals'),
		'section'	=> 'slider_section',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('slide_desc1',array(
		'default'	=> __('This is description for slider one.','animals'),
		'sanitize_callback'	=> 'animals_format_for_editor',
	));
	
	$wp_customize->add_control('slide_desc1',array(
				'label' => __('Slide Description 1','animals'),
				'section' => 'slider_section',
				'setting'	=> 'slide_desc1',
				'type'	=> 'textarea'
		)
	);
	
	$wp_customize->add_setting('slide_link1',array(
		'default'	=> '#link1',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control('slide_link1',array(
		'label'	=> __('Slide Link 1','animals'),
		'section'	=> 'slider_section',
		'type'		=> 'text'
	));
	
	// Slide Image 2
	$wp_customize->add_setting('slide_image2',array(
		'default'	=> get_template_directory_uri().'/images/slides/slider2.jpg',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'slide_image2',
        array(
            'label' => __('Slide Image 2 (1440x700)','animals'),
            'section' => 'slider_section',
            'settings' => 'slide_image2'
        )
    )
);

	$wp_customize->add_setting('slide_title2',array(
		'default'	=> __('Flexible Design','animals'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('slide_title2',array(
		'label'	=> __('Slide Title 2','animals'),
		'section'	=> 'slider_section',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('slide_desc2',array(
		'default'	=> __('This is description for slide two','animals'),
		'sanitize_callback'	=> 'animals_format_for_editor',
	));
	
	$wp_customize->add_control('slide_desc2',array(
				'label' => __('Slide Description 2','animals'),
				'section' => 'slider_section',
				'setting'	=> 'slide_desc2',
				'type'		=> 'textarea'
		)
	);
	
	$wp_customize->add_setting('slide_link2',array(
		'default'	=> '#link2',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control('slide_link2',array(
		'label'	=> __('Slide Link 2','animals'),
		'section'	=> 'slider_section',
		'type'		=> 'text'
	));
	
	// Slide Image 3
	$wp_customize->add_setting('slide_image3',array(
		'default'	=> get_template_directory_uri().'/images/slides/slider3.jpg',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'slide_image3',
        array(
            'label' => __('Slide Image 3 (1440x700)','animals'),
            'section' => 'slider_section',
            'settings' => 'slide_image3'
        )
    )
);

	$wp_customize->add_setting('slide_title3',array(
		'default'	=> __('Awesome Features','animals'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('slide_title3',array(
		'label'	=> __('Slide Title 3','animals'),
		'section'	=> 'slider_section',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('slide_desc3',array(
		'default'	=> __('This is description for slide three','animals'),
		'sanitize_callback'	=> 'animals_format_for_editor',
	));
	
	$wp_customize->add_control('slide_desc3',array(
				'label' => __('Slide Description 3','animals'),
				'section' => 'slider_section',
				'setting'	=> 'slide_desc3',
				'type'		=> 'textarea'
		)
	);
	
	$wp_customize->add_setting('slide_link3',array(
		'default'	=> '#link3',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	
	$wp_customize->add_control('slide_link3',array(
		'label'	=> __('Slide Link 3','animals'),
		'section'	=> 'slider_section',
		'type'		=> 'text'
	));
	
	
	$wp_customize->add_section('footer_section',array(
		'title'	=> __('Footer Text','animals'),
		'description'	=> __('Add some text for footer like copyright etc.','animals'),
		'priority'	=> null
	));
	
	$wp_customize->add_setting('footer_copy',array(
		'default'	=> __('Animals 2016 | All Rights Reserved.','animals'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('footer_copy',array(
		'label'	=> __('Copyright Text','animals'),
		'section'	=> 'footer_section',
		'type'		=> 'text'
	));
	
    $wp_customize->add_section(
        'animals_theme_doc',
        array(
            'title' => __('Documentation &amp; Support', 'animals'),
            'priority' => null,
            'description' => __('For documentation and support check this link :','animals'). '<a href="'.esc_url(animals_theme_doc).'" target="_blank">Animals Documentation</a>',
        )
    );  
    $wp_customize->add_setting('Animals_options[info]', array(
			'sanitize_callback' => 'sanitize_text_field',
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new Animals_Info( $wp_customize, 'doc_section', array(
        'section' => 'theme_doc_sec',
        'settings' => 'Animals_options[info]',
        'priority' => 10
        ) )
    );
	
	
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
				.pagination ul li .current, 
				.pagination ul li a:hover,
				#commentform input#submit,
				input.search-submit,
				#header .main-nav ul li ul li a:hover,
				.social-icons a:hover{
					background-color:<?php echo esc_html(get_theme_mod('color_scheme','#fc9530')); ?>;
				}
				.shaper{ border-top:70px solid <?php echo esc_html(get_theme_mod('color_scheme','#fc9530')); ?>;}
		</style>
	<?php }
add_action('wp_head','animals_css');

function animals_custom_customize_enqueue() {
	wp_enqueue_script( 'animals-custom-customize', get_template_directory_uri() . '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'animals_custom_customize_enqueue' );