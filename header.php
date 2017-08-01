<?php
/**
 * The header of our theme
 * @package Bar Restaurant
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
    </head>
<body <?php body_class();?>>
    <div class="preloader"><span style="" class="preloader-gif"></span></div>
    <header class="header">
        <!-- Header with Brand -->
        <nav class="navbar-fixed-top fixed-header1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 top-menu">
                        <div class="logo-description">
                            <div class="header-logo">
                                <?php if( has_custom_logo() ) { the_custom_logo(); } ?>
                            </div>
                            <div class="header-text">
                                <?php echo '<a href='.esc_url( home_url( '/' ) ).' title='.esc_attr( get_bloginfo( 'name', 'display' ) ).' rel="home"><h3 class="site-title logo-box">'.get_bloginfo('name').'</h3><span class="site-description">'.get_bloginfo('description').'</span></a>'; ?>
                            </div>
                        </div>
                        <div id="cssmenu">
                          <?php $defaults = array(
                                'theme_location' => 'primary',
                                'container'      => 'ul', 
                            );
                            wp_nav_menu($defaults); ?> 
                        </div>   
                    </div>
                </div>
            </div>
        </nav>
    </header>