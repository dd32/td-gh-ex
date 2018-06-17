<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div id="primary" <?php asagi_content_class(); ?>>
		<main id="main" <?php asagi_main_class(); ?>>
			<?php
			/**
			 * asagi_before_main_content hook.
			 *
			 */
			do_action( 'asagi_before_main_content' );
			?>

			<div class="inside-article">

				<?php
				/**
				 * asagi_before_content hook.
				 *
				 *
				 * @hooked asagi_featured_page_header_inside_single - 10
				 */
				do_action( 'asagi_before_content' );
				?>

				<header class="entry-header">
					<h1 class="entry-title" itemprop="headline"><?php echo apply_filters( 'asagi_404_title', __( 'Oops! That page can&rsquo;t be found.', 'asagi' ) ); // WPCS: XSS OK. ?></h1>
				</header><!-- .entry-header -->

				<?php
				/**
				 * asagi_after_entry_header hook.
				 *
				 *
				 * @hooked asagi_post_image - 10
				 */
				do_action( 'asagi_after_entry_header' );
				?>

				<div class="entry-content" itemprop="text">
					<?php
					echo '<p>' . apply_filters( 'asagi_404_text', __( 'It looks like nothing was found at this location. Maybe try searching?', 'asagi' ) ) . '</p>'; // WPCS: XSS OK.

					get_search_form();
					?>
				</div><!-- .entry-content -->

				<?php
				/**
				 * asagi_after_content hook.
				 *
				 */
				do_action( 'asagi_after_content' );
				?>

			</div><!-- .inside-article -->

			<?php
			/**
			 * asagi_after_main_content hook.
			 *
			 */
			do_action( 'asagi_after_main_content' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	/**
	 * asagi_after_primary_content_area hook.
	 *
	 */
	 do_action( 'asagi_after_primary_content_area' );

	 asagi_construct_sidebars();

get_footer();
