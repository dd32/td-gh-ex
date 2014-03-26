<?php

/*-----------------------------------------------------------------------------------*/
/* Add default style, at theme activation */
/*-----------------------------------------------------------------------------------*/         

if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	
	$sneaklite_setting = get_option('suevafree_theme_settings');

	if (!$sneaklite_setting) {	
	
		$skins = array( 
		
		"suevafree_skins" => "Cyan", 
		"suevafree_logo_font_size" => "70px", 

		"suevafree_logo_description_font_size" => "14px", 
		
		"suevafree_menu_font_size" => "14px", 
		
		"suevafree_text_font_color" => "#616161", 
		"suevafree_copyright_font_color" => "#ffffff", 
		"suevafree_link_color" => "#48c2ae", 
		"suevafree_link_color_hover" => "#3aa694", 
		"suevafree_border_color" => "#48c2ae", 
	
		"suevafree_body_background" => "/images/background/patterns/pattern1.jpg",
		"suevafree_body_background_repeat" => "repeat",
		"suevafree_body_background_color" => "#f3f3f3",
		
		"suevafree_footer_background" => "/images/background/patterns/pattern2.jpg",
		"suevafree_footer_background_repeat" => "repeat",
		"suevafree_footer_background_color" => "#f3f3f3",
	
		"suevafree_home" => "right-sidebar",
		"suevafree_category_layout" => "right-sidebar",
		"suevafree_footer_facebook_button" => "#",
		"suevafree_footer_twitter_button" => "#",
		"suevafree_footer_skype_button" => "#",
		"suevafree_view_comments" => "on",
		"suevafree_footer_rss_button" => "on",

		);

	update_option( 'suevafree_theme_settings', $skins ); 
	
	}
	
}

function sneaklite_template($id) {

	$template = array ("full" => "span12" , "left-sidebar" => "span8" , "right-sidebar" => "span8" );

	$span = $template["full"];
	$sidebar =  "full";

	if ( ( !suevafree_setting('suevafree_home') )  && (  (is_home()) )  ){
		
		$span = $template["right-sidebar"];
		$sidebar =  "right-sidebar";

	} else if ( ( suevafree_setting('suevafree_home') )  && ( (is_home()) )  ){
		
		$span = $template[suevafree_setting('suevafree_home')];
		$sidebar =  suevafree_setting('suevafree_home');

	} else if ( ( !suevafree_setting('suevafree_category_layout') )  && ( (is_category()) || (is_tag()) )  ){
		
		$span = $template["right-sidebar"];
		$sidebar =  "right-sidebar";

	} else if ( ( suevafree_setting('suevafree_category_layout') )  && ( (is_category()) || (is_tag()) )  ){
		
		$span = $template[suevafree_setting('suevafree_category_layout')];
		$sidebar =  suevafree_setting('suevafree_category_layout');

	} else if ( ( suevafree_postmeta('suevafree_template') )  && ( (is_page()) || (is_single())  )  ){

		$span = $template[suevafree_postmeta('suevafree_template')];
		$sidebar =  suevafree_postmeta('suevafree_template');
			
	}
	
	return ${$id};
	
}

function sneaklite_css_custom() { 

	
	echo '<style type="text/css" id="prova">';

		echo 'a.button, .contact-form input[type=submit] { background: #fff; } ';

		if ( suevafree_setting('suevafree_menu_font_size') ):
		
			echo 'nav#mainmenu ul ul li a { font-size: '.suevafree_setting('suevafree_menu_font_size').'; } ';
	
		endif;	
	
		if ( suevafree_setting('suevafree_link_color') ):
		
			echo 'a.button, .contact-form input[type=submit] { border-color: '.suevafree_setting('suevafree_link_color').'; } ';
	
			echo 'a.button, .contact-form input[type=submit] { color: '.suevafree_setting('suevafree_link_color').'; } ';
	
		endif;	
		
		if ( suevafree_setting('suevafree_link_color_hover') ):
	
			echo 'a.button:hover, .contact-form input[type=submit]:hover { border-color: '.suevafree_setting('suevafree_link_color_hover').'; } ';
			
			echo 'a.button:hover, .contact-form input[type=submit]:hover { background-color: '.suevafree_setting('suevafree_link_color_hover').'; } ';
			echo '#footer .copyright a:hover { color: '.suevafree_setting('suevafree_link_color_hover').'; } ';
		
			echo "nav#mainmenu ul li a:hover, nav#mainmenu li:hover > a, nav#mainmenu ul li.current-menu-item > a, nav#mainmenu ul li.current_page_item > a, nav#mainmenu ul li.current-menu-parent > a, nav#mainmenu ul li.current_page_ancestor > a, nav#mainmenu ul li.current-menu-ancestor > a, nav#mainmenu ul ul li a:hover, nav#mainmenu ul ul li:hover > a, nav#mainmenu ul ul li.current-menu-item > a, nav#mainmenu ul ul li.current_page_item > a, nav#mainmenu ul ul li.current-menu-parent > a, nav#mainmenu ul ul li.current_post_ancestor > a, nav#mainmenu ul ul li.current_page_ancestor > a, nav#mainmenu ul ul li.current-menu-ancestor > a { background-color:".suevafree_setting('suevafree_link_color_hover')." }"; 
	 
		endif;
	
	echo '</style>';

}

add_action('wp_head', 'sneaklite_css_custom', 11);

function sneaklite_widgets_init() {

	unregister_sidebar( 'sidebar-area' );
	unregister_sidebar( 'home_sidebar_area' );
	unregister_sidebar( 'category-sidebar-area' );
	unregister_sidebar( 'bottom-sidebar-area' );

	register_sidebar(array(
	
		'name' => 'Sidebar',
		'id'   => 'sidebar-area',
		'description'   => 'This sidebar will be shown after the contents.',
		'before_widget' => '<div class="pin-article span4"><div class="widget-box">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3 class="title">',
		'after_title'   => '</h3>'
	
	));
	
	register_sidebar(array(
	
		'name' => 'Home Sidebar',
		'id'   => 'home_sidebar_area',
		'description'   => __( "This sidebar will be shown for the homepage","wip"),
		'before_widget' => '<div class="pin-article span4"><div class="widget-box">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3 class="title">',
		'after_title'   => '</h3>'
	
	));

	register_sidebar(array(
	
		'name' => 'Category Sidebar',
		'id'   => 'category-sidebar-area',
		'description'   => 'This sidebar will be shown after the content.',
		'before_widget' => '<div class="pin-article span4"><div class="widget-box">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3 class="title">',
		'after_title'   => '</h3>'
	
	));

	register_sidebar(array(
	
		'name' => 'Bottom Sidebar',
		'id'   => 'bottom-sidebar-area',
		'description'   => 'This sidebar will be shown after the content.',
		'before_widget' => '<div class="span3"><div class="widget-box">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>'
	
	));

}

add_action( 'widgets_init', 'sneaklite_widgets_init' , 11);

?>