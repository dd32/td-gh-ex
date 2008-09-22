<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
	<title><?php if(is_404()): ?>Error 404 - Not Found - <?php elseif(is_search()): ?><?php the_search_query() ?> - <?php else: ?><?php wp_title('-',true,'right'); ?><?php endif ?><?php bloginfo('name') ?><?php if(is_search()): ?> Search<?php endif ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" title="Simplish" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> comments RSS Feed" href="<?php bloginfo('comments_rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); // DO NOT REMOVE - for plugin api ?>

</head>

<body>
<div id="container">
	<div id="header">
		<h1><span><a href="<?php echo get_settings('home'); ?>" rel="home"><?php bloginfo('name'); ?></a></span></h1>
		<h2><?php bloginfo('description'); ?></h2>
	</div>
	<div id="page">
<!-- goto ^(archive image index page search single ...).php:/^div#content -->
