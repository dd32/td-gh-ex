<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(); ?></title> 
<?php load_theme_textdomain( 'quickpic', get_template_directory() . '/languages' ); ?>  
<link rel="stylesheet" href="<?php echo get_stylesheet_uri() ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
 
<div id="page">
<div id="header">
		
<?php if (is_home()) { ?><h1><?php } ?>
<a class="blogtitle" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a><?php if (is_home()) { ?></h1><?php } ?><div class="description"><?php bloginfo('description'); ?></div>
  
	</div>

<div id="navbar">
<a href="<?php echo home_url(); ?>">Home</a>
&nbsp; 
&nbsp;
<!-- RSS Links --> 
<a   href="<?php bloginfo('rss2_url'); ?>" rel="alternate" type="application/rss+xml"><img src="<?php echo get_template_directory_uri(); ?>/images/rss16.png" title="RSS" alt="RSS" class="rssicon"  />RSS</a>
&nbsp;
&nbsp;
 </div>