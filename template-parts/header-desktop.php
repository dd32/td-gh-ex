<?php
/**
 * The template file to display the desktop header
 *
 * @package agncy
 */

	$header_alignment  = get_theme_mod( 'agncy_header_menu_alignment', 'container' );
	$header_layout     = get_theme_mod( 'agncy_header_layout', 'side-by-side' );
	$header_logo_pos   = get_theme_mod( 'agncy_header_logo_position', 'left' );
	$header_menu_pos   = get_theme_mod( 'agncy_header_menu_position', 'left' );
	$header_font_theme = get_theme_mod( 'agncy_header_theme', 'dark' );
	$header_background = get_theme_mod( 'agncy_header_background', 'default' );
	$header_color      = get_theme_mod( 'agncy_header_color', '#ffffff' );

	$header_classes = array(
		'desktop-header',
		'color-primary--border',
		'hidden-xs',
		'hidden-sm',
		'header-layout-' . $header_layout,
		'header-logo-pos-' . $header_logo_pos,
		'header-menu-pos-' . $header_menu_pos,
		'header-theme-' . $header_font_theme,
		'header-background-' . $header_background,
	);

	$styles    = array();
	$style_tag = null;
	if ( 'color' == $header_background ) {
		$styles[] = 'background-color: ' . $header_color;
	}

	if ( count( $styles ) ) {
		$style_tag = 'style="' . esc_attr( implode( '; ', $styles ) ) . '"';
	}
	?>
<header class="<?php echo esc_attr( implode( ' ', $header_classes ) ); ?>" role="banner" <?php echo $style_tag; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>

	<?php get_template_part( 'template-parts/header/contact-bar' ); ?>

	<div class="<?php echo esc_attr( $header_alignment ); ?> header-container">
		<?php get_template_part( 'template-parts/header/logo' ); ?>

		<?php get_template_part( 'template-parts/header/navigation' ); ?>
	</div>
</header>
