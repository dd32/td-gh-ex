<?php
/**
 * The default template for displaying content
 *
 * Used for both single and front-page/index/archive/search.
 *
 * @since 1.0.0
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	    <?php get_template_part( 'content', 'header' ); ?>

	    <div class="entry-content">
		    <?php
			if ( is_singular() ) {
			    the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'abacus') );
			} else {
				the_excerpt();
			}
			?>
	    </div><!-- .entry-content -->

		<?php get_template_part( 'content', 'footer' ); ?>

	</article> <!-- #post-<?php the_ID(); ?> -->