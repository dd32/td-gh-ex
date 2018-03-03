<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fmi
 */

get_header(); ?>

<?php
$home_layout = get_theme_mod('page_layout', 0);
if($home_layout){
?>
<div class="col-md-12">
<?php }else{?>
<div class="col-md-8">
<?php }?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">

      <?php
      while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'page' );

        if (!get_theme_mod('page_comments')) :
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;
        endif;

      endwhile; // End of the loop.
      ?>

    </main><!-- #main -->
  </div><!-- #primary -->
</div>
<?php
fmi_sidebar_select();
get_footer();
