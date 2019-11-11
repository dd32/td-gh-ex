<?php 

if (!function_exists('novalite_css_custom')) {

	function novalite_css_custom() {
		
		$css = '';
		
	/* =================== BEGIN LOGO STYLE =================== */
	
		$logostyle = '';
	
		/* Logo Font Size */
		if (novalite_setting('novalite_logo_font_size')) 
			$logostyle .= "font-size:".novalite_setting('novalite_logo_font_size').";"; 
		
		if ($logostyle)
			$css .= '#logo a { '.$logostyle.' } ';
	
	/* =================== END LOGO STYLE =================== */
	
	/* =================== BEGIN NAV STYLE =================== */
	
		$navstyle = '';
	
		/* Nav  Font Size */
		if (novalite_setting('novalite_menu_font_size')) 
			$navstyle .= "font-size:".novalite_setting('novalite_menu_font_size').";"; 
		
		if ($navstyle)
			$css .= 'nav#mainmenu ul li a { '.$navstyle.' } ';
	
	/* =================== END NAV STYLE =================== */
	
	/* =================== BEGIN CONTENT STYLE =================== */
	
		if (novalite_setting('novalite_content_font_size')) 
			$css .= ".article p, .article li, .article address, .article dd, .article blockquote, .article td, .article th { font-size:".novalite_setting('novalite_content_font_size')."}"; 
		
	
	/* =================== END CONTENT STYLE =================== */
	
	/* =================== START TITLE STYLE =================== */
	
		if (novalite_setting('novalite_h1_font_size')) 
			$css .= "h1, h1.title {font-size:".novalite_setting('novalite_h1_font_size')."; }"; 
		if (novalite_setting('novalite_h2_font_size')) 
			$css .= "h2, h2.title { font-size:".novalite_setting('novalite_h2_font_size')."; }"; 
		if (novalite_setting('novalite_h3_font_size')) 
			$css .= "h3, h3.title { font-size:".novalite_setting('novalite_h3_font_size')."; }"; 
		if (novalite_setting('novalite_h4_font_size')) 
			$css .= "h4, h4.title { font-size:".novalite_setting('novalite_h4_font_size')."; }"; 
		if (novalite_setting('novalite_h5_font_size')) 
			$css .= "h5, h5.title { font-size:".novalite_setting('novalite_h5_font_size')."; }"; 
		if (novalite_setting('novalite_h6_font_size')) 
			$css .= "h6, h6.title { font-size:".novalite_setting('novalite_h6_font_size')."; }"; 
	
	
	/* =================== END TITLE STYLE =================== */

		wp_add_inline_style( 'nova-lite-style', $css );
		
	}

	add_action('wp_enqueue_scripts', 'novalite_css_custom');

}

?>