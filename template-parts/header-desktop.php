<?php
/**
 * The template file to display the desktop header
 *
 * @package agncy
 */

	$header_logo_pos   = get_theme_mod( 'agncy_header_logo_position', 'logo-left' );
	$header_layout     = get_theme_mod( 'agncy_header_layout', 'default' );
	$header_theme      = get_theme_mod( 'agncy_header_theme', 'light' );
	$header_background = get_theme_mod( 'agncy_header_background', 'default' );
	$header_color      = get_theme_mod( 'agncy_header_color', '#ffffff' );

	$header_classes = array(
		'desktop-header',
		'color-primary--border',
		'hidden-xs',
		'hidden-sm',
		'header-' . $header_logo_pos,
		'header-layout-' . $header_layout,
		'header-theme-' . $header_theme,
		'header-background-' . $header_background,
	);

	$styles    = array();
	$style_tag = null;
	if ( 'color' == $header_background ) {
		$styles[] = 'background-color: ' . $header_color;
	}

	if ( count( $styles ) ) {
		$style_tag = 'style="' . implode( '; ', $styles ) . '"';
	}
	?>
<header class="<?php echo esc_attr( implode( ' ', $header_classes ) ); ?>" role="banner" <?php echo wp_kses_post( $style_tag ); ?>>
	<?php get_template_part( 'template-parts/header/head', $header_layout ); ?>
</header>
