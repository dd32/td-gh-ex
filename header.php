<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	wp_head();
?>

</head>

<body <?php body_class(); ?>>

<header id="header">    
<h1><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
<?php bloginfo('name'); ?></a></h1>
<em><?php bloginfo('description'); ?></em>
<?php
// Check to see if the header image has been removed
$header_image = get_header_image();
if ( ! empty( $header_image ) ) :
?>
<img src="<?php header_image(); ?>" id="headerpic" class="animated fadeIn duration3" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="Header" />
<?php endif; // end check for removed header image ?>
</header>

<input type="checkbox" id="isexpanded" />
<label for="isexpanded" id="expand-btn" title="Navigation"></label>
<div id="navbox">
<nav class="expandable">
<?php wp_nav_menu( array( ) ); ?>
</nav>
</div>

<div id="wrapper">
 
<div id="content">
