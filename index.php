<?php get_header(); ?>

<div id="content">
	<?php if (have_posts()) : ?>
		<div id="thumbnail">
		<ul>
		<?php while (have_posts()) : the_post(); ?>
			<li class="post entry">
				<a href="<?php the_permalink() ?>"><?php birdsite_the_thumbnail(); ?></a>
				<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php birdsite_the_thumbnail_title(get_the_title()); ?></a></h2>
		        <div class="postMeta">
		        	<div><?php the_time(get_option('date_format')); ?></div>
					<?php if ('closed' <> $post->comment_status) : ?>
						<div class="comment"><?php comments_popup_link(__('No Comments &#187;', 'birdsite'), __('1 Comment &#187;', 'birdsite'), __('% Comments &#187;', 'birdsite'), '', __('Comments Closed', 'birdsite') ); ?></div>
					<?php endif; ?>
				</div>
			</li>
		<?php endwhile; ?>
		</ul>
		</div>

	<div class="tablenav"><?php birdsite_the_pagenation(); ?></div>

	<?php endif; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
