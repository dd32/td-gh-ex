<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
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
	<div id="header">
    <div id="header-inner" class="clearfix">
		<div id="logo">
<?php if (of_get_option( 'promax_logo' )): ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo of_get_option( 'promax_logo' ); ?>" height="100px" width="400px" alt="<?php bloginfo( 'name' ); ?>"/></a>
      			<?php else : ?>        
            <h1 class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
          <?php endif; ?>		
		</div>		
		
		<div id="banner-top">	<?php echo of_get_option( 'banner_top'); ?>
		<?php if ( !dynamic_sidebar('headerban') ) :  endif; ?>
		</div>		
    </div> <!-- end div #header-inner -->
	</div> <!-- end div #header -->

	<!-- END HEADER -->

	<!-- BEGIN TOP NAVIGATION -->
	<?php if (of_get_option('promax_topmenushow') !=='off') { ?>
<div id="navigation" ><div class="nav">
    <div id="navigation-inner" class="clearfix">
		<div class="secondary">
		<?php wp_nav_menu( array( 'theme_location' => 'promax-navigation', 'fallback_cb' => 'promax_hdmenu','menu_class' => 'nav-menu') );	?>
		</div><!-- end div #nav secondry -->
	    </div> <!-- end div #navigation-inner -->
		<?php get_template_part('/includes/social'); ?>
	    </div> <!-- end div #navigation-inner -->
	</div> <!-- end div #navigation -->
	<!-- END TOP NAVIGATION -->
<?php } ?>
<?php if (of_get_option('promax_navimenushow') !=='off') { ?>
	<div id="pronav" class="nav"> 
    <div id="pronav-inner" class="clearfix">
		<div class="secondary">		
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</div><!-- end div #nav secondry -->
	    </div> <!-- end div #pronav-inner -->
	</div> <!-- end div #pronav -->
	<!-- END TOP NAVIGATION -->
<?php } ?>
<?php if ( !dynamic_sidebar('belownaviwid') ) :  endif; ?>