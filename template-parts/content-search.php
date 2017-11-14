<?php
	/**
	* Template part for displaying results in search pages
	*
	* @link https://codex.wordpress.org/Template_Hierarchy
	*
	* @package anorya
	*/

?>

	<article <?php post_class('list-post'); ?>>
		<?php if(has_post_thumbnail()): ?>
			<div class="list-post-img-container">
				<?php print the_post_thumbnail('anorya_small', array('class' => 'img-responsive')); ?>
			<div class="list-post-img-overlay">
					<div class="row post-meta-container">
						<div class="col-md-12 col-sm-12 post-social-icons">
							<?php print __('SHARE:','anorya'); ?>
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="https://twitter.com/home?status=<?php print  esc_html(str_replace(' ','+',get_the_title($post->ID))); echo '-'; the_permalink(); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
							<a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&media=<?php get_the_post_thumbnail_url($post->ID,'anorya_large');?>&description=<?php print esc_html(str_replace(' ','-',get_the_title($post->ID))); ?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?> 
		
		<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
		<?php if(get_theme_mod( 'anorya_post_display_date_setting', false )):?>
		<p class="post-date-desc"><?php print __('Posted on','anorya'); ?><span class="post-date-span"> <?php print get_the_date('F j, Y',$post->ID);?></span></p>
		<?php endif; ?>
		
		<p class="dropcap"><?php  print esc_html(get_the_excerpt()); ?></p>	
		
		<a href="<?php the_permalink(); ?>" class="posts-read-more"><?php print __('Continue Reading','anorya');?></a>
		
	</article>
