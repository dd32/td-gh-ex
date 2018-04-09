<?php
/**
 * The template for displaying all single posts.
 *
 * @package agency-x
 */

get_header(); ?>
<section id="blog" class="section page">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'template-parts/content', 'single' ); ?>
      <?php endwhile; ?>
      </div>
      <div class="col-md-4">
        <?php get_sidebar(); ?>        
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>