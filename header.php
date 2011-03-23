<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

 <title><?php if ( is_home() ) { bloginfo('name'); } else wp_title('',true); ?></title> 

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

 <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
 
<meta name="robots" content="index,follow" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
 
<div id="page">

<div id="header">

<table width="100%" cellpadding="0" cellspacing="0" border="0"><tr>
<td width="60%" valign="top" align="left">
		
<?php if (is_home()) { ?><h1><?php } ?>
<a class="blogtitle" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a><?php if (is_home()) { ?></h1><?php } ?><div class="description"><?php bloginfo('description'); ?></div>
 </td> 

<td width="40%" valign="top" align="right">

<?php get_search_form(); ?>


<a href="<?php bloginfo('rss2_url'); ?>" rel="alternate" type="application/rss+xml"><img src="http://www.feedburner.com/fb/images/pub/feed-icon16x16.png" alt="XML, RSS"  style="vertical-align:middle;border:0;" /> Subscribe RSS Feed</a>



 </td>
</tr></table>
	 
	</div>

<div id="navbar">
<a href="<?php echo home_url(); ?>">Home</a>

&nbsp;
 &nbsp; 
<a href="<?php bloginfo('rss2_url'); ?>" rel="alternate" type="application/rss+xml">RSS</a>

</div>