<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

 <title><?php if ( is_home() ) { bloginfo('name'); } else wp_title('',true); ?></title> 

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
 
<meta name="robots" content="index,follow" />
 
<link href='http://fonts.googleapis.com/css?family=PT+Serif+Caption' rel='stylesheet' type='text/css'>

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

<a   href="<?php bloginfo('rss2_url'); ?>" rel="alternate" type="application/rss+xml"><img src="<?php echo get_template_directory_uri(); ?>/images/rss16.png" title="RSS" alt="RSS" height="16" width="16" style="vertical-align:middle;border:0;padding-right:5px;" />RSS</a>

&nbsp;
&nbsp;
 

</div>