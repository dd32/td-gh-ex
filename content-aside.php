<?php
/**
 * @package Beach
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'beach' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'beach' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			printf( '<span class="sep">%1$s</span> <a href="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a> <span class="sep">%5$s</span> <span class="author vcard"><a class="url fn n" href="%6$s" title="%7$s">%8$s</a></span>',
					__( 'Posted on', 'beach' ),
					esc_url( get_permalink() ),
					esc_attr( get_the_date( 'c' ) ),
					esc_html( get_the_date() ),
					__( 'by', 'beach' ),
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_attr( sprintf( __( 'View all posts by %s', 'beach' ), get_the_author() ) ),
					get_the_author()
				);
		?>
		<span class="sep"> | </span>
		<span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in', 'beach' ); ?></span> <?php the_category( ', ' ); ?>
		</span><span class="sep"> | </span>
		<?php the_tags( '<span class="tag-links">' . __( 'Tagged', 'beach' ) . ' </span>', ', ', '<span class="sep"> | </span>' ); ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'beach' ), __( '1 Comment', 'beach' ), __( '% Comments', 'beach' ) ); ?></span>
		<?php edit_post_link( __( 'Edit', 'beach' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
	</footer><!-- #entry-meta -->
</article><!-- #post-## -->