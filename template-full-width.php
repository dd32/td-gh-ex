<?php
/**
 * Template Name: Page Full Width Template
 *
 * @package boxy
 */

get_header(); ?>

<div class="breadcrumb-wrap">
	<div class="container">
		<div class="sixteen columns">
	        <header class="entry-header ten columns">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
			<div class="breadcrumb six columns">
				<?php if ( get_theme_mod('breadcrumb' ) && function_exists( 'boxy_breadcrumbs' ) ) : ?>
					<div id="breadcrumb" role="navigation">
						<?php boxy_breadcrumbs(); ?>
					</div>
				<?php endif; ?>  
			</div>
		</div>
	</div>
</div>

	<?php do_action('boxy_before_content'); ?>

	<div id="content" class="site-content container">
         <div id="primary" class="content-area  sixteen columns">

			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
<?php get_footer(); ?>
