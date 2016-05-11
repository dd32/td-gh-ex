<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package App_Landing_Page
 */

global $post;
$app_landing_page_sidebar_layout = get_post_meta( $post->ID, 'app_landing_page_sidebar_layout', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php echo ( !is_single() ) ? '<a href="' . esc_url( get_the_permalink() ) . '" class="post-thumbnail">' : '<div class="post-thumbnail">'; ?>
 		<?php ( is_active_sidebar( 'right-sidebar' ) && ( $app_landing_page_sidebar_layout == 'right-sidebar' ) ) ? the_post_thumbnail( 'app-landing-page-with-sidebar' ) : the_post_thumbnail( 'app-landing-page-without-sidebar' ) ; ?>
    <?php echo ( !is_single() ) ? '</a>' : '</div>' ;?>
    <div class="text-holder">
		<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'app-landing-page' ),
				'after'  => '</div>',
			) );
		?>
		</div><!-- .entry-content -->
	</div>
	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'app-landing-page' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->