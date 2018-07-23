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
			</div>
		<?php endif; ?> 
		
		<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
		<?php if(get_theme_mod( 'anorya_post_display_date_setting', false )):?>
		<p class="post-date-desc"><?php esc_html_e('Posted on','anorya'); ?><span class="post-date-span"> <?php print get_the_date('F j, Y',$post->ID);?></span></p>
		<?php endif; ?>
		
		<p class="dropcap"><?php  print esc_html(get_the_excerpt()); ?></p>	
		
		<a href="<?php the_permalink(); ?>" class="posts-read-more"><?php esc_html_e('Continue Reading','anorya');?></a>
		
	</article>
