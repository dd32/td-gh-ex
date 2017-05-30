<?php
/**
*
* Template Name: Masonry
*
* The template for displaying content from pagebuilder.
*
* This is the template that displays pages without title in fullwidth layout. Suitable for use with Pagebuilder.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Aquaparallax
*/

get_header();
?>

<div class="aqa-content-area">

<div class="aqa-blog-section">
<div class="container">

<div class="row">

<div class="col-md-8 blog-maonary">

<div class="row">
<?php

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

$args = array( 
      'post_type' => 'post',
      'posts_per_page' => 6,
      'paged' => $paged
  );

$the_query = new WP_Query( $args );
?>
<?php if ( $the_query->have_posts() ) : ?>
 
    <!-- start of the secondary loop -->
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

      <?php get_template_part( 'template-parts/content', 'masonry' ); ?>

<?php endwhile; ?>

</div>

<ul class="blog-page-nation">
    <?php
      if (function_exists('aqua_pagination')) {
        aqua_pagination($the_query->max_num_pages,"",$paged);
      }
    ?>
</ul>
<?php wp_reset_postdata(); ?>
</div>

<div class="col-md-4 col-sm-8 blog-right-sidebar">

<div class="aqa-blog-side-bar">

<?php dynamic_sidebar('aqua_right_sidebar'); ?>

</div>

</div>

<?php endif; ?>

</div>

</div>
</div>

</div>
<?php get_footer(); ?>