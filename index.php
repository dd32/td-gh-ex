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
 * @package Avien_Light
 */

get_header(); ?>

	<!--/.container -->
	<div class="container">
	
		<!--/.row -->
		<div class="row">
		
			<!--/.theme-layout-start-->
			<div class="col-md-12 nopadding">
			
			<!-- #content -->
			<div id="content" class="site-content col-md-9" role="main">

			<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

			</div>
			<!-- #content -->
			
			<!-- sidebar right -->
			<?php get_sidebar(); ?>
			<!-- sidebar right -->
			
		</div><!--/.row -->
		
	</div><!--/.container -->
	
</div><!--/.theme-layout-end-->
<?php get_footer(); ?>
