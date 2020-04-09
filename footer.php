<?php
/**
 * The template for displaying the footer
 *
 * @package Artblog
 */

?>

	</div><!-- #content -->

	<?php get_template_part( 'template-parts/footer-widgets' ); ?>

	<footer id="colophon" class="site-footer">
		<div class="container col-2">
			<div class="copyright">
				<?php echo wp_kses_post( artblog_get_option( 'copyright_text' ) ); ?>
			</div><!-- .copyright -->

			<div class="site-info">
					<?php
					/* translators: %s: Theme author */
					printf( esc_html__( 'Artblog by %s', 'artblog' ), '<a href="https://www.wpconcern.com/">WP Concern</a>' );
					?>
			</div><!-- .site-info -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
