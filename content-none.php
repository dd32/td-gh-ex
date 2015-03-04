<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package fmi
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'fmi' ); ?></h1>
	</header><!-- .page-header -->

	<div class="post">
	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'fmi' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php echo esc_attr(fmi_theme_option('vs-website-nosearch-msg'));?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php echo esc_attr(fmi_theme_option('vs-website-nosearch-msg'));?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
    </div>
    
</section><!-- .no-results -->
