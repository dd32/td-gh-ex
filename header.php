<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Academic
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'academic' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="site-branding">
				<?php
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
			</div><!-- .site-branding -->

			<?php if ( has_nav_menu( 'primary' ) ) { ?>
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'academic' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->
			<?php } ?>
		</div><!-- end .container -->
	</header><!-- #masthead -->

	<?php
	$enable = get_theme_mod( 'slider_enable' );
	if ( 'static-frontpage' == $enable ) { ?>
	<!-- cycle2 slider -->
	<section class="main-slider">
       	<div class="cycle-slideshow" data-cycle-timeout="2500" data-cycle-pause-on-hover="false" data-cycle-speed="800" data-cycle-next="#next" data-cycle-prev="#prev">
           <div class="black-overlay"></div>
           <?php
           $ids = array();

  				for ( $i = 1; $i <= 3 ; $i++ ) {
  				    $id = null;
  				    $options = get_theme_mod( 'slider_content_page_'.$i );
  				    if ( ! empty( $options ) ) {
  				        $id = $options;
  				    }
  				    if ( ! empty( $id ) ) {
  				        $ids[] = absint( $id );
  				    }
  				}
  				$args = array(
  				    'no_found_rows'  => true,
  				    'orderby'        => 'post__in',
  				    'post_type'      => 'page',
  				    'post__in'       => $ids,
  				);

  				// Fetch posts.
  				$posts = get_posts( $args );
  				foreach ($posts as $key => $post) {
  					$page_id = $post->ID;
  					echo get_the_post_thumbnail( $page_id );
  					} ?>
   		</div><!-- end .cycle-slideshow -->
   	<div class="controls">
	       <div class="cycle-prev"><a href="#" id="prev"><i class="fa fa-angle-left"></i></a></div>
	       <div class="cycle-next"><a href="#" id="next"><i class="fa fa-angle-right"></i></a></div>
	   </div><!--end .controls-->
   </section>
	<?php } ?>

	<!-- <?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" alt="" class="banner-image">
	</a>
	<?php endif; // End header image check. ?> -->

	<div id="content" class="site-content">
