<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Basic Shop
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
	/**
	 * @hooked igthemes_post_header - 10
	 * @hooked igthemes_post_content - 20
	 * @hooked igthemes_post_footer - 30
	 */
	do_action( 'igthemes_single_post' );
	?>
</article><!-- #post-## -->
