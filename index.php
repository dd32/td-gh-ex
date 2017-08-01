<?php
/**
 * The main template
 *
 * @package WordPress
 * @since Base For Original 1.0
 */

get_header(); ?>

<div id="wrap">
  <div class="container clearfix">
    <div id="primary">
      <main id="main" role="main" class="clearfix">
        <?php while(have_posts()):the_post();?>
        <?php the_content();?>
        <?php endwhile;?>
      </main><!-- #main -->
    </div><!-- #primary -->

    <?php get_sidebar();?>

  </div><!-- .container -->
</div><!-- #wrap -->

<?php get_footer();
