<?php

/**
* Template Name: Blog
* The template for displaying content from posts
* @link https://codex.wordpress.org/Template_Hierarchy
* @package Aquaparallax
*/

get_header();

?>

<div class="aqa-content-area">

<div class="aqa-blog-section">

<div class="container">

<div class="row">

<div class="col-md-8">
<?php

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

$args = array( 
      'post_type' => 'post',
      'posts_per_page' => 3,
      'paged' => $paged
  );

$the_query = new WP_Query( $args );
?>
<?php if ( $the_query->have_posts() ) : ?>
 
    <!-- start of the secondary loop -->
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

      <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

<?php endwhile; ?>

<!-- Aquaparallax pagination -->

<div class="row">

<div class="col-md-12">

<ul class="blog-page-nation">

<?php
      if (function_exists('aqua_pagination')) {
        aqua_pagination($the_query->max_num_pages,"",$paged);
      }
    ?>

</ul>
<?php wp_reset_postdata(); ?>

<?php else:  ?>
 
   	<?php get_template_part( 'template-parts/content', 'none' ); ?>
 
<?php endif; ?>

</div>

</div>
</div>

<div class="col-md-4">

<div class="aqa-blog-side-bar">

<?php dynamic_sidebar('aqua_right_sidebar'); ?>

</div>

</div>

</div>
</div>
</div>
</div>

<?php get_footer(); ?>