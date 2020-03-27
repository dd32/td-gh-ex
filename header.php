<!DOCTYPE html>
<html id="subir" class="no-js" <?php language_attributes();?>>
<head>
    <meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>" charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
            <section class="ejemplo-section grid">    
                <div class="padre-col clearfix">
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

                        <nav class="menu-principal">
                            <?php wp_nav_menu( array( 'theme_location' => 'menut') ); ?>
                        </nav><!--.menu-principal-->

                        <!--EXAMPLE DROP-DOWN MENU-->
                        <nav class="menu-desplegable">
                            <label for="menu-toggle" id="open-hide" class="open-hide">
                                <div></div>
                                <div></div>
                                <div></div>
                            </label>
                            <input type="checkbox" id="menu-toggle"/>
                            <div class="contenido-submenu">
                                <?php wp_nav_menu( array( 'theme_location' => 'menut') ); ?>
                            </div>
                        </nav><!--.menu-desplegable-->
                        <!--END EXAMPLE MENU DROP-DOWN-->

                        <!--EXAMPLE MENU BUTTON-->
                        <nav id="main-nav" class="main-nav">
                            <ul class="mena">
                                <?php wp_nav_menu( array( 'theme_location' => 'menut') ); ?>
                            </ul>
                            <div class="mena-bar">
                                <div class="uno"></div>
                                <div class="dos"></div>
                                <div class="tres"></div>
                            </div><!--.menubar-->
                        </nav>
                        <!--END EXAMPLE MENU BUTTON-->
                    </div><!--col-70-->
                </div><!--.padre-col clearfix-->
            </section>
    </header>
    
        <div class="grid">
            <div class="main">
