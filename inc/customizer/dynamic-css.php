<?php

function bard_dynamic_css() {


/*
** Reusable Functions =====
*/

// true/false validaiton
function bard_true_false( $option ) {
	if ( $option === true ) {
		return true;
	} else {
		return false;
	}
}

// CSS
$css = '';

/*
** Colors =====
*/

	// Body
	if ( ! get_theme_mod('background_color') ) {
		$css .= '
			body {
				background-color: #ffffff;
			}
		';
	}

	// Top Bar
	$css .= '

		#top-bar a {
		  color: #000000;
		}

		#top-bar a:hover,
		#top-bar li.current-menu-item > a,
		#top-bar li.current-menu-ancestor > a,
		#top-bar .sub-menu li.current-menu-item > a,
		#top-bar .sub-menu li.current-menu-ancestor> a {
		  color: '. esc_html(bard_options( 'colors_content_accent' )) .';
		}
		
		#top-menu .sub-menu,
		#top-menu .sub-menu a {
		  	background-color: #ffffff;
			border-color: '. esc_html(bard_hex2rgba( '#000000', 0.05 )) .';
		}
	';

	// Page Header
	$header_text_color = get_header_textcolor();

	if ( $header_text_color === 'blank' ) {
		$css .= '
			.header-logo a,
			.site-description,
			.header-socials-icon {
				color: #111111;
			}
		';	
	} else {
		$css .= '
			.header-logo a,
			.site-description,
			.header-socials-icon {
				color: #'. esc_attr ( $header_text_color ) .';
			}
		';			
	}

	$css .= '
		.entry-header {
			background-color: '. bard_options( 'colors_header_bg' ) .';
		}
	';
	
	// Main Navigation
	$css .= '
		#main-nav {
			background-color: #ffffff;
			box-shadow: 0px 1px 5px '. esc_html(bard_hex2rgba( '#000000', 0.1 )) .';
		}

		#main-nav a,
		#main-nav .svg-inline--fa,
		#main-nav #s {
			color: #000000;
		}

		.main-nav-sidebar div span,
		.sidebar-alt-close-btn span {
			background-color: #000000;
		}

		#main-nav a:hover,
		#main-nav .svg-inline--fa:hover,
		#main-nav li.current-menu-item > a,
		#main-nav li.current-menu-ancestor > a,
		#main-nav .sub-menu li.current-menu-item > a,
		#main-nav .sub-menu li.current-menu-ancestor> a {
			color: '. esc_html(bard_options( 'colors_content_accent' )) .';
		}

		.main-nav-sidebar:hover div span {
			background-color: '. esc_html(bard_options( 'colors_content_accent' )) .';
		}

		#main-menu .sub-menu,
		#main-menu .sub-menu a {
			background-color: #ffffff;
			border-color: '. esc_html(bard_hex2rgba( '#000000', 0.05 )) .';
		}

		#main-nav #s {
			background-color: #ffffff;
		}

		#main-nav #s::-webkit-input-placeholder { /* Chrome/Opera/Safari */
			color: '. esc_html(bard_hex2rgba( '#000000', 0.7 )) .';
		}
		#main-nav #s::-moz-placeholder { /* Firefox 19+ */
			color: '. esc_html(bard_hex2rgba( '#000000', 0.7 )) .';
		}
		#main-nav #s:-ms-input-placeholder { /* IE 10+ */
			color: '. esc_html(bard_hex2rgba( '#000000', 0.7 )) .';
		}
		#main-nav #s:-moz-placeholder { /* Firefox 18- */
			color: '. esc_html(bard_hex2rgba( '#000000', 0.7 )) .';
		}
	';

	// Content
	$css .= '
		/* Background */
		.sidebar-alt,
		.main-content,
		.featured-slider-area,
		#page-content select,
		#page-content input,
		#page-content textarea {
			background-color: '. esc_html(bard_options( 'colors_content_bg' )) .';
		}

		#featured-links .cv-inner {
			border-color: rgba( 255,255,255,0.4 );
		}

		#featured-link:hover .cv-inner {
			border-color: rgba( 255,255,255,1 );
		}

		#featured-links h6 {
			background-color: #ffffff;
			color: #000000;
		}

		/* Text */
		#page-content,
		#page-content select,
		#page-content input,
		#page-content textarea,
		#page-content .post-author a,
		#page-content .bard-widget a,
		#page-content .comment-author {
			color: #464646;
		}

		/* Title */
		#page-content h1 a,
		#page-content h1,
		#page-content h2,
		#page-content h3,
		#page-content h4,
		#page-content h5,
		#page-content h6,
		#page-content .author-description h4 a,
		#page-content .related-posts h4 a,
		#page-content .blog-pagination .previous-page a,
      	#page-content .blog-pagination .next-page a,
      	blockquote,
		#page-content .post-share a {
			color: #030303;
		}

		#page-content h1 a:hover {
			color: '. esc_html(bard_hex2rgba( '#030303', 0.75 )).';
		}
	
		/* Meta */
		#page-content .post-date,
		#page-content .post-comments,
		#page-content .post-author,
		#page-content [data-layout*="list"] .post-author a,
		#page-content .related-post-date,
		#page-content .comment-meta a,
		#page-content .author-share a,
		#page-content .post-tags a,
		#page-content .tagcloud a,
		.widget_categories li,
		.widget_archive li,
		.ahse-subscribe-box p,
		.rpwwt-post-author,
		.rpwwt-post-categories,
		.rpwwt-post-date,
		.rpwwt-post-comments-number,
		.copyright-info,
		#page-footer .copyright-info a {
			color: #a1a1a1;
		}

		#page-content input::-webkit-input-placeholder { /* Chrome/Opera/Safari */
		  color: #a1a1a1;
		}
		#page-content input::-moz-placeholder { /* Firefox 19+ */
		  color: #a1a1a1;
		}
		#page-content input:-ms-input-placeholder { /* IE 10+ */
		  color: #a1a1a1;
		}
		#page-content input:-moz-placeholder { /* Firefox 18- */
		  color: #a1a1a1;
		}
		
	
		/* Accent */
		#page-content a,
		.post-categories,
		#page-content .bard-widget.widget_text a,
		.scrolltop,
		.required {
			color: '. esc_html(bard_options( 'colors_content_accent' )) .';
		}
		
		.ps-container > .ps-scrollbar-y-rail > .ps-scrollbar-y,
		.read-more a:after {
			background: '. esc_html(bard_options( 'colors_content_accent' )) .';
		}

		#page-content a:hover {
			color: '. esc_html(bard_hex2rgba( bard_options( 'colors_content_accent' ), 0.8 )) .';
		}

		blockquote {
			border-color: '. esc_html(bard_options( 'colors_content_accent' )) .';
		}

		.widget-title h2 {
		  border-top-color: '. esc_html(bard_options( 'colors_content_accent' )) .';
		}


		/* Selection */
		::-moz-selection {
			color: #ffffff;
			background: '. esc_html(bard_options( 'colors_content_accent' )) .';
		}
		::selection {
			color: #ffffff;
			background: '. esc_html(bard_options( 'colors_content_accent' )) .';
		}

		/* Border */
		#page-content .post-footer,
		[data-layout*="list"] .blog-grid > li,
		#page-content .author-description,
		#page-content .related-posts,
		#page-content .entry-comments,
		#page-content .bard-widget li,
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
		pre,
		.single-navigation {
			border-color: #e8e8e8;
		}

		hr {
			background-color: #e8e8e8;
		}

		/* Buttons */
		.widget_search .svg-fa-wrap,
		.widget_search #searchsubmit,
		#page-content .submit,
		#page-content .blog-pagination.numeric a,
		#page-content .blog-pagination.load-more a,
		#page-content .post-password-form input[type="submit"],
		#page-content .wpcf7 [type="submit"] {
			color: #ffffff;
			background-color: #333333;
		}
		#page-content .submit:hover,
		#page-content .blog-pagination.numeric a:hover,
		#page-content .blog-pagination.numeric span,
		#page-content .blog-pagination.load-more a:hover,
		#page-content .bard-subscribe-box input[type="submit"],
		#page-content .widget_wysija input[type="submit"],
		#page-content .post-password-form input[type="submit"]:hover,
		#page-content .wpcf7 [type="submit"]:hover {
			color: #ffffff;
			background-color: '. esc_html(bard_options( 'colors_content_accent' )) .';
		}


		/* Image Overlay */
		.image-overlay,
		#infscr-loading,
		#page-content h4.image-overlay {
			color: #ffffff;
			background-color: '. esc_html(bard_hex2rgba( '#494949', 0.2 )) .';
		}

		.image-overlay a,
		.post-slider .prev-arrow,
		.post-slider .next-arrow,
		#page-content .image-overlay a,
		#featured-slider .slider-dots {
			color: #ffffff;
		}

		.slide-caption {
			background: '. esc_html(bard_hex2rgba( '#ffffff', 0.95 )) .';
		}

		#featured-slider .slick-active {
			background: #ffffff;
		}
	';

	// Footer
	$css .= '
		#page-footer,
		#page-footer a,
		#page-footer select,
		#page-footer input,
		#page-footer textarea,
		.scrolltop:hover {
			color: #222222;
		}

		#page-footer .footer-socials a {
			color: #000000;
		}

		#page-footer #s::-webkit-input-placeholder { /* Chrome/Opera/Safari */
		  color: #222222;
		}
		#page-footer #s::-moz-placeholder { /* Firefox 19+ */
		  color: #222222;
		}
		#page-footer #s:-ms-input-placeholder { /* IE 10+ */
		  color: #222222;
		}
		#page-footer #s:-moz-placeholder { /* Firefox 18- */
		  color: #222222;
		}

		/* Title */
		#page-footer h1,
		#page-footer h2,
		#page-footer h3,
		#page-footer h4,
		#page-footer h5,
		#page-footer h6 {
			color: #111111;
		}

		#page-footer a:hover,
		.footer-socials a:hover span {
			color: '. esc_html(bard_options( 'colors_content_accent' )) .';
		}

		.footer-socials a:hover .footer-socials-icon {
			border-color: '. esc_html(bard_options( 'colors_content_accent' )) .';
		}

		.footer-socials a:hover .footer-socials-icon {
			background: '. esc_html(bard_options( 'colors_content_accent' )) .';
			color: #ffffff;
		}

		/* Border */
		#page-footer a,
		#page-footer .bard-widget li,
		#page-footer #wp-calendar,
		#page-footer #wp-calendar caption,
		#page-footer #wp-calendar tbody td,
		#page-footer .widget_nav_menu li a,
		#page-footer select,
		#page-footer input,
		#page-footer textarea,
		#page-footer .widget-title h2:before,
		#page-footer .widget-title h2:after,
		.footer-widget-title,
		.footer-widgets {
			border-color: #e8e8e8;
		}
	';

	// Preloader
	$css .= '
		.bard-preloader-wrap {
			background-color: #ffffff;
		}
	';


/*
** General Layouts =====
*/

	// Blog Gutter
	$blog_page_gutter_horz = 32;
	$blog_page_gutter_vert = 35;

	// Site Width
	$css .= '
		.boxed-wrapper {
			max-width: 1160px;
		}
	';
	
	// Sidebar Width
	$css .= '
		.sidebar-alt {
			max-width: '. ( (int)bard_options( 'general_sidebar_width' ) + 70 ) .'px;
			left: -'. ( (int)bard_options( 'general_sidebar_width' ) + 70 ) .'px; 
			padding: 85px 35px 0px;
		}

		.sidebar-left,
		.sidebar-right {
			width: '. ( (int)bard_options( 'general_sidebar_width' ) + $blog_page_gutter_horz ) .'px;
		}
	';

	// Both Sidebars
	if ( is_active_sidebar( 'sidebar-left' ) && is_active_sidebar( 'sidebar-right' ) ) {
		$css .= '
			.main-container {
				width: calc(100% - '. ( ( (int)bard_options( 'general_sidebar_width' ) + $blog_page_gutter_horz ) * 2 ) .'px);
				width: -webkit-calc(100% - '. ( ( (int)bard_options( 'general_sidebar_width' ) + $blog_page_gutter_horz ) * 2 ) .'px);
			}
		';

	// Left or Right
	} else if ( is_active_sidebar( 'sidebar-left' ) || is_active_sidebar( 'sidebar-right' ) ) {
		$css .= '
			.main-container {
				width: calc(100% - '. ( (int)bard_options( 'general_sidebar_width' ) + $blog_page_gutter_horz ) .'px);
				width: -webkit-calc(100% - '. ( (int)bard_options( 'general_sidebar_width' ) + $blog_page_gutter_horz ) .'px);
			}
		';

	// No Sidebars
	} else {
		$css .= '
			.main-container {
				width: 100%;
			}
		';
	}

	// Padding
	$css .= '
		#top-bar > div,
		#main-nav > div,
		#featured-links,
		.main-content,
		.page-footer-inner,
		.featured-slider-area.boxed-wrapper {
			padding-left: 40px;
			padding-right: 40px;
		}
	';

	// List Layout
	if ( strpos( bard_options( 'general_home_layout' ), 'list' ) !== false ) {
		$css .= '
			[data-layout*="list"] .blog-grid > li,
			[data-layout*="list"] .blog-grid > li {
				width: 100%;
				padding-bottom: 39px;
			}

			[data-layout*="list"] .blog-grid .has-post-thumbnail .post-media {
				float: left;
				max-width: 300px;
				width: 100%;
			}

			[data-layout*="list"] .blog-grid .has-post-thumbnail .post-content-wrap {
				width: calc(100% - 300px);
				width: -webkit-calc(100% - 300px);
				float: left;
				padding-left: 37px;
			}

			[data-layout*="list"] .blog-grid .post-header, 
			[data-layout*="list"] .blog-grid .read-more {
				text-align: left;
			}
		';

		if ( is_rtl() ) {
			$css .= '
				[data-layout*="list"] .blog-grid .post-media {
					float: right;
				}

				[data-layout*="list"] .blog-grid .post-content-wrap {
					float: right;
					padding-left: 0;
					padding-right: 37px;

				}

				[data-layout*="list"] .blog-grid .post-header, 
				[data-layout*="list"] .blog-grid .read-more {
					text-align: right;
				}
			';

		}
	}


/*
** Header Image =====
*/
	// Height / Background
	$css .= '
		.entry-header {
			height: 350px;
			background-image:url('. esc_url( get_header_image() ) .');
			background-size: '. esc_html(bard_options( 'header_image_bg_image_size' )) .';

		}
	';

	// Center if cover
	if ( esc_html(bard_options( 'header_image_bg_image_size' )) === 'cover' ) {
		$css .= '
			.entry-header {
				background-position: center center;
			}
		';		
	}

	// Header Logo
	$css .= '
		.logo-img {
			max-width: '. (int)bard_options( 'title_tagline_logo_width' ) .'px;
		}
	';


/*
** Site Identity =====
*/

	// Logo &  Tagline
	if ( ! display_header_text() ) {
		$css .= '
			.header-logo a:not(.logo-img),
			.site-description {
				display: none;
			}
		';		
	}


/*
** Main Navigation =====
*/
	
	// Align
	$css .= '
		#main-nav {
			text-align: '. esc_html(bard_options( 'main_nav_align' )) .';
		}
	';

	if ( bard_options( 'main_nav_align' ) === 'center' ) {
		$css .= '	
			.main-nav-icons {
			  position: absolute;
			  top: 0px;
			  right: 40px;
			  z-index: 2;
			}

			.main-nav-buttons {
			  position: absolute;
			  top: 0px;
			  left: 40px;
			  z-index: 1;
			}

		';
	} else {
		$css .= '					
			.main-nav-icons {
			 float: right;
			 margin-left: 15px;
			}

			.main-nav-buttons {
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
		esc_url(bard_options( 'featured_links_image_1' )),
		esc_url(bard_options( 'featured_links_image_2' )),
		esc_url(bard_options( 'featured_links_image_3' ))
	);

	$featured_links = count( array_filter( $featured_links ) );
	$featured_links_gutter = 0;

	// Gutter	
	$featured_links_gutter = 25;
	$css .= '
		#featured-links .featured-link {
			margin-right: '. $featured_links_gutter .'px;
		}
		#featured-links .featured-link:last-of-type {
			margin-right: 0;
		}
	';

	// Columns
	$css .= '
		#featured-links .featured-link {
			width: calc( (100% - '. ( ($featured_links - 1) * $featured_links_gutter ) .'px) / '. $featured_links .' - 1px);
			width: -webkit-calc( (100% - '. ( ($featured_links - 1) * $featured_links_gutter ) .'px) / '. $featured_links .'- 1px);
		}
	';

	if ( bard_options( 'featured_links_title_1' ) === '' ) {
		$css .= '
			.featured-link:nth-child(1) .cv-inner {
			    display: none;
			}
		';
	}

	if ( bard_options( 'featured_links_title_2' ) === '' ) {
		$css .= '
			.featured-link:nth-child(2) .cv-inner {
			    display: none;
			}
		';
	}
	
	if ( bard_options( 'featured_links_title_3' ) === '' ) {
		$css .= '
			.featured-link:nth-child(3) .cv-inner {
			    display: none;
			}
		';
	}


/*
** Blog Page =====
*/

	// Gutter
	$css .= '
		.blog-grid > li {
			display: inline-block;
			vertical-align: top;
			margin-right: '. $blog_page_gutter_horz .'px;
			margin-bottom: '. $blog_page_gutter_vert .'px;
		}

		.blog-grid > li {
			width: calc((100% - '. $blog_page_gutter_horz .'px ) /2 - 1px);
			width: -webkit-calc((100% - '. $blog_page_gutter_horz .'px ) /2 - 1px);
		}

		.blog-grid > li.blog-classic-style {
			width: 100%;
		}

		@media screen and ( min-width: 979px ) {
			.blog-grid > .blog-grid-style:nth-last-of-type(-n+2) {
			 	margin-bottom: 0;
			}
		}
	';

	if ( is_home() && bard_full_width_post() ) {
		$css .= '
			.blog-grid > li:nth-of-type(2n+1) {
				margin-right: 0;
			}
		';
	} else {
		$css .= '
			.blog-grid > li:nth-of-type(2n+2) {
				margin-right: 0;
			}
		';
	}

	if ( is_active_sidebar( 'sidebar-left' ) && is_active_sidebar( 'sidebar-right' ) ) {
		$css .= '
			.sidebar-right {
				padding-left: ' . $blog_page_gutter_horz . 'px;
			}
			.sidebar-left {
				padding-right: ' . $blog_page_gutter_horz . 'px;
			}
		';
	} else if ( is_active_sidebar( 'sidebar-left' ) ) {
		$css .= '
			.sidebar-left {
				padding-right: ' . $blog_page_gutter_horz . 'px;
			}
		';
	} else if ( is_active_sidebar( 'sidebar-right' ) ) {
		$css .= '
			.sidebar-right {
				padding-left: ' . $blog_page_gutter_horz . 'px;
			}
		';
	}

	// Blog Page Dropcaps
	if ( bard_true_false(bard_options( 'blog_page_show_dropcaps' )) === true ) {
		$css .= '
			body.single .post-content > p:first-child:first-letter,
			article.page .post-content > p:first-child:first-letter,
			li.blog-classic-style .post-content > p:first-child:first-letter {
			  font-family: "Montserrat";
			  font-weight: 400;
			  float: left;
			  margin: 6px 9px 0 -1px;
			  font-size: 81px;
			  line-height: 65px;
			  text-align: center;
			  color: #030303;
  			  text-transform: uppercase;
			}

			@-moz-document url-prefix() {
				.post-content > p:first-child:first-letter {
				    margin-top: 10px !important;
				}
			}
		';
	}


/*
** Typography =====
*/
	// Logo & Tagline
	$css .= "
		.header-logo {
			font-family: '". str_replace( '+', ' ', esc_html(bard_options( 'typography_logo_family' )) ) ."';
		}
	";

	// Top Bar
	$css .= "
		#top-menu li a {
			font-family: '". str_replace( '+', ' ', esc_html(bard_options( 'typography_nav_family' )) ) ."';
		}
	";

	// Main Navigation
	$css .= "	
		#main-menu li a {
			font-family: '". str_replace( '+', ' ', esc_html(bard_options( 'typography_nav_family' )) ) ."';
		}

		#mobile-menu li {
			font-family: '". str_replace( '+', ' ', esc_html(bard_options( 'typography_nav_family' )) ) ."';
		}
	";


/*
** Page Footer =====
*/

	// Widget Columns
	$css .= '
		.footer-widgets .page-footer-inner > .bard-widget {
			width: 30%;
			margin-right: 5%;
		}

		.footer-widgets .page-footer-inner > .bard-widget:nth-child(3n+3) {
			margin-right: 0;
		}

		.footer-widgets .page-footer-inner > .bard-widget:nth-child(3n+4) {
			clear: both;
		}
	';


/*
** Woocommerce =====
*/

	/* Text */
	$css .= '
		.woocommerce div.product .stock,
		.woocommerce div.product p.price,
		.woocommerce div.product span.price,
		.woocommerce ul.products li.product .price,
		.woocommerce-Reviews .woocommerce-review__author,
		.woocommerce form .form-row .required,
		.woocommerce form .form-row.woocommerce-invalid label,
		.woocommerce #page-content div.product .woocommerce-tabs ul.tabs li a {
		    color: #464646;
		}

		.woocommerce a.remove:hover {
		    color: #464646 !important;
		}
	';

	/* Meta */
	$css .= '
		.woocommerce a.remove,
		.woocommerce .product_meta,
		#page-content .woocommerce-breadcrumb,
		#page-content .woocommerce-review-link,
		#page-content .woocommerce-breadcrumb a,
		#page-content .woocommerce-MyAccount-navigation-link a,
		.woocommerce .woocommerce-info:before,
		.woocommerce #page-content .woocommerce-result-count,
		.woocommerce-page #page-content .woocommerce-result-count,
		.woocommerce-Reviews .woocommerce-review__published-date,
		.woocommerce .product_list_widget .quantity,
		.woocommerce .widget_products .amount,
		.woocommerce .widget_price_filter .price_slider_amount,
		.woocommerce .widget_recently_viewed_products .amount,
		.woocommerce .widget_top_rated_products .amount,
		.woocommerce .widget_recent_reviews .reviewer {
		    color: #a1a1a1;
		}

		.woocommerce a.remove {
		    color: #a1a1a1 !important;
		}
	';

	/* Accent */
	$css .= '
		p.demo_store,
		.woocommerce-store-notice,
		.woocommerce span.onsale {
		   background-color: '. esc_html(bard_options( 'colors_content_accent' )) .';
		}

		.woocommerce .star-rating::before,
		.woocommerce .star-rating span::before,
		.woocommerce #page-content ul.products li.product .button,
		#page-content .woocommerce ul.products li.product .button,
		#page-content .woocommerce-MyAccount-navigation-link.is-active a,
		#page-content .woocommerce-MyAccount-navigation-link a:hover {
		   color: '. esc_html(bard_options( 'colors_content_accent' )) .';
		}
	';

	/* Border Color */
	$css .= '
		.woocommerce form.login,
		.woocommerce form.register,
		.woocommerce-account fieldset,
		.woocommerce form.checkout_coupon,
		.woocommerce .woocommerce-info,
		.woocommerce .woocommerce-error,
		.woocommerce .woocommerce-message,
		.woocommerce .widget_shopping_cart .total,
		.woocommerce.widget_shopping_cart .total,
		.woocommerce-Reviews .comment_container,
		.woocommerce-cart #payment ul.payment_methods,
		#add_payment_method #payment ul.payment_methods,
		.woocommerce-checkout #payment ul.payment_methods,
		.woocommerce div.product .woocommerce-tabs ul.tabs::before,
		.woocommerce div.product .woocommerce-tabs ul.tabs::after,
		.woocommerce div.product .woocommerce-tabs ul.tabs li,
		.woocommerce .woocommerce-MyAccount-navigation-link,
		.select2-container--default .select2-selection--single {
			border-color: #e8e8e8;
		}

		.woocommerce-cart #payment,
		#add_payment_method #payment,
		.woocommerce-checkout #payment,
		.woocommerce .woocommerce-info,
		.woocommerce .woocommerce-error,
		.woocommerce .woocommerce-message,
		.woocommerce div.product .woocommerce-tabs ul.tabs li {
			background-color: '. esc_html(bard_hex2rgba( '#e8e8e8', 0.3 )) .';
		}

		.woocommerce-cart #payment div.payment_box::before,
		#add_payment_method #payment div.payment_box::before,
		.woocommerce-checkout #payment div.payment_box::before {
			border-color: '. esc_html(bard_hex2rgba( '#e8e8e8', 0.5 )) .';
		}

		.woocommerce-cart #payment div.payment_box,
		#add_payment_method #payment div.payment_box,
		.woocommerce-checkout #payment div.payment_box {
			background-color: '. esc_html(bard_hex2rgba( '#e8e8e8', 0.5 )) .';
		}
	';

	/* Buttons */
	$css .= '
		#page-content .woocommerce input.button,
		#page-content .woocommerce a.button,
		#page-content .woocommerce a.button.alt,
		#page-content .woocommerce button.button.alt,
		#page-content .woocommerce input.button.alt,
		#page-content .woocommerce #respond input#submit.alt,
		.woocommerce #page-content .widget_product_search input[type="submit"],
		.woocommerce #page-content .woocommerce-message .button,
		.woocommerce #page-content a.button.alt,
		.woocommerce #page-content button.button.alt,
		.woocommerce #page-content #respond input#submit,
		.woocommerce #page-content .widget_price_filter .button,
		.woocommerce #page-content .woocommerce-message .button,
		.woocommerce-page #page-content .woocommerce-message .button,
		.woocommerce #page-content nav.woocommerce-pagination ul li a,
		.woocommerce #page-content nav.woocommerce-pagination ul li span {
			color: #ffffff;
			background-color: #333333;
		}

		#page-content .woocommerce input.button:hover,
		#page-content .woocommerce a.button:hover,
		#page-content .woocommerce a.button.alt:hover,
		#page-content .woocommerce button.button.alt:hover,
		#page-content .woocommerce input.button.alt:hover,
		#page-content .woocommerce #respond input#submit.alt:hover,
		.woocommerce #page-content .woocommerce-message .button:hover,
		.woocommerce #page-content a.button.alt:hover,
		.woocommerce #page-content button.button.alt:hover,
		.woocommerce #page-content #respond input#submit:hover,
		.woocommerce #page-content .widget_price_filter .button:hover,
		.woocommerce #page-content .woocommerce-message .button:hover,
		.woocommerce-page #page-content .woocommerce-message .button:hover,
		.woocommerce #page-content nav.woocommerce-pagination ul li a:hover,
		.woocommerce #page-content nav.woocommerce-pagination ul li span.current {
			color: #ffffff;
			background-color: '. esc_html(bard_options( 'colors_content_accent' )) .';
		}

		.woocommerce #page-content nav.woocommerce-pagination ul li a.prev,
		.woocommerce #page-content nav.woocommerce-pagination ul li a.next {
			color: #333333;
		}

		.woocommerce #page-content nav.woocommerce-pagination ul li a.prev:hover,
		.woocommerce #page-content nav.woocommerce-pagination ul li a.next:hover {
			color: '. esc_html(bard_options( 'colors_content_accent' )) .';
		}

		.woocommerce #page-content nav.woocommerce-pagination ul li a.prev:after,
		.woocommerce #page-content nav.woocommerce-pagination ul li a.next:after {
			color: #ffffff;
		}

		.woocommerce #page-content nav.woocommerce-pagination ul li a.prev:hover:after,
		.woocommerce #page-content nav.woocommerce-pagination ul li a.next:hover:after {
			color: #ffffff;
		}
	';


/*
** Preloader =====
*/

	$css .= '.cssload-cube{background-color:#333333;width:9px;height:9px;position:absolute;margin:auto;animation:cssload-cubemove 2s infinite ease-in-out;-o-animation:cssload-cubemove 2s infinite ease-in-out;-ms-animation:cssload-cubemove 2s infinite ease-in-out;-webkit-animation:cssload-cubemove 2s infinite ease-in-out;-moz-animation:cssload-cubemove 2s infinite ease-in-out}.cssload-cube1{left:13px;top:0;animation-delay:.1s;-o-animation-delay:.1s;-ms-animation-delay:.1s;-webkit-animation-delay:.1s;-moz-animation-delay:.1s}.cssload-cube2{left:25px;top:0;animation-delay:.2s;-o-animation-delay:.2s;-ms-animation-delay:.2s;-webkit-animation-delay:.2s;-moz-animation-delay:.2s}.cssload-cube3{left:38px;top:0;animation-delay:.3s;-o-animation-delay:.3s;-ms-animation-delay:.3s;-webkit-animation-delay:.3s;-moz-animation-delay:.3s}.cssload-cube4{left:0;top:13px;animation-delay:.1s;-o-animation-delay:.1s;-ms-animation-delay:.1s;-webkit-animation-delay:.1s;-moz-animation-delay:.1s}.cssload-cube5{left:13px;top:13px;animation-delay:.2s;-o-animation-delay:.2s;-ms-animation-delay:.2s;-webkit-animation-delay:.2s;-moz-animation-delay:.2s}.cssload-cube6{left:25px;top:13px;animation-delay:.3s;-o-animation-delay:.3s;-ms-animation-delay:.3s;-webkit-animation-delay:.3s;-moz-animation-delay:.3s}.cssload-cube7{left:38px;top:13px;animation-delay:.4s;-o-animation-delay:.4s;-ms-animation-delay:.4s;-webkit-animation-delay:.4s;-moz-animation-delay:.4s}.cssload-cube8{left:0;top:25px;animation-delay:.2s;-o-animation-delay:.2s;-ms-animation-delay:.2s;-webkit-animation-delay:.2s;-moz-animation-delay:.2s}.cssload-cube9{left:13px;top:25px;animation-delay:.3s;-o-animation-delay:.3s;-ms-animation-delay:.3s;-webkit-animation-delay:.3s;-moz-animation-delay:.3s}.cssload-cube10{left:25px;top:25px;animation-delay:.4s;-o-animation-delay:.4s;-ms-animation-delay:.4s;-webkit-animation-delay:.4s;-moz-animation-delay:.4s}.cssload-cube11{left:38px;top:25px;animation-delay:.5s;-o-animation-delay:.5s;-ms-animation-delay:.5s;-webkit-animation-delay:.5s;-moz-animation-delay:.5s}.cssload-cube12{left:0;top:38px;animation-delay:.3s;-o-animation-delay:.3s;-ms-animation-delay:.3s;-webkit-animation-delay:.3s;-moz-animation-delay:.3s}.cssload-cube13{left:13px;top:38px;animation-delay:.4s;-o-animation-delay:.4s;-ms-animation-delay:.4s;-webkit-animation-delay:.4s;-moz-animation-delay:.4s}.cssload-cube14{left:25px;top:38px;animation-delay:.5s;-o-animation-delay:.5s;-ms-animation-delay:.5s;-webkit-animation-delay:.5s;-moz-animation-delay:.5s}.cssload-cube15{left:38px;top:38px;animation-delay:.6s;-o-animation-delay:.6s;-ms-animation-delay:.6s;-webkit-animation-delay:.6s;-moz-animation-delay:.6s}.cssload-spinner{margin:auto;width:49px;height:49px;position:relative}@keyframes cssload-cubemove{35%{transform:scale(0.005)}50%{transform:scale(1.7)}65%{transform:scale(0.005)}}@-o-keyframes cssload-cubemove{35%{-o-transform:scale(0.005)}50%{-o-transform:scale(1.7)}65%{-o-transform:scale(0.005)}}@-ms-keyframes cssload-cubemove{35%{-ms-transform:scale(0.005)}50%{-ms-transform:scale(1.7)}65%{-ms-transform:scale(0.005)}}@-webkit-keyframes cssload-cubemove{35%{-webkit-transform:scale(0.005)}50%{-webkit-transform:scale(1.7)}65%{-webkit-transform:scale(0.005)}}@-moz-keyframes cssload-cubemove{35%{-moz-transform:scale(0.005)}50%{-moz-transform:scale(1.7)}65%{-moz-transform:scale(0.005)}}';




// return generated & compressed CSS
echo '<style id="bard_dynamic_css">'. str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css ) .'</style>'; 


} // end bard_dynamic_css()
add_action( 'wp_head', 'bard_dynamic_css' );