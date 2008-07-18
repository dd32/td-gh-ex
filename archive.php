<?php if(function_exists('precious_get_file')) { precious_get_file('header'); } else {  get_header(); }

	 if (have_posts()) : ?>

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>				
		<h2 id="pagetitle"><?php _e('Archives for','basic2col'); ?> <?php echo single_cat_title(); ?> </h2>

	  <?php /* If this is a tag archive WP Tags */ } elseif(is_tag()) { ?>
		<h2 id="pagetitle"><?php _e('Posts tagged','precious'); ?> <?php single_tag_title(); ?></h2>
		
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 id="pagetitle"><?php _e('Archives for','basic2col'); ?> <?php the_time(__('F jS, Y','basic2col')); ?></h2>
		
	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 id="pagetitle"><?php _e('Archives for','basic2col'); ?> <?php the_time(__('F, Y','basic2col')); ?></h2>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 id="pagetitle"><?php _e('Archives for','basic2col'); ?> <?php the_time(__('Y','basic2col')); ?></h2>
		

	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<?php 
			if(isset($_GET['author_name'])) :
				$curauth = get_userdatabylogin($author_name); 
			else :
				$curauth = get_userdata(intval($author));
			endif; ?>
		<h2 id="pagetitle"><?php _e('Posts by','basic2col'); ?> <?php echo $curauth->display_name; ?></h2>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 id="pagetitle"><?php _e('Archives','basic2col'); ?></h2>

		<?php } ?>


<?php /*start loop*/ while (have_posts()) : the_post(); ?>

	


<div class="post archives" id="post-<?php the_ID(); ?>">
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



<?php if(function_exists('precious_get_file')) { precious_get_file('footer'); } else {  get_footer(); } ?>
