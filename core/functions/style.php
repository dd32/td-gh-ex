<?php function lookilite_css_custom() { ?>

<style type="text/css">

<?php

/* =================== BODY STYLE =================== */

	if ( lookilite_setting('lookilite_full_image_background') == "on" )
		echo "body.custombody {  -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;}"; 

/* =================== BEGIN NAV STYLE =================== */

	$navstyle = '';

	/* Nav  Font Size */
	if (lookilite_setting('lookilite_menu_font_size')) 
		$navstyle .= "font-size:".esc_html(lookilite_setting('lookilite_menu_font_size')).";"; 
	
	if ($navstyle)
		echo 'nav#mainmenu ul li a, nav#mainmenu ul ul li a { '.$navstyle.' } ';
		
/* =================== END NAV STYLE =================== */

/* =================== BEGIN CONTENT STYLE =================== */

	if (lookilite_setting('lookilite_content_font_size')) 
		echo ".post-article p, .post-article li, .post-article address, .post-article dd, .post-article blockquote, .post-article td, .post-article th, .textwidget, .toggle_container h5.element  { font-size:".esc_html(lookilite_setting('lookilite_content_font_size'))."}"; 
	

/* =================== END CONTENT STYLE =================== */

/* =================== START TITLE STYLE =================== */

	if (lookilite_setting('lookilite_h1_font_size')) 
		echo "h1 {font-size:".esc_html(lookilite_setting('lookilite_h1_font_size'))."; }"; 
	if (lookilite_setting('lookilite_h2_font_size')) 
		echo "h2 { font-size:".esc_html(lookilite_setting('lookilite_h2_font_size'))."; }"; 
	if (lookilite_setting('lookilite_h3_font_size')) 
		echo "h3 { font-size:".esc_html(lookilite_setting('lookilite_h3_font_size'))."; }"; 
	if (lookilite_setting('lookilite_h4_font_size')) 
		echo "h4 { font-size:".esc_html(lookilite_setting('lookilite_h4_font_size'))."; }"; 
	if (lookilite_setting('lookilite_h5_font_size')) 
		echo "h5 { font-size:".esc_html(lookilite_setting('lookilite_h5_font_size'))."; }"; 
	if (lookilite_setting('lookilite_h6_font_size')) 
		echo "h6 { font-size:".esc_html(lookilite_setting('lookilite_h6_font_size'))."; }"; 


/* =================== END TITLE STYLE =================== */

/* =================== END LINK STYLE =================== */


	if (lookilite_setting('lookilite_custom_css_code'))
		echo esc_html(lookilite_setting('lookilite_custom_css_code')); 

?>

</style>
    
<?php }

	add_action('wp_head', 'lookilite_css_custom');

?>