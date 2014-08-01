<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package puro
 * @since puro 1.0
 * @license GPL 2.0
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php if ( dynamic_sidebar('sidebar-2') ) : else : endif; ?>
		
		<div class="clear"></div>
		
		<?php wp_nav_menu( array( 'theme_location' => 'social', 'depth' => 1, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'fallback_cb' => '' ) ); ?>
		
		<div class="site-info">

			&copy; <?php echo date('Y'); ?> - Puro WordPress Theme

		</div><!-- .site-info -->
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
