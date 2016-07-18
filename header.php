<?php
global $p43d_records_cover_image_src_1440;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>"/>
  <meta name="viewport" content="width=device-width"/>
  <meta property="og:title" content="<?php the_title(); ?>">
  <meta property="og:type" content="article">
  <meta property="og:description" content="<?php echo mb_substr(get_the_excerpt(), 0, 100); ?>">
  <meta property="og:url" content="<?php the_permalink(); ?>">
  <?php if (!empty($p43d_records_cover_image_src_1440[0])) : ?>
    <meta property="og:image" content="<?php echo $p43d_records_cover_image_src_1440[0]; ?>">
  <?php endif; ?>
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
  <link rel="shortcut icon" href="<?php echo esc_url(network_home_url('/')); ?>favicon.ico"/>

  <?php
  wp_head();
  ?>
</head>

<body <?php body_class('p43d_records_show'); ?>>
<div id="page" class="hfeed site">
