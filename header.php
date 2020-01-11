<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?>><!--<![endif]-->
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <?php wp_head(); ?>
</head>
<body <?php if (get_theme_mod('box_layout', '1') == '2') {
    body_class('boxed');
} else body_class(); ?>>
<div>
    <!-- Header Section -->
    <div class="header_section hd_cover" <?php if (has_header_image()) { ?> style='background-image: url("<?php header_image(); ?>")' <?php } ?> >
        <div class="container">
            <!-- Logo & Contact Info -->
            <div class="row ">
                <?php if (get_theme_mod('title_position') == 1) { ?>
                    <div class="col-md-6 col-sm-12 wl_rtl">
                        <div claSS="logo logocenter">
                            <a href="<?php echo esc_url(home_url('/')); ?>"
                               title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                                <?php
                                $custom_logo_id = get_theme_mod('custom_logo');
                                $image = wp_get_attachment_image_src($custom_logo_id, 'full');

                                if (has_custom_logo()) { ?>
                                    <img src="<?php echo esc_attr($image[0]); ?>"
                                         height="<?php echo esc_attr(get_theme_mod('logo_height', '55')); ?>"
                                         width="<?php echo esc_attr(get_theme_mod('logo_height', '150')) ?>">
                                <?php } else {
                                    if (display_header_text() == true) {
                                        ?>
                                        <h1><?php echo esc_html(get_bloginfo('name')); ?></h1>
                                    <?php }
                                } ?>
                            </a>
                            <?php if (display_header_text() == true) { ?>
                                <p><?php esc_html(bloginfo('description')); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-md-6 col-sm-12 wl_rtl">
                        <div claSS="logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>"
                               title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                                <?php
                                $custom_logo_id = get_theme_mod('custom_logo');
                                $image = wp_get_attachment_image_src($custom_logo_id, 'full');

                                if (has_custom_logo()) { ?>
                                    <img src="<?php echo esc_attr($image[0]); ?>"
                                         height="<?php echo esc_attr(get_theme_mod('logo_height', '55')) ?>"
                                         width="<?php echo esc_attr(get_theme_mod('logo_height', '150')) ?>">
                                <?php } else {
                                    if (display_header_text() == true) {
                                        ?>
                                        <h1><?php echo esc_html(get_bloginfo('name')); ?></h1>
                                    <?php }
                                } ?>
                            </a>
                            <?php if (display_header_text() == true) { ?>
                                <p><?php esc_html(bloginfo('description')); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                <?php }
                if (!empty (get_theme_mod('email_id', 'example@mymail.com')) || !empty (get_theme_mod('phone_no', '0159753586'))) { ?>
                <div class="col-md-6 col-sm-12">
                    <ul class="head-contact-info">
                        <?php if (!empty (get_theme_mod('email_id', 'example@mymail.com'))) { ?>
                            <li><i class="fa fa-envelope"></i><a
                                    href="mailto:<?php echo esc_url(get_theme_mod('email_id', 'example@mymail.com')); ?>"><?php echo esc_attr(get_theme_mod('email_id', 'example@mymail.com')); ?></a>
                            </li><?php } ?>
                        <?php if (!empty (get_theme_mod('phone_no', '0159753586'))) { ?>
                            <li><i class="fa fa-phone"></i><a
                                    href="tel:<?php echo esc_url(get_theme_mod('phone_no', '0159753586')); ?>"><?php echo esc_attr(get_theme_mod('phone_no', '0159753586')); ?></a>
                            </li><?php } ?>
                    </ul>
                    <?php }
                    if (get_theme_mod('header_social_media_in_enabled', 1) == 1) { ?>
                    <ul class="social">
                        <?php if (!empty (get_theme_mod('fb_link', '#'))) { ?>
                            <li class="facebook" data-toggle="tooltip" data-placement="bottom" title="Facebook"><a
                                        href="<?php echo esc_url(get_theme_mod('fb_link', '#')); ?>"><i
                                            class="fab fa-facebook-f"></i></a></li>
                        <?php }
                        if (!empty (get_theme_mod('twitter_link', '#'))) { ?>
                            <li class="twitter" data-toggle="tooltip" data-placement="bottom" title="Twitter"><a
                                        href="<?php echo esc_url(get_theme_mod('twitter_link', '#')); ?>"><i
                                            class="fab fa-twitter"></i></a></li>
                        <?php }
                        if (!empty (get_theme_mod('linkedin_link', '#'))) { ?>
                            <li class="linkedin" data-toggle="tooltip" data-placement="bottom" title="Linkedin"><a
                                        href="<?php echo esc_url(get_theme_mod('linkedin_link', '#')); ?>"><i
                                            class="fab fa-linkedin-in"></i></a></li>
                        <?php }
                        if (!empty (get_theme_mod('youtube_link', '#'))) { ?>
                            <li class="youtube" data-toggle="tooltip" data-placement="bottom" title="Youtube"><a
                                        href="<?php echo esc_url(get_theme_mod('youtube_link', '#')); ?>"><i
                                            class="fab fa-youtube"></i></a></li>
                        <?php }
                        if (!empty (get_theme_mod('instagram', '#'))) { ?>
                            <li class="facebook" data-toggle="tooltip" data-placement="bottom" title="instagram"><a
                                        href="<?php echo esc_url(get_theme_mod('instagram', '#')); ?>"><i
                                            class="fab fa-instagram"></i></a></li>
                        <?php }
                        if (!empty (get_theme_mod('vk_link', '#'))) { ?>
                            <li class="facebook" data-toggle="tooltip" data-placement="bottom" title="vk"><a
                                        href="<?php echo esc_url(get_theme_mod('vk_link', '#')); ?>"><i
                                            class="fab fa-vk"></i></a></li>
                        <?php }
                        if (!empty (get_theme_mod('qq_link', '#'))) { ?>
                            <li class="facebook" data-toggle="tooltip" data-placement="bottom" title="qq"><a
                                        href="<?php echo esc_url(get_theme_mod('qq_link', '#')); ?>"><i
                                            class="fab fa-qq"></i></a></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
            </div>
            <!-- /Logo & Contact Info -->
        </div>
    </div>
    <!-- /Header Section -->
    <!-- Navigation  menus -->
    <div class="navigation_menu" data-spy="affix" data-offset-top="95" id="enigma_nav_top">
        <span id="header_shadow"></span>
        <div class="container navbar-container">
            <nav class="navbar navbar-default " role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu"
                            aria-controls="#menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only"><?php esc_html_e('Toggle navigation', 'enigma'); ?></span>
                        <span class="fas fa-bars"></span>
                    </button>
                </div>
                <div id="menu" class="collapse navbar-collapse ">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'menu_class' => 'nav navbar-nav',
                            'fallback_cb' => 'weblizar_fallback_page_menu',
                            'walker' => new weblizar_nav_walker(),
                        )
                    );
                    ?>
                </div>
            </nav>
        </div>
    </div>