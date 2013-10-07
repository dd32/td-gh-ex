<?php
/**
 * Custom styling functions.
 *
 * @package ThinkUpThemes
 */

/* ----------------------------------------------------------------------------------
	THEME COLOR SCHEME
---------------------------------------------------------------------------------- */

/* Input preser color scheme */
function thinkup_input_styleselect($classes){
global $thinkup_styles_colorswitch;
global $thinkup_styles_colorscheme;
global $thinkup_styles_colorcustom;

global $post;
$_thinkup_meta_colorscheme = get_post_meta( $post->ID, '_thinkup_meta_colorscheme', true );

	if ( empty( $thinkup_styles_colorscheme ) ) { 
		$thinkup_styles_colorscheme = 'style-default'; 
	} else {
		$thinkup_styles_colorscheme = 'style-' . $thinkup_styles_colorscheme;
	}

	if ( ! empty( $_thinkup_meta_colorscheme ) and strrpos($_thinkup_meta_colorscheme, 'Select color scheme') ) {
		$_thinkup_meta_colorscheme  = 'style-' . $_thinkup_meta_colorscheme;
	}

	if ( ! is_home() ) {
		if ( ! empty( $_thinkup_meta_colorscheme ) and strrpos($_thinkup_meta_colorscheme, 'Select color scheme') and $_thinkup_meta_colorscheme !== 'style-default' ) {
			$classes[] = $_thinkup_meta_colorscheme;
		} else if ( $thinkup_styles_colorswitch !== '1' ) {
			if ( ! empty( $thinkup_styles_colorscheme ) and $thinkup_styles_colorscheme !== 'style-default' ) {
				$classes[] = $thinkup_styles_colorscheme;
			} else {
				$classes[] = 'style-default';
			}
		} else if ( $thinkup_styles_colorswitch == '1' and empty( $thinkup_styles_colorcustom ) ) {
			$classes[] = 'style-default';
		}
	} else {
		if ( $thinkup_styles_colorswitch !== '1' ) {
			if ( ! empty( $thinkup_styles_colorscheme ) and $thinkup_styles_colorscheme !== 'style-default' ) {
				$classes[] = $thinkup_styles_colorscheme;
			} else {
				$classes[] = 'style-default';
			}
		} else if ( $thinkup_styles_colorswitch == '1' and empty( $thinkup_styles_colorcustom ) ) {
			$classes[] = 'style-default';
		}
	}
	return $classes;
}
add_action( 'body_class', 'thinkup_input_styleselect');


/* Input gradient custom color scheme */
function thinkup_input_stylecustom(){
global $thinkup_styles_colorswitch;
global $thinkup_styles_colorcustom;

	if ( $thinkup_styles_colorswitch == '1' and ! empty($thinkup_styles_colorcustom) ) {

		echo	"\n" . '<style type="text/css">' . "\n",
		'a,' . "\n",
		'#pre-header .header-links .menu-hover > a,' . "\n",
		'#pre-header .header-links > ul > li > a:hover,' . "\n",
		'#pre-header .header-links .sub-menu a:hover,' . "\n",
		'#header .header-links .sub-menu a:hover,' . "\n",
		'#header .header-links .sub-menu .current-menu-item a,' . "\n",
		'#footer-core a,' . "\n",
		'#sub-footer-core a:hover,' . "\n",
		'#footer .thinkup_widget_categories a:hover,' . "\n",
		'#footer .popular-posts a:hover,' . "\n",
		'#footer .recent-comments a:hover,' . "\n",
		'#footer .recent-posts a:hover,' . "\n",
		'#footer .thinkup_widget_tagscloud a:hover,' . "\n",
		'.thinkup_widget_categories li a:hover,' . "\n",
		'.thinkup_widget_recentcomments .quote:before,' . "\n",
		'#sidebar .thinkup_widget_twitterfeed a,' . "\n",
		'.blog-style2 .entry-meta a:hover,' . "\n",
		'#author-title h3 a:hover,' . "\n",
		'.comment-author a:hover,' . "\n",
		'.comment-meta a:hover,' . "\n",
		'.page-template-template-archive-php #main-core a:hover,' . "\n",
		'.page-template-template-sitemap-php #main-core a:hover {' . "\n",
		'	color: ' . $thinkup_styles_colorcustom . ';' . "\n",
		'}' . "\n",
		'.pag li.current span,' . "\n",
		'.themebutton2,' . "\n",
		'.themebutton3:hover,' . "\n",
		'button:hover,' . "\n",
		'html input[type="button"]:hover,' . "\n",
		'input[type="reset"]:hover,' . "\n",
		'input[type="submit"]:hover,' . "\n",
		'.blog-icon i,' . "\n",
		'.blog-style1 .entry-meta > span:hover,' . "\n",
		'.single .entry-meta > span:hover {' . "\n",
		'	background: ' . $thinkup_styles_colorcustom . ';' . "\n",
		'}' . "\n",
		'.themebutton:hover,' . "\n",
		'.themebutton:focus,' . "\n",
		'#sidebar .thinkup_widget_flickr a .image-overlay,' . "\n",
		'#sidebar .popular-posts a .image-overlay,' . "\n",
		'#sidebar .recent-comments a .image-overlay,' . "\n",
		'#sidebar .recent-posts a .image-overlay,' . "\n",
		'img.hover-link,' . "\n",
		'img.hover-zoom,' . "\n",
		'.da-thumbs a.prettyPhoto img {' . "\n",
		'	background-color: ' . $thinkup_styles_colorcustom . ';' . "\n",
		'}' . "\n",
		'.pag li.current span,' . "\n",
		'#sidebar .thinkup_widget_tagscloud a:hover,' . "\n",
		'#footer .thinkup_widget_tagscloud a:hover,' . "\n",
		'.blog-style1 .entry-meta > span:hover,' . "\n",
		'.single .entry-meta > span:hover {' . "\n",
		'	border-color: ' . $thinkup_styles_colorcustom . ';' . "\n",
		'}' . "\n",
		'#footer .popular-posts:hover img,' . "\n",
		'#footer .recent-comments:hover img,' . "\n",
		'#footer .recent-posts:hover img,' . "\n",
		'#footer .thinkup_widget_flickr img:hover {' . "\n",
		'	border: 2px solid ' . $thinkup_styles_colorcustom . ';' . "\n",
		'}' . "\n",
		'#filter.portfolio-filter li a:hover,' . "\n",
		'#filter.portfolio-filter li a.selected {' . "\n",
		'	border: 1px solid ' . $thinkup_styles_colorcustom . ';' . "\n",
		'	background: ' . $thinkup_styles_colorcustom . ';' . "\n",
		'}' . "\n",
		'</style>' . "\n";
	}
}
add_action( 'wp_head','thinkup_input_stylecustom', '11' );


?>