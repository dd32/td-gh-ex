<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Chip Life
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

		<div class="site-info">
			<div class="site-info-inside">

				<div class="container">
					<div class="row">
						<div class="col-xxl-12">

							<div class="credits">
								<?php do_action( 'chip_life_credits' ); ?>
							</div><!-- .credits -->

						</div><!-- .col -->
					</div><!-- .row -->
				</div><!-- .container -->

			</div><!-- .site-info-inside -->
		</div><!-- .site-info -->

	</footer><!-- #colophon -->

</div><!-- #page .site-wrapper -->

<div class="overlay-effect"></div><!-- .overlay-effect -->

<?php wp_footer(); ?>
</body>
</html>
