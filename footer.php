<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Skirmish
 * @since Skirmish 1.6
 */
?>

	</div><!-- #main -->


	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'skirmish_credits' ); ?>
			&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>
			<span class="sep"> | </span>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'skirmish' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'skirmish' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s', 'skirmish' ), 'Skirmish', '<a href="http://generalthemes.com/" rel="designer">General Themes</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- .site-footer .site-footer -->

</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>