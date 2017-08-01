<?php
/**
 * The template for displaying all pages
 *
 * - Body element has 'page-xxx' class. ('xxx' is the page slug.)
 *
 * @package WordPress
 * @since Base For Original 1.0
 */

get_header(); ?>

<div id="wrap">
  <div id="main_visual">
    <h2 class="container">
    <?php if(!is_front_page()):?>
      <?php the_title_attribute();?>
    <?php endif;?>
    </h2>
  </div><!-- #main_visual -->

  <div class="container clearfix">
    <div id="primary">
      <main id="main" role="main" class="clearfix">
        <?php while(have_posts()):the_post();?>
        <?php the_content();?>
        <?php endwhile; ?>

        <?php comments_template(); ?>

      </main><!-- #main -->
    </div><!-- #primary -->

    <?php get_sidebar(); ?>

  </div><!-- .container -->
</div><!-- #wrap -->

<?php get_footer();
