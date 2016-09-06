<?php

function boxy_custom_styles($custom) {
$custom = '';  
     $sticky_header_position = get_theme_mod('sticky_header_position');
     if( $sticky_header_position == 'bottom') {
          $custom .= ".sticky-header #site-navigation {  top: auto!important;
               bottom:0; }"."\n";  
          $custom .= ".sticky-header #site-navigation .nav-menu .sub-menu {  top: auto;
               bottom:100%; }"."\n";    
     }          

     $page_title_bar = get_theme_mod('page_titlebar');
     switch ($page_title_bar) {
     	case 2:
     		$custom .= ".breadcrumb-wrap {
     			background-color: transparent;
     		}"."\n";
     		break;     	
     	case 3:
     		$custom .= ".breadcrumb-wrap {
     			display: none;
     		}"."\n";
     		break;		
     }

     $page_title_bar_status = get_theme_mod('page_titlebar_text');
     if( $page_title_bar_status == 2 ) {
     	    $custom .= ".breadcrumb-wrap .entry-header {
     			display: none;
     		}"."\n";
     }

	//Output all the styles
	wp_add_inline_style( 'boxy-style', $custom );    	
}


add_action( 'wp_enqueue_scripts', 'boxy_custom_styles' );  
