<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
<?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	?>
	</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php
if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); 
wp_head();
?>
<style type="text/css">
#header, #footer {
background: url(<?php header_image();?>);
}
#site-title a {
color:#<?php HEADER_TEXTCOLOR();?>
}
#site-description {
color:#<?php HEADER_TEXTCOLOR();?>
}
</style>
</head>
<body <?php body_class();?>>
<div id="wrapper">
	<div id="header">
		<h1 id="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
<?php
//Add the Slider
get_template_part('slider');
 ?>
	</div><!-- #header -->
	<div id="main">
			<div id="menu">
			<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
			<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'star' ); ?>"><?php _e( 'Skip to content', 'star' ); ?></a></div>
			<?php 
			/* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  
			/* The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ 
			   global $wp_query; 
				$backup = $wp_query; 
				wp_reset_query(); 
				$newQuery = new WP_Query(array('post_type' => 'post')); 
				wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) );
				$wp_query = $backup; 
			?>
		</div><!-- #menu -->