<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php do_action('ast_hook_before_body'); ?>

	<?php if ( is_active_sidebar('widgets_body') ) : ?>
		<div id="body-widgets-wrap"><?php dynamic_sidebar('widgets_body'); ?></div>
	<?php endif ; ?>

<div id="container" class="cf">
	<?php do_action('ast_hook_before_container'); ?>

	<div id="header" class="cf">
		<?php do_action('ast_hook_before_header'); ?>
		<div id="header-info-wrap" class="cf">
			<?php if ( asteroid_option('ast_header_logo') != '' ) : ?>
				<div id="header-logo" class="cf"><a href="<?php echo esc_url( home_url('/') ); ?>">
					<img src="<?php echo asteroid_option('ast_header_logo'); ?>" <?php echo apply_filters( 'asteroid_logo_alt', 'alt=""' ); ?> /></a>
				</div>
			<?php else : ?>
				<?php if (! ('blank' == get_header_textcolor() )) : ?>
					<div id="header-text" class="cf">
						<h1 id="site-title"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
						<h4 id="site-description"><?php bloginfo( 'description' ); ?></h4>		
					</div>
				<?php endif; ?>
			<?php endif ; ?>
		</div>

		<?php if ( is_active_sidebar('widgets_header') ) : ?>
			<div id="widgets-wrap-header" class="cf"><?php dynamic_sidebar('widgets_header'); ?></div>
		<?php endif; ?>
		<?php do_action('ast_hook_after_header'); ?>
	</div>

	<nav id="nav" class="cf">
		<?php do_action('ast_hook_before_nav'); ?>
		<!-- Menu -->
		<?php wp_nav_menu( array(
			'theme_location' 	=> 	'ast-menu-primary',
			'container' 		=> 	false,
			'fallback_cb'		=>	'wp_page_menu' )
			); 
		?>
		<?php do_action('ast_hook_after_nav'); ?>
	</nav>

	<?php if ( is_active_sidebar('widgets_below_menu') ) : ?>
		<div id="below-menu" class="cf">
			<div id="widgets-wrap-below-menu" class="cf"><?php dynamic_sidebar('widgets_below_menu'); ?></div>
		</div>
	<?php endif; ?>

<div id="main" class="cf">
<?php do_action('ast_hook_before_main'); ?>