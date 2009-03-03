<?php get_header(); ?>

	<!-- start of Content part -->
	<div id="content" class="grid_8">
<?php $br = 0; if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php if ( $br == 0 ) { // first post in loop ?>
		<!-- start of Featured post -->
		<div class="box featured" id="post-<?php the_ID(); ?>">
			<div class="da-com">
				<p class="levo"><?php the_time(__('F jS, Y', '5years')); ?></p>
				<p class="desno"><?php comment_link_out(); ?></p>
			</div>
			<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e("Permanent link to ", "5years"); the_title();?>"><?php the_title(); $br;?></a></h2>
			<div class="entry">
				<?php the_excerpt(); ?>
			</div>
			<div class="more"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e("Permanent link to ", "5years"); the_title();?>"><?php _e("Continue reading...", "5years"); ?></a></div>
		</div>
		<!-- end of Featured post -->

		<!-- start of Excerpts --><?php } else {  ?>
		<div class="grid_4 <?php if (($br/2) == intval($br/2)) { echo "omega"; } else { echo "alpha"; }?>">
			<div class="box" id="post-<?php the_ID(); ?>">
				<div class="da-com">
					<p class="levo"><?php the_time(__('F jS, Y', '5years')); ?></p>
					<p class="desno"><?php comment_link_out(); ?></p>
				</div>
				<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e("Permanent link to ", "5years"); the_title();?>"><?php the_title(); $br;?></a></h2>
				<div class="entry">
					<?php the_excerpt(); ?>
				</div>
				<div class="more"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e("Permanent link to ", "5years"); the_title();?>"><?php _e("Continue reading...", "5years"); ?></a></div>
			</div>
		</div>
<?php if (($br/2) == intval($br/2)) { ?><div class="clear"></div><? } ?>
<?php } // end of post print
$br++; ?>

<?php endwhile; ?>
		<!-- end of Excerpts -->
		
		<div class="clear"></div>
<?php if ( get_next_posts_link() || get_previous_posts_link() ) { ?>
		<!-- start of Pagination -->
		<div class="pagination">
			<div class="levo" title="<?php _e("List recent posts", "5years"); ?>"><?php previous_posts_link('&larr; ' . __('Newer posts', '5years')) ?></div><div class="desno" title="<?php _e("List older posts", "5years"); ?>"><?php next_posts_link(__('Older posts', '5years') . ' &rarr;') ?></div>
		</div>
		<!-- end of Pagination -->
<?php } ?>
<? else: ?>
		<div class="box single">
			<h2><?php _e("Error: 404", "5years"); ?></h2>
			<p><?php _e("Sorry, no posts matched your criteria.", "5years"); ?></p>
		</div>
<?php endif; ?>

<!-- start of Posts per Cat (plugin) -->
<?php if ( function_exists(ppc_xhtml) ) { ppc_xhtml(); } ?>
<!-- end of Posts per Cat (plugin) -->

	</div>
	<!-- end of Content part -->

<?php get_footer(); ?>
