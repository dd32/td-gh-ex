<?php
/**
 * Template part for displaying posts with excerpts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BA Tours
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php
		if ( apply_filters( 'bathemos_page_option', true, 'page_title' ) ) :
			if ( is_single() && !get_the_post_thumbnail()) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			elseif ( ! is_single()) :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		endif;

		if ( '' !== get_the_post_thumbnail() && ! is_single() ) {
			do_action( 'bathemos_get_content_tag_template', 'post-thumbnail' );
		}
		
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				do_action( 'bathemos_get_content_tag_template', 'posted-on' );
				do_action( 'bathemos_get_content_tag_template', 'posted-by' );
				?>
			</div><!-- .entry-meta -->
		<?php endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

</article><!-- #post-<?php the_ID(); ?> -->
