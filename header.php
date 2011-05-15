<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?></title>
<style type="text/css" media="screen">
@import url( <?php bloginfo('stylesheet_url'); ?> );
</style>
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
<?php wp_get_archives('type=monthly&format=link'); ?>
<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	wp_head();
?>
</head>
<body <?php body_class(); ?>>
<header><h1 id="header"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
<em><?php bloginfo('description'); ?></em>
</header> 
<nav><?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '') ); ?></nav>