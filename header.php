<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class();?>>
<header>
    <!-- main-header-start -->
    <div class="header-main">
        <div class="container">
            <!-- Menu -->
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="logoSite">
                       <?php if(has_custom_logo()){   the_custom_logo(); }
                       if(display_header_text()){ ?>
                       <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="brand_text"><h3 class="site-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h4><p><small class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></small></p></a>
                   <?php } ?>
                    </div>
                    <?php if(!get_theme_mod('top_search_area_switch',false)):?>
                        <div class="right-section">
                            <a href="javascript:void(0)" class="openBtn" onclick="openSearch()"><i class="fa <?php echo esc_attr(get_theme_mod('top_search_area_icon','fa-search')); ?>"></i></a>
                        </div>
                         <!-- Search-form -->
                        <div id="searchOverlay" class="search-open">                            
                            <div class="overlay-content">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    <?php endif;?>
                    <!--/////START TOP HEADER////-->
                    <div class="main-menu">
                        <!-- Responsive Menu -->
                        <nav id='cssmenu'>
                            <?php $best_classifieds_defaults = array(
                                'theme_location' => 'primary',
                                'container' => 'ul',
                                'items_wrap' => '<ul class="offside">%3$s</ul>',
                            );
                            wp_nav_menu($best_classifieds_defaults); ?>
                        </nav>
                        <!-- Responsive Menu End -->
                    </div>
                </div>
            </div>
            <!-- Menu End -->
        </div>
    </div>
</header>