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
<div id="topbar" class="topbar-area pad-tb-5<?php echo( $topbar_enable == '0' ? ' hide-element' : ' show-element' ); ?>">
	<?php
	    $topbar_style = esc_attr( get_theme_mod( $prefix . '_topbar_layout', '1' ) );
	?>
    <div class="container grid-xl">
        <div class="columns">
	        <?php get_template_part( 'template-parts/topbar/topbar-style-' . $topbar_style ); ?>
        </div>
    </div>

</div>

<?php $hasSticky = esc_attr(get_theme_mod($prefix.'_sticky_header','0'));
$header_style = esc_attr( get_theme_mod( $prefix . '_header_layout', '1' ) ); ?>

<header id="header" class="pad-tb-20<?php echo atlast_set_transparent_menu(); ?> <?php echo ($hasSticky != '0'? ' sticky-header ' : '' ); ?> <?php echo 'header-style-'.$header_style;?>" role="banner">
	<?php
	$header_style = esc_attr( get_theme_mod( $prefix . '_header_layout', '1' ) );
	?>

    <div class="container grid-xl">
        <div class="columns center-flex mobile-nav-container">
            <!-- Mobile -->
			<?php get_template_part( 'template-parts/header/mobile', 'logo' ); ?>
			<?php get_template_part( 'template-parts/header/mobile', 'trigger' ); ?>
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