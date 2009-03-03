<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="sr-RS">
<head profile="http://gmpg.org/xfn/11">

	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<!--[if IE]><link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/ie.css" media="screen" /><![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/print.css" media="print" />

	<link rel="alternate" type="application/rss+xml" title="<?php printf(__('%s RSS 2.0', '5years'), get_bloginfo('name')); ?>" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php printf(__('%s Atom Feed', '5years'), get_bloginfo('name')); ?>" href="<?php bloginfo('atom_url'); ?>" /> 

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>

</head>
<body>

<!-- Page wrapper -->
<div id="page" class="container_12">

	<!-- start of Header -->
	<div id="header" class="grid_12">
		<div id="search-form">
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		</div>

		<!-- start of Blog title and tagline -->
		<h1><a href="<?php bloginfo("url"); ?>"><?php bloginfo('name'); ?></a></h1>
		<p><?php bloginfo('description'); ?></p>
		<!-- end of Blog title and tagline -->
	</div>
	<!-- end of Header -->

	<!-- start of TopMenu -->
	<div id="topmenu" class="grid_12">
		<ul>
<li <?php if(!is_page()) echo 'class="current_page_item"'; ?>><a href="<?php bloginfo('url'); ?>" title="home"><?php _e("Home", "5years"); ?></a></li>
<?php wp_list_pages('title_li=&depth=1&'); ?>
		</ul>
	</div>
	<!-- end of TopMenu -->
