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
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'academic-education' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header role="banner">
	<a class="screen-reader-text skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'academic-education' ); ?></a>
	<?php
	  get_template_part( 'template-parts/header/top', 'bar' );

	  get_template_part( 'template-parts/header/site', 'branding' );

	  get_template_part( 'template-parts/navigation/site', 'nav' );
	?>
</header>	