<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package adbooster
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * Functions hooked in to adbooster_page add_action
	 *
	 * @hooked adbooster_page_header          - 10
	 * @hooked adbooster_page_content         - 20
	 * @hooked adbooster_init_structured_data - 30
	 */
	do_action( 'adbooster_page' );
	
	?>

</article><!-- #post-<?php the_ID(); ?> -->
