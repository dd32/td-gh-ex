<?php
/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {
    
    $imagepath =  get_template_directory_uri() . '/inc/option-framework/images/';

	// Test data
	$test_array = array(
		'one' => __( 'One', 'accesspress-mag' ),
		'two' => __( 'Two', 'accesspress-mag' ),
		'three' => __( 'Three', 'accesspress-mag' ),
		'four' => __( 'Four', 'accesspress-mag' ),
		'five' => __( 'Five', 'accesspress-mag' )
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'accesspress-mag' ),
		'two' => __( 'Pancake', 'accesspress-mag' ),
		'three' => __( 'Omelette', 'accesspress-mag' ),
		'four' => __( 'Crepe', 'accesspress-mag' ),
		'five' => __( 'Waffle', 'accesspress-mag' )
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);
    
    
	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
        $options_categories[]="-- Select Category --";
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->slug] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}
    
        //Pull all menus into an array
        $options_menus = array();
        $options_menus_obj = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
        $options_menus[] = "-- Select Menu --";
        foreach($options_menus_obj as $menu) {
            $options_menus[$menu->slug] = $menu->name;
        }
        
        //Slide options for homepage slider
        $options_slides = array();
        $options_slides[0] = "-- Select no.of slides --" ;
        for($i=1;$i<=6;$i++)
        {
            $options_slides[$i] = $i ;
        }
        
        //No.of posts for homepage blocks
        $options_block_posts = array();
        $options_block_posts[-1]="-- All posts --";
        for($i=4;$i<=10;$i++)
        {
            $options_block_posts[$i] = $i ;
        }
    
    
    //Footer Pattern
	$footer_pattern = array(
        'column4' => $imagepath . 'footers/footer-4.png',
        'column3' => $imagepath . 'footers/footer-3.png',
		'column2' => $imagepath . 'footers/footer-2.png', 
        'column1' => $imagepath . 'footers/footer-1.png',
		   
		);
        
    //Post Templates
    $post_template = array(
        'default-template' => $imagepath.'post_template/post-templates-icons-0.png',
        'style1-template' => $imagepath.'post_template/post-templates-icons-1.png', 
        //'style2-template' => $imagepath.'post_template/post-templates-icons-2.png',
        //'style3-template' => $imagepath.'post_template/post-templates-icons-3.png',
        //'style4-template' => $imagepath.'post_template/post-templates-icons-4.png',
        //'style5-template' => $imagepath.'post_template/post-templates-icons-5.png',
        );
    
    //Post sidebar
    $post_sidebar = array(
        'right-sidebar'=>$imagepath.'right-sidebar.png',
        'left-sidebar'=>$imagepath.'left-sidebar.png',
        'no-sidebar'=>$imagepath.'no-sidebar.png',
        );
    
    
	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

/*-----------------------Basic Setting------------------------*/
	$options[] = array(
            'name' => __( 'Basic Settings', 'accesspress-mag' ),
            'type' => 'heading'
            );
   /*---------------------Background Settings----------------------*/
    $options[] = array(
            'name' => __( 'Background Settings', 'accesspress-mag' ),
            'id'   => 'background_settings',
            'type' => 'groupstart'
            );
    $options[] = array(
            'name' => __( 'Site Background', 'accesspress-mag' ),
            'desc' => __( 'Upload a background image, the site will automatically switch to boxed version', 'accesspress-mag' ),
            'id' => 'site_background',
            'class' =>'sub-option',
            'type' => 'upload', 
            );
    $options[] = array(
            'name' => __( 'Repeat', 'accesspress-mag' ),
            'desc' => __( 'How the site background image will be displayed', 'accesspress-mag' ),
            'id' => 'repeat_background',            
            'options' => array(
                    ' ' => 'No Repeat',
                    'repeat' => 'Tile',
                    'repeat-x' => 'Tile Horizontally',
                    'repeat-y' => 'Tile Vertically',
                    ),
            'type' => 'radio',
            'std' => ' ' 
            );
    $options[] = array(
            'name' => __( 'Position', 'accesspress-mag' ),
            'desc' => __( 'Position your background image', 'accesspress-mag' ),
            'id' => 'position_background',            
            'options' => array(
                    ' ' => 'Left',
                    'center' => 'Center',
                    'right' => 'Right',
                    ),
            'type' => 'radio',
            'std' => ' ' 
            );
    $options[] = array(
            'name' => __( 'Background Attachment', 'accesspress-mag' ),
            'desc' => __( 'Background attachment', 'accesspress-mag' ),
            'id' => 'attached_background',            
            'options' => array(
                    'fixed' => 'Fixed',
                    ' '     => 'Scroll',
                    ),
            'type' => 'radio',
            'std' => ' ' 
            );
    $options[] = array(
            'name' => __( 'Stretch Background', 'accesspress-mag' ),                
            'desc' => __( 'Background image stretching( Leave this option disabled if you are using background click ad)', 'accesspress-mag' ),
            'id' => 'stretch_background',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '0',
            'type' => 'switch'
            );
    $options[] = array(
            'type' => 'groupend'
            );
            
    /*-------------------Website layout------------------------*/
    $options[] = array(
            'name' => __( 'Website Layout', 'accesspress-mag' ),
            'id'   => 'website_layout',
            'type' => 'groupstart'
            );
    $options[] = array(
            'name' => __( 'Website layout', 'accesspress-mag' ),
            'id' => 'website_layout_option',            
            'options' => array(
                    ' ' => 'Fullwidth',
                    'boxed' => 'Boxed',
                    ),
            'type' => 'radio',
            'std' => ' ' 
            );
    $options[] = array(
            'type' => 'groupend'
            );
    
    
/*-----------------------Header Setting------------------------*/

	$options[] = array(
		    'name' => __( 'Header', 'accesspress-mag' ),
            'type' => 'heading'
	        );
    
    $options[] = array(
            'name' => __( 'Top Menu (black one)', 'accesspress-mag' ),
            'id'   => 'top_menu',
            'type' => 'groupstart'
            );
            
    $options[] = array(
            'name' => __( 'Top Menu', 'accesspress-mag' ),                
            'desc' => __( 'Hide or show the top menu', 'accesspress-mag' ),
            'id' => 'top_menu_switch',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '1',
            'type' => 'switch'
            );	
	
    $options[] = array(
            'name' => __( 'Top Menu', 'accesspress-mag' ),
            'desc' => __( 'Select a menu for the top section', 'accesspress-mag' ),    
            'id' => 'top_menu_select',
            'type' => 'select',
            'options' => $options_menus
            );
    $options[] = array(
            'name' => __( 'Top Menu (right)', 'accesspress-mag' ),
            'desc' => __( 'Select a menu for the top section on right side. It`s optional menu.', 'accesspress-mag' ),    
            'id' => 'top_right_menu_select',
            'type' => 'select',
            'options' => $options_menus
            );		

    $options[] = array(
            'type' => 'groupend'
            );
    
    $options[] = array(
            'name' => __( 'Logo', 'accesspress-mag' ),
            'id'   => 'logo',
            'type' => 'groupstart'
            );
    
    $options[] = array(
            'name' => __( 'Logo Upload', 'accesspress-mag' ),
            'desc' => __( 'Upload your logo (300 x 100px) .png', 'accesspress-mag' ),
            'id' => 'logo_upload',
            'class' =>'sub-option',
            'type' => 'upload', 
            );	
            
     $options[] = array(
            'name' => __( 'Favicon', 'accesspress-mag' ),
            'desc' => __( 'Upload a favicon image (16 x 16px) .png', 'accesspress-mag' ),
            'id' => 'favicon_upload',
            'class' =>'sub-option',
            'type' => 'upload', 
            ); 
    
    $options[] = array(
            'name' => __( 'Logo Alt Attribute', 'accesspress-mag' ),
            'desc' => __( 'Write ALT attribute for the logo', 'accesspress-mag' ),
            'id' => 'logo_alt',
            'type' => 'text', 
            );
    
    $options[] = array(
            'name' => __( 'Logo Title Attribute', 'accesspress-mag' ),
            'desc' => __( 'Write TITLE attribute for the logo', 'accesspress-mag' ),
            'id' => 'logo_title',
            'type' => 'text', 
            );
    
    $options[] = array(
            'type' => 'groupend'
            );

/*-----------------------Footer Setting------------------------*/
    $options[] = array(
            'name' => __( 'Footer', 'accesspress-mag' ),
		    'type' => 'heading'
	       );
    
    $options[] = array(
            'name' => __( 'Footer Setting', 'accesspress-mag' ),
            'id'   => 'footer_setting',
            'type' => 'groupstart'
            );
            
    $options[] = array(
            'name' => __( 'Footer', 'accesspress-mag' ),                
            'desc' => __( 'Hide or show the footer', 'accesspress-mag' ),
            'id' => 'footer_switch',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '1',
            'type' => 'switch'
            );
    
    $options[] = array(
            'name' => __( 'More information:', 'accesspress-mag' ),
            'desc' => __( 'The footer uses sidebars to show information. Here you can customize the number of sidebars and the layout. To add content to the footer head go to the widgets section and drag widget to the Footer 1, Footer 2 and Footer 3 sidebars ', 'accesspress-mag' ),
            'id' => 'more_info_footer',
            'type' => 'info', 
            );
    
    $options[] = array(
            'name' => __( 'Layout', 'accesspress-mag' ),
            'desc' => __( 'Choose image for footer widget layout.', 'accesspress-mag' ),
            'id' => 'footer_layout',
            'std' => 'column4',
            'type' => 'images',
            'options' => $footer_pattern
            );
    
    $options[] = array(
            'type' => 'groupend'
            );
    
    $options[] = array(
            'name' => __( 'Sub-footer Setting', 'accesspress-mag' ),
            'id'   => 'sub_footer_setting',
            'type' => 'groupstart'
            );    
            
    $options[] = array(
            'name' => __( 'Sub Footer', 'accesspress-mag' ),                
            'desc' => __( 'Hide or show the sub-footer', 'accesspress-mag' ),
            'id' => 'sub_footer_switch',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '1',
            'type' => 'switch'
            );
    
    $options[] = array(
            'name' => __( 'Footer Copyright text', 'accesspress-mag' ),
            'desc' => __( 'Set footer copyright text', 'accesspress-mag' ),
            'id' => 'mag_footer_copyright',
            'std' => __('Copyright 2015- your text', 'accesspress-mag'),
            'type' => 'text' 
            );
    
    $options[] = array(
            'name' => __( 'Copyright Symbol', 'accesspress-mag' ),                
            'desc' => __( 'Show or hide the footer copyright symbol', 'accesspress-mag' ),
            'id' => 'copyright_symbol',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '0',
            'type' => 'switch'
            );
    $options[] = array(
            'name' => __( 'Footer Menu', 'accesspress-mag' ),
            'desc' => __( 'Select a menu for the footer section', 'accesspress-mag' ),    
            'id' => 'footer_menu_select',
            'type' => 'select',
            'options' => $options_menus
            );
    $options[] = array(
            'type' => 'groupend'
            );
    
/*-----------------------Ads Setting------------------------*/

    $options[] = array(
            'name' => __( 'ADS', 'accesspress-mag' ),
            'type' => 'heading'
            ); 
    
    $options[] = array(
            'name' => __( 'Heder ad', 'accesspress-mag' ),
            'id'   => 'header_ad',
            'type' => 'groupstart'
            );

    $options[] = array(
            'name' => __( 'Your Header Ad', 'accesspress-mag' ),
            'desc' => __( 'Paste your ad code here. Google adsense will be made responsive automatically. To add non adsense responsive ads,<a href="#" target="_blank">click here</a> (last paragraph)', 'accesspress-mag' ),
            'id' => 'value_header_ad',
            'std' => __('', 'accesspress-mag'),
            'type' => 'textarea' 
            );
            
    $options[] = array(
            'type' => 'groupend'
            );
    
    $options[] = array(
            'name' => __( 'Sidebar ad', 'accesspress-mag' ),
            'id'   => 'sidebar_ad',
            'type' => 'groupstart'
            );

    $options[] = array(
            'name' => __( 'Your Sidebar Top Ad', 'accesspress-mag' ),
            'desc' => __( 'Paste your ad code here. Google adsense will be made responsive automatically. To add non adsense responsive ads,<a href="#" target="_blank">click here</a> (last paragraph)', 'accesspress-mag' ),
            'id' => 'value_sidebar_top_ad',
            'std' => __('', 'accesspress-mag'),
            'type' => 'textarea' 
            );
    $options[] = array(
            'name' => __( 'Your Sidebar Middle Ad', 'accesspress-mag' ),
            'desc' => __( 'Paste your ad code here. Google adsense will be made responsive automatically. To add non adsense responsive ads,<a href="#" target="_blank">click here</a> (last paragraph)', 'accesspress-mag' ),
            'id' => 'value_sidebar_middle_ad',
            'std' => __('', 'accesspress-mag'),
            'type' => 'textarea' 
            );
    $options[] = array(
            'name' => __( 'Your Sidebar Bottom Ad', 'accesspress-mag' ),
            'desc' => __( 'Paste your ad code here. Google adsense will be made responsive automatically. To add non adsense responsive ads,<a href="#" target="_blank">click here</a> (last paragraph)', 'accesspress-mag' ),
            'id' => 'value_sidebar_bottom_ad',
            'std' => __('', 'accesspress-mag'),
            'type' => 'textarea' 
            );            
    $options[] = array(
            'type' => 'groupend'
            );
    
    $options[] = array(
            'name' => __( 'Article ad', 'accesspress-mag' ),
            'id'   => 'article_ad',
            'type' => 'groupstart'
            );
    $options[] = array(
            'name' => __( 'Your Article Ad', 'accesspress-mag' ),
            'desc' => __( 'Paste your ad code here. Google adsense will be made responsive automatically. To add non adsense responsive ads,<a href="#" target="_blank">click here</a> (last paragraph)', 'accesspress-mag' ),
            'id' => 'value_article_ad',
            'std' => __('', 'accesspress-mag'),
            'type' => 'textarea' 
            );            
    $options[] = array(
            'type' => 'groupend'
            );
    $options[] = array(
            'name' => __( 'Homepage ad', 'accesspress-mag' ),
            'id'   => 'homepage_ad',
            'type' => 'groupstart'
            );
    $options[] = array(
            'name' => __( 'Your Homepage Inline Ad', 'accesspress-mag' ),
            'desc' => __( 'Paste your ad code here. Google adsense will be made responsive automatically. To add non adsense responsive ads,<a href="#" target="_blank">click here</a> (last paragraph)', 'accesspress-mag' ),
            'id' => 'value_homepage_inline_ad',
            'std' => __('', 'accesspress-mag'),
            'type' => 'textarea' 
            ); 
    $options[] = array(
            'type' => 'groupend'
            );

    
/*-----------------------Layout Setting------------------------*/
    $options[] = array(
            'name' => __( 'Layout Settings', 'accesspress-mag' ),
            'type' => 'heading',
            'static_text' =>'static',
            'id'=>'layout-settings'
	        );

/*-----------------------Homepage Settings------------------------*/
    $options[] = array(
            'name' => __( 'Homepage Settings', 'accesspress-mag' ),
		    'type' => 'heading'
	       );
    
     $options[] = array(
            'name' => __( 'Slider Settings', 'accesspress-mag' ),
            'id'   => 'slider_settings',
            'type' => 'groupstart'
            );            
    $options[] = array(
            'name' => __( 'Select Category', 'accesspress-mag' ),
            'desc' => __( 'Select a category for homepage slider', 'accesspress-mag' ),    
            'id' => 'homepage_slider_category',
            'type' => 'select',
            'options' => $options_categories
            );   
    $options[] = array(
            'name' => __( 'Show Pager', 'accesspress-mag' ),                
            'desc' => __( 'Hide or show the pager', 'accesspress-mag' ),
            'id' => 'slider_pager',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '0',
            'type' => 'switch'
            );
    $options[] = array(
            'name' => __( 'Show Controls', 'accesspress-mag' ),                
            'desc' => __( 'Hide or show the controls', 'accesspress-mag' ),
            'id' => 'slider_controls',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '1',
            'type' => 'switch'
            );
    $options[] = array(
            'name' => __( 'Auto Transition', 'accesspress-mag' ),                
            'desc' => __( 'On or off the auto transition', 'accesspress-mag' ),
            'id' => 'slider_auto_transition',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '0',
            'type' => 'switch'
            );
    $options[] = array(
            'name' => __( 'Show Title', 'accesspress-mag' ),                
            'desc' => __( 'Show or hide slider`s Title/info', 'accesspress-mag' ),
            'id' => 'slider_info',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '1',
            'type' => 'switch'
            );
    $options[] = array(
            'name' => __( 'Number of slides', 'accesspress-mag' ),
            'desc' => __( 'Choose number of slides', 'accesspress-mag' ),
            'id' => 'count_slides', 
            'type' => 'select',
            'options' => $options_slides
            );
    $options[] = array(
            'type' => 'groupend'
            );
            
    $options[] = array(
            'name' => __( 'Blocks settings', 'accesspress-mag' ),
            'id'   => 'blocks_settings',
            'type' => 'groupstart'
            );
    $options[] = array(
            'name' => __( 'Featured Block (First)', 'accesspress-mag' ),
            'desc' => __( 'Select a category for first block in homepage', 'accesspress-mag' ),    
            'id' => 'featured_block_1',
            'type' => 'select',
            'options' => $options_categories
            );
    $options[] = array(
            'name' => __( 'Number of posts', 'accesspress-mag' ),
            'desc' => __( 'Choose number of posts for block (first)', 'accesspress-mag' ),
            'id' => 'posts_for_block1', 
            'type' => 'select',
            'options' => $options_block_posts
            );
    $options[] = array(
            'name' => __( 'Featured Block (Second)', 'accesspress-mag' ),
            'desc' => __( 'Select a category for second block in homepage', 'accesspress-mag' ),    
            'id' => 'featured_block_2',
            'type' => 'select',
            'options' => $options_categories
            );
    $options[] = array(
            'name' => __( 'Number of posts', 'accesspress-mag' ),
            'desc' => __( 'Choose number of posts for block (second)', 'accesspress-mag' ),
            'id' => 'posts_for_block2', 
            'type' => 'select',
            'options' => $options_block_posts
            );
    $options[] = array(
            'name' => __( 'Featured Block (Third)', 'accesspress-mag' ),
            'desc' => __( 'Select a category for third block in homepage', 'accesspress-mag' ),    
            'id' => 'featured_block_3',
            'type' => 'select',
            'options' => $options_categories
            );
    $options[] = array(
            'name' => __( 'Number of posts', 'accesspress-mag' ),
            'desc' => __( 'Choose number of posts for block (third)', 'accesspress-mag' ),
            'id' => 'posts_for_block3', 
            'type' => 'select',
            'options' => $options_block_posts
            );
    $options[] = array(
            'name' => __( 'Featured Block (Fourth)', 'accesspress-mag' ),
            'desc' => __( 'Select a category for fourth block in homepage', 'accesspress-mag' ),    
            'id' => 'featured_block_4',
            'type' => 'select',
            'options' => $options_categories
            );
    $options[] = array(
            'name' => __( 'Number of posts', 'accesspress-mag' ),
            'desc' => __( 'Choose number of posts for block (fourth)', 'accesspress-mag' ),
            'id' => 'posts_for_block4', 
            'type' => 'select',
            'options' => $options_block_posts
            );
    $options[] = array(
            'type' => 'groupend'
            );
            
    $options[] = array(
            'name' => __( 'Editor pick settings', 'accesspress-mag' ),
            'id'   => 'editor_pick_setting',
            'type' => 'groupstart'
            );
    $options[] = array(
            'name' => __( 'Select Editor Pick', 'accesspress-mag' ),
            'desc' => __( 'Select a category for editor pick in homepage sidebar', 'accesspress-mag' ),    
            'id' => 'editor_pick_category',
            'type' => 'select',
            'options' => $options_categories
            );
    $options[] = array(
            'name' => __( 'Number of posts', 'accesspress-mag' ),
            'desc' => __( 'Choose number of posts in editor pick section @ sidebar', 'accesspress-mag' ),
            'id' => 'posts_for_editor_pick', 
            'type' => 'select',
            'options' => $options_block_posts
            );
    $options[] = array(
            'type' => 'groupend'
            );
              
/*------------------------Post Settings------------------------*/         
     $options[] = array(
            'name' => __( 'Post Settings', 'accesspress-mag' ),
            'type' => 'heading'
            ); 
            
    $options[] = array(
            'name' => __( 'Post Settings', 'accesspress-mag' ),
            'id'   => 'post_settings',
            'type' => 'groupstart'
            );
            
    $options[] = array(
            'name' => __( 'Show Date', 'accesspress-mag' ),                
            'desc' => __( 'Enable or disable the post date', 'accesspress-mag' ),
            'id' => 'post_show_date',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '1',
            'type' => 'switch'
            );
            
    $options[] = array(
            'name' => __( 'Show Post Views', 'accesspress-mag' ),                
            'desc' => __( 'Enable or disable the post views', 'accesspress-mag' ),
            'id' => 'show_post_views',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '1',
            'type' => 'switch'
            );
    $options[] = array(
            'name' => __( 'Show Comment Count', 'accesspress-mag' ),                
            'desc' => __( 'Enable or disable comment number', 'accesspress-mag' ),
            'id' => 'show_comment_count',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '1',
            'type' => 'switch'
            );
    $options[] = array(
            'name' => __( 'Show Author Under Title', 'accesspress-mag' ),                
            'desc' => __( 'Shows or hide the author under the post title', 'accesspress-mag' ),
            'id' => 'show_author_name',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '1',
            'type' => 'switch'
            );
    $options[] = array(
            'name' => __( 'Show Tags on Post', 'accesspress-mag' ),                
            'desc' => __( 'Enable or disable the post tags', 'accesspress-mag' ),
            'id' => 'show_tags_post',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '1',
            'type' => 'switch'
            );
    $options[] = array(
            'name' => __( 'Show Author Box', 'accesspress-mag' ),                
            'desc' => __( 'Enable or disable the author box', 'accesspress-mag' ),
            'id' => 'show_author_box',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '1',
            'type' => 'switch'
            );
    $options[] = array(
            'name' => __( 'Show Next and Previous Posts', 'accesspress-mag' ),                
            'desc' => __( 'Show or hide `next` and `previous` posts', 'accesspress-mag' ),
            'id' => 'show_post_nextprev',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '1',
            'type' => 'switch'
            );
    $options[] = array(
            'name' => __( 'Disable Comments Sitewide', 'accesspress-mag' ),                
            'desc' => __( 'Enable or disable the comments on the entire site, default this option is disabled', 'accesspress-mag' ),
            'id' => 'disable_comments_sitewide',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '1',
            'type' => 'switch'
            );
    $options[] = array(
            'name' => __( 'Disable Comments on Pages', 'accesspress-mag' ),                
            'desc' => __( 'Enable or disable the comments on the pages, default this option is disabled', 'accesspress-mag' ),
            'id' => 'disable_comments_page',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '1',
            'type' => 'switch'
            );
    $options[] = array(
            'type' => 'groupend'
            );
      /*------------------------Default site post template------------------------*/ 
    $options[] = array(
            'name' => __( 'Default site post template', 'accesspress-mag' ),
            'id'   => 'post_template',
            'type' => 'groupstart'
            );
    $options[] = array(
            'name' => __( 'Defalt Site Post Template', 'accesspress-mag' ),
            'desc' => __( "Setting this option will make all post pages, that don't have a post template associated to them, to be displayed using this template. This option is OVERWRITTEN by the `Post template` option from the backend - post add / edit page.", 'accesspress-mag' ),
            'id' => 'global_post_template',
            'class'=>'post_template_image',
            'std' => 'default-template',
            'type' => 'images',
            'options' => $post_template
            );
    $options[] = array(
            'name' => __( 'Defalt Post Sidebar', 'accesspress-mag' ),
            'desc' => __( "Setting this option will make all post pages, that don't have a post sidebar associated to them, to be displayed using this sidebar. This option is OVERWRITTEN by the `Post/Page sidebar` option from the backend - post add / edit page.", 'accesspress-mag' ),
            'id' => 'global_post_sidebar',
            'class'=>'post_sidebar_image',
            'std' => 'right-sidebar',
            'type' => 'images',
            'options' => $post_sidebar
            );
    $options[] = array(
            'type' => 'groupend'
            );
      /*------------------------Breadcrumbs template------------------------*/ 
    $options[] = array(
            'name' => __( 'Breadcrumbs', 'accesspress-mag' ),
            'id'   => 'post_template',
            'type' => 'groupstart'
            );
    $options[] = array(
            'name' => __( 'Show/Hide Breadcrumbs', 'accesspress-mag' ),                
            'desc' => __( 'Show or hide breadcrumbs on site', 'accesspress-mag' ),
            'id' => 'show_hide_breadcrumbs',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '1',
            'type' => 'switch'
            );
    $options[] = array(
            'name' => __( 'Show Breadcrumbs on Post', 'accesspress-mag' ),                
            'desc' => __( 'Show or hide the breadcrumbs', 'accesspress-mag' ),
            'id' => 'show_post_breadcrumbs',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '1',
            'type' => 'switch'
            );
    $options[] = array(
            'name' => __( 'Show Breadcrumbs Home Link', 'accesspress-mag' ),                
            'desc' => __( 'Show or hide the home link in breadcrumbs', 'accesspress-mag' ),
            'id' => 'show_home_link_breadcrumbs',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '0',
            'type' => 'switch'
            );    
    $options[] = array(
            'name' => __( 'Show Breadcrumbs Article Title', 'accesspress-mag' ),                
            'desc' => __( 'Show or hide breadcrumbs article title', 'accesspress-mag' ),
            'id' => 'show_article_breadcrumbs',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '1',
            'type' => 'switch'
            );
    $options[] = array(
            'type' => 'groupend'
            );
      /*------------------------Featured image settings------------------------*/ 
    $options[] = array(
            'name' => __( 'Featured images', 'accesspress-mag' ),
            'id'   => 'featured_image',
            'type' => 'groupstart'
            );
    $options[] = array(
            'name' => __( 'Show Featured Image', 'accesspress-mag' ),                
            'desc' => __( 'Show or hide featured image', 'accesspress-mag' ),
            'id' => 'featured_image',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '1',
            'type' => 'switch'
            ); 
            /*       
    $options[] = array(
            'name' => __( 'Featured Image Placeholder', 'accesspress-mag' ),                
            'desc' => __( 'Enable or disable featured image placeholder in single page for post', 'accesspress-mag' ),
            'id' => 'featured_image_placeholder',
            'on' => __( 'Yes', 'accesspress-mag'),
            'off' => __( 'No', 'accesspress-mag'),
            'std' => '0',
            'type' => 'switch'
            ); */      
    $options[] = array(
            'type' => 'groupend'
            );
      
/*------------------Archive Page Settings---------------------*/
    $options[] = array(
            'name' => __( 'Archive Settings', 'accesspress-mag' ),
            'type' => 'heading'
            ); 
            
    $options[] = array(
            'name' => __( 'Archive Style', 'accesspress-mag' ),
            'id'   => 'archive_style',
            'type' => 'groupstart'
            );
    $options[] = array(
            'name' => __( 'Archive page template', 'accesspress-mag' ),
            'desc' => __( "Setting this option will make all archive pages.", 'accesspress-mag' ),
            'id' => 'global_archive_template',
            'class'=>'archive_post_template_image',
            'std' => 'default-template',
            'type' => 'images',
            'options' => $post_template
            );
    $options[] = array(
            'name' => __( 'Archive page sidebar', 'accesspress-mag' ),
            'desc' => __( "Setting this option will make all archive pages.", 'accesspress-mag' ),
            'id' => 'global_archive_sidebar',
            'class'=>'archive_page_sidebar_image',
            'std' => 'right-sidebar',
            'type' => 'images',
            'options' => $post_sidebar
            );    
    $options[] = array(
            'type' => 'groupend'
            );

            
/*--------------------------MISC--------------------------*/        
    $options[] = array(
            'name' => __( 'MISC', 'accesspress-mag' ),
            'type' => 'heading',
            'static_text' =>'static',
            'id'=>'misc'
	        );
    
    /*------------------------Excerpts Settings------------------------*/
    $options[] = array(
            'name' => __( 'Excerpts', 'accesspress-mag' ),
            'type' => 'heading'
            );
    $options[] = array(
            'name' => __( 'Excerpts', 'accesspress-mag' ),
            'id'   => 'excerpts',
            'type' => 'groupstart'
            );
    $options[] = array(
            'name' => __( 'Notice:', 'accesspress-mag' ),
            'desc' => __( 'Adding a text as excerpt on post edit page (Excerpt box), will overwrite the theme excerpts', 'accesspress-mag' ),
            'id' => 'excerpt_notice',
            'type' => 'info', 
            );
    $options[] = array(
            'name' => __( 'Excerpts Type', 'accesspress-mag' ),
            'desc' => __( 'Set the excerpt type', 'accesspress-mag' ),
            'id' => 'excerpt_type',            
            'options' => array(
                    ' '     => 'On Words',
                    'letters' => 'On Letters',                    
                    ),
            'type' => 'radio',
            'std' => ' ' 
            );
    $options[] = array(
            'type' => 'groupend'
            );
            
    $options[] = array(
            'name' => __( 'Wordpress default', 'accesspress-mag' ),
            'id'   => 'wordpress-default',
            'type' => 'groupstart'
            );
    $options[] = array(
            'name' => __( 'Excerpt Lenght', 'accesspress-mag' ),
            'desc' => __( '', 'accesspress-mag' ),
            'id' => 'excerpt_lenght',
            'type' => 'text',
            'std' => 50, 
            );
    $options[] = array(
            'type' => 'groupend'
            );
            
/*----------------------------------------------------------*/
	return $options;
}