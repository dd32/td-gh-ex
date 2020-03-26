<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package optimize
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'optimize' ); ?></a>
	<header id="masthead" class="site-header">
	<div class="container">
	<div class="row">
	<div class="col-md-5">
	<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			?>
			<?php $optimize_description = get_bloginfo( 'description', 'display' );
			if ( $optimize_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $optimize_description; /* WPCS: xss ok. */ ?></p>			
			<?php endif; ?>  
		</div><!-- .site-branding -->
		</div>
		<div class="col-md-7">
		<?php if ( !dynamic_sidebar('headerwid') ) : ?>
			<?php endif; ?>
			</div>		
</div>		
</div>		
	</header><!-- #masthead -->
	<?php get_template_part('inc/navigation'); ?>
	
	<div id="content" class="site-content">
	<div class="container">
	<?php if (!dynamic_sidebar('belownavi') ) : endif;?>
	<div class="row">