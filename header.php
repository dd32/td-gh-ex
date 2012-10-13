<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="screen" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	
	<?php wp_head(); ?>
	<?php do_action('ast_hook_custom_css'); ?>
</head>

<body <?php body_class(); ?> >
		
	<?php if ( is_active_sidebar( 'widgets_body' ) ) : ?>
		<div id="body-widgets-wrap">
			<?php dynamic_sidebar( 'widgets_body' ); ?>
		</div>
	<?php endif ; ?>
		
<div id="container">
		
	<div id="header" class="clear" style="background-image:url('<?php header_image(); ?>'); background-size:<?php echo get_custom_header()->width . "px " . get_custom_header()->height . "px" ?>;">

		<div id="header-info-wrap">
		
			<?php if ( asteroid_option('ast_header_logo') != '' ) : ?>
				<div id="header-logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo asteroid_option('ast_header_logo'); ?>" /></a></div>
			<?php else : ?>
				<?php if (! ('blank' == get_header_textcolor() )) : ?>
					<hgroup>
						<h1 id="site-title"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
						<h4 id="site-description"><?php bloginfo( 'description' ); ?></h4>		
					</hgroup>
				<?php endif; ?>
			<?php endif ; ?>

		</div>
	
		<?php if ( is_active_sidebar( 'widgets_header' ) ) : ?>
			<div id="widgets-wrap-header">
				<?php dynamic_sidebar( 'widgets_header' ); ?>
			</div>
		<?php endif; ?>
			
	</div>

	
	<nav id="nav">
		<!-- Menu -->
		<?php wp_nav_menu( array(
			'theme_location' 	=> 	'ast-menu-primary',
			'container' 		=> 	false )
			); 
		?>
		
		<?php if ( asteroid_option('ast_menu_search') == 1 ) : ?>
			<form role="search" method="get" id="nav-search" action="<?php echo home_url( '/' ); ?>">
				<input type="text" id="searchinput" value="Search" onfocus="if (this.value == 'Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search';}" name="s" />
				<input type="submit" id="searchsubmit" value="" />
			</form>
		<?php endif; ?>	
	</nav>

	<?php if ( is_active_sidebar( 'widgets_below_menu' ) ) : ?>
		<div id="widgets-wrap-below-menu">
			<?php dynamic_sidebar( 'widgets_below_menu' ); ?>
		</div>
	<?php endif; ?>

<div id="content">