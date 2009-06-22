<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/slide.css" media="screen" />		
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/superfish.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/hoverIntent.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/slider.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/hover.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-ui-personalized-1.5.2.packed.js"></script>





<?php wp_head(); ?>
</head>
<body>

<div id="wrap">
<div id="header"><h1><a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
<p class="description"><?php bloginfo('description'); ?></p>
</div>
<hr/>