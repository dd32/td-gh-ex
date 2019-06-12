<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package Acuarela
 * @since Acuarela 1.0
 */

?>
<section class="no-results not-found">
	<header class="entry-header">
		<h1 class="entry-title"><?php _e( 'Nothing Found', 'acuarela' ); ?></h1>
	</header><!-- .entry-header -->

	<div class="page-content">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<p><?php printf( __( 'Ready to publish your first post?', 'acuarela' ) . ' <a href="%1$s">Get started here</a>.', esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

	<?php elseif ( is_search() ) : ?>

		<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'acuarela' ); ?></p>
		<?php get_search_form(); ?>

	<?php else : ?>
		<p><?php _e( 'It seems we can not find what you are looking for. Perhaps searching can help.', 'acuarela' ); ?></p>
		<?php get_search_form(); ?>

	<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
