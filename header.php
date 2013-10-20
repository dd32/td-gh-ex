<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body <?php body_class(); ?> id="top">
<div class="wrapper">
<!-- BEGIN HEADER -->
	<div id="header">
    <div id="header-inner" class="clearfix">
		<div id="logo">
			<?php if ( get_header_image() != '' ) : ?>       
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /></a>        
    <?php endif; // header image was removed ?>
    <?php if ( !get_header_image() ) : ?>                     
            <h1 class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
    <?php endif; // header image was removed (again) ?>
		</div>		
		<div id="banner-top">	<?php echo stripslashes(promax_get_option('promax_banner_top')); ?></div>		
    </div> <!-- end div #header-inner -->
	</div> <!-- end div #header -->

	<!-- END HEADER -->

	<!-- BEGIN TOP NAVIGATION -->		
<div id="navigation" class="nav"> <?php get_template_part('/includes/social'); ?>
    <div id="navigation-inner" class="clearfix">
		<div class="secondary">		<?php
			if (('wp_nav_menu')) {
				wp_nav_menu(array('container' => '', 'theme_location' => 'promax-navigation', 'fallback_cb' => 'promax_hdmenu'));
			}
			else {
				promax_hdmenu();
			}
			?>
		</div><!-- end div #nav secondry -->
	    </div> <!-- end div #navigation-inner -->
	</div> <!-- end div #navigation -->
	<!-- END TOP NAVIGATION -->
	<div id="pronav" class="nav"> 
    <div id="pronav-inner" class="clearfix">
		<div class="secondary">		
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</div><!-- end div #nav secondry -->
	    </div> <!-- end div #pronav-inner -->
	</div> <!-- end div #pronav -->
	<!-- END TOP NAVIGATION -->