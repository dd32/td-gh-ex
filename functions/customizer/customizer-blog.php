<?php
function corpbiz_blog_customizer( $wp_customize ) {

// list control categories	
if ( ! class_exists( 'WP_Customize_Control' ) ) return NULL;

 class Category_Dropdown_Custom_Control1 extends WP_Customize_Control
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

	//index Blog section panel
	$wp_customize->add_panel( 'corpbiz_blog_options', array(
		'priority'       => 700,
		'capability'     => 'edit_theme_options',
		'title'      => __('Blog setting', 'corpbiz'),
	) );
	
	//Blog Heading section 
	$wp_customize->add_section(
        'blog_setting',
        array(
            'title' => __('Blog Settings','corpbiz'),
			'priority'   => 700,
			'panel' => 'corpbiz_blog_options',
			
			)
    );
	
	//Show and hide Blog section
	$wp_customize->add_setting(
	'corpbiz_options[blog_section_enabled]'
    ,
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'corpbiz_options[blog_section_enabled]',
    array(
        'label' => __('Enable Home Blog Section','corpbiz'),
        'section' => 'blog_setting',
        'type' => 'checkbox',
    )
	);
	
	//Show meta tag
	//Show and hide Blog section
	$wp_customize->add_setting(
	'corpbiz_options[blog_meta_section_settings]'
    ,
    array(
        'default' => false,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'corpbiz_options[blog_meta_section_settings]',
    array(
        'label' => __('Disable Blog Meta Section','corpbiz'),
        'section' => 'blog_setting',
        'type' => 'checkbox',
    )
	);

	$wp_customize->add_setting(
    'corpbiz_options[blog_title]',
    array(
        'default' => __('From Blog','corpbiz'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'corpbiz_options[blog_title]',array(
    'label'   => __('Latest blog Description','corpbiz'),
    'section' => 'blog_setting',
	 'type' => 'text',)  );
	
	$wp_customize->add_setting(
    'corpbiz_options[blog_description]',
    array(
        'default' => __('Lorem ipsum dolor sit ametconsectetuer adipiscing elit.','corpbiz'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'corpbiz_options[blog_description]',array(
    'label'   => __('Latest blog Description','corpbiz'),
    'section' => 'blog_setting',
	 'type' => 'text',)  );	
	 
	 
	 // add section to manage featured Latest blog on category basis	
	$wp_customize->add_setting(
    'corpbiz_options[blog_selected_category_id]',
    array(
		'capability' => 'edit_theme_options',
		'default' => 1,
		 'sanitize_callback' => 'corpbiz_prefix_sanitize_layout',
		 'type' => 'option',
		
		)
	);	
	$wp_customize->add_control( new Category_Dropdown_Custom_Control1( $wp_customize, 'corpbiz_options[blog_selected_category_id]', array(
    'label'   => __('Select Category for Latest blog','corpbiz'),
    'section' => 'blog_setting',
    'settings'   => 'corpbiz_options[blog_selected_category_id]',
	) ) );
	
	$wp_customize->add_setting(
    'corpbiz_options[post_display_count]',
    array(
		'type' => 'option',
        'default' => __('3','corpbiz'),
		'sanitize_callback' => 'sanitize_text_field',
    )
	);

	$wp_customize->add_control(
    'corpbiz_options[post_display_count]',
    array(
        'type' => 'select',
        'label' => __('Select Number of Post','corpbiz'),
        'section' => 'blog_setting',
		 'choices' => array('3'=>__('3', 'corpbiz'), '6'=>__('6', 'corpbiz'), '9' => __('9','corpbiz'), '12' => __('12','corpbiz'),'15'=> __('15','corpbiz')),
		));
	
	}
	add_action( 'customize_register', 'corpbiz_blog_customizer' );
	
	function corpbiz_prefix_sanitize_layout( $blog ) {
    if ( ! in_array( $blog, array( 1,'category_blog' ) ) )    
    return $blog;
	}
	add_action( 'customize_register', 'corpbiz_blog_customizer' );
	?>