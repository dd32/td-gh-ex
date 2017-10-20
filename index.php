<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package bestblog
 */

get_header(); ?>

  <div id="blog-content" class="padding-vertical-large-3 padding-vertical-small-2">
    <?php get_template_part( 'template-parts/main-post', 'loop',get_post_format() );?>
  </div><!--container END-->


<?php get_footer(); ?>
