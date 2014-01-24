<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
<![endif]-->
    <?php
if ( is_singular() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );
wp_head();
?>
</head>

<body <?php body_class(); ?>>

<header id="header">    
<h1><a href="<?php echo esc_url( home_url() ); ?>" title="<?php bloginfo('name'); ?>">
<?php bloginfo('name'); ?></a></h1>
<em><?php bloginfo('description'); ?></em>
</header>

<input type="checkbox" id="isexpanded" />
<label for="isexpanded" id="expand-btn" title="Navigation">Menu</label>
<nav class="expandable">
<?php wp_nav_menu( array( 'container' => 'false', ) ); ?>
</nav>

<section id="wrapper">
 






<section id="content">