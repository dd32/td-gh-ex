<?php 

/** Header Settings **/

	$agensy_post_lists = agensy_post_lists(); 
	$agensy_cat_list   = agensy_cat_lists();   

	$wp_customize->add_panel( 'agensy_header_setting',array(
        'title' 		=>		 esc_html__('Header Setting','agensy'),
        'priority'	    =>	 	 1,
    ));

	$wp_customize->add_section('agensy_header_setting_section', array(
		'title'			=> 			esc_html__('Top Header','agensy'),
		'panel'			=> 			'agensy_header_setting'
	));


	$wp_customize->add_setting('agensy_email_header_control', array(
		'sanitize_callback' => 'esc_html',
	));

	$wp_customize->add_control( 'agensy_email_header_control', array(
		'label'		 => 		esc_html__('Enter Email','agensy'),
		'type'		 => 		'text',
		'section' 	 =>			'agensy_header_setting_section'
	));

	$wp_customize->add_setting('agensy_phone_header_control',array(
		'sanitize_callback' => 'esc_html',
	));


	$wp_customize->add_control( 'agensy_phone_header_control', array(
		'label'   => 		esc_html__('Enter Phone','agensy'),
		'type'	  => 		'text',
		'section' => 		'agensy_header_setting_section'
	));

	$wp_customize->add_setting( 'agensy_header_icon_enable',array(
        'sanitize_callback' => 'agensy_sanitize_textarea',
        'default'           => 'on'
    ));

	$wp_customize->add_control( new agensy_Switch_Control( $wp_customize,'agensy_header_icon_enable',array(
       'label'         	=> esc_html__( 'Show social icons on header', 'agensy' ),
       'section'       	=> 'agensy_header_setting_section',
       'priority'		=> 1,
       'on_off_label'  	=> array(
         'on'          	=> esc_html__( 'Show', 'agensy' ),
         'off'         	=> esc_html__( 'Hide', 'agensy' ),
    ))));

	/** Social Icons **/

	$wp_customize->add_panel( 'agensy_general_setting',array(
        'title'			=> esc_html__('General Setting','agensy'),
        'description'	=> esc_html__('it shows Header setting','agensy'),
        'priority'		=> 1,
    ));


	$wp_customize->add_section( 'agensy_social_icon_section', array(
        'priority'     => 1,
        'panel'        => 'agensy_header_setting',
        'title'        => esc_html__('Social Icons', 'agensy'),
        'description'  => esc_html__('Manage social icons for your site', 'agensy'),
    ));

	// show social icons on header

	$social_icons = array('facebook','twitter','googlePlus','dribbble','youtube','linkedin');
	foreach( $social_icons as $social_icon){
	    
	    $wp_customize->add_setting( 'agensy_'.$social_icon.'_url', array(
            'sanitize_callback' => 'esc_url_raw'
        ));
	    $wp_customize->add_control( 'agensy_'.$social_icon.'_url', array(
            'section'       => 'agensy_social_icon_section',
            'label'         => esc_html__('Social Icon : ','agensy').ucwords($social_icon),
            'type'          => 'text'
        ));
	}

	//add slider
	$wp_customize->add_section('agensy_slider_section',array(
		'priority'		=>	1,
		'panel'			=>	'agensy_home_page_setting',
		'title'			=>	esc_html__('Slider Settings','agensy'),
	));

	$home_sliders = array('one','two', 'three' );
	foreach( $home_sliders as $home_slider ){

		$wp_customize->add_setting('agensy_banner_'.$home_slider.'_instruction',array(
			'sanitize_callback' =>	'esc_url',
		));

		$wp_customize->add_control( new Agensy_Section_Typo_Seperator($wp_customize,'agensy_banner_'.$home_slider.'_instruction',array(
	           'label'      => esc_html__( 'Banner Image', 'agensy' ). $home_slider,
	           'section'    => 'agensy_slider_section',
	    )));
		

		$wp_customize->add_setting('agensy_slider_page_'.$home_slider.'_control',array(
			'sanitize_callback' => 'absint',
			'default'			=> ''
		));

		$wp_customize->add_control('agensy_slider_page_'.$home_slider.'_control',array(
		 	'label'			=> esc_html__('Slider Page ','agensy'),
        	'description'	=> esc_html__('Choose page for Slider Section','agensy'),
			'type'			=> 'dropdown-pages',
			'section'		=> 'agensy_slider_section',
		));

		$wp_customize->add_setting('agensy_slider_'.$home_slider.'_btn_control',array(
			'sanitize_callback' => 'esc_html',
		));

		$wp_customize->add_control('agensy_slider_'.$home_slider.'_btn_control',array(
			'label'		=> esc_html__('Button ','agensy').$home_slider,
			'type'		=> 'text',
			'section'	=> 'agensy_slider_section',
		));

		$wp_customize->add_setting('agensy_slider_'.$home_slider.'_url_control',array(
			'sanitize_callback' => 'esc_url',
		));

		$wp_customize->add_control('agensy_slider_'.$home_slider.'_url_control',array(
			'label'		=> esc_html__('Button Url','agensy'),
			'type'		=> 'url',
			'section'	=> 'agensy_slider_section',
		));
	}
	//adding image breadcrumb in general setting panel


    $wp_customize->add_setting( 'agensy_breadcrumb_image_enable',array(
		'sanitize_callback' => 'agensy_sanitize_textarea',
    ));

	$wp_customize->add_control( new agensy_Switch_Control( $wp_customize,'agensy_breadcrumb_image_enable',array(
       'section'       => 'header_image',
       'priority'	   => 1,
       'label'         => esc_html__( 'Enable Inner Page Header Image', 'agensy' ),
       'on_off_label'  => array(
       	'on'           => esc_html__( 'Show', 'agensy' ),
       	'off'          => esc_html__( 'Hide', 'agensy' ),
    ))));

	$wp_customize->add_section('header_image',array(
		'panel'			=> 'agensy_general_setting',
		'title'			=> esc_html__('Inner Page Header Image','agensy'),
	));

 //    $wp_customize->add_setting( 'header_image', array(
 //        'sanitize_callback' => 'esc_url',
 //    ));

	// $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'header_image',array(
 //       'label'      	=> esc_html__( 'Upload a Image', 'agensy' ),
 //       'description'	=> esc_html__('upload a image for BreadCrumb section','agensy'),
 //       'section'    	=> 'agensy_breadcrumb_section',
 //    )));


	//design settings 
	$wp_customize->add_section('agensy_blog_post_display_section',array(
		'panel'			=> 'agensy_general_setting',
		'title'			=> esc_html__('Blog Category Post','agensy'),
        'description' => esc_html__('Choose Categories to exclude posts in Blog Page','agensy'),

	));

	/** Exclude Multiple Category Control **/
       class agensy_Select_Mul_Cat_Control extends WP_Customize_Control {
           public function render_content() {
               $cats = $this->agensy_get_cat_list();
               $values = $this->value();
               
               if ( empty( $cats ) )
               return;
               ?>
               <label>
                   <?php if ( ! empty( $this->label ) ) : ?>
                       <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                   <?php endif;
                   if ( ! empty( $this->description ) ) : ?>
                       <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
                   <?php endif; ?>
                   
                   <?php if ( ! empty( $this->label ) ) : ?>
                       <div class="ex-cat-wrap">
                           <?php $cat_arr = explode(',', $values); array_pop($cat_arr); $count = 1; ?>
                           
                           <?php foreach($cats as $id => $label) : ?>
                               <div class="chk-group <?php if($count++%2 == 0){echo "right";}else{echo "left";} ?>">
                                   <input id="ex-cat-<?php echo absint($id); ?>" type="checkbox" value="<?php echo absint($id); ?>" <?php if(in_array($id,$cat_arr)){ echo "checked"; }; ?> />
                                   <label for="ex-cat-<?php echo absint($id); ?>"><?php echo esc_attr($label); ?></label>
                               </div>
                           <?php endforeach; ?>
                       </div>
                       <input type="hidden" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
                   <?php endif; ?>    
               </label>
               <?php
           }
           public function agensy_get_cat_list() {
               $catlist = array();
               $categories = get_categories( array('hide_empty' => 0) );
               
               foreach($categories as $cat){
                   $catlist[$cat->term_id] = $cat->name;
               }
               
               return $catlist;
           }
        }


	/** Blog Exclude Category Control  **/
   $wp_customize->add_setting( 'agensy_exclude_cat' , array( 'default' => 0, 'sanitize_callback' => 'sanitize_text_field') );
   
   $wp_customize->add_control( new agensy_Select_Mul_Cat_Control( $wp_customize,'agensy_exclude_cat',array(
       'label'      => esc_html__( 'Exclude Category', 'agensy' ),
       'description' => esc_html__('Exclude categories from blog page', 'agensy'),
       'section'    => 'agensy_blog_post_display_section',
   )));



	//adding homepage setting panel

	$wp_customize->add_panel( 'agensy_home_page_setting',array(
        'title'			=> esc_html__('Home Section','agensy'),
        'description'	=> esc_html__('it shows Home Section','agensy'),
        'priority'		=> 3,
    ));

	$wp_customize->add_section('agensy_home_page_section',array(
		'panel'			=> 'agensy_home_page_setting',
		'title'			=> esc_html__('About Us Section','agensy'),
	));

	$wp_customize->add_setting( 'agensy_home_about_us_enable',array(
        'sanitize_callback' => 'agensy_sanitize_textarea',
        'default'           => 'on'
	));

	$wp_customize->add_control( new agensy_Switch_Control( $wp_customize,'agensy_home_about_us_enable',array(
       'section'       	=> 'agensy_home_page_section',
		'label'			=> esc_html__('Enable About Us','agensy'),
		'priority'		=> 1,
       	'on_off_label'  => array(
         'on'          	=> esc_html__( 'Yes', 'agensy' ),
         'off'          => esc_html__( 'No', 'agensy' ),
    ))));

    $wp_customize->add_setting( 'agensy_about_page', array(
	    'sanitize_callback' => 'absint',
	));


	$wp_customize->add_control('agensy_about_page', array(
        'label'			=> esc_html__('About Us Page','agensy'),
        'description'	=> esc_html__('Choose page for about us section','agensy'),
        'type'			=> 'dropdown-pages',
        'section'		=> 'agensy_home_page_section',
        'priority'		=> 10
	));

  //FAQ Section
 	$wp_customize->add_section('agensy_faq_section',array(
		'panel' => 'agensy_home_page_setting',
		'title' => esc_html__('FAQ Section','agensy'),
	));

	$wp_customize->add_setting( 'agensy_home_faq_enable',array(
        'sanitize_callback' => 'agensy_sanitize_textarea',
        'default'           => 'on'
    ));

	$wp_customize->add_control( new agensy_Switch_Control( $wp_customize,'agensy_home_faq_enable',array(
       'label'         	=> esc_html__( 'Enable FAQ Section', 'agensy' ),
       'section'       	=> 'agensy_faq_section',
       'priority'		=> 1,
       'on_off_label'  	=> array(
         'on'          	=> esc_html__( 'Show', 'agensy' ),
         'off'         	=> esc_html__( 'Hide', 'agensy' ),
    ))));

	$wp_customize->add_setting('agensy_faq_title', array(
        'sanitize_callback' => 'esc_html',
    ));

    $wp_customize->add_control('agensy_faq_title', array(
        'label'			=> esc_html__('FAQ Section Title','agensy'),
        'type'			=> 'text',
        'priority'		=> 2,
        'section'		=> 'agensy_faq_section'
    ));

    $wp_customize->add_setting( 'agensy_faq_description', array(
	    'sanitize_callback'	=> 'esc_html',
	));


	$wp_customize->add_control('agensy_faq_description', array(
        'label'			=> esc_html__('FAQ Section Description','agensy'),
        'type'			=> 'textarea',
        'section'		=> 'agensy_faq_section',
        'priority'		=> 3,
	));

	$faq_pages = array('one','two', 'three' );
	foreach( $faq_pages as $faq_page ){
		$wp_customize->add_setting( 'agensy_'.$faq_page.'_faq_pages', array(
		    'sanitize_callback'		=> 'absint',
		    'default'				=> 0,
		));

		$wp_customize->add_control('agensy_'.$faq_page.'_faq_pages', array(
	        'label'			=> esc_html__('Page ','agensy').$faq_page,
	        'description'	=> esc_html__('Choose page for FAQ tab','agensy'),
	        'type'			=> 'dropdown-pages',
	        'section'		=> 'agensy_faq_section',
		        
		));
	}

	$wp_customize->add_setting( 'agensy_faq_background_image', array(
	    'sanitize_callback' => 'esc_url_raw',
	));


	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'agensy_faq_background_image',array(
       'label'      	=> esc_html__( 'Upload Background Image', 'agensy' ),
       'description'	=> esc_html__('upload a image for faq section','agensy'),
       'section'    	=> 'agensy_faq_section',
    )));

    //adding feature section

    $wp_customize->add_section('agensy_features_section',array(
		'panel'	=> 'agensy_home_page_setting',
		'title'	=> esc_html__('Features Section','agensy'),
	));

	$wp_customize->add_setting( 'agensy_enable_features_control',array(
        'sanitize_callback' => 'agensy_sanitize_textarea',
        'default'           => 'on'
    ));

	$wp_customize->add_control( new agensy_Switch_Control( $wp_customize,'agensy_enable_features_control',array(
       'label'         	=> esc_html__( 'Enable Features Section', 'agensy' ),
       'section'       	=> 'agensy_features_section',
       'priority'		=> 1,
       'on_off_label'  	=> array(
         'on'          	=> esc_html__( 'Show', 'agensy' ),
         'off'         	=> esc_html__( 'Hide', 'agensy' ),
    ))));


	$wp_customize->add_setting('agensy_features_title_control',array(
		'sanitize_callback' => 'esc_html',
	));


	$wp_customize->add_control( 'agensy_features_title_control', array(
		'label'			=> esc_html__('Feature Section Title','agensy'),
		'priority'		=> 2,
		'type'			=> 'text',
		'section'		=> 'agensy_features_section'
	));

	$wp_customize->add_setting('agensy_features_description_control',array(
		'sanitize_callback' => 'esc_html',
	));


	$wp_customize->add_control( 'agensy_features_description_control', array(
		'label'		=> esc_html__('Features Section Description','agensy'),
		'priority'	=> 3,
		'type'		=> 'textarea',
		'section'	=> 'agensy_features_section'
	));

	$features_pages = array('one','two', 'three' );

	foreach( $features_pages as $features_page ){
		

		$wp_customize->add_setting( 'agensy_'.$features_page.'_features_pages', array(
		    'sanitize_callback' => 'absint',
		    'default'           => 0,
		));

		 $wp_customize->add_control('agensy_'.$features_page.'_features_pages', array(
		        'label'			=> esc_html__('Page ','agensy').$features_page,
		        'type'			=> 'dropdown-pages',
		        'section'		=> 'agensy_features_section',
		        'priority'		=> 10
		));
	}


  	$wp_customize->add_setting('agensy_features_notice',array(
		'sanitize_callback' =>'esc_html',
	));

	$wp_customize->add_control( new Agensy_Notice_Instruction($wp_customize,'agensy_features_notice',array(
       'label'      	=> esc_html__( 'Notice', 'agensy' ),
       'section'    	=> 'agensy_features_section',
       'description' 	=>esc_html__('Choose the pages.The title, content and featured image will be displayed as featured block','agensy'),
     
     )));

//for service section

	$wp_customize->add_section('agensy_service_slider_section', array(
    'title'	=> esc_html__('Services Section','agensy'),
    'panel'	=> 'agensy_home_page_setting',

	));

	$wp_customize->add_setting( 'agensy_enable_service_slider_control',array(
        'sanitize_callback' => 'agensy_sanitize_textarea',
        'default'           => 'on'
    ));

	$wp_customize->add_control( new agensy_Switch_Control( $wp_customize,'agensy_enable_service_slider_control',array(
       'label'         	=> esc_html__( 'Enable Service Section', 'agensy' ),
       'section'       	=> 'agensy_service_slider_section',
       'priority'		=> 1,
       'on_off_label'  	=> array(
         'on'          	=> esc_html__( 'Show', 'agensy' ),
         'off'         	=> esc_html__( 'Hide', 'agensy' ),
    ))));

	$services_pages = array('one','two', 'three','four','five' );

	foreach( $services_pages as $services_page ){
		
		$wp_customize->add_setting( 'agensy_'.$services_page.'_slider_pages', array(
		    'sanitize_callback' => 'absint',
		    'default'           => 0,
		));

		 $wp_customize->add_control('agensy_'.$services_page.'_slider_pages', array(
		        'label'			=> esc_html__('Page ','agensy').$services_page,
		        'type'			=> 'dropdown-pages',
		        'section'		=> 'agensy_service_slider_section',
		));
	}

	$wp_customize->add_setting('agensy_service_notice',array(
		'sanitize_callback' =>'esc_html',
	));

	$wp_customize->add_control( new Agensy_Notice_Instruction($wp_customize,'agensy_service_notice',array(
       'label'			=> esc_html__( 'Notice', 'agensy' ),
       'section'		=> 'agensy_service_slider_section',
       'description'	=> esc_html__('Choose the pages. The title, content and featured image will be displayed in service slider','agensy'),
    )));

	//for team section
	$wp_customize->add_section('agensy_team_page_section', array(
	    'title' => esc_html__('Team Section','agensy'),
	    'panel' => 'agensy_home_page_setting',

	));

	$wp_customize->add_setting( 'agensy_team_page_enable',array(
        'sanitize_callback' => 'agensy_sanitize_textarea',
        'default'           => 'on'
    ));

	$wp_customize->add_control( new agensy_Switch_Control( $wp_customize,'agensy_team_page_enable',array(
       'label'         	=> esc_html__( 'Enable Features Section', 'agensy' ),
       'section'       	=> 'agensy_team_page_section',
       'priority'		=> 1,
       'on_off_label'  	=> array(
         'on'          	=> esc_html__( 'Show', 'agensy' ),
         'off'         	=> esc_html__( 'Hide', 'agensy' ),
    ))));



 	$wp_customize->add_setting('agensy_team_title',array(
        'sanitize_callback'	=> 'esc_html',
    ));

 	$wp_customize->add_control('agensy_team_title',array(
        'label'			=> esc_attr__('Team Section Title','agensy'),
        'type'			=> 'text',
        'priority'		=> 2,
        'section'		=> 'agensy_team_page_section'
    ));

	 $wp_customize->add_setting('agensy_team_description',array(
        'sanitize_callback' => 'esc_html'
    ));

	 $wp_customize->add_control( 'agensy_team_description',array(
        'label'			=> esc_html__('Team Section Sub Title','agensy'),
        'type'			=> 'textarea',
        'priority'		=> 3,
        'section'		=> 'agensy_team_page_section'
    ));

  	$wp_customize->add_setting('agensy_notice',array(
		'sanitize_callback' =>'esc_html',
	));

	$wp_customize->add_control( new Agensy_Notice_Instruction($wp_customize,'agensy_notice',array(
       'label'      	=> esc_html__( 'Notice', 'agensy' ),
       'section'    	=> 'agensy_team_page_section',
       'description' 	=>esc_html__('Configure the team section from widgets','agensy'),
     
     )));

	//for counter section

	 $wp_customize->add_section('agensy_counter_section',array(
		'panel' => 'agensy_home_page_setting',
		'title' => esc_html__('Counter Section','agensy'),
	));

	$wp_customize->add_setting( 'agensy_enable_counter_section',array(
        'sanitize_callback' => 'agensy_sanitize_textarea',
        'default'           => 'on'
    ));

	$wp_customize->add_control( new agensy_Switch_Control( $wp_customize,'agensy_enable_counter_section',array(
       'label'         	=> esc_html__( 'Enable Counter', 'agensy' ),
       'section'       	=> 'agensy_counter_section',
       'priority'		=> 1,
       'on_off_label'  	=> array(
         'on'          	=> esc_html__( 'Show', 'agensy' ),
         'off'         	=> esc_html__( 'Hide', 'agensy' ),
    ))));


	$team_counters = array('one','two', 'three' );

	foreach( $team_counters as $team_counter ){

		$wp_customize->add_setting('agensy_banner_'.$team_counter.'_instruction',array(
			'sanitize_callback' =>'esc_html',
		));

		$wp_customize->add_control( new Agensy_Section_Typo_Seperator($wp_customize,'agensy_banner_'.$team_counter.'_instruction',array(
		       'label'      => esc_html__( 'Counter ', 'agensy' ). $team_counter,
		       'section'    => 'agensy_counter_section',
		 )));
	

		$wp_customize->add_setting('agensy_team_'.$team_counter.'_counter_value',array(
			'sanitize_callback' => 'absint',
		));


		$wp_customize->add_control('agensy_team_'.$team_counter.'_counter_value', array(
			'label'			=> esc_html__(' Counter Value','agensy'),
			'type'			=> 'number',
			'section'		=> 'agensy_counter_section'
		));

		 $wp_customize->add_setting( 'agensy_team_'.$team_counter.'_counter_pages', array(
		    'sanitize_callback' => 'absint',
		    'default'           => 0,
		));

		 $wp_customize->add_control('agensy_team_'.$team_counter.'_counter_pages', array(
		        'label'			=> esc_html__('Select Page  ','agensy'),
		        'description'	=>	esc_html__('Choose page for Counter ','agensy').$team_counter,
		        'type'			=> 'dropdown-pages',
		        'section'		=> 'agensy_counter_section',
		));

	}

	//for blog section

	$wp_customize->add_section('agensy_blog_page_section', array(
	    'title' => esc_html__('Blog Section','agensy'),
	    'panel' => 'agensy_home_page_setting',

	));

	$wp_customize->add_setting( 'agensy_blog_page_enable',array(
        'sanitize_callback' => 'agensy_sanitize_textarea',
        'default'           => 'on'
    ));

	$wp_customize->add_control( new agensy_Switch_Control( $wp_customize,'agensy_blog_page_enable',array(
       'label'         	=> esc_html__( 'Enable Blog Section', 'agensy' ),
       'section'       	=> 'agensy_blog_page_section',
       'priority'		=> 1,
       'on_off_label'  	=> array(
         'on'          	=> esc_html__( 'Show', 'agensy' ),
         'off'         	=> esc_html__( 'Hide', 'agensy' ),
    ))));


	$wp_customize->add_setting('agensy_blog_title',array(
        'sanitize_callback' => 'esc_html'
	));

	$wp_customize->add_control('agensy_blog_title',array(
        'label'			=> esc_attr__('Blog  Title','agensy'),
        'type'			=> 'text',
        'priority'		=> 2,
        'section'		=> 'agensy_blog_page_section'
	));

	$wp_customize->add_setting('agensy_blog_description',array(
        'sanitize_callback' => 'esc_html'
    ));

	$wp_customize->add_control( 'agensy_blog_description',array(
        'label'			=> esc_html__('Blog Description','agensy'),
        'type'			=> 'textarea',
        'priority'		=> 3,
        'section'		=> 'agensy_blog_page_section'
	));

	$wp_customize->add_setting( 'agensy_blog_view', array(
        'sanitize_callback' => 'esc_html',
        'default'           => esc_html__('View All','agensy'),
    ));

	$wp_customize->add_control( 'agensy_blog_view', array(
        'section'      => 'agensy_blog_page_section',
        'label'        => esc_html__( 'View all button text', 'agensy' ),
        'type'         => 'text'
    ));

	//for logo section

	$wp_customize->add_section('agensy_logo_section', array(
	    'title'		=> esc_html__('Logo Section','agensy'),
	    'panel'		=> 'agensy_home_page_setting',

	));

	$wp_customize->add_setting( 'agensy_client_logo_enable',array(
        'sanitize_callback' => 'agensy_sanitize_textarea',
        'default'           => 'on'
    ));

	$wp_customize->add_control( new agensy_Switch_Control( $wp_customize,'agensy_client_logo_enable',array(
       'label'         	=> esc_html__( 'Show social icons on header', 'agensy' ),
       'section'       	=> 'agensy_logo_section',
       'priority'		=> 1,
       'on_off_label'  	=> array(
         'on'          	=> esc_html__( 'Show', 'agensy' ),
         'off'         	=> esc_html__( 'Hide', 'agensy' ),
    ))));

    $wp_customize->add_setting( 'agensy_client_logo_rep', array(
    'sanitize_callback' => 'agensy_sanitize_repeater',
    'default' => json_encode(
        array(
            array(
                'cl_logo' => '',
                'cl_url'  => '',
            )
        )
    )
	));

	$wp_customize->add_control(  new agensy_Repeater_Controler( $wp_customize, 'agensy_client_logo_rep', 
	    array(
	        'label'                        => esc_html__('Client Logo Options','agensy'),
	        'section'                      => 'agensy_logo_section',
	        'agensy_box_label'         => esc_html__('Logo','agensy'),
	        'agensy_box_add_control'   => esc_html__('Add Client Logo','agensy'),
	    ),
	        array(
	            'cl_logo' => array(
	            'type'        => 'upload',
	            'label'       => esc_html__( 'Client Logo', 'agensy' ),
	            'default'     => '',
	            'class'       => 'un-bottom-block-cat1'
	        ),
	            
		        'cl_url' => array(
		        'type'        => 'text',
		        'label'       => esc_html__( 'Client URL', 'agensy' ),
		        'default'     => '',
		        'class'       => 'un-bottom-block-cat1'
	    ) 
	    )
	));

	//for footer section
	$wp_customize->add_panel( 'agensy_footer_setting',array(
        'title' 		=>		 esc_html__('Footer Setting','agensy'),
        'description' 	=>       esc_html__('It shows Footer setting','agensy'),
    ));

	$wp_customize->add_section('agensy_footer_page_section', array(
	    'title'		=> esc_html__('Footer Section','agensy'),
	    'panel'		=> 'agensy_footer_setting',

	));

	$wp_customize->add_setting( 'agensy_footer_icon_enable',array(
		'sanitize_callback' => 'agensy_sanitize_textarea',
		'default'           => 'on'
    ));

	$wp_customize->add_control( new agensy_Switch_Control( $wp_customize,'agensy_footer_icon_enable',array(
       'section'       => 'agensy_footer_page_section',
       'label'         => esc_html__( 'Show social icons on Footer', 'agensy' ),
       'on_off_label'  => array(
       	'on'           => esc_html__( 'Show', 'agensy' ),
       	'off'          => esc_html__( 'Hide', 'agensy' ),
    ))));

    $wp_customize->add_setting( 'agensy_footer_copyright', array(
             'sanitize_callback' => 'wp_kses_post',
    ));

	$wp_customize->add_control( 'agensy_footer_copyright', array(

        'label'			=> esc_html__('Footer Copyright','agensy'),
        'type'			=> 'text',
        'section'		=> 'agensy_footer_page_section'
    ));

	$wp_customize->add_setting( 'agensy_footer_image_control',array(
		'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'agensy_footer_image_control', array(
       'label'      => esc_html__( 'Upload a logo', 'agensy' ),
       'section'    => 'agensy_footer_page_section',
    )));

	$wp_customize->add_setting('agensy_skin_color',array(
	                'default' => '#cba14c',
	                'sanitize_callback'=>'sanitize_text_field'
	            ));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'agensy_skin_color', array(
	            'label' => esc_html__('Template Color','agensy'),
	            'description'   => esc_html__('Choose the template color','agensy'),
	            'section'    => 'colors',
	            'settings'   => 'agensy_skin_color',
	            ) ) );


