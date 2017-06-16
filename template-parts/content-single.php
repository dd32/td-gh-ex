<?php
/**
* @package beam
*/
?>

<?php
// check if the post has a Post Thumbnail assigned to it.
	if ( has_post_thumbnail() ) {
?>
<div class="featured-image">
	<?php
		$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'full' );
		echo '<img src="' . $image_src[0]  . '" alt="' . esc_html( get_the_title() ) . '"  />';
	?>
</div>
<?php
} 
?>
<?php do_action( 'beam_before_article' ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">

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

			<?php beam_posted_on(); ?>

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
		/* translators: used between list items, there is a space after the comma */
		$category_list = get_the_category_list( __( ', ', 'beam' ) );

		/* translators: used between list items, there is a space after the comma */
		$tag_list = get_the_tag_list( '', __( ' ', 'beam' ) );

		if ( ! beam_categorized_blog() ) {
		// This blog only has 1 category so we just need to worry about tags in the meta text
		if ( '' != $tag_list ) {
			$meta_text = __( '<i class="1 fa fa-tags"></i> Tagged %2$s <a href="%3$s" title="Permalink to %4$s" rel="bookmark"> <i class="fa fa-link"></i></a>', 'beam' );
		} else {
			$meta_text = __( '<i class="fa fa-link"></i> <a href="%3$s" title="Permalink to %4$s" rel="bookmark">Permalink</a>', 'beam' );
		}

		} else {
		// But this blog has loads of categories so we should probably display them here
		if ( '' != $tag_list ) {
			$meta_text = __( '<p class="categories"><i class="fa fa-folder-open"></i> Categories %1$s <br /><i class="2 fa fa-tags"></i> Tagged %2$s <br /> <i class="fa fa-link"></i> <a href="%3$s" title="Permalink to %4$s" rel="bookmark">Permalink</a></p>', 'beam' );
		} else {
			$meta_text = __( '<i class="fa fa-folder-open"></i> %1$s  <i class="fa fa-link"></i><a href="%3$s" title="Permalink to %4$s" rel="bookmark">Permalink</a>', 'beam' );
		}

		} // end check for categories on this blog

		printf(
			$meta_text,
			$category_list,
			$tag_list,
			get_permalink(),
			the_title_attribute( 'echo=0' )
		);

		if ( current_user_can('edit_posts') ) {
		?>
		<i class="fa fa-pencil"></i> <?php edit_post_link( __( 'Edit', 'beam' ), '<span class="edit-link">', '</span>' ); ?>
		<?php }
		?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
<?php do_action( 'beam_after_article' ); ?>
<?php if( Kirki::get_option( 'bo', 'opt_show_author' ) ) { 
	$opt_show_author = Kirki::get_option( 'bo', 'opt_show_author' );
	if ($opt_show_author == '1') {
?>
<div id="author-description" class="round-corners">  
	<h2><?php printf( __( 'About %s', 'beam' ), get_the_author() ); ?></h2> 
	<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'beam_author_bio_avatar_size', 60 ) ); ?>
	<?php the_author_meta( 'description' ); ?><br />
	<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">View all posts by <?php the_author(); ?> <span class="meta-nav">&rarr;</span></a>
</div><!-- #author-description -->
<?php
} }
