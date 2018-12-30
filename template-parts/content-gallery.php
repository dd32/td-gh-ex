<?php
/**
 * Template for displaying content
 *
 * @package Bidnis
 * @since 1.0.0
 */
?>
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <?php get_template_part( 'template-parts/header', 'entry' ); ?>

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
    $bidnis_gallery = get_post_gallery();
    
    if ( !is_single() && $bidnis_gallery ) {   
      
      echo $bidnis_gallery;
    
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