<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Basic Shop
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
	/**
	 * @hooked igthemes_page_header - 10
	 * @hooked igthemes_page_content - 20
	 * @hooked igthemes_page_footer - 30
	 */
	do_action( 'igthemes_single_page' );
	?>
</article><!-- #post-## -->
