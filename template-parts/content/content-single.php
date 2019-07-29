<?php
/**
 * Template part for displaying static post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="ct-static-width-blog ct-static-blog-bg">
    <div class="ct-static-blog-title ct-static-post-style u-cf">
      <div class="ct-post-title">
            <?php the_title( '<h2>', '</h2>' ); ?>
      </div><!-- /.ct-post-title -->
      <div class="ct-gradient-date">
        <p><?php echo esc_html( get_the_date() ); ?></p>
      </div><!-- /.ct-static-post-date -->
    </div><!-- /.ct-static-blog-title -->
    <div class="ct-divider"></div><!-- /.ct-divider -->

    <div class="ct-static-post-excerpt ct-static-post-style u-cf">
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
    <div class="ct-divider"></div><!-- /.ct-divider -->

    <?php the_tags(); ?>

    <div class="ct-author-bio-box u-cf">
      <div class="ct-bio-gravatar ct-img-size">
        <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
      </div><!-- /.ct-bio-gravatar -->
      <div class="ct-author-bio-description">
        <h4><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"></a><?php the_author(); ?></h4>
        <?php if ( get_the_author_meta( 'description' ) ): ?>
          <p><?php the_author_meta( 'description' ); ?></p>
        <?php endif ?>
      </div><!-- /.ct-author-bio-description -->
    </div><!-- /.ct-nav-links -->
    <div class="ct-divider"></div><!-- /.ct-divider -->

    <div class="ct-nav-links ct-static-post-style u-cf">
      <?php $apex_business_prev_post = get_adjacent_post( false, '', false ); ?>
      <?php if ( is_a( $apex_business_prev_post, 'WP_Post' ) ) { ?>
      <div class="ct-nav-previous">
        <a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', false)->ID ) ); ?>"><?php esc_html_e( 'Previous Post', 'apex-business' ); ?></a>
        <a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', false)->ID ) ); ?>" class="prev"><?php echo esc_html( get_the_title( $apex_business_prev_post->ID ) ); ?></a>
      </div><!-- /.ct-nav-previous -->
      <?php } ?>

      <?php $apex_business_next_post = get_adjacent_post( false, '', true ); ?>
      <?php if ( is_a( $apex_business_next_post, 'WP_Post' ) ) { ?>
      <div class="ct-nav-next">
        <a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', true)->ID ) ); ?>"><?php esc_html_e( 'Next', 'apex-business' ); ?></a>
        <a href="<?php echo esc_url( get_permalink( get_adjacent_post( false, '', true)->ID ) ); ?>" class="next"><?php echo esc_html( get_the_title( $apex_business_next_post->ID ) ); ?></a>
      </div><!-- /.ct-nav-next -->
      <?php } ?>
    </div><!-- /.ct-nav-links -->
  </div><!-- /.ct-static-width-blog -->
</div>
