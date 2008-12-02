<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

 <title><?php if ( is_home() ) { bloginfo('name'); } else wp_title('',true); ?></title> 

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
 
<meta name="robots" content="index,follow" />

<?php wp_head(); ?>

</head>

<body>
 

<div id="page">

<div id="header">

 
		
<?php if (is_home()) { ?><h1><?php } ?>
<a class="blogtitle" href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a><?php if (is_home()) { ?></h1><?php } ?><div class="description"><?php bloginfo('description'); ?></div>
 
	</div>

<div id="navbar">
<a href="<?php echo get_option('home'); ?>/">Home</a>

&nbsp; 
&nbsp;

<a   href="<?php bloginfo('rss2_url'); ?>" rel="alternate" type="application/rss+xml"><img src="http://www.feedburner.com/fb/images/pub/feed-icon16x16.png" alt="XML, RSS"  style="vertical-align:middle;border:0;" /> RSS</a>

&nbsp;
&nbsp;

<a  href="<?php bloginfo('comments_rss2_url'); ?>" rel="alternate" type="application/rss+xml" ><img src="http://www.feedburner.com/fb/images/pub/feed-icon16x16.png" alt="XML, RSS" style="vertical-align:middle;border:0;" /> Comments</a>
 

</div>