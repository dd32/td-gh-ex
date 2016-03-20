<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.1
 */

// $aguafuerte_theme_options = aguafuerte_get_options( 'aguafuerte_theme_options' );
get_header(); ?>

<div class="inner">
	<div id="main-content">        
			<?php

				//get_template_part('template-parts/section', 'author');
				get_template_part('template-parts/section', 'featured-content');
				get_template_part('template-parts/section', 'latest');
				get_template_part('template-parts/section', 'category');
				get_template_part('template-parts/section', 'small-formats');

			?>
			      
	</div><!--/main-content-->

	<?php get_sidebar('sidebar'); ?>
</div><!--/inner-->

<div class="clear"></div>
<?php get_footer(); ?>

