<?php
/**
 * Template used to display post content on single post.
 *
 * @package adbooster
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * Functions hooked into adbooster_single_post_top action
	 *
	 * @hooked adbooster_single_post_top_widget - 10
	 */
	do_action( 'adbooster_single_post_top' );

	/**
	 * Functions hooked into adbooster_single_post add_action
	 *
	 * @hooked adbooster_post_header          - 10
	 * @hooked adbooster_post_content         - 20
	 * @hooked adbooster_init_structured_data - 30
	 */
	do_action( 'adbooster_single_post' );

	/**
	 * Functions hooked in to adbooster_single_post_bottom action
	 *
	 * @hooked adbooster_post_nav          			- 10
	 * @hooked adbooster_single_post_bottom_widget	- 20
	 * @hooked adbooster_display_comments 			- 30
	 */
	do_action( 'adbooster_single_post_bottom' );
	?>

</div><!-- #post-## -->