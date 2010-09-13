<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title(''); ?><?php if(wp_title(' ', false)) { echo ' | '; } ?><?php bloginfo('name'); ?></title>
<!--[if IE]>
    <script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
<!-- AnIMass WordPress Theme design by Richard Dickinson - http://www.richard-dickinson.com/ -->

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel='stylesheet' href='wp.css' type='text/css' media='all' />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<?php //comments_popup_script(); // off by default ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<div id="container">
<header>
<h1>
    <a href="<?php echo home_url ( '/' ); ?>">
       <?php bloginfo('name'); ?></a>
   </h1>
    <?php bloginfo('description'); ?>
</header>

<nav >
<ul>
<li >
<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>


</li>
</ul>
</nav>
<!--header.php end-->