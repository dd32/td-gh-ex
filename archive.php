<?php
/**
 * Template for displaying archives
 *
 * @package Bidnis
 * @since 1.0.0
 * @version 1.2.0
 */
?>

<?php get_header(); ?>

<div id="main-content-container" class="wrapper">

  <?php get_sidebar( 'left' ); ?>

  <main id="site-main" role="main">

    <header class="page-header">
      <?php the_archive_title( '<h1>', '</h1>' ); ?>
      <?php the_archive_description(); ?>
    </header>

    <?php if ( have_posts() ): ?>
    
      <?php while ( have_posts() ): the_post(); ?>
    
        <?php get_template_part( 'template-parts/content', 'excerpt' ); ?>

      <?php endwhile; ?>

      <?php
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
      ?>

    <?php else: ?>
      
      <?php get_template_part( 'template-parts/content', 'none' ); ?>

    <?php endif;?>
    
  </main><!-- #site-main -->

  <?php get_sidebar(); ?>

</div><!-- #main-content-continer -->

<?php get_footer(); ?>