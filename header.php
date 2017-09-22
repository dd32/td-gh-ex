<?php
// Header Template
// Copyright 2014 InsertCart
// Author: sandeep
// Theme: Optimize

?>


<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="top">
<div class="wrapper">
<!-- BEGIN HEADER -->
	<header id="header">
    <div id="header-inner" class="clearfix">
		<div id="logo">	  
		  <?php if (of_get_option( 'optimize_logo' )): ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo of_get_option( 'optimize_logo' ); ?>"alt="<?php bloginfo( 'name' ); ?>"/></a>
      			<?php else : ?>        
				
					<?php optimize_site_logo();?>
					<?php optimize_site_title(); ?>
					<?php optimize_site_description(); ?>
	  <?php endif; ?>	
		  
		  
		  
		</div>		
<div id="myban"> 
<?php if ( !dynamic_sidebar('headerwid') ) : ?>
			<?php endif; ?>
<?php if ( of_get_option('optimize_ad1') <> "" ) { echo of_get_option('optimize_ad1'); } ?></div>
    </div> <!-- end div #header-inner -->
	</header> <!-- end div #header -->

	<!-- END HEADER -->

	<!-- BEGIN TOP NAVIGATION -->		
<div id="navigation" class="nav"> 
    <div id="navigation-inner" class="clearfix">
		<div class="secondary">		
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</div><!-- end div #nav secondry -->
	    </div> <!-- end div #navigation-inner -->
	</div> <!-- end div #navigation -->
	<!-- END TOP NAVIGATION -->
	<?php if ( !dynamic_sidebar('belownavi') ) : ?>
			<?php endif; ?>