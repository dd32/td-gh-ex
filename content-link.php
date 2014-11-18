<div id="content" class="grid_16">

<article id="post-<?php the_ID(); ?>" <?php post_class('postlistbox postlistboxnotitle postlistboxlink'); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
		<div style="clear:both;"></div>
	</div><!-- .entry-content -->
	<?php the_tags( '<div class="tags">' . __( 'Tags: ', 'richwp' ), ', ', '</div>');?>
</article>
<?php comments_template( '', true ); ?>
</div><!-- #content -->
