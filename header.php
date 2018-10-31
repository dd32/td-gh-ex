<?php
	/* The header for our theme */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">

	<?php	if(get_theme_mod( 'anorya_loader_setting', false )): ?>
		<div id="preloader-wrapper">
			<div id="preloader"></div>
			<div class="preloader-section"></div>
		</div>
	<?php endif; ?>
	
	<?php	if(get_theme_mod( 'anorya_back_to_top_setting', false )): ?>
		<div class="scroll-to-top">
			<a id="return-to-top"><i class="fa fa-angle-up"></i></a>
		</div>
	<?php endif; ?>
	
	<header>
		<div class="primary-navigation"> 
			<?php	if(get_theme_mod( 'anorya_top_bar_display_setting', true )): ?>
			<div class="top-bar"> 
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-6 top-menu ">
							<ul class="social-menu">
								<?php anorya_social_links_list_display(); ?>
							</ul>	
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 social-menu">
							<ul class="social-menu">
								<li><a><i class="fa fa-search hidden-search-icon" aria-hidden="true"></i></a></li>
								
								<?php if ( is_active_sidebar( 'anorya_widget_hidden_sidebar' ) ): ?>
									<li><a><i class="fa  fa-bars hidden-sidebar-icon" aria-hidden="true"></i></a></li>
								<?php endif; ?>
							</ul> 
						</div>
					</div>
				</div>
			</div>
			<?php endif; 
			
			switch(esc_html(get_theme_mod( 'anorya_header_style_setting', 1 ))){
				case 1:	  // first header style	
							get_template_part( 'template-parts/header-first-style' );
							break;
				case 2:	  // second header style	
							get_template_part( 'template-parts/header-second-style' );
							break;
				case 3:	  // third header style	
							get_template_part( 'template-parts/header-third-style' );
							break;							
				case 4:	  // fourth header style	
							get_template_part( 'template-parts/header-fourth-style' );
							break;
				case 5:	  // fifth header style	
							get_template_part( 'template-parts/header-fifth-style' );
							break;
				default : // first header style - DEFAULT
							get_template_part( 'template-parts/header-first-style' );
							break;
			}	
			
			?>
		</div>	
		
		
		<div id="sticky-menu" class="secondary-navigation">
			<div class="container">
				<div class="row">
					<div class="secondary-navigation-logo col-md-2 col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-xs-2">
								<a class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-navigation" ><i class="fa fa-bars menu-toggle"></i></a>
							</div>
							<div class="col-xs-10">
								<?php //get site logo
								if( has_custom_logo()): ?>
									<div itemscope itemtype="http://schema.org/Brand">
										<?php the_custom_logo(); ?>
									</div>
								<?php endif; ?>
							</div>	
						</div>	
					</div>
			
					<div id="collapse-navigation" class="col-md-10 col-sm-12 col-xs-12 collapse navbar-collapse" itemscope itemtype="https://schema.org/SiteNavigationElement">
						
						<?php wp_nav_menu( array('theme_location' => 'primary_navigation', 
												 'walker'=>new Anorya_Secondary_Nav_Walker(),
												 'container' => 'nav',
												 'container_class' => 'navbar',
												 'menu_class'=>'nav navbar-nav' ) );
						?>						 
						
					</div>
					
					<div class="secondary-social-container col-md-4 col-sm-12 col-xs-12">
						<ul class="social-menu">
							
							<?php anorya_social_links_list_display(); ?>

							<li><a><i class="fa fa-search hidden-search-icon" aria-hidden="true"></i></a></li>							
							
							<?php
							if(anorya_get_sidebar_display_setting()){
								if ( anorya_get_sidebar_display_setting() == 'hidden'  ):
								?>
								<li><a><i class="fa  fa-outdent hidden-sidebar-icon" aria-hidden="true"></i></a></li>
								
							<?php endif;
							} ?>
							
						</ul>
					</div>
					
				</div>
			</div>	
		</div>
		
		<div class="search-form-container">
				<?php get_search_form(); ?>
		</div>
		
	</header>
	
	<?php
	
	// load collapsable sidebar
	anorya_display_hidden_sidebar();
	
	//get slider type
	if(is_home() || is_front_page()):
	
		if(get_theme_mod( 'anorya_slider_type_setting') == 'standard'):
		//3 items slider ?>
			
			<div class="container-fluid slider-container">
				<div id="slider2" class="slider2 owl-carousel owl-theme" itemscope itemtype="http://schema.org/ItemList">
					<?php anorya_main_slider_items(); ?>
				</div>
			</div>
		<?php elseif(get_theme_mod( 'anorya_slider_type_setting') == '2post'):	?>
			<div class="container-fluid slider-container">
				<div id="slider3" class="slider3 owl-carousel owl-theme" itemscope itemtype="http://schema.org/ItemList">
					<?php anorya_main_slider_items(); ?>
				</div>
			</div>
		<?php else:
			$anorya_slider_item_class = 'slider1'; 
			// 1 item - full width slider ?>
			
			<div class="container slider-container">
				<div id="slider1" class="slider1 owl-carousel owl-theme" itemscope itemtype="http://schema.org/ItemList">
					<?php anorya_main_slider_items(); ?>
				</div>
			</div>
		<?php endif; ?>
			
		
		 
		<?php if(get_theme_mod('anorya_display_promo_boxes_setting')): ?>
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12 home-promo-box">
						<?php anorya_home_promo_box(1); ?>	
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12 home-promo-box">
						<?php anorya_home_promo_box(2); ?>	
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12 home-promo-box">
						<?php anorya_home_promo_box(3); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>	
	
	<?php endif; ?>
