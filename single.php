<?php
/**
 * The single template
 *
 * - Includes previous and next article link and comment form.
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
        <article <?php post_class();?>>
          <div class="entry-date">
            <?php echo get_the_date(); ?>
          </div><!-- .entry-date -->
          <h2 class="entry-title">
            <?php the_title();?>
          </h2><!-- .entry-title -->

          <?php if(has_post_thumbnail()):?>
          <div class="entry-thumbnail">
            <?php the_post_thumbnail('full');?>
          </div><!-- .entry-thumbnail -->
          <?php endif;?>

          <div class="entry-content">
            <?php the_content();?>
          </div><!-- .entry-content -->

          <div class="pagenation clearfix">
            <span class="prev"><?php next_post_link('%link', '&lsaquo;%title');?></span>
            <span class="next"><?php previous_post_link('%link', '%title&rsaquo;');?></span>
          </div>

          <div class="tag">
            <?php the_tags(); ?>
          </div><!-- .tag -->

        </article>

        <?php wp_link_pages(); ?>
        <?php comments_template(); ?>

        <?php endwhile;?>
      </main><!-- #main -->
    </div><!-- #primary -->

    <?php get_sidebar();?>

  </div><!-- .container -->
</div><!-- #wrap -->

<?php get_footer();
