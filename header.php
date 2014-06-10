<!doctype html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php // end of wordpress head ?>
		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>
		
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
	
	<!-- Wrapper
	================================================== -->
	<div class="wrapper">
		<!-- Header
		================================================== -->
		<header class="header-wrapper">
			<!-- top-header -->
			<div class="top-header">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-md-8">
							<div class="top-info fadeIn" >
								<strong><i class="fa fa-envelope-o"></i></strong> <a href="#">hello@yourcompany.com</a>
							</div><!-- /.header-infobox-->
							<div class="top-info fadeIn" >
								<strong><i class="fa fa-phone"></i> </strong> 800-123-4567
							</div><!-- /.header-infobox-->
						</div>
						<div class="col-lg-4 col-md-4">
							<!-- WordPress Search -->
							<form role="search" method="get" class="search-form-top" action="<?php echo home_url( '/' ); ?>">
									<input type="search" class="search-field-top form-control no-border-radius col-lg-2" placeholder="Search" value="" name="s" title="Search for:" />
							</form>
							<!-- /WordPress Search -->
						</div>
					</div>
				</div><!-- /container -->
			</div><!-- /top-header -->
			<!-- middle-header -->
			<div class="middle-header">
				<div class="container">
					<?php if ( get_header_image() ) : ?>
						<div id="site-header">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
							</a>
						</div>
					<?php endif; ?>
					<div class="row">
						<div class="col-lg-12">
							<div class="logo text-center" id="menu">
								<?php 
								// to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> 
								?>
							
								<a href="<?php echo home_url(); ?>" rel="nofollow">
									<?php bloginfo('name'); ?>
								</a>
								
							</div>
							<div class="text-center fadeIn">
								<?php // if you'd like to use the site description you can un-comment it below ?>
								<?php  bloginfo('description'); ?>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /middle-header -->
			<!-- bottom-header -->
			<div class="bottom-header">
				<!-- Main Menu -->
				<div class="top-menu">
					<a id="touch-menu" class="mobile-menu" href="#"><i class="icon-reorder"></i>Menu</a>
					<nav class="my-sticky-element">
						<?php wp_nav_menu(array(
							'container' => false,                           // remove nav container
							'container_class' => '',                        // class of container
							'menu' => __( 'Main Menu', 'bnwtheme' ),      // nav name
							'menu_class' => 'menu',                         // adding custom nav class
							'theme_location' => 'main-nav',                 // where it's located in the theme
							'before' => '',                                 // before the menu
							'after' => '',                                  // after the menu
							'link_before' => '',                            // before each link
							'link_after' => '',                             // after each link
							'depth' => 0,                                   // limit the depth of the nav
							'fallback_cb' => ''                             // fallback function (if there is one)
						)); ?>
					</nav><!--/nav -->
				</div><!-- /Main Menu -->
			</div><!-- /bottom-header -->
		</header><!-- /header-warapper -->
		<!-- /Header End -->