<?php
/**
 * The Template for displaying all single posts
 *
 * @package Acuarela
 * @since Acuarela 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
if ( ! has_post_thumbnail() ):
	get_template_part('template-parts/headers/header', get_post_type() );
endif;

if ( has_excerpt() ) : ?>
	<div class="entry-excerpt">
		<?php the_excerpt(); ?>
	</div>
<?php endif ?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'acuarela' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'acuarela' ) . ' </span>%',
			) );
		?>      
	</div><!-- .entry-content -->
	<footer class="entry-footer">       
		<?php
		// Translators: used between list items, there is a space after the comma.
		$tag_list = get_the_tag_list( '', __( ', ', 'acuarela' ) );
		if ( $tag_list ) {
			echo '<div class="tag-links">' . $tag_list . '</div>';
		}
		// Translators: There is a space after "by".
		printf( '<p class="written-by">' . __( 'This article was written by ', 'acuarela' ) . '<a href="%1$s">%2$s</a></p>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
		);
		if ( '' != get_the_author_meta( 'description' ) ) {
			get_template_part( 'template-parts/author-bio' );
		}
		?>
	</footer><!-- .entry-footer -->
<?php
// Previous/next post navigation.
acuarela_post_navigation();

// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) {
	comments_template();
} ?>
</article><!-- #post-## -->
