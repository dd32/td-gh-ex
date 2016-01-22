<?php
/**
* The template for displaying all pages.
*
* The template for displaying Search Results pages.
*
* @package beam
*/

get_header(); ?>
<div id="content" class="site-content">
<div class="site-content-inner">

<div id="primary" class="content-area">
<main id="main" class="site-main">


<header class="page-header">
<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'beam' ); ?></h1>
</header><!-- .page-header -->

<p>
<?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'beam' ); ?>
</p>

<?php get_search_form(); ?>

<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
