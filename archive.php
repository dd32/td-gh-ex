<?php
/**
 * The template for displaying archive pages
 *
 * - Display the thumbnail, title, and excerpt.
 *
 * @package WordPress
 * @since Base For Original 1.0
 */

get_header(); ?>

<div id="wrap">
  <div class="container clearfix">
    <div id="primary">
      <main id="main" role="main" class="clearfix">
        <?php if ( have_posts() ) : ?>

        <h2 class="archive-title"><?php the_archive_title(); ?></h2>

        <?php while ( have_posts() ) : the_post(); ?>

        <article class="archive-entry">
          <div class="entry-thumbnail">
            <?php if(has_post_thumbnail()):?>
            <?php the_post_thumbnail('thumbnail');?>
            <?php else:?>
            <img src="<?php echo esc_url(get_template_directory_uri())?>/images/no_image.png" />
            <?php endif;?>
          </div><!-- .entry-thumbnail -->
          <div class="entry-main">
            <p class="entry-date"><?php the_time('Y.m.d');?></p>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title_attribute(); ?></a></h3>
            <p class="entry-content">
            <?php
              if(mb_strlen($post->post_title, 'UTF-8') > 100){
                echo mb_substr(strip_tags($post->post_title), 0, 100, 'UTF-8').'...';
              }else{
                echo strip_tags($post->post_title);
              }
            ?>
            </p>
          </div><!-- .entry-main -->
        </article><!-- .archive-entry -->

        <?php endwhile; endif; ?>

        <?php
        the_posts_pagination( array(
          'mid_size' => 3,
          'prev_text' => __('Prev Page', 'base-for-original'),
          'next_text' => __('Next Page', 'base-for-original'),
        ) );
        ?>
      </main><!-- #main -->
    </div><!-- #primary -->

    <?php get_sidebar(); ?>

  </div><!-- .container -->
</div><!-- #wrap -->

<?php get_footer();
