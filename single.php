<?php
/**
 * The template for displaying all single posts
 *
 * @package Fmi
 */

// header
get_header();

$post_sidebar = get_theme_mod( 'post_sidebar', 'right' );
?>
<div class="site-content sidebar-<?php echo esc_attr( $post_sidebar ); ?>">
  <div class="vs-container">
    <div id="content" class="main-content">



          <div id="primary" class="content-area">
            <main id="main" class="site-main">

            <?php
            while ( have_posts() ) : the_post();
            ?>

            <?php get_template_part( 'template-parts/content-post' ); ?>
            
            <?php
              $show_about_author = get_theme_mod('single_show_about_author', 0);
              if (!post_password_required() && $show_about_author) {
                vs_about_the_author();
              }

              $show_post_nav = get_theme_mod('single_show_post_nav', 1);
              if ($show_post_nav) {
                vs_post_navigation();
              }

              if ( comments_open() || get_comments_number() ) :
                comments_template();
              endif;

            endwhile; // End of the loop.
            ?>

            </main>
          </div>

      <?php
      if ( 'disabled' !== $post_sidebar ) {
        get_sidebar(); 
      }
      ?>

    </div>
  </div>
</div>

<?php
// footer
get_footer();
