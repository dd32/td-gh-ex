<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset = "<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title(); ?></title>
        <link href = "http://gmpg.org/xfn/11" rel = "profile" />
        <link href = "<?php echo get_stylesheet_uri(); ?>" rel = "stylesheet" type = "text/css" media = "screen" />
        <link href = "<?php bloginfo( 'pingback_url' ); ?>" rel = "pingback" />
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>
	<nav id = "top-navigation">
		<div class = "top-menu">
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
		</div>
	</nav>
		<div id = "height"></div>
	<div id = "container" class = "cf">
		<header class = "site-header">
			<hgroup>
				<h1 class = "site-title"><a href = "<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
				<h2 class = "site-description"><?php bloginfo('description'); ?></h2>
			<hgroup>
				<?php if ( get_header_image() ) : ?>
					<img src = "<?php header_image(); ?>" class = "header-image" width = "<?php echo get_custom_header()->width; ?>" height = "<?php echo get_custom_header()->height; ?>" alt="" />
				<?php endif; ?>
		</header>