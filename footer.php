<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aari
 * @version 1.0.2
 */

?>
<footer class="footer">
	<div class="footer_bottom section-padding text-center">
		<div class="container">
			<div class="row">
				<div class="col-12">

					<?php
					if ( get_theme_mod( 'footer_logo' ) ) {
						printf( '<a href="%1$s" class="footer_logo"><img src="%2$s" alt="%3$s"></a>', esc_url( home_url( '/' ) ), esc_url( wp_get_attachment_image_url( get_theme_mod( 'footer_logo' ), 'full' ) ), esc_html( get_bloginfo( 'name', 'display' ) ) );
					}
					?>

					<div class="box_scoial_icon">
						<?php if ( is_active_sidebar( 'footer-widget' ) ) : ?>
							<ul id="footer-sidebar">
								<?php dynamic_sidebar( 'footer-widget' ); ?>
							</ul>
						<?php endif; ?>
					</div>

					<div class="to_top">
						<a href="#header"></a>
						<div class="icon-circle"></div>
						<div id="to-top">
							<i class="fas fa-angle-up"></i>
						</div>
					</div>

					<div class="disclaimer">
						<?php
						if ( get_theme_mod( 'aari_footer_copyright' ) ) :
							echo wp_kses_allowed_html( get_theme_mod( 'aari_footer_copyright' ) );
						else :
							if ( function_exists( 'aari_copyright' ) ) :
								aari_copyright();
							endif;
						endif;
						?>
					</div>


				</div>
			</div>
		</div>
	</div>
</footer>
<!-- End footer
================================================== -->

</main>
<!-- End Main Content
================================================== -->

<?php wp_footer(); ?>
</body>
</html>
