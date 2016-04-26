<?php

/*-----------------------------------------------------------------------------------*/
/* SIDEBAR OVERRIDE */
/*-----------------------------------------------------------------------------------*/  

if (!function_exists('sneaklite_customize_register')) {

	function sneaklite_customize_register($wp_customize) {
		
		$wp_customize->remove_control( 'suevafree_body_layout' );

	}
	
	add_action('customize_register','sneaklite_customize_register', 11);
	
}

/*-----------------------------------------------------------------------------------*/
/* Body class */
/*-----------------------------------------------------------------------------------*/   

if (!function_exists('sneaklite_body_class')) {
	
	function sneaklite_body_class($classes) {
	
		$unset_key = array_search('minimal_layout', $classes);
		if ( false !== $unset_key ) {
			unset( $classes[$unset_key] );
		}
	
		return $classes;
		
	}
	
	add_filter('body_class', 'sneaklite_body_class', 11);
	
}

/*-----------------------------------------------------------------------------------*/
/* SIDEBAR OVERRIDE */
/*-----------------------------------------------------------------------------------*/  

if (!function_exists('sneaklite_actions_override')) {

	function sneaklite_actions_override() {
		
		remove_action( 'suevafree_side_sidebar', 'suevafree_side_sidebar_function', 10, 2 );

	}
	
	add_action('init','sneaklite_actions_override');
	
}

/*-----------------------------------------------------------------------------------*/
/* SIDEBAR TEMPLATE */
/*-----------------------------------------------------------------------------------*/  

if (!function_exists('sneaklite_side_sidebar_function')) {

	function sneaklite_side_sidebar_function($name) { ?>
    
        <div class="col-md-4">
                    
            <div class="row">
                
                <div id="sidebar" class="sneak_sidebar col-md-12">
                            
                    <div class="sidebar-box">
    
                        <?php if ( is_active_sidebar($name)) { 
                        
                            dynamic_sidebar($name);
                        
                        } else { 
                            
							the_widget( 'WP_Widget_Archives','',
							array('before_widget' => '<div class="post-article"><div class="widget-box">',
								  'after_widget'  => '</div></div>',
								  'before_title'  => '<h4 class="title">',
								  'after_title'   => '</h4>'
							));
			
							the_widget( 'WP_Widget_Calendar',
							array("title"=> __('Calendar','wip')),
							array('before_widget' => '<div class="post-article"><div class="widget-box">',
								  'after_widget'  => '</div></div>',
								  'before_title'  => '<h4 class="title">',
								  'after_title'   => '</h4>'
							));
			
							the_widget( 'WP_Widget_Categories','',
							array('before_widget' => '<div class="post-article"><div class="widget-box">',
								  'after_widget'  => '</div></div>',
								  'before_title'  => '<h4 class="title">',
								  'after_title'   => '</h4>'
							));
                        
                         } ?>
    
                    </div>
                            
                </div>
                
            </div>
                        
        </div>
        
<?php

	}

	add_action( 'suevafree_side_sidebar', 'sneaklite_side_sidebar_function', 10, 2 );

}

/*-----------------------------------------------------------------------------------*/
/* WIDGETS */
/*-----------------------------------------------------------------------------------*/  

function sneaklite_widgets_init() {

	unregister_sidebar( 'sidebar-area' );
	unregister_sidebar( 'home_sidebar_area' );
	unregister_sidebar( 'category-sidebar-area' );
	unregister_sidebar( 'bottom-sidebar-area' );
	unregister_sidebar( 'search-sidebar-area' );

	register_sidebar(array(
	
		'name' => __('Sidebar','suevafree'),
		'id'   => 'sidebar-area',
		'description'   => __('This sidebar will be shown at the side of posts and pages.','suevafree'),
		'before_widget' => '<div class="post-article"><div class="widget-box">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>'
	
	));

	register_sidebar(array(

		'name' => __('Home Sidebar','suevafree'),
		'id'   => 'home_sidebar_area',
		'description'   => __( "This sidebar will be shown at the side of the homepage","suevafree"),
		'before_widget' => '<div class="post-article"><div class="widget-box">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>'
	
	));

	register_sidebar(array(

		'name' => __('Category Sidebar','suevafree'),
		'id'   => 'category-sidebar-area',
		'description'   => __('This sidebar will be shown at the side of category page.','suevafree'),
		'before_widget' => '<div class="post-article"><div class="widget-box">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>'
	
	));

	register_sidebar(array(

		'name' => __('Search Sidebar','suevafree'),
		'id'   => 'search-sidebar-area',
		'description'   => __('This sidebar will be shown at the side of search page.','suevafree'),
		'before_widget' => '<div class="post-article"><div class="widget-box">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>'
	
	));
	
	register_sidebar(array(

		'name' => __('Bottom Sidebar','suevafree'),
		'id'   => 'bottom-sidebar-area',
		'description'   => __('This sidebar will be shown after the content.','suevafree'),
		'before_widget' => '<div class="col-md-3"><div class="widget-box">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>'
	
	));

}

add_action( 'widgets_init', 'sneaklite_widgets_init' , 11);

/*-----------------------------------------------------------------------------------*/
/* STYLES AND SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('sneaklite_scripts_styles')) {

	function sneaklite_scripts_styles() {

		wp_deregister_style ( 'suevafree-' . get_theme_mod('suevafree_skin') );

		wp_enqueue_style( 'sneaklite-woocommerce', get_stylesheet_directory_uri() . '/assets/css/woocommerce.css' ); 

		if ( get_theme_mod('suevafree_skin') ):
		
			wp_enqueue_style( 'sneaklite-' . get_theme_mod('suevafree_skin') , get_stylesheet_directory_uri() . '/assets/skins/' . get_theme_mod('suevafree_skin') . '.css' ); 
		
		endif;
	
		wp_deregister_style ( 'suevafree-google-fonts' );
		wp_enqueue_style( 'sneaklite-google-fonts', '//fonts.googleapis.com/css?family=Abel|Allura|Roboto+Slab|Fjalla+One&subset=latin,latin-ext' );

	}
	
	add_action( 'wp_enqueue_scripts', 'sneaklite_scripts_styles', 20 );

}

?>