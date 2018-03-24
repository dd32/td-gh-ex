<?php
/**
 * Template part for displaying posts in the standard post format
 *
 * @package fmi
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if ( has_post_thumbnail() ):?> 
  <div class="post-media">
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_post_thumbnail();?></a>
  </div>
  <?php endif;?>

  <div class="post-content">
    <?php fmi_entry_header(); ?>

    <?php fmi_entry_content();?>

    <?php fmi_entry_footer(); ?>
  </div>
</article><!-- #post-<?php the_ID(); ?> -->
