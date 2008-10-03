<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
<style type="text/css" media="screen">
@import url( <?php bloginfo('stylesheet_url'); ?> );
</style>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_get_archives('type=monthly&format=link'); ?>
<?php //comments_popup_script(); // off by default ?>
<?php wp_head(); ?>
</head>
<body>
<div id="rap">
<h1 id="header"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
<div id="navcontainer">
<ul id="navlist">
<li<?php if(is_home() ) { echo ' class="page_item current_page_item"';} elseif (is_single()) {echo ' class="page_item current_page_item"';} elseif (is_search()) {echo ' class="page_item current_page_item"';} elseif (is_archive()) {echo ' class="page_item"';} else {
echo ' class="page_item"';} ?>><a href="<?php bloginfo('siteurl'); ?>">Blog</a></li>

<?php wp_list_pages('title_li=&child_of=0&depth=1'); ?>

<li><form id="searchform" method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<input type="text" name="s" id="s" size="15" /><input class="such" type="submit" value="<?php _e('Search'); ?>" />
</form></li>
</ul>

<ul class="sub">
<?php global $wp_query;
echo  ($post->post_parent) 
    ? wp_list_pages('title_li=&child_of='.$post->post_parent.'&depth=1&echo=0') 
    : wp_list_pages('title_li=&child_of='.$post->ID.'&depth=1&echo=0');   ?>
</ul>
</div>

<div id="content">