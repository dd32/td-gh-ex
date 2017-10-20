<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package bestblog
 */

?>

<div class="block-content-wrap">
	<article class="grid-x grid-padding-x post-wrap-blog ">
		<div class=" small-12 cell ">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p class="pique-get-started"><?php printf( wp_kses( __( 'Ready to publish bestblogr first post? <a href="%1$s">Get started here</a>.', 'best-blog' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched bestblogr search terms. Please try again with some different keywords.', 'best-blog' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what bestblog&rsquo;re looking for. Perhaps searching can help.', 'best-blog' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
</article><!-- .no-results -->
</div>
