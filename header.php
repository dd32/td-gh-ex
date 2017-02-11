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

<div id="content-wrapper">
    <div class="site-head">

        <div class="hgroup">
            <ul class="list-inline">
                <li class="site-title"><a
                    href="<?php echo esc_url( home_url( '/' ) ); ?>"
                    title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                    <?php bloginfo('name') ?></a>
                </li>
                <li class="site-description">
                    <em> | </em>
                </li>
                <li class="site-description">
                    <?php bloginfo('description') ?>
                </li>
            </ul>
        </div>
    </div>
		<header>
			<nav class="navbar navbar-default navbar-static-top semi-fixed">
				<div class="container">

					<div class="navbar-header">
						<?php if (has_nav_menu("main_nav")): ?>
						<button type="button" class="navbar-toggle collapsed"
                                data-toggle="collapse"
                                data-target="#navbar-responsive-collapse">
		    				<span class="sr-only"><?php _e('Navigation',
                                                           'appeal'); ?>
                            </span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<?php endif ?>
						<a class="navbar-brand"
                           title="<?php bloginfo('description'); ?>"
                           href="<?php echo esc_url(home_url('/')); ?>">
                     <?php bloginfo('name'); ?></a>
					</div>

					<div id="navbar-responsive-collapse"
                         class="collapse navbar-collapse">

	    <?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>

					</div>
				</div>
			</nav>
		</header>

   <div class="clearfix"></div>
		<div id="page-content"><!-- ends in footer -->
			<div class="container">

                