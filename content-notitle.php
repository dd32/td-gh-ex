<?php
/*
Template Name: No Title
Description: Use this template if you need titleless Page. What's more, it doesn't load Sidebar too. If you want Sidebar on this page, uncomment get_sidebar bellow.
*/

get_header(); ?>

<div id="content" class="site-content full-width-template">
<div class="site-content-inner">

<div id="primary" class="content-area full-width-template">
<main id="main" class="site-main" role="main">

<div class="entry-content-only-page">

<?php //load_content_one(); ?>
<?php while ( have_posts() ) : the_post(); ?>
 <?php the_content(); ?> 
<?php endwhile; // end of the loop. ?>

</div><!-- .entry-content-only-page -->


<?php edit_post_link( __( 'Edit', 'beam' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>

</main><!-- #main -->

</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
