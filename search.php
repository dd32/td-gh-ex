<?php get_header(); ?>

<div id="content">

	<?php if (have_posts()) : ?>

		<h1 class="pagetitle"><?php printf(__('Search Results &#8216;%s&#8217;', 'birdsite'), wp_specialchars($s) ); ?></h1>

		<div id="thumbnail">
		<ul>
    	<?php while (have_posts()) : the_post(); ?>
			<li class="post entry">
				<a href="<?php the_permalink() ?>"><?php birdsite_the_thumbnail(); ?></a>
				<h3 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php birdsite_the_thumbnail_title(get_the_title()); ?></a></h3>
				<?php if ('closed' <> $post->comment_status) : ?>
			        <div class="postMeta">
			        	<div><?php the_date(get_option('date_format')); ?></div>
						<div class="comment"><?php comments_popup_link(__('No Comments &#187;', 'birdsite'), __('1 Comment &#187;', 'birdsite'), __('% Comments &#187;', 'birdsite'), '', __('Comments Closed', 'birdsite') ); ?>
						</div>
					</div>
				<?php endif; ?>
			</li>
			<?php endwhile; ?>
		</ul>
		</div>

		<div class="tablenav"><?php birdsite_the_pagenation(); ?>	</div>

	<?php else : ?>

		<h1 class="pagetitle"><?php printf(__('Sorry, no posts matched &#8216;%s&#8217;', 'birdsite'), wp_specialchars($s) ); ?></h1>

	<?php endif; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
