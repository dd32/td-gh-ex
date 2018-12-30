<?php
/**
 * Template for displaying search results
 *
 * @package Bidnis
 * @since 1.0.0
 * @version 1.2.0
 */
?>

<?php get_header(); ?>

<main id="site-main" role="main">
  
  <header class="page-header">
    <?php
    if ( have_posts() ) {
      printf(
        '<h1>' . __( 'Search results for: %s', 'bidnis' ) . '</h1>',
        '<span>' . esc_html( get_search_query() ) . '</span>'
      );
    } else {
      printf(
        '<h1>' . __( 'Nothing found', 'bidnis' ) . '</h1>'
      );
    }
    ?>
  </header>

  <?php
  if ( have_posts() ) {
    while ( have_posts() ) {
      the_post();
      get_template_part( 'template-parts/content', 'excerpt');
    }

    if ( get_theme_mod( 'page_numbers', false ) ) {
      
      the_posts_pagination( array(
        'prev_text'          => __( 'Previous page', 'bidnis' ),
        'next_text'          => __( 'Next page', 'bidnis' ),
        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bidnis' ) . ' </span>',
      ) );

    } else {
      
      the_posts_navigation( array(
        'prev_text' => __( 'Older', 'bidnis' ),
        'next_text' => __( 'Newer', 'bidnis' ),
      ) ); 
    
    }
  
  } else {
    
    get_template_part( 'template-parts/content', 'none');
  
  }
  ?>
</main><!-- #site-main -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>