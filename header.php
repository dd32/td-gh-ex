<!DOCTYPE html>
<html <?php language_attributes(); ?>  itemscope itemtype="http://schema.org/WebPage">
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	wp_head();
?>
<script> (function(l){var i,s={touchend:function(){}};for(i in s)l.addEventListener(i,s)})(document); // sticky hover fix in iOS </script>
</head>

<body <?php body_class(); ?>>
 <?php wp_body_open(); ?>
<?php if ( wp_is_mobile() ) : ?>
<div id="mobile-background"></div>
<?php endif; ?>


<header id="header"> 
 
<h1 class="site-title"><?php
if ( function_exists( 'the_custom_logo' ) ) {
    the_custom_logo();
}
?>  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>">
<?php bloginfo('name'); ?></a><em><?php bloginfo('description'); ?></em></h1>


<?php if ( has_header_image() ) { ?>
<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" id="headerpic" />
<?php } ?>

</header>

<div id="wrapper">

<input type="checkbox" id="hamburger" />
<label for="hamburger" id="expand-btn" title="Navigation"></label>

<div id="navbox">

<?php if ( has_nav_menu( 'primary' ) ) : ?>
<nav>
<?php wp_nav_menu( array ('theme_location' => 'primary','container' => ''));?>
</nav>
<?php endif; ?>

</div>

<div id="content">
