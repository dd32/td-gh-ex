<?php
/**
 * Template part for displaying single post standard format
 *
 * @package anorya
 */
 ?>

	<article <?php post_class('full-width-post'); ?> itemprop="itemListElement" itemscope itemtype="https://schema.org/BlogPosting">
		
		<p class="post-category-desc">
			<?php esc_html_e('Posted In ','anorya'); ?>
			<span itemprop="category" class="post-category-content"><?php print esc_html( anorya_get_post_display_category($post->ID) ); ?></span>
			<?php esc_html_e(' By ','anorya'); ?>
			<span itemprop="author" class="post-category-content"><?php print esc_html(the_author_meta('display_name')); ?></span>
		</p>

		
		<h2 itemprop="name headline" class="full-width-post-single-title"><a itemprop="url" href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
		
		<?php get_template_part( 'template-parts/content-single', get_post_format() ); ?>
		
		
		<?php if(get_theme_mod( 'anorya_full_text_posts_setting', false )):?>
			<p itemprop="articleBody">
				<?php the_content(); ?>
			</p>	
		<?php else:?>
			<p itemprop="description">
				<?php echo esc_html(get_the_excerpt($post->ID)); ?>
				
			</p>

			<a itemprop="url" href="<?php the_permalink(); ?>" class="posts-read-more btn btn-primary"><?php esc_html_e('Continue Reading','anorya');?> </a>			
		<?php endif; ?>
		
		
		
	</article>