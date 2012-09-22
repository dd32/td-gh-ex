<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title( '-', true, 'right' ) ; ?><?php bloginfo( 'name' ) ; ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="screen" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>
	<?php do_action('custom_css_hook'); ?>
</head>

<body <?php body_class(); ?>>

		<?php do_action('hook_body'); ?>
		
		<?php if ( is_active_sidebar( 'body_widgets' ) ) : ?>
			<div id="body-widgets-wrap">
				<?php dynamic_sidebar( 'body_widgets' ); ?>
			</div>
		<?php endif; ?>
		
	<div id="container">
	
		<?php do_action('hook_container'); ?>
		
	<div id="header" class="clear" style="background-image:url('<?php header_image(); ?>'); background-size:<?php echo get_custom_header()->width . "px " . get_custom_header()->height . "px" ?>;">

		<div id="header-info-wrap">
		
			<?php if ( asteroid_option('header_logo') != '' ) : ?>
				<div id="header-logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo asteroid_option('header_logo'); ?>" /></a></div>
			<?php else : ?>
				<?php if (! ('blank' == get_header_textcolor() )) : ?>
					<hgroup>
						<h1 id="site-title"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
						<h4 id="site-description"><?php bloginfo( 'description' ); ?></h4>		
					</hgroup>
				<?php endif; ?>
			<?php endif ; ?>

		</div>
	
		<?php if ( is_active_sidebar( 'header_widgets' ) ) : ?>
			<div id="header-widgets-wrap">
				<?php dynamic_sidebar( 'header_widgets' ); ?>
			</div>
		<?php endif; ?>
			
	</div><!-- header -->
			
	<nav id="nav" class="clear">		
		<?php wp_nav_menu(array('theme_location' => 'nav-one')); ?>
		
		<?php if ((asteroid_option('menu_search')) == 1 ) : ?>
			
			<form role="search" method="get" id="nav-search" action="<?php echo home_url( '/' ); ?>">
				<input type="text" id="searchinput" value="Search" onfocus="if (this.value == 'Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search';}" name="s" />
				<input type="submit" id="searchsubmit" value="" />
			</form>
		
		<?php endif; ?>
		
	</nav>

	<?php if ( is_active_sidebar( 'after_menu_widgets' ) ) : ?>
		<div id="after-menu-widgets-wrap">
			<?php dynamic_sidebar( 'after_menu_widgets' ); ?>
		</div>
	<?php endif; ?>

	<div id="content" class="clear" >