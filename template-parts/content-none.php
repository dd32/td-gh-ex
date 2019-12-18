<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package appdetail
 */
?>
<section class="no-results not-found">
	<h1 class="page-title">
		<?php esc_html_e( 'Nothing Found', 'appdetail' ); ?>
	</h1><!-- .page-header -->
	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
		<p><?php printf( 
				/* translators: Link */
				wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'appdetail' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
		<?php elseif ( is_search() ) : ?>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'appdetail' ); ?></p>
			<?php
				get_search_form();
		else : ?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'appdetail' ); ?></p>
			<?php
				get_search_form();
		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->

