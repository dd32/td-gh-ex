<?php
/*
 * Header For a1 Theme.
 */
global $a1_options;
?><!DOCTYPE html>
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
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width">
        <title><?php wp_title('|', true, 'right'); ?></title>
        <?php if (!empty($a1_options['favicon'])) { ?>
            <link rel="shortcut icon" href="<?php echo esc_url($a1_options['favicon']); ?>">
        <?php } ?>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
        <![endif]-->
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header style="<?php if (!empty($a1_options['fixed-top-menu'])){ ?>position:fixed; <?php } ?>">
            <?php if (empty($a1_options['remove-top-header'])): ?>
                <div class="col-md-12 top-header no-padding-lr">
                    <div class="container a1-container">
                        <div class="col-md-6 col-sm-6 location-part  no-padding-lr">
                            <?php if (!empty($a1_options['phone'])): ?>
                                <p><i class="fa fa-phone"></i><?php echo esc_attr($a1_options['phone']); ?></p>
                            <?php endif;
                                if (!empty($a1_options['email'])): ?>
                                <p class="top-header-email"><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo esc_attr($a1_options['email']); ?>"><?php echo esc_attr($a1_options['email']); ?></a></p>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6 col-sm-6 social-part no-padding-lr">
                            <ul>
                                <?php if (!empty($a1_options['fburl'])): ?><li><a href="<?php echo esc_url($a1_options['fburl']) ?>"><i class="fa fa-facebook"></i></a></li><?php endif; ?>
                                <?php if (!empty($a1_options['twitter'])): ?><li><a href="<?php echo esc_url($a1_options['twitter']) ?>"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
                                <?php if (!empty($a1_options['pinterest'])): ?><li><a href="<?php echo esc_url($a1_options['pinterest']) ?>"><i class="fa fa-pinterest-square"></i></a></li><?php endif; ?>
                                <?php if (!empty($a1_options['googleplus'])): ?><li><a href="<?php echo esc_url($a1_options['googleplus']) ?>"><i class="fa fa-google-plus"></i></a></li><?php endif; ?>
                            </ul>                            
                        </div>
                        
                    </div>
                </div>
            <?php endif;?>
            <div class="col-md-12 bottom-header no-padding-lr">
                <div class="container a1-container">
                    <div class="col-md-2 no-padding-lr header-logo"> <a href="<?php echo esc_url(home_url()); ?>">
                            <?php if (!empty($a1_options['logo'])): ?>
                                <img src="<?php echo esc_url($a1_options['logo']); ?>" alt="<?php echo get_bloginfo('name'); ?>">
                            <?php else: ?>
                                <?php echo get_bloginfo('name'); ?>        
                            <?php endif; ?>        
                        </a></div>
                    <div class="col-md-10 no-padding-lr">
                        <nav class="a1-nav">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle navbar-toggle-top sort-menu-icon collapsed" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only"><?php _e('Toggle navigation', 'a1'); ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                            </div>
                            <div class="navbar-collapse collapse no-padding-lr">           
                                <?php $a1_defaults = array(
                                    'theme_location' => 'primary',
                                    'container' => 'div',
                                    'container_class' => '',
                                    'container_id' => '',
                                    'menu_class' => '',
                                    'menu_id' => '',
                                    'echo' => true,
                                    'fallback_cb' => 'wp_page_menu',
                                    'before' => '',
                                    'after' => '',
                                    'link_before' => '',
                                    'link_after' => '',
                                    'items_wrap' => '<ul class="a1-menu">%3$s</ul>',
                                    'depth' => 0,
                                    'walker' => '' );
                                    wp_nav_menu($a1_defaults); ?>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!--header part end-->