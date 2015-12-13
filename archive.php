<?php
/**
 * The template for displaying archive pages.
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

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

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
			<!--/#content -->
					
			<!-- sidebar right -->	
			<?php get_sidebar(); ?>
			<!-- sidebar right -->
			
		</div><!--/.row -->
		
	</div><!--/.container -->
	
</div><!--/.theme-layout-end-->
<?php get_footer(); ?>
