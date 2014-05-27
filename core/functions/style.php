<?php 

function diarjolite_css_custom() { 

	echo '<style type="text/css">';
	
/* =================== END BODY STYLE =================== */

/* =================== BEGIN LOGO STYLE =================== */

	/* Logo Font Size */
	if (diarjolite_setting('diarjolite_logo_font_size')) 
		$logostyle .= "font-size:".diarjolite_setting('diarjolite_logo_font_size').";"; 
	
	if ($logostyle)
		echo '#logo a { '.$logostyle.' } ';

/* =================== END LOGO STYLE =================== */

/* =================== BEGIN NAV STYLE =================== */

	$navstyle = '';

	/* Nav  Font Size */
	if (diarjolite_setting('diarjolite_menu_font_size')) 
		$navstyle .= "font-size:".diarjolite_setting('diarjolite_menu_font_size').";"; 
	
	if ($navstyle)
		echo 'nav#mainmenu ul li a, nav#mainmenu ul ul li a { '.$navstyle.' } ';
		
/* =================== END NAV STYLE =================== */

/* =================== BEGIN CONTENT STYLE =================== */

	if (diarjolite_setting('diarjolite_content_font_size')) 
		echo ".post-article p, .post-article li, .post-article address, .post-article dd, .post-article blockquote, .post-article td, .post-article th, .textwidget, .toggle_container h5.element  { font-size:".diarjolite_setting('diarjolite_content_font_size')."}"; 
	

/* =================== END CONTENT STYLE =================== */

/* =================== START TITLE STYLE =================== */

	$titlestyle = '';

	if ($titlestyle)
		echo 'h1.title, h2.title, h3.title, h4.title, h5.title, h6.title, h1, h2, h3, h4, h5, h6, #subheader p, #subheader h1, h3#reply-title, h3.comments { '.$titlestyle.' } ';

	if (diarjolite_setting('diarjolite_h1_font_size')) 
		echo "h1 {font-size:".diarjolite_setting('diarjolite_h1_font_size')."; }"; 
	if (diarjolite_setting('diarjolite_h2_font_size')) 
		echo "h2 { font-size:".diarjolite_setting('diarjolite_h2_font_size')."; }"; 
	if (diarjolite_setting('diarjolite_h3_font_size')) 
		echo "h3 { font-size:".diarjolite_setting('diarjolite_h3_font_size')."; }"; 
	if (diarjolite_setting('diarjolite_h4_font_size')) 
		echo "h4 { font-size:".diarjolite_setting('diarjolite_h4_font_size')."; }"; 
	if (diarjolite_setting('diarjolite_h5_font_size')) 
		echo "h5 { font-size:".diarjolite_setting('diarjolite_h5_font_size')."; }"; 
	if (diarjolite_setting('diarjolite_h6_font_size')) 
		echo "h6 { font-size:".diarjolite_setting('diarjolite_h6_font_size')."; }"; 


/* =================== END TITLE STYLE =================== */

/* =================== START HEADER SIDEBAR AND FOOTER STYLE =================== */

	if ( diarjolite_setting('diarjolite_bars_background_color') ):

		echo '#header, #footer, #sidebar .post-article, #back-to-top i, nav#mainmenu ul ul, #wp-calendar { background-color: '.diarjolite_setting('diarjolite_bars_background_color').'; } ';

	endif;	
	
	if ( diarjolite_setting('diarjolite_bars_text_color') ):

		echo '#sidebar h3.title, #sidebar a, #sidebar p, #sidebar li, #sidebar address,
#sidebar dd, #sidebar blockquote, #sidebar td, #sidebar th, #sidebar label, #sidebar .textwidget, #footer h3.title, #footer a, #footer p, #footer li, #footer address,
#footer dd, #footer blockquote, #footer td, #footer th, #footer label, #footer .textwidget, nav#mainmenu ul li a, #back-to-top i, #wp-calendar caption, #wp-calendar td a, #footer h4.title, #logo a, nav#widgetmenu li a { color: '.diarjolite_setting('diarjolite_bars_text_color').'; } ';

	endif;	
	
	if ( diarjolite_setting('diarjolite_bars_borders_color') ):

		echo 'nav#mainmenu ul ul li:last-of-type a, #searchform input[type=submit], .contact-form input[type=submit], #commentform input[type=submit], #sidebar li, #footer li, #footer .widgets, ul.widget-category, ul.widget-category li a, ul.contact-info li, .bottom_widget ul.contact-info li, .tagcloud a, .socials a, #back-to-top i, nav#mainmenu ul li a, #sidebar ul.children, #sidebar ul.sub-menu, #wp-calendar th, #wp-calendar td, nav#widgetmenu ul, nav#widgetmenu li a, nav#widgetmenu li:last-of-type a, nav#widgetmenu li:last-of-type a:hover, #sidebar li, #footer li, #sidebar ul.children, #sidebar ul.children, #footer ul.sub-menu, #sidebar ul.sub-menu { border-color: '.diarjolite_setting('diarjolite_bars_borders_color').'; } ';

	endif;	

/* =================== END HEADER SIDEBAR AND FOOTER STYLE =================== */

/* =================== START LINK STYLE =================== */

	if ( diarjolite_setting('diarjolite_link_color') ):

		echo '::-moz-selection { background-color: '.diarjolite_setting('diarjolite_link_color').'; } ';
		echo '::selection { background-color: '.diarjolite_setting('diarjolite_link_color').'; } ';

		echo '.skills .views, .filter, #searchform input[type=submit], .contact-form input[type=submit], #commentform input[type=submit]{ background-color: '.diarjolite_setting('diarjolite_link_color').'; } ';

		echo '.skills .views, .filter, #searchform input[type=submit], .contact-form input[type=submit], #commentform input[type=submit] { border-color: '.diarjolite_setting('diarjolite_link_color').'; } ';

	endif;	
	
	if ( diarjolite_setting('diarjolite_link_color_hover') ):

		echo '#subheader, nav#mainmenu ul li a:hover,nav#mainmenu li:hover > a, nav#mainmenu ul li.current-menu-item > a, nav#mainmenu ul li.current_page_item > a, nav#mainmenu ul li.current-menu-parent > a, nav#mainmenu ul li.current_page_ancestor > a, nav#mainmenu ul li.current-menu-ancestor > a, #back-to-top i.open, #back-to-top i:hover, .post-article .link a:hover, .post-article .quote:hover, .filter li:hover, .filter li.active, ul.widget-category li a:hover, #wp-calendar #today, #wp-calendar #today a, .tagcloud a:hover, .tabs li a:hover, .tabs li.ui-tabs-active a, .tabs li.ui-state-active a, .toggle_container h5.element:hover, .toggle_container h5.inactive, .toggle_container h5.inactive:hover, .socials a:hover, .wp-pagenavi a:hover, .wp-pagenavi span.current, .wip-pagination span, .wip-pagination span:hover, #searchform input[type=submit]:hover, .contact-form input[type=submit]:hover, #commentform input[type=submit]:hover, .skills .views.active, .skills .views:hover, .theme-default .nivo-directionNav a:hover, .flexslider:hover .flex-next:hover, .flexslider:hover .flex-prev:hover, nav#widgetmenu li a:hover, nav#widgetmenu li:hover > a , nav#widgetmenu li.current-menu-item > a, nav#widgetmenu li.current-menu-ancestor > a { background-color: '.diarjolite_setting('diarjolite_link_color_hover').'; } ';

		echo 'a.more:hover, a:hover, #footer a:hover, #sidebar a:hover, .post-article .title a:hover, .post-info a:hover, .filterable-grid  h4.title a:hover, .filterable-grid  h4.title a:focus, #logo a:hover, #footer a:hover { color: '.diarjolite_setting('diarjolite_link_color_hover').'; } ';

		echo 'nav#mainmenu ul li a:hover,nav#mainmenu li:hover > a,nav#mainmenu ul li.current-menu-item > a, nav#mainmenu ul li.current_page_item > a, nav#mainmenu ul li.current-menu-parent > a, nav#mainmenu ul li.current_page_ancestor > a, nav#mainmenu ul li.current-menu-ancestor > a, nav#mainmenu ul ul li:last-of-type a:hover, nav#mainmenu ul ul li:last-of-type:hover > a, nav#mainmenu ul ul li.current-menu-item > a, nav#mainmenu ul ul li.current_page_item > a, nav#mainmenu ul ul li.current-menu-parent > a, nav#mainmenu ul ul li.current_page_ancestor > a, nav#mainmenu ul ul li.current-menu-ancestor > a, #back-to-top i.open, #back-to-top i:hover, ul.widget-category li a:hover, .tagcloud a:hover, .toggle_container h5.element:hover, .toggle_container h5.inactive, .toggle_container h5.inactive:hover, .toggle_container h5.element:hover:last-of-type, .toggle_container h5.inactive:last-of-type, .toggle_container h5.inactive:hover:last-of-type, .socials a:hover, #searchform input[type=submit]:hover, .contact-form input[type=submit]:hover, #commentform input[type=submit]:hover, nav#widgetmenu li a:hover, nav#widgetmenu li:hover > a , nav#widgetmenu li.current-menu-item > a, nav#widgetmenu li.current-menu-ancestor > a { border-color: '.diarjolite_setting('diarjolite_link_color_hover').'; } ';

	endif;	

/* =================== END LINK STYLE =================== */

	if (diarjolite_setting('diarjolite_custom_css_code'))
		echo htmlspecialchars_decode(diarjolite_setting('diarjolite_custom_css_code')); 

	echo '</style>';

}

add_action('wp_head', 'diarjolite_css_custom');

?>