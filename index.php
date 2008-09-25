<?php get_header(); ?>

   	<div class="content">

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
	   	<div class="post">
       	   	<div class="date"><?php the_time('d') ?><br /><?php the_time('M') ?></div> <!-- DATE -->
            <div class="title"><h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2></div> <!-- TITLE -->
            <div class="post_info">author: <?php the_author() ?> &nbsp; &nbsp; &nbsp; category: <?php the_category(', ') ?></div> <!-- POST INFO -->
            <div style="clear:both"></div>
            
            <div class="entry">
				<?php the_content('Read the rest of this entry &raquo;'); ?>
			<div style="clear:both; height: 15px;"></div>
            </div> <!--ENTRY  -->

	    	<div class="comments"><?php comments_popup_link('<span>0</span>', '<span>1</span>', '<span>%</span>'); ?></div> <!-- COMMENTS -->

	    	<?php the_tags('<div class="tags">', ', ', '</div> <!-- TAGS -->'); ?>
			<div style="clear:both"></div>

		</div> <!-- POST -->
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
			<div style="clear: both;"></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</div> <!-- CONTENT -->

	<?php get_sidebar(); ?>

	<div style="clear:both"></div>
</div> <!-- ALL -->


<?php get_footer(); ?>