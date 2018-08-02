<?php

function greenr_custom_styles($custom) {
$custom = '';	
	$sticky_header_position = get_theme_mod('sticky_header_position');
	if( $sticky_header_position == 'bottom') {
		$custom .= ".sticky-header #header-bottom {  top: auto!important;
			bottom:0; }"."\n";	
		$custom .= ".sticky-header #header-bottom .nav-menu .sub-menu {  top: auto !important;
			bottom:100%; }"."\n";	
		$custom .= ".sticky-header #header-bottom .nav-menu .sub-menu .sub-menu{  top: auto !important;
				bottom:0%; }"."\n";
	}	

     $page_title_bar = get_theme_mod('page_titlebar');
     switch ($page_title_bar) {
     	case 2:
     		$custom .= ".breadcrumb-wrap .breadcrumb {
     			background-color:transparent;
                    background-image:none;
     		}"."\n";
               $custom .= ".breadcrumb-wrap .breadcrumb h1, #breadcrumb #crumbs {
                    color:#000;
               }"."\n";
               $custom .= ".breadcrumb-wrap .breadcrumb #breadcrumb #crumbs span {
                    color:#000;
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
	wp_add_inline_style( 'greenr-style', $custom );    	
}


add_action( 'wp_enqueue_scripts', 'greenr_custom_styles' );  
