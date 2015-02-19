<?php get_sidebar ( 'top' ); ?>

<div id="content" class="grid_16">

<article id="post-<?php the_ID(); ?>" <?php post_class('boxes box-standard'); ?>>
	<header>
		<h2 class="entry-title"><span class="icon-play-circled2"></span> <?php the_title(); ?></h2>
		<div class="entry-meta">
			<?php echo get_the_date(); ?>	
		 </div><!-- .entry-meta -->
	</header>
	<div class="entry-content">
		
		<?php the_content(); ?>
		<div style="clear:both;"></div>
	</div><!-- .entry-content -->
	<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
<div id="entry-author-info" class="notonmobile">
			<div id="author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'minimum-minimal_author_bio_avatar_size', 80 ) ); ?>
			</div><!-- #author-avatar 	-->
		<div id="author-description">
		<h2><?php _e( 'About', 'minimum-minimal' ); ?> <?php the_author(); ?></h2>
		<?php the_author_meta( 'description' ); ?>
			<div id="author-link">
			<a rel="author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php printf( esc_attr__( 'View all posts by %s', 'minimum-minimal' ), get_the_author() ); ?>"><?php _e( 'View all posts by', 'minimum-minimal' ); ?><?php the_author(); ?> &raquo;</a>
			</div><!-- #author-link	-->			
		</div><!-- #author-description	-->
		</div><!-- .entry-author-info --><?php endif; ?>
		<?php the_tags( '<div class="tags">' . __( 'Tags: ', 'minimum-minimal' ), ', ', '</div>');?>
</article>
<?php comments_template( '', true ); ?>
</div><!-- #content -->
