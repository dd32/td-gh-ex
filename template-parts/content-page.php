<?php
/**
 * Template part page content
 *
 * @package Fmi
 */

?>
<article <?php post_class( 'entry' ); ?>>
<?php if (has_post_thumbnail()) {?> 
  <div class="post-media">
    <?php the_post_thumbnail();?>
  </div>
<?php }?>

  <div class="post-content">
    <div class="entry-header">
      <div class="entry-header-inner">
      <?php the_title( '<h1 class="entry-title">', '</h1>' );?>
      </div>
    </div>
    
      <?php
      $page_comments = get_theme_mod( 'page_comments', 1 );
      if ( $page_comments ) {
      ?>
      <div class="entry-meta">
        <div class="entry-meta-inner">
          <?php
          if ( $page_comments ) { vs_get_meta_comments(); }
          ?>
        </div>
      </div>
      <?php
      }
      ?>

    <div class="entry-content clearfix">
      <?php
        the_content();

        wp_link_pages( array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fmi' ),
          'after'  => '</div>',
        ) );
      ?>
    </div>

  </div>
</article>
