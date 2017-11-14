<?php
/**
 * Template part for displaying single post standard format
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package anorya
 */
 ?>

	<article <?php post_class('list-post'); ?>>
		<div class="row">
		
			<?php if(has_post_thumbnail()): ?>
			<div class="list-post-img-container col-md-6 col-sm-12 col-xs-12">
				
				<?php get_template_part( 'template-parts/content-single', get_post_format() ); ?>
				
			</div>
		<?php endif; ?> 
		
			<div class="col-md-6 col-sm-12 col-xs-12">
				<p class="post-category-desc">
					<?php print __('Posted In ','anorya'); ?>
					<span class="post-category-content"><?php print esc_html( anorya_get_post_display_category($post->ID) ); ?></span>
					<?php print __(' By ','anorya'); ?>
					<span class="post-category-content"><?php print esc_html(the_author_meta('display_name')); ?></span>
				</p>
		
				<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
		
				<p><?php  print esc_html(get_the_excerpt()); ?></p>	
		
				<div class=" post-meta-container">
					<div class=" post-social-icons">
						<?php anorya_social_share($post->ID); ?>
					</div>
				</div>
				
				<a href="<?php the_permalink(); ?>" class="posts-read-more btn btn-primary"><?php print __('Continue Reading','anorya');?></a>
		
			</div>
		</div>
	</article>