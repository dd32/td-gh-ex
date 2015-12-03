<?php function alhenalite_css_custom() { ?>

<style type="text/css">

<?php

/* =================== BODY STYLE =================== */

	if ( get_theme_mod('wip_full_image_background') == "on" )
		echo "body {  -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;}"; 


/* =================== BEGIN PAGE WIDTH =================== */

	if (alhenalite_setting('wip_screen1')) {
	
		echo "@media (min-width:768px){.container{width:".alhenalite_setting('wip_screen1')."px}}"; 
		echo "@media (min-width:768px){.container.block{width:" . (alhenalite_setting('wip_screen1')-10) . "px}}"; 
		echo "@media (min-width:768px){.container.grid-container{width:" . (alhenalite_setting('wip_screen1')-20) . "px}}"; 
	}
	
	if (alhenalite_setting('wip_screen2')) {
		
		echo "@media (min-width:992px){.container{width:".alhenalite_setting('wip_screen2')."px}}"; 
		echo "@media (min-width:992px){.container.block{width:" . (alhenalite_setting('wip_screen2')-10) . "px}}"; 
		echo "@media (min-width:768px){.container.grid-container{width:" . (alhenalite_setting('wip_screen2')-20) . "px}}"; 
	}
	
	if (alhenalite_setting('wip_screen3'))  {
		
		echo "@media (min-width:1200px){.container{width:".alhenalite_setting('wip_screen3')."px}}"; 
		echo "@media (min-width:1200px){.container.block{width:" . (alhenalite_setting('wip_screen3')-10) . "px}}"; 
		echo "@media (min-width:768px){.container.grid-container{width:" . (alhenalite_setting('wip_screen3')-20) . "px}}"; 
	}
	
/* =================== END PAGE WIDTH =================== */

/* =================== BEGIN LOGO STYLE =================== */

	$logostyle = '';
	/* Logo Font */
	if (alhenalite_setting('wip_logo_font')) 
		$logostyle .= "font-family:'".alhenalite_setting('wip_logo_font')."',Verdana, Geneva, sans-serif;"; 

	/* Logo Font Size */
	if (alhenalite_setting('wip_logo_font_size')) 
		$logostyle .= "font-size:".alhenalite_setting('wip_logo_font_size').";"; 
	
	if ($logostyle)
		echo '#logo a.logo { '.$logostyle.' } ';

/* =================== END LOGO STYLE =================== */

/* =================== BEGIN NAV STYLE =================== */

	$navstyle = '';

	/* Nav Font */
	if (alhenalite_setting('wip_menu_font')) 
		$navstyle .= "font-family:'".alhenalite_setting('wip_menu_font')."',Verdana, Geneva, sans-serif;"; 

	/* Nav  Font Size */
	if (alhenalite_setting('wip_menu_font_size')) 
		$navstyle .= "font-size:".alhenalite_setting('wip_menu_font_size').";"; 
	
	/* Nav  Font Color */
	if (alhenalite_setting('wip_menu_font_color')) 
		$navstyle .= "color:".alhenalite_setting('wip_menu_font_color').";"; 
	
	if ($navstyle)
		echo 'nav#mainmenu ul li a { '.$navstyle.' } ';

/* =================== END NAV STYLE =================== */

/* =================== BEGIN CONTENT STYLE =================== */

	if (alhenalite_setting('wip_content_font_size')) 
		echo ".article p, .article li, .article address, .article dd, .article blockquote, .article td, .article th, p, li, address, dd, blockquote, td, th, .textwidget, .button, .entry-info  { font-size:".alhenalite_setting('wip_content_font_size')."}"; 

/* =================== END NAV STYLE =================== */

/* =================== START TITLE STYLE =================== */

	$titlestyle = '';

	if (alhenalite_setting('wip_titles_font')) 
		$titlestyle .= "font-family:'".alhenalite_setting('wip_titles_font')."',Verdana, Geneva, sans-serif;"; 
	
	if ($titlestyle)
		echo 'h1.title, h2.title, h3.title, h4.title, h5.title, h6.title, h1, h2, h3, h4, h5, h6  { '.$titlestyle.' } ';

	if (alhenalite_setting('wip_h1_font_size')) 
		echo "h1 {font-size:".alhenalite_setting('wip_h1_font_size')." !important; }"; 
	if (alhenalite_setting('wip_h2_font_size')) 
		echo "h2 { font-size:".alhenalite_setting('wip_h2_font_size')." !important; }"; 
	if (alhenalite_setting('wip_h3_font_size')) 
		echo "h3 { font-size:".alhenalite_setting('wip_h3_font_size')." !important; }"; 
	if (alhenalite_setting('wip_h4_font_size')) 
		echo "h4 { font-size:".alhenalite_setting('wip_h4_font_size')." !important; }"; 
	if (alhenalite_setting('wip_h5_font_size')) 
		echo "h5 { font-size:".alhenalite_setting('wip_h5_font_size')." !important; }"; 
	if (alhenalite_setting('wip_h6_font_size')) 
		echo "h6 { font-size:".alhenalite_setting('wip_h6_font_size')." !important; }"; 


/* =================== END TITLE STYLE =================== */

/* =================== START REV SLIDER STYLE =================== */

	if (alhenalite_setting('wip_revslider_font')) 
		echo ".tp-caption { font-family:'".alhenalite_setting('wip_revslider_font')."',Verdana, Geneva, sans-serif !important ; }"; 

/* =================== END REV SLIDER STYLE =================== */

	if (alhenalite_setting('wip_custom_css_code'))
		
		echo alhenalite_setting('wip_custom_css_code'); 

?>

</style>
    
<?php }

add_action('wp_head', 'alhenalite_css_custom');

?>