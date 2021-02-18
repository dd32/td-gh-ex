<?php
/**
 * Academic Education Theme Customizer
 *
 * @package Academic Education
 */

/**
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function academic_education_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'academic_education_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'academic-education' ),
	    'description' => __( 'Description of what this panel does.', 'academic-education' ),
	) );

	$wp_customize->add_section( 'academic_education_left_right' , array(
    	'title'      => __( 'General Settings', 'academic-education' ),
		'priority'   => 30,
		'panel' => 'academic_education_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('academic_education_theme_options',array(
        'default' => __( 'Right Sidebar', 'academic-education' ),
        'sanitize_callback' => 'academic_education_sanitize_choices'	        
	));

	$wp_customize->add_control('academic_education_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => __( 'Do you want this section', 'academic-education' ),
	        'section' => 'academic_education_left_right',
	        'choices' => array(
	            'One Column' => __('One Column ','academic-education'),
	            'Three Columns' => __('Three Columns','academic-education'),
	            'Four Columns' => __('Four Columns','academic-education'),
	            'Right Sidebar' => __('Right Sidebar','academic-education'),
	            'Left Sidebar' => __('Left Sidebar','academic-education'),
	            'Grid Layout' => __('Grid Layout','academic-education')
	        ),
	));

	$font_array = array(
    '' => __( 'No Fonts', 'academic-education' ),
    'Abril Fatface' => __( 'Abril Fatface', 'academic-education' ),
    'Acme' => __( 'Acme', 'academic-education' ),
    'Anton' => __( 'Anton', 'academic-education' ),
    'Architects Daughter' => __( 'Architects Daughter', 'academic-education' ),
    'Arimo' => __( 'Arimo', 'academic-education' ),
    'Arsenal' => __( 'Arsenal', 'academic-education' ),
    'Arvo' => __( 'Arvo', 'academic-education' ),
    'Alegreya' => __( 'Alegreya', 'academic-education' ),
    'Alfa Slab One' => __( 'Alfa Slab One', 'academic-education' ),
    'Averia Serif Libre' => __( 'Averia Serif Libre', 'academic-education' ),
    'Bangers' => __( 'Bangers', 'academic-education' ),
    'Boogaloo' => __( 'Boogaloo', 'academic-education' ),
    'Bad Script' => __( 'Bad Script', 'academic-education' ),
    'Bitter' => __( 'Bitter', 'academic-education' ),
    'Bree Serif' => __( 'Bree Serif', 'academic-education' ),
    'BenchNine' => __( 'BenchNine', 'academic-education' ),
    'Cabin' => __( 'Cabin', 'academic-education' ),
    'Cardo' => __( 'Cardo', 'academic-education' ),
    'Courgette' => __( 'Courgette', 'academic-education' ),
    'Cherry Swash' => __( 'Cherry Swash', 'academic-education' ),
    'Cormorant Garamond' => __( 'Cormorant Garamond', 'academic-education' ),
    'Crimson Text' => __( 'Crimson Text', 'academic-education' ),
    'Cuprum' => __( 'Cuprum', 'academic-education' ),
    'Cookie' => __( 'Cookie', 'academic-education' ),
    'Chewy' => __( 'Chewy', 'academic-education' ),
    'Days One' => __( 'Days One', 'academic-education' ),
    'Dosis' => __( 'Dosis', 'academic-education' ),
    'Droid Sans' => __( 'Droid Sans', 'academic-education' ),
    'Economica' => __( 'Economica', 'academic-education' ),
	'Fredoka One' => __( 'Fredoka One', 'academic-education' ),
    'Fjalla One' => __( 'Fjalla One', 'academic-education' ),
    'Francois One' => __( 'Francois One', 'academic-education' ),
    'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'academic-education' ),
    'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'academic-education' ),
    'Great Vibes' => __( 'Great Vibes', 'academic-education' ),
    'Handlee' => __( 'Handlee', 'academic-education' ),
    'Hammersmith One' => __( 'Hammersmith One', 'academic-education' ),
    'Inconsolata' => __( 'Inconsolata', 'academic-education' ),
    'Indie Flower' => __( 'Indie Flower', 'academic-education' ),
    'IM Fell English SC' => __( 'IM Fell English SC', 'academic-education' ),
    'Julius Sans One' => __( 'Julius Sans One', 'academic-education' ),
    'Josefin Slab' => __( 'Josefin Slab', 'academic-education' ),
    'Josefin Sans' => __( 'Josefin Sans', 'academic-education' ),
    'Kanit' => __( 'Kanit', 'academic-education' ),
    'Lobster' => __( 'Lobster', 'academic-education' ),
    'Lato' => __( 'Lato', 'academic-education' ),
    'Lora' => __( 'Lora', 'academic-education' ),
    'Libre Baskerville' => __( 'Libre Baskerville', 'academic-education' ),
    'Lobster Two' => __( 'Lobster Two', 'academic-education' ),
    'Merriweather' => __( 'Merriweather', 'academic-education' ),
    'Monda' => __( 'Monda', 'academic-education' ),
    'Montserrat' => __( 'Montserrat', 'academic-education' ),
    'Muli' => __( 'Muli', 'academic-education' ),
    'Marck Script' => __( 'Marck Script', 'academic-education' ),
    'Noto Serif' => __( 'Noto Serif', 'academic-education' ),
    'Open Sans' => __( 'Open Sans', 'academic-education' ),
    'Overpass' => __( 'Overpass', 'academic-education' ),
    'Overpass Mono' => __( 'Overpass Mono', 'academic-education' ),
    'Oxygen' => __( 'Oxygen', 'academic-education' ),
    'Orbitron' => __( 'Orbitron', 'academic-education' ),
    'Patua One' => __( 'Patua One', 'academic-education' ),
    'Pacifico' => __( 'Pacifico', 'academic-education' ),
    'Padauk' => __( 'Padauk', 'academic-education' ),
    'Playball' => __( 'Playball', 'academic-education' ),
    'Playfair Display' => __( 'Playfair Display', 'academic-education' ),
    'PT Sans' => __( 'PT Sans', 'academic-education' ),
    'Philosopher' => __( 'Philosopher', 'academic-education' ),
    'Permanent Marker' => __( 'Permanent Marker', 'academic-education' ),
    'Poiret One' => __( 'Poiret One', 'academic-education' ),
    'Quicksand' => __( 'Quicksand', 'academic-education' ),
    'Quattrocento Sans' => __( 'Quattrocento Sans', 'academic-education' ),
    'Raleway' => __( 'Raleway', 'academic-education' ),
    'Rubik' => __( 'Rubik', 'academic-education' ),
    'Rokkitt' => __( 'Rokkitt', 'academic-education' ),
    'Russo One' => __( 'Russo One', 'academic-education' ),
    'Righteous' => __( 'Righteous', 'academic-education' ),
    'Slabo' => __( 'Slabo', 'academic-education' ),
    'Source Sans Pro' => __( 'Source Sans Pro', 'academic-education' ),
    'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'academic-education'),
    'Shadows Into Light' => __( 'Shadows Into Light', 'academic-education' ),
    'Sacramento' => __( 'Sacramento', 'academic-education' ),
    'Shrikhand' => __( 'Shrikhand', 'academic-education' ),
    'Tangerine' => __( 'Tangerine', 'academic-education' ),
    'Ubuntu' => __( 'Ubuntu', 'academic-education' ),
    'VT323' => __( 'VT323', 'academic-education' ),
    'Varela Round' => __( 'Varela Round', 'academic-education' ),
    'Vampiro One' => __( 'Vampiro One','academic-education' ),
    'Vollkorn' => __( 'Vollkorn', 'academic-education' ),
    'Volkhov' => __( 'Volkhov','academic-education' ),
    'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz','academic-education' )
    );

	//Topbar section
	$wp_customize->add_section('academic_education_topbar',array(
		'title'	=> __('Topbar','academic-education'),
		'description'	=> __('Add Topbar Content here','academic-education'),
		'priority'	=> null,
		'panel' => 'academic_education_panel_id',
	));

	$wp_customize->add_setting('academic_education_timming',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('academic_education_timming',array(
		'label'	=> __('Add Timmings','academic-education'),
		'section'	=> 'academic_education_topbar',
		'setting'	=> 'academic_education_timming',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('academic_education_call_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('academic_education_call_text',array(
		'label'	=> __('Add Call Text','academic-education'),
		'section'	=> 'academic_education_topbar',
		'setting'	=> 'academic_education_call_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('academic_education_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('academic_education_call',array(
		'label'	=> __('Add Phone Number','academic-education'),
		'section'	=> 'academic_education_topbar',
		'setting'	=> 'academic_education_call',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('academic_education_mail_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('academic_education_mail_text',array(
		'label'	=> __('Add Email Text','academic-education'),
		'section'	=> 'academic_education_topbar',
		'setting'	=> 'academic_education_mail_text',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('academic_education_mail',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('academic_education_mail',array(
		'label'	=> __('Add Email','academic-education'),
		'section'	=> 'academic_education_topbar',
		'setting'	=> 'academic_education_mail',
		'type'		=> 'text'
	));	

	// This is Topbar Color picker setting
	$wp_customize->add_setting( 'academic_education_topbar_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'academic_education_topbar_paragraph_color', array(
		'label' => __('Topbar Color', 'academic-education'),
		'section' => 'academic_education_topbar',
		'settings' => 'academic_education_topbar_paragraph_color',
	)));

	// This is Topbar Font Size setting
	$wp_customize->add_setting('academic_education_topbar_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('academic_education_topbar_paragraph_font_size',array(
		'label'	=> __('Topbar Font Size','academic-education'),
		'section'	=> 'academic_education_topbar',
		'setting'	=> 'academic_education_topbar_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is Logo Tag Color picker setting
	$wp_customize->add_setting( 'academic_education_topbar_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'academic_education_topbar_atag_color', array(
		'label' => __('Logo', 'academic-education'),
		'section' => 'academic_education_topbar',
		'settings' => 'academic_education_topbar_atag_color',
	)));

	//This is logo FontFamily picker setting
	$wp_customize->add_setting('academic_education_topbar_heading_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'academic_education_sanitize_choices'
	));
	$wp_customize->add_control('academic_education_topbar_heading_font_family', array(
	    'section'  => 'academic_education_topbar',
	    'label'    => __( 'Logo Font','academic-education'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is logo FontSize setting
	$wp_customize->add_setting('academic_education_topbar_heading_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('academic_education_topbar_heading_font_size',array(
		'label'	=> __('Logo Font Size','academic-education'),
		'section'	=> 'academic_education_topbar',
		'setting'	=> 'academic_education_topbar_heading_font_size',
		'type'	=> 'text'
	));

	// This is Description Color picker setting
	$wp_customize->add_setting( 'academic_education_description_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'academic_education_description_color', array(
		'label' => __('Description Color', 'academic-education'),
		'section' => 'academic_education_topbar',
		'settings' => 'academic_education_description_color',
	)));

	//This is Description FontFamily picker setting
	$wp_customize->add_setting('academic_education_description_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'academic_education_sanitize_choices'
	));
	$wp_customize->add_control('academic_education_description_font_family', array(
	    'section'  => 'academic_education_topbar',
	    'label'    => __( 'Description Fonts','academic-education'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('academic_education_description_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('academic_education_description_font_size',array(
		'label'	=> __('Description Font Size','academic-education'),
		'section'	=> 'academic_education_topbar',
		'setting'	=> 'academic_education_description_font_size',
		'type'	=> 'text'
	));

	// This is contact Color picker setting
	$wp_customize->add_setting( 'academic_education_contact_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'academic_education_contact_color', array(
		'label' => __('Contact Color', 'academic-education'),
		'section' => 'academic_education_topbar',
		'settings' => 'academic_education_contact_color',
	)));

	//This is contact Fontsize picker setting

	$wp_customize->add_setting('academic_education_contact_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('academic_education_contact_font_size',array(
		'label'	=> __('Contact Font Size','academic-education'),
		'section'	=> 'academic_education_topbar',
		'setting'	=> 'academic_education_contact_font_size',
		'type'	=> 'text'
	));
	
	//Social Icons(topbar)
	$wp_customize->add_section('academic_education_social_media',array(
		'title'	=> __('Social Media','academic-education'),
		'description'	=> __('Add Social Media Url here','academic-education'),
		'priority'	=> null,
		'panel' => 'academic_education_panel_id',
	));

	$wp_customize->add_setting('academic_education_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('academic_education_facebook_url',array(
		'label'	=> __('Add Facebook link','academic-education'),
		'section'	=> 'academic_education_social_media',
		'setting'	=> 'academic_education_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('academic_education_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('academic_education_twitter_url',array(
		'label'	=> __('Add Twitter link','academic-education'),
		'section'	=> 'academic_education_social_media',
		'setting'	=> 'academic_education_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('academic_education_google_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('academic_education_google_url',array(
		'label'	=> __('Add Google link','academic-education'),
		'section'	=> 'academic_education_social_media',
		'setting'	=> 'academic_education_google_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('academic_education_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('academic_education_youtube_url',array(
		'label'	=> __('Add Youtube link','academic-education'),
		'section'	=> 'academic_education_social_media',
		'setting'	=> 'academic_education_youtube_url',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('academic_education_pint_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('academic_education_pint_url',array(
		'label'	=> __('Add Pinterest link','academic-education'),
		'section'	=> 'academic_education_social_media',
		'setting'	=> 'academic_education_pint_url',
		'type'	=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'academic_education_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'academic-education' ),
		'priority'   => 30,
		'panel' => 'academic_education_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'academic_education_slidersettings-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'academic_education_slidersettings-page-' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'academic-education' ),
			'section'  => 'academic_education_slidersettings',
			'type'     => 'dropdown-pages'
		) );

		// This is Title Color picker setting
		$wp_customize->add_setting( 'academic_education_slider_heading_color', array(
			'default' => '',
			'sanitize_callback'	=> 'sanitize_hex_color'
		));
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'academic_education_slider_heading_color', array(
			'label' => __('Title Color', 'academic-education'),
			'section' => 'academic_education_slidersettings',
			'settings' => 'academic_education_slider_heading_color',
		)));

		//This is Title FontFamily picker setting
		$wp_customize->add_setting('academic_education_slider_heading_font_family',array(
		  'default' => '',
		  'capability' => 'edit_theme_options',
		  'sanitize_callback' => 'academic_education_sanitize_choices'
		));
		$wp_customize->add_control('academic_education_slider_heading_font_family', array(
		    'section'  => 'academic_education_slidersettings',
		    'label'    => __( 'Title Fonts','academic-education'),
		    'type'     => 'select',
		    'choices'  => $font_array,
		));

		//This is Title FontSize setting
		$wp_customize->add_setting('academic_education_slider_heading_font_size',array(
			'default'	=> '45px',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		
		$wp_customize->add_control('academic_education_slider_heading_font_size',array(
			'label'	=> __('Title Font Size','academic-education'),
			'section'	=> 'academic_education_slidersettings',
			'setting'	=> 'academic_education_slider_heading_font_size',
			'type'	=> 'text'
		));
		
		// This is content Color picker setting
		$wp_customize->add_setting( 'academic_education_slider_paragraph_color', array(
			'default' => '',
			'sanitize_callback'	=> 'sanitize_hex_color'
		));
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'academic_education_slider_paragraph_color', array(
			'label' => __('Content Color', 'academic-education'),
			'section' => 'academic_education_slidersettings',
			'settings' => 'academic_education_slider_paragraph_color',
		)));

		//This is content FontFamily picker setting
		$wp_customize->add_setting('academic_education_slider_paragraph_font_family',array(
		  'default' => '',
		  'capability' => 'edit_theme_options',
		  'sanitize_callback' => 'academic_education_sanitize_choices'
		));
		$wp_customize->add_control('academic_education_slider_paragraph_font_family', array(
		    'section'  => 'academic_education_slidersettings',
		    'label'    => __( 'Content Fonts','academic-education'),
		    'type'     => 'select',
		    'choices'  => $font_array,
		));

		$wp_customize->add_setting('academic_education_slider_paragraph_font_size',array(
			'default'	=> '12px',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		
		$wp_customize->add_control('academic_education_slider_paragraph_font_size',array(
			'label'	=> __('Content Font Size','academic-education'),
			'section'	=> 'academic_education_slidersettings',
			'setting'	=> 'academic_education_slider_paragraph_font_size',
			'type'	=> 'text'
		));

		// This is Button color picker setting
		$wp_customize->add_setting( 'academic_education_slider_atag_color', array(
			'default' => '',
			'sanitize_callback'	=> 'sanitize_hex_color'
		));
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'academic_education_slider_atag_color', array(
			'label' => __('Button color', 'academic-education'),
			'section' => 'academic_education_slidersettings',
			'settings' => 'academic_education_slider_atag_color',
		)));

		//This is Button FontFamily picker setting
		$wp_customize->add_setting('academic_education_slider_atag_font_family',array(
		  'default' => '',
		  'capability' => 'edit_theme_options',
		  'sanitize_callback' => 'academic_education_sanitize_choices'
		));
		$wp_customize->add_control('academic_education_slider_atag_font_family', array(
		    'section'  => 'academic_education_slidersettings',
		    'label'    => __( 'Button Font','academic-education'),
		    'type'     => 'select',
		    'choices'  => $font_array,
		));

	}

	//Courses
	$wp_customize->add_section('academic_education_about',array(
		'title'	=> __('Courses Section','academic-education'),
		'description'=> __('This section will appear below the slider.','academic-education'),
		'panel' => 'academic_education_panel_id',
	));	

	$post_list = get_posts();
	$i = 0;
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('academic_education_single_post',array(
		'sanitize_callback' => 'academic_education_sanitize_choices',
	));

	$wp_customize->add_control('academic_education_single_post',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','academic-education'),
		'section' => 'academic_education_about',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cats[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('academic_education_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'academic_education_sanitize_choices',
	));

	$wp_customize->add_control('academic_education_category',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Category','academic-education'),
		'section' => 'academic_education_about',
	));

	// This is our course title Color picker setting
	$wp_customize->add_setting( 'academic_education_course_heading_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'academic_education_course_heading_color', array(
		'label' => __('Title Color', 'academic-education'),
		'section' => 'academic_education_about',
		'settings' => 'academic_education_course_heading_color',
	)));

	//This is our course title FontFamily picker setting
	$wp_customize->add_setting('academic_education_course_heading_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'academic_education_sanitize_choices'
	));
	$wp_customize->add_control('academic_education_course_heading_font_family', array(
	    'section'  => 'academic_education_about',
	    'label'    => __( 'Title Fonts','academic-education'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is our course  title FontSize setting
	$wp_customize->add_setting('academic_education_course_heading_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('academic_education_course_heading_font_size',array(
		'label'	=> __('Title Font Size','academic-education'),
		'section'	=> 'academic_education_about',
		'setting'	=> 'academic_education_course_heading_font_size',
		'type'	=> 'text'
	));

	// This is our course content Color picker setting
	$wp_customize->add_setting( 'academic_education_course_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'academic_education_course_paragraph_color', array(
		'label' => __('Content Color', 'academic-education'),
		'section' => 'academic_education_about',
		'settings' => 'academic_education_course_paragraph_color',
	)));

	//This is our course content FontFamily picker setting
	$wp_customize->add_setting('academic_education_course_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'academic_education_sanitize_choices'
	));
	$wp_customize->add_control('academic_education_course_paragraph_font_family', array(
	    'section'  => 'academic_education_about',
	    'label'    => __( 'Content Fonts','academic-education'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('academic_education_course_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('academic_education_course_paragraph_font_size',array(
		'label'	=> __('Content Font Size','academic-education'),
		'section'	=> 'academic_education_about',
		'setting'	=> 'academic_education_course_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is our course  Button Color picker setting
	$wp_customize->add_setting( 'academic_education_course_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'academic_education_course_atag_color', array(
		'label' => __('Button Color', 'academic-education'),
		'section' => 'academic_education_about',
		'settings' => 'academic_education_course_atag_color',
	)));

	//This is our course Button FontFamily picker setting
	$wp_customize->add_setting('academic_education_course_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'academic_education_sanitize_choices'
	));
	$wp_customize->add_control('academic_education_course_atag_font_family', array(
	    'section'  => 'academic_education_about',
	    'label'    => __( 'Button Font','academic-education'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('academic_education_course_atag_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('academic_education_course_atag_font_size',array(
		'label'	=> __('Button Font Size','academic-education'),
		'section'	=> 'academic_education_about',
		'setting'	=> 'academic_education_course_atag_font_size',
		'type'	=> 'text'
	));
		
	//footer
	$wp_customize->add_section('academic_education_footer_section',array(
		'title'	=> __('Footer Text','academic-education'),
		'description'	=> __('Add some text for footer like copyright etc.','academic-education'),
		'panel' => 'academic_education_panel_id'
	));
	
	$wp_customize->add_setting('academic_education_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('academic_education_footer_copy',array(
		'label'	=> __('Copyright Text','academic-education'),
		'section'	=> 'academic_education_footer_section',
		'type'		=> 'text'
	));
	
}
add_action( 'customize_register', 'academic_education_customize_register' );	

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Academic_Education_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Academic_Education_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Academic_Education_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Academic Education Pro', 'academic-education' ),
					'pro_text' => esc_html__( 'Go Pro',         'academic-education' ),
					'pro_url'  => esc_url('https://www.logicalthemes.com/themes/premium-academic-education-wordpress-theme'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'academic-education-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'academic-education-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Academic_Education_Customize::get_instance();
