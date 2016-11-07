<?php
/**
 * The template for displaying search results pages.
 *
 * @package astrology
 */
get_header(); ?>
<?php if ( have_posts() ) : ?>
<section id="blog-title-top">
	<div class="blog-title">
	    <h2><?php printf( esc_html__( 'Search Results for: %s', 'astrology'), get_search_query()); ?></h2>
	    <span><?php echo get_breadcrumb(); ?></span>
	</div>	
</section>
<section id="blogcontent">
	<?php get_template_part( 'template-parts/content', 'search' ); 
	else: 
		get_template_part( 'template-parts/content', 'none' );  ?>
</section>
<?php endif;
get_footer(); ?>