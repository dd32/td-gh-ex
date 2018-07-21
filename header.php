<?php
/**
 * The Header template
 */ 
 ?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">	
	<?php endif; ?>
	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'best-wp' ); ?></a>
	<?php if (esc_attr(get_theme_mod( 'social_media_activate_header' ))) { best_wp_social_section (); } ?>
	
	<div class="nav-center">

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					
			<a href="#" id="menu-icon">	
				<span class="menu-button"> </span>
				<span class="menu-button"> </span>
				<span class="menu-button"> </span>
			</a>	

			</button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->

	</div>					
	<header id="masthead" class="site-header" role="banner">				

	
<!---------------- Deactivate Header Image ---------------->	
		
		<?php if (get_theme_mod('custom_header_position') != "deactivate") { ?>
		
<!---------------- All Pages Header Image ---------------->		
	
		<?php if ( get_theme_mod('custom_header_position') == "all" ) : ?>

	
		<?php if (has_header_image() !=""){ ?><img class="header-img" src="<?php header_image(); ?>" /><?php } ?>
	
			<div class="site-branding">
				<div class="dotted">
					<?php if ( has_custom_logo() ) : ?>
						
							<?php if ( is_front_page() && is_home() ) : ?>
								<h1 class="site-title aniview" data-av-animation="bounceInLeft"><?php the_custom_logo(); ?></h1>
							<?php else : ?>
								<p class="site-title aniview" data-av-animation="bounceInLeft"><p class="site-title"><?php the_custom_logo(); ?></p></p>
							<?php endif;

							$ap_description = esc_html (get_bloginfo( 'description', 'display' ));
							if ( $ap_description || is_customize_preview() ) : ?>
								<p class="site-description aniview" data-av-animation="bounceInRight"><?php echo $ap_description; /* WPCS: xss ok. */ ?></p>
							<?php endif;  ?>
							
						<?php else : ?>
						
							<?php if ( is_front_page() && is_home() ) : ?>
								<h1 class="site-title aniview" data-av-animation="bounceInLeft"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
								<p class="site-title aniview" data-av-animation="bounceInLeft"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php endif;

							$ap_description = esc_html (get_bloginfo( 'description', 'display' ));
							if ( $ap_description || is_customize_preview() ) : ?>
							<p class="site-description aniview" data-av-animation="bounceInRight"><?php echo $ap_description; /* WPCS: xss ok. */ ?></p>
							
					<?php endif;  endif;  ?>			
				
				</div><!-- .site-branding -->
			</div>	
		
		
		<?php endif;  ?>
		
<!---------------- Home Page Header Image ---------------->
		
		<?php if ( ( is_front_page() || is_home() ) and get_theme_mod('custom_header_position') == "home" ) { ?>

		<?php if (has_header_image() !=""){ ?><img class="header-img" src="<?php header_image(); ?>" /><?php } ?>
					
			<div class="site-branding">
				<div class="dotted">			
					<?php if ( has_custom_logo() ) : ?>
						
							<?php if ( is_front_page() && is_home() ) : ?>
								<h1 class="site-title aniview" data-av-animation="bounceInLeft"><?php the_custom_logo(); ?></h1>
							<?php else : ?>
								<p class="site-title aniview" data-av-animation="bounceInLeft"><p class="site-title"><?php the_custom_logo(); ?></p></p>
							<?php endif;

							$ap_description = esc_html (get_bloginfo( 'description', 'display' ));
							if ( $ap_description || is_customize_preview() ) : ?>
								<p class="site-description aniview" data-av-animation="bounceInRight"><?php echo $ap_description; /* WPCS: xss ok. */ ?></p>
							<?php endif;  ?>
							
						<?php else : ?>
						
							<?php if ( is_front_page() && is_home() ) : ?>
								<h1 class="site-title aniview" data-av-animation="bounceInLeft"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
								<p class="site-title aniview" data-av-animation="bounceInLeft"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php endif;

							$ap_description = esc_html (get_bloginfo( 'description', 'display' ));
							if ( $ap_description || is_customize_preview() ) : ?>
							<p class="site-description aniview" data-av-animation="bounceInRight"><?php echo $ap_description; /* WPCS: xss ok. */ ?></p>
							
					<?php endif;  endif;  ?>			
				</div>
			</div><!-- .site-branding -->
		
	<?php } 

	} ?> 
<!---------------- Default Header Image ---------------->

		<?php if (  has_header_image() !="") { ?>
		
		<?php if ( get_theme_mod('custom_header_position') != "all") { ?>

		<?php if ( get_theme_mod('custom_header_position') != "home" ) { ?>
		
			<?php if (has_header_image() !=""){ ?><img class="header-img" src="<?php echo esc_url(get_template_directory_uri()). "/framework/images/header.jpg"; ?>" /><?php } ?>
			<div class="site-branding">
				<div class="dotted">					
					<?php if ( has_custom_logo() ) : ?>
						
							<?php if ( is_front_page() && is_home() ) : ?>
								<h1 class="site-title aniview" data-av-animation="bounceInLeft"><?php the_custom_logo(); ?></h1>
							<?php else : ?>
								<p class="site-title aniview" data-av-animation="bounceInLeft"><p class="site-title"><?php the_custom_logo(); ?></p></p>
							<?php endif;

							$ap_description = esc_html (get_bloginfo( 'description', 'display' ));
							if ( $ap_description || is_customize_preview() ) : ?>
								<p class="site-description aniview" data-av-animation="bounceInRight"><?php echo $ap_description; /* WPCS: xss ok. */ ?></p>
							<?php endif;  ?>
							
						<?php else : ?>
						
							<?php if ( is_front_page() && is_home() ) : ?>
								<h1 class="site-title aniview" data-av-animation="bounceInLeft"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
								<p class="site-title aniview" data-av-animation="bounceInLeft"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php endif;

							$ap_description = esc_html (get_bloginfo( 'description', 'display' ));
							if ( $ap_description || is_customize_preview() ) : ?>
							<p class="site-description aniview" data-av-animation="bounceInRight"><?php echo $ap_description; /* WPCS: xss ok. */ ?></p>
							
					<?php endif;  endif;  ?>			
				</div>
			</div><!-- .site-branding -->

<?php } } } ?>

	</header><!-- #masthead -->
	
	
	<div class="clear"></div>
	
	<div id="content" class="site-content">