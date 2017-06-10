<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- Page Wrapper -->
	<div id="page-wrap">

		<!-- Boxed Wrapper -->
		<div id="page-header" <?php echo ashe_options( 'general_header_width' ) === 'boxed' ? 'class="boxed-wrapper"': ''; ?>>

		<!-- Top Bar -->
		<?php get_template_part( 'templates/header/top', 'bar' ); ?>

		<!-- Main Navigation -->
		<?php
		if ( ashe_options( 'main_nav_position' ) === 'above' ) {
			get_template_part( 'templates/header/main', 'navigation' );
		}
		?>

		<!-- Page Header -->
		<?php get_template_part( 'templates/header/page', 'header' ); ?>

		<!-- Main Navigation -->
		<?php
		if ( ashe_options( 'main_nav_position' ) === 'below' ) {
			get_template_part( 'templates/header/main', 'navigation' );
		}
		?>

		</div><!-- .boxed-wrapper -->