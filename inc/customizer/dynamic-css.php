<?php

function ashe_dynamic_css() {

// begin style block
$css = '<style id="ashe_dynamic_css">';

/*
** Colors =====
*/

	// Body
	$css .= '
		body {
			background-color: '. ashe_options( 'colors_body_bg' ) .';
		}
	';

	// Top Bar
	$css .= '
		#top-bar,
		#top-bar .sub-menu a {
		  background-color: '. ashe_options( 'colors_top_bar_bg' ) .';
		}

		#top-bar a {
		  color: '. ashe_options( 'colors_top_bar_link' ) .';
		}

		#top-bar a:hover,
		#top-bar li.current-menu-item > a,
		#top-bar li.current-menu-ancestor > a,
		#top-bar .sub-menu li.current-menu-item > a,
		#top-bar .sub-menu li.current-menu-ancestor> a {
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
		#main-nav i:hover,
		#main-nav li.current-menu-item > a,
		#main-nav li.current-menu-ancestor > a,
		#main-nav .sub-menu li.current-menu-item > a,
		#main-nav .sub-menu li.current-menu-ancestor> a {
			color: '. ashe_options( 'colors_main_nav_link_hover' ) .';
		}

		.main-nav-sidebar:hover span {
			background-color: '. ashe_options( 'colors_main_nav_link_hover' ) .';
		}

		#main-menu .sub-menu,
		#main-menu .sub-menu a {
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
		.sidebar-alt,
		#featured-area,
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
		#page-content .post-author a,
		#page-content .ashe-widget a,
		#page-content .comment-author {
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
		.post-content > p:first-child:first-letter,
		#page-content .author-description h4 a,
		#page-content .related-posts h4 a,
		#page-content .blog-pagination .previous-page a,
      	#page-content .blog-pagination .next-page a,
      	blockquote,
		#page-content .post-share a {
			color: '. ashe_options( 'colors_content_title' ) .';
		}

		#page-content h1 a:hover {
			color: '. ashe_hex2rgba( ashe_options( 'colors_content_title' ) , 0.75 ).';
		}
	
		/* Meta */
		#page-content .post-date,
		#page-content .post-comments,
		#page-content .post-author,
		#page-content .related-post-date,
		#page-content .comment-meta a,
		#page-content .author-share a,
		#page-content .post-tags a,
		#page-content .tagcloud a,
		.widget_categories li,
		.widget_archive li,
		.ahse-subscribe-box p,
		.ahse-subscribe-box ::-webkit-input-placeholder,
		.rpwwt-post-author,
		.rpwwt-post-categories,
		.rpwwt-post-date,
		.rpwwt-post-comments-number {
			color: '. ashe_options( 'colors_content_meta' ) .';
		}
	
		/* Accent */
		#page-content a,
		.post-categories {
			color: '. ashe_options( 'colors_content_accent' ) .';
		}
		
		.ps-container > .ps-scrollbar-y-rail > .ps-scrollbar-y {
			background: '. ashe_options( 'colors_content_accent' ) .';
		}

		#page-content a:hover {
			color: '. ashe_hex2rgba( ashe_options( 'colors_content_accent' ), 0.8 ) .';
		}

		blockquote {
			border-color: '. ashe_options( 'colors_content_accent' ) .';
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
		#page-content .tagcloud a,
		#page-content select,
		#page-content input,
		#page-content textarea,
		.widget-title h2:before,
		.widget-title h2:after,
		.post-tags a,
		.gallery-caption,
		.wp-caption-text,
		table tr,
		table th,
		table td,
		pre {
			border-color: '. ashe_options( 'colors_content_border' ) .';
		}

		hr {
			background-color: '. ashe_options( 'colors_content_border' ) .';
		}

		/* Buttons */
		.widget_search i,
		.widget_search #searchsubmit,
		.single-navigation i,
		#page-content .submit,
		#page-content .blog-pagination .page-numbers,
		#page-content .blog-pagination.load-more a,
		#page-content .ahse-subscribe-box input[type="submit"],
		#page-content .widget_wysija input[type="submit"],
		#page-content .post-password-form input[type="submit"] {
			color: '. ashe_options( 'colors_button_text' ) .';
			background-color: '. ashe_options( 'colors_button' ) .';
		}
		.single-navigation i:hover,
		#page-content .submit:hover,
		#page-content .blog-pagination a.page-numbers:hover,
		#page-content .blog-pagination .current,
		#page-content .blog-pagination.load-more a:hover,
		#page-content .ahse-subscribe-box input[type="submit"]:hover,
		#page-content .widget_wysija input[type="submit"]:hover,
		#page-content .post-password-form input[type="submit"]:hover  {
			color: '. ashe_options( 'colors_button_hover_text' ) .';
			background-color: '. ashe_options( 'colors_button_hover' ) .';
		}

		/* Image Overlay */
		.image-overlay,
		#infscr-loading,
		#page-content h4.image-overlay {
			color: '. ashe_options( 'colors_overlay_text' ) .';
			background-color: '. ashe_hex2rgba( ashe_options( 'colors_overlay' ), 0.3 ) .';
		}

		.image-overlay a,
		.post-slider .prev-arrow,
		.post-slider .next-arrow,
		#page-content .image-overlay a,
		#featured-slider .slick-arrow,
		#featured-slider .slider-dots {
			color: '. ashe_options( 'colors_overlay_text' ) .';
		}

		.slide-caption {
			background: '. ashe_hex2rgba( ashe_options( 'colors_overlay_text' ), 0.95 ) .';
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
			background-color: '. ashe_options( 'colors_footer_bg' ) .';
			color: '. ashe_options( 'colors_footer_text' ) .';
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
		#page-footer .widget-title h2:before,
		#page-footer .widget-title h2:after,
		.footer-widgets {
			border-color: '. ashe_options( 'colors_footer_border' ) .';
		}

		#page-footer hr {
			background-color: '. ashe_options( 'colors_footer_border' ) .';
		}
	';

	// Preloader
	$css .= '
		.ashe-preloader-wrap {
			background-color: '. ashe_options( 'colors_preloader_bg' ) .';
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

		[data-layout*="rsidebar"] .main-container,
		[data-layout*="lsidebar"] .main-container {
			width: calc(100% - '. ( ashe_options( 'general_sidebar_width' ) + ashe_options( 'blog_page_gutter_horz' ) ) .'px);
			width: -webkit-calc(100% - '. ( ashe_options( 'general_sidebar_width' ) + ashe_options( 'blog_page_gutter_horz' ) ) .'px);
		}

		[data-layout*="lrsidebar"] .main-container {
			width: calc(100% - '. ( ( ashe_options( 'general_sidebar_width' ) + ashe_options( 'blog_page_gutter_horz' ) ) * 2 ) .'px);
			width: -webkit-calc(100% - '. ( ( ashe_options( 'general_sidebar_width' ) + ashe_options( 'blog_page_gutter_horz' ) ) * 2 ) .'px);
		}

		[data-layout*="fullwidth"] .main-container {
			width: 100%;
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

		// Padding
	$css .= '
	.boxed-wrapper {
		padding-left: '. ashe_options( 'general_content_padding' ) .'px;
		padding-right: '. ashe_options( 'general_content_padding' ) .'px;
	}

	.boxed-wrapper > .boxed-wrapper {
		padding: 0;
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
			background-image:url('. esc_url( ashe_options( 'page_header_bg_image' ) ) .');
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
			max-width: '. ashe_options( 'page_header_logo_width' ) .'px;
			padding-top: '. ashe_options( 'page_header_logo_distance' ) .'px;
		}
	';


/*
** Main Navigation =====
*/
	
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
			  left: '. ashe_options( 'general_content_padding' ) .'px;
			  z-index: 1;
			}
						
			.main-nav-icons {
			  position: absolute;
			  top: 0px;
			  right: '. ashe_options( 'general_content_padding' ) .'px;
			  z-index: 2;
			}

			@media screen and ( max-width: 640px ) {
				.main-nav-sidebar {
				  left: 20px;
				}
				.main-nav-icons {
				  right: 20px;
				}
			}
		';
	} else {
		$css .= '
			.main-nav-sidebar {
			  float: left;
			  margin-right: 15px;
			}
						
			.main-nav-icons {
			 float: right;
			 margin-left: 15px;
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
		$featured_links_gutter = 20;
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
			.footer-copyright {
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



/*
** Preloader =====
*/

	if ( ashe_options('preloader_type') === 'animation_1' ) {
		$css .= '.cssload-container{width:100%;height:36px;text-align:center}.cssload-speeding-wheel{width:36px;height:36px;margin:0 auto;border:2px solid '.ashe_options('colors_preloader_anim').';border-radius:50%;border-left-color:transparent;border-right-color:transparent;animation:cssload-spin 575ms infinite linear;-o-animation:cssload-spin 575ms infinite linear;-ms-animation:cssload-spin 575ms infinite linear;-webkit-animation:cssload-spin 575ms infinite linear;-moz-animation:cssload-spin 575ms infinite linear}@keyframes cssload-spin{100%{transform:rotate(360deg);transform:rotate(360deg)}}@-o-keyframes cssload-spin{100%{-o-transform:rotate(360deg);transform:rotate(360deg)}}@-ms-keyframes cssload-spin{100%{-ms-transform:rotate(360deg);transform:rotate(360deg)}}@-webkit-keyframes cssload-spin{100%{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}@-moz-keyframes cssload-spin{100%{-moz-transform:rotate(360deg);transform:rotate(360deg)}}';
	} elseif ( ashe_options('preloader_type') === 'animation_2' ) {
		$css .= '';
	} elseif ( ashe_options('preloader_type') === 'animation_3' ) {
		$css .= '.cssload-container{width:100%;height:44px;text-align:center}.cssload-tube-tunnel{width:44px;height:44px;margin:0 auto;border:3px solid;border-radius:50%;border-color:'.ashe_options('colors_preloader_anim').';animation:cssload-scale 1035ms infinite linear;-o-animation:cssload-scale 1035ms infinite linear;-ms-animation:cssload-scale 1035ms infinite linear;-webkit-animation:cssload-scale 1035ms infinite linear;-moz-animation:cssload-scale 1035ms infinite linear}@keyframes cssload-scale{0%{transform:scale(0);transform:scale(0)}90%{transform:scale(0.7);transform:scale(0.7)}100%{transform:scale(1);transform:scale(1)}}@-o-keyframes cssload-scale{0%{-o-transform:scale(0);transform:scale(0)}90%{-o-transform:scale(0.7);transform:scale(0.7)}100%{-o-transform:scale(1);transform:scale(1)}}@-ms-keyframes cssload-scale{0%{-ms-transform:scale(0);transform:scale(0)}90%{-ms-transform:scale(0.7);transform:scale(0.7)}100%{-ms-transform:scale(1);transform:scale(1)}}@-webkit-keyframes cssload-scale{0%{-webkit-transform:scale(0);transform:scale(0)}90%{-webkit-transform:scale(0.7);transform:scale(0.7)}100%{-webkit-transform:scale(1);transform:scale(1)}}@-moz-keyframes cssload-scale{0%{-moz-transform:scale(0);transform:scale(0)}90%{-moz-transform:scale(0.7);transform:scale(0.7)}100%{-moz-transform:scale(1);transform:scale(1)}}';
	} elseif ( ashe_options('preloader_type') === 'animation_4' ) {
		$css .= '.cssload-loader{display:block;margin:0 auto;width:29px;height:29px;position:relative;border:4px solid '.ashe_options('colors_preloader_anim').';animation:cssload-loader 2.3s infinite ease;-o-animation:cssload-loader 2.3s infinite ease;-ms-animation:cssload-loader 2.3s infinite ease;-webkit-animation:cssload-loader 2.3s infinite ease;-moz-animation:cssload-loader 2.3s infinite ease}.cssload-loader-inner{vertical-align:top;display:inline-block;width:100%;background-color:'.ashe_options('colors_preloader_anim').';animation:cssload-loader-inner 2.3s infinite ease-in;-o-animation:cssload-loader-inner 2.3s infinite ease-in;-ms-animation:cssload-loader-inner 2.3s infinite ease-in;-webkit-animation:cssload-loader-inner 2.3s infinite ease-in;-moz-animation:cssload-loader-inner 2.3s infinite ease-in}@keyframes cssload-loader{0%{transform:rotate(0deg)}25%{transform:rotate(180deg)}50%{transform:rotate(180deg)}75%{transform:rotate(360deg)}100%{transform:rotate(360deg)}}@-o-keyframes cssload-loader{0%{transform:rotate(0deg)}25%{transform:rotate(180deg)}50%{transform:rotate(180deg)}75%{transform:rotate(360deg)}100%{transform:rotate(360deg)}}@-ms-keyframes cssload-loader{0%{transform:rotate(0deg)}25%{transform:rotate(180deg)}50%{transform:rotate(180deg)}75%{transform:rotate(360deg)}100%{transform:rotate(360deg)}}@-webkit-keyframes cssload-loader{0%{transform:rotate(0deg)}25%{transform:rotate(180deg)}50%{transform:rotate(180deg)}75%{transform:rotate(360deg)}100%{transform:rotate(360deg)}}@-moz-keyframes cssload-loader{0%{transform:rotate(0deg)}25%{transform:rotate(180deg)}50%{transform:rotate(180deg)}75%{transform:rotate(360deg)}100%{transform:rotate(360deg)}}@keyframes cssload-loader-inner{0%{height:0}25%{height:0}50%{height:100%}75%{height:100%}100%{height:0}}@-o-keyframes cssload-loader-inner{0%{height:0}25%{height:0}50%{height:100%}75%{height:100%}100%{height:0}}@-ms-keyframes cssload-loader-inner{0%{height:0}25%{height:0}50%{height:100%}75%{height:100%}100%{height:0}}@-webkit-keyframes cssload-loader-inner{0%{height:0}25%{height:0}50%{height:100%}75%{height:100%}100%{height:0}}@-moz-keyframes cssload-loader-inner{0%{height:0}25%{height:0}50%{height:100%}75%{height:100%}100%{height:0}}';
	} elseif ( ashe_options('preloader_type') === 'animation_5' ) {
		$css .= '.cssload-fond{position:relative;margin:auto}.cssload-container-general{animation:cssload-animball_two 1.15s infinite;-o-animation:cssload-animball_two 1.15s infinite;-ms-animation:cssload-animball_two 1.15s infinite;-webkit-animation:cssload-animball_two 1.15s infinite;-moz-animation:cssload-animball_two 1.15s infinite;width:43px;height:43px}.cssload-internal{width:43px;height:43px;position:absolute}.cssload-ballcolor{width:19px;height:19px;border-radius:50%}.cssload-ball_1,.cssload-ball_2,.cssload-ball_3,.cssload-ball_4{position:absolute;animation:cssload-animball_one 1.15s infinite ease;-o-animation:cssload-animball_one 1.15s infinite ease;-ms-animation:cssload-animball_one 1.15s infinite ease;-webkit-animation:cssload-animball_one 1.15s infinite ease;-moz-animation:cssload-animball_one 1.15s infinite ease}.cssload-ball_1{background-color:'.ashe_options('colors_preloader_anim').';top:0;left:0}.cssload-ball_2{background-color:'.ashe_options('colors_preloader_anim').';top:0;left:23px}.cssload-ball_3{background-color:'.ashe_options('colors_preloader_anim').';top:23px;left:0}.cssload-ball_4{background-color:'.ashe_options('colors_preloader_anim').';top:23px;left:23px}@keyframes cssload-animball_one{0%{position:absolute}50%{top:12px;left:12px;position:absolute;opacity:.5}100%{position:absolute}}@-o-keyframes cssload-animball_one{0%{position:absolute}50%{top:12px;left:12px;position:absolute;opacity:.5}100%{position:absolute}}@-ms-keyframes cssload-animball_one{0%{position:absolute}50%{top:12px;left:12px;position:absolute;opacity:.5}100%{position:absolute}}@-webkit-keyframes cssload-animball_one{0%{position:absolute}50%{top:12px;left:12px;position:absolute;opacity:.5}100%{position:absolute}}@-moz-keyframes cssload-animball_one{0%{position:absolute}50%{top:12px;left:12px;position:absolute;opacity:.5}100%{position:absolute}}@keyframes cssload-animball_two{0%{transform:rotate(0deg) scale(1)}50%{transform:rotate(360deg) scale(1.3)}100%{transform:rotate(720deg) scale(1)}}@-o-keyframes cssload-animball_two{0%{-o-transform:rotate(0deg) scale(1)}50%{-o-transform:rotate(360deg) scale(1.3)}100%{-o-transform:rotate(720deg) scale(1)}}@-ms-keyframes cssload-animball_two{0%{-ms-transform:rotate(0deg) scale(1)}50%{-ms-transform:rotate(360deg) scale(1.3)}100%{-ms-transform:rotate(720deg) scale(1)}}@-webkit-keyframes cssload-animball_two{0%{-webkit-transform:rotate(0deg) scale(1)}50%{-webkit-transform:rotate(360deg) scale(1.3)}100%{-webkit-transform:rotate(720deg) scale(1)}}@-moz-keyframes cssload-animball_two{0%{-moz-transform:rotate(0deg) scale(1)}50%{-moz-transform:rotate(360deg) scale(1.3)}100%{-moz-transform:rotate(720deg) scale(1)}}';
	} elseif ( ashe_options('preloader_type') === 'animation_6' ) {
		$css .= '#loadFacebookG{width:35px;height:35px;display:block;position:relative;margin:auto}.facebook_blockG{background-color:'.ashe_options('colors_preloader_anim').';border:1px solid '.ashe_options('colors_preloader_anim').';float:left;height:25px;margin-left:2px;width:7px;opacity:.1;animation-name:bounceG;-o-animation-name:bounceG;-ms-animation-name:bounceG;-webkit-animation-name:bounceG;-moz-animation-name:bounceG;animation-duration:1.235s;-o-animation-duration:1.235s;-ms-animation-duration:1.235s;-webkit-animation-duration:1.235s;-moz-animation-duration:1.235s;animation-iteration-count:infinite;-o-animation-iteration-count:infinite;-ms-animation-iteration-count:infinite;-webkit-animation-iteration-count:infinite;-moz-animation-iteration-count:infinite;animation-direction:normal;-o-animation-direction:normal;-ms-animation-direction:normal;-webkit-animation-direction:normal;-moz-animation-direction:normal;transform:scale(0.7);-o-transform:scale(0.7);-ms-transform:scale(0.7);-webkit-transform:scale(0.7);-moz-transform:scale(0.7)}#blockG_1{animation-delay:.3695s;-o-animation-delay:.3695s;-ms-animation-delay:.3695s;-webkit-animation-delay:.3695s;-moz-animation-delay:.3695s}#blockG_2{animation-delay:.496s;-o-animation-delay:.496s;-ms-animation-delay:.496s;-webkit-animation-delay:.496s;-moz-animation-delay:.496s}#blockG_3{animation-delay:.6125s;-o-animation-delay:.6125s;-ms-animation-delay:.6125s;-webkit-animation-delay:.6125s;-moz-animation-delay:.6125s}@keyframes bounceG{0%{transform:scale(1.2);opacity:1}100%{transform:scale(0.7);opacity:.1}}@-o-keyframes bounceG{0%{-o-transform:scale(1.2);opacity:1}100%{-o-transform:scale(0.7);opacity:.1}}@-ms-keyframes bounceG{0%{-ms-transform:scale(1.2);opacity:1}100%{-ms-transform:scale(0.7);opacity:.1}}@-webkit-keyframes bounceG{0%{-webkit-transform:scale(1.2);opacity:1}100%{-webkit-transform:scale(0.7);opacity:.1}}@-moz-keyframes bounceG{0%{-moz-transform:scale(1.2);opacity:1}100%{-moz-transform:scale(0.7);opacity:.1}}';
	} elseif ( ashe_options('preloader_type') === 'animation_7' ) {
		$css .= '.loader{height:42px;left:50%;position:absolute;transform:translateX(-50%) translateY(-50%);-o-transform:translateX(-50%) translateY(-50%);-ms-transform:translateX(-50%) translateY(-50%);-webkit-transform:translateX(-50%) translateY(-50%);-moz-transform:translateX(-50%) translateY(-50%);width:42px}.loader span{background:'.ashe_options('colors_preloader_anim').';display:block;height:8px;opacity:0;position:absolute;width:8px;animation:load 3s ease-in-out infinite;-o-animation:load 3s ease-in-out infinite;-ms-animation:load 3s ease-in-out infinite;-webkit-animation:load 3s ease-in-out infinite;-moz-animation:load 3s ease-in-out infinite}.loader span.block-1{animation-delay:.686s;-o-animation-delay:.686s;-ms-animation-delay:.686s;-webkit-animation-delay:.686s;-moz-animation-delay:.686s;left:0;top:0}.loader span.block-2{animation-delay:.632s;-o-animation-delay:.632s;-ms-animation-delay:.632s;-webkit-animation-delay:.632s;-moz-animation-delay:.632s;left:11px;top:0}.loader span.block-3{animation-delay:.568s;-o-animation-delay:.568s;-ms-animation-delay:.568s;-webkit-animation-delay:.568s;-moz-animation-delay:.568s;left:22px;top:0}.loader span.block-4{animation-delay:.514s;-o-animation-delay:.514s;-ms-animation-delay:.514s;-webkit-animation-delay:.514s;-moz-animation-delay:.514s;left:34px;top:0}.loader span.block-5{animation-delay:.45s;-o-animation-delay:.45s;-ms-animation-delay:.45s;-webkit-animation-delay:.45s;-moz-animation-delay:.45s;left:0;top:11px}.loader span.block-6{animation-delay:.386s;-o-animation-delay:.386s;-ms-animation-delay:.386s;-webkit-animation-delay:.386s;-moz-animation-delay:.386s;left:11px;top:11px}.loader span.block-7{animation-delay:.332s;-o-animation-delay:.332s;-ms-animation-delay:.332s;-webkit-animation-delay:.332s;-moz-animation-delay:.332s;left:22px;top:11px}.loader span.block-8{animation-delay:.268s;-o-animation-delay:.268s;-ms-animation-delay:.268s;-webkit-animation-delay:.268s;-moz-animation-delay:.268s;left:34px;top:11px}.loader span.block-9{animation-delay:.214s;-o-animation-delay:.214s;-ms-animation-delay:.214s;-webkit-animation-delay:.214s;-moz-animation-delay:.214s;left:0;top:22px}.loader span.block-10{animation-delay:.15s;-o-animation-delay:.15s;-ms-animation-delay:.15s;-webkit-animation-delay:.15s;-moz-animation-delay:.15s;left:11px;top:22px}.loader span.block-11{animation-delay:.086s;-o-animation-delay:.086s;-ms-animation-delay:.086s;-webkit-animation-delay:.086s;-moz-animation-delay:.086s;left:22px;top:22px}.loader span.block-12{animation-delay:.032s;-o-animation-delay:.032s;-ms-animation-delay:.032s;-webkit-animation-delay:.032s;-moz-animation-delay:.032s;left:34px;top:22px}.loader span.block-13{animation-delay:-.032s;-o-animation-delay:-.032s;-ms-animation-delay:-.032s;-webkit-animation-delay:-.032s;-moz-animation-delay:-.032s;left:0;top:34px}.loader span.block-14{animation-delay:-.086s;-o-animation-delay:-.086s;-ms-animation-delay:-.086s;-webkit-animation-delay:-.086s;-moz-animation-delay:-.086s;left:11px;top:34px}.loader span.block-15{animation-delay:-.15s;-o-animation-delay:-.15s;-ms-animation-delay:-.15s;-webkit-animation-delay:-.15s;-moz-animation-delay:-.15s;left:22px;top:34px}.loader span.block-16{animation-delay:-.214s;-o-animation-delay:-.214s;-ms-animation-delay:-.214s;-webkit-animation-delay:-.214s;-moz-animation-delay:-.214s;left:34px;top:34px}@keyframes load{0%{opacity:0;transform:translateY(-70px)}15%{opacity:0;transform:translateY(-70px)}30%{opacity:1;transform:translateY(0)}70%{opacity:1;transform:translateY(0)}85%{opacity:0;transform:translateY(70px)}100%{opacity:0;transform:translateY(70px)}}@-o-keyframes load{0%{opacity:0;-o-transform:translateY(-70px)}15%{opacity:0;-o-transform:translateY(-70px)}30%{opacity:1;-o-transform:translateY(0)}70%{opacity:1;-o-transform:translateY(0)}85%{opacity:0;-o-transform:translateY(70px)}100%{opacity:0;-o-transform:translateY(70px)}}@-ms-keyframes load{0%{opacity:0;-ms-transform:translateY(-70px)}15%{opacity:0;-ms-transform:translateY(-70px)}30%{opacity:1;-ms-transform:translateY(0)}70%{opacity:1;-ms-transform:translateY(0)}85%{opacity:0;-ms-transform:translateY(70px)}100%{opacity:0;-ms-transform:translateY(70px)}}@-webkit-keyframes load{0%{opacity:0;-webkit-transform:translateY(-70px)}15%{opacity:0;-webkit-transform:translateY(-70px)}30%{opacity:1;-webkit-transform:translateY(0)}70%{opacity:1;-webkit-transform:translateY(0)}85%{opacity:0;-webkit-transform:translateY(70px)}100%{opacity:0;-webkit-transform:translateY(70px)}}@-moz-keyframes load{0%{opacity:0;-moz-transform:translateY(-70px)}15%{opacity:0;-moz-transform:translateY(-70px)}30%{opacity:1;-moz-transform:translateY(0)}70%{opacity:1;-moz-transform:translateY(0)}85%{opacity:0;-moz-transform:translateY(70px)}100%{opacity:0;-moz-transform:translateY(70px)}}';
	} elseif ( ashe_options('preloader_type') === 'animation_8' ) {
		$css .= '.cssload-cube{background-color:'.ashe_options('colors_preloader_anim').';width:9px;height:9px;position:absolute;margin:auto;animation:cssload-cubemove 2s infinite ease-in-out;-o-animation:cssload-cubemove 2s infinite ease-in-out;-ms-animation:cssload-cubemove 2s infinite ease-in-out;-webkit-animation:cssload-cubemove 2s infinite ease-in-out;-moz-animation:cssload-cubemove 2s infinite ease-in-out}.cssload-cube1{left:13px;top:0;animation-delay:.1s;-o-animation-delay:.1s;-ms-animation-delay:.1s;-webkit-animation-delay:.1s;-moz-animation-delay:.1s}.cssload-cube2{left:25px;top:0;animation-delay:.2s;-o-animation-delay:.2s;-ms-animation-delay:.2s;-webkit-animation-delay:.2s;-moz-animation-delay:.2s}.cssload-cube3{left:38px;top:0;animation-delay:.3s;-o-animation-delay:.3s;-ms-animation-delay:.3s;-webkit-animation-delay:.3s;-moz-animation-delay:.3s}.cssload-cube4{left:0;top:13px;animation-delay:.1s;-o-animation-delay:.1s;-ms-animation-delay:.1s;-webkit-animation-delay:.1s;-moz-animation-delay:.1s}.cssload-cube5{left:13px;top:13px;animation-delay:.2s;-o-animation-delay:.2s;-ms-animation-delay:.2s;-webkit-animation-delay:.2s;-moz-animation-delay:.2s}.cssload-cube6{left:25px;top:13px;animation-delay:.3s;-o-animation-delay:.3s;-ms-animation-delay:.3s;-webkit-animation-delay:.3s;-moz-animation-delay:.3s}.cssload-cube7{left:38px;top:13px;animation-delay:.4s;-o-animation-delay:.4s;-ms-animation-delay:.4s;-webkit-animation-delay:.4s;-moz-animation-delay:.4s}.cssload-cube8{left:0;top:25px;animation-delay:.2s;-o-animation-delay:.2s;-ms-animation-delay:.2s;-webkit-animation-delay:.2s;-moz-animation-delay:.2s}.cssload-cube9{left:13px;top:25px;animation-delay:.3s;-o-animation-delay:.3s;-ms-animation-delay:.3s;-webkit-animation-delay:.3s;-moz-animation-delay:.3s}.cssload-cube10{left:25px;top:25px;animation-delay:.4s;-o-animation-delay:.4s;-ms-animation-delay:.4s;-webkit-animation-delay:.4s;-moz-animation-delay:.4s}.cssload-cube11{left:38px;top:25px;animation-delay:.5s;-o-animation-delay:.5s;-ms-animation-delay:.5s;-webkit-animation-delay:.5s;-moz-animation-delay:.5s}.cssload-cube12{left:0;top:38px;animation-delay:.3s;-o-animation-delay:.3s;-ms-animation-delay:.3s;-webkit-animation-delay:.3s;-moz-animation-delay:.3s}.cssload-cube13{left:13px;top:38px;animation-delay:.4s;-o-animation-delay:.4s;-ms-animation-delay:.4s;-webkit-animation-delay:.4s;-moz-animation-delay:.4s}.cssload-cube14{left:25px;top:38px;animation-delay:.5s;-o-animation-delay:.5s;-ms-animation-delay:.5s;-webkit-animation-delay:.5s;-moz-animation-delay:.5s}.cssload-cube15{left:38px;top:38px;animation-delay:.6s;-o-animation-delay:.6s;-ms-animation-delay:.6s;-webkit-animation-delay:.6s;-moz-animation-delay:.6s}.cssload-spinner{margin:auto;width:49px;height:49px;position:relative}@keyframes cssload-cubemove{35%{transform:scale(0.005)}50%{transform:scale(1.7)}65%{transform:scale(0.005)}}@-o-keyframes cssload-cubemove{35%{-o-transform:scale(0.005)}50%{-o-transform:scale(1.7)}65%{-o-transform:scale(0.005)}}@-ms-keyframes cssload-cubemove{35%{-ms-transform:scale(0.005)}50%{-ms-transform:scale(1.7)}65%{-ms-transform:scale(0.005)}}@-webkit-keyframes cssload-cubemove{35%{-webkit-transform:scale(0.005)}50%{-webkit-transform:scale(1.7)}65%{-webkit-transform:scale(0.005)}}@-moz-keyframes cssload-cubemove{35%{-moz-transform:scale(0.005)}50%{-moz-transform:scale(1.7)}65%{-moz-transform:scale(0.005)}}';
	} elseif ( ashe_options('preloader_type') === 'animation_9' ) {
		$css .= '.cssload-loader{width:24px;height:24px;position:absolute;left:50%;transform:translate3d(-50%,-50%,0);-o-transform:translate3d(-50%,-50%,0);-ms-transform:translate3d(-50%,-50%,0);-webkit-transform:translate3d(-50%,-50%,0);-moz-transform:translate3d(-50%,-50%,0);perspective:1200px;-o-perspective:1200;-ms-perspective:1200;-webkit-perspective:1200;-moz-perspective:1200}.cssload-flipper{position:relative;display:block;height:inherit;width:inherit;animation:cssload-flip 1.38s infinite ease-in-out;-o-animation:cssload-flip 1.38s infinite ease-in-out;-ms-animation:cssload-flip 1.38s infinite ease-in-out;-webkit-animation:cssload-flip 1.38s infinite ease-in-out;-moz-animation:cssload-flip 1.38s infinite ease-in-out;transform-style:preserve-3d;-o-transform-style:preserve-3d;-ms-transform-style:preserve-3d;-webkit-transform-style:preserve-3d;-moz-transform-style:preserve-3d}.cssload-front,.cssload-back{position:absolute;top:0;left:0;display:block;background-color:'.ashe_options('colors_preloader_anim').';height:100%;width:100%;backface-visibility:hidden}.cssload-back{background-color:'.ashe_options('colors_preloader_anim').';z-index:800;transform:rotateY(-180deg);-o-transform:rotateY(-180deg);-ms-transform:rotateY(-180deg);-webkit-transform:rotateY(-180deg);-moz-transform:rotateY(-180deg)}@keyframes cssload-flip{0%{transform:perspective(117px) rotateX(0deg) rotateY(0deg)}50%{transform:perspective(117px) rotateX(-180.1deg) rotateY(0deg)}100%{transform:perspective(117px) rotateX(-180deg) rotateY(-179.9deg)}}@-o-keyframes cssload-flip{0%{-o-transform:perspective(117px) rotateX(0deg) rotateY(0deg)}50%{-o-transform:perspective(117px) rotateX(-180.1deg) rotateY(0deg)}100%{-o-transform:perspective(117px) rotateX(-180deg) rotateY(-179.9deg)}}@-ms-keyframes cssload-flip{0%{-ms-transform:perspective(117px) rotateX(0deg) rotateY(0deg)}50%{-ms-transform:perspective(117px) rotateX(-180.1deg) rotateY(0deg)}100%{-ms-transform:perspective(117px) rotateX(-180deg) rotateY(-179.9deg)}}@-webkit-keyframes cssload-flip{0%{-webkit-transform:perspective(117px) rotateX(0deg) rotateY(0deg)}50%{-webkit-transform:perspective(117px) rotateX(-180.1deg) rotateY(0deg)}100%{-webkit-transform:perspective(117px) rotateX(-180deg) rotateY(-179.9deg)}}@-moz-keyframes cssload-flip{0%{-moz-transform:perspective(117px) rotateX(0deg) rotateY(0deg)}50%{-moz-transform:perspective(117px) rotateX(-180.1deg) rotateY(0deg)}100%{-moz-transform:perspective(117px) rotateX(-180deg) rotateY(-179.9deg)}}';
	} elseif ( ashe_options('preloader_type') === 'animation_10' ) {
		$css .= '.cssload-box-loading{width:37px;height:37px;margin:auto;position:absolute;left:0;right:0;top:0;bottom:0}.cssload-box-loading:before{content:"";width:37px;height:4px;background:'.ashe_options('colors_preloader_anim').';opacity:.1;position:absolute;top:44px;left:0;border-radius:50%;animation:shadow .58s linear infinite;-o-animation:shadow .58s linear infinite;-ms-animation:shadow .58s linear infinite;-webkit-animation:shadow .58s linear infinite;-moz-animation:shadow .58s linear infinite}.cssload-box-loading:after{content:"";width:37px;height:37px;background:'.ashe_options('colors_preloader_anim').';position:absolute;top:0;left:0;border-radius:2px;animation:cssload-animate .58s linear infinite;-o-animation:cssload-animate .58s linear infinite;-ms-animation:cssload-animate .58s linear infinite;-webkit-animation:cssload-animate .58s linear infinite;-moz-animation:cssload-animate .58s linear infinite}@keyframes cssload-animate{17%{border-bottom-right-radius:2px}25%{transform:translateY(7px) rotate(22.5deg)}50%{transform:translateY(13px) scale(1,0.9) rotate(45deg);border-bottom-right-radius:30px}75%{transform:translateY(7px) rotate(67.5deg)}100%{transform:translateY(0) rotate(90deg)}}@-o-keyframes cssload-animate{17%{border-bottom-right-radius:2px}25%{-o-transform:translateY(7px) rotate(22.5deg)}50%{-o-transform:translateY(13px) scale(1,0.9) rotate(45deg);border-bottom-right-radius:30px}75%{-o-transform:translateY(7px) rotate(67.5deg)}100%{-o-transform:translateY(0) rotate(90deg)}}@-ms-keyframes cssload-animate{17%{border-bottom-right-radius:2px}25%{-ms-transform:translateY(7px) rotate(22.5deg)}50%{-ms-transform:translateY(13px) scale(1,0.9) rotate(45deg);border-bottom-right-radius:30px}75%{-ms-transform:translateY(7px) rotate(67.5deg)}100%{-ms-transform:translateY(0) rotate(90deg)}}@-webkit-keyframes cssload-animate{17%{border-bottom-right-radius:2px}25%{-webkit-transform:translateY(7px) rotate(22.5deg)}50%{-webkit-transform:translateY(13px) scale(1,0.9) rotate(45deg);border-bottom-right-radius:30px}75%{-webkit-transform:translateY(7px) rotate(67.5deg)}100%{-webkit-transform:translateY(0) rotate(90deg)}}@-moz-keyframes cssload-animate{17%{border-bottom-right-radius:2px}25%{-moz-transform:translateY(7px) rotate(22.5deg)}50%{-moz-transform:translateY(13px) scale(1,0.9) rotate(45deg);border-bottom-right-radius:30px}75%{-moz-transform:translateY(7px) rotate(67.5deg)}100%{-moz-transform:translateY(0) rotate(90deg)}}@keyframes shadow{0%,100%{transform:scale(1,1)}50%{transform:scale(1.2,1)}}@-o-keyframes shadow{0%,100%{-o-transform:scale(1,1)}50%{-o-transform:scale(1.2,1)}}@-ms-keyframes shadow{0%,100%{-ms-transform:scale(1,1)}50%{-ms-transform:scale(1.2,1)}}@-webkit-keyframes shadow{0%,100%{-webkit-transform:scale(1,1)}50%{-webkit-transform:scale(1.2,1)}}@-moz-keyframes shadow{0%,100%{-moz-transform:scale(1,1)}50%{-moz-transform:scale(1.2,1)}}';
	}



// end style block
$css .= '</style>';

// return generated & compressed CSS
echo str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css); 


} // end royal_dynamic_css()
add_action( 'wp_head', 'ashe_dynamic_css' );