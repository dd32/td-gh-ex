<?php get_header(); ?>
	<div id="contentArea">
		<div id="main" class="container_16">
			<div class="sec508"><a href="#menus">Go to menus</a><hr /></div>
			<div id="pageContent" class="grid_10 serif">
			<?php if (have_posts()) : ?>
				<div class="grid_9 omega archive">
				<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		 	  <?php /* If this is a category archive */ if (is_category()) { ?>
				<h2 class="pagetitle"><em>&#8216;<?php single_cat_title(); ?>&#8217; Category</em></h2>
		 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h2 class="pagetitle"><em>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</em></h2>
		 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h2 class="pagetitle"><em>Archive for <?php the_time('F jS, Y'); ?></em></h2>
		 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h2 class="pagetitle"><em>Archive for <?php the_time('F, Y'); ?></em></h2>
		 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h2 class="pagetitle"><em>Archive for <?php the_time('Y'); ?></em></h2>
			  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h2 class="pagetitle"><em>Author Archive</em></h2>
		 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h2 class="pagetitle"><em>Blog Archives</em></h2>
		 	  <?php } ?>
				</div>
				<?php while (have_posts()) : the_post(); ?>
				<div class="grid_9 vtab articleInfo" id="post-<?php the_ID(); ?>">
					<p><span class="unibullet">&raquo;</span> posted on <?php the_time('l, F jS, Y'); ?> at <?php the_time(); ?> by <?php the_author(); ?></p>
				</div><!-- /#articleInfo -->
				<div class="clear">&nbsp;</div>
				<hr class="space short" />
				<div class="grid_8 prefix_1 suffix_1 alpha omega article">
					<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
					<?php the_content('<span class="more">&raquo; read more</a></span>'); ?>
					<?php wp_link_pages(array('before' => '<p><strong>pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</div><!-- /#article -->
				<div class="clear">&nbsp;</div>
				
				<div class="grid_8 prefix_1 suffix_1 alpha omega articleMeta sansSerif">
					<hr class="space" />
					<p><?php comments_popup_link('post a comment', 'one Comment', '% comments'); ?> | filed under <?php the_category(' &middot; ') ?><?php the_tags( ' | tags: ', ', ', ''); ?></p>
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
				</div><!-- /#articleMeta -->
				<div class="clear">&nbsp;</div>
				<?php endwhile; ?>
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
