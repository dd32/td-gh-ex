<?php
global $p43d_records_cover_image_src_1440;
$CSSTIME = filemtime(get_template_directory() . '/style.min.css');

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
    <meta property="og:image" content="<?php echo $p43d_records_cover_image_src_1440[0]; ?>"><?php endif; ?>
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>">

  <link rel="stylesheet" type='text/css'
        href="<?php echo esc_url(get_template_directory_uri()); ?>/css/normalize.min.css"/>
  <link rel="stylesheet" type='text/css'
        href="<?php echo esc_url(get_template_directory_uri()); ?>/style.min.css?<?php echo $CSSTIME; ?>"/>

  <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/jquery-1.11.3.min.js"></script>
  <link rel="shortcut icon" href="<?php echo esc_url(network_home_url('/')); ?>favicon.ico"/>

  <?php
  wp_head();
  ?>
</head>

<body <?php body_class('p43d_records_show'); ?>>
<div id="page" class="hfeed site">
