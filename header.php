<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="top">
<div class="wrapper">
<!-- BEGIN HEADER -->
	<header id="header">
    <div id="header-inner" class="clearfix">
		<div id="logo">
			<?php if (of_get_option( 'optimize_logo' )): ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo of_get_option( 'optimize_logo' ); ?>" max-height="100px" max-width="470px" alt="<?php bloginfo( 'name' ); ?>"/></a>
      			<?php else : ?>        
            <h1 class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
          <?php endif; ?>
		</div>		
<?php echo'<div id="myban">'; if ( of_get_option('optimize_ad1') <> "" ) { echo stripslashes(of_get_option('optimize_ad1')); } echo'</div>'; ?>
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