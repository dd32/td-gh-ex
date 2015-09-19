<?php
function corpbiz_slider_customizer( $wp_customize ) {

// list control categories	
if ( ! class_exists( 'WP_Customize_Control' ) ) return NULL;

 class Category_Dropdown_Custom_Control extends WP_Customize_Control
 {
    private $cats = false;
	
    public function __construct($wp_customize, $id, $args = array(), $options = array())
    {
        $this->cats = get_categories($options);
        parent::__construct( $wp_customize, $id, $args );
    }

    public function render_content()
       {
            if(!empty($this->cats))
            {
                ?>
                    <label>
                      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                      <select multiple="multiple" <?php $this->link(); ?>>
                           <?php
                                foreach ( $this->cats as $cat )
                                {
                                    printf('<option value="%s" %s>%s</option>', $cat->term_id, selected($this->value(), $cat->term_id, false), $cat->name);
                                }
                           ?>
                      </select>
                    </label>
                <?php
            }
       }
 }
// list contro categories

	//slider Section 
	$wp_customize->add_panel( 'corpbiz_slider_setting', array(
		'priority'       => 400,
		'capability'     => 'edit_theme_options',
		'title'      => __('Slider  Settings', 'corpbiz'),
	) );
	
	$wp_customize->add_section(
        'slider_section_settings',
        array(
            'title' => __('Featured Slider Settings','corpbiz'),
            'description' => '',
			'panel'  => 'corpbiz_slider_setting',)
    );
	
	//Hide slider
	
	$wp_customize->add_setting(
    'corpbiz_options[home_banner_enabled]',
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'corpbiz_options[home_banner_enabled]',
    array(
        'label' => __('Enable Home Slider on front page.','corpbiz'),
        'section' => 'slider_section_settings',
        'type' => 'checkbox',
    )
	);
	 
	 
	//slider type
	$wp_customize->add_setting(
    'corpbiz_options[slider_radio]',
    array(
        'default' => 'demo',
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    )
	);
 
$wp_customize->add_control(
    'corpbiz_options[slider_radio]',
    array(
        'type' => 'radio',
        'label' => __('Select Slider type','corpbiz'),
        'section' => 'slider_section_settings',
        'choices' => array(
            'demo' => __('Demo Slider','corpbiz'),
            'category' => __('Category Slider','corpbiz'),
        ),
    )
);	
	 
	 
	 
	// add section to manage featured slider on category basis	
	$wp_customize->add_setting(
    'corpbiz_options[slider_select_category]',
    array(
        'default' => __('Uncategorized','corpbiz'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'corpbiz_slider_sanitize_layout',
		'type'=>'option',
		)
	);	
	$wp_customize->add_control( new Category_Dropdown_Custom_Control( $wp_customize, 'corpbiz_options[slider_select_category]', array(
    'label'   => __('Select Category for Slider','corpbiz'),
    'section' => 'slider_section_settings',
    'settings'   =>  'corpbiz_options[slider_select_category]',
	) ) );	
	 
	 //Slider Animation duration

	$wp_customize->add_setting(
    'corpbiz_options[animationSpeed]',
    array(
        'default' => __('1500','corpbiz'),
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));

	$wp_customize->add_control(
    'corpbiz_options[animationSpeed]',
    array(
        'type' => 'select',
        'label' => __('Animation speed','corpbiz'),
        'section' => 'slider_section_settings',
		 'choices' => array('500'=>'0.5','1000'=>'1.0','1500'=>'1.5','2000'=>'2.0','2500'=>'2.5','3000'=>'3.0','3500'=>'3.5','4000'=>'4.0','4500'=>'4.5','5000'=>'5.0','5500'=>'5.5'),
		
		));
		
	//Slide Show Speed
	$wp_customize->add_setting(
    'corpbiz_options[slideshowSpeed]',
    array(
        'default' => __('2500','corpbiz'),
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
    ));

	$wp_customize->add_control(
    'corpbiz_options[slideshowSpeed]',
    array(
        'type' => 'select',
        'label' => __('Slideshow speed','corpbiz'),
        'section' => 'slider_section_settings',
		 'choices' => array('500'=>'0.5','1000'=>'1.0','1500'=>'1.5','2000'=>'2.0','2500'=>'2.5','3000'=>'3.0','3500'=>'3.5','4000'=>'4.0','4500'=>'4.5','5000'=>'5.0','5500'=>'5.5'),
		
		));	
		}
	add_action( 'customize_register', 'corpbiz_slider_customizer' );
	
	function corpbiz_slider_sanitize_layout( $value ) {
    if ( ! in_array( $value, array( 'Uncategorized','category_slider' ) ) )    
    return $value;
	}
	?>