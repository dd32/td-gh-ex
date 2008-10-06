<?php get_header(); ?>
	<div id="contentArea">
		<div id="main" class="container_16">
			<div class="sec508"><a href="#menus">Go to menus</a><hr /></div>
			<div id="pageContent" class="grid_10 serif">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="grid_9 vtab articleInfo" id="post-<?php the_ID(); ?>">
					<p><span class="unibullet">&raquo;</span> posted on <?php the_time('l, F jS, Y'); ?> at <?php the_time(); ?> by <?php the_author(); ?></p>
				</div><!-- /#articleInfo -->
				<div class="clear">&nbsp;</div>
				<hr class="space short" />
				<div class="grid_8 prefix_1 suffix_1 alpha omega article">
					<h1><?php the_title(); ?></h1>
					<?php the_content('<span class="more">&raquo; read more</a></span>'); ?>
					<?php wp_link_pages(array('before' => '<p><strong>pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</div><!-- /#article -->
				<div class="clear">&nbsp;</div>
				
				<div class="grid_8 prefix_1 suffix_1 alpha omega articleMeta sansSerif">
					<hr class="space" />
					<p>filed under <?php the_category(' &middot; ') ?><?php comments_popup_link(' | post a comment', ' | one Comment', ' | % comments'); ?><?php the_tags( ' | tags: ', ', ', ''); ?></p>
					<p class="postmetadata alt">
						<small>
							You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.

							<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
								// Both Comments and Pings are open ?>
								You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

							<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
								// Only Pings are Open ?>
								Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

							<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
								// Comments are open, Pings are not ?>
								You can skip to the end and leave a response. Pinging is currently not allowed.

							<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
								// Neither Comments, nor Pings are open ?>
								Both comments and pings are currently closed.
							<?php } edit_post_link('Edit this entry','','.'); ?>
						</small>
					</p>
					<?php comments_template(); ?>
				<?php endwhile; ?>
				<?php include (TEMPLATEPATH . '/navigation.php'); ?>
				</div><!-- /#articleMeta -->
				<div class="clear">&nbsp;</div>
				<?php else : ?>
				<hr class="space short" />
				<div class="grid_8 prefix_1 suffix_1 alpha omega article">
					<h1>Not Found</h1>
					<p>Sorry, but you are looking for a page that isn't here.</p>
					<?php include (TEMPLATEPATH . "/searchform.php"); ?>
				</div><!-- /#article -->
				<div class="clear">&nbsp;</div>
			<?php endif; ?>	
			</div><!-- /#pageContent -->
			
			<div id="sideBar" class="grid_6">
				<div class="sec508"><a name="menus" id="menus" class="accessiblity"></a></div>
				<?php include (TEMPLATEPATH . '/sidebar-left.php'); ?>
				<?php include (TEMPLATEPATH . '/sidebar-right.php'); ?>
				<?php include (TEMPLATEPATH . '/sidebar-double.php'); ?>
				<div class="clear">&nbsp;</div>
			</div><!-- /#sideBar -->
			
			<div class="clear">&nbsp;</div>
		</div><!-- /#main -->
	</div><!-- /#contentArea -->
<?php get_footer(); ?>
