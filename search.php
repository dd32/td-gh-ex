<?php get_header(); ?>

<div id="content" class="narrow">

	<?php if (have_posts()) : ?>
		
		<h2 class="page-title"><?php _e('Search Results For ', 'undedicated'); ?>&ldquo;<?php echo $s; ?>&rdquo;</h2>

		<?php while (have_posts()) : the_post(); ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post-header">
				<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e('Permanent Link to ', 'undedicated'); ?><?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<p><?php _e('By ','undedicated'); ?><?php the_author_posts_link(); ?> | <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a></p>
			</div>
			
			<?php the_post_thumbnail(array( 150, 150 ), array( 'class' => 'alignleft' )); ?>
			<?php the_excerpt(); ?>
			<p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( ); ?>" rel="bookmark"><?php _e('Read more', 'undedicated'); ?> &raquo;</a></p>
			
			<div class="post-meta">
				<ul>
					<li><?php comments_popup_link( __('Leave your comment', 'undedicated'), __( '1 comment', 'undedicated'), __('% comments', 'undedicated')); ?> &bull; <?php the_category(' &bull; ');?></li>
					<?php the_tags( __('<li>Tagged as: ', 'undedicated'), ' &bull; ', '</li>'); ?>
					<li><?php _e('Share on ', 'undedicated'); ?><a href="http://twitter.com/home?status=Currently reading: <?php the_title_attribute(); ?> <?php the_permalink(); ?>"><?php _e('Twitter','undedicated'); ?></a>, <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title_attribute(); ?>"><?php _e('Facebook', 'undedicated'); ?></a>, <a href="http://del.icio.us/post?v=4;url=<?php the_permalink(); ?>"><?php _e('Delicious', 'undedicated'); ?></a>, <a href="http://digg.com/submit?url=<?php the_permalink(); ?>"><?php _e('Digg', 'undedicated'); ?></a>, <a href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title_attribute(); ?>"><?php _e('Reddit', 'undedicated'); ?></a></li>
					<?php edit_post_link(__('Edit this post','undedicated'), '<li>', '</li>'); ?>
				</ul>
			</div>
		</div>

		<?php endwhile; ?>
		
		<?php if (show_posts_nav()) : ?>
		
		<div class="post-navigation">
			<ul>
				<li><?php next_posts_link( __('&laquo; Previous Page','undedicated')) ?></li>
				<li><?php previous_posts_link( __('Next Page &raquo;','undedicated')) ?></li>
			</ul>
		</div>
		
		<?php endif; ?>
		
	<?php else : ?>
		
	<h2 class="page-title"><?php _e('Nothing Found For ', 'undedicated'); ?>&ldquo;<?php echo $s; ?>&rdquo;</h2>
	<p><?php _e('There are not posts that match your query. Please try searching with different keywords.', 'undedicated'); ?></p>
	<?php get_search_form(); ?>
	
	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>
	<?php endif; ?>
	
	</div><!--#content-->
	
	<hr />
	
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
