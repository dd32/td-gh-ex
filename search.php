<?php get_header(); ?>

<?php
global $options;
foreach ($options as $value) { if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); } } ?>


	 <?php if ($altop_sidebar_align == "right") { ?> <div id="content" class="con_left"> <?php } ?>	
		<?php if ($altop_sidebar_align == "left") { ?> <div id="content" class="con_right">	<?php } ?>		
			<?php if ($altop_sidebar_align == "none") { ?> <div id="content" class="con_wide"> <?php } ?>	
				<?php if ($altop_sidebar_align == "") { ?> <div id="content" class="con_left">	<?php } ?>		


		<?php if (have_posts()) : ?>
		
		<h2> <?php printf(__('Searchresults for:<span class="keyword"> %s </span>', 'altop'), htmlentities(get_search_query()) ); ?> </h2>
		
		<?php while (have_posts()) : the_post(); ?>
		
		<div class="post_content" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Link to %s', 'altop'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time(__('jS', 'altop')); ?> <?php the_time(__('F Y', 'altop')); ?> | <?php comments_popup_link(__('0 Comments', 'altop'), __('1 Comment', 'altop'), __('% Comments', 'altop'), '', __('Closed', 'altop') ); ?></small>

				<div class="archiv_entry"> 					
					<?php the_excerpt(); ?>
					
				<p class="postinfo"> 				
					<?php if ($altop_posts_author == "true") : ?> <?php echo _e('posted by&nbsp;', 'altop'); the_author(); ?> <?php endif ?>
					
					<?php edit_post_link(__('Edit', 'altop'), ' &int; ', ' &int; '); ?> <br />
					<?php the_tags(__('tags:', 'altop') . ' ', ', ', '<br />'); ?>
					<?php printf(__('filed under: %s', 'altop'), get_the_category_list(', ')); ?>
				</p>
				</div>
			
			<br clear="all" />
			</div>

				<?php endwhile; ?>

		<div id="post-navigation">
			<div class="alignleft"><?php next_posts_link(__("&laquo;&lsaquo; Older results", 'altop')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer results &rsaquo;&raquo;', 'altop')) ?></div>
		</div>

	<?php else : ?>
	<?php printf (__('<h2>Sorry, but there are no results for:<span class="keyword"> %s </span></h2> Try again with another keyword.', 'altop'), htmlentities(get_search_query()) ); ?>
	<?php endif; ?>
	
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
