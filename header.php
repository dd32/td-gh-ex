<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aquarella
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<?php get_template_part( 'template-parts/customizer-styles', 'none' ); ?>
</head>

<body <?php body_class(); ?> id="body" style="">
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'aquarella-lite' ); ?></a>

	<!-- Header
	================================================== -->
	<header id="masthead" class="site-header" role="banner">
		<nav class="navbar">
			<!-- Navbar Top -->
			<div class="navbar-top">
				<div class="container">				
					<!-- Navbar Header -->
		            <div class="navbar-top-wrapper clearfix">
            			<!-- logo -->
						<div class="navbar-brand">
							<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
								the_custom_logo();
							} else { ?>
								<?php
								if ( is_front_page() && is_home() ) : ?>								
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php else : ?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php endif;
								$description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) : ?>
									<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
								<?php endif; ?>
							<?php } ?>							
						</div>
						<!-- /logo -->

            			<!-- social icons -->
            			 <div class="search-wrapper">
                            <!-- Header Search -->
							<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
	                            <label>
									<span class="screen-reader-text">Search for:</span>
									<input type="search" class="search-field" placeholder="Search and hit enter…" value="" name="s">
								</label>	
								<input type="submit" class="search-submit" value="Search">                           
	                        </form>
	                        <!-- /Header Search -->
                        </div>
            			<!-- /social icons -->       
					</div>   
				</div>
			</div>
			<!-- /Navbar Top -->			

			<!-- /Navbar Bottom -->
			<div class="navbar-bottom">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="">
							<!-- Collapse Button -->
			                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
			                    <span class="icon-bar"></span> 
							    <span class="icon-bar"></span> 
							    <span class="icon-bar"></span>
			                </button>
			                <!-- /Collapse Button -->
							<!-- Collect the nav links, forms, and other content for toggling -->
							 <div class="collapse navbar-collapse navbar-main-collapse">
								<?php wp_nav_menu( array(
					                'menu'              => '',
					                'theme_location'    => 'primary',
					                'depth'             => 3,
					                'container'         => '',
					                'container_class'   => '',
					                'container_id'      => '',
					                'menu_class'        => 'nav navbar-nav',
					                'fallback_cb'       => 'aquarella_bootstrap_navwalker::fallback',
					                'walker'            => new aquarella_bootstrap_navwalker())
					            );
						        ?>
							</div>
							<!-- /.navbar-collapse -->	
						</div>										
					</div>
					<!-- /row -->					
				</div>
			</div>
			<!-- /Navbar Bottom -->
			
		</nav>
	</header>
	<!-- /Header
	================================================== -->

	<!-- /Content
	================================================== -->