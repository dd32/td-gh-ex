<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Avvocato
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper" class="wrapper">
		<header id="header" class="header">
			<div class="top-bar">
				<div class="container">
					<div class="column-container top-bar-container">
						<div class="column-8-12 left">
							<div class="gutter">
								<ul class="top-bar-contact">
								    <li><i class="fa fa-phone"></i><a href="phone:<?php echo esc_html(get_theme_mod('pwt_header_phone',__( '+80 12-878-587', 'avvocato' ))); ?>"><?php echo esc_html(get_theme_mod('pwt_header_phone',__( '+80 12-878-587', 'avvocato' ))); ?></a></li>
									<li><i class="fa fa-envelope"></i><a href="mailto:<?php echo esc_html(get_theme_mod('pwt_header_email',__( 'info@example.com', 'avvocato' ))); ?>"><?php echo esc_html(get_theme_mod('pwt_header_email',__( 'info@example.com', 'avvocato' ))); ?></a></li>
								</ul>
							</div>
						</div>
						<div class="column-4-12 right">
							<div class="gutter">
								<ul class="social">
									<li><a class="fa-<?php echo esc_html(get_theme_mod('pwt_social_media_code1',__( 'facebook', 'avvocato' ))); ?>" href="<?php echo esc_url(get_theme_mod('pwt_social_media_link1',__( '#', 'avvocato' ))); ?>"></a></li>																
								    <li><a class="fa-<?php echo esc_html(get_theme_mod('pwt_social_media_code2',__( 'twitter', 'avvocato' ))); ?>" href="<?php echo esc_url(get_theme_mod('pwt_social_media_link2',__( '#', 'avvocato' ))); ?>"></a></li>	
									<li><a class="fa-<?php echo esc_html(get_theme_mod('pwt_social_media_code3',__( 'google-plus', 'avvocato' ))); ?>" href="<?php echo esc_url(get_theme_mod('pwt_social_media_link3',__( '#', 'avvocato' ))); ?>"></a></li>	
									<li><a class="fa-<?php echo esc_html(get_theme_mod('pwt_social_media_code4',__( 'pinterest', 'avvocato' ))); ?>" href="<?php echo esc_url(get_theme_mod('pwt_social_media_link4',__( '#', 'avvocato' ))); ?>"></a></li>	
									<li><a class="fa-<?php echo esc_html(get_theme_mod('pwt_social_media_code5',__( 'linkedin', 'avvocato' ))); ?>" href="<?php echo esc_url(get_theme_mod('pwt_social_media_link5',__( '#', 'avvocato' ))); ?>"></a></li>	
								</ul>
							</div>
						</div>
					</div>
				</div> <!--  END container  -->
			</div> <!--  END top-bar  -->
			<div class="header-block">
				<div class="container">
					<div class="gutter clearfix">
						<?php if ( get_theme_mod('pwt_logo_upload') ) { ?>
						   <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_theme_mod('pwt_logo_upload')); ?>" /></a>
						<?php } else if (get_theme_mod('pwt_text_logo_1')){  ?>
						   <h1 class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(get_theme_mod('pwt_text_logo_1')); ?><span> <?php echo esc_html(get_theme_mod('pwt_text_logo_2')); ?></span></a></h1>
						<?php } else {  ?>
						   <h1 class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
						<?php } ?>
						<nav class="menu-top-container">
							<?php if ( has_nav_menu( 'avvocato-menu' ) ) { ?>
							   <?php wp_nav_menu( array('container'=> '', 'theme_location' => 'avvocato-menu', 'items_wrap'  => '<ul class="menu-top">%3$s</ul>'  ) ); ?>
							<?php } else { ?>
								<?php wp_nav_menu(  array('container'=> '', 'menu_class'  => 'menu-top', 'items_wrap'  => '<ul class="menu-top">%3$s</ul>' ) ); ?>									
							<?php } ?>	
						</nav>
						<nav class="menu-top-mob-container">
							<a class="icon-menu" href="#"><?php _e( 'Menu', 'avvocato' ); ?></a>
							<?php if ( has_nav_menu( 'avvocato-menu' ) ) { ?>
							   <?php wp_nav_menu( array('container'=> '', 'theme_location' => 'avvocato-menu', 'items_wrap'  => '<ul class="menu-top-mob">%3$s</ul>'  ) ); ?>
							<?php } else { ?>
								<?php wp_nav_menu(  array('container'=> '', 'menu_class'  => 'menu-top-mob', 'items_wrap'  => '<ul class="menu-top-mob">%3$s</ul>' ) ); ?>									
							<?php } ?>	
						</nav>
					</div>
				</div> <!--  END container  -->
			</div> <!--  END header-block  -->
		</header> <!--  END header  -->
		<div id="content" class="content">