<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package arrival
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php if ( ! arrival_is_amp() ) : ?>
		<script>document.documentElement.classList.remove("no-js");</script>
	<?php endif; ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'arrival' ); ?></a>
		<header id="masthead" class="site-header">
			<?php do_action('arrival_mob_nav'); ?>
			<?php if( function_exists('arrival_top_header')):
				arrival_top_header();
			endif; ?>
			
			<?php if ( has_header_image() ) : ?>
				<figure class="header-image">
					<?php the_header_image_tag(); ?>
				</figure>
			<?php endif; ?>
			<?php 
			$default = arrival_get_default_theme_options();
			$arrival_main_nav_layout = get_theme_mod('arrival_main_nav_layout',$default['arrival_main_nav_layout']);
			$arrival_top_header_enable = get_theme_mod('arrival_top_header_enable',$default['arrival_top_header_enable']);
			 ?>
			<div class="main-header-wrapp <?php echo esc_attr($arrival_main_nav_layout.' '.$arrival_top_header_enable)?>">
				<div class="container op-grid-two">
				<?php do_action('arrival_main_nav'); ?>
				</div>
			</div>

		</header><!-- #masthead -->

<?php 
	$class = 'site';

if( is_page_template('tpl-home.php') ){
		$class = 'front-page';
	}

 ?>
<div id="page" class="<?php echo esc_attr($class)?>">