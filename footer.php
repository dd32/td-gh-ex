<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package semplicemente
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'semplicemente' ) ); ?>">
			<?php
			/* translators: %s: WordPress name */
			printf( esc_html__( 'Proudly powered by %s', 'semplicemente' ), 'WordPress' );
			?>
			</a>
			<span class="sep"> | </span>
			<?php
			/* translators: 1: theme name, 2: theme developer */
			printf( esc_html__( 'Theme: %1$s by %2$s.', 'semplicemente' ), '<a title="Semplicemente Theme" href="https://crestaproject.com/downloads/semplicemente/" rel="nofollow" target="_blank">Semplicemente</a>', 'CrestaProject WordPress Themes' );
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
