<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
       <meta charset="<?php bloginfo( 'charset' ); ?>" />

        <!-- Mobile Specific Data -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="ct-header container ct-transparent-header">
        <div class="row vertical-center">
            <div class="three columns">
                <?php
                    if ( has_custom_logo() ) {
                        if ( function_exists( 'the_custom_logo' ) ) {
                            the_custom_logo();
                        }
                    } else {
                ?>
                    <h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
                    <?php if ( get_theme_mod( 'apex_business_site_description_switch_setting' ) ) : ?>
                        <p class="ct-tagline"><?php bloginfo( 'description' ) ?></p>
                    <?php endif; ?>
                <?php
                    }
                ?>

            </div><!-- /.three columns -->
            <div class="nine columns">
                <?php
                    if ( has_nav_menu( 'header_menu' ) ) :

                        wp_nav_menu( array(
                            'theme_location'    => 'header_menu',
                            'container'         => 'nav',
                            'container_class'   => 'menu-all-pages-container',
                            'menu_class'        => 'main-nav',
                            'fallback_cb'       => 'wp_page_menu',
                        ) );

                    endif;
                ?>
                <!-- Mobile Menu Icon -->
                <i class="fa fa-bars menubar-right"></i>
            </div><!-- /.nine columns -->
        </div><!-- /.row -->
    </header><!-- /.ct-header -->

    <div class="container mobile-menu-container">
        <div class="row">
            <div class="mobile-navigation">
                    <nav class="nav-parent">
                        <i class="fa fa-close menubar-close"></i>
                        <?php
                            if ( has_nav_menu( 'mobile_menu' ) ) :
                                wp_nav_menu( array(
                                    'theme_location'    => 'mobile_menu',
                                    'container'         => false,
                                    'menu_class'        => 'mobile-nav',
                                    'fallback_cb'       => 'wp_page_menu',
                                    'depth'             => '4',
                                    'walker'            => new Apex_Business_Dropdown_Toggle_Walker_Nav_Menu()
                                ) );
                            else :
                                wp_nav_menu( array(
                                    'theme_location'    => 'header_menu',
                                    'container'         => false,
                                    'menu_class'        => 'mobile-nav',
                                    'fallback_cb'       => 'wp_page_menu',
                                    'depth'             => '4',
                                    'walker'            => new Apex_Business_Dropdown_Toggle_Walker_Nav_Menu()
                                ) );
                            endif;
                        ?>
                    </nav>
                </div> <!-- /.mobile-navigation -->
        </div><!-- /.row -->
    </div><!-- /.container -->

    <div class="ct-divider"></div><!-- /.ct-divider -->
    <div class="ct-content">
