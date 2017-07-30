<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ariel
 */
get_header(); ?>

	<div class="contents">
		<div class="container">
			<?php get_template_part( 'parts/feed' ); ?>
		</div>
	</div>

<?php get_footer();