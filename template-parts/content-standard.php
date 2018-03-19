<?php
/**
 * Template part for displaying posts in the standard post format
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fmi
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if ( has_post_thumbnail() ):?> 
  <div class="entry-image">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_post_thumbnail();?></a>
    </div>
    <?php endif;?>

  <div class="entry-info">
  <header class="entry-header">
    <?php
    if ( is_singular() ) :
      the_title( '<h1 class="entry-title">', '</h1>' );
    else :
      the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    endif;

    if ( 'post' === get_post_type() ) : ?>
    <div class="entry-meta clearfix">
      <?php fmi_posted_on(); ?>
    </div><!-- .entry-meta -->
    <?php
    endif; ?>
  </header><!-- .entry-header -->

  <?php fmi_post_excerpt();?>

  <footer class="entry-footer">
    <?php fmi_entry_footer(); ?>
  </footer><!-- .entry-footer -->
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
