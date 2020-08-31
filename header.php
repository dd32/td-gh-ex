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

                    <div class="header-titles-wrapper">
                        <button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
                            <span class="toggle-inner">
                                <span class="toggle-text"><?php _e( '&#9776;', 'baena' ); ?></span>
                            </span>
                        </button><!-- .nav-toggle -->
                    </div><!-- .header-titles-wrapper -->

                    <div class="header-navigation-wrapper"> 
                        <?php
                        if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) {
                            ?>     
                            <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e( 'Horizontal', 'baena' ); ?>" role="navigation">
                                <ul class="primary-menu reset-list-style">   
                                        <?php
                                        if ( has_nav_menu( 'primary' ) ) {

                                            wp_nav_menu(
                                                array(
                                                    'container'  => '',
                                                    'items_wrap' => '%3$s',
                                                    'theme_location' => 'primary',
                                                )
                                            );

                                        } elseif ( ! has_nav_menu( 'expanded' ) ) {

                                            wp_list_pages(
                                                array(
                                                    'match_menu_classes' => true,
                                                    'show_sub_menu_icons' => true,
                                                    'title_li' => false,
                                                    'walker'   => new baena_Walker_Page(),
                                                )
                                            );

                                        }
                                        ?>
                                    </ul>
                            </nav><!-- .primary-menu-wrapper -->
                                <?php
                            }
                            ?>
                    </div><!-- .header-navigation-wrapper -->            

            </div><!--col-70-->

        </div><!--.father-col clearfix-->

    </section>

</header>

<?php

        // Output the menu modal.

get_template_part( 'parts/modal-menu' );

?>

<div class="grid">

    <div class="main" id="site-content">

