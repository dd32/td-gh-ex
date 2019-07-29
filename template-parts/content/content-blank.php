<?php
/**
 * Template part for displaying static blank or full width pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="ct-static-blog-title ct-static-post-style u-cf">
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
</div>
