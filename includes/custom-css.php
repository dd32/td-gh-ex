<?php
//Adding CSS inline style to an existing CSS stylesheet
function abaya_add_inline_css() {
	     $abaya_custom_css='';
      //All the user input CSS settings as set in the plugin settings
		if(get_theme_mod('header_text_color'))
		{
			$header_text_color=get_theme_mod('header_text_color');
			$abaya_custom_css.='.t1{color:'.esc_html($header_text_color).'; }';
		}
		if(get_theme_mod('header_logotagline_color'))
		{
			$header_logotagline_color=get_theme_mod('header_logotagline_color');
			$abaya_custom_css.='.brand-subtitle{color:'.esc_html($header_logotagline_color).'; }';
		}
		if(get_theme_mod('bgimg-upload' )){
      $abaya_custom_css.= "
          #banner{ display:block; text-align:center; position: relative; background:url(".esc_url(get_theme_mod('bgimg-upload')).") center top no-repeat; background-size:cover; height:490px;  }";
		}if(get_theme_mod('bgcolor-setting'))
		{
			$abaya_custom_css.= "body{background-color:".esc_html(get_theme_mod('bgcolor-setting'))."}";
		}else 
		{
		   $abaya_custom_css.= "body{background-color:#fff}";	
		}
		$header_image = get_header_image(); if($header_image!=''){
			$abaya_custom_css.= ".header { background-image:url(".esc_url($header_image).");}";
		}
//Add the above custom CSS via wp_add_inline_style
wp_add_inline_style('abaya-style', $abaya_custom_css); //Pass the variable into the main style sheet ID
}
add_action('wp_enqueue_scripts', 'abaya_add_inline_css'); //Enqueue the CSS style
?>