<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if(!get_theme_mod('aster_preloader')) : ?>
<div id="st-preloader">
	<div id="pre-status">
		<div class="preload-placeholder"></div>
	</div>
</div>
<?php endif; ?>

<header class="header">
	<div class="header-top text-center">
		<?php if(get_theme_mod('aster_logo')): ?>
			<div class="main-logo">
				<a href="<?php echo esc_url(site_url()); ?>"><img src="<?php echo esc_url(get_theme_mod('aster_logo'));
					?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"></a>
			</div><!-- /.main-logo -->
		<?php else: ?>
			<div class="text-logo">
				<a href="<?php echo esc_url(home_url()); ?>"><?php echo esc_attr(get_bloginfo('name')); ?></a>
				<p><?php echo esc_attr(get_bloginfo('description')); ?></p>
			</div><!-- /.text-logo -->
		<?php endif; ?>
	</div><!-- /.header-top -->

	<nav class="main-menu">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="navigation-wrapper">
						<?php wp_nav_menu( array(
							'container' => false,
							'theme_location' => 'main-menu',
							'menu_class' => 'top-menu'
						)); ?>
					</div>
					<div class="menu-mobile"></div>
				</div>
			</div>
		</div>
	</nav><!-- /.main-menu -->

</header><!-- /.header -->
