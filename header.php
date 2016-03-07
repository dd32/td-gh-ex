<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Avien_Light
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php echo esc_attr( get_bloginfo( 'pingback_url' ) ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
  
	<!--/ boxed / fullwidth option--> 
	<div id="fullwidth" class="container-fluid nopadding">
 	
		<!--/ header options-->	
		<header id="header" class="navbar navbar-wrapper navbar-fixed-top site-header" role="banner">
			
				<!--/.boxes -->
				<div class="boxes">
					
					<!--/.topheader -->
					<div class="topheader">
						
						<!--/.boxed or fullwidth -->
						<div class="container">
						
							<!--/.row -->
							<div class="row">
							
								<div class="col-md-12 colwrapper">
							
									<!--/.header-left widget-->
									<div class="col-sm-6 text-left contact">
										
										<?php if ( is_active_sidebar( 'header-left' ) ) : ?>
										
										<?php dynamic_sidebar( 'header-left' ); ?>
										
										<?php else : ?>
										
										<?php endif; ?>
					 
									</div>
									<!--/.header-left widget-->
									
									<!--/.header-right widget-->
									<div class="col-sm-6 text-right social">
										<?php if ( is_active_sidebar( 'header-right' ) ) : ?>
										
										<?php dynamic_sidebar( 'header-right' ); ?>
										
										<?php else : ?>
										
										<?php endif; ?>
									</div>
									<!--/.header-right widget-->
								
								</div>
								<!--/.avien-light_layout -->

							</div>
							<!--/.row -->
							
						</div>
						<!--/.boxed or fullwidth -->
						
					</div>
					<!--/.topheader -->  
						
					
					<!--/.main-navigation -->
					<div class="main-navigation">
					
						<!--/.boxed or fullwidth -->
						<div class="container">
						
							<!--/.row -->
							<div class="row">
							
								<!--/.avien-light_layout -->
								<div class="col-md-12 colwrapper">
					
									<!--/.navbar-header -->
									<div class="navbar-header site-title">
										
										<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
										  <span class="sr-only"><?php _e('Toggle navigation', 'avien-light'); ?></span>
										  <span class="icon-bar"></span>
										  <span class="icon-bar"></span>
										  <span class="icon-bar"></span>
										</button>
										
										<?php if ( ( function_exists( 'jetpack_the_site_logo' ) && jetpack_has_site_logo() ) ) : 
											jetpack_the_site_logo(); 
										else : ?>
										 <a class="navbar-brand text-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr( bloginfo( 'name'  ) );  ?>">
											<?php esc_attr( bloginfo( 'name'  ) );  ?>
											<span class="site-description"><?php esc_attr( bloginfo('description' ) );  ?></span>
										</a>
										<?php endif; ?>
									</div>
									<!--/.navbar-header -->
							
									<!--/.hidden-xs -->
									<div class="hidden-xs">
										<?php 
										if ( has_nav_menu( 'primary' ) ) {
										  wp_nav_menu( array(
											'theme_location'  => 'primary',
											'container'       => false,
											'menu_class'      => 'nav navbar-nav navbar-main',
											'fallback_cb'     => 'wp_page_menu',
											) ); 
										
										} else {
										
										echo '<ul class="nav navbar-nav navbar-main" id="menu-headermain">';
											wp_list_pages( array(
											
												'container' => '',
												'title_li' => '',
													
											));
										echo '</ul>';
										}
										?>
									</div>
									<!--/.hidden-xs -->

									<!--/.mobile-menu -->
									<div id="mobile-menu" class="visible-xs">
							
										<!--/.navbar-collapse -->
										<div class="collapse navbar-collapse">
										  <?php 
											  if ( has_nav_menu( 'primary' ) ) {
												wp_nav_menu( array(
												  'theme_location'  => 'primary',
												  'container'       => false,
												  'fallback_cb'     => 'wp_page_menu',
												  'menu_class'      => 'nav navbar-nav',
												
												) ); 
											
											} else {
											
											echo '<ul class="nav navbar-nav navbar-main" id="menu-headermain">';
												wp_list_pages( array(
												
													'container' => '',
													'title_li' => '',
														
												));
											echo '</ul>';
											}
										  ?>
										</div>
										<!--/.navbar-collapse -->

									</div>
									<!--/.mobile-menu -->
						  
								</div>
								<!--/.avien-light_layout-->
								
							</div>
							<!--/.row -->
							
						</div>
						<!--/.boxed or fullwidth -->
					
					</div>
					<!--/.main-navigation -->
				
				</div>
				<!--/.boxes -->
				
			</header><!--/#header-->
			<!--/ header options-->
