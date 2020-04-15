<?php
/**
 * The template for displaying blog posts with pagination and sidebar
 *
 * @package Fmi
 */

if ( is_home() && get_theme_mod( 'activate_slider', 0 ) ) {
  get_template_part( 'template-parts/homepage-slider' );
}

$homepage_sidebar = get_theme_mod( 'homepage_sidebar', 'right' );
if ( ! have_posts() ) { $homepage_sidebar = 'disabled'; }
?>
<div class="site-content sidebar-<?php echo esc_attr( $homepage_sidebar ); ?>">
  <div class="vs-container">
    <div id="content" class="main-content">
      <div id="primary" class="content-area">
        <main id="main" class="site-main">
        <?php
        if ( have_posts() ) {
          ?>
          <div class="post-archive">
            <div class="archive-wrap">
              <div class="archive-main archive-full">
              <?php 
              while ( have_posts() ) {
                the_post();

                get_template_part( 'template-parts/content-homepage' );

              }
              ?>
              </div>
            </div>
            
            <?php
            if ( 'pagination' === get_theme_mod( 'homepage_pagination_type', 'pagination' ) ) {
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

          <div class="entry-content content-not-found">
            <h3><?php esc_html_e( 'Nothing found', 'fmi' ); ?></h3>
            <?php if ( current_user_can( 'publish_posts' ) ) { ?>
              <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'fmi' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
            <?php } else { ?>
              <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'fmi' ); ?></p>
            <?php } ?>
          </div>

          <?php
        }
        ?>

            </main>
          </div>

      <?php
      if ( 'disabled' !== $homepage_sidebar ) {
        get_sidebar(); 
      }
      ?>
    </div>
  </div>
</div>
