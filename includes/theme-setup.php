<?php

function acool_setup(){
	global $content_width;
	$lang = get_template_directory(). '/languages';
	load_theme_textdomain('Acool', $lang);
	add_theme_support( 'post-thumbnails' ); 
	$args = array();
	$header_args = array( 
	    'default-image'          => '',
		'default-repeat' => 'no-repeat',
        'default-text-color'     => '2C2C2C',
		'url'                    => '',
        'width'                  => 1920,
        'height'                 => 89,
        'flex-height'            => true
     );
	add_theme_support( 'custom-background', $args );
	add_theme_support( 'custom-header', $header_args );
	add_theme_support( 'automatic-feed-links' );//
	add_theme_support('nav_menus');//
	add_theme_support( "title-tag" );//
	
	//register menus
	register_nav_menus(
					   array(
						'primary-menu' => __( 'Primary Menu', 'Acool' ) ,
					   	'secondary-menu' => __( 'Secondary Menu', 'Acool' ),
					   	'footer-menu' => __( 'footer Menu', 'Acool' )	
					   )
					   );
					   
	add_editor_style("editor-style.css");
	if ( !isset( $content_width ) ) $content_width = 1170;
}
add_action( 'after_setup_theme', 'acool_setup' );


function acool_custom_scripts(){
	global $is_IE;
	$theme_info = wp_get_theme();
	$enable_query_loader  = of_get_option('enable_query_loader',1);
	
	wp_enqueue_style('acool-font-awesome-css',  get_template_directory_uri() .'/css/font-awesome.min.css', false, '4.5.0', false);
	wp_enqueue_style('acool-bootstrap-css',  get_template_directory_uri() .'/css/bootstrap.min.css', false, '3.3.5', false);	
	wp_enqueue_style( 'acool-main', get_stylesheet_uri(), array(), $theme_info->get( 'Version' ) );	
		
	//js
	//wp_enqueue_script( 'acool-idangerous', get_template_directory_uri().'/js/idangerous.js', array( 'jquery' ), '2.1', false );
	wp_enqueue_script( 'acool-animation-js', get_template_directory_uri().'/js/animation.js', array( 'jquery' ), '1.0', false );
	wp_enqueue_script( 'acool-bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js', array( 'jquery' ), '3.3.5', false );			
	wp_enqueue_script( 'acool-main', get_template_directory_uri().'/js/common.js', array( 'jquery' ), $theme_info->get( 'Version' ), false );	

    $acool_custom_css = "";
	$header_image       = get_header_image();
	if (isset($header_image) && ! empty( $header_image ))
	{
		$acool_custom_css .= "header.ct_header_class{background:url(".esc_url($header_image). ");}\n";
	}
	
	if ( 'blank' != get_header_textcolor() && '' != get_header_textcolor() )
   	{
		$header_textcolor    =  ' color:#' . get_header_textcolor() . ';';
		$acool_custom_css .=  '.ct_site_name,.ct_site_tagline	{'.esc_attr($header_textcolor).'}';
	 	$acool_custom_css .=  '#ct-top-navigation nav#top-menu-nav ul li a,#ct_mobile_nav_menu ul li a{'.esc_attr($header_textcolor).'}';
		$acool_custom_css .=  '#ct-top-navigation nav#top-menu-nav ul li a:hover,#ct_mobile_nav_menu ul li a:hover{color:#0c8432}';		 
	}
	
	$header_opacity       =  of_get_option("header_opacity");
	$header_opacity = $header_opacity?$header_opacity:1;	
	
	$fixed_header         =  of_get_option("fixed_header");
	$section_1_content        = esc_attr(of_get_option('section_1_content','content'));
	if( $fixed_header == "yes" /*&& $section_1_content != 'slider'*/  )
	{
		$acool_custom_css  .= ".fixed{ position: fixed; width: 100%; background: rgba(220, 220, 220, ".$header_opacity.") !important;opacity:".$header_opacity.";
z-index:999;}.carousel-caption{bottom: 10%;}\n";
	}
	
	$link_color           = of_get_option('link_color');
	if( $link_color ){
		$acool_custom_css  .=  'a:link, a:visited, a:focus,a{color:'.esc_attr($link_color).';}';
	}
	
	$link_mouseover_color = of_get_option('link_mouseover_color');
	if( $link_mouseover_color ){
		$acool_custom_css  .=  'a:hover,li a:hover{color:'.esc_attr($link_mouseover_color).';}';
	}
		
	$blog_title_color    = of_get_option('blog_title_color');
	if( $blog_title_color )
	$acool_custom_css  .=  'h1.ct_title_h1{color:'.esc_attr($blog_title_color).';}';
	

	$social_icon_color   = of_get_option('social_icon_color');
	if( $social_icon_color )
	$acool_custom_css  .=  '.ct_footer .ct_social_front ul.ct_social li a{color:'.esc_attr($social_icon_color).';}';
	
	$social_icon_background_color   = of_get_option('social_icon_background_color');
	if( $social_icon_background_color )
	$acool_custom_css  .=  '.ct_footer .ct_social_front ul.ct_social li a{background-color:'.esc_attr($social_icon_background_color).';}';

	
	$home_footer_background        = acool_get_background( of_get_option('home_footer_background','') );
	$single_footer_background      = acool_get_background( of_get_option('single_footer_background','') );
	$footer_widget_area_background = acool_get_background( of_get_option('footer_widget_area_background',''));
	
	if( $footer_widget_area_background )
	$acool_custom_css  .=  'footer .ct_footer_columns{'.$footer_widget_area_background.'}';
	
	if( $home_footer_background )
	$acool_custom_css  .=  'footer .ct_footer_bottom{'.$home_footer_background.'}';
	
	if(is_single() || is_page())
	{
		$acool_custom_css  .=  '.ct_header_class_post_page{border-bottom-width: 1px;border-bottom-style: solid;	border-bottom-color: #EEE;}';	
	}
	
	$custom_css           =  of_get_option("custom_css","");
	if( $custom_css != "" )
	$acool_custom_css  .=  wp_filter_nohtml_kses($custom_css);
	$acool_custom_css   = esc_html($acool_custom_css);
	
	$acool_custom_css   = str_replace('&gt;','>',$acool_custom_css);
		
	wp_add_inline_style( 'acool-main', $acool_custom_css );

	}

function acool_admin_scripts()
{
	$theme_info = wp_get_theme();
	wp_enqueue_style('acool-admin',  get_template_directory_uri() .'/css/admin.css', false, $theme_info->get( 'Version' ), false);
	wp_enqueue_script( 'acool-admin', get_template_directory_uri().'/js/admin.js', array( 'jquery' ), $theme_info->get( 'Version' ), true );
}

  
if (!is_admin())
{
	add_action( 'wp_enqueue_scripts', 'acool_custom_scripts' );
}else{
   add_action( 'admin_enqueue_scripts', 'acool_admin_scripts' );
}

//add customize menu to admin_bar
/*
add_action( 'wp_before_admin_bar_render', 'ct_admin_bar_render' ); 
function ct_admin_bar_render() { 
	global $wp_admin_bar; 
	$wp_admin_bar->add_menu( 
	array( 'parent' => false,  
			'id' => 'ct_customize',  
			'title' => __('customize'),  
			'href' => admin_url( 'customize.php'),
			'meta' => false  
			));
}
*/