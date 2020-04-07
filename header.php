<?php
/**
 * The template for displaying the header
 *
 * @package Fmi
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="profile" href="https://gmpg.org/xfn/11" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'vs_site_before' ); ?>

<div class="vs-container-site">
<div id="page" class="site">
  <div class="site-inner">

    <header id="masthead" class="site-header">
      <?php
      get_template_part( 'template-parts/header' );
      ?>
    </header>

    <div class="site-primary">
