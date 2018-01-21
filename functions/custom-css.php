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
$text_color = esc_attr( $text_color );
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
	.scroll_to_top.floating-action.button,
	.woocommerce div.product form.cart .button,
	.woocommerce #respond input#submit.alt,
	.woocommerce a.button.alt, .woocommerce button.button.alt,
	.woocommerce input.button.alt, .woocommerce #respond input#submit,
	.woocommerce a.button, .woocommerce button.button, .woocommerce input.button,
	.comment-list .comment-reply-link
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
$text_color_hover = esc_attr( $text_color_hover );
/*  Color calculation for text */
$inline_css .=
".button.secondary:hover,
.main-menu-wrap .is-dropdown-submenu-parent .submenu li a:hover,
.single-cats.button-group .button:hover,
.bestblog-author-bttom .button a:hover,
.block-content-none .search-submit:hover,
.woocommerce div.product form.cart .button:hover,
.woocommerce #respond input#submit.alt:hover,
.woocommerce a.button.alt:hover,
.woocommerce button.button.alt:hover,
.woocommerce input.button.alt:hover,
.woocommerce #respond input#submit:hover,
.woocommerce a.button:hover,
.woocommerce button.button:hover,
.woocommerce input.button:hover
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
$sub_h1_color = esc_attr( $sub_h1_color );

/*  Color calculation for text */
$inline_css .=
".heade-page-nothumb h1,
	#sub_banner .top-bar-left h1
{
	color: $sub_h1_color ;
}"
;

/*  Color calculation for background to text */
$topbg_gradient   =  get_theme_mod( 'topbg_gradient' ,'gradient_2') ;


if ( 'gradient_14' == $topbg_gradient || 'gradient_21' == $topbg_gradient || 'gradient_6' == $topbg_gradient || 'gradient_1' == $topbg_gradient || 'gradient_29' == $topbg_gradient) :

/*  Color calculation for text */
$inline_css .=
" .woocommerce-result-count,
.related.products h2,
.single-post-box-related .block-title,
.home_widget_wrap .block-title,
.home_widget_wrap .widget-title
{
	color: #fff ;
}"
;
endif;
wp_add_inline_style( 'bestblog-style', $inline_css );
}
add_action( 'wp_enqueue_scripts', 'bestblog_inline_style', 10 );
