<?php get_header(); ?>

	<div id="content" class="narrow">
	
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<div class="post-header">
				<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<p class="metadata"><span class="capitalize"><?php the_author_posts_link(); ?></span> | <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_time( get_option( 'date_format' ) ) ?></a> | <?php comments_popup_link( __('Leave your comment', 'undedicated'), __( '1 comment', 'undedicated'), __('% comments', 'undedicated')); ?></p>
			</div>
			
			<?php if(!empty($post->post_excerpt)) : ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( ); ?>" rel="bookmark">
				 <?php 
					if( has_post_thumbnail($post->ID) ){
					// Use as small thumbnail beow headline
					echo get_the_post_thumbnail( $post->ID, 'thumbnail', 'class=homethumb alignleft');
					}
				?>
				</a>
			<?php the_excerpt(); ?>
			
			<p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( ); ?>" rel="bookmark"><?php _e('Read more', 'undedicated'); ?> &raquo;</a></p>

			<?php else : ?>	

				<?php the_content( __('Read more &raquo;', 'undedicated') ); ?>
				<?php wp_link_pages( __('before=<div class="post-page-links">Pages:&after=</div>', 'undedicated')) ; ?>
			
			<?php endif; ?>

			<hr />
			<div class="post-meta">
				<ul>
					<?php the_tags( __('<li>Tags: ', 'undedicated'), ', ', '</li>'); ?>
					<li><?php _e('Posted in ', 'undedicated'); ?><?php the_category(', ');?> | <?php comments_popup_link( __('Leave your comment', 'undedicated'), __( '1 comment', 'undedicated'), __('% comments', 'undedicated')); ?></li>
					<li><?php _e('Share on ', 'undedicated'); ?><a href="http://twitter.com/home?status=Currently reading: <?php the_title_attribute(); ?> <?php the_permalink(); ?>"><?php _e('Twitter','undedicated'); ?></a>, <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title_attribute(); ?>"><?php _e('Facebook', 'undedicated'); ?></a>, <a href="http://del.icio.us/post?v=4;url=<?php the_permalink(); ?>"><?php _e('Delicious', 'undedicated'); ?></a>, <a href="http://digg.com/submit?url=<?php the_permalink(); ?>"><?php _e('Digg', 'undedicated'); ?></a>, <a href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title_attribute(); ?>"><?php _e('Reddit', 'undedicated'); ?></a></li>
					<?php edit_post_link(__('Edit this post','undedicated'), '<li>', '</li>'); ?>
				</ul>
			</div>
		</div><!--#posts-->

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
		
		<h2 class="page-title"><?php _e('Not Found', 'undedicated'); ?></h2>
		<p><?php _e('Sorry, but you are looking for something that is not here.', 'undedicated'); ?></p>
		<?php get_search_form(); ?>
		
	<?php endif; ?>

	</div><!--#content-->
	<hr />
	
		
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
