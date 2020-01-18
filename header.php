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
    <div class="header_section hd_cover">
        <div class="container">
            <!-- Logo & Contact Info -->
            <div class="row ">
                <?php 
                $title_position = get_theme_mod('title_position');
                if ( $title_position == 1 ) { ?>
                    <div class="col-md-6 col-sm-12 wl_rtl">
                        <div claSS="logo logocenter">
                            <a href="<?php echo esc_url( home_url('/') ); ?>"
                               title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" rel="home">
                                <?php
                                $custom_logo_id = get_theme_mod('custom_logo');
                                $image          = wp_get_attachment_image_src($custom_logo_id, 'full');
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
                $email_id = get_theme_mod('email_id', 'example@mymail.com');
                $phone_no = get_theme_mod('phone_no', '0159753586');
                if (!empty ($email_id) || !empty ($phone_no)) { ?>
                    <div class="col-md-6 col-sm-12">
                        <ul class="head-contact-info">
                            <?php if (!empty ($email_id)) { ?>
                            <li><i class="fa fa-envelope"></i><a
                            href="mailto:<?php echo esc_url( $email_id ); ?>"><?php echo esc_html( $email_id ); ?></a>
                            </li><?php } ?>
                            <?php if (!empty ( $phone_no ) ) { ?>
                            <li><i class="fa fa-phone"></i><a
                            href="tel:<?php echo esc_url( $phone_no ); ?>"><?php echo esc_html( $phone_no ); ?></a>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php }
                        $header_social_media_in_enabled = get_theme_mod('header_social_media_in_enabled', 1);
                        if ($header_social_media_in_enabled == 1) { ?>
                        <ul class="social">
                            <?php 
                            $fb_link = get_theme_mod('fb_link', '#');
                            if (!empty ($fb_link)) { ?>
                            <li class="facebook" data-toggle="tooltip" data-placement="bottom" title="Facebook"><a href="<?php echo esc_url(get_theme_mod('fb_link', '#')); ?>"><i class="fab fa-facebook-f"></i></a></li>
                            <?php }
                            $twitter_link = get_theme_mod('twitter_link', '#');
                            if (!empty ($twitter_link)) { ?>
                            <li class="twitter" data-toggle="tooltip" data-placement="bottom" title="Twitter"><a href="<?php echo esc_url(get_theme_mod('twitter_link', '#')); ?>"><i class="fab fa-twitter"></i></a></li>
                            <?php }
                            $linkedin_link = get_theme_mod('linkedin_link', '#');
                            if (!empty ($linkedin_link)) { ?>
                            <li class="linkedin" data-toggle="tooltip" data-placement="bottom" title="Linkedin"><a href="<?php echo esc_url(get_theme_mod('linkedin_link', '#')); ?>"><i class="fab fa-linkedin-in"></i></a></li>
                            <?php }
                            $youtube_link = get_theme_mod('youtube_link', '#');
                            if (!empty ($youtube_link)) { ?>
                            <li class="youtube" data-toggle="tooltip" data-placement="bottom" title="Youtube"><a href="<?php echo esc_url(get_theme_mod('youtube_link', '#')); ?>"><i class="fab fa-youtube"></i></a></li>
                            <?php }
                            $instagram = get_theme_mod('instagram', '#');
                            if (!empty ($instagram)) { ?>
                            <li class="facebook" data-toggle="tooltip" data-placement="bottom" title="instagram"><a href="<?php echo esc_url(get_theme_mod('instagram', '#')); ?>"><i class="fab fa-instagram"></i></a></li>
                            <?php }
                            $vk_link = get_theme_mod('vk_link', '#');
                            if (!empty ($vk_link)) { ?>
                            <li class="facebook" data-toggle="tooltip" data-placement="bottom" title="vk"><a href="<?php echo esc_url(get_theme_mod('vk_link', '#')); ?>"><i class="fab fa-vk"></i></a></li>
                            <?php }
                            $qq_link = get_theme_mod('qq_link', '#');
                            if (!empty ($qq_link)) { ?>
                            <li class="facebook" data-toggle="tooltip" data-placement="bottom" title="qq"><a href="<?php echo esc_url(get_theme_mod('qq_link', '#')); ?>"><i class="fab fa-qq"></i></a></li>
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
                            'menu_class'     => 'nav navbar-nav',
                            'fallback_cb'    => 'weblizar_fallback_page_menu',
                            'walker'         => new weblizar_nav_walker(),
                        )
                    );
                    ?>
                </div>
            </nav>
        </div>
    </div>