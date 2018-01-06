<?php
/**
 * best blog Theme Custom color
 *
 * @package imon themes
 * @subpackage best blog
 * @since best blog 1.0.0
 */

function bestblog_inline_style() {
	$inline_css='';
	// Get the background color for text
$bestblog_flavor_color   =  get_theme_mod( 'bestblog_flavor_color' ,'#ffc2ca') ;


if ( 225 > ariColor::newColor( $bestblog_flavor_color )->luminance ) {
	// Our background color is dark, so we need to create a light text color.
	$text_color = Kirki_Color::adjust_brightness( $bestblog_flavor_color, 225 );
} else {

	// Our background color is light, so we need to create a dark text color
	$text_color = Kirki_Color::adjust_brightness( $bestblog_flavor_color, -225 );

}
/*  Color calculation for text */
$inline_css .=
	".button.secondary,
	.navigation .nav-links .current,
	.single-cats.button-group .button,
	.comment-form .form-submit input#submit,
	a.box-comment-btn,
	.comment-form .form-submit input[type='submit'],
	.bestblog-author-bttom .button a,
	.sidebar-inner .widget_wrap ul li a,
	.block-content-none .search-submit,
	.scroll_to_top.floating-action.button
	{
		color: $text_color ;
	}"
;

// Get the text color for  hover
$bestblog_flavor_color   =  get_theme_mod( 'bestblog_hover_color' ,'#767676') ;


if ( 225 > ariColor::newColor( $bestblog_flavor_color )->luminance ) {
// Our background color is dark, so we need to create a light text color.
$text_color_hover = Kirki_Color::adjust_brightness( $bestblog_flavor_color, 225 );
} else {

// Our background color is light, so we need to create a dark text color
$text_color_hover = Kirki_Color::adjust_brightness( $bestblog_flavor_color, -225 );

}
/*  Color calculation for text */
$inline_css .=
".button.secondary:hover,
.main-menu-wrap .is-dropdown-submenu-parent .submenu li a:hover,
.single-cats.button-group .button:hover,
.bestblog-author-bttom .button a:hover,
.block-content-none .search-submit:hover
{
	color: $text_color_hover ;
}"
;

// Get the text color for  hover
$menu_bg_color   =  get_theme_mod( 'menu_bg_color' ,'#fff') ;


if ( 225 > ariColor::newColor( $menu_bg_color )->luminance ) {
// Our background color is dark, so we need to create a light text color.
$sub_h1_color = Kirki_Color::adjust_brightness( $menu_bg_color, 225 );
} else {

// Our background color is light, so we need to create a dark text color
$sub_h1_color = Kirki_Color::adjust_brightness( $menu_bg_color, -225 );

}
/*  Color calculation for text */
$inline_css .=
".heade-page-nothumb h1
{
	color: $sub_h1_color ;
}"
;

wp_add_inline_style( 'bestblog-style', $inline_css );
}
add_action( 'wp_enqueue_scripts', 'bestblog_inline_style', 10 );
