<div id="content" class="grid_16">

<article id="post-<?php the_ID(); ?>" <?php post_class('postlistbox postlistboxnotitle postlistboxquote'); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
		<div style="clear:both;"></div>
	</div><!-- .entry-content -->
</article>
	<div class="postlistboxnotitledate entry-meta">
		<?php echo get_the_date(); ?>	
	</div><!-- .entry-meta -->
<?php comments_template( '', true ); ?>
</div><!-- #content -->