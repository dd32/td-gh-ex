<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset = "<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title(); ?></title>
        <link href = "http://gmpg.org/xfn/11" rel = "profile" />
        <link href = "<?php echo get_stylesheet_uri(); ?>" rel = "stylesheet" type = "text/css" media = "screen" />
        <link href = "<?php bloginfo( 'pingback_url' ); ?>" rel = "pingback" />
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php wp_head(); ?>
    </head>
<body <?php body_class($class); ?>>
	<nav id = "top-navigation">
		<div class = "top-menu">
			<?php wp_nav_menu('show_home=1'); ?>
		</div>
	</nav>
		<div id = "height"></div>
	<div id = "container" class = "cf">
		<header class = "site-header">
			<hgroup>
				<h1 class = "site-title"><?php bloginfo('name'); ?></h1>
				<h2 class = "site-description"><?php bloginfo('description'); ?></h2>
			<hgroup>
				<?php if ( get_header_image() ) : ?>
					<img src = "<?php header_image(); ?>" class = "header-image" width = "<?php echo get_custom_header()->width; ?>" height = "<?php echo get_custom_header()->height; ?>" alt="" />
				<?php endif; ?>
		</header>