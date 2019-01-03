<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Academic_Hub
 */

?>
<!doctype html>
<?php academic_hub_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
	<?php academic_hub_head_top(); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php academic_hub_head_bottom(); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php academic_hub_body_top(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php echo esc_html__( 'Skip to content', 'academic-hub' ); ?></a>

	<?php $academic_hub_header_image = esc_url( get_header_image()); ?>
		
	<div class="header">
		
		<?php academic_hub_top_header_section(); ?>

		<?php academic_hub_header_before(); ?>

		<?php academic_hub_header(); ?>
		
		<?php academic_hub_header_after(); ?>					
	</div><!-- End Header -->

	<?php academic_hub_after_header(); ?>


	<?php academic_hub_content_before(); ?>
	<div id="content" class="site-content">
