<?php
/**
 * Template part for displaying posts
 *
 * @package fmi
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if (has_post_thumbnail()) {?> 
  <div class="post-media">
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_post_thumbnail();?></a>
  </div>
  <?php }?>

  <div class="post-content">
    <?php fmi_entry_header(); ?>
    
    <div class="entry-content clearfix">
      <?php
      the_content();

      wp_link_pages(array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fmi' ),
        'after' => '</div>',
      ));
      ?>
    </div><!-- .entry-content -->

    <?php fmi_entry_footer(); ?>
  </div>
</article><!-- #post-<?php the_ID(); ?> -->
