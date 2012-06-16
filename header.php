<?php
    /**
    * The Header for our theme.
    *
    * Displays all of the <head> section and everything up till <div id="main">
    *
    * @package Artblog
    * @author  Simon Hansen
    * @since Artblog 1.0
    */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php
            /*
            * Print the <title> tag based on what is being viewed.
            */
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
                echo ' | ' . sprintf( __( 'Page %s', 'artblog' ), max( $paged, $page ) );

    ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />

    <?php wp_enqueue_style('artblog-style', get_stylesheet_uri(), false);?>


    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php
        /* We add some JavaScript to pages with the comment form
        * to support sites with threaded comments (when in use).
        */
        if ( is_singular() && get_option( 'thread_comments' ) )
            wp_enqueue_script( 'comment-reply' );

        /* Always have wp_head() just before the closing </head>
        * tag of your theme, or you will break many plugins, which
        * generally use this hook to add elements to <head> such
        * as styles, scripts, and meta tags.
        */
        wp_head();
    ?>
</head>

<body <?php body_class(); ?>>





<div id="wrapper" class="hfeed">

<div id="left-column" >



<?php
    // Check if this is a post or page, if it has a thumbnail, and if it's a big one
    if ( is_singular() && current_theme_supports( 'post-thumbnails' ) &&
    has_post_thumbnail( $post->ID ) &&
    ( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
    $image[1] >= HEADER_IMAGE_WIDTH ) :
        // Houston, we have a new header image!
        echo get_the_post_thumbnail( $post->ID );
        elseif ( get_header_image() ) : ?>

    <img  src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
    <?php endif; ?>





<div id="logo">
<span class="site-name"><a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a></span><br />
<span class="site-description"><?php bloginfo('description'); ?></span>
</div>


<div id="rightMenu">
    <?php    

        wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) );


        echo '    </div>';

        // A second sidebar for widgets, just because.
        if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

        <div id="secondary" class="widget-area" role="complementary">
            <ul class="xoxo">
                <?php dynamic_sidebar( 'secondary-widget-area' ); ?>
            </ul>
        </div><!-- #secondary .widget-area -->

        <?php endif; 


    ?>


 </div>
                

     <div id="main" >  
