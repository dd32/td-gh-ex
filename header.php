<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Skylark
 * @since Skylark 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'skylark' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<!--[if lt IE 8]> 
<link href="<?php echo get_template_directory_uri(); ?>/inc/ie.css" rel="stylesheet" type="text/css" />
<![endif]-->

<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>

<script src="<?php echo get_template_directory_uri(); ?>/js/filterable.js" type="text/javascript"></script>


<?php wp_head(); ?>

<!-- start bxSlider -->

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.3.js" type="text/javascript"></script>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.bxSlider.min.js" type="text/javascript"></script>

<script type="text/javascript">
jQuery(document).ready(function($) {
  $('#slider').bxSlider({
	pager: false,
	mode: 'fade',
    auto: true,
	pause: 5000, // spacing in milliseconds 
    controls: true
  });
  });
</script>
<!-- end bxSlider -->
</head>

<body <?php body_class(); ?>>
<?php if (is_front_page()) : ?><div id="frontpageheader"><?php else : ?><div id="header"><?php endif; ?>
		
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="header-wrapper">
		<hgroup id="logo">
			<h1 id="sitetitle"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 id="sitedesc"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

		<nav role="navigation" class="site-navigation main-navigation">
			<h1 class="assistive-text"><?php _e( 'Menu', 'skylark' ); ?></h1>
			<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'skylark' ); ?>"><?php _e( 'Skip to content', 'skylark' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav>
	</div>
	</header><!-- #masthead .site-header -->

<!-- DO NOT EDIT THE FOLLOWING UNLESS YOU KNOW WHAT YOU'RE DOING. ANY MISTAKES WILL BREAK SLIDER. -->
<?php if (is_front_page()) : ?>	
			<div id="sliderwrapper">
<div id="slider">			
     
<?php query_posts("post_type=projects"); global $more; $more = 0; while (have_posts()) : the_post(); ?>
<div>
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="header-post-thumb"><?php the_post_thumbnail('header'); ?></a>

<div class="slider-content"><h2 class="slider-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<?php the_content('Learn More'); ?>
</div>
</div>
<?php endwhile; ?>
</div><!-- end #slider -->
			
			</div><!-- end #sliderwrapper -->
<?php endif; ?>
<!-- END DO NOT EDIT -->
</div><!-- end #header -->

<div id="page" class="hfeed site">
	<div id="main">