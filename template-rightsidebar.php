<?php
/**
 * Template Name: Sidebar Right
 */

get_header(); ?>
	<div class="container">
		<div class="sixteen columns breadcrumb">	
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
			<?php if ( get_theme_mod('breadcrumb' ) && function_exists( 'greenr_breadcrumbs' ) ) : ?>
				<div id="breadcrumb" role="navigation">
					<?php greenr_breadcrumbs(); ?>
				</div>
			<?php endif; ?> 
		</div>
	</div>

<div id="content" class="site-content container">
		<div id="primary" class="content-area eleven columns">
			
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>

		<?php get_footer(); ?>