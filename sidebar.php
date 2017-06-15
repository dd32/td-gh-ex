<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' ) && is_front_page() || is_archive() || is_search()) : ?>
	
	<aside id="secondary" class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- .sidebar .widget-area -->
	
	<?php elseif ( is_active_sidebar( 'sidebar-1' ) && is_single() ) : ?>
	<aside id="secondary" class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- .sidebar .widget-area -->
	
	<?php elseif ( is_active_sidebar( 'sidebar-1' ) && is_home() ) : ?>
	<aside id="secondary" class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- .sidebar .widget-area -->
	
	<?php elseif ( is_active_sidebar( 'pagesidebar-1' ) &&  is_page() ) : ?>
	<aside id="secondary" class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'pagesidebar-1' ); ?>
	</aside><!-- .sidebar .widget-area -->
	
<?php endif; ?>



