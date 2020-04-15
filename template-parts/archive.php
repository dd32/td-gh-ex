<?php
/**
 * The template for displaying blog posts with pagination and sidebar
 *
 * @package Fmi
 */

$archive_sidebar = get_theme_mod( 'archive_sidebar', 'right' );
if ( is_404() ) { $archive_sidebar = 'disabled'; }
?>
<div class="site-content sidebar-<?php echo esc_attr( $archive_sidebar ); ?>">
  <div class="vs-container">
    <div id="content" class="main-content">
      <div id="primary" class="content-area">
        <main id="main" class="site-main">
        <?php
        get_template_part( 'template-parts/page-header' );
        
        if ( have_posts() ) {
          ?>
          <div class="post-archive">
            <div class="archive-wrap">
              <div class="archive-main archive-full">
              <?php
              while ( have_posts() ) {
                the_post();
                get_template_part( 'template-parts/content-archive' );
              }
              ?>
              </div>
            </div>

            <?php
            if ( 'pagination' === get_theme_mod( 'archive_pagination_type', 'pagination' ) ) {
              the_posts_pagination( array(
                'prev_text'      => '<i class="vs-icon vs-icon-caret-left"></i>',
                'next_text'      => '<i class="vs-icon vs-icon-caret-right"></i>',
              ) );
            } else {
              the_posts_navigation( array(
                'prev_text'      => '<i class="vs-icon vs-icon-caret-left"></i> ' . esc_html__('Older posts','fmi'),
                'next_text'      => esc_html__('Newer posts','fmi') . ' <i class="vs-icon vs-icon-caret-right"></i>',
              ) );
            }
            ?>
          </div>

          <?php
            } else {
            ?>

          <?php if ( is_search() ) {?>
          <div class="entry-content content-not-found">
            <h3><?php esc_html_e( 'Nothing found', 'fmi' ); ?></h3>
            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'fmi' ); ?></p>
          </div>
          <?php } ?>

          <?php if ( is_404() ) {?>
          <div class="entry-content content-not-found page-404">
            <h2><?php esc_html_e( 'Oops... Error 404', 'fmi' ); ?></h1>
            <h3><?php esc_html_e( 'We are sorry, but the page you are looking for does not exist.', 'fmi' ); ?></h2>
            <p><?php printf( __( 'Please check entered address and try again or go to <a href="%1$s" rel="home"><strong>homepage</strong></a>.', 'fmi' ), esc_url( home_url( '/' ) ) ); ?></p>
          </div>
          <?php } ?>
          
          <?php
        }
        ?>

            </main>
          </div>

      <?php
      if ( 'disabled' !== $archive_sidebar ) {
        get_sidebar(); 
      }
      ?>

    </div>
  </div>
</div>
