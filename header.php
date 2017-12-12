<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package best-education
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="preloader">
    <div class="preloader-wrapper">
        <div class="loader">
            <?php esc_html_e('Loading &hellip;', 'best-education'); ?>
        </div>
    </div>
</div>

<!-- full-screen-layout/boxed-layout -->
<?php if (best_education_get_option('homepage_layout_option') == 'full-width') {
    $best_education_homepage_layout = 'full-screen-layout';
} elseif (best_education_get_option('homepage_layout_option') == 'boxed') {
    $best_education_homepage_layout = 'boxed-layout';
}
?>
<div id="page" class="site tiled <?php echo esc_attr($best_education_homepage_layout); ?>">
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'best-education'); ?></a>
    <header id="masthead" class="site-header white-bgcolor site-header-second" role="banner">
        <div class="top-bar container-fluid no-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-xs-12">
                        <div class="tm-social-share">
                            <?php if (best_education_get_option('social_icon_style') == 'circle') {
                                $best_education_social_icon = 'bordered-radius';
                            } else {
                                $best_education_social_icon = '';
                            } ?>
                            <div class="social-icons <?php echo esc_attr($best_education_social_icon); ?>">
                                <?php
                                wp_nav_menu(
                                    array('theme_location' => 'social',
                                        'link_before' => '<span class="screen-reader-text">',
                                        'link_after' => '</span>',
                                        'menu_id' => 'social-menu',
                                        'fallback_cb' => false,
                                        'menu_class' => false
                                    )); ?>

                                <span aria-hidden="true" class="stretchy-nav-bg secondary-bgcolor"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12 pull-right icon-search">
                      <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="site-branding">
                            <?php
                            if (is_front_page() && is_home()) : ?>
                                <span class="site-title">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                        <?php bloginfo('name'); ?>
                                    </a>
                                </span>
                            <?php else : ?>
                                <span class="site-title">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                        <?php bloginfo('name'); ?>
                                    </a>
                                </span>
                            <?php endif;
                            best_education_the_custom_logo();
                            $description = get_bloginfo('description', 'display');
                            if ($description || is_customize_preview()) : ?>
                                <p class="site-description"><?php echo $description; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <nav class="main-navigation col-md-8" role="navigation">
                        <span class="toggle-menu" aria-controls="primary-menu" aria-expanded="false">
                             <span class="screen-reader-text">
                                <?php esc_html_e('Primary Menu', 'best-education'); ?>
                            </span>
                            <i class="ham"></i>
                        </span>

                        <?php wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'menu_id' => 'primary-menu',
                            'container' => 'div',
                            'container_class' => 'menu'
                        )); ?>
                    </nav><!-- #site-navigation -->
                </div>
            </div>
        </div>
    </header>

    <!-- #masthead -->
    <!-- Innerpage Header Begins Here -->
    <?php
    if (is_front_page() && !is_home()) {
    } else {
        do_action('best-education-page-inner-title');
    }
    ?>
    <!-- Innerpage Header Ends Here -->
    <div id="content" class="site-content">