<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
    <!--<![endif]-->    
    <head>
        <!-- Required meta tags -->
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>">
        <!-- Template Title -->
        <title><?php wp_title('|', true, 'right'); ?></title>
        <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
        <![endif]-->
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <!-- Nav Sidebar
        ================================================== -->
        <aside id="topSidebar">
            <div class="sidebar">

                <button class="icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <!-- Logo -->
                <?php
                if (aari_custom_logo_dark() != false) {
                    echo aari_custom_logo_dark();
                } else {
                    echo aari_text_logo_display();
                }
                ?>
                <!-- End Logo -->

                <!-- Navbar -->
                <nav class="navbar">
                    <div class="navbar-collapse">
                    </div>
                </nav>
                <!-- End Navbar -->

            </div>
        </aside>
        <!-- End Nav Sidebar
        ================================================== -->


        <!-- Main Content
        ================================================== -->
        <main id="mainContent">
            <div class="sidebar-overlay"></div>

            <!-- Nav Bar
            ================================================== -->
            <div class="header-controller text-center <?php echo (is_front_page() && is_home()) ? '' : 'header-overlay'; ?>">
                <div class="container">
                    <nav id="nav" class="navbar navbar-expand-lg <?php echo (is_front_page() && is_home()) ? 'nav-overlay' : ''; ?>">

                        <?php
                        if (aari_custom_logo_dark() != false) {
                            echo aari_custom_logo_dark();
                        } else {
                            echo aari_text_logo_display();
                        }
                        ?>


                        <div class="collapse navbar-collapse">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'menu_id' => 'primary-menu',
                                'depth' => 5,
                                'container' => 'ul',
                                'container_class' => 'collapse navbar-collapse',
                                'container_id' => 'bs-example-navbar-collapse-1',
                                'menu_class' => 'nav-menu navbar-nav ml-auto',
                                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                'walker' => new WP_Bootstrap_Navwalker(),
                            ));
                            ?>
                        </div>


                        <div class="search_trigger">

                            <?php
                            echo (get_theme_mod('aari_search')) ? '' : '<a class="nav-search search-trigger" href="#"><span class="jam jam-search"></span></a>';
                            ?>

                            <button class="icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>

                    </nav>

                </div>
            </div>

            <!-- search form -->
            <?php
            (get_theme_mod('aari_search')) ? '' : aari_search_form();
            ?> 
            <!-- search form -->

            <!-- End Nav Bar
            ================================================== -->
