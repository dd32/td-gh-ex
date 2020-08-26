<!DOCTYPE html>

<html id="goup" class="no-js" <?php language_attributes();?>>

<head>

    <meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>" charset="<?php bloginfo( 'charset' ); ?>" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>

</head>



<body <?php body_class(); ?>>

    

    <?php

        if ( function_exists( 'wp_body_open' ) ) {

            wp_body_open();

        }

        ?>



        <a class="skip-link" href="#site-content"><?php _e( 'Skip to the content', 'baena' ); ?></a>



    <header>

            <section class="esection grid">    

                <div class="father-col clearfix">

                    <div class="col-30">

                        <div class="site-branding-text">

                            <?php the_custom_logo(); ?>

                            <h1 class="site-title"><?php bloginfo('name'); ?></h1>

                            <h2 class="site-description"><?php bloginfo('description'); ?></h2>

                            <!--<?php the_widget( 'WP_Widget_Search' ); /* search WP */ ?>-->

                            <?php get_search_form(); ?>

                        </div>

                    </div><!--col-30-->

                    <div class="col-70">

                        <div class="site-branding-text">

                            <?php if ( is_front_page() ) : ?>

                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

                            <?php else : ?>

                                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>

                                </p>

                            <?php endif; ?>

                        </div><!-- .site-branding-text -->



                        <nav class="main-menu">

                            <?php wp_nav_menu( array( 'theme_location' => 'menuabove') ); ?>

                        </nav><!--.main-menu-->



                        <!--NEW MENU-->

                        <nav class="new-menu">

                             <div id="min">

                              <button class="openbtn" onclick="baenaopenNav()">&#9776;</button>

                            </div>



                            <div id="mySidebar" class="sidebar">

                              <a href="javascript:void(0)" class="closebtn" onclick="baenacloseNav()">&times;</a>

                              <?php wp_nav_menu( array( 'theme_location' => 'menuabove') ); ?>

                            </div>

                        </nav>

                        <!--END NEW MENU-->

                    </div><!--col-70-->

                </div><!--.father-col clearfix-->

            </section>

    </header>

    

        <div class="grid">

            <div class="main" id="site-content">

