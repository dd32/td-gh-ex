<?php get_header(); ?>
	<div id="content" class="narrowcolumn">
 
<div id="header-responsive">		
<?php if (is_home()) { ?><h1><?php } ?>
<a class="blogtitle" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a><?php if (is_home()) { ?></h1><?php } ?><div class="description"><?php bloginfo('description'); ?></div>
</div>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 			<div class="post" id="post-<?php the_ID(); ?>">
			<h1><?php the_title(); ?></h1>
<small><a href="<?php the_permalink() ?>">
 <?php the_time(get_option('date_format')); ?></a>  by <?php the_author() ?> | Filed under <?php the_category(', ') ?>. <?php edit_post_link('Edit'); ?>  </small> 
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
<span class="alignleft"><?php 
    previous_image_link( false, __( '&larr; Previous' , 'quickchic' ) ); 
?></span>
<span class="alignright"><?php 
    next_image_link( false, __( 'Next &rarr;' , 'quickchic' ) ); 
?></span>
 <br /> 
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
	<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>
			</div>
		</div>
<br /> 
	<?php comments_template(); ?>
	<?php endwhile; else: ?>
		<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>