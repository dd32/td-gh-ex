<?php get_header(); ?>
	<div id="content" class="narrowcolumn">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1><?php the_title(); ?></h1>
	<small><a href="<?php the_permalink() ?>"><?php the_time(get_option('date_format')); ?></a>  by <?php the_author() ?> | Filed under <?php the_category(', ') ?>. <?php edit_post_link('Edit'); ?>  </small>
			<div class="entry">
		<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
<?php if (is_attachment()) { ?>
<span class="alignleft"><?php previous_image_link( false, __( '&larr; Previous' , 'quickpress' ) ); ?></span>
<span class="alignright"><?php next_image_link( false, __( 'Next &rarr;' , 'quickpress' ) ); ?></span>
<?php } ?>
 <br />
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
 	<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>
			</div>
		</div>
	<?php comments_template(); ?>
	<?php endwhile; else: ?>
		<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>