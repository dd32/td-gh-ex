<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package beetech
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'beetech_before' ); ?>
<div id="page" class="site">
	<?php do_action( 'beetech_before_header' ); ?>
	<div class="bt-whole-header">
		<header id="masthead" class="site-header" role="banner">
			<div class="bt-wrapper">
				<div class="bt-header-wrapper clearfix">
					<div class="site-branding">
						  <?php 
							if ( function_exists( 'the_custom_logo' ) ) {
								the_custom_logo();
							}
    						?>
    						<div class="site-title-wrapper">
    							<?php
    								if ( is_front_page() && is_home() ) : ?>
    									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    							<?php else : ?>
    									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
    							<?php
    								endif;
    
    								$description = get_bloginfo( 'description', 'display' );
    								if ( $description || is_customize_preview() ) : ?>
    									<p class="site-description"><?php echo esc_html($description); /* WPCS: xss ok. */ ?></p>
    							<?php
    								endif; 
    							?>
    						</div><!-- .site-title-wrapper -->
                            
					</div><!-- .site-branding -->

					<?php do_action( 'beetech_main_menu' ); ?>
				</div><!-- .bt-header-wrapper-- >
			</div><!-- .bt-wrapper -->
		</header><!-- #masthead -->
		
	</div><!-- .bt-whole-header -->
	<?php 
		if( is_front_page() || is_home()) {
			do_action( 'beetech_homepage_slider' );	
		} else {
			do_action( 'beetech_innerpage_header' );
		}
	?>

	<div id="content" class="site-content">
		<div class="bt-wrapper-all">