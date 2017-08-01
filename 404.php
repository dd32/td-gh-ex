<?php
/**
 * The template for displaying 404 pages (not found)
*
 * - Includes link button to the top page.
 *
 * @package WordPress
 * @since Base For Original 1.0
 */

get_header(); ?>

<div id="wrap">
  <div class="container clearfix">
    <div id="primary">
      <main id="main" role="main" class="clearfix">
        <p><?php _e('Page not found.', 'base-for-original'); ?></p>
        <div class="control">
          <a class="button" href="<?php echo esc_url(home_url());?>"><?php _e('To Home', 'base-for-original'); ?></a>
        </div><!-- .control -->
      </main><!-- #main -->
    </div><!-- #primary -->

    <?php get_sidebar(); ?>

  </div><!-- .container -->
</div><!-- #wrap -->

<?php get_footer();
