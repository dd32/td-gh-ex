<?php
get_header();
global $webfish_settings; 
?>
<div id="c_wrap">
<div id="c_top"></div>

	<div id="content" class="widecolumn" role="main">

	<?php if (have_posts()) : the_post(); ?>

		<div class="navigation">
			<div class="alignleft"><?php next_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php previous_post_link('%link &raquo;') ?></div>
		</div>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h1 id="page_title"><?php the_title(); ?></h1>

			<div class="entry">
				<?php 
				if (WEBFISH_USE_THUMBNAILS && $webfish_settings['thumbnails_single']=="1")
						if ( has_post_thumbnail()) 
  							the_post_thumbnail();
				the_content('<p class="serif">'.__('Read the rest of this entry &raquo;').'</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<div class="clear"></div>
				<div class="postmetadata">
					<?php the_tags('<div class="tags">', ' ', '</div> '); ?>
					<div class="categories"><?php the_category(' ') ?></div>
				</div>
				
<?php if($webfish_settings['show_single_meta']=="1"):?>

				<p class="postmetadata alt">
					<small class="date">
						This entry was posted
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/wordpress/time-since/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
						on <?php the_time( get_option('date_format')) ?> at <?php the_time() ?>
						
						You can follow any responses to this entry through the <?php post_comments_feed_link('RSS 2.0'); ?> feed.

						<?php if ( comments_open() && pings_open() ) {
							// Both Comments and Pings are open ?>
							You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

						<?php } elseif ( !comments_open() && pings_open() ) {
							// Only Pings are Open ?>
							Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

						<?php } elseif ( comments_open() && !pings_open() ) {
							// Comments are open, Pings are not ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.

						<?php } elseif ( !comments_open() && !pings_open() ) {
							// Neither Comments, nor Pings are open ?>
							Both comments and pings are currently closed.

						<?php } edit_post_link(__('Edit this entry'),'','.'); ?>

					</small>
				</p>
<?php else: edit_post_link(__('Edit this entry'),'','.'); endif;
?>
			</div>
		</div>

	<?php comments_template(); ?>

<?php endif; ?>

	</div><!-- End: content -->
	<div id="c_bottom"></div>
	<div class="clear"></div>
	</div><!-- End: c_wrap -->

<?php get_footer(); ?>
