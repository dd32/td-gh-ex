<?php
/**
 * Template Name: Page Right Sidebar
 */

get_header(); ?>


<div class="page-header">
	<div class="container-box">
		<div class="container">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</div>
	</div>
</div>

<div class="container-box">
	<div class="container">
		<div class="row">
			<div class="four columns">
				<?php get_sidebar(); ?>
			</div>
			<div class="eight columns">
				
				<div class="content-area">
					<main id="main" class="site-main" role="main">

						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'loop-templates/content', 'page' ); ?>
							<?php
								// load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							?>
						<?php endwhile; ?>

					</main><!-- #main -->
				</div><!-- .content-area -->
				
				<!-- Author Meta -->
				<?php get_template_part( 'template-parts/extra/author'); ?>
				
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
