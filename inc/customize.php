<?php

function associationx_customize_register($wp_customize){
	
	$categories = get_categories();
	$cats = array();
	foreach( $categories as $category ) {
    	$cats[$category->term_id] = $category->name;
	} 
	
	//checkbox sanitization function
    function associationx_sanitize_checkbox( $input ){              
    	//returns true if checkbox is checked
      	return ( ( isset( $input ) && true == $input ) ? true : false );
    }
	
	//file input sanitization function
    function associationx_sanitize_image( $file, $setting ) {
    	//allowed file types
        $mimes = array(
        	'jpg|jpeg|jpe' => 'image/jpeg',
        	'gif'          => 'image/gif',
        	'png'          => 'image/png'
        );
              
        //check file type from file name
      	$file_ext = wp_check_filetype( $file, $mimes );
              
        //if file has a valid mime type return it, otherwise return default
        return ( $file_ext['ext'] ? $file : $setting->default );
	}

// AssociationX Options ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ // 
	
    $wp_customize->add_section('associationx_top', array(
        'priority' 		=> 10,
		'capability'     => 'edit_theme_options',
		'title'    		=> esc_html__('AssociationX OPTIONS', 'associationx'),
		'description'   => ' <div class="infohead">' . esc_html__('We appreciate an','associationx') . ' <a href="'.esc_url('http://wordpress.org/support/view/theme-reviews/associationx').'" target="_blank">' . esc_html__('Honest Review','associationx') . '</a> ' . esc_html__('of this Theme if you Love our Work','associationx') . '<br /> <br />

' . esc_html__('Need More Features and Options including Exciting Slide and 100+ Advanced Features? Try ','associationx') . '<a href="' . esc_url('https://d5creation.com/theme/associationx/') .'
" target="_blank"><strong>' . esc_html__('AssociationX Extend','associationx') . '</strong></a><br /> <br /> 
        
        
' . esc_html__('You can Visit the AssociationX Extend ','associationx') . ' <a href="' . esc_url('http://demo.d5creation.com/themes/?theme=Simplify') .'" target="_blank"><strong>' . esc_html__('Demo Here','associationx') . '</strong></a> 
        </div>		
		'
    ));	
	
	//  Responsive Layout
    $wp_customize->add_setting('associationx[responsive]', array(
        'default'        	=> '1',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_responsive', array(
        'label'      => esc_html__('Use Responsive Layout', 'associationx'),
        'section'    => 'associationx_top',
        'settings'   => 'associationx[responsive]',
		'description' => esc_html__('Check the Box if you want the Responsive Layout of your Website','associationx'),
		'type' 		 => 'checkbox'
    ));
	
	
	//  Top Menu Bar
    $wp_customize->add_setting('associationx[showtmbar]', array(
        'default'        	=> '1',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_showtmbar', array(
        'label'      => esc_html__('Show the Top Menu Bar', 'associationx'),
        'section'    => 'associationx_top',
        'settings'   => 'associationx[showtmbar]',
		'description' => esc_html__('Check the Box if you want to Show the Top Menu Bar','associationx'),
		'type' 		 => 'checkbox'
    ));
	
	//  Contact Number
    $wp_customize->add_setting('associationx[contactnumber]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'wp_kses_post',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_contactnumber', array(
        'label'      => esc_html__('Contact Number', 'associationx'),
        'section'    => 'associationx_top',
        'settings'   => 'associationx[contactnumber]',
		'description' => '',
		'type' 		 => 'text'
    ));
	
	//  E-Mail
    $wp_customize->add_setting('associationx[extra-num]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'wp_kses_post',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_extra-num', array(
        'label'      => esc_html__('Anything Extra After the Phone Number like E-Mail', 'associationx'),
        'section'    => 'associationx_top',
        'settings'   => 'associationx[extra-num]',
		'description' => '',
		'type' 		 => 'text'
    ));
	
	//  Breadcrumbs
    $wp_customize->add_setting('associationx[bcrumbs]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_bcrumbs', array(
        'label'      => esc_html__('Show Breadcrumbs', 'associationx'),
        'section'    => 'associationx_top',
        'settings'   => 'associationx[bcrumbs]',
		'description' => esc_html__('Show Breadcrumbs in Single News, Page, Blog, Archive, Search Results, 404 Page. Default is','associationx').' <b>'.esc_html__('Unchecked','associationx').'</b>',
		'type' 		 => 'checkbox'
    ));
	
	//  Show Site Title in One Line
    $wp_customize->add_setting('associationx[sitettloneline]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_sitettloneline', array(
        'label'      => esc_html__('Show Site Title in One Line', 'associationx'),
        'section'    => 'associationx_top',
        'settings'   => 'associationx[sitettloneline]',
		'description' => esc_html__('Check it if you want to Show the Site Title in One Lined','associationx'),
		'type' 		 => 'checkbox'
    ));
	
	//  Show This Section in Front Page
    $wp_customize->add_setting('associationx[show_fp_wpblog]', array(
        'default'        	=> '1',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_show_fp_wpblog', array(
        'label'      => esc_html__('Show Posts/Page Section in Front Page', 'associationx'),
        'section'    => 'associationx_top',
        'settings'   => 'associationx[show_fp_wpblog]',
		'description' => esc_html__('Check This to Show Posts/Page Section in Front Page','associationx'),
		'type' 		 => 'checkbox'
    ));
	
	// 404 Error Page Image
    $wp_customize->add_setting('associationx[nf404-image]', array(
        'default'           => esc_url(get_template_directory_uri() . '/images/404.jpg'),
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'associationx_sanitize_image',
        'type'           	=> 'option'
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'nf404-image', array(
        'label'    			=> esc_html__('404 Not Found Error Page Image', 'associationx'),
        'section'  			=> 'associationx_top',
        'settings' 			=> 'associationx[nf404-image]',
		'description'   	=> esc_html__('Upload an image for the 404 Not Found Error Page. You can Remove this Image for No Image','associationx')
    )));
	
	
// Slider ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ // 

 $wp_customize->add_section('associationx_slide', array(
        'priority' 		=> 11,
		'capability'     => 'edit_theme_options',
		'title'    		=> esc_html__('&nbsp;&nbsp;&nbsp;&nbsp; - Front Page Slider', 'associationx'),
        'description'   => ''
    ));
	
	// Show the Featured Boxes
    $wp_customize->add_setting('associationx[slidebox]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_slidebox', array(
        'label'      => esc_html__('Show the Slider', 'associationx'),
        'section'    => 'associationx_slide',
        'settings'   => 'associationx[slidebox]',
		'description' => '',
		'type' 		 => 'checkbox'
    ));
	
	foreach (range(1, 3) as $opsinumber) {
	  
	// Slide Image
    $wp_customize->add_setting('associationx[slide-image'. $opsinumber .']', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'associationx_sanitize_image',
        'type'           	=> 'option'
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-image'. $opsinumber, array(
        'label'    			=> esc_html__('Slide Image', 'associationx') . '-' . $opsinumber,
        'section'  			=> 'associationx_slide',
        'settings' 			=> 'associationx[slide-image'. $opsinumber .']',
		'description'   	=> esc_html__('Upload or Set any Slide Image Here. Recommended Size: 1500px X 675px','associationx')
    )));
		
	//  Automatically Add Image Title, Caption and Links
    $wp_customize->add_setting('associationx[slide-imageautomaticall-'.$opsinumber.']', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_slide-imageautomaticall-'.$opsinumber.'', array(
        'label'      => esc_html__('Automatically Add Image Title, Caption and Links', 'associationx'),
        'section'    => 'associationx_slide',
        'settings'   => 'associationx[slide-imageautomaticall-'.$opsinumber.']',
		'description' => '',
		'type' 		 => 'checkbox'
    ));	
			
	}
	
// Featured Links ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //
	
 $wp_customize->add_section('associationx_flinks', array(
        'priority' 		=> 12,
		'capability'     => 'edit_theme_options',
		'title'    		=> esc_html__('&nbsp;&nbsp;&nbsp;&nbsp; - Front Page Featured Links', 'associationx'),
        'description'   => ''
    ));
	
	//  Show the Featured Links
    $wp_customize->add_setting('associationx[srflinks]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_srflinks', array(
        'label'      => esc_html__('Show the Featured Links', 'associationx'),
        'section'    => 'associationx_flinks',
        'settings'   => 'associationx[srflinks]',
		'description' => '',
		'type' 		 => 'checkbox'
    ));
	
	//  Show the Featured Links from Featured Links Navigation Menu
    $wp_customize->add_setting('associationx[flinksfrommenu]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_flinksfrommenu', array(
        'label'      => esc_html__('Show the Featured Links from Featured Links Navigation Menu', 'associationx'),
        'section'    => 'associationx_flinks',
        'settings'   => 'associationx[flinksfrommenu]',
		'description' => esc_html__('Check this if you want to Show the Featured Links from the ', 'associationx').'<b>'.esc_html__('Featured Links', 'associationx').'</b> '.esc_html__('Navigation Menu. You can use', 'associationx').' <b>'.esc_html__('Description', 'associationx').'</b> '.esc_html__('and Use any', 'associationx'). ' <b>'.esc_html__('FontAwesome 5 Icon Name', 'associationx').'</b> '.esc_html__('like', 'associationx').' <b>fa-star</b> '.esc_html__('as a Menu Class in Custom Menu', 'associationx').'</div>',
		'type' 		 => 'checkbox'
    ));
	

// About Us ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ // 

 $wp_customize->add_section('associationx_about', array(
        'priority' 		=> 13,
		'capability'     => 'edit_theme_options',
		'title'    		=> esc_html__('&nbsp;&nbsp;&nbsp;&nbsp; - Front Page About Us', 'associationx'),
        'description'   => ''
    ));
	
	
	// Show the About Us
    $wp_customize->add_setting('associationx[showaboutus]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_showaboutus', array(
        'label'      => esc_html__('Show the About Us Section', 'associationx'),
        'section'    => 'associationx_about',
        'settings'   => 'associationx[showaboutus]',
		'description' => '',
		'type' 		 => 'checkbox'
    ));
	
	// About Us Section from a Page
    $wp_customize->add_setting('associationx[aboutus_fromm_page]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_aboutus_fromm_page', array(
        'label'      => esc_html__('About Us Section from a Page', 'associationx'),
        'section'    => 'associationx_about',
        'settings'   => 'associationx[aboutus_fromm_page]',
		'description' => esc_html__('Check this if You want to Show the About Us Part from a Page Content', 'associationx'),
		'type' 		 => 'checkbox'
    ));
	
	// Select a Page
    $wp_customize->add_setting('associationx[aboutus_page]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'absint',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_aboutus_page', array(
        'label'      => esc_html__('Select a Page to Show the Content in About Us Part', 'associationx'),
        'section'    => 'associationx_about',
        'settings'   => 'associationx[aboutus_page]',
		'description' => esc_html__('You can Select a Page to Show the Content in About Us Part', 'associationx'),
		'type' 		 => 'dropdown-pages'
    ));
	
	
// Featured Boxes ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //
	
 $wp_customize->add_section('associationx_frfb', array(
        'priority' 		=> 14,
		'capability'     => 'edit_theme_options',
		'title'    		=> esc_html__('&nbsp;&nbsp;&nbsp;&nbsp; - Front Page Featured Boxes', 'associationx'),
        'description'   => ''
    ));
	
	//  Show the Featured Boxes
    $wp_customize->add_setting('associationx[frfbox]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_frfbox', array(
        'label'      => esc_html__('Show the Featured Boxes', 'associationx'),
        'section'    => 'associationx_frfb',
        'settings'   => 'associationx[frfbox]',
		'description' => '',
		'type' 		 => 'checkbox'
    ));
	
	//  Show the Featured Boxes from the Sticky Posts
    $wp_customize->add_setting('associationx[frfboxfstk]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_frfboxfstk', array(
        'label'      => esc_html__('Show the Featured Boxes from the Sticky Posts', 'associationx'),
        'section'    => 'associationx_frfb',
        'settings'   => 'associationx[frfboxfstk]',
		'description' => esc_html__('This will show the latest 04 Sticky Posts as Featured Boxes', 'associationx'),
		'type' 		 => 'checkbox'
    ));
	
	
// Noticeboard and News ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ // 

 $wp_customize->add_section('associationx_nboard', array(
        'priority' 		=> 15,
		'capability'     => 'edit_theme_options',
		'title'    		=> esc_html__('&nbsp;&nbsp;&nbsp;&nbsp; - Noticeboard and News', 'associationx'),
        'description'   => ''
    ));
	
	
	// Show the Noticeboard
    $wp_customize->add_setting('associationx[noticebv]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_noticebv', array(
        'label'      => esc_html__('Show the Noticeboard', 'associationx'),
        'section'    => 'associationx_nboard',
        'settings'   => 'associationx[noticebv]',
		'description' => '',
		'type' 		 => 'checkbox'
    ));
	
	// Select a Category
    $wp_customize->add_setting('associationx[noticecat1]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'absint',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_noticecat1', array(
        'label'      	=> esc_html__('Select the Desired Category for the Noticeboard', 'associationx'),
        'section'    	=> 'associationx_nboard',
        'settings'   	=> 'associationx[noticecat1]',
		'description' 	=> '',
		'type' 		 	=> 'select',
		'choices' 	 	=> $cats
    ));

	// Show the News Box
    $wp_customize->add_setting('associationx[newsbv]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_newsbv', array(
        'label'      => esc_html__('Show the News Box', 'associationx'),
        'section'    => 'associationx_nboard',
        'settings'   => 'associationx[newsbv]',
		'description' => '',
		'type' 		 => 'checkbox'
    ));
	
	foreach (range(1, 3 ) as $newsbnumn ) {	
	// Select a Category
    $wp_customize->add_setting('associationx[nboxcat'.$newsbnumn.']', array(
        'default'        	=> '',
    	'sanitize_callback' => 'absint',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_nboxcat'.$newsbnumn, array(
        'label'      	=> esc_html__('Select the Category for News', 'associationx'),
        'section'    	=> 'associationx_nboard',
        'settings'   	=> 'associationx[nboxcat'.$newsbnumn.']',
		'description' 	=> '',
		'type' 		 	=> 'select',
		'choices' 	 	=> $cats
    ));
	}
	

// E-Commerce/WppCommerce ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //
	
 $wp_customize->add_section('associationx_woocom', array(
        'priority' 		=> 14,
		'capability'     => 'edit_theme_options',
		'title'    		=> esc_html__('&nbsp;&nbsp;&nbsp;&nbsp; - E-Commerce by WooCommerce', 'associationx'),
        'description'   => ''
    ));
	
	//  Show the E-Commerce/WooCommerce
    $wp_customize->add_setting('associationx[ecombox]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_ecombox', array(
        'label'      => esc_html__('Show the E-Commerce/WooCommerce Box in Front Page', 'associationx'),
        'section'    => 'associationx_woocom',
        'settings'   => 'associationx[ecombox]',
		'description' => '',
		'type' 		 => 'checkbox'
    ));
	
	// E-Commerce/WooCommerce Page
    $wp_customize->add_setting('associationx[woo_page]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'absint',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_woo_page', array(
        'label'      => esc_html__('Select a E-Commerce/WooCommerce Page to Show the Content in this Section', 'associationx'),
        'section'    => 'associationx_woocom',
        'settings'   => 'associationx[woo_page]',
		'description' => esc_html__('You can Select a Page to Show the Content as E-Commerce/WooCommerce Part', 'associationx'),
		'type' 		 => 'dropdown-pages'
    ));	
	
	//  Set Transparent Background of the Product Items
    $wp_customize->add_setting('associationx[wooitembtrns]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_wooitembtrns', array(
        'label'      => esc_html__('Set Transparent Background of the Product Items', 'associationx'),
        'section'    => 'associationx_woocom',
        'settings'   => 'associationx[wooitembtrns]',
		'description' => '',
		'type' 		 => 'checkbox'
    ));
	
	//  Show Border of the Product Items
    $wp_customize->add_setting('associationx[wooitembdr]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_wooitembdr', array(
        'label'      => esc_html__('Show Border of the Product Items', 'associationx'),
        'section'    => 'associationx_woocom',
        'settings'   => 'associationx[wooitembdr]',
		'description' => '',
		'type' 		 => 'checkbox'
    ));
	
	//  Show Box Shadow of the Product Items
    $wp_customize->add_setting('associationx[wooitembsdw]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_wooitembsdw', array(
        'label'      => esc_html__('Show Box Shadow of the Product Items', 'associationx'),
        'section'    => 'associationx_woocom',
        'settings'   => 'associationx[wooitembsdw]',
		'description' => '',
		'type' 		 => 'checkbox'
    ));
	
	//  Show No Padding Space of the Product Items
    $wp_customize->add_setting('associationx[wooitemnpspc]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_wooitemnpspc', array(
        'label'      => esc_html__('Show No Padding Space of the Product Items', 'associationx'),
        'section'    => 'associationx_woocom',
        'settings'   => 'associationx[wooitemnpspc]',
		'description' => '',
		'type' 		 => 'checkbox'
    ));
	
	//  Show Product Items Image Border
    $wp_customize->add_setting('associationx[wooiimgbdr]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_wooiimgbdr', array(
        'label'      => esc_html__('Show Product Items Image Border', 'associationx'),
        'section'    => 'associationx_woocom',
        'settings'   => 'associationx[wooiimgbdr]',
		'description' => '',
		'type' 		 => 'checkbox'
    ));
	
	
// Events ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ // 

 $wp_customize->add_section('associationx_events', array(
        'priority' 		=> 16,
		'capability'     => 'edit_theme_options',
		'title'    		=> esc_html__('&nbsp;&nbsp;&nbsp;&nbsp; - Front Page Events', 'associationx'),
        'description'   => ''
    ));
	
	// Show the Event Boxes
    $wp_customize->add_setting('associationx[portfoliobox]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_portfoliobox', array(
        'label'      => esc_html__('Show the Event Boxes', 'associationx'),
        'section'    => 'associationx_events',
        'settings'   => 'associationx[portfoliobox]',
		'description' => '',
		'type' 		 => 'checkbox'
    ));
	
	foreach (range(1, 5) as $associationx_portfbnumn) {
	  
	// Event Image
    $wp_customize->add_setting('associationx[portfb-image'. $associationx_portfbnumn .']', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'associationx_sanitize_image',
        'type'           	=> 'option'
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'portfb-image'. $associationx_portfbnumn, array(
        'label'    			=> esc_html__('Event Image', 'associationx') . '-' . $associationx_portfbnumn,
        'section'  			=> 'associationx_events',
        'settings' 			=> 'associationx[portfb-image'. $associationx_portfbnumn .']',
		'description'   	=> esc_html__('Uoload the Event Image. Recommended Size is 400px X 300px','associationx')
    )));
		
	//  Automatically Add Image Title, Caption and Links
    $wp_customize->add_setting('associationx[portfb-image-automatic'.$associationx_portfbnumn.']', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_portfb-image-automatic'.$associationx_portfbnumn.'', array(
        'label'      => esc_html__('Collect Image Title, Caption and Link Automatically', 'associationx'),
        'section'    => 'associationx_events',
        'settings'   => 'associationx[portfb-image-automatic'.$associationx_portfbnumn.']',
		'description' => '',
		'type' 		 => 'checkbox'
    ));	
			
	}
	
	
// Members ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ // 

 $wp_customize->add_section('associationx_members', array(
        'priority' 		=> 17,
		'capability'     => 'edit_theme_options',
		'title'    		=> esc_html__('&nbsp;&nbsp;&nbsp;&nbsp; - Front Page Members', 'associationx'),
        'description'   => ''
    ));
	
	// Show the Event Boxes
    $wp_customize->add_setting('associationx[staffbox]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_staffbox', array(
        'label'      => esc_html__('Show the Member Boxes', 'associationx'),
        'section'    => 'associationx_members',
        'settings'   => 'associationx[staffbox]',
		'description' => '',
		'type' 		 => 'checkbox'
    ));
	
	foreach (range(1, 5) as $staffboxsnumber) {
	  
	// Event Image
    $wp_customize->add_setting('associationx[staffboxes-image'. $staffboxsnumber .']', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'associationx_sanitize_image',
        'type'           	=> 'option'
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'staffboxes-image'. $staffboxsnumber, array(
        'label'    			=> esc_html__('Member Image', 'associationx') . '-' . $staffboxsnumber,
        'section'  			=> 'associationx_members',
        'settings' 			=> 'associationx[staffboxes-image'. $staffboxsnumber .']',
		'description'   	=> esc_html__('Uoload the Member Image. You must use 300px X 200px or Higher Ratio Imag','associationx')
    )));
		
	//  Automatically Add Image Title, Caption and Links
    $wp_customize->add_setting('associationx[staffboxes-image-automatic'.$staffboxsnumber.']', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_staffboxes-image-automatic'.$staffboxsnumber.'', array(
        'label'      => esc_html__('Collect Image Title, Caption and Link Automatically', 'associationx'),
        'section'    => 'associationx_members',
        'settings'   => 'associationx[staffboxes-image-automatic'.$staffboxsnumber.']',
		'description' => '',
		'type' 		 => 'checkbox'
    ));	
			
	}
	
// Specific Page Content ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ // 

 $wp_customize->add_section('associationx_pagec', array(
        'priority' 		=> 18,
		'capability'     => 'edit_theme_options',
		'title'    		=> esc_html__('&nbsp;&nbsp;&nbsp;&nbsp; - Specific Page Content', 'associationx'),
        'description'   => ''
    ));
	
	
	// Show a Page Content
    $wp_customize->add_setting('associationx[fp-pagecheck]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_fp-pagecheck', array(
        'label'      => esc_html__('Show a Page Content in Front Page', 'associationx'),
        'section'    => 'associationx_pagec',
        'settings'   => 'associationx[fp-pagecheck]',
		'description' => '',
		'type' 		 => 'checkbox'
    ));
	
	// Select a Page
    $wp_customize->add_setting('associationx[fp-page]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'absint',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_fp-page', array(
        'label'      => esc_html__('Select a Page to Show the Content', 'associationx'),
        'section'    => 'associationx_pagec',
        'settings'   => 'associationx[fp-page]',
		'description' => esc_html__('You can Select a Page to Show the Content. This is ideal for Page Builder Page Contents', 'associationx'),
		'type' 		 => 'dropdown-pages'
    ));	
	
	
// Testimonials ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //
	
 $wp_customize->add_section('associationx_testim', array(
        'priority' 		=> 19,
		'capability'     => 'edit_theme_options',
		'title'    		=> esc_html__('&nbsp;&nbsp;&nbsp;&nbsp; - Front Page Testimonials', 'associationx'),
        'description'   => ''
    ));
	
//  Show the Featured Links
    $wp_customize->add_setting('associationx[tes-cln]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_tes-cln', array(
        'label'      => esc_html__('Show the Members Testimonials', 'associationx'),
        'section'    => 'associationx_testim',
        'settings'   => 'associationx[tes-cln]',
		'description' => '',
		'type' 		 => 'checkbox'
    ));
	
//  Show Testimonilas from the Latest Comments
    $wp_customize->add_setting('associationx[testifrmlcomnts]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'associationx_sanitize_checkbox',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_testifrmlcomnts', array(
        'label'      => esc_html__('Show the Testimonials from the Latest Comments', 'associationx'),
        'section'    => 'associationx_testim',
        'settings'   => 'associationx[testifrmlcomnts]',
		'description' => esc_html__('Check this if you want to Show the Testimonials from the Latest Comments', 'associationx'),
		'type' 		 => 'checkbox'
    ));
	

// Social Links ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //
	
 $wp_customize->add_section('associationx_sl', array(
        'priority' 		=> 19,
		'capability'     => 'edit_theme_options',
		'title'    		=> esc_html__('&nbsp;&nbsp;&nbsp;&nbsp; - Social Links', 'associationx'),
        'description'   => esc_html__('Input Your Social Page Links. Example:','associationx').'  <b>'.esc_url('https://facebook.com/d5creation').'</b>. '.esc_html__('If you do not want to show anything here leave the box blank','associationx')
    ));
	
	foreach (range(1, 4) as $slinks) {
	//  Social Link
    $wp_customize->add_setting('associationx[sl'.$slinks.']', array(
        'default'        	=> '#',
    	'sanitize_callback' => 'esc_url_raw',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('associationx_sl'.$slinks, array(
        'label'      => esc_html__('Social Link', 'associationx'),
        'section'    => 'associationx_sl',
        'settings'   => 'associationx[sl'.$slinks.']',
		'type'       => 'url'
    ));
	}
	
}


add_action('customize_register', 'associationx_customize_register');

	
if ( ! function_exists( 'associationx_get_option' ) ) :	
	function associationx_get_option( $opid, $opdef = false ) {
		$options = '';
		$options = get_option( 'associationx' );
		if(isset($options) && isset($options[$opid]) ): return $options[$opid]; else: return $opdef; endif;
	}
endif;