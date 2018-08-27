<?php
/**
 * The header for our theme
 *
 * @package WordPress
 * @subpackage adventure_travelling
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'adventure-travelling' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
  get_template_part( 'template-parts/header/top', 'bar' );

  get_template_part( 'template-parts/header/site', 'branding' );

  get_template_part( 'template-parts/navigation/site', 'nav' );
?>