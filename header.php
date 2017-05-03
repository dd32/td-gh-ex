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
								    <?php if(get_theme_mod('avvocato_header_phone')) { ?><li><i class="fa fa-phone"></i><a href="<?php echo esc_url( 'phone:'. esc_attr(get_theme_mod('avvocato_header_phone'))); ?>"><?php echo esc_attr(get_theme_mod('avvocato_header_phone')); ?></a></li><?php } ?>
									<?php if(get_theme_mod('avvocato_header_email')) { ?><li><i class="fa fa-envelope"></i><a href="<?php echo esc_url( 'mailto:' . antispambot(sanitize_email(get_theme_mod('avvocato_header_email'))); ?>"><?php echo antispambot(sanitize_email(get_theme_mod('avvocato_header_email'))); ?></a></li><?php } ?>
								</ul>
							</div>
						</div>
						<?php if(get_theme_mod('avvocato_social_media_code1') or get_theme_mod('avvocato_social_media_code2') or get_theme_mod('avvocato_social_media_code3') or get_theme_mod('avvocato_social_media_code4') or get_theme_mod('avvocato_social_media_code5')) { ?>
						<div class="column-4-12 right">
							<div class="gutter">
								<ul class="social">
									<?php if(get_theme_mod('avvocato_social_media_code1')) { ?><li><a class="fa-<?php echo sanitize_html_class(get_theme_mod('avvocato_social_media_code1')); ?>" href="<?php echo esc_url(get_theme_mod('avvocato_social_media_link1')); ?>"></a></li><?php } ?>																
									<?php if(get_theme_mod('avvocato_social_media_code2')) { ?><li><a class="fa-<?php echo sanitize_html_class(get_theme_mod('avvocato_social_media_code2')); ?>" href="<?php echo esc_url(get_theme_mod('avvocato_social_media_link2')); ?>"></a></li><?php } ?>																
									<?php if(get_theme_mod('avvocato_social_media_code3')) { ?><li><a class="fa-<?php echo sanitize_html_class(get_theme_mod('avvocato_social_media_code3')); ?>" href="<?php echo esc_url(get_theme_mod('avvocato_social_media_link3')); ?>"></a></li><?php } ?>																
									<?php if(get_theme_mod('avvocato_social_media_code4')) { ?><li><a class="fa-<?php echo sanitize_html_class(get_theme_mod('avvocato_social_media_code4')); ?>" href="<?php echo esc_url(get_theme_mod('avvocato_social_media_link4')); ?>"></a></li><?php } ?>																
									<?php if(get_theme_mod('avvocato_social_media_code5')) { ?><li><a class="fa-<?php echo sanitize_html_class(get_theme_mod('avvocato_social_media_code5')); ?>" href="<?php echo esc_url(get_theme_mod('avvocato_social_media_link5')); ?>"></a></li><?php } ?>									
								</ul>
							</div>
						</div>
						<?php } ?>
					</div>
				</div> <!--  END container  -->
			</div> <!--  END top-bar  -->
			<div class="header-block">
				<div class="container">
					<div class="gutter clearfix">
                        <?php if ( has_custom_logo() ) : ?>
                            <?php avvocato_the_custom_logo(); ?>
                        <?php else : ?>
                            <h1 class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                        <?php endif; ?>
						<nav class="menu-top-container">
							<?php if ( has_nav_menu( 'avvocato-menu' ) ) { ?>
							   <?php wp_nav_menu( array('container'=> '', 'theme_location' => 'avvocato-menu', 'items_wrap'  => '<ul class="menu-top">%3$s</ul>'  ) ); ?>
							<?php } else { ?>
								<?php wp_nav_menu(  array('container'=> '', 'theme_location' => 'avvocato-menu', 'menu_class'  => 'menu-top', 'items_wrap'  => '<ul class="menu-top">%3$s</ul>' ) ); ?>									
							<?php } ?>	
						</nav>
						<nav class="menu-top-mob-container">
							<a class="icon-menu" href="#"><?php _e( 'Menu', 'avvocato' ); ?></a>
							<?php if ( has_nav_menu( 'avvocato-menu' ) ) { ?>
							   <?php wp_nav_menu( array('container'=> '', 'theme_location' => 'avvocato-menu', 'items_wrap'  => '<ul class="menu-top-mob">%3$s</ul>'  ) ); ?>
							<?php } else { ?>
								<?php wp_nav_menu(  array('container'=> '', 'theme_location' => 'avvocato-menu', 'menu_class'  => 'menu-top-mob', 'items_wrap'  => '<ul class="menu-top-mob">%3$s</ul>' ) ); ?>									
							<?php } ?>	
						</nav>
					</div>
				</div> <!--  END container  -->
			</div> <!--  END header-block  -->
		</header> <!--  END header  -->
		<div id="content" class="content">