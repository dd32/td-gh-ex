<?php
/**
 * Template used to display post content on single pages.
 *
 * @package Az_Authority
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'single-content clearfix'); ?>>

	<?php
	do_action( 'azauthority_single_post_top' );

	/**
	 * Functions hooked into azauthority_single_post add_action
	 *
	 * @hooked azauthority_post_header          - 10
	 * @hooked azauthority_post_meta            - 20
	 * @hooked azauthority_post_content         - 30
	 */
	do_action( 'azauthority_single_post' );

	/**
	 * Functions hooked in to azauthority_single_post_bottom action
	 *
	 * @hooked azauthority_post_nav         - 10
	 * @hooked azauthority_display_comments - 20
	 */
	do_action( 'azauthority_single_post_bottom' );
	?>

</div><!-- #post-## -->
