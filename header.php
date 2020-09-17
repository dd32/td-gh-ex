<?php
/**
 * Display Header.
 * @package Academic Education
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}?>
	<header role="banner">
		<a class="screen-reader-text skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'academic-education' ); ?></a>
		<?php
		  get_template_part( 'template-parts/header/top', 'bar' );

		  get_template_part( 'template-parts/header/site', 'branding' );

		  get_template_part( 'template-parts/navigation/site', 'nav' );
		?>
	</header>	