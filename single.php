<?php
/**
 * The template for displaying all single posts.
 *
 * @package avata
 */

get_header(); ?>

<section class="page-main" id="content">
  <div class="container">
    <div id="primary" class="content-area">
      <div class="row">
        <main id="main" class="site-main col-md-9" role="main">
          <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'content', 'single' ); ?>
          <?php avata_post_nav(); ?>
          <?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>
          <?php endwhile; // end of the loop. ?>
        </main>
        <!-- #main -->
        <?php get_sidebar(); ?>
      </div>
    </div>
    <!-- #primary -->
  </div>
</section>
<?php get_footer(); ?>
