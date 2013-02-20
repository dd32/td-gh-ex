<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
		
	<?php if ( is_active_sidebar( 'widgets_body' ) ) : ?>
		<div id="body-widgets-wrap">
			<?php dynamic_sidebar( 'widgets_body' ); ?>
		</div>
	<?php endif ; ?>
		
<div id="container">
		
	<div id="header">

		<div id="header-info-wrap">
		
			<?php if ( asteroid_option('ast_header_logo') != '' ) : ?>
				<div id="header-logo"><a href="<?php echo home_url(); ?>">
					<img src="<?php echo asteroid_option('ast_header_logo'); ?>" <?php echo (apply_filters( 'asteroid_filter_logo_alt', 'alt=""')); ?> /></a>
				</div>
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
		<!-- Searchform -->
		<?php if ( asteroid_option('ast_menu_search') == 1 ) : ?>
			<div id="nav-search">
				<!-- Custom -->
				<form id="searchform" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
					<input id="s" type="text" value="Search" onfocus="if (this.value == 'Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search';}" name="s" />
					<input id="searchsubmit" type="submit" value="" />
				</form>
			</div>
		<?php endif; ?>
	</nav>

	<?php if ( is_active_sidebar( 'widgets_below_menu' ) ) : ?>
		<div id="widgets-wrap-below-menu">
			<?php dynamic_sidebar( 'widgets_below_menu' ); ?>
		</div>
	<?php endif; ?>

<div id="main">