<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package Bassist
 * @since Bassist 1.0.0
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'bassist' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post?', 'bassist' ) . '<a href="%1$s">Get started here</a>.', esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>
			
			<p><?php printf( __( 'Sorry, but nothing matched \'%1$s\'. Please try again with some different keywords.', 'bassist'), get_search_query() );?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'It seems we can not find what you are looking for. Perhaps searching can help.', 'bassist' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
