<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php do_action( 'atlast_business_before_header' );
$prefix        = atlast_business_get_prefix();
$topbar_enable = esc_attr( get_theme_mod( $prefix . '_topbar_enable', '0' ) );
?>
<div id="topbar"
     class="topbar-area pad-tb-5<?php echo( $topbar_enable == '0' ? ' hide-element' : ' show-element' ); ?>">
	<?php
	$topbar_style = esc_attr( get_theme_mod( $prefix . '_topbar_layout', '1' ) );
	?>
    <div class="container grid-xl">
        <div class="columns">
			<?php get_template_part( 'template-parts/topbar/topbar-style-' . $topbar_style ); ?>
        </div>
    </div>

</div>

<?php $hasSticky = esc_attr( get_theme_mod( $prefix . '_sticky_header', '0' ) );
$header_style    = esc_attr( get_theme_mod( $prefix . '_header_layout', '1' ) ); ?>

<header id="header"
        class="pad-tb-20<?php echo atlast_business_set_transparent_menu(); ?> <?php echo( $hasSticky != '0' ? ' sticky-header ' : '' ); ?> <?php echo 'header-style-' . $header_style; ?>"
        role="banner">
	<?php
	$header_style = esc_attr( get_theme_mod( $prefix . '_header_layout', '1' ) );
	?>

    <div class="container grid-xl">
        <div class="columns center-flex mobile-nav-container">
			<?php

			$mobile_menu = esc_attr( get_theme_mod( $prefix . '_mobile_menu_layout', 0 ) );
			if ( $mobile_menu == 1 ) {
				get_template_part( 'template-parts/header/mobile/mobile-header-style-' . $mobile_menu );
			} else {
				get_template_part( 'template-parts/header/mobile', 'logo' );
				get_template_part( 'template-parts/header/mobile', 'trigger' );
			}
			?>
        </div>
        <!-- Desktop / Tablet till 600px; -->
		<?php get_template_part( 'template-parts/header/header-style-' . $header_style ); ?>
    </div>
</header>
<?php
/*
 * Hooked the function/s
 * atlast_business_set_header_image - Priority 5 - init.php
 */

do_action( 'atlast_business_after_header' ); ?>
<?php
$prefix = atlast_business_get_prefix();
$where_to_show = get_theme_mod($prefix . '_everywhere_header', '0');

if ($where_to_show == 0) {
	if (is_front_page() || is_home()) {
		if ( is_active_sidebar( 'header-sidebar' ) ) :
			dynamic_sidebar( 'header-sidebar' );
		endif;
	}
} else {
	if ( is_active_sidebar( 'header-sidebar' ) ) :
		dynamic_sidebar( 'header-sidebar' );
	endif;
}


