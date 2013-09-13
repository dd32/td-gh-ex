<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<?php if(have_posts()) while(have_posts()): the_post(); ?>
<?php get_template_part('element', 'page-header'); ?>
<?php endwhile; ?>
		
<div id="main" class="main">	
	<div class="container">		
		<section id="content" class="content content-wide">
			<?php $current_page = cpotheme_current_page(); ?>
			<?php $posts_per_page = get_option('posts_per_page'); ?>
			<?php query_posts("post_type=post&paged=$current_page&posts_per_page=$posts_per_page"); ?>
			
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<?php get_template_part('element', 'blog'); ?>
			<?php endwhile; ?>

			<div class="pagination">
				<div class="pagination-prev">
					<?php previous_posts_link(__('Newer', 'cpotheme')); ?>
				</div>
				<div class="pagination-next">
					<?php next_posts_link(__('Older', 'cpotheme')); ?>
				</div>
			</div>
			<?php endif; ?>
		</section>
	</div>
</div>

<?php get_footer(); ?>