<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php if (function_exists('seo_title_tag')) { seo_title_tag(); } else { bloginfo('name'); wp_title();} ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
</head>

<body>

<div id="wrapper">

	<div id="header">
		<div id="top">
			<ul>
				<li<?php if(is_home()) echo ' class="current_page_item"' ?>><a href="<?php bloginfo('url'); ?>/">Home</a></li>
				<?php wp_list_pages('title_li=&depth=1&include='); ?>
			</ul>
			<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
				<input type="text" name="s" id="s" value="Search Keywords" onfocus="document.forms['searchform'].s.value='';" onblur="if (document.forms['searchform'].s.value == '') document.forms['searchform'].s.value='Search Keywords';" />
				<input type="submit" id="searchsubmit" value="Search" />
			</form>
		</div>
		<h1 id="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a> <span><?php bloginfo('description'); ?></span></h1>
		<ul id="menu">
			<li<?php if(is_home()) echo ' class="current_page_item"' ?>><a href="<?php bloginfo('url'); ?>/">Home</a></li>
			<?php wp_list_pages('title_li=&depth=1&include='); ?>
		</ul>
	</div><!-- end #header -->

	<div id="container">
		<div id="content">