<?php if(function_exists('precious_get_file')) { precious_get_file('header'); } else {  get_header(); }?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



<div class="post single" id="post-<?php the_ID(); ?>">



	<h2 id="pagetitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	
	 <?php edit_post_link(__('Edit','basic2col'),'<p class="editlink">','</p>'); ?>

	<div class="postcontent">
		<?php the_content(); ?>
	
		<?php wp_link_pages('before=<p id="pages">'.__('Pages:','basic2col').'&after=</p>'); ?>
	</div>
	
	
            
	<div class="postmeta">
		<p><?php _e('Published','basic2col'); ?> <?php the_date(); ?> &amp; <?php _e('Filed in','basic2col'); ?> <?php the_category(',') ?></p>
		<p><?php the_tags(__('Tags: ','basic2col'), ', ', ''); ?></p>
	</div>

</div>

	<ul id="postnav">
		<?php next_post_link('<li class="right">%link &raquo;</li>'); ?>
		<?php previous_post_link('<li class="left">&laquo; %link</li>'); ?>
	</ul>


	<?php comments_template(); // Get wp-comments.php template ?>


<?php endwhile; else : 

	echo basic2col_404_message(); 

endif; 

if(function_exists('precious_get_file')) { precious_get_file('footer'); } else {  get_footer(); }

?>
