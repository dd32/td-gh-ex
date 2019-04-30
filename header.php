<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta name="description" content="<?php echo get_bloginfo( 'description' ); ?>">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
	<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/style.css ?>">
	<link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/images/favicon.png" />
	
	<?php wp_head(); ?> 
</head>

<body <?php body_class(); ?>>
    <!-- Header -->
    <section class="hero is-link">
        <div class="hero-head">
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-brand">
                        <a class="navbar-item" href="<?php echo esc_url(site_url());?>">
                            <?php
                                $custom_logo_id = get_theme_mod( 'custom_logo' );
                                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

                                if (has_custom_logo()) 
                                {
                                    echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
                                } 
                                else 
                                {
                                    echo get_bloginfo( 'name' );
                                }
                            ?>
                        </a>
                        <span class="navbar-burger burger" data-target="navmenu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </div>
                    <div id="navmenu" class="navbar-menu">
                        <div class="navbar-end">
                            <?php 
                                if (has_nav_menu('hero-header-menu'))
                                {
                                    $headerMenuParameters = array(
                                        'container'       => false,
                                        'echo'            => false,
                                        'items_wrap'      => '%3$s',
                                        'depth'           => 0,
                                        'theme_location'  => 'hero-header-menu'
                                    );
                            
                                    echo strip_tags(wp_nav_menu($headerMenuParameters), '<a>');
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="hero-body">
            <div class="container">
                <h1 class="title">
					<?php echo get_bloginfo( 'name' ); ?>
                </h1>
                <h2 class="subtitle">
					<?php echo get_bloginfo( 'description' ); ?>
                </h2>
            </div>
        </div>

        <?php 
            if (has_nav_menu('hero-footer-menu'))
            {
                $footerMenuParameters = array(
                    'container_class' => 'hero-foot tabs',
                    'menu_class'      => 'container',
                    'echo'            => true,
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                    'theme_location'  => 'hero-footer-menu'
                );
        
                wp_nav_menu($footerMenuParameters);
            }
        ?>
    </section>