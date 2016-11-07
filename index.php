<?php
/**
 * The main template file.
 *
 * @package astrology
 */
get_header(); ?>
<section id="blog-title-top">
	<div class="blog-title">
	    <h2><?php _e('BLOG','astrology'); ?></h2>
	    <span><?php echo get_breadcrumb(); ?> / <?php _e('Blog','astrology'); ?></span>
	</div>	
</section>
<section id="blogcontent">    
    	<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
</section>
<?php get_footer(); ?>