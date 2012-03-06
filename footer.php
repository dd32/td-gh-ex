<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package History
 * @since History 1.0
 */
?>

	</div><!-- #main -->
</div><!-- #page .hfeed .site -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'history_credits' ); ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'history' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'history' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'history' ), 'History', '<a href="http://generalthemes.com/" rel="designer">General Themes</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- .site-footer .site-footer -->


<?php wp_footer(); ?>

</body>
</html>