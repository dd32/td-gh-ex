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
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php if ( ! arrival_is_amp() ) : ?>
		<script>document.documentElement.classList.remove("no-js");</script>
	<?php endif; ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php 

$default 					= arrival_get_default_theme_options();
$arrival_main_nav_layout 	= get_theme_mod('arrival_main_nav_layout',$default['arrival_main_nav_layout']);
$arrival_top_header_enable 	= get_theme_mod('arrival_top_header_enable',$default['arrival_top_header_enable']);
$_page_header_layout 		= get_theme_mod('arrival_page_header_layout',$default['arrival_page_header_layout']);
$_menu_hover_styles 		= get_theme_mod('arrival_menu_hover_styles',$default['arrival_menu_hover_styles']);

$hdr_class = 'seperate-breadcrumb';
if( $_page_header_layout == 'default' ){
	$hdr_class = 'hdr-breadcrumb';
}
?>

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'arrival' ); ?></a>
		<header id="masthead" class="site-header <?php echo esc_attr($hdr_class.' '.$_menu_hover_styles);?>">
			<?php do_action('arrival_mob_nav'); ?>
			<?php if( function_exists('arrival_top_header')):
				arrival_top_header();
			endif; ?>
			
			<?php if ( has_header_image() ) : ?>
				<figure class="header-image">
					<?php the_header_image_tag(); ?>
				</figure>
			<?php endif; ?>

			

			<div class="main-header-wrapp <?php echo esc_attr($arrival_main_nav_layout.' '.$arrival_top_header_enable)?>">
				<div class="container op-grid-two">
				<?php do_action('arrival_main_nav'); ?>
				</div>
			</div>

			<?php if( $_page_header_layout == 'default' ){
				
				arrival_header_title_display();

			}?>

		</header><!-- #masthead -->

<?php if( $_page_header_layout == 'layout-two' ){
	arrival_header_title_display();

}?>
<?php 
	$class = 'site';

if( is_page_template('tpl-home.php') ){
		$class = 'front-page';
	}

 ?>
<div id="page" class="<?php echo esc_attr($class)?>">