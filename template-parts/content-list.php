<?php
/**
 * Template part for displaying single post standard format
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package anorya
 */
 ?>

	<article <?php post_class('list-post'); ?> itemprop="itemListElement" itemscope itemtype="https://schema.org/BlogPosting">
		<div class="row">
		
			<?php if(has_post_thumbnail()): ?>
			<div class="list-post-img-container col-md-6 col-sm-12 col-xs-12">
				
				<?php get_template_part( 'template-parts/content-single', get_post_format() ); ?>
				
			</div>
		<?php endif; ?> 
		
			<div class="col-md-6 col-sm-12 col-xs-12">
				<p class="post-category-desc">
					<?php esc_html_e('Posted In ','anorya'); ?>
					<span itemprop="category" class="post-category-content"><?php print esc_html( anorya_get_post_display_category($post->ID) ); ?></span>
					<?php esc_html_e(' By ','anorya'); ?>
					<span itemprop="author" class="post-category-content"><?php print esc_html(the_author_meta('display_name')); ?></span>
				</p>
		
				<h3 itemprop="name headline"><a itemprop="url" href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
		
				<p itemprop="description"><?php  print esc_html(get_the_excerpt()); ?></p>	
		
				<a itemprop="url" href="<?php the_permalink(); ?>" class="posts-read-more btn btn-primary"><?php esc_html_e('Continue Reading','anorya');?></a>
		
			</div>
		</div>
	</article>