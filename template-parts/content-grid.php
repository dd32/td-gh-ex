<?php
/**
 * Template part for displaying single post standard format
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package anorya
 */
 

		
		if(get_theme_mod( 'anorya_grid_columns_setting', 2 ) == 2): ?>
			<article <?php post_class(array('grid-post-2','col-md-6','col-sm-12')); ?>>
		<?php else: ?>	
			<article <?php post_class(array('grid-post-3','col-md-4','col-sm-6')); ?>>
		<?php endif; ?>
		
		<p class="post-category-desc">
			<?php esc_html_e('Posted In ','anorya'); ?>
			<span class="post-category-content"><?php print esc_html( anorya_get_post_display_category($post->ID) ); ?></span>
			<?php esc_html_e(' By ','anorya'); ?>
			<span class="post-category-content"><?php print esc_html(the_author_meta('display_name')); ?></span>
		</p>
		
		<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
		
		<?php get_template_part( 'template-parts/content-single', get_post_format() ); ?>
		
		
		
		<p><?php print esc_html(get_the_excerpt()); ?></p>	
		
		<a href="<?php the_permalink(); ?>" class="posts-read-more btn btn-primary"><?php esc_html_e('Continue Reading','anorya');?> </a>
		
	</article>