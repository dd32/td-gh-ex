<!DOCTYPE html> 
<!--[if IE 8 ]>					<html class="no-js ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->	<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php wp_title(''); ?></title>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<script>document.documentElement.className = document.documentElement.className.replace("no-js","js");</script>

	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/ie/html5.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/ie/selectivizr.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper">

	<header id="header">
	
		<?php if (has_nav_menu('topbar')): ?>
			<nav class="nav-container group" id="nav-topbar">
				<div class="nav-toggle"><i class="fa fa-reorder"></i></div>
				<div class="nav-text"><!-- put your mobile menu text here --></div>
				<div class="nav-wrap container"><?php wp_nav_menu(array('theme_location'=>'topbar','menu_class'=>'nav container-inner group','container'=>'','menu_id' => '','fallback_cb'=> FALSE)); ?></div>
				
				<div class="container">
					<div class="container-inner">		
						<div class="toggle-search"><i class="fa fa-search"></i></div>
						<div class="search-expand">
							<div class="search-expand-inner">
								<?php get_search_form(); ?>
							</div>
						</div>
					</div>
				</div>
				
			</nav><!--/#nav-topbar-->
		<?php endif; ?>
		
		<div class="container group">
			<div class="container-inner">
				<div class="group pad">
					<?php echo alx_site_title(); ?>
					<?php if ( !ot_get_option('site-description') ): ?><p class="site-description"><?php bloginfo( 'description' ); ?></p><?php endif; ?>
				</div>
				<?php if (has_nav_menu('header')): ?>
					<nav class="nav-container group" id="nav-header">
						<div class="nav-toggle"><i class="fa fa-reorder"></i></div>
						<div class="nav-text"><!-- put your mobile menu text here --></div>
						<div class="nav-wrap container"><?php wp_nav_menu(array('theme_location'=>'header','menu_class'=>'nav container-inner group','container'=>'','menu_id' => '','fallback_cb'=> FALSE)); ?></div>
					</nav><!--/#nav-header-->
				<?php endif; ?>
			</div><!--/.container-inner-->
		</div><!--/.container-->
	</header><!--/#header-->
	
	<div class="container" id="page">
		<div class="container-inner">