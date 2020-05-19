<?php
/**
 * The Template for displaying all single posts
 *
 * @package Bassist
 * @since Bassist 1.0.0
 */
 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		// Translators: used between list items, there is a space after the comma.
		$categories_list = get_the_category_list( __( ', ', 'bassist' ) );
		if ( $categories_list ) {
			echo '<div class="entry-meta"><span class="cat-links"><span class="fa fa-folder-open" aria-hidden="true"></span>' . $categories_list . '</span></div>';
		}
		?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<span class="byline">
				<?php
				// Translators: there is a space after "By".
				print( __('By ', 'bassist') );
				printf('<span class="entry-author"><a href="%1$s" rel="author">%2$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author());
				
				printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><span class="fa fa-clock-o" aria-hidden="true"></span><time datetime="%2$s">%3$s</time></a></span>',
					esc_url( get_day_link(get_the_date('Y', $post->ID),get_the_date('m', $post->ID),get_the_date('d', $post->ID)) ),
					esc_attr( get_the_date( 'c' ) ),
					esc_html( get_the_date() ));
				?>
			</span><!-- .byline -->

		
			<?php
				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
			?>
			<span class="comments-link">
				<span class="fa fa-comment" aria-hidden="true"></span>
				<?php comments_popup_link( __( 'Leave a comment', 'bassist' ), __( '1 Comment', 'bassist' ), __( '% Comments', 'bassist' ) ); ?>
			</span>

			<?php
				endif;

				edit_post_link('<span class="fa fa-pencil" aria-hidden="true"></span>'. __('Edit', 'bassist') )
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-excerpt">
		<?php 	if ( ! get_post_format() && has_excerpt() ):
					the_excerpt();
				endif ?>
	</div>

	<?php if ( has_post_thumbnail() && ! has_post_format('image') && ! has_post_format('audio') && ! has_post_format('video') && ! has_post_format('gallery') ) :?>

	<div class="featured-image">
		<?php the_post_thumbnail(); ?>
	</div>

	<?php endif; ?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bassist' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'bassist' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

<?php //bassist_related_posts_by_tag($post);?>

	<footer class="entry-footer">		
		<?php
			// Translators: used between list items, there is a space after the comma.
			$tag_list = get_the_tag_list( '', __( ', ', 'bassist' ) );
			if ( $tag_list ) {
				echo '<div class="tag-links">' . $tag_list . '</div>';
			}
		?>		
		<p><?php printf( __( 'This article was written by %s.', 'bassist' ), get_the_author() ); ?></p>
		<?php
			if ( '' != get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/author-bio' );
			}
		?>
	</footer><!-- .entry-footer -->
<?php
	// Previous/next post navigation.
	bassist_post_navigation();

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
?>
	
</article><!-- #post-## -->

