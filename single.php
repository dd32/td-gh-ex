<?php get_header(); ?>

	<div id="content">
<div class="content-inside">
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="left">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				

		</div>
        <div class="postmetadata">
					<small>
                    <?php the_tags( '<p style="border-top:none;">Tags: ', ', ', '</p>'); ?>
						<p>Posted  by <?php the_author() ?>
						on <?php the_time('M jS, Y') ?>
						and is filed under <?php the_category(', ') ?>.</p>
						

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							<p><a href="<?php trackback_url(); ?>" rel="trackback">Trackback</a> from your site.</p>

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							<p>Responses are currently closed,<p><a href="<?php trackback_url(); ?> " rel="trackback">Trackback</a> from your own site.</p></p>

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							<p>You can skip to the end and leave a response. Pinging is currently not allowed.</p>

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							<p>Both comments and pings are currently closed.</p>
                            

						<?php } edit_post_link('Edit this entry.','<p>','</p>'); ?>
<p style="border-bottom:none;">Add this post to <a href="http://del.icio.us/post?url=<?php the_permalink() ?>&title=<?php the_title(); ?>" target="_blank">Del.icio.us</a> -&nbsp;<a href="http://digg.com/submit?phase=2&url=<?php the_permalink() ?>&title=<?php the_title(); ?>" target="_blank">Digg</a> </p>
					</small>
                    
				</div>
                
</div>
            

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

    
    
    
    </td>
    <td class="right"><?php get_sidebar(); ?></td>
  </tr>
</table>

	
	



</div>
	
	</div>

<?php get_footer(); ?>
