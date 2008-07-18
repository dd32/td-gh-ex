<?php if(function_exists('precious_get_file')) { precious_get_file('header'); } else {  get_header(); }

	 if (have_posts()) : ?>


<h2 id="pagetitle"><?php _e('Search results for','basic2col'); ?> <?php the_search_query(); ?></h2>

		
<?php /*start loop*/ while (have_posts()) : the_post(); ?>

<div class="post search" id="post-<?php the_ID(); ?>">
	<h3 class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>

	<div class="postcontent">
		<?php edit_post_link(__('Edit','basic2col'),'<p class="editlink">','</p>'); ?>

		<?php the_excerpt() ?>
	</div>
	
	
	<p class="postmeta">
		<a href="<?php the_permalink() ?>"  title="<?php the_title(); ?>">
		<?php _e('Full story','basic2col'); ?></a> &raquo;
	</p>

</div>

<?php endwhile; else :

	echo basic2col_404_message(); 

endif; ?>



<?php if(function_exists('precious_get_file')) { precious_get_file('footer'); } else {  get_footer(); }?>
