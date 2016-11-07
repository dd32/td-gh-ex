<?php
/**
 * The template for displaying archive pages.
 *
 * @package astrology
 */
get_header(); ?>
<section id="blog-title-top">
	<div class="blog-title">
	    <h2><?php the_archive_title(); ?></h2>
	    <span><?php echo get_breadcrumb(); ?></span>
	</div>	
</section>
<section id="blogcontent">
    <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
</section>
<?php get_footer(); ?>