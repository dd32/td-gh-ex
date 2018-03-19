<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fmi
 */

get_header(); ?>

<div id="content" class="site-content">
  <div class="container">
    <div class="site-content-area">

<?php
$blog_layout = get_theme_mod('blog_layout', 'right_sidebar');

if ($blog_layout == 'right_sidebar') {
?>
      <div class="row">
        <div class="col-md-8 sidebar-right">
<?php
}
if ($blog_layout == 'left_sidebar') {
?>
      <div class="row">
        <div class="col-md-8 col-md-push-4 sidebar-left">
<?php
}
?>

          <div id="primary" class="content-area">
            <main id="main" class="site-main">

            <?php
            while ( have_posts() ) : the_post();

              get_template_part( 'template-parts/content', get_post_type() );

              fmi_post_navigation();

              // If comments are open or we have at least one comment, load up the comment template.
              if ( comments_open() || get_comments_number() ) :
                comments_template();
              endif;

            endwhile; // End of the loop.
            ?>

            </main><!-- #main -->
          </div><!-- #primary -->

<?php
if ($blog_layout == 'right_sidebar') {
?>
        </div>
        <div class="col-md-4 sidebar-right">
          <?php get_sidebar();?>
        </div>
      </div>
<?php
}
if ($blog_layout == 'left_sidebar') {
?>
        </div>
        <div class="col-md-4 col-md-pull-8 sidebar-left">
          <?php get_sidebar();?>
        </div>
      </div>
<?php
}
?>

    </div>
  </div>
</div><!-- #content -->

<?php
get_footer();
