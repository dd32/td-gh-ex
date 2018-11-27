<?php
/**
* @package beam
*/
?>
<?php
	//
	if ( false == get_theme_mod( 'hide_featured_image', false ) ) :

	// check if the post has a Post Thumbnail assigned to it.
		if ( has_post_thumbnail() ) {
?>
<div class="featured-image">
	<?php
		the_post_thumbnail('full', array('class' => 'alignleft'));
	?>
</div>
<?php
		}
 	endif;
?>

<?php do_action( 'beam_before_article' ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
<?php
	//
	if ( false == get_theme_mod( 'hide_comment_bubble', false ) ) :
?>
			<div class="top-comments">
				<div><i class="fa fa-comment fa-3x" style="margin-bottom: 10px;"> <a href="#comments"><?php comments_number( '0', '1', '%' ); ?></a></i></div>

				<?php
				// If comments are closed let's leave a little note, shall we?
				if ( ! comments_open() && post_type_supports( get_post_type(), 'comments' ) ) :
				?>
				<span class="no-comments"><?php _e( 'Comments are closed.', 'beam' ); ?></span>
				<?php
				// If comments are open and there are no comments, let's leave another note?
				elseif ( comments_open() && post_type_supports( get_post_type(), 'comments' ) ) :
				?>
				<a href="#comments"><?php _e( 'Add Comment', 'beam' ); ?></a>
				<?php endif; ?>
			</div><!-- .top-comments -->
<?php
 	endif;

	// See inc/template-tags.php L178
	beam_posted_on();
?>

		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content-new">
		<?php
		// Show Content
		the_content();

		wp_link_pages( array(
		'before' => '<div class="page-links round-corners">' . __( 'Pages:', 'beam' ),
		'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->


	<footer class="entry-meta">
	<?php
		// See inc/template-tags.php L255
		beam_entry_footer()
		?>
	</footer><!-- .entry-meta -->


</article><!-- #post-## -->

<?php
	do_action( 'beam_after_article' );
	if ( false == get_theme_mod( 'opt_show_author', false ) ) :
?>

<div id="author-description" class="round-corners">
	<h2><?php printf( __( 'About %s', 'beam' ), get_the_author() ); ?></h2>
	<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'beam_author_bio_avatar_size', 60 ) ); ?>
	<?php the_author_meta( 'description' ); ?><br />
	<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">View all posts by <?php the_author(); ?> <span class="meta-nav">&rarr;</span></a>
</div><!-- #author-description -->

<?php
	endif;
