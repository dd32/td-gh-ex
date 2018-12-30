<?php
/**
 * Template for displaying video content
 *
 * @package Bidnis
 * @since 1.0.0
 */
?>
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <?php if ( is_single() ) get_template_part( 'template-parts/header', 'entry' ); ?>

  <?php if ( 
    get_the_post_thumbnail() !== '' &&
    (
      (  is_singular() && get_theme_mod( 'thumbnail_content', true ) ) ||
      ( !is_singular() && get_theme_mod( 'thumbnail_index',   true ) )
    )
  ): ?>
    
    <a class="post-thumbnail" href="<?php the_permalink() ?>">
      
      <?php the_post_thumbnail( 'bidnis-featured-image' ); ?>
    
    </a><!-- .post-thumbnail -->
  
  <?php endif; ?>

  <article class="entry-content">
    
    <?php 
    $bidnis_anchor_content = apply_filters( 'the_content', get_the_content() );
    $bidnis_anchor = false;

    // Only get video from the content if a playlist isn't present.
    $anchor = get_media_embedded_in_content( $bidnis_anchor_content, array( 'a' ) );
    
    if ( !empty( $bidnis_anchor ) ) {

      foreach ( $bidnis_anchor as $bidnis_anchor_html ) {
        echo $bidnis_anchor_html;
      }

    } else {

      the_content();

      wp_link_pages( array(
        'before' => '<div class="page-links">' . __( 'Pages:', 'bidnis' ),
        'after' => '</div>',
        'link_before' => '<span class="page-number">',
        'link_after' => '</span>',
      ) );

    }
    ?>
  
  </article><!-- .entry-content -->

  <?php if ( is_single() ) get_template_part('template-parts/footer', 'entry'); ?>
  
</section>