<div id="content" class="grid_16">

<article id="post-<?php the_ID(); ?>" <?php post_class('postlistbox postlistboxnotitle postlistboxaside'); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
		<div style="clear:both;"></div>
	</div><!-- .entry-content -->
</article>
<?php comments_template( '', true ); ?>
</div><!-- #content -->
