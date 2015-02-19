<?php get_sidebar ( 'top' ); ?>

<div id="content" class="grid_16">

<article id="post-<?php the_ID(); ?>" <?php post_class('boxes box-standard'); ?>>
	<header>
		<h2 class="entry-title"><?php if (is_sticky()) { ?><span class="icon-alert"></span> <?php } ?><?php the_title(); ?></h2>
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
			<a rel="author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php printf( esc_attr__( 'View all posts by %s', 'minimum-minimal' ), get_the_author() ); ?>"><?php _e( 'View all posts by', 'minimum-minimal' ); ?> <?php the_author(); ?> &raquo;</a>
			</div><!-- #author-link	-->			
		</div><!-- #author-description	-->
		</div><!-- .entry-author-info --><?php endif; ?>
		<?php wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'minimum-minimal' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
		<?php the_tags( '<div class="tags">' . __( 'Tags: ', 'minimum-minimal' ), ', ', '</div>');?>
		
		</div>
		<div style="clear:both;"></div>
		<div class="next-previous_nav">
			<div class="nav-next"><?php next_post_link( '%link', __('Next &raquo;', 'minimum-minimal') ); ?></div>
			<div class="nav-previous"><?php previous_post_link( '%link', __('&laquo; Previous', 'minimum-minimal') ); ?></div>
		<div style="clear:both;"></div>
		</div>
	</div>
</article>
<?php // If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif; ?>
</div><!-- #content -->
