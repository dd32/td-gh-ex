<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Skylark
 * @since Skylark 1.0
 */
?>

	</div><!-- #main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'skylark_credits' ); ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'skylark' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'skylark' ), 'WordPress' ); ?></a>
			<span class="sep"> &middot; </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'skylark' ), 'Skylark', '<a href="http://blankthemes.com/" rel="designer">Blank Themes</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- .site-footer .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>