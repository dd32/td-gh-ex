<?php function wip_css_custom() { ?>

<style type="text/css">

<?php

/* =================== BEGIN BODY STYLE =================== */

	$bodystyle = '';

	/* Background Image */
	if ( (wip_setting('wip_body_background')) && (wip_setting('wip_body_background') <> 'None') ):
		$bodystyle .= 'background: url('.get_bloginfo('template_directory').wip_setting('wip_body_background').');'; 
	elseif ( wip_setting('wip_body_background') == "None") : 
		$bodystyle .= 'background-image: none;'; 
	endif;

	/* Background Repeat */
	if ( (wip_setting('wip_body_background_repeat') ) && ( (wip_setting('wip_body_background') <> 'None') || (wip_setting('wip_body_custom_background')) )  ) 
		$bodystyle .= 'background-repeat:'.wip_setting('wip_body_background_repeat').';'; 
	
	/* Background Position */
	if ( (wip_setting('wip_body_background_position') ) && ( (wip_setting('wip_body_background') <> 'None') || (wip_setting('wip_body_custom_background')) )  ) 
		$bodystyle .= 'background-position:'.wip_setting('wip_body_background_position').';'; 
	
	/* Background Color */
	if (wip_setting('wip_body_background_color')) 
		$bodystyle .= 'background-color:'.wip_setting('wip_body_background_color').';';
		 
	/* Background Attachment */
	if ( (wip_setting('wip_body_background_attachment')) && ( (wip_setting('wip_body_background') <> 'None') || (wip_setting('wip_body_custom_background')) )  ) 
		$bodystyle .= 'background-attachment:'.wip_setting('wip_body_background_attachment').';'; 

	if ($bodystyle)
		echo 'body { '.$bodystyle.' } ';
		
/* =================== END BODY STYLE =================== */

/* =================== BEGIN FOOTER STYLE =================== */

	$footerstyle = '';
	
	/* Background Image */
	if ( (wip_setting('wip_footer_background')) && (wip_setting('wip_footer_background') <> 'None') ):
		$footerstyle .= 'background: url('.get_bloginfo('template_directory').wip_setting('wip_footer_background').');'; 
	elseif ( wip_setting('wip_footer_background') == "None") : 
		$footerstyle .= 'background-image: none;'; 
	endif;

	/* Background Repeat */
	if ( (wip_setting('wip_footer_background_repeat')) && (wip_setting('wip_footer_background') <> 'None') ) 
		$footerstyle .= 'background-repeat:'.wip_setting('wip_footer_background_repeat').';'; 
	
	/* Background Position */
	if ( (wip_setting('wip_footer_background_position')) && (wip_setting('wip_footer_background') <> 'None') ) 
		$footerstyle .= 'background-position:'.wip_setting('wip_footer_background_position').';'; 
	
	/* Background Color */
	if (wip_setting('wip_footer_background_color')) 
		$footerstyle .= 'background-color:'.wip_setting('wip_footer_background_color').';'; 
		
	/* Background Attachment */
	if ( (wip_setting('wip_footer_background_attachment')) && ( (wip_setting('wip_footer_background') <> 'None') || (wip_setting('wip_footer_custom_background')) )  ) 
		$footerstyle .= 'background-attachment:'.wip_setting('wip_footer_background_attachment').';'; 

	if ($footerstyle)
		echo '#footer { '.$footerstyle.' } ';
		
		
		
/* =================== END FOOTER STYLE =================== */

/* =================== BEGIN LOGO STYLE =================== */

	$logostyle = '';
	/* Logo Font Size */
	if (wip_setting('wip_logo_font_size')) 
		$logostyle .= "font-size:".wip_setting('wip_logo_font_size').";"; 
	
	if ($logostyle)
		echo '#logo a { '.$logostyle.' } ';

	$logospanstyle = '';

	/* Logo Font Size */
	if (wip_setting('wip_logo_description_font_size')) 
		$logospanstyle .= "font-size:".wip_setting('wip_logo_description_font_size').";"; 
	
	if ($logospanstyle)
		echo '#logo a span{ '.$logospanstyle.' } ';


/* =================== END LOGO STYLE =================== */

/* =================== BEGIN NAV STYLE =================== */

	$navstyle = '';

	/* Nav  Font Size */
	if (wip_setting('wip_menu_font_size')) 
		$navstyle .= "font-size:".wip_setting('wip_menu_font_size').";"; 
	
	/* Nav  Font Color */
	if (wip_setting('wip_menu_font_color')) 
		$navstyle .= "color:".wip_setting('wip_menu_font_color').";"; 
	
	if ($navstyle)
		echo 'nav#mainmenu ul li a { '.$navstyle.' } ';
		
	if ( wip_setting('wip_hover_font_color') ):
		echo "nav#mainmenu ul li a:hover, nav#mainmenu li:hover > a , nav#mainmenu ul li.current-menu-item > a, nav#mainmenu ul li.current_page_item > a, nav#mainmenu ul li.current-menu-parent > a,  nav#mainmenu ul li.current-menu-ancestor > a { color:".wip_setting('wip_hover_font_color')." } ;"; 
	endif;
		
		
	if ( wip_setting('wip_hover_font_color') ) 
		echo "nav#mainmenu ul ul li a:hover,  nav#mainmenu ul ul li.current-menu-item > a,  nav#mainmenu ul ul li.current-post-ancestor > a, nav#mainmenu ul ul li.current-menu-ancestor > a { color:".wip_setting('wip_hover_font_color')."; }"; 

/* =================== END NAV STYLE =================== */

/* =================== START TITLE STYLE =================== */

	if (wip_setting('wip_h1_font_size')) 
		echo "h1 {font-size:".wip_setting('wip_h1_font_size')."; }"; 
	if (wip_setting('wip_h2_font_size')) 
		echo "h2 { font-size:".wip_setting('wip_h2_font_size')."; }"; 
	if (wip_setting('wip_h3_font_size')) 
		echo "h3 { font-size:".wip_setting('wip_h3_font_size')."; }"; 
	if (wip_setting('wip_h4_font_size')) 
		echo "h4 { font-size:".wip_setting('wip_h4_font_size')."; }"; 
	if (wip_setting('wip_h5_font_size')) 
		echo "h5 { font-size:".wip_setting('wip_h5_font_size')."; }"; 
	if (wip_setting('wip_h6_font_size')) 
		echo "h6 { font-size:".wip_setting('wip_h6_font_size')."; }"; 


/* =================== END TITLE STYLE =================== */

/* =================== START LINK STYLE =================== */

	if ( wip_setting('wip_link_color') ):
	
		echo '.pin-article .link:hover, .contact-form input[type=submit], .pin-article .quote:hover, .pin-article .link a:hover, .button, .wp-pagenavi a:hover , .wp-pagenavi span.current { background-color: '.wip_setting('wip_link_color').'; } ';
		echo 'a, nav#mainmenu ul li a:hover, nav#mainmenu li:hover > a, nav#mainmenu ul li.current-menu-item > a, nav#mainmenu ul li.current_page_item > a, nav#mainmenu ul li.current-menu-parent > a, nav#mainmenu ul li.current_page_ancestor > a, nav#mainmenu ul li.current-menu-ancestor > a { color: '.wip_setting('wip_link_color').'; } ';
		echo '::-moz-selection { background-color: '.wip_setting('wip_link_color').'; } ';
		echo '::selection { background-color: '.wip_setting('wip_link_color').'; } ';
		echo 'nav#mainmenu ul ul { border-top-color: '.wip_setting('wip_link_color').'; } ';
		echo 'nav#mainmenu ul ul:before { border-bottom-color: '.wip_setting('wip_link_color').'; } ';
		echo 'nav#mainmenu ul ul li a:hover, nav#mainmenu ul ul li.current-menu-item > a, nav#mainmenu ul ul li.current_page_item > a, nav#mainmenu ul ul li.current_page_ancestor > a, nav#mainmenu ul ul li.current_page_ancestor > a, nav#mainmenu ul ul li.current-menu-ancestor > a, #sidebar .tagcloud a, #footer .tagcloud a  { background: '.wip_setting('wip_link_color').'; } ';
		echo 'nav#mainmenu ul ul li a:hover, nav#mainmenu ul ul li.current-menu-item > a, nav#mainmenu ul ul li.current_page_item > a, nav#mainmenu ul ul li.current_page_ancestor > a, nav#mainmenu ul ul li.current_page_ancestor > a, nav#mainmenu ul ul li.current-menu-ancestor > a  { border-top-color: '.wip_setting('wip_link_color').'; } ';
		
		
	endif;	
	
	if ( wip_setting('wip_link_color_hover') ):

		echo '.contact-form input[type=submit]:hover, .button:hover, #sidebar .tagcloud a:hover, #footer .tagcloud a:hover, .contact-form input[type=submit]:hover { background: '.wip_setting('wip_link_color_hover').'; } ';
		echo 'a:hover, #footer a:hover, #footer ul.widget-category li:hover, #footer ul.widget-category li a:hover, .pin-article h1.title a:hover, #logo a:hover { color: '.wip_setting('wip_link_color_hover').'; } ';
	
	endif;	

	if ( wip_setting('wip_border_color') ):
	
		echo '#footer, #footer .widget, article blockquote { border-color: '.wip_setting('wip_border_color').'; } ';
		
	endif;	
		
	if ( wip_setting('wip_copyright_font_color')):
	
		echo '#footer .title, #footer p, #footer li, #footer address, #footer dd, #footer blockquote, #footer td, #footer th, #footer .textwidget, #footer a, #footer ul,#footer p, #footer .copyright p, #footer .copyright a  { color: '.wip_setting('wip_copyright_font_color').'; } ';
		
	endif;	

/* =================== END LINK STYLE =================== */


	if (wip_setting('wip_custom_css_code'))
		echo wip_setting('wip_custom_css_code'); 

?>

</style>
    
<?php }

add_action('wp_head', 'wip_css_custom');

?>