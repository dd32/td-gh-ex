<?php
/**
 * Template used to display post content.
 *
 * @package Az_Authority
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * Functions hooked in to azauthority_loop_post action.
	 *
	 * @hooked azauthority_post_thumbnail          - 10
	 * @hooked azauthority_post_meta            - 20
	 * @hooked azauthority_post_content         - 30
	 */
	do_action( 'azauthority_loop_post' );
	?>

</article><!-- #post-## -->
