<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package thebox
 * @since thebox 1.0
 */
?>
		
	</div><!-- #main .site-main -->

	<footer id="colophon" class="site-footer clearfix" role="contentinfo">

		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
			<div id="tertiary" class="clearfix">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
		<?php endif; // end footer widget area ?>
		
		<p class="credits">
			<?php thebox_credits(); ?>
			<span class="sep"> / </span>
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'thebox' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'thebox' ), 'WordPress' ); ?></a>
			<span class="sep"> / </span>
			<?php printf( __( 'Theme: %1$s by %2$s', 'thebox' ), 'The Box', '<a href="http://design.altervista.org" rel="designer">design lab</a>' ); ?>
		</p>

	</footer><!-- #colophon .site-footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>