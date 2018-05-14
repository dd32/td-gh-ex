<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bayn Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<a class="entry-media" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail(); ?>
			<?php if ( is_sticky() ) : ?>
				<span class="sticky-label"><?php esc_html_e( 'Featured', 'bayn-lite' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<div class="entry-text">
		<h2 class="entry-title u-text-uppercase"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space before/after the slash */
			$categories_list = get_the_category_list( esc_html__( ' / ', 'bayn-lite' ) );
			if ( $categories_list && bayn_lite_categorized_blog() ) {
				echo '<div class="entry-category">', $categories_list, '</div>'; // WPCS: XSS OK.
			}
		}
		if ( empty( get_the_title() ) ) {
			bayn_lite_content_more();
		}
		?>

	</div>

</article><!-- #post-## -->
