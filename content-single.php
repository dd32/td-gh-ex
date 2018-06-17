<?php
/**
 * The template for displaying single posts.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php asagi_article_schema( 'CreativeWork' ); ?>>
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
			<?php
			/**
			 * asagi_before_entry_title hook.
			 *
			 */
			do_action( 'asagi_before_entry_title' );

			if ( asagi_show_title() ) {
				the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' );
			}

			/**
			 * asagi_after_entry_title hook.
			 *
			 *
			 * @hooked asagi_post_meta - 10
			 */
			do_action( 'asagi_after_entry_title' );
			?>
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
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'asagi' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

		<?php
		/**
		 * asagi_after_entry_content hook.
		 *
		 *
		 * @hooked asagi_footer_meta - 10
		 */
		do_action( 'asagi_after_entry_content' );

		/**
		 * asagi_after_content hook.
		 *
		 */
		do_action( 'asagi_after_content' );
		?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
