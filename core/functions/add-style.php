<?php function wip_css_custom() { ?>

<style type="text/css">

<?php

/* =================== BEGIN BODY STYLE =================== */

	$bodystyle = '';

	/* Background Image */
	if ( (wip_setting('wip_body_background')) && (wip_setting('wip_body_background') <> 'None') ):
		$bodystyle .= 'background: url('.get_bloginfo('template_directory').wip_setting('wip_body_background').');'; 
	elseif ( (!wip_setting('wip_body_custom_background')) && ( wip_setting('wip_body_background') == "None") ): 
		$bodystyle .= 'background-image: none;'; 
	elseif (wip_setting('wip_body_custom_background')): 
		$bodystyle .= 'background: url('.wip_setting('wip_body_custom_background').');'; 
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
		echo 'body.custombody { '.$bodystyle.' } ';
		
/* =================== END BODY STYLE =================== */

/* =================== BEGIN HEADER STYLE =================== */

	$headerstyle = '';

	/* Background Image */
	if ( (wip_setting('wip_header_background')) && (wip_setting('wip_header_background') <> 'None') ):
		$headerstyle .= 'background: url('.get_bloginfo('template_directory').wip_setting('wip_header_background').');'; 
	elseif ( (!wip_setting('wip_header_custom_background')) && ( wip_setting('wip_header_background') == "None") ): 
		$headerstyle .= 'background-image: none;'; 
	elseif (wip_setting('wip_header_custom_background')): 
		$headerstyle .= 'background: url('.wip_setting('wip_header_custom_background').');'; 
	endif;

	/* Background Repeat */
	if ( (wip_setting('wip_header_background_repeat') ) && ( (wip_setting('wip_header_background') <> 'None') || (wip_setting('wip_header_custom_background')) )  ) 
		$headerstyle .= 'background-repeat:'.wip_setting('wip_header_background_repeat').';'; 
	
	/* Background Position */
	if ( (wip_setting('wip_header_background_position') ) && ( (wip_setting('wip_header_background') <> 'None') || (wip_setting('wip_header_custom_background')) )  ) 
		$headerstyle .= 'background-position:'.wip_setting('wip_header_background_position').';'; 
	
	/* Background Color */
	if (wip_setting('wip_header_background_color'))
		$headerstyle .= 'background-color:'.wip_setting('wip_header_background_color').';';
			 
	/* Background Attachment */
	if ( (wip_setting('wip_header_background_attachment')) && ( (wip_setting('wip_header_background') <> 'None') || (wip_setting('wip_header_custom_background')) )  ) 
		$headerstyle .= 'background-attachment:'.wip_setting('wip_header_background_attachment').';'; 

	if ($headerstyle)
		echo 'header.header { '.$headerstyle.' } ';
		
/* =================== END HEADER STYLE =================== */

/* =================== BEGIN FOOTER STYLE =================== */

	$footerstyle = '';
	
	/* Background Image */
	if ( (wip_setting('wip_footer_background')) && (wip_setting('wip_footer_background') <> 'None') ):
		$footerstyle .= 'background: url('.get_bloginfo('template_directory').wip_setting('wip_footer_background').');'; 
	elseif ( (!wip_setting('wip_footer_custom_background')) && ( wip_setting('wip_footer_background') == "None") ): 
		$footerstyle .= 'background-image: none;'; 
	elseif (wip_setting('wip_footer_custom_background')): 
		$footerstyle .= 'background: url('.wip_setting('wip_footer_custom_background').');'; 
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
		echo 'footer#footer { '.$footerstyle.' } ';
		
		
		
/* =================== END FOOTER STYLE =================== */

/* =================== BEGIN LOGO STYLE =================== */

	$logostyle = '';
	/* Logo Font */
	if (wip_setting('wip_logo_font')) 
		$logostyle .= "font-family:'".wip_setting('wip_logo_font')."',Verdana, Geneva, sans-serif;"; 

	/* Logo Font Size */
	if (wip_setting('wip_logo_font_size')) 
		$logostyle .= "font-size:".wip_setting('wip_logo_font_size').";"; 
	
	if ($logostyle)
		echo '#logo a.logo { '.$logostyle.' } ';

/* =================== END LOGO STYLE =================== */

/* =================== BEGIN NAV STYLE =================== */

	$navstyle = '';

	/* Nav Font */
	if (wip_setting('wip_menu_font')) 
		$navstyle .= "font-family:'".wip_setting('wip_menu_font')."',Verdana, Geneva, sans-serif;"; 

	/* Nav  Font Size */
	if (wip_setting('wip_menu_font_size')) 
		$navstyle .= "font-size:".wip_setting('wip_menu_font_size').";"; 
	
	/* Nav  Font Color */
	if (wip_setting('wip_menu_font_color')) 
		$navstyle .= "color:".wip_setting('wip_menu_font_color').";"; 
	
	if ($navstyle)
		echo 'nav#mainmenu ul li a { '.$navstyle.' } ';

/* =================== END NAV STYLE =================== */

/* =================== START TITLE STYLE =================== */

	$titlestyle = '';

	if (wip_setting('wip_titles_font')) 
		$titlestyle .= "font-family:'".wip_setting('wip_titles_font')."',Verdana, Geneva, sans-serif;"; 
	
	if ($titlestyle)
		echo 'h1.title, h2.title, h3.title, h4.title, h5.title, h6.title, h1, h2, h3, h4, h5, h6  { '.$titlestyle.' } ';

	if (wip_setting('wip_h1_font_size')) 
		echo "h1 {font-size:".wip_setting('wip_h1_font_size')." !important; }"; 
	if (wip_setting('wip_h2_font_size')) 
		echo "h2 { font-size:".wip_setting('wip_h2_font_size')." !important; }"; 
	if (wip_setting('wip_h3_font_size')) 
		echo "h3 { font-size:".wip_setting('wip_h3_font_size')." !important; }"; 
	if (wip_setting('wip_h4_font_size')) 
		echo "h4 { font-size:".wip_setting('wip_h4_font_size')." !important; }"; 
	if (wip_setting('wip_h5_font_size')) 
		echo "h5 { font-size:".wip_setting('wip_h5_font_size')." !important; }"; 
	if (wip_setting('wip_h6_font_size')) 
		echo "h6 { font-size:".wip_setting('wip_h6_font_size')." !important; }"; 


/* =================== END TITLE STYLE =================== */

/* =================== START REV SLIDER STYLE =================== */

	if (wip_setting('wip_revslider_font')) 
		echo ".tp-caption { font-family:'".wip_setting('wip_revslider_font')."',Verdana, Geneva, sans-serif !important ; }"; 

/* =================== END REV SLIDER STYLE =================== */

/* =================== START LINK STYLE =================== */

	if ( wip_setting('wip_text_font_color') ):
		echo 'p, dl, ul, ol { color: '.wip_setting('wip_text_font_color').'; } ';
	endif;	

	if ( wip_setting('wip_link_color') ):
		echo '::-moz-selection { background-color: '.wip_setting('wip_link_color').'; } ';
		echo '::selection { background-color: '.wip_setting('wip_link_color').'; } ';

		echo '.button, .skills .views.active, .skills .views:hover, .filter li:hover, .filter li.active, .contact-form input[type=submit], .comment-form input[type=submit], .button:hover, #header-box .tagcloud a, #bottom-box .tagcloud a, #top-box .tagcloud a, #footer-box .tagcloud a, #sidebar .tagcloud a, #slogan, .flex-control-paging li a.flex-active, .flex-control-paging li a:hover, .rev_slider_wrapper .tp-bullets.simplebullets.round .bullet.selected, .ei-slider-thumbs li.ei-slider-element { background-color: '.wip_setting('wip_link_color').'; } ';

		echo 'a, .works a.link:hover { color: '.wip_setting('wip_link_color').'; } ';

	endif;	
	
	if ( wip_setting('wip_header_font_color') ):
		echo 'nav#mainmenu ul li a { color: '.wip_setting('wip_header_font_color').'; } ';
	endif;	

	if ( wip_setting('wip_submenu_text_color') ):
		echo 'nav#mainmenu ul ul li a { color: '.wip_setting('wip_submenu_text_color').'; } ';
	endif;	

	if ( wip_setting('wip_header_hover_font_color') ):
		echo 'nav#mainmenu ul li a:hover, nav#mainmenu li:hover > a, nav#mainmenu ul li.current-menu-item > a,  nav#mainmenu ul li.current_page_item > a,  nav#mainmenu ul li.current-menu-parent > a, nav#mainmenu ul li.current_page_ancestor > a, nav#mainmenu ul li.current-menu-ancestor > a, nav#mainmenu ul ul li a:hover, nav#mainmenu ul ul li a:hover, nav#mainmenu ul ul li.current-menu-item > a, nav#mainmenu ul ul li.current_page_item > a, nav#mainmenu ul ul li.current_page_ancestor > a, nav#mainmenu ul ul li.current_page_ancestor > a, nav#mainmenu ul ul li.current-menu-ancestor > a, #logo a.logo, #logo a.logo:hover  { color: '.wip_setting('wip_header_hover_font_color').'; } ';
	endif;	

	if (wip_setting('wip_submenu_color'))  {
		echo 'nav#mainmenu ul ul { background-color: '.wip_setting('wip_submenu_color').'; } ';
		echo 'nav#mainmenu ul ul:before { border-bottom: 8px solid '.wip_setting('wip_submenu_color').'; } ';
	}

	if ( wip_setting('wip_link_color_hover') ):

		echo 'a:hover, #footer a:hover, #footer .copyright a:hover, #footer ul.widget-category li:hover, #footer ul.widget-category li a:hover, .pin-article .title h1 a:hover, blockquote h4.title a:hover { color: '.wip_setting('wip_link_color_hover').'; } ';

		echo '.button:hover, .pin-article .quote:hover, .pin-article .link a:hover, .contact-form input[type=submit]:hover, .comment-form input[type=submit]:hover, .jcarousel-skin-wip .circle, .jcarousel-skin-wip .pin-article > .text .button:hover, .jcarousel-skin-wip .pin-article:hover, #header-box .tagcloud a:hover, #top-box .tagcloud a:hover, #bottom-box .tagcloud a:hover, #footer-box .tagcloud a:hover, #sidebar .tagcloud a:hover, .wp-pagenavi a:hover, .wp-pagenavi span.current, .theme-default .nivo-directionNav a:hover, .flexslider .flex-next:hover, .flexslider .flex-prev:hover, .flex-caption .description, .jcarousel-skin-wip .jcarousel-next-horizontal, .jcarousel-skin-wip .jcarousel-prev-horizontal, .flex-caption .url:hover { background-color: '.wip_setting('wip_link_color_hover').'; } ';

		echo '.jcarousel-skin-wip .pin-article:hover { border-color: '.wip_setting('wip_link_color_hover').' !important; } ';

		echo '.tp-leftarrow.default:hover, .tp-rightarrow.default:hover { background-color: '.wip_setting('wip_link_color_hover').' !important; } ';

	endif;	

	if ( wip_setting('wip_border_color') ):
	
		echo '.contact-form input[type=submit], .contact-form input[type=submit]:hover, .comment-form input[type=submit], .comment-form input[type=submit]:hover, .jcarousel-skin-wip .pin-article > .text, .button, .button:hover { border-color: '.wip_setting('wip_border_color').' !important; } ';

		echo '#footer, #footer .widget, article blockquote { border-color: '.wip_setting('wip_border_color').'; } ';
		
	endif;	
		
	if ( wip_setting('wip_copyright_font_color') ):
	
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