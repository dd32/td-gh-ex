<?php
function avocation_theme_customizer( $wp_customize ) {
    /* sections */
    $wp_customize->add_section( 'avocation_basic_section' , array(
    'title'       => __( 'Basic Settings', 'avocation' ),
    'priority'    => 30,
	) );
	
	$wp_customize->add_panel( 'home_id', array(
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => 'Home Page Settings',
		'description'    => '',
		
		'priority'    => 30,
	) );

    $wp_customize->add_section( 'avocation_silder_section' , array(
		'title'       => __( 'Slider Section', 'avocation' ),
		'priority'    => 30,
		'panel'  => 'home_id',
	) );

	$wp_customize->add_section( 'avocation_Purpose_business_section' , array(
		'title'       => __( 'Purpose Business Section', 'avocation' ),
		'priority'    => 30,
		'panel'  => 'home_id',
	) );
    $wp_customize->add_section( 'avocation_blog_section' , array(
		'title'       => __( 'Blog Section', 'avocation' ),
		'priority'    => 30,
		'panel'  => 'home_id',
	) );
   
        
	$wp_customize->add_section( 'avocation_social_icons_section', array(
		'title'          => 'Social Settings',
		'priority'       => 35,
	) );
	

	/* basic section */
	$wp_customize->add_setting( 'avocation_logo' ,array(
		'sanitize_callback' => 'esc_attr',
		)
	 );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'avocation_logo', array(
		'label'    => __( 'Logo (Recommended size 182 x 39)', 'avocation' ),
		'section'  => 'avocation_basic_section',
		'settings' => 'avocation_logo',
	) ) );

	$wp_customize->add_setting( 'avocation_favicon',array(
		'sanitize_callback' => 'esc_attr',
		)
	 );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'avocation_favicon', array(
    'label'    => __( 'Favicon (Recommended size 32 x 32)', 'avocation' ),
    'section'  => 'avocation_basic_section',
    'settings' => 'avocation_favicon',
    
	) ) );

	$wp_customize->add_setting( 'avocation_blogtitle', array(
            'default'        => ' ',
            'sanitize_callback' => 'esc_attr',
        ) );
    
    $wp_customize->add_control( 'avocation_blogtitle', array(
		'label'   => 'Blog Title',
		'section' => 'avocation_basic_section',
		'type'    => 'text',
        ) );

	$wp_customize->add_setting( 'copyright_url_setting', array(
		'default'        => '',
		'sanitize_callback' => 'esc_html',
	) );
	
	$wp_customize->add_control( 'copyright_url_setting', array(
		'label'   => 'Copyright text',
		'section' => 'avocation_basic_section',
		'type'    => 'text'
	) );
	
	//Purpose Business Settings
	$wp_customize->add_setting( 'avocation_purposetitle', array(
		'default'        => '',
		'sanitize_callback' => 'esc_attr',
	) );
    
    $wp_customize->add_control( 'avocation_purposetitle', array(
		'label'   => 'Purpose Business Title',
		'section' => 'avocation_Purpose_business_section',
		'type'    => 'text',
    ) );
	
	 $wp_customize->add_setting( 'avocation_purposeinfo', array(
		'default'        => '',
		'sanitize_callback' => 'esc_textarea',
	) );
    
    $wp_customize->add_control( 'avocation_purposeinfo', array(
		'label'   => 'Purpose Business Info',
        'section' => 'avocation_Purpose_business_section',
        'type'    => 'textarea',
           
    ) );
	$wp_customize->add_setting( 'avocation_purpose_image',array(
		'sanitize_callback' => 'esc_attr',
		)
	);
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'avocation_purpose_image', array(
			'label'    => __( 'Background Image (Recommended size 1280 x 853)', 'avocation' ),
			'section'  => 'avocation_Purpose_business_section',
			'settings' => 'avocation_purpose_image',
		) 
	) );
        
	//Blog Section
	$wp_customize->add_setting( 'avocation_blog-title', array(
		'default'        => '',
		'sanitize_callback' => 'esc_attr',
	) );
    
    $wp_customize->add_control( 'avocation_blog-title', array(
		'label'   => 'Blog Title',
        'section' => 'avocation_blog_section',
        'type'    => 'text'
    ) );
		
	$wp_customize->add_setting( 'avocation_bloginfo', array(
		'default'        => '',
		'sanitize_callback' => 'esc_textarea',
	) );
    
    $wp_customize->add_control( 'avocation_bloginfo', array(
		'label'   => 'Blog Info',
        'section' => 'avocation_blog_section',
        'type'    => 'textarea',
    ) );
        
	$avocation_args = array(
	'posts_per_page'=> -1,
	'meta_query' => array(
						array(
						'key' => '_thumbnail_id',
						'compare' => 'EXISTS'
							),
						)
					);  
	$avocation_post = new WP_Query( $avocation_args );
	$avocation_cat_id=array();
	while($avocation_post->have_posts()){
	$avocation_post->the_post();
	$avocation_post_categories = wp_get_post_categories( get_the_id());
	foreach($avocation_post_categories as $avocation_post_category)
		$avocation_cat_id[]=$avocation_post_category;
	}
	
	$avocation_cat_id=array_unique($avocation_cat_id);
	$avocation_args = array(
	'orderby' => 'name',
	'parent' => 0,
	'include'=>$avocation_cat_id,
	
	);
	$avocation_cats=array();$i = 0;
	$avocation_categories = get_categories($avocation_args); 
	  foreach ($avocation_categories as $avocation_category) {
		  if($i==0){
			$avocation_default = $avocation_category->term_id;
			$i++;
		}
		$avocation_cats[$avocation_category->term_id] =  $avocation_category->cat_name;
	  }        
      
	 $wp_customize->add_setting( 'avocation_blogcategory', array(
		'default'        => $avocation_default,
		'sanitize_callback' => 'esc_attr',
				
	) );
    
    $wp_customize->add_control( 'avocation_blogcategory', array(
			'label'   => 'Select Category',
            'section' => 'avocation_blog_section',
            'type'    => 'select',
            'choices' => $avocation_cats,
        ) );
                
	$wp_customize->add_setting( 'avocation_soliloquy', array(
            'default'        => '',
            'sanitize_callback' => 'absint',
        ) );
    
    $wp_customize->add_control( 'avocation_soliloquy', array(
			'label'   => 'Soliloque Slider Id',
            'section' => 'avocation_silder_section',
            'type'    => 'number',
           
        ) );    
 	 //about us
    
	// Social Section
	$wp_customize->add_setting( 'twitter_setting', array(
		'default'        => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	
	$wp_customize->add_control( 'twitter_setting', array(
		'label'   => 'Twitter URL',
		'section' => 'avocation_social_icons_section',
		'type'    => 'text',
		'priority' => 1
	) );

	$wp_customize->add_setting( 'facebook_setting', array(
		'default'        => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	
	$wp_customize->add_control( 'facebook_setting', array(
		'label'   => 'Facebook URL',
		'section' => 'avocation_social_icons_section',
		'type'    => 'text',
		'priority' => 1
	) );
	
	$wp_customize->add_setting( 'youtube_setting', array(
		'default'        => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	
	$wp_customize->add_control( 'youtube_setting', array(
		'label'   => 'YouTube URL',
		'section' => 'avocation_social_icons_section',
		'type'    => 'text',
		'priority' => 1
	) );
	
	$wp_customize->add_setting( 'pinterest_setting', array(
		'default'        => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	
	$wp_customize->add_control( 'pinterest_setting', array(
		'label'   => 'Pinterest URL',
		'section' => 'avocation_social_icons_section',
		'type'    => 'text',
		'priority' => 1
	) );
	
   
	$wp_customize->add_setting( 'rss_setting', array(
		'default'        => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	
	$wp_customize->add_control( 'rss_setting', array(
		'label'   => 'LinkedIn URL',
		'section' => 'avocation_social_icons_section',
		'type'    => 'text',
		'priority' => 1
	) );        
	
            
}
add_action( 'customize_register', 'avocation_theme_customizer' );

?>
