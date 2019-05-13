<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div id="primary" <?php bhaga_content_class(); ?>>
		<main id="main" <?php bhaga_main_class(); ?>>
			<?php
			/**
			 * bhaga_before_main_content hook.
			 *
			 */
			do_action( 'bhaga_before_main_content' );
			?>

			<div class="inside-article">

				<?php
				/**
				 * bhaga_before_content hook.
				 *
				 *
				 * @hooked bhaga_featured_page_header_inside_single - 10
				 */
				do_action( 'bhaga_before_content' );
				?>

				<header class="entry-header">
					<h1 class="entry-title" itemprop="headline"><?php echo esc_html( apply_filters( 'bhaga_404_title', __( 'Oops! That page can&rsquo;t be found.', 'bhaga' ) ) ); // WPCS: XSS OK. ?></h1>
				</header><!-- .entry-header -->

				<?php
				/**
				 * bhaga_after_entry_header hook.
				 *
				 *
				 * @hooked bhaga_post_image - 10
				 */
				do_action( 'bhaga_after_entry_header' );
				?>

				<div class="entry-content" itemprop="text">
					<?php
					echo '<p>' . esc_html( apply_filters( 'bhaga_404_text', __( 'It looks like nothing was found at this location. Maybe try searching?', 'bhaga' ) ) ) . '</p>'; // WPCS: XSS OK.

					get_search_form();
					?>
				</div><!-- .entry-content -->

				<?php
				/**
				 * bhaga_after_content hook.
				 *
				 */
				do_action( 'bhaga_after_content' );
				?>

			</div><!-- .inside-article -->

			<?php
			/**
			 * bhaga_after_main_content hook.
			 *
			 */
			do_action( 'bhaga_after_main_content' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	/**
	 * bhaga_after_primary_content_area hook.
	 *
	 */
	 do_action( 'bhaga_after_primary_content_area' );

	 bhaga_construct_sidebars();

get_footer();
