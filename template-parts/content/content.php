<?php
/**
 * Generic template for displaying post content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aamla
 * @since 1.0.0
 */

/**
 * Fires immediately before entry.
 *
 * @since 1.0.0
 *
 * @param str $calledby Hook by which the function has been called.
 */
do_action( 'aamla_before_entry', 'before_entry' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?><?php aamla_attr( 'post', false ); ?>>

	<?php
	/**
	 * Fires for entry.
	 *
	 * @since 1.0.0
	 *
	 * @param str $calledby Hook by which the function has been called.
	 */
	do_action( 'aamla_inside_entry', 'inside_entry' );
	?>

</article><!-- #post-<?php the_ID(); ?> -->

<?php
/**
 * Fires immediately after entry.
 *
 * @since 1.0.0
 *
 * @param str $calledby Hook by which the function has been called.
 */
do_action( 'aamla_after_entry', 'after_entry' );
