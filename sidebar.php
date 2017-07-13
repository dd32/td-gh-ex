<?php
/**
 * The template for the sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage arba
 * @since arba 1.0.0
 */
?>
<aside id="sidebar" class="sidebar widget-area" role="complementary">
	<?php
	// If at single post.
	if ( is_single() ):
	?>
		<?php if ( is_active_sidebar( 'post-sidebar' )  ) : ?>
			<?php dynamic_sidebar( 'post-sidebar' ); ?>
		<?php else : ?>
			<?php dynamic_sidebar( 'main-sidebar' ); ?>
		<?php endif; ?>
	<?php
	// If at single page.
	elseif ( is_page() ) :
	?>
		<?php if ( is_active_sidebar( 'page-sidebar' )  ) : ?>
			<?php dynamic_sidebar( 'page-sidebar' ); ?>
		<?php else : ?>
			<?php dynamic_sidebar( 'main-sidebar' ); ?>
		<?php endif; ?>
	<?php
	// If at homepage, taxonomies.
	else : ?>
		<?php if ( is_active_sidebar( 'main-sidebar' )  ) : ?>
			<?php dynamic_sidebar( 'main-sidebar' ); ?>
		<?php endif; ?>
	<?php endif; ?>
</aside><!-- #sidebar -->