<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
 
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/img/favicon.ico" />
 
<?php
    if ( is_singular() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );
 
    wp_head();
     
    wp_get_archives('type=monthly&format=link');?>

<!--SMARTPHONES-->
<meta name="viewport" content="width=device-width" />

</head>


<body <?php body_class(); ?>>

<div id="wrapper">
    <div id="header">

<div id="top-menu" class="nav">
	<?php wp_nav_menu( array( 'theme_location' => 'top-menu', 'container_class' => 'top-nav' ) ); ?>
	</div>

<a href="<?php echo home_url(); ?>">

<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />

</a>

<div id="primary-menu" class="nav">
<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container_class' => 'prim-nav' ) ); ?>
    </div>
    	</div>