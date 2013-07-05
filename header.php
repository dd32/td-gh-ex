<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title(); ?></title> 

<?php load_theme_textdomain( 'quickpress', get_template_directory() . '/languages' ); ?>  

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
<!-- Search --> 
<?php get_search_form(); ?>
 </td>
</tr></table>
	</div>

<div id="menu-header">
  <!-- Widgetized Nav -->  
 <?php if ( is_active_sidebar( 'nav-menu' ) ) : ?>
 <?php dynamic_sidebar( 'nav-menu' ); ?>
<?php endif; ?> 
</div>
 