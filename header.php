<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('|', true, right); ?></title> 

<link rel="stylesheet" href="<?php echo get_stylesheet_uri() ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?> 

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

 </td>
</tr></table>
	 
	</div>

<div id="adsbar">
<a href="<?php echo home_url(); ?>">Home</a>

&nbsp; 
&nbsp;

<a href="<?php bloginfo('rss2_url'); ?>" rel="alternate" type="application/rss+xml"><img src="<?php echo get_template_directory_uri(); ?>/images/rss16.png" title="RSS" alt="RSS" height="16" width="16" class="rssicon" />RSS</a>
</div>