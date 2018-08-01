<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div class="no-results not-found">
	<div class="inside-article">
		<?php
		/**
		 * bekko_before_content hook.
		 *
		 *
		 * @hooked bekko_featured_page_header_inside_single - 10
		 */
		do_action( 'bekko_before_content' );
		?>

		<header class="entry-header">
			<h1 class="entry-title"><?php _e( 'Nothing Found', 'bekko' ); // WPCS: XSS OK. ?></h1>
		</header><!-- .entry-header -->

		<?php
		/**
		 * bekko_after_entry_header hook.
		 *
		 *
		 * @hooked bekko_post_image - 10
		 */
		do_action( 'bekko_after_entry_header' );
		?>

		<div class="entry-content">

				<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

					<p>
						<?php
						printf( // WPCS: XSS ok.
							/* translators: 1: Admin URL */
							__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'bekko' ),
							esc_url( admin_url( 'post-new.php' ) )
						);
						?>
					</p>

				<?php elseif ( is_search() ) : ?>

					<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bekko' ); // WPCS: XSS OK. ?></p>
					<?php get_search_form(); ?>

				<?php else : ?>

					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'bekko' ); // WPCS: XSS OK. ?></p>
					<?php get_search_form(); ?>

				<?php endif; ?>

		</div><!-- .entry-content -->

		<?php
		/**
		 * bekko_after_content hook.
		 *
		 */
		do_action( 'bekko_after_content' );
		?>
	</div><!-- .inside-article -->
</div><!-- .no-results -->
