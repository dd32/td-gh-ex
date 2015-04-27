<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset = "<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title(); ?></title>
        <link href = "http://gmpg.org/xfn/11" rel = "profile" />
        <link href = "<?php bloginfo( 'pingback_url' ); ?>" rel = "pingback" />
        <?php wp_head(); ?>
    </head>
<body class = "<?php body_class(); ?>">
	<div id = "site-container" class = "cf">
		<header class = "site-header">
			<h1 class = "site-title"><a href = "<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
			<h2 class = "site-description"><?php bloginfo('description'); ?></h2>
		</header>
		<div id = "top-navigation">
			<nav class = "top-menu">
				<?php wp_nav_menu(); ?>
			</nav>
		</div>