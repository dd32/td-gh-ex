<?php // Template Name: Full, No Sidebar ?>
<?php get_header(); ?>

<div id="content-nosidebar" class="cf" role="main">
	<?php do_action( 'ast_hook_before_content' ); ?>

	<!-- Widgets: Before Content -->
	<?php if ( is_active_sidebar( 'widgets_before_content' ) ) : ?>
		<aside id="widgets-wrap-before-content" class="cf">
			<?php dynamic_sidebar( 'widgets_before_content' ); ?>
		</aside>
	<?php endif ; ?>

	<?php
		the_post();
		get_template_part( 'loop', 'single' );
	?>

	<?php do_action( 'ast_hook_after_content' ); ?>
</div>

<?php get_footer(); ?>