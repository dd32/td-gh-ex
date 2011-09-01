<?php get_header(); ?>

	<div id="content" class="narrow">

	<?php if (have_posts()) : ?>
	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		
		<?php /* If this is a category archive */ if (is_category()) { ?>
		<h1 class="page-title"><?php _e('Archive For The ', 'undedicated'); ?>&ldquo;<?php single_cat_title(); ?>&rdquo; <?php _e('Category', 'undedicated'); ?></h1>
	 	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h1 class="page-title"><?php _e('Posts Tagged ', 'undedicated'); ?>&ldquo;<?php single_tag_title(); ?>&rdquo;</h1>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h1 class="page-title"><?php _e('Archive For ', 'undedicated'); ?><?php the_time('F jS, Y'); ?></h1>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h1 class="page-title"><?php _e('Archive For ', 'undedicated'); ?><?php the_time('F, Y'); ?></h1>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h1 class="page-title"><?php _e('Archive For ', 'undedicated'); ?><?php the_time('Y'); ?></h1>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h1 class="page-title"><?php _e('Author Archive', 'undedicated'); ?></h1>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1 class="page-title"><?php _e('Blog Archives', 'undedicated'); ?></h1>
	 	<?php } ?>
			
		<?php while (have_posts()) : the_post(); ?>
			
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post-header">
				<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<p class="metadata"><span class="capitalize"><?php the_author_posts_link(); ?></span> | <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_time( get_option( 'date_format' ) ) ?></a> | <?php comments_popup_link( __('Leave your comment', 'undedicated'), __( '1 comment', 'undedicated'), __('% comments', 'undedicated')); ?></p>
			</div>
			
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( ); ?>" rel="bookmark">
			<?php the_post_thumbnail(array( 150, 150 ), array( 'class' => 'alignleft' )); ?>
			</a>
			<?php the_excerpt(); ?>
			<p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( ); ?>" rel="bookmark"><?php _e('Read more', 'undedicated'); ?> &raquo;</a></p>
			
			<div class="post-meta">
				<ul>
					<?php the_tags( __('<li>Tags: ', 'undedicated'), ', ', '</li>'); ?>
					<li>Posted in <?php the_category(', ');?> | <?php comments_popup_link( __('Leave your comment', 'undedicated'), __( '1 comment', 'undedicated'), __('% comments', 'undedicated')); ?></li>
					<li><?php _e('Share on ', 'undedicated'); ?><a href="http://twitter.com/home?status=Currently reading: <?php the_title_attribute(); ?> <?php the_permalink(); ?>"><?php _e('Twitter','undedicated'); ?></a>, <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title_attribute(); ?>"><?php _e('Facebook', 'undedicated'); ?></a>, <a href="http://del.icio.us/post?v=4;url=<?php the_permalink(); ?>"><?php _e('Delicious', 'undedicated'); ?></a>, <a href="http://digg.com/submit?url=<?php the_permalink(); ?>"><?php _e('Digg', 'undedicated'); ?></a>, <a href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title_attribute(); ?>"><?php _e('Reddit', 'undedicated'); ?></a></li>
					<?php edit_post_link(__('Edit this post','undedicated'), '<li>', '</li>'); ?>
				</ul>
			</div>
		</div>

		<?php endwhile; ?>
		
		<?php if (show_posts_nav()) : ?>
		
		<div class="post-navigation">
			<ul>
				<li><?php next_posts_link( __('&laquo; Previous Page')) ?></li>
				<li><?php previous_posts_link( __('Next Page &raquo;')) ?></li>
			</ul>
		</div>
		
		<?php endif; ?>
		
	<?php else : ?>

		<h2 class="page-title"><?php _e('Not Found', 'undedicated'); ?></h2>
		<p><?php _e('There are not posts belonging to this category or tag. Try searching below:', 'undedicated'); ?></p>
		<?php get_search_form(); ?>
	
	<?php endif; ?>

	</div>
	
	<hr />
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>
