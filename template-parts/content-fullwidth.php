<?php
/**
 * Template part for displaying single post standard format
 *
 * @package anorya
 */
 ?>

	<article <?php post_class('full-width-post'); ?>>
		
		<p class="post-category-desc">
			<?php esc_html_e('Posted In ','anorya'); ?>
			<span class="post-category-content"><?php print esc_html( anorya_get_post_display_category($post->ID) ); ?></span>
			<?php esc_html_e(' By ','anorya'); ?>
			<span class="post-category-content"><?php print esc_html(the_author_meta('display_name')); ?></span>
		</p>

		
		<h2 class="full-width-post-single-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
		
		<?php get_template_part( 'template-parts/content-single', get_post_format() ); ?>
		
		
		<?php if(get_theme_mod( 'anorya_full_text_posts_setting', false )):?>
			<p>
				<?php the_content(); ?>
			</p>	
		<?php else:?>
			<p>
				<?php echo esc_html(get_the_excerpt($post->ID)); ?>
				
			</p>

			<a  href="<?php the_permalink(); ?>" class="posts-read-more btn btn-primary"><?php esc_html_e('Continue Reading','anorya');?> </a>			
		<?php endif; ?>
		
		
		
	</article>