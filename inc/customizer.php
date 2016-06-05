<?php
/**
 * beautiplus Theme Customizer
 *
 * @package Beautiplus
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function beautiplus_customize_register( $wp_customize ) {
	
	//Add a class for titles
    class beautiplus_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	
	class WP_Customize_Textarea_Control extends WP_Customize_Control {
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
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('display_header_text');
	
	
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#e80f6f',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','beautiplus'),			
			 'description'	=> __('More color options in PRO Version','beautiplus'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	// Slider Section		
	$wp_customize->add_section(
        'slider_section',
        array(
            'title' => __('Slider Settings', 'beautiplus'),
            'priority' => null,
			'description'	=> __('Featured Image Size Should be same ( 1400x600 ) More slider settings available in PRO Version.','beautiplus'),            			
        )
    );
	
	
	$wp_customize->add_setting('page-setting7',array(
			'sanitize_callback'	=> 'beautiplus_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','beautiplus'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'sanitize_callback'	=> 'beautiplus_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','beautiplus'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'sanitize_callback'	=> 'beautiplus_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','beautiplus'),
			'section'	=> 'slider_section'
	));	// Slider Section
	
	// Home Three Boxes Section 	
	$wp_customize->add_section('section_second', array(
		'title'	=> __('Homepage Three Boxes Section','beautiplus'),
		'description'	=> __('Select Pages from the dropdown for homepage three boxes section','beautiplus'),
		'priority'	=> null
	));	
	
	
	$wp_customize->add_setting('page-column1',	array(
			'sanitize_callback' => 'beautiplus_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column1',array('type' => 'dropdown-pages',
			'label' => __('','beautiplus'),
			'section' => 'section_second',
	));	
	
	
	$wp_customize->add_setting('page-column2',	array(
			'sanitize_callback' => 'beautiplus_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column2',array('type' => 'dropdown-pages',
			'label' => __('','beautiplus'),
			'section' => 'section_second',
	));
	
	$wp_customize->add_setting('page-column3',	array(
			'sanitize_callback' => 'beautiplus_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column3',array('type' => 'dropdown-pages',
			'label' => __('','beautiplus'),
			'section' => 'section_second',
	));//end four column page boxes
	
	
	//Why Choose Us section
	$wp_customize->add_section('welcome_sec',array(
			'title'	=> __('Welcome Section','beautiplus'),
			'description'	=> __('Add your details here','beautiplus'),
			'priority'	=> null
	));	
	
	
	$wp_customize->add_setting('welcome_title',array(
			'default'	=> __('Welcome to beautiplus','beautiplus'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('welcome_title',array(
			'label'	=> __('Add title for welcome','beautiplus'),
			'section'	=> 'welcome_sec',
			'setting'	=> 'welcome_title'
	));	
	
	$wp_customize->add_setting('welcome_description',array(
			'default'	=> __('This is an example page. Its different from a blog post because it will stay in one place and will show up in your site navigation in most theme. Most people start with an About page that introduces them to potential site visitors.This is an example page. Its different from a blog post because it will stay in one place and will show up in your site navigation . Most people start with an About page that introduces them to potential site visitors. ','beautiplus'),
			'sanitize_callback'	=> 'wp_htmledit_pre'
	));
	
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize, 'welcome_description', array(
				'label'	=> __('Add here your welcome description','beautiplus'),
				'section'	=> 'welcome_sec',
				'setting'	=> 'welcome_description'
			)
		)
	);
	
	$wp_customize->add_setting('welcome_link',array(
			'default'	=> '#',
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('welcome_link',array(
			'label'	=> __('Add read more button link here','beautiplus'),
			'section'	=> 'welcome_sec',
			'setting'	=> 'welcome_link'
	));	
	
	
		
	$wp_customize->add_section('social_sec',array(
			'title'	=> __('Social Settings','beautiplus'),				
			'description'	=> __('Add social icons link here. <br /> More icon available in in PRO Version','beautiplus'),				
			'priority'		=> null
	));
	
	
	$wp_customize->add_setting('fb_link',array(
			'default'	=> '#facebook',
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
			'label'	=> __('Add facebook link here','beautiplus'),
			'section'	=> 'social_sec',
			'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> '#twitter',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
			'label'	=> __('Add twitter link here','beautiplus'),
			'section'	=> 'social_sec',
			'setting'	=> 'twitt_link'
	));
	$wp_customize->add_setting('gplus_link',array(
			'default'	=> '#gplus',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('gplus_link',array(
			'label'	=> __('Add google plus link here','beautiplus'),
			'section'	=> 'social_sec',
			'setting'	=> 'gplus_link'
	));
	$wp_customize->add_setting('linked_link',array(
			'default'	=> '#linkedin',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
			'label'	=> __('Add linkedin link here','beautiplus'),
			'section'	=> 'social_sec',
			'setting'	=> 'linked_link'
	));
	
	
	$wp_customize->add_section('footer_area',array(
			'title'	=> __('Footer Area','beautiplus'),
			'priority'	=> null,
			'description'	=> __('Add footer copyright text','beautiplus')
	));
	$wp_customize->add_setting('beautiplus_options[credit-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new beautiplus_Info( $wp_customize, 'cred_section', array(
		'label'	=> __('','beautiplus'),
        'section' => 'footer_area',
        'settings' => 'beautiplus_options[credit-info]'
        ) )
    );
	
	
	$wp_customize->add_setting('about_title',array(
			'default'	=> __('About Us','beautiplus'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('about_title',array(
			'label'	=> __('Add title for about us','beautiplus'),
			'section'	=> 'footer_area',
			'setting'	=> 'about_title'
	));
	
	$wp_customize->add_setting('about_description',array(
			'default'	=> __('Donec ut ex ac nulla pellentesque mollis in a enim. Praesent placerat sapien mauris, vitae sodales tellus venenatis ac. Suspendisse suscipit velit id ultricies auctor. Duis turpis arcu, aliquet sed sollicitudin sed, porta quis urna. Quisque velit nibh, egestas et erat a, vehicula interdum augue.','beautiplus'),
			'sanitize_callback'	=> 'wp_htmledit_pre'
	));
	
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'about_description', array(	
			'label'	=> __('Add description for about us','beautiplus'),
			'section'	=> 'footer_area',
			'setting'	=> 'about_description'
	)) );
	
	$wp_customize->add_setting('menu_title',array(
			'default'	=> __('Main Navigation','beautiplus'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('menu_title',array(
			'label'	=> __('Add title for menu','beautiplus'),
			'section'	=> 'footer_area',
			'setting'	=> 'menu_title'
	));	
	
	$wp_customize->add_setting('recentpost_title',array(
			'default'	=> __('Recent Posts','beautiplus'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('recentpost_title',array(
			'label'	=> __('Add title for footer recent posts','beautiplus'),
			'section'	=> 'footer_area',
			'setting'	=> 'recentpost_title'
	));	
	
	$wp_customize->add_setting('contact_title',array(
			'default'	=> __('Contact Info','beautiplus'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('contact_title',array(
			'label'	=> __('Add title for footer contact info','beautiplus'),
			'section'	=> 'footer_area',
			'setting'	=> 'contact_title'
	));	
	
	$wp_customize->add_setting('copyright_text',array(
			'default'	=> __('2016 beautiplus. All Right Reserved','beautiplus'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('copyright_text',array(
			'label'	=> __('Change Copyright Text','beautiplus'),
			'section'	=> 'footer_area',
			'setting'	=> 'copyright_text'
	));	
	
	
	$wp_customize->add_section('contact_sec',array(
			'title'	=> __('Contact Details','beautiplus'),
			'description'	=> __('Add you contact details here','beautiplus'),
			'priority'	=> null
	));	
	
	
	$wp_customize->add_setting('contact_add',array(
			'default'	=> __('4212 E Valley Mesa St. Petter , Ohio United State.','beautiplus'),
			'sanitize_callback'	=> 'wp_htmledit_pre'
	));
	
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize, 'contact_add', array(
				'label'	=> __('Add contact address here','beautiplus'),
				'section'	=> 'contact_sec',
				'setting'	=> 'contact_add'
			)
		)
	);
	$wp_customize->add_setting('contact_no',array(
			'default'	=> __(' +123 456 7890','beautiplus'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_no',array(
			'label'	=> __('Add contact number here.','beautiplus'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_no'
	));
	$wp_customize->add_setting('contact_mail',array(
			'default'	=> 'contact@company.com',
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('contact_mail',array(
			'label'	=> __('Add you email here','beautiplus'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_mail'
	));		
		
}
add_action( 'customize_register', 'beautiplus_customize_register' );

//Integer
function beautiplus_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function beautiplus_custom_css(){
		?>
        	<style type="text/css"> 
					
					a, .blog_lists h2 a:hover,
					#sidebar ul li a:hover,									
					.blog_lists h3 a:hover,
					.cols-4 ul li a:hover, .cols-4 ul li.current_page_item a,
					.recent-post h6:hover,					
					.fourbox:hover h3,
					.footer-icons a:hover,
					.sitenav ul li a:hover, .sitenav ul li.current_page_item a, 
					.postmeta a:hover
					{ color:<?php echo esc_attr( get_theme_mod('color_scheme','#e80f6f')); ?>;}
					 
					
					.pagination ul li .current, .pagination ul li a:hover, 
					#commentform input#submit:hover,					
					.nivo-controlNav a.active,
					.ReadMore:hover,
					.appbutton:hover,					
					.slide_info .slide_more,				
					h3.widget-title,					
					.sitenav ul li.current-menu-ancestor a.parent,					
					#sidebar .search-form input.search-submit,				
					.wpcf7 input[type='submit']					
					{ background-color:<?php echo esc_attr( get_theme_mod('color_scheme','#e80f6f')); ?>;}
					
					
					.footer-icons a:hover							
					{ border-color:<?php echo esc_attr( get_theme_mod('color_scheme','#e80f6f')); ?>;}					
					
					
			</style> 
<?php                    
}
         
add_action('wp_head','beautiplus_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function beautiplus_customize_preview_js() {
	wp_enqueue_script( 'beautiplus_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'beautiplus_customize_preview_js' );


function beautiplus_custom_customize_enqueue() {
	wp_enqueue_script( 'beautiplus-custom-customize', get_template_directory_uri() . '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'beautiplus_custom_customize_enqueue' );