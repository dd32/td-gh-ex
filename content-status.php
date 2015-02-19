<div id="content" class="grid_16">

<article id="post-<?php the_ID(); ?>" <?php post_class('articlebox'); ?>>
	<div class="postlistbox postlistboxnotitle postlistboxstatus">	
		<div class="entry-meta-status">
			<a class="url fn n" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php printf( esc_attr__( 'View all posts by %s', 'minimum-minimal' ), get_the_author() ); ?>"> <?php the_author(); ?></a>  / <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') );  _e( ' ago', 'minimum-minimal' )?>:	
		</div><!-- .entry-meta -->			
		<?php the_content(); ?>	
	<div style="clear:both;"></div>
	</div>
	<?php the_tags( '<div class="tags">' . __( 'Tags: ', 'minimum-minimal' ), ', ', '</div>');?>
</article>
<?php comments_template( '', true ); ?>
</div><!-- #content -->