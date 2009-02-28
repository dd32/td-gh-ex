<?php get_header(); ?>

	<div id="content_box">
	<div id="content_body">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">
		<div class="h2-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
		<div class="below-title"> <?php the_time('F jS, Y') ?> | <?php the_author_posts_link(); ?> | <a href="<?php comments_popup_link();?>#comments"><?php comments_number('No Comments Yet', '1 Comment', '% Comments'); ?></a></div>

			<div class="entry">
					<?php the_content('<br />Read the rest of this entry &raquo;'); ?>
				</div>

<?php wp_link_pages('before=<div id="pagination"><b>Continue reading: </b>&after=</div>&next_or_number=number'); ?>

<div class="navigation">
			<div class="navright"><?php next_post_link('%link','&laquo; Next Post') ?></div>
			<div class="navleft"><?php previous_post_link('%link','Previous Post &raquo;') ?></div>
		</div>

<div class="tagbox">

<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Categories: <?php the_category(', <br />') ?></p>
<p class="postmetadata">
This entry was posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>, and last modified on <?php the_modified_date(); ?> at <?php the_modified_time(); ?>. You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.				
						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your site.

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Both comments and pings are currently closed.

						<?php } edit_post_link('<br /><br />Edit this entry','','.'); ?>
</p>

			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<center><p>Sorry, no posts matched your criteria.</p></center>
		<?php include (TEMPLATEPATH . '/archive-list.php'); ?>
		

<?php endif; ?>

	</div>
</div>


<?php get_sidebar(); ?>

<?php get_footer(); ?>
