<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<!-- start meta -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- end meta -->

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri() ?>/js/html5shiv.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/respond.min.js"></script>
<![endif]-->
	
<?php wp_head(); ?>

<!--/ custom header option per page basis-->
	<style style="text/css">
		body {
			padding-top: 99px;	
		}
		
		@media(max-width:767px) {
					
			body {
				padding-top: 129px;
			}
		}
	</style>
<!--/ custom header option per page basis-->

</head><!--/head-->

<body <?php body_class() ?>>
  
	<!--/ boxed / fullwidth option--> 
	<div id="fullwidth" class="container-fluid nopadding">
 	
		<!--/ header options-->	
		<header id="mainheader" class="navbar navbar-wrapper navbar-fixed-top" role="banner">
			
				<!--/.boxes -->
				<div class="boxes">
					
					<!--/.topheader -->
					<div class="topheader">
						
						<!--/.boxed or fullwidth -->
						<div class="container">
						
							<!--/.row -->
							<div class="row">
							
								<?php echo themeofwp_layout() ;?>
							
									<!--/.contact-->
									<div class="col-sm-6 text-left contact">
										
										<?php if ( is_active_sidebar( 'header-contact' ) ) : ?>
										
										<?php dynamic_sidebar( 'header-contact' ); ?>
										
										<?php else : ?>
										
										<a href="tel:+1 0888 666 555"><i class="fa fa-phone"></i>
											+1 0888 666 555
										</a> 
										
										<a href="mailto:me@mycompany.com"><i class="fa fa-envelope-o"></i> 
											me@mycompany.com
										</a>
										
										<?php endif; ?>
					 
									</div>
									<!--/.contact-->
									
									<!--/.social-->
									<div class="col-sm-6 text-right social">
										<?php if ( is_active_sidebar( 'header-social' ) ) : ?>
										
										<?php dynamic_sidebar( 'header-social' ); ?>
										
										<?php else : ?>
										<a href="#" id="twitter" title="twitter"><i class="fa fa-twitter"> </i></a>
										<a href="#" id="facebook" title="facebook"><i class="fa fa-facebook"> </i></a>
										<a href="#" id="linkedin" title="linkedin"><i class="fa fa-linkedin"> </i></a>
										<a href="#" id="google" title="google"><i class="fa fa-google-plus"> </i></a>
										<a href="#" id="instagram" title="instagram"><i class="fa fa-instagram"> </i></a>
										<?php endif; ?>
									</div>
									<!--/.social-->
								
								</div>
								<!--/.themeofwp_layout -->

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
							
								<!--/.themeofwp_layout -->
								<div class="col-md-12 colwrapper">
					
									<!--/.navbar-header -->
									<div class="navbar-header">
										
										<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
										  <span class="sr-only"><?php _e('Toggle navigation', 'themeofwp'); ?></span>
										  <span class="icon-bar"></span>
										  <span class="icon-bar"></span>
										  <span class="icon-bar"></span>
										</button>
										
										 <a class="navbar-brand text-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
										<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>
										<span><?php bloginfo('description'); ?></span>
										</a>
										
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
											'walker'          => new wp_bootstrap_navwalker()
											) ); 
										
										} else {
										
										echo '<ul class="nav navbar-nav navbar-main" id="menu-headermain">';
											wp_list_pages( array(
											
												'container' => '',
												'title_li' => '',
												'walker' => new themeofWP_Walker(),
													
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
												  'walker'          => new wp_bootstrap_mobile_navwalker()
												
												) ); 
											
											} else {
											
											echo '<ul class="nav navbar-nav navbar-main" id="menu-headermain">';
												wp_list_pages( array(
												
													'container' => '',
													'title_li' => '',
													'walker' => new themeofWP_Walker(),
														
												));
											echo '</ul>';
											}
										  ?>
										</div>
										<!--/.navbar-collapse -->

									</div>
									<!--/.mobile-menu -->
						  
								</div>
								<!--/.themeofwp_layout-->
								
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

	<?php if ( !is_home() ) { ?>
	<!--/ mainsubtitle-->
	<div id="subtitle">
		<div class="container">
			<?php get_template_part( 'inc/sub', 'header' );?>
		</div>
	</div>
	<!--/ mainsubtitle-->
	<?php } ?>
	
