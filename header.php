<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
 
<style type="text/css" media="screen">
@import url( <?php bloginfo('stylesheet_url'); ?> ); 
</style>     

<?php
wp_enqueue_script('jquery');
?>

<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	wp_head();
?>    

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/hoverIntent.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/superfish.js"></script>

<script type="text/javascript">
jQuery(function(){
	jQuery('div.menu ul').superfish();
	jQuery('nav ul.menu').superfish();
});
</script>
   
<!--[if lt IE 9]>
<script type="text/javascript">
document.createElement("header");
document.createElement("nav");
document.createElement("section");
document.createElement("aside");
document.createElement("article");
document.createElement("footer");
</script>
<![endif]-->
                             
</head>

<body <?php body_class(); ?>>
<header><h1 id="header"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
<em><?php bloginfo('description'); ?></em>
</header>
<nav><?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '') ); ?></nav>