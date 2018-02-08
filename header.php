<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <header>
 *
 * @package agency-x
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<!-- Meta tag -->
		<meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Preloader -->
<div class="loader">
	<div class="loader-inner">
		<div class="k-line k-line11-1"></div>
		<div class="k-line k-line11-2"></div>
		<div class="k-line k-line11-3"></div>
		<div class="k-line k-line11-4"></div>
		<div class="k-line k-line11-5"></div>
	</div>
</div>
<!-- End Preloader -->

<!-- Start Header -->
<header id="header">
	<!-- Header Inner -->
	<div class="header-inner">
		<div class="container">
			<div class="row">
				<div class="col-md-2 col-sm-12 col-xs-12">
					<!-- Logo -->
					<div class="logo">
						<a href="<?php home_url(); ?>"><?php the_custom_logo(); ?></a>
					</div>
					<!--/ End Logo -->
				</div>
				<?php if( has_nav_menu( 'primary' ) ) : ?>
					<div class="col-md-10 col-sm-12 col-xs-12">
						<div class="nav-area">
							<!-- Main Menu -->
							<nav class="mainmenu">
								<div class="mobile-nav"></div>

								<?php
									$args = array(
										'theme_location'	=>	'primary',									
										'container'			=>	'div',
										'container_class'	=>	'collapse navbar-collapse',
										'menu_class'		=>	'nav navbar-nav',
										'walker'			=>	new Agency_X_Wp_Bootstrap_Navwalker()
									);
								?>

								<?php 
									 wp_nav_menu( $args );
								 ?>					
							</nav>
							<!--/ End Main Menu -->
							<!-- Search Form -->
							<ul class="search">
								<li><a href="#header"><i class="fa fa-search"></i></a></li>
							</ul>	
							<div class="search-form">
								<?php get_search_form( true ); ?>							
							</div>
							<!--/ End Search Form -->
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<!--/ End Header Inner -->
</header>
<!--/ End Header -->