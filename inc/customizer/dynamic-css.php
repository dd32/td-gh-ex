<?php

function ashe_dynamic_css() {

	// begin style block
	$css = '<style id="ashe_dynamic_css">';

/*
** Colors =====
*/

	// Top Bar
	$css .= '
		#top-bar,
		#top-bar .sub-menu a {
		  background-color: '. ashe_options( 'colors_top_bar_bg' ) .';
		}

		#top-bar a {
		  color: '. ashe_options( 'colors_top_bar_link' ) .';
		}

		#top-bar a:hover {
		  color: '. ashe_options( 'colors_top_bar_link_hover' ) .';
		}

		#top-menu .sub-menu a:hover {
		  background-color: '. ashe_hex2rgba( ashe_options( 'colors_top_bar_bg' ), 0.9 ) .';
		}
	';

	// Main Navigation
	$css .= '
		#main-nav {
			background-color: '. ashe_options( 'colors_main_nav_bg' ) .';
			box-shadow: 0px 1px 5px '. ashe_hex2rgba( ashe_options( 'colors_main_nav_link' ), 0.1 ) .';
		}

		#featured-links h4 {
			background-color: '. ashe_hex2rgba( ashe_options( 'colors_main_nav_bg' ), 0.85 ) .';
			color: '. ashe_options( 'colors_main_nav_link' ) .';
		}

		#main-nav a,
		#main-nav i,
		#main-nav #s {
			color: '. ashe_options( 'colors_main_nav_link' ) .';
		}

		.main-nav-sidebar span,
		.sidebar-alt-close-btn span {
			background-color: '. ashe_options( 'colors_main_nav_link' ) .';
		}

		#main-nav a:hover,
		#main-nav i:hover {
			color: '. ashe_options( 'colors_main_nav_link_hover' ) .';
		}

		.main-nav-sidebar:hover span {
			background-color: '. ashe_options( 'colors_main_nav_link_hover' ) .';
		}

		#main-menu .sub-menu,
		#main-nav .sub-menu a {
			background-color: '. ashe_options( 'colors_main_nav_bg' ) .';
			border-color: '. ashe_hex2rgba( ashe_options( 'colors_main_nav_link' ), 0.05 ) .';
		}

		#main-nav #s {
			background-color: '. ashe_options( 'colors_main_nav_bg' ) .';
		}

		#main-nav #s::-webkit-input-placeholder { /* Chrome/Opera/Safari */
			color: '. ashe_hex2rgba( ashe_options( 'colors_main_nav_link' ), 0.7 ) .';
		}
		#main-nav #s::-moz-placeholder { /* Firefox 19+ */
			color: '. ashe_hex2rgba( ashe_options( 'colors_main_nav_link' ), 0.7 ) .';
		}
		#main-nav #s:-ms-input-placeholder { /* IE 10+ */
			color: '. ashe_hex2rgba( ashe_options( 'colors_main_nav_link' ), 0.7 ) .';
		}
		#main-nav #s:-moz-placeholder { /* Firefox 18- */
			color: '. ashe_hex2rgba( ashe_options( 'colors_main_nav_link' ), 0.7 ) .';
		}
	';

	// Content
	$css .= '
		/* Background */
		body,
		.sidebar-alt,
		#page-content,
		#featured-slider,
		#page-content select,
		#page-content input,
		#page-content textarea {
			background-color: '. ashe_options( 'colors_content_bg' ) .';
		}

		/* Text */
		#page-content,
		#page-content select,
		#page-content input,
		#page-content textarea,
		#page-content .post-comments,
		#page-content .post-author a,
		#page-content .related-posts h4 a,
		#page-content .author-description h4 a,
		#page-content .ashe-widget a {
			color: '. ashe_options( 'colors_content_text' ) .';
		}

		#page-content #s::-webkit-input-placeholder { /* Chrome/Opera/Safari */
		  color: '. ashe_options( 'colors_content_text' ) .';
		}
		#page-content #s::-moz-placeholder { /* Firefox 19+ */
		  color: '. ashe_options( 'colors_content_text' ) .';
		}
		#page-content #s:-ms-input-placeholder { /* IE 10+ */
		  color: '. ashe_options( 'colors_content_text' ) .';
		}
		#page-content #s:-moz-placeholder { /* Firefox 18- */
		  color: '. ashe_options( 'colors_content_text' ) .';
		}

		/* Title */
		#page-content h1 a,
		#page-content h1,
		#page-content h2,
		#page-content h3,
		#page-content h4,
		#page-content h5,
		#page-content h6,
		.post-content > p:first-child:first-letter {
			color: '. ashe_options( 'colors_content_title' ) .';
		}
	
		/* Meta */
		#page-content .post-date,
		#page-content .post-author,
		#page-content .related-post-date,
		#page-content .comment-meta a,
		#page-content .author-share a,
		#page-content .post-tags a,
		.widget_categories li,
		.widget_archive li {
			color: '. ashe_options( 'colors_content_meta' ) .';
		}
	
		/* Accent */
		#page-content a,
		#page-content h1 a:hover {
			color: '. ashe_options( 'colors_content_accent' ) .';
		}

		.ps-container > .ps-scrollbar-y-rail > .ps-scrollbar-y {
			background: '. ashe_options( 'colors_content_accent' ) .';
		}

		#page-content a:hover {
			color: '. ashe_hex2rgba( ashe_options( 'colors_content_accent' ), 0.8 ) .';
		}

		/* Selection */
		::-moz-selection {
			color: #ffffff;
			background: '. ashe_options( 'colors_text_selection' ) .';
		}
		::selection {
			color: #ffffff;
			background: '. ashe_options( 'colors_text_selection' ) .';
		}

		/* Border */
		#page-content .post-footer,
		#page-content .author-description,
		#page-content .related-posts,
		#page-content .entry-comments,
		#page-content .ashe-widget li,
		#page-content #wp-calendar,
		#page-content #wp-calendar caption,
		#page-content #wp-calendar tbody td,
		#page-content .widget_nav_menu li a,
		#page-content select,
		#page-content input,
		#page-content textarea,
		.widget-title h2:before,
		.widget-title h2:after,
		.post-tags a,
		.gallery-caption,
		.wp-caption-text {
			border-color: '. ashe_options( 'colors_content_border' ) .';
		}

		/* Buttons */
		.widget_search i,
		.widget_search #searchsubmit,
		.single-navigation i,
		#page-content .submit,
		#page-content .tagcloud a,
		#page-footer .tagcloud a,
		#page-content .blog-pagination a {
			color: '. ashe_options( 'colors_button_text' ) .';
			background-color: '. ashe_options( 'colors_button' ) .';
		}
		.single-navigation i:hover,
		#page-content .submit:hover,
		#page-content .tagcloud a:hover,
		#page-footer .tagcloud a:hover,
		#page-content .blog-pagination .current,
		#page-content .blog-pagination a:hover {
			color: '. ashe_options( 'colors_button_hover_text' ) .';
			background-color: '. ashe_options( 'colors_button_hover' ) .';
		}

		/* Image Overlay */
		.image-overlay,
		#page-content h4.image-overlay {
			color: '. ashe_options( 'colors_overlay_text' ) .';
			background-color: '. ashe_hex2rgba( ashe_options( 'colors_overlay' ), 0.3 ) .';
		}

		.image-overlay a,
		#page-content .image-overlay a,
		#featured-slider .slick-arrow,
		#featured-slider .slider-dots {
			color: '. ashe_options( 'colors_overlay_text' ) .';
		}
		
		#featured-slider .slick-active {
			background: '. ashe_options( 'colors_overlay_text' ) .';
		}
	';

	// Footer
	$css .= '
		#page-footer,
		#page-footer select,
		#page-footer input,
		#page-footer textarea {
			background-color: '. ashe_options( 'colors_footer_bg' ) .';/
		}

		#page-footer,
		#page-footer a,
		#page-footer select,
		#page-footer input,
		#page-footer textarea {
			color: '. ashe_options( 'colors_footer_text' ) .';
		}

		#page-footer #s::-webkit-input-placeholder { /* Chrome/Opera/Safari */
		  color: '. ashe_options( 'colors_footer_text' ) .';
		}
		#page-footer #s::-moz-placeholder { /* Firefox 19+ */
		  color: '. ashe_options( 'colors_footer_text' ) .';
		}
		#page-footer #s:-ms-input-placeholder { /* IE 10+ */
		  color: '. ashe_options( 'colors_footer_text' ) .';
		}
		#page-footer #s:-moz-placeholder { /* Firefox 18- */
		  color: '. ashe_options( 'colors_footer_text' ) .';
		}

		/* Title */
		#page-footer h1,
		#page-footer h2,
		#page-footer h3,
		#page-footer h4,
		#page-footer h5,
		#page-footer h6 {
			color: '. ashe_options( 'colors_footer_title' ) .';
		}

		#page-footer a:hover {
			color: '. ashe_options( 'colors_footer_accent' ) .';
		}

		/* Border */
		#page-footer a,
		#page-footer .ashe-widget li,
		#page-footer #wp-calendar,
		#page-footer #wp-calendar caption,
		#page-footer #wp-calendar tbody td,
		#page-footer .widget_nav_menu li a,
		#page-footer select,
		#page-footer input,
		#page-footer textarea,
		.footer-widgets {
			border-color: '. ashe_options( 'colors_footer_border' ) .';
		}
	';


/*
** General Layouts =====
*/
	// Site Width
	$css .= '
		.boxed-wrapper {
			max-width: '. ashe_options( 'general_site_width' ) .'px;
		}
	';
	
	// Sidebar Width
	$css .= '
		.sidebar-alt {
			width: '. ( ashe_options( 'general_sidebar_width' ) + 70 ) .'px;
			left: -'. ( ashe_options( 'general_sidebar_width' ) + 70 ) .'px; 
			padding: 85px 35px 0px;
		}

		.sidebar-left,
		.sidebar-right {
			width: '. ( ashe_options( 'general_sidebar_width' ) + ashe_options( 'blog_page_gutter_horz' ) ) .'px;
		}
	';

	// Background Image
	$css .= '
		#page-wrap {
			background-image: url("'. ashe_options( 'general_bg_image' ) .'");
			background-size: '. ashe_options( 'general_bg_image_size' ) .';
			background-attachment: '. ashe_options( 'general_bg_image_type' ) .';
		}
	'; 


/*
** Top Bar =====
*/
	// Transparent
	if ( ashe_options( 'top_bar_transparent' ) === true ) {
		$css .= '
			#top-bar {
				position: absolute;
				top: 0;
				left: 0;
				z-index: 10;
				width: 100%;
				background-color: transparent !important;
			}
			.admin-bar #top-bar {
				top: 32px;
			}
		'; 
	}

	// Align
	if ( ashe_options( 'top_bar_align' ) === 'left-right' ) {
		$css .= '
			#top-menu {
				float: left;
			}
			.top-bar-socials {
				float: right;
			}
		'; 
	} elseif ( ashe_options( 'top_bar_align' ) === 'right-left' ) {
		$css .= '
			#top-menu {
				float: right;
			}
			.top-bar-socials {
				float: left;
			}
		'; 
	}


/*
** Page Header =====
*/
	// Height / Background
	$css .= '
		.entry-header {
			height: '. ashe_options( 'page_header_height' ) .'px;
			background-size: '. ashe_options( 'page_header_bg_image_size' ) .';
		}
	';

	// Center if cover
	if ( ashe_options( 'page_header_bg_image_size' ) === 'cover' ) {
		$css .= '
			.entry-header {
				background-position: center center;
			}
		';		
	}

	// Header Logo
	$css .= '
		.header-logo a {
			width: '. ashe_options( 'page_header_logo_width' ) .'px;
			padding-top: '. ashe_options( 'page_header_logo_distance' ) .'px;
		}
	';


/*
** Main Navigation =====
*/
	// Height
	$css .= '
		#main-menu li a,
		.main-nav-search,
		#main-nav #s {
			line-height: '. ashe_options( 'main_nav_height' ) .'px;
		}

		.main-nav-sidebar {
			height: '. ashe_options( 'main_nav_height' ) .'px;
		}

		.sidebar-alt-btn {
			max-height: '. ashe_options( 'main_nav_height' ) .'px;
		}
	';

	// Align
	$css .= '
		#main-nav {
			text-align: '. ashe_options( 'main_nav_align' ) .';
		}
	';

	if ( ashe_options( 'main_nav_align' ) === 'center' ) {
		$css .= '
			.main-nav-sidebar {
			  position: absolute;
			  top: 0px;
			  left: 0px;
			  z-index: 1;
			}
						
			#main-nav .main-nav-icons {
			  position: absolute;
			  top: 0px;
			  right: 0px;
			  z-index: 2;
			}
		';
	} else {
		$css .= '
			.main-nav-sidebar {
			  float: left;
			}
						
			#main-nav .main-nav-icons {
			 float: right;
			}
		';
	}


/*
** Featured Links =====
*/
	// Layout
	$featured_links = array(
		ashe_options( 'featured_links_image_1' ),
		ashe_options( 'featured_links_image_2' ),
		ashe_options( 'featured_links_image_3' ),
		ashe_options( 'featured_links_image_4' ),
		ashe_options( 'featured_links_image_5' )
	);

	$featured_links = ashe_options( 'featured_links_fill' ) ? array_filter( $featured_links ) : $featured_links;
	$featured_links_gutter = 0;

	// Gutter
	if ( ashe_options( 'featured_links_gutter_horz' ) === true ) {
		$featured_links_gutter = 30;
		$css .= '
			#featured-links .featured-link {
				margin-right: '. $featured_links_gutter .'px;
			}
			#featured-links .featured-link:last-of-type {
				margin-right: 0;
			}
		';
	}

	// Columns
	$css .= '
		#featured-links .featured-link {
			width: calc( (100% - '. ( (count(array_filter($featured_links)) - 1) * $featured_links_gutter ) .'px) / '. count( $featured_links ) .');
			width: -webkit-calc( (100% - '. ( (count(array_filter($featured_links)) - 1) * $featured_links_gutter ) .'px) / '. count( $featured_links ) .');
		}
	';


/*
** Blog Page =====
*/
	// Gutter
	$css .= '	
		.blog-grid > li {
			margin-bottom: ' . ashe_options( 'blog_page_gutter_vert' ) . 'px;
		}


		[data-layout*="col2"] .blog-grid > li,
		[data-layout*="col3"] .blog-grid > li,
		[data-layout*="col4"] .blog-grid > li {
			display: inline-block;
			vertical-align: top;
			margin-right: '. ashe_options( 'blog_page_gutter_horz' ) .'px;
		}

		[data-layout*="col2"] .blog-grid > li:nth-of-type(2n+2),
		[data-layout*="col3"] .blog-grid > li:nth-of-type(3n+3),
		[data-layout*="col4"] .blog-grid > li:nth-of-type(4n+4) {
			margin-right: 0;
		}
		
		[data-layout*="col1"] .blog-grid > li {
			width: 100%;
		}

		[data-layout*="col2"] .blog-grid > li {
			width: calc((100% - ' . ashe_options( 'blog_page_gutter_horz' ) . 'px ) /2);
			width: -webkit-calc((100% - ' . ashe_options( 'blog_page_gutter_horz' ) . 'px ) /2);
		}

		[data-layout*="col3"] .blog-grid > li {
			width: calc((100% - 2 * ' . ( ashe_options( 'blog_page_gutter_horz' ) ) . 'px ) /3);
			width: -webkit-calc((100% - 2 * ' . ( ashe_options( 'blog_page_gutter_horz' ) ) . 'px ) /3);
		}

		[data-layout*="col4"] .blog-grid > li {
			width: calc((100% - 3 * ' . ( ashe_options( 'blog_page_gutter_horz' ) ) . 'px ) /4);
			width: -webkit-calc((100% - 3 * ' . ( ashe_options( 'blog_page_gutter_horz' ) ) . 'px ) /4);
		}

		[data-layout*="rsidebar"] .sidebar-right {
			padding-left: ' . ashe_options( 'blog_page_gutter_horz' ) . 'px;
		}

		[data-layout*="lsidebar"] .sidebar-left {
			padding-right: ' . ashe_options( 'blog_page_gutter_horz' ) . 'px;
		}

		[data-layout*="lrsidebar"] .sidebar-right {
			padding-left: ' . ashe_options( 'blog_page_gutter_horz' ) . 'px;
		}

		[data-layout*="lrsidebar"] .sidebar-left {
			padding-right: ' . ashe_options( 'blog_page_gutter_horz' ) . 'px;
		}
	';

	// Blog Page Dropcups
	if ( ashe_options( 'blog_page_show_dropcups' ) === true && !is_single() && !is_page() ) {
		$css .= '
			
			.post-content > p:first-child:first-letter { /* MOD */
			  float: left;
			  margin: 0px 12px 0 0;
			  font-family: "Playfair Display";
			  font-size: 80px;
			  line-height: 65px;
			  text-align: center;
			}

			@-moz-document url-prefix() {
				.post-content > p:first-child:first-letter {
				    margin-top: 10px !important;
				}
			}
		';
	}

	// Single Page Dropcups
	if ( ashe_options( 'single_page_show_dropcups' ) === true && is_single() ) {
		$css .= '
			
			.post-content > p:first-child:first-letter { /* MOD */
			  float: left;
			  margin: 0px 12px 0 0;
			  font-family: "Playfair Display";
			  font-size: 80px;
			  line-height: 65px;
			  text-align: center;
			}

			@-moz-document url-prefix() {
				.post-content > p:first-child:first-letter {
				    margin-top: 10px !important;
				}
			}
		';
	}


	








/*
** Page Footer =====
*/

	// Widget Columns

	if ( ashe_options( 'page_footer_columns' ) === 'three' ) {
		$css .= '
		.footer-widgets > .ashe-widget {
			width: 30%;
			margin-right: 5%;
		}

		.footer-widgets > .ashe-widget:nth-child(3n+3) {
			margin-right: 0;
		}

		.footer-widgets > .ashe-widget:nth-child(3n+4) {
			clear: both;
		}
		';
	}

	if ( ashe_options( 'page_footer_columns' ) === 'four' ) {
		$css .= '
		.footer-widgets > .ashe-widget {
			width: 22%;
			margin-right: 4%;
		}

		.footer-widgets > .ashe-widget:nth-child(4n+4) {
			margin-right: 0;
		}

		.footer-widgets > .ashe-widget:nth-child(4n+5) {
			clear: both;
		}
		';
	}



	// Align

	if ( ashe_options( 'page_footer_align' ) === 'center' ) {
		$css .= '
			#page-footer {
				text-align: center;
			}
		'; 
	} elseif ( ashe_options( 'page_footer_align' ) === 'left-right' ) {
		$css .= '
			.copyright-info {
				float: left;
			}
			.footer-socials {
				float: right;
			}
		'; 
	} elseif ( ashe_options( 'page_footer_align' ) === 'right-left' ) {
		$css .= '
			.copyright-info {
				float: right;
			}
			.footer-socials {
				float: left;
			}
		'; 
	}







	// end style block
	$css .= '</style>';

	// return generated & compressed CSS
	echo str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css); 

} // end royal_dynamic_css()
add_action( 'wp_head', 'ashe_dynamic_css' );