<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Believe
 * @since Believe 1.0
 */
?>

	</div><!-- #main -->
	
	<?php get_sidebar(); ?>
	
	</div><!-- #page .hfeed .site -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'believe_credits' ); ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'believe' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'believe' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s', 'believe' ), 'Believe', '<a href="http://generalthemes.com/" rel="designer">General Themes</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- .site-footer .site-footer -->

<?php wp_footer(); ?>

</body>
</html>