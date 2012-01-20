<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>   <html class="ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />

<title>
    <?php
	
	//Print the <title> tag based on what is being viewed.

	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );


	// Add the blog description for the home/front page.

	$site_description = get_bloginfo( 'description', 'display' );

	if ( $site_description && ( is_home() || is_front_page() ) )

		echo " | $site_description";


	// Add a page number if necessary:

	if ( $paged >= 2 || $page >= 2 )

		echo ' | ' . sprintf( __( 'Page %s', 'azurebasic' ), max( $paged, $page ) );

	?>
</title>


<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php /* IE7 specific styles */ ?>
<!--[if IE 7]>
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/ie7.css" type="text/css" media="screen" />
<![endif]-->

<?php wp_enqueue_script("jquery"); /* Loads jQuery if it hasn't been loaded already */ ?>

<?php /* The HTML5 Shim is required for older browsers, mainly older versions IE */ ?>
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php

	// Add some JavaScript to pages with the comment form to support sites with threaded comments (when in use).

	if ( is_singular() && get_option( 'thread_comments' ) )

		wp_enqueue_script( 'comment-reply' );

?>

<?php wp_head(); ?> <?php /* this is used by many Wordpress features and for plugins to work proporly */ ?>

</head>

<body <?php body_class(); ?>>

<div id="wrap" class="clearfix"><!-- this encompasses the entire Web site except the footer and copyright -->

<div class="container" id="container-full">

  <header class="clearfix" id="top-header">
  
     <nav id="access" role="navigation" class="clearfix">
				
				<?php /* The navigation menu.  If it isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>

		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

	</nav><!-- #access -->
    
    <div id="top-header-section" class="clearfix">
    
     <hgroup id="main-title" class="clearfix">
    
       <?php if( is_front_page() || is_home() || is_404() ) { ?>
	   <h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
	   <h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
       <?php } else { ?>
       <h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
       <h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
	   <?php } ?>              
       
	 </hgroup>
     
     <div id="header-sidebar-section" class="clearfix">
       <?php if ( ! dynamic_sidebar( 'Header' ) ) : ?><!-- Wigitized Header --><?php endif ?>
    </div><!-- #header-sidebar-section -->
    
    </div><!--top-header-section-->
    
    <div class="clear"></div><!-- .clear the floats -->
        
    <?php
		// The header image

		// Check if this is a post or page, if it has a thumbnail, and if it's a big one

					if ( is_singular() &&

							has_post_thumbnail( $post->ID ) &&

							( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( HEADER_IMAGE_WIDTH, HEADER_IMAGE_WIDTH ) ) ) &&

							$image[1] >= HEADER_IMAGE_WIDTH ) :

						// Houston, we have a new header image!

						echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );

	else : ?>
            
    <div id="header-image" class="clearfix">
		<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="<?php bloginfo('name'); ?>" />
	</div><!--#header-image-->
    
    <?php endif; // end check for removed header image ?>

  </header>
  
  
  <div class="clear"></div><!-- .clear the floats -->
  
  
  <div id="main" class="clearfix">