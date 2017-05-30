<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

<div class="aqa-content-area">

<div class="aqa-blog-section">

<div class="container">

<div class="row">

<div class="col-md-8">

<?php if (have_posts() ) : ?>
 
    <?php while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

<?php endwhile; ?>
<?php wp_reset_postdata(); ?>

<?php else:  ?>
 
   	<?php get_template_part( 'template-parts/content', 'none' ); ?>
 
<?php endif; ?>



</div>

<div class="col-md-4">

<div class="aqa-blog-side-bar">

<?php get_sidebar(); ?>

</div>
</div>
</div>
</div>
</div>
</div>

<?php get_footer(); ?>