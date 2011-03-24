<?php
if ( ! isset( $content_width ) )
	$content_width = 700;

    register_sidebar(array(
		'name' => __( 'Sidebar Widget Area' ),
		'id' => 'sidebar-widget-area',
		'description' => __( 'The sidebar widget area' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3><span>',
		'after_title' => '</span></h3>',        
    ));	

function baza_noclegowa_init_method() {
    if (!is_admin()) {

        wp_enqueue_script( 'jquery' );
     
   wp_register_script('custom_script_1',
       get_template_directory_uri() . '/js/jquery.ddmenu.js');       
   wp_enqueue_script('custom_script_1');
   }       
}
       
register_nav_menus(
	array(
	  'primary' => 'Header Menu',
	  'footer-menu' => 'Footer Menu'
	)
);


add_action('init', 'baza_noclegowa_init_method');

add_editor_style();
add_theme_support( 'automatic-feed-links' );
add_theme_support('post-thumbnails');


//Multi-level pages menu  
function baza_noclegowa_page_menu() {  
	
if (is_page()) { $highlight = "page_item"; } else {$highlight = "page_item current_page_item"; }
echo '<ul id="menu-main" class="menu">';
wp_list_pages('sort_column=menu_order&title_li=&link_before=<span>&link_after=</span>&depth=3');
echo '</ul>';
}  


?>