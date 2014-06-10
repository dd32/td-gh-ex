<?php query_posts('post_type=post&posts_per_page='.get_sub_field('posts_to_show').'&cat='.get_sub_field('filter_by_categories'));?>

<?php if(have_posts()): ?>

<?php while(have_posts()):the_post(); ?>

<section class="featured-category col-sm-4">
			
	<div class="col-sm-12">
						
		<article <?php post_class('h-entry'); ?> id="post-<?php the_ID(); ?>">
							
			<header class="entry-header">
								
				<h4 class="entry-title"><a href="<?php the_permalink(); ?>" class="u-url" rel="bookmark"><?php the_title(); ?></a></h4>							

			</header>

			<span class="p-category"><?php the_category(); ?></span>

			<div class="entry-media">
									
				<a href="<?php the_permalink(); ?>" class="u-url">
					<?php the_post_thumbnail(); ?>
				</a>

			</div> <!-- entry-media -->

		</article>

	</div> <!-- end col-sm-12 -->					

</section> <!-- end featured-category -->

<?php endwhile; ?>

<?php endif; ?>

<?php wp_reset_query(); ?>