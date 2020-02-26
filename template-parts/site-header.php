<?php
/**
 * The template for displaying site header
 * @package Chip Life
 */
?>

<header id="masthead" class="site-header">
	<div class="site-header-inside-wrapper">
		<?php
		// Site Branding
		get_template_part( 'template-parts/site-branding' );

		// Site Navigation
		get_template_part( 'template-parts/site-navigation' );
		?>
	</div><!-- .site-header-inside-wrapper -->
</header><!-- #masthead -->
