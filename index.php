<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Aquaparallax
 * @version 1.1
 */

get_header(); ?>

<div class="aqa-content-area">

<div class="aqa-blog-section">

<div class="container">

<div class="row">

<div class="col-md-8">

<?php if ( have_posts() ) : ?>
 
    <!-- start of the secondary loop -->
    <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

<?php endwhile; ?>

<!-- Aquaparallax pagination -->

<div class="row">

<div class="col-md-12">

<ul class="blog-page-nation">
   
	<?php
      if (function_exists('aqua_pagination')) {
        aqua_pagination();
      }
    ?>
</ul>


<?php else:  ?>
 
   	<?php get_template_part( 'template-parts/content', 'none' ); ?>
 
<?php endif; ?>
<?php wp_reset_postdata(); ?>
</div>

</div>

</div>


<div class="col-md-4">

<div class="aqa-blog-side-bar">

<?php dynamic_sidebar('aqua_right_sidebar');  ?>

</div>

</div>

</div>

</div>

</div>
</div>

<?php get_footer();