<?php get_header(); ?>

	<div id="content" class="narrowcolumn">
	<div class="content-inside">
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="left"><?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('F jS, Y') ?> &nbsp;/&nbsp;Author: <?php the_author() ?></small>

				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>

			  <div class="postmetadata">	
                <?php the_tags( '<p style="border-top:none;">Tags: ', ', ', '</p>'); ?>
                <p>Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
                <p style="border-bottom:none;">Add this post to <a href="http://del.icio.us/post?url=<?php the_permalink() ?>&amp;title=<?php urlencode(the_title()); ?>" target="_blank">Del.icio.us</a> -&nbsp;<a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink() ?>&amp;title=<?php urlencode(the_title()); ?>" target="_blank">Digg</a> </p>
              </div>
                
                
          
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('<span class="back"></span><span class="backnext">Older Entries</span>')?></div>
			<div class="alignright"><?php previous_posts_link('<span class="next"></span><span class="backnext">Newer Entries</span>')?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</td>
    <td class="right"><?php get_sidebar(); ?></td>
  </tr>
</table>

	</div>
	



</div>
</div>
<?php get_footer(); ?>
