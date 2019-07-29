<?php
/**
 * Template part for displaying static pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="ct-static-width-blog ct-static-blog-bg">
    <div class="ct-static-blog-title ct-static-post-style ct-divider u-cf">
      <div class="ct-post-title">
            <?php the_title( '<h2>', '</h2>' ); ?>
      </div><!-- /.ct-post-title -->
    </div><!-- /.ct-static-blog-title -->

    <div class="ct-static-post-excerpt ct-static-post-style">
      <?php
        the_content(
          sprintf(
            /* translators: %s: Name of current post */
            __( '<p> "%s"</p>', 'apex-business' ),
            get_the_title()
          )
        );
      ?>
    </div><!-- /.ct-static-post-excerpt -->

    <?php
      wp_link_pages(
        array(
          'before'      => '<div class="link-pages-wrap clearfix"><div class="link-pages">' . esc_html__( 'Continue Reading:', 'apex-business' ),
          'after'       => '</div></div>',
          'link_before' => '<span class="page-numbers button">',
          'link_after'  => '</span>',
        )
      );
    ?>
  </div><!-- /.ct-static-width-blog -->
</div>
