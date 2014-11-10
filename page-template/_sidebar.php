<?php
/**
 * Custom page template
 *
 * Template Name: Page with sidebar
 *
 * Set the sidebar position via CSS styles.
 *
 * @package    Modern
 * @copyright  2014 WebMan - Oliver Juhas
 * @version    1.0
 */



get_header();



	/**
	 * Page featured image
	 */
	if ( has_post_thumbnail() ) {

		?>

		<div class="post-media">

			<figure class="post-thumbnail"<?php echo wm_schema_org( 'image' ); ?>>

				<?php the_post_thumbnail( WM_IMAGE_SIZE_SINGULAR ); ?>

			</figure>

		</div>

		<?php

	} // /has_post_thumbnail()



	/**
	 * Page content
	 */

		wmhook_entry_before();

		if ( have_posts() ) {

			the_post();

			get_template_part( 'content', 'page' );

			wp_reset_query();

		}

		wmhook_entry_after();



	/**
	 * Sidebar
	 */

		get_sidebar();



get_footer();

?>