<?php
/**
 * The template for displaying the footer.
 *
 * @package Aileron
 */
?>

	<footer id="colophon" class="site-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">

		<div class="site-info">
			<div class="site-info-inside">

				<div class="container">
					<div class="row">
						<div class="col-lg-12">

							<div class="credits-wrapper">
								<?php do_action( 'aileron_credits' ); ?>
							</div><!-- .credits-wrapper -->

						</div><!-- .col -->
					</div><!-- .row -->
				</div><!-- .container -->

			</div><!-- .site-info-inside -->
		</div><!-- .site-info -->

	</footer><!-- #colophon -->

</div> <!-- #page .site-wrapper -->
<?php wp_footer(); ?>
</body>
</html>
