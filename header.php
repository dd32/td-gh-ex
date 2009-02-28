<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if IE 6]>
<link href="<?php bloginfo('template_url'); ?>/ie6.css" media="screen" rel="stylesheet" type="text/css" />
<![endif]-->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
</head>
<body>
<div id="top-strip"></div>
<div id="wrapper">
<div id="container">
<div id="header">

	<div class="blog-title"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></div>
            <div class="blog-description"><?php bloginfo('description'); ?></div>
</div>
<div id="search-header">
    <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
      <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="txtField" />
      <input type="submit" id="searchsubmit" class="btnSearch" value="Search &raquo;" />
    </form>
  </div>
<ul id="menubar">
	<li><a href="<?php bloginfo('url'); ?>">Home</a></li>
	<?php wp_list_pages('title_li=&depth=-1&sort_column=ID'); ?>
	<li><a href="<?php bloginfo('rss2_url'); ?>" class="rss">RSS</a></li>
</ul>

<div class="clear"></div>
