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
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'template-parts/content', 'single' ); ?>
      <?php endwhile; ?>
      <div class="col-md-4">
        <?php get_sidebar(); ?>        
      </div>
    </div>
    <div class="map"></div>
    <div id="particles-js"></div>
  </div>
</section>
<?php get_footer(); ?>