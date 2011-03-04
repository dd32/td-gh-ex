<?php
if ( ! isset( $content_width ) )
	$content_width = 700;

if ( function_exists('register_sidebar') )
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
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js');
        wp_enqueue_script( 'jquery' );
    }


if ( !is_admin() ) {
   wp_register_script('custom_script_1',
       get_template_directory_uri() . '/js/jquery.ddmenu.js');       
   wp_enqueue_script('custom_script_1');

   wp_register_script('custom_script_2',
       get_template_directory_uri() . '/js/jcarousellite_1.0.1.js');      
   wp_enqueue_script('custom_script_2');
   }       
}

       


add_action('init', 'baza_noclegowa_init_method');

add_editor_style();
add_theme_support( 'automatic-feed-links' );
add_theme_support('post-thumbnails');

if ( is_singular() ) wp_enqueue_script( "comment-reply" );


function baza_noclegowa_page_menu($o_args) {
  global $wpdb;
  global $post;

  $_result = '<ul id="menu-main" class="menu">';
  $_res = $wpdb->get_results('SELECT * FROM `'.$wpdb->posts.'` WHERE `post_type` = \'page\' AND `post_parent` = \'0\' AND `post_status` = \'publish\' ORDER BY `menu_order`');
  foreach($_res as $_row) {
    $_result .= '<li id="menu-item-'.$_row->ID.'" class="menu-item';
    if(isset($post->ID)) {
    if($_row->ID == $post->ID) $_result .= ' current_page_item';
    }
    $_subres = $wpdb->get_results('SELECT * FROM `'.$wpdb->posts.'` WHERE `post_type` = \'page\' AND `post_parent` = \''.$_row->ID.'\' AND `post_status` = \'publish\' ORDER BY `menu_order`');    
    if( count($_subres) ) { $_result .= ' multiple';}
    $_result .= '">';
    $_result .= '<a href="'.get_permalink($_row->ID).'">';
    $_result .= $o_args['before'];    
    $_result .= apply_filters('the_title', $_row->post_title);
    $_result .= $o_args['after'];    
    $_result .= '</a>';

    if( count($_subres) ) {
      $_result .= '<div class="ddMenu"><ul>';
      
      foreach($_subres as $_subrow) {
        $_result .= '<li id="menu-item-'.$_subrow->ID.'" class="menu-item';
        if(isset($post->ID)) {
        if($_row->ID == $post->ID) $_result .= ' current_page_item';
        }
        
	//for level 3 start
    $_subres2 = $wpdb->get_results('SELECT * FROM `'.$wpdb->posts.'` WHERE `post_type` = \'page\' AND `post_parent` = \''.$_subrow->ID.'\' AND `post_status` = \'publish\' ORDER BY `menu_order`');    
    if( count($_subres2) ) { $_result .= ' multiple';}
	//for level 3 stop
        
        $_result .= '">';
        $_result .= '<a href="'.get_permalink($_subrow->ID).'">';
        //$_result .= $o_args['before'];        
        $_result .= apply_filters('the_title', $_subrow->post_title);
        //$_result .= $o_args['after'];        
        $_result .= '</a>';
    
    //level 3 start
    if( count($_subres2) ) {
      $_result .= '<div class="ddMenu"><ul>';
      
      foreach($_subres2 as $_subrow2) {
        $_result .= '<li id="menu-item-'.$_subrow2->ID.'" class="menu-item';
        if(isset($post->ID)) {
        if($_row->ID == $post->ID) $_result .= ' current_page_item';
        }
        $_result .= '">';
        $_result .= '<a href="'.get_permalink($_subrow2->ID).'">';
        //$_result .= $o_args['before'];        
        $_result .= apply_filters('the_title', $_subrow2->post_title);
        //$_result .= $o_args['after'];        
        $_result .= '</a>';
        $_result .= '</li>';
      }
      $_result .= '</ul><div class="btm"></div></div>';
    }      
    //level 3 stop
        
        $_result .= '</li>';
      }
      $_result .= '</ul><div class="btm"></div></div>';
    }
    $_result .= '</li>';
  }
  $_result .= '</ul>';

  echo $_result;
}





?>