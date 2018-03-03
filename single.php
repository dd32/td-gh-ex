<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fmi
 */

get_header(); ?>

<?php
$home_layout = get_theme_mod('home_layout', 0);
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
</div>
<?php
fmi_sidebar_select();
get_footer();
