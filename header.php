<?php
/**
* The Header for our theme.
*
* Displays all of the <head> section
*
* @package beam
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">	
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>> 
	<div id="page" class="hfeed site">
		<?php do_action( 'beam_before_header' ); ?>
		<header id="masthead" class="site-header">
			<div class="centeralign-header">
				<?php do_action( 'beam_before_branding' ); ?>
				<div class="site-branding">
				<?php 
					// No Custom Logo, just display the site's name
					if (!has_custom_logo()) {
						?>
						<h4><?php bloginfo('name'); ?></h4>
						<?php
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php 
							endif;
					} else {
						// Display the Custom Logo
						the_custom_logo();
					}
				?>
				</div><!-- #site-branding -->
				<?php do_action( 'beam_after_branding' ); ?>
				<?php 
				$opt_menu_visibility = get_theme_mod( 'opt_menu_visibility', 'option-1' );
                if ($opt_menu_visibility !== '') {
                	if ($opt_menu_visibility == 'option-1') {
				?>

				<button class="menu-toggle menu-button"><?php _e('Responsive Menu', 'beam' ); ?></button>

				<div class="mobile-menu">
					<?php $args = array(
							'container'      => '',
							'items_wrap'     => '<ul class="menu">%3$s</ul>',
							); 
					?>
					<nav id="site-navigation" class="main-navigation clearfix">
						<?php wp_nav_menu($args);//extract the content from apperance-> nav menu ?>
					</nav><!-- #access -->
				</div>	
				<?php do_action( 'beam_after_nav' ); ?>

				<?php } } ?>

			</div><!-- centeralign-header -->
		</header><!-- #header-->
		<?php do_action( 'beam_after_header' ); ?>