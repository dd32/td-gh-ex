<?php
/**
 * The template for displaying all pages
 *
 * @package Fmi
 */

// header
get_header();

$page_sidebar = get_theme_mod( 'page_sidebar', 'right' );
?>
<div class="site-content sidebar-<?php echo esc_attr( $page_sidebar ); ?>">
  <div class="vs-container">
    <div id="content" class="main-content">



          <div id="primary" class="content-area">
            <main id="main" class="site-main">

              <?php
              while ( have_posts() ) {
                the_post();
              ?>

            <?php get_template_part( 'template-parts/content-page' ); ?>
            
            <?php do_action( 'vs_page_after' ); ?>

              <?php
              }
              ?>

            </main>
          </div>

      <?php
      if ( 'disabled' !== $page_sidebar ) {
        get_sidebar(); 
      }
      ?>
    </div>
  </div>
</div>

<?php
// footer
get_footer();
