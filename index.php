<?php
/**
 * The main template file.
 *
 *
 * @package Adagio Lite
 */

get_header(); ?>
  <div id="contentwrapper">
    <div id="content">
      <?php if (have_posts()) : ?>
      <?php while ( have_posts() ) : the_post();
  				get_template_part( 'content', get_post_format() );
  			endwhile; ?>
      <?php adagio_paging_nav(); ?>
      <?php else : ?>
      <p class="center">
        <?php esc_html_e( 'You don&#39;t have any posts yet.', 'adagio-lite' ); ?>
      </p>
      <?php endif; ?>
    </div>
  </div>
<?php get_footer(); ?>
