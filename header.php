<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage appeal
 * @since appeal 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<a class="skip-link screen-reader-text" href="#content">
<?php _e( 'Skip to content', 'appeal' ); ?></a>

<div id="content-wrapper"><!-- ends in footer -->
    <div class="site-head">

        <?php appeal_theme_custom_logo() ?>

        <div class="hgroup">
            <p class="list-inline">
            <span class="site-title"><a
                  href="<?php echo esc_url( home_url( '/' ) ); ?>"
                  title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                  <?php bloginfo('name') ?></a></span>
            <span class="site-description"><em> | </em></span>
            <span class="site-description"><?php bloginfo('description') ?></span></p>
        </div>

    </div>

		<header>
			<nav class="navbar navbar-default navbar-static-top semi-fixed">
				<div class="container">
					<div class="navbar-header">
						<?php if (has_nav_menu("primary")): ?>
						<button type="button" class="navbar-toggle collapsed"
                                data-toggle="collapse"
                                data-target="#navbar-responsive-collapse">
		    				<span class="sr-only"><?php _e('Navigation',
                                                           'appeal'); ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<?php endif ?>
						<a class="navbar-brand"
                           title="<?php bloginfo('description'); ?>"
                           href="<?php echo esc_url(home_url('/')); ?>">
                           <img src="<?php echo get_template_directory_uri()
                                            . '/assets/homepng.png'; ?>"
                                alt="<?php _e( 'Home', 'appeal' ); ?>"
                                height="45" /></a>
					</div>

					<div id="navbar-responsive-collapse" class="collapse navbar-collapse">

	    <?php wp_nav_menu( array(
                'menu'             => 'primary',
                'theme_location'  => 'primary',
                'depth'          => 2,
                'container_id'  => 'none',
                'menu_class'   => 'nav navbar-nav',
                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                'walker'     => new wp_bootstrap_navwalker())
            ); ?>

					</div>
				</div>
			</nav>

		</header>

   <div class="clearfix"></div>
		<div id="page-content"><!-- ends in footer -->
			<div class="container"><!-- ends in footer -->

                