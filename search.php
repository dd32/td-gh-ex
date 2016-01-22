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
<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'beam' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
</header><!-- .page-header -->

<?php 
	if ( have_posts() ) : 
?>

<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'content', 'search' ); ?>

<?php 
	endwhile; 
 	
	else : 

	get_template_part( 'no-results', 'search' ); 	

	endif; 	
	
	the_widget( 'WP_Widget_Recent_Posts' );

	the_widget( 'WP_Widget_Tag_Cloud' ); 
?>

</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
