<?php
/**
 * Template for displaying landing page (home)
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

    <?php
    if ( have_posts() ) {
        while ( have_posts() ) {

        the_post();
        
        $bidnis_post_format = get_post_format();

        if ( $bidnis_post_format || get_theme_mod( 'display_content', false ) ) {

          get_template_part( 'template-parts/content', $bidnis_post_format );

        } else {

          get_template_part( 'template-parts/content', 'excerpt' );

        }
      
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
        
      get_template_part( 'template-parts/content', 'none' );

    }
    ?>
    
  </main><!-- #site-main -->

  <?php get_sidebar(); ?>

</div><!-- #main-content-continer -->

<?php get_footer(); ?>